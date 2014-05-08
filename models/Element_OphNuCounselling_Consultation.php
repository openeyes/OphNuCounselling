<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophnucounselling_consultation".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $requested_by_id
 * @property integer $other_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuCounselling_Consultation_RequestedBy $requested_by
 */

class Element_OphNuCounselling_Consultation  extends  BaseEventTypeElement
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophnucounselling_consultation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, requested_by_id, other_comments, ', 'safe'),
			array('id, event_id, requested_by_id, reason_id, other_comments, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'requested_by' => array(self::BELONGS_TO, 'OphNuCounselling_Consultation_RequestedBy', 'requested_by_id'),
			'reasons' => array(self::MANY_MANY, 'OphNuCounselling_Consultation_Reason', 'ophnucounselling_consultation_reason_assignment(element_id, reason_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'requested_by_id' => 'Who requested the consultation',
			'not_accepted_for_surgery' => 'Not accepted for surgery',
			'family_education' => 'Family education',
			'surgery_not_needed' => 'Surgery not needed',
			'other' => 'Other',
			'other_comments' => 'Other reason',
			'reason_id' => 'Reason for consultation',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('requested_by_id', $this->requested_by_id);
		$criteria->compare('not_accepted_for_surgery', $this->not_accepted_for_surgery);
		$criteria->compare('family_education', $this->family_education);
		$criteria->compare('surgery_not_needed', $this->surgery_not_needed);
		$criteria->compare('other', $this->other);
		$criteria->compare('other_comments', $this->other_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->hasMultiSelectValue('reasons','Other (please specify)')) {
			if (!$this->other_comments) {
				$this->addError('other_comments','Please specify the other reason for the consultation');
			}
		}

		return parent::beforeValidate();
	}

	public function updateReasons($reason_ids)
	{
		$ids = array();

		foreach ($reason_ids as $reason_id) {
			if (!$assignment = OphNuCounselling_Consultation_Reason_Assignment::model()->find('element_id=? and reason_id=?',array($this->id,$reason_id))) {
				$assignment = new OphNuCounselling_Consultation_Reason_Assignment;
				$assignment->element_id = $this->id;
				$assignment->reason_id = $reason_id;

				if (!$assignment->save()) {
					throw new Exception("Unable to save assignment: ".print_r($assignment->getErrors(),true));
				}
			}

			$ids[] = $assignment->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;

		!empty($ids) && $criteria->addNotInCondition('id',$ids);

		OphNuCounselling_Consultation_Reason_Assignment::model()->deleteAll($criteria);
	}
}
?>

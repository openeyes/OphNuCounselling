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
 * This is the model class for table "et_ophnucounselling_counselling".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $counselling_outcome_id
 * @property string $other_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuCounselling_CounsellingOutcome_CounsellingOutcome $counselling_outcome
 */

class Element_OphNuCounselling_Counselling extends	BaseEventTypeElement
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
		return 'et_ophnucounselling_counselling';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, counselling_outcome_id, other_comments, translator_present_id, translator_name, caregivers_present_id, relationship_1_name, relationship_1_id, relationship_2_name, relationship_2_id, sw_present_id, sw1name, sw2name, comments', 'safe'),
			array('id, event_id, counselling_outcome_id, other_comments, ', 'safe', 'on' => 'search'),
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
			'pre_emotions' => array(self::MANY_MANY, 'OphNuCounselling_Emotion', 'ophnucounselling_pre_emotion_assignment(element_id, emotion_id)', 'order' => 'pre_emotions.display_order asc'),
			'post_emotions' => array(self::MANY_MANY, 'OphNuCounselling_Emotion', 'ophnucounselling_post_emotion_assignment(element_id, emotion_id)', 'order' => 'post_emotions.display_order asc'),
			'counselling_outcome' => array(self::BELONGS_TO, 'OphNuCounselling_CounsellingOutcome_CounsellingOutcome', 'counselling_outcome_id'),
			'translator_present' => array(self::BELONGS_TO, 'OphNuCounselling_Translator_TranslatorPresent', 'translator_present_id'),
			'caregivers_present' => array(self::BELONGS_TO, 'OphNuCounselling_CareGivers_CaregiversPresent', 'caregivers_present_id'),
			'name' => array(self::BELONGS_TO, 'OphNuCounselling_CareGivers_Name', 'name_id'),
			'relationship1' => array(self::BELONGS_TO, 'OphNuCounselling_CareGivers_Relationship', 'relationship_1_id'),
			'relationship2' => array(self::BELONGS_TO, 'OphNuCounselling_CareGivers_Relationship', 'relationship_2_id'),
			'sw_present' => array(self::BELONGS_TO, 'OphNuCounselling_CareGivers_SwPresent', 'sw_present_id'),
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
			'counselling_outcome_id' => 'Counseling outcome',
			'other_comments' => 'Other outcome',
			'translator_present_id' => 'Translator present',
			'translator_name' => 'Translator name',
			'caregivers_present_id' => 'Care givers present',
			'relationship_1_name' => 'Care giver name',
			'relationship_1_id' => 'Relationship',
			'relationship_2_name' => 'Care giver name',
			'relationship_2_id' => 'Relationship',
			'sw_present_id' => 'Social workers present',
			'sw1name' => 'Social worker name',
			'sw2name' => 'Social worker name',
			'pre_emotions' => 'Pre-counseling emotional status',
			'post_emotions' => 'Post-counseling emotional status',
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
		$criteria->compare('counselling_outcome_id', $this->counselling_outcome_id);
		$criteria->compare('other_comments', $this->other_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->counselling_outcome && $this->counselling_outcome->name == 'Other (please specify)') {
			if (!$this->other_comments) {
				$this->addError('other_comments','Please specify the counselling outcome');
			}
		}

		if ($this->translator_present && $this->translator_present->name == 'Yes' && strlen($this->translator_name) <1) {
			$this->addError('translator_name',$this->getAttributeLabel('translator_name').' cannot be blank.');
		}

		if ($this->caregivers_present && $this->caregivers_present->name == 'Yes') {
			if (!$this->relationship_1_name && !$this->relationship_2_name) {
				$this->addError('relationship_1_name','You must enter at least one caregiver name');
			} else {
				if ($this->relationship_1_name && !$this->relationship_1_id) {
					$this->addError('relationship_1_id',"Please specify the first caregivers relationship");
				}
				if ($this->relationship_2_name && !$this->relationship_2_id) {
					$this->addError('relationship_2_id',"Please specify the second caregivers relationship");
				}
			}
		}

		if ($this->sw_present && $this->sw_present->name == 'Yes') {
			if (!$this->sw1name && !$this->sw2name) {
				$this->addError('sw1name','You must enter at least one social worker name');
			}
		}

		return parent::beforeValidate();
	}

	public function updatePreEmotions($emotion_ids)
	{
		foreach ($emotion_ids as $emotion_id) {
			if (!$assignment = OphNuCounselling_Pre_Emotion_Assignment::model()->find('element_id=? and emotion_id=?',array($this->id,$emotion_id))) {
				$assignment = new OphNuCounselling_Pre_Emotion_Assignment;
				$assignment->element_id = $this->id;
				$assignment->emotion_id = $emotion_id;

				if (!$assignment->save()) {
					throw new Exception("Unable to save pre emotion assignment: ".print_r($assignment->getErrors(),true));
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;
		$criteria->addNotInCondition('emotion_id',$emotion_ids);

		OphNuCounselling_Pre_Emotion_Assignment::model()->deleteAll($criteria);
	}

	public function updatePostEmotions($emotion_ids)
	{
		foreach ($emotion_ids as $emotion_id) {
			if (!$assignment = OphNuCounselling_Post_Emotion_Assignment::model()->find('element_id=? and emotion_id=?',array($this->id,$emotion_id))) {
				$assignment = new OphNuCounselling_Post_Emotion_Assignment;
				$assignment->element_id = $this->id;
				$assignment->emotion_id = $emotion_id;

				if (!$assignment->save()) {
					throw new Exception("Unable to save post emotion assignment: ".print_r($assignment->getErrors(),true));
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $this->id;
		$criteria->addNotInCondition('emotion_id',$emotion_ids);

		OphNuCounselling_Post_Emotion_Assignment::model()->deleteAll($criteria);
	}
}
?>

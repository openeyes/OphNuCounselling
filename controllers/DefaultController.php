<?php

class DefaultController extends BaseEventTypeController
{
	public function getEmotionList($element, $relation)
	{
		$list = CHtml::listData(OphNuCounselling_Emotion::model()->findAll(array('order'=>'display_order asc')),'id','name');
		$curr_list = CHtml::listData($element->$relation , 'id', 'name');
		if ($missing = array_diff($curr_list, $list)) {
			foreach ($missing as $id => $name) {
				$list[$id] =	$name;
			}
		}
		return $list;
	}

	public function getReasonList($element, $relation)
	{
		$list = CHtml::listData(OphNuCounselling_Consultation_Reason::model()->findAll(array('order'=>'display_order asc')),'id','name');
		$curr_list = CHtml::listData($element->$relation , 'id', 'name');
		if ($missing = array_diff($curr_list, $list)) {
			foreach ($missing as $id => $name) {
				$list[$id] =	$name;
			}
		}
		return $list;
	}

	/**
	 * associate the answers and risks from the data with the Element_OphNuCounselling_Counselling element for
	 * validation
	 *
	 * @param Element_OphNuCounselling_Counselling $element
	 * @param array $data
	 * @param $index
	 */
	protected function setComplexAttributes_Element_OphNuCounselling_Counselling($element, $data, $index)
	{
		$pre_emotions = array();

		if (!empty($data['OphNuCounselling_Pre_Emotions'])) {
			foreach ($data['OphNuCounselling_Pre_Emotions'] as $pre_emotion) {
				$pre_emotions[] = OphNuCounselling_Emotion::model()->findByPk($pre_emotion);
			}
		}

		$post_emotions = array();

		if (!empty($data['OphNuCounselling_Post_Emotions'])) {
			foreach ($data['OphNuCounselling_Post_Emotions'] as $post_emotion) {
				$post_emotions[] = OphNuCounselling_Emotion::model()->findByPk($post_emotion);
			}
		}

		$element->pre_emotions = $pre_emotions;
		$element->post_emotions = $post_emotions;
	}

	/**
	 * Save procedures
	 *
	 * @param $element
	 * @param $data
	 * @param $index
	 */
	protected function saveComplexAttributes_Element_OphNuCounselling_Counselling($element, $data, $index)
	{
		$element->updatePreEmotions($data['OphNuCounselling_Pre_Emotions']);
		$element->updatePostEmotions($data['OphNuCounselling_Post_Emotions']);
	}

	protected function setComplexAttributes_Element_OphNuCounselling_Consultation($element, $data, $index)
	{
		$reasons = array();

		if (!empty($data['OphNuCounselling_Reasons'])) {
			foreach ($data['OphNuCounselling_Reasons'] as $reason_id) {
				$assignment = new OphNuCounselling_Consultation_Reason_Assignment;
				$assignment->reason_id = $reason_id;

				$reasons[] = $assignment;
			}
		}

		$element->reasons = $reasons;
	}

	protected function saveComplexAttributes_Element_OphNuCounselling_Consultation($element, $data, $index)
	{
		$element->updateReasons($data['OphNuCounselling_Reasons']);
	}

	protected function setComplexAttributes_Element_OphNuCounselling_PatientId($element, $data, $index)
	{
		$identifiers = array();

		if (!empty($data['MultiSelect_identifiers'])) {
			foreach ($data['MultiSelect_identifiers'] as $identifier_id) {
				$assignment = new OphNuCounselling_PatientId_Identifier_Assignment;
				$assignment->identifier_id = $identifier_id;

				$identifiers[] = $assignment;
			}
		}

		$element->identifiers = $identifiers;
	}

	protected function saveComplexAttributes_Element_OphNuCounselling_PatientId($element, $data, $index)
	{
		$element->updateMultiSelectData('OphNuCounselling_PatientId_Identifier_Assignment',empty($data['MultiSelect_identifiers']) ? array() : $data['MultiSelect_identifiers'],'identifier_id');
	}
}

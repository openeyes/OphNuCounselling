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
}

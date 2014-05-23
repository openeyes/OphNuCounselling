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
}

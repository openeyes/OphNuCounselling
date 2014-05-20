<?php

class m140520_065436_all_elements_required extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where("class_name = 'OphNuCounselling'")->queryRow();
		$this->update('element_type',array('required'=>1),"event_type_id = {$event_type['id']}");
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where("class_name = 'OphNuCounselling'")->queryRow();
		$this->update('element_type',array('required'=>null),"event_type_id = {$event_type['id']}");
	}
}

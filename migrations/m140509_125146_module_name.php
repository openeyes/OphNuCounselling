<?php

class m140509_125146_module_name extends CDbMigration
{
	public function up()
	{
		$this->update('event_type',array('name' => 'Patient counseling'),"class_name = 'OphNuCounselling'");
	}

	public function down()
	{
		$this->update('event_type',array('name' => 'Patient Counseling'),"class_name = 'OphNuCounselling'");
	}
}

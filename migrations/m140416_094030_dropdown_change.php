<?php

class m140416_094030_dropdown_change extends CDbMigration
{
	public function up()
	{
		$this->update('ophnucounselling_counsellingoutcome_counselling_outcome',array('name' => 'Other (please specify)'), "name = 'Other'");
		$this->update('ophnucounselling_counsellingoutcome_counselling_outcome',array('name' => 'Referred back to general practitioner for further medical treatment'), "id = 2");
		$this->update('ophnucounselling_counsellingoutcome_counselling_outcome',array('name' => 'Referred to social worker'), "id = 3");
	}

	public function down()
	{
		$this->update('ophnucounselling_counsellingoutcome_counselling_outcome',array('name' => 'Other'), "name = 'Other (please specify)'");
	}
}

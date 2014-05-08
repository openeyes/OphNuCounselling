<?php

class m140508_064243_nullable_foreign_keys extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnucounselling_consultation','requested_by_id','int(10) unsigned null');
		$this->alterColumn('et_ophnucounselling_counselling','counselling_outcome_id','int(10) unsigned null');
		$this->alterColumn('et_ophnucounselling_counselling','caregivers_present_id','int(10) unsigned null');
		$this->alterColumn('et_ophnucounselling_counselling','translator_present_id','int(10) unsigned null');
		$this->alterColumn('et_ophnucounselling_counselling','sw_present_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnucounselling_consultation','requested_by_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnucounselling_counselling','counselling_outcome_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnucounselling_counselling','caregivers_present_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnucounselling_counselling','translator_present_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnucounselling_counselling','sw_present_id','int(10) unsigned not null');
	}
}

<?php

class m140416_121438_null_changes extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnucounselling_caregivers','relationship_1_id','int(10) unsigned null');
		$this->alterColumn('et_ophnucounselling_caregivers','relationship_2_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnucounselling_caregivers','relationship_1_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnucounselling_caregivers','relationship_2_id','int(10) unsigned not null');
	}
}

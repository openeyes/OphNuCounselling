<?php

class m140507_090553_foreign_key_bugfixes extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnucounselling_counselling','relationship_1_id','int(10) unsigned null');
		$this->alterColumn('et_ophnucounselling_counselling','relationship_2_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnucounselling_counselling','relationship_1_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnucounselling_counselling','relationship_2_id','int(10) unsigned not null');
	}
}

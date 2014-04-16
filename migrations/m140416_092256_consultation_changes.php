<?php

class m140416_092256_consultation_changes extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnucounselling_consultation','requested_by_id','int(10) unsigned not null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnucounselling_consultation','requested_by_id','int(10) unsigned not null default 1');
	}
}

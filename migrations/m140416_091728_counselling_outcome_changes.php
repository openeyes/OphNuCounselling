<?php

class m140416_091728_counselling_outcome_changes extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnucounselling_counsellingoutcome','counselling_outcome_id','int(10) unsigned not null');
		$this->alterColumn('et_ophnucounselling_counsellingoutcome','other_comments','text not null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnucounselling_counsellingoutcome','counselling_outcome_id','int(10) unsigned not null default 1');
		$this->alterColumn('et_ophnucounselling_counsellingoutcome','other_comments','varchar(255) not null');
	}
}

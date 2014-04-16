<?php

class m140415_143317_other_text_field_type extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnucounselling_consultation','other_comments','text not null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnucounselling_consultation','other_comments',"tinyint(1) unsigned NOT NULL DEFAULT '0'");
	}
}

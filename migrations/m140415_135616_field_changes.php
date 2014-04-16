<?php

class m140415_135616_field_changes extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnucounselling_consultation_reason', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_consultation_reason_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_consultation_reason_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_consultation_reason_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_consultation_reason_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_consultation_reason',array('id'=>1,'name'=>'Not accepted for surgery','display_order'=>1));
		$this->insert('ophnucounselling_consultation_reason',array('id'=>2,'name'=>'Family education','display_order'=>2));
		$this->insert('ophnucounselling_consultation_reason',array('id'=>3,'name'=>'Surgery not needed','display_order'=>3));
		$this->insert('ophnucounselling_consultation_reason',array('id'=>4,'name'=>'Other (please specify)','display_order'=>4));

		$this->dropColumn('et_ophnucounselling_consultation','not_accepted_for_surgery');
		$this->dropColumn('et_ophnucounselling_consultation','family_education');
		$this->dropColumn('et_ophnucounselling_consultation','surgery_not_needed');
		$this->dropColumn('et_ophnucounselling_consultation','other');

		$this->addColumn('et_ophnucounselling_consultation','reason_id','int(10) unsigned not null');
		$this->createIndex('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation','reason_id');
		$this->addForeignKey('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation','reason_id','ophnucounselling_consultation_reason','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation');
		$this->dropIndex('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation');
		$this->dropColumn('et_ophnucounselling_consultation','reason_id');

		$this->addColumn('et_ophnucounselling_consultation','other','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_consultation','surgery_not_needed','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_consultation','family_education','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_consultation','not_accepted_for_surgery','tinyint(1) unsigned not null');

		$this->dropTable('ophnucounselling_consultation_reason');
	}
}

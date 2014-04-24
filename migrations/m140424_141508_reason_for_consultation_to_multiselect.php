<?php

class m140424_141508_reason_for_consultation_to_multiselect extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnucounselling_consultation_reason_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'reason_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_consultation_reason_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_consultation_reason_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnucounselling_consultation_reason_assignment_ele_fk` (`element_id`)',
				'KEY `ophnucounselling_consultation_reason_assignment_rea_fk` (`reason_id`)',
				'CONSTRAINT `ophnucounselling_consultation_reason_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_consultation_reason_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_consultation_reason_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnucounselling_consultation` (`id`)',
				'CONSTRAINT `ophnucounselling_consultation_reason_assignment_rea_fk` FOREIGN KEY (`reason_id`) REFERENCES `ophnucounselling_consultation_reason` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropForeignKey('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation');
		$this->dropIndex('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation');
		$this->dropColumn('et_ophnucounselling_consultation','reason_id');
	}

	public function down()
	{
		$this->addColumn('et_ophnucounselling_consultation','reason_id','int(10) unsigned not null');
		$this->createIndex('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation','reason_id');
		$this->addForeignKey('et_ophnucounselling_consultation_reason_id_fk','et_ophnucounselling_consultation','reason_id','ophnucounselling_consultation_reason','id');

		$this->dropTable('ophnucounselling_consultation_reason_assignment');
	}
}

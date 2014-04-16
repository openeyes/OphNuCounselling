<?php

class m140416_074846_field_fixes extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('ophnucounselling_caregivers_name_fk','et_ophnucounselling_caregivers');
		$this->dropIndex('ophnucounselling_caregivers_name_fk','et_ophnucounselling_caregivers');
		$this->alterColumn('et_ophnucounselling_caregivers','name_id','varchar(255) not null');
		$this->renameColumn('et_ophnucounselling_caregivers','name_id','relationship_1_name');

		$this->dropTable('ophnucounselling_caregivers_name');

		$this->dropForeignKey('ophnucounselling_caregivers_relationship2_fk','et_ophnucounselling_caregivers');
		$this->renameColumn('et_ophnucounselling_caregivers','relationship2_id','relationship_2_id');
		$this->addForeignKey('ophnucounselling_caregivers_relationship2_fk','et_ophnucounselling_caregivers','relationship_2_id','ophnucounselling_caregivers_relationship','id');

		$this->dropTable('ophnucounselling_caregivers_relationship2');

		$this->dropForeignKey('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers');
		$this->dropIndex('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers');
		$this->renameColumn('et_ophnucounselling_caregivers','relationship_id','relationship_1_id');
		$this->createIndex('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers','relationship_1_id');
		$this->addForeignKey('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers','relationship_1_id','ophnucounselling_caregivers_relationship','id');

		$this->renameColumn('et_ophnucounselling_caregivers','name2','relationship_2_name');
	}

	public function down()
	{
		$this->renameColumn('et_ophnucounselling_caregivers','relationship_2_name','name2');

		$this->createTable('ophnucounselling_caregivers_relationship2', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_caregivers_relationship2_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_caregivers_relationship2_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_caregivers_relationship2_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_relationship2_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropForeignKey('ophnucounselling_caregivers_relationship2_fk','et_ophnucounselling_caregivers');
		$this->renameColumn('et_ophnucounselling_caregivers','relationship_2_id','relationship2_id');
		$this->addForeignKey('ophnucounselling_caregivers_relationship2_fk','et_ophnucounselling_caregivers','relationship2_id','ophnucounselling_caregivers_relationship2','id');

		$this->dropForeignKey('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers');
		$this->dropIndex('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers');
		$this->renameColumn('et_ophnucounselling_caregivers','relationship1_id','relationship_id');
		$this->createIndex('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers','relationship_id');
		$this->addForeignKey('ophnucounselling_caregivers_relationship_fk','et_ophnucounselling_caregivers','relationship_id','ophnucounselling_caregivers_relationship','id');

		$this->createTable('ophnucounselling_caregivers_name', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_caregivers_name_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_caregivers_name_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_caregivers_name_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_name_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->renameColumn('et_ophnucounselling_caregivers','relationship_1_name','name_id');
		$this->alterColumn('et_ophnucounselling_caregivers','name_id','int(10) unsigned not null');

		$this->createIndex('ophnucounselling_caregivers_name_fk','et_ophnucounselling_caregivers','name_id');
		$this->addForeignKey('ophnucounselling_caregivers_name_fk','et_ophnucounselling_caregivers','name_id','ophnucounselling_caregivers_name','id');
	}
}

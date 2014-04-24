<?php

class m140424_145141_element_changes extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnucounselling_counselling','translator_present_id','int(10) unsigned not null');
		$this->createIndex('et_ophnucounselling_counselling_translator_present_id_fk','et_ophnucounselling_counselling','translator_present_id');
		$this->addForeignKey('et_ophnucounselling_counselling_translator_present_id_fk','et_ophnucounselling_counselling','translator_present_id','ophnucounselling_translator_translator_present','id');

		$this->addColumn('et_ophnucounselling_counselling','translator_name','varchar(255) not null');

		$this->dropTable('et_ophnucounselling_translator');

		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuCounselling"))->queryRow();

		$this->delete('element_type',"event_type_id = {$event_type['id']} and class_name = 'Element_OphNuCounselling_Translator'");

		$this->update('element_type',array('name' => 'Counseling'),"event_type_id = {$event_type['id']} and class_name = 'Element_OphNuCounselling_Counselling'");

		$this->addColumn('et_ophnucounselling_counselling','caregivers_present_id','int(10) unsigned not null');
		$this->createIndex('et_ophnucounselling_counselling_caregivers_present_id_fk','et_ophnucounselling_counselling','caregivers_present_id');
		$this->addForeignKey('et_ophnucounselling_counselling_caregivers_present_id_fk','et_ophnucounselling_counselling','caregivers_present_id','ophnucounselling_caregivers_caregivers_present','id');

		$this->addColumn('et_ophnucounselling_counselling','relationship_1_name','varchar(255) not null');
		$this->addColumn('et_ophnucounselling_counselling','relationship_1_id','int(10) unsigned not null');
		$this->createIndex('et_ophnucounselling_counselling_relationship_1_id_fk','et_ophnucounselling_counselling','relationship_1_id');
		$this->addForeignKey('et_ophnucounselling_counselling_relationship_1_id_fk','et_ophnucounselling_counselling','relationship_1_id','ophnucounselling_caregivers_relationship','id');

		$this->addColumn('et_ophnucounselling_counselling','relationship_2_name','varchar(255) not null');
		$this->addColumn('et_ophnucounselling_counselling','relationship_2_id','int(10) unsigned not null');
		$this->createIndex('et_ophnucounselling_counselling_relationship_2_id_fk','et_ophnucounselling_counselling','relationship_2_id');
		$this->addForeignKey('et_ophnucounselling_counselling_relationship_2_id_fk','et_ophnucounselling_counselling','relationship_2_id','ophnucounselling_caregivers_relationship','id');

		$this->addColumn('et_ophnucounselling_counselling','sw_present_id','int(10) unsigned not null');
		$this->createIndex('et_ophnucounselling_counselling_sw_present_id_fk','et_ophnucounselling_counselling','sw_present_id');
		$this->addForeignKey('et_ophnucounselling_counselling_sw_present_id_fk','et_ophnucounselling_counselling','sw_present_id','ophnucounselling_caregivers_sw_present','id');

		$this->addColumn('et_ophnucounselling_counselling','sw1name','varchar(255) not null');
		$this->addColumn('et_ophnucounselling_counselling','sw2name','varchar(255) not null');

		$this->dropTable('et_ophnucounselling_caregivers');

		$this->delete('element_type',"event_type_id = {$event_type['id']} and class_name = 'Element_OphNuCounselling_CareGivers'");
	}

	public function down()
	{
		$this->execute("CREATE TABLE `et_ophnucounselling_caregivers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `caregivers_present_id` int(10) unsigned NOT NULL,
  `relationship_1_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `relationship_1_id` int(10) unsigned DEFAULT NULL,
  `relationship_2_name` varchar(255) COLLATE utf8_bin DEFAULT '',
  `relationship_2_id` int(10) unsigned DEFAULT NULL,
  `sw_present_id` int(10) unsigned NOT NULL,
  `sw1name` varchar(255) COLLATE utf8_bin DEFAULT '',
  `sw2name` varchar(255) COLLATE utf8_bin DEFAULT '',
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `et_ophnucounselling_caregivers_lmui_fk` (`last_modified_user_id`),
  KEY `et_ophnucounselling_caregivers_cui_fk` (`created_user_id`),
  KEY `et_ophnucounselling_caregivers_ev_fk` (`event_id`),
  KEY `ophnucounselling_caregivers_caregivers_present_fk` (`caregivers_present_id`),
  KEY `ophnucounselling_caregivers_relationship2_fk` (`relationship_2_id`),
  KEY `ophnucounselling_caregivers_sw_present_fk` (`sw_present_id`),
  KEY `ophnucounselling_caregivers_relationship_fk` (`relationship_1_id`),
  CONSTRAINT `et_ophnucounselling_caregivers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `et_ophnucounselling_caregivers_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `et_ophnucounselling_caregivers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `ophnucounselling_caregivers_caregivers_present_fk` FOREIGN KEY (`caregivers_present_id`) REFERENCES `ophnucounselling_caregivers_caregivers_present` (`id`),
  CONSTRAINT `ophnucounselling_caregivers_relationship2_fk` FOREIGN KEY (`relationship_2_id`) REFERENCES `ophnucounselling_caregivers_relationship` (`id`),
  CONSTRAINT `ophnucounselling_caregivers_relationship_fk` FOREIGN KEY (`relationship_1_id`) REFERENCES `ophnucounselling_caregivers_relationship` (`id`),
  CONSTRAINT `ophnucounselling_caregivers_sw_present_fk` FOREIGN KEY (`sw_present_id`) REFERENCES `ophnucounselling_caregivers_sw_present` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin");

		$this->dropColumn('et_ophnucounselling_counselling','sw1name');
		$this->dropColumn('et_ophnucounselling_counselling','sw2name');

		$this->dropForeignKey('et_ophnucounselling_counselling_sw_present_id_fk','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_sw_present_id_fk','et_ophnucounselling_counselling');
		$this->dropColumn('et_ophnucounselling_counselling','sw_present_id');

		$this->dropForeignKey('et_ophnucounselling_counselling_relationship_2_id_fk','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_relationship_2_id_fk','et_ophnucounselling_counselling');
		$this->dropColumn('et_ophnucounselling_counselling','relationship_2_id');
		$this->dropColumn('et_ophnucounselling_counselling','relationship_2_name');

		$this->dropForeignKey('et_ophnucounselling_counselling_relationship_1_id_fk','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_relationship_1_id_fk','et_ophnucounselling_counselling');
		$this->dropColumn('et_ophnucounselling_counselling','relationship_1_id');
		$this->dropColumn('et_ophnucounselling_counselling','relationship_1_name');

		$this->dropForeignKey('et_ophnucounselling_counselling_caregivers_present_id_fk','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_caregivers_present_id_fk','et_ophnucounselling_counselling');
		$this->dropColumn('et_ophnucounselling_counselling','caregivers_present_id');

		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuCounselling"))->queryRow();

		$this->update('element_type',array('name' => 'Counselling'),"event_type_id = {$event_type['id']} and class_name = 'Element_OphNuCounselling_Counselling'");

		$this->insert('element_type',array('event_type_id' => $event_type['id'],'name' => 'Translator', 'class_name' => 'Element_OphNuCounselling_Translator', 'default' => 1));
		$this->insert('element_type',array('event_type_id' => $event_type['id'],'name' => 'Care givers', 'class_name' => 'Element_OphNuCounselling_CareGivers', 'default' => 1));

		$this->createTable('et_ophnucounselling_translator', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'translator_present_id' => 'int(10) unsigned NOT NULL',

				'name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_translator_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_translator_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_translator_ev_fk` (`event_id`)',
				'KEY `ophnucounselling_translator_translator_present_fk` (`translator_present_id`)',
				'CONSTRAINT `et_ophnucounselling_translator_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_translator_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_translator_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnucounselling_translator_translator_present_fk` FOREIGN KEY (`translator_present_id`) REFERENCES `ophnucounselling_translator_translator_present` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropColumn('et_ophnucounselling_counselling','translator_name');

		$this->dropForeignKey('et_ophnucounselling_counselling_translator_present_id_fk','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_translator_present_id_fk','et_ophnucounselling_counselling');
		$this->dropColumn('et_ophnucounselling_counselling','translator_present_id');
	}
}

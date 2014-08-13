<?php

class m140813_141122_remove_identifiers extends OEMigration
{
	public function up()
	{
		$this->dropTable('ophnucounselling_patientid_identifier_assignment_version');
		$this->dropTable('ophnucounselling_patientid_identifier_assignment');
		$this->dropTable('ophnucounselling_patientid_identifier_version');
		$this->dropTable('ophnucounselling_patientid_identifier');
	}

	public function down()
	{
		$this->execute("CREATE TABLE `ophnucounselling_patientid_identifier` (
			`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`name` varchar(255) COLLATE utf8_bin NOT NULL,
			`display_order` tinyint(1) unsigned NOT NULL,
			`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
			`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
			`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
			`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
			PRIMARY KEY (`id`),
			KEY `ophnucounselling_patientid_identifier_lmui_fk` (`last_modified_user_id`),
			KEY `ophnucounselling_patientid_identifier_cui_fk` (`created_user_id`),
			CONSTRAINT `ophnucounselling_patientid_identifier_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
			CONSTRAINT `ophnucounselling_patientid_identifier_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnucounselling_patientid_identifier');

		$this->execute("CREATE TABLE `ophnucounselling_patientid_identifier_assignment` (
			`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
			`element_id` int(10) unsigned NOT NULL,
			`identifier_id` int(10) unsigned NOT NULL,
			`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
			`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
			`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
			`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
			PRIMARY KEY (`id`),
			KEY `ophnucounselling_patientid_identifier_assignment_lmui_fk` (`last_modified_user_id`),
			KEY `ophnucounselling_patientid_identifier_assignment_cui_fk` (`created_user_id`),
			KEY `ophnucounselling_patientid_identifier_assignment_ele_fk` (`element_id`),
			KEY `ophnucounselling_patientid_identifier_assignment_idi_fk` (`identifier_id`),
			CONSTRAINT `ophnucounselling_patientid_identifier_assignment_idi_fk` FOREIGN KEY (`identifier_id`) REFERENCES `ophnucounselling_patientid_identifier` (`id`),
			CONSTRAINT `ophnucounselling_patientid_identifier_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
			CONSTRAINT `ophnucounselling_patientid_identifier_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnucounselling_patientid` (`id`),
			CONSTRAINT `ophnucounselling_patientid_identifier_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnucounselling_patientid_identifier_assignment');
	}
}

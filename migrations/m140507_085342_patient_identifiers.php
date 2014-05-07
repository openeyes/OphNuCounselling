<?php

class m140507_085342_patient_identifiers extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnucounselling_patientid_identifier', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_patientid_identifier_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_patientid_identifier_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_patientid_identifier_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_patientid_identifier_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_patientid_identifier',array('id'=>1,'name'=>'DOB','display_order'=>1));
		$this->insert('ophnucounselling_patientid_identifier',array('id'=>2,'name'=>'Patient name','display_order'=>2));
		$this->insert('ophnucounselling_patientid_identifier',array('id'=>3,'name'=>'Parent/caregiver','display_order'=>3));
		$this->insert('ophnucounselling_patientid_identifier',array('id'=>4,'name'=>'Chart number','display_order'=>4));

		$this->createTable('ophnucounselling_patientid_identifier_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'identifier_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_pi_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_pi_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnucounselling_pi_assignment_ele_fk` (`element_id`)',
				'KEY `ophnucounselling_pi_assignment_idi_fk` (`identifier_id`)',
				'CONSTRAINT `ophnucounselling_pi_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_pi_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_pi_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnucounselling_patientid` (`id`)',
				'CONSTRAINT `ophnucounselling_pi_assignment_idi_fk` FOREIGN KEY (`identifier_id`) REFERENCES `ophnucounselling_patientid_identifier` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropColumn('et_ophnucounselling_patientid','dob');
		$this->dropColumn('et_ophnucounselling_patientid','patient_name');
		$this->dropColumn('et_ophnucounselling_patientid','parent_caregiver');
		$this->dropColumn('et_ophnucounselling_patientid','chart_number');
	}

	public function down()
	{
		$this->addColumn('et_ophnucounselling_patientid','chart_number','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_patientid','parent_caregiver','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_patientid','patient_name','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_patientid','dob','tinyint(1) unsigned not null');

		$this->dropTable('ophnucounselling_patientid_identifier_assignment');
		$this->dropTable('ophnucounselling_patientid_identifier');
	}
}

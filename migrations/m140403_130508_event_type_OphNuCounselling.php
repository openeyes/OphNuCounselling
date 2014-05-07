<?php 
class m140403_130508_event_type_OphNuCounselling extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuCounselling'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuCounselling', 'name' => 'Patient Counseling','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuCounselling'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient ID verification',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient ID verification','class_name' => 'Element_OphNuCounselling_PatientId', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient ID verification'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Consultation history',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Consultation history','class_name' => 'Element_OphNuCounselling_Consultation', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Consultation history'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Translator',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Translator','class_name' => 'Element_OphNuCounselling_Translator', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Translator'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Care givers',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Care givers','class_name' => 'Element_OphNuCounselling_CareGivers', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Care givers'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Pre counselling emotions',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Pre counselling emotions','class_name' => 'Element_OphNuCounselling_PreCounsellingEmotions', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Pre counselling emotions'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Counseling Outcome',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Counseling Outcome','class_name' => 'Element_OphNuCounselling_CounsellingOutcome', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Counseling Outcome'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Counseling Comments',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Counseling Comments','class_name' => 'Element_OphNuCounselling_CounsellingComments', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Counseling Comments'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Post Counselling Status',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Post Counselling Status','class_name' => 'Element_OphNuCounselling_PostCounsellingStatus', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Post Counselling Status'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Patient Satisfaction',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Patient Satisfaction','class_name' => 'Element_OphNuCounselling_PatientSatisfaction', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Patient Satisfaction'))->queryRow();



		$this->createTable('et_ophnucounselling_patientid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'wrist_band_verified' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'dob' => 'tinyint(1) unsigned NOT NULL',

				'patient_name' => 'tinyint(1) unsigned NOT NULL',

				'parent_caregiver' => 'tinyint(1) unsigned NOT NULL',

				'chart_number' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_patientid_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_patientid_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_patientid_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnucounselling_patientid_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_patientid_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_patientid_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnucounselling_consultation_requested_by', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_consultation_requested_by_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_consultation_requested_by_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_consultation_requested_by_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_consultation_requested_by_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_consultation_requested_by',array('name'=>'Nursing','display_order'=>1));
		$this->insert('ophnucounselling_consultation_requested_by',array('name'=>'Anesthesia','display_order'=>2));
		$this->insert('ophnucounselling_consultation_requested_by',array('name'=>'Patient','display_order'=>3));
		$this->insert('ophnucounselling_consultation_requested_by',array('name'=>'Caregiver','display_order'=>4));
		$this->insert('ophnucounselling_consultation_requested_by',array('name'=>'Surgery','display_order'=>5));
		$this->insert('ophnucounselling_consultation_requested_by',array('name'=>'Other','display_order'=>6));



		$this->createTable('et_ophnucounselling_consultation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'requested_by_id' => 'int(10) unsigned NOT NULL DEFAULT 1',

				'not_accepted_for_surgery' => 'tinyint(1) unsigned NOT NULL',

				'family_education' => 'tinyint(1) unsigned NOT NULL',

				'surgery_not_needed' => 'tinyint(1) unsigned NOT NULL',

				'other' => 'tinyint(1) unsigned NOT NULL',

				'other_comments' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_consultation_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_consultation_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_consultation_ev_fk` (`event_id`)',
				'KEY `ophnucounselling_consultation_requested_by_fk` (`requested_by_id`)',
				'CONSTRAINT `et_ophnucounselling_consultation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_consultation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_consultation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnucounselling_consultation_requested_by_fk` FOREIGN KEY (`requested_by_id`) REFERENCES `ophnucounselling_consultation_requested_by` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnucounselling_translator_translator_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_translator_translator_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_translator_translator_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_translator_translator_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_translator_translator_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_translator_translator_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnucounselling_translator_translator_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnucounselling_translator_translator_present',array('name'=>'N/A','display_order'=>3));



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

		$this->createTable('ophnucounselling_caregivers_caregivers_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_caregivers_caregivers_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_caregivers_caregivers_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_caregivers_caregivers_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_caregivers_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_caregivers_caregivers_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnucounselling_caregivers_caregivers_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnucounselling_caregivers_caregivers_present',array('name'=>'NA','display_order'=>3));

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

		$this->insert('ophnucounselling_caregivers_name',array('name'=>'Enter value','display_order'=>1));

		$this->createTable('ophnucounselling_caregivers_relationship', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_caregivers_relationship_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_caregivers_relationship_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_caregivers_relationship_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_relationship_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_caregivers_relationship',array('name'=>'Mother','display_order'=>1));
		$this->insert('ophnucounselling_caregivers_relationship',array('name'=>'Father','display_order'=>2));

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

		$this->insert('ophnucounselling_caregivers_relationship2',array('name'=>'Mother','display_order'=>1));
		$this->insert('ophnucounselling_caregivers_relationship2',array('name'=>'Father','display_order'=>2));

		$this->createTable('ophnucounselling_caregivers_sw_present', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_caregivers_sw_present_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_caregivers_sw_present_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_caregivers_sw_present_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_sw_present_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_caregivers_sw_present',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnucounselling_caregivers_sw_present',array('name'=>'No','display_order'=>2));
		$this->insert('ophnucounselling_caregivers_sw_present',array('name'=>'N/A','display_order'=>3));



		$this->createTable('et_ophnucounselling_caregivers', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'caregivers_present_id' => 'int(10) unsigned NOT NULL',

				'name_id' => 'int(10) unsigned NOT NULL',

				'relationship_id' => 'int(10) unsigned NOT NULL',

				'name2' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'relationship2_id' => 'int(10) unsigned NOT NULL',

				'sw_present_id' => 'int(10) unsigned NOT NULL',

				'sw1name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'sw2name' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_caregivers_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_caregivers_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_caregivers_ev_fk` (`event_id`)',
				'KEY `ophnucounselling_caregivers_caregivers_present_fk` (`caregivers_present_id`)',
				'KEY `ophnucounselling_caregivers_name_fk` (`name_id`)',
				'KEY `ophnucounselling_caregivers_relationship_fk` (`relationship_id`)',
				'KEY `ophnucounselling_caregivers_relationship2_fk` (`relationship2_id`)',
				'KEY `ophnucounselling_caregivers_sw_present_fk` (`sw_present_id`)',
				'CONSTRAINT `et_ophnucounselling_caregivers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_caregivers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_caregivers_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_caregivers_present_fk` FOREIGN KEY (`caregivers_present_id`) REFERENCES `ophnucounselling_caregivers_caregivers_present` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_name_fk` FOREIGN KEY (`name_id`) REFERENCES `ophnucounselling_caregivers_name` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_relationship_fk` FOREIGN KEY (`relationship_id`) REFERENCES `ophnucounselling_caregivers_relationship` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_relationship2_fk` FOREIGN KEY (`relationship2_id`) REFERENCES `ophnucounselling_caregivers_relationship2` (`id`)',
				'CONSTRAINT `ophnucounselling_caregivers_sw_present_fk` FOREIGN KEY (`sw_present_id`) REFERENCES `ophnucounselling_caregivers_sw_present` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnucounselling_precounsellingemo', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'agreeable' => 'tinyint(1) unsigned NOT NULL',

				'disagree' => 'tinyint(1) unsigned NOT NULL',

				'disapointed' => 'tinyint(1) unsigned NOT NULL',

				'agitated' => 'tinyint(1) unsigned NOT NULL',

				'angry' => 'tinyint(1) unsigned NOT NULL',

				'anxious' => 'tinyint(1) unsigned NOT NULL',

				'confused' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_precounsellingemo_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_precounsellingemo_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_precounsellingemo_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnucounselling_precounsellingemo_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_precounsellingemo_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_precounsellingemo_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnucounselling_counsellingoutcome_counselling_outcome', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_counsellingoutcome_counselling_outcome_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_counsellingoutcome_counselling_outcome_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_counsellingoutcome_counselling_outcome_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_counsellingoutcome_counselling_outcome_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_counsellingoutcome_counselling_outcome',array('name'=>'Patient instructed to get glasses','display_order'=>1));
		$this->insert('ophnucounselling_counsellingoutcome_counselling_outcome',array('name'=>'Referred back to General Practioner for further medical treatment','display_order'=>2));
		$this->insert('ophnucounselling_counsellingoutcome_counselling_outcome',array('name'=>'Referred to Social Worker','display_order'=>3));
		$this->insert('ophnucounselling_counsellingoutcome_counselling_outcome',array('name'=>'Other','display_order'=>4));



		$this->createTable('et_ophnucounselling_counsellingoutcome', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'counselling_outcome_id' => 'int(10) unsigned NOT NULL DEFAULT 1',

				'other_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_counsellingoutcome_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_counsellingoutcome_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_counsellingoutcome_ev_fk` (`event_id`)',
				'KEY `ophnucounselling_counsellingoutcome_counselling_outcome_fk` (`counselling_outcome_id`)',
				'CONSTRAINT `et_ophnucounselling_counsellingoutcome_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_counsellingoutcome_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_counsellingoutcome_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnucounselling_counsellingoutcome_counselling_outcome_fk` FOREIGN KEY (`counselling_outcome_id`) REFERENCES `ophnucounselling_counsellingoutcome_counselling_outcome` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnucounselling_counsellingcomments', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_counsellingcomments_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_counsellingcomments_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_counsellingcomments_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnucounselling_counsellingcomments_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_counsellingcomments_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_counsellingcomments_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnucounselling_postcounsellingstatu', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'agreeable' => 'tinyint(1) unsigned NOT NULL',

				'disagree' => 'tinyint(1) unsigned NOT NULL',

				'disappointed' => 'tinyint(1) unsigned NOT NULL',

				'agitated' => 'tinyint(1) unsigned NOT NULL',

				'angry' => 'tinyint(1) unsigned NOT NULL',

				'anxious' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_postcounsellingstatu_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_postcounsellingstatu_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_postcounsellingstatu_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnucounselling_postcounsellingstatu_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_postcounsellingstatu_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_postcounsellingstatu_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnucounselling_satisfaction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'satisfaction_level' => 'int(10) NOT NULL DEFAULT \'5\'',

				'reason_for_satisfaction_level' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnucounselling_satisfaction_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnucounselling_satisfaction_cui_fk` (`created_user_id`)',
				'KEY `et_ophnucounselling_satisfaction_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnucounselling_satisfaction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_satisfaction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnucounselling_satisfaction_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		$this->dropTable('et_ophnucounselling_patientid');



		$this->dropTable('et_ophnucounselling_consultation');


		$this->dropTable('ophnucounselling_consultation_requested_by');

		$this->dropTable('et_ophnucounselling_translator');


		$this->dropTable('ophnucounselling_translator_translator_present');

		$this->dropTable('et_ophnucounselling_caregivers');


		$this->dropTable('ophnucounselling_caregivers_caregivers_present');
		$this->dropTable('ophnucounselling_caregivers_name');
		$this->dropTable('ophnucounselling_caregivers_relationship');
		$this->dropTable('ophnucounselling_caregivers_relationship2');
		$this->dropTable('ophnucounselling_caregivers_sw_present');

		$this->dropTable('et_ophnucounselling_precounsellingemo');



		$this->dropTable('et_ophnucounselling_counsellingoutcome');


		$this->dropTable('ophnucounselling_counsellingoutcome_counselling_outcome');

		$this->dropTable('et_ophnucounselling_counsellingcomments');



		$this->dropTable('et_ophnucounselling_postcounsellingstatu');



		$this->dropTable('et_ophnucounselling_satisfaction');




		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuCounselling'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}


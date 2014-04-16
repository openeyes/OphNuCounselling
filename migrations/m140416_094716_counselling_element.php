<?php

class m140416_094716_counselling_element extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuCounselling"))->queryRow();

		$this->update('element_type',array('name' => 'Counselling', 'class_name' => 'Element_OphNuCounselling_Counselling'), "event_type_id = {$event_type['id']} and class_name = 'Element_OphNuCounselling_CounsellingOutcome'");

		$this->delete('element_type',"event_type_id = {$event_type['id']} and class_name in ('Element_OphNuCounselling_PreCounsellingEmotions','Element_OphNuCounselling_CounsellingComments','Element_OphNuCounselling_PostCounsellingStatus')");

		$this->dropForeignKey('et_ophnucounselling_counsellingoutcome_lmui_fk','et_ophnucounselling_counsellingoutcome');
		$this->dropForeignKey('et_ophnucounselling_counsellingoutcome_cui_fk','et_ophnucounselling_counsellingoutcome');
		$this->dropForeignKey('et_ophnucounselling_counsellingoutcome_ev_fk','et_ophnucounselling_counsellingoutcome');
		$this->dropForeignKey('ophnucounselling_counsellingoutcome_counselling_outcome_fk','et_ophnucounselling_counsellingoutcome');

		$this->dropIndex('et_ophnucounselling_counsellingoutcome_lmui_fk','et_ophnucounselling_counsellingoutcome');
		$this->dropIndex('et_ophnucounselling_counsellingoutcome_cui_fk','et_ophnucounselling_counsellingoutcome');
		$this->dropIndex('et_ophnucounselling_counsellingoutcome_ev_fk','et_ophnucounselling_counsellingoutcome');
		$this->dropIndex('ophnucounselling_counsellingoutcome_counselling_outcome_fk','et_ophnucounselling_counsellingoutcome');

		$this->renameTable('et_ophnucounselling_counsellingoutcome','et_ophnucounselling_counselling');

		$this->createIndex('et_ophnucounselling_counselling_counselling_outcome_id','et_ophnucounselling_counselling','counselling_outcome_id');
		$this->createIndex('et_ophnucounselling_counselling_lmui_fk','et_ophnucounselling_counselling','last_modified_user_id');
		$this->createIndex('et_ophnucounselling_counselling_cui_fk','et_ophnucounselling_counselling','created_user_id');
		$this->createIndex('et_ophnucounselling_counselling_ev_fk','et_ophnucounselling_counselling','event_id');

		$this->addForeignKey('et_ophnucounselling_counselling_counselling_outcome_id','et_ophnucounselling_counselling','counselling_outcome_id','ophnucounselling_counsellingoutcome_counselling_outcome','id');
		$this->addForeignKey('et_ophnucounselling_counselling_lmui_fk','et_ophnucounselling_counselling','last_modified_user_id','user','id');
		$this->addForeignKey('et_ophnucounselling_counselling_cui_fk','et_ophnucounselling_counselling','created_user_id','user','id');
		$this->addForeignKey('et_ophnucounselling_counselling_ev_fk','et_ophnucounselling_counselling','event_id','event','id');

		$this->addColumn('et_ophnucounselling_counselling','comments','text not null');

		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment','element_id','et_ophnucounselling_counselling','id');

		$this->dropTable('et_ophnucounselling_counsellingcomments');
		$this->dropTable('et_ophnucounselling_postcounsellingstatu');
		$this->dropTable('et_ophnucounselling_precounsellingemo');
	}

	public function down()
	{
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

		$this->dropForeignKey('et_ophnucounselling_counselling_counselling_outcome_id','et_ophnucounselling_counselling');
		$this->dropForeignKey('et_ophnucounselling_counselling_lmui_fk','et_ophnucounselling_counselling');
		$this->dropForeignKey('et_ophnucounselling_counselling_cui_fk','et_ophnucounselling_counselling');
		$this->dropForeignKey('et_ophnucounselling_counselling_ev_fk','et_ophnucounselling_counselling');

		$this->dropIndex('et_ophnucounselling_counselling_counselling_outcome_id','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_lmui_fk','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_cui_fk','et_ophnucounselling_counselling');
		$this->dropIndex('et_ophnucounselling_counselling_ev_fk','et_ophnucounselling_counselling');

		$this->renameTable('et_ophnucounselling_counselling','et_ophnucounselling_counsellingoutcome');

		$this->createIndex('et_ophnucounselling_counsellingoutcome_lmui_fk','et_ophnucounselling_counsellingoutcome','last_modified_user_id');
		$this->createIndex('et_ophnucounselling_counsellingoutcome_cui_fk','et_ophnucounselling_counsellingoutcome','created_user_id');
		$this->createIndex('et_ophnucounselling_counsellingoutcome_ev_fk','et_ophnucounselling_counsellingoutcome','event_id');
		$this->createIndex('ophnucounselling_counsellingoutcome_counselling_outcome_fk','et_ophnucounselling_counsellingoutcome','counselling_outcome_id');

		$this->addForeignKey('et_ophnucounselling_counsellingoutcome_lmui_fk','et_ophnucounselling_counsellingoutcome','last_modified_user_id','user','id');
		$this->addForeignKey('et_ophnucounselling_counsellingoutcome_cui_fk','et_ophnucounselling_counsellingoutcome','created_user_id','user','id');
		$this->addForeignKey('et_ophnucounselling_counsellingoutcome_ev_fk','et_ophnucounselling_counsellingoutcome','event_id','event','id');
		$this->addForeignKey('ophnucounselling_counsellingoutcome_counselling_outcome_fk','et_ophnucounselling_counsellingoutcome','counselling_outcome_id','ophnucounselling_counsellingoutcome_counselling_outcome');

		$this->dropColumn('et_ophnucounselling_counsellingoutcome','comments');

		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment','element_id','et_ophnucounselling_precounsellingemo','id');

		$event_type = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuCounselling"))->queryRow();

		$this->update('element_type',array('name' => 'Counselling Outcome', 'class_name' => 'Element_OphNuCounselling_CounsellingOutcome'), "event_type_id = {$event_type['id']} and class_name = 'Element_OphNuCounselling_Counselling'");

		$this->insert('element_type', array('name' => 'Pre counselling emotions','class_name' => 'Element_OphNuCounselling_PreCounsellingEmotions', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		$this->insert('element_type', array('name' => 'Counselling Comments','class_name' => 'Element_OphNuCounselling_CounsellingComments', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		$this->insert('element_type', array('name' => 'Post Counselling Status','class_name' => 'Element_OphNuCounselling_PostCounsellingStatus', 'event_type_id' => $event_type['id'], 'display_order' => 1));
	}
}

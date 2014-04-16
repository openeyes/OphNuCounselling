<?php

class m140416_084049_checkboxes_become_multiselect extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnucounselling_precounsellingemo','agreeable');
		$this->dropColumn('et_ophnucounselling_precounsellingemo','disagree');
		$this->dropColumn('et_ophnucounselling_precounsellingemo','disapointed');
		$this->dropColumn('et_ophnucounselling_precounsellingemo','agitated');
		$this->dropColumn('et_ophnucounselling_precounsellingemo','angry');
		$this->dropColumn('et_ophnucounselling_precounsellingemo','anxious');
		$this->dropColumn('et_ophnucounselling_precounsellingemo','confused');

		$this->createTable('ophnucounselling_precounsellingemo_emotion', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_precounsellingemo_emotion_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_precounsellingemo_emotion_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnucounselling_precounsellingemo_emotion_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_precounsellingemo_emotion_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnucounselling_precounsellingemo_emotion',array('id'=>1,'name'=>'Agreeable','display_order'=>1));
		$this->insert('ophnucounselling_precounsellingemo_emotion',array('id'=>2,'name'=>'Disagreeable','display_order'=>2));
		$this->insert('ophnucounselling_precounsellingemo_emotion',array('id'=>3,'name'=>'Disappointed','display_order'=>3));
		$this->insert('ophnucounselling_precounsellingemo_emotion',array('id'=>4,'name'=>'Agitated','display_order'=>4));
		$this->insert('ophnucounselling_precounsellingemo_emotion',array('id'=>5,'name'=>'Angry','display_order'=>5));
		$this->insert('ophnucounselling_precounsellingemo_emotion',array('id'=>6,'name'=>'Anxious','display_order'=>6));
		$this->insert('ophnucounselling_precounsellingemo_emotion',array('id'=>7,'name'=>'Confused','display_order'=>7));

		$this->createTable('ophnucounselling_precounsellingemo_emotion_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'emotion_id' => 'int(10) unsigned not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_precounsellingemo_emotion_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_precounsellingemo_emotion_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnucounselling_precounsellingemo_emotion_assignment_ele_fk` (`element_id`)',
				'KEY `ophnucounselling_precounsellingemo_emotion_assignment_emo_fk` (`emotion_id`)',
				'CONSTRAINT `ophnucounselling_precounsellingemo_emotion_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_precounsellingemo_emotion_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_precounsellingemo_emotion_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnucounselling_precounsellingemo` (`id`)',
				'CONSTRAINT `ophnucounselling_precounsellingemo_emotion_assignment_emo_fk` FOREIGN KEY (`emotion_id`) REFERENCES `ophnucounselling_precounsellingemo_emotion` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophnucounselling_precounsellingemo_emotion_assignment');
		$this->dropTable('ophnucounselling_precounsellingemo_emotion');

		$this->addColumn('et_ophnucounselling_precounsellingemo','agreeable','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_precounsellingemo','disagree','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_precounsellingemo','disapointed','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_precounsellingemo','agitated','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_precounsellingemo','angry','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_precounsellingemo','anxious','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnucounselling_precounsellingemo','confused','tinyint(1) unsigned not null');
	}
}

<?php

class m140416_102503_fix_emotion_and_emotion_assignment_tables extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_lmui_fk','ophnucounselling_precounsellingemo_emotion');
		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_cui_fk','ophnucounselling_precounsellingemo_emotion');
		$this->dropIndex('ophnucounselling_precounsellingemo_emotion_lmui_fk','ophnucounselling_precounsellingemo_emotion');
		$this->dropIndex('ophnucounselling_precounsellingemo_emotion_cui_fk','ophnucounselling_precounsellingemo_emotion');

		$this->renameTable('ophnucounselling_precounsellingemo_emotion','ophnucounselling_emotion');

		$this->createIndex('ophnucounselling_emotion_lmui_fk','ophnucounselling_emotion','last_modified_user_id');
		$this->createIndex('ophnucounselling_emotion_cui_fk','ophnucounselling_emotion','created_user_id');
		$this->addForeignKey('ophnucounselling_emotion_lmui_fk','ophnucounselling_emotion','last_modified_user_id','user','id');
		$this->addForeignKey('ophnucounselling_emotion_cui_fk','ophnucounselling_emotion','created_user_id','user','id');


		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_lmui_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_cui_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->dropForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_emo_fk','ophnucounselling_precounsellingemo_emotion_assignment');

		$this->dropIndex('ophnucounselling_precounsellingemo_emotion_assignment_lmui_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->dropIndex('ophnucounselling_precounsellingemo_emotion_assignment_cui_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->dropIndex('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment');
		$this->dropIndex('ophnucounselling_precounsellingemo_emotion_assignment_emo_fk','ophnucounselling_precounsellingemo_emotion_assignment');

		$this->renameTable('ophnucounselling_precounsellingemo_emotion_assignment','ophnucounselling_pre_emotion_assignment');

		$this->createIndex('ophnucounselling_pre_emotion_assignment_lmui_fk','ophnucounselling_pre_emotion_assignment','last_modified_user_id');
		$this->createIndex('ophnucounselling_pre_emotion_assignment_cui_fk','ophnucounselling_pre_emotion_assignment','created_user_id');
		$this->createIndex('ophnucounselling_pre_emotion_assignment_ele_fk','ophnucounselling_pre_emotion_assignment','element_id');
		$this->createIndex('ophnucounselling_pre_emotion_assignment_emo_fk','ophnucounselling_pre_emotion_assignment','emotion_id');

		$this->addForeignKey('ophnucounselling_pre_emotion_assignment_lmui_fk','ophnucounselling_pre_emotion_assignment','last_modified_user_id','user','id');
		$this->addForeignKey('ophnucounselling_pre_emotion_assignment_cui_fk','ophnucounselling_pre_emotion_assignment','created_user_id','user','id');
		$this->addForeignKey('ophnucounselling_pre_emotion_assignment_ele_fk','ophnucounselling_pre_emotion_assignment','element_id','et_ophnucounselling_counselling','id');
		$this->addForeignKey('ophnucounselling_pre_emotion_assignment_emo_fk','ophnucounselling_pre_emotion_assignment','emotion_id','ophnucounselling_emotion','id');

		$this->createTable('ophnucounselling_post_emotion_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'emotion_id' => 'int(10) unsigned not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnucounselling_post_emotion_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnucounselling_post_emotion_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnucounselling_post_emotion_assignment_ele_fk` (`element_id`)',
				'KEY `ophnucounselling_post_emotion_assignment_emo_fk` (`emotion_id`)',
				'CONSTRAINT `ophnucounselling_post_emotion_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_post_emotion_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnucounselling_post_emotion_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnucounselling_counselling` (`id`)',
				'CONSTRAINT `ophnucounselling_post_emotion_assignment_emo_fk` FOREIGN KEY (`emotion_id`) REFERENCES `ophnucounselling_emotion` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('ophnucounselling_post_emotion_assignment');

		$this->dropForeignKey('ophnucounselling_pre_emotion_assignment_lmui_fk','ophnucounselling_pre_emotion_assignment');
		$this->dropForeignKey('ophnucounselling_pre_emotion_assignment_cui_fk','ophnucounselling_pre_emotion_assignment');
		$this->dropForeignKey('ophnucounselling_pre_emotion_assignment_ele_fk','ophnucounselling_pre_emotion_assignment');
		$this->dropForeignKey('ophnucounselling_pre_emotion_assignment_emo_fk','ophnucounselling_pre_emotion_assignment');

		$this->dropIndex('ophnucounselling_pre_emotion_assignment_lmui_fk','ophnucounselling_pre_emotion_assignment');
		$this->dropIndex('ophnucounselling_pre_emotion_assignment_cui_fk','ophnucounselling_pre_emotion_assignment');
		$this->dropIndex('ophnucounselling_pre_emotion_assignment_ele_fk','ophnucounselling_pre_emotion_assignment');
		$this->dropIndex('ophnucounselling_pre_emotion_assignment_emo_fk','ophnucounselling_pre_emotion_assignment');

		$this->renameTable('ophnucounselling_pre_emotion_assignment','ophnucounselling_precounsellingemo_emotion_assignment');

		$this->createIndex('ophnucounselling_precounsellingemo_emotion_assignment_lmui_fk','ophnucounselling_precounsellingemo_emotion_assignment','last_modified_user_id');
		$this->createIndex('ophnucounselling_precounsellingemo_emotion_assignment_cui_fk','ophnucounselling_precounsellingemo_emotion_assignment','created_user_id');
		$this->createIndex('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment','element_id');
		$this->createIndex('ophnucounselling_precounsellingemo_emotion_assignment_emo_fk','ophnucounselling_precounsellingemo_emotion_assignment','emotion_id');

		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_lmui_fk','ophnucounselling_precounsellingemo_emotion_assignment','last_modified_user_id','user','id');
		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_cui_fk','ophnucounselling_precounsellingemo_emotion_assignment','created_user_id','user','id');
		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_ele_fk','ophnucounselling_precounsellingemo_emotion_assignment','element_id','et_ophnucounselling_counselling','id');
		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_assignment_emo_fk','ophnucounselling_precounsellingemo_emotion_assignment','emotion_id','ophnucounselling_emotion','id');

		$this->dropForeignKey('ophnucounselling_emotion_lmui_fk','ophnucounselling_emotion');
		$this->dropForeignKey('ophnucounselling_emotion_cui_fk','ophnucounselling_emotion');
		$this->dropIndex('ophnucounselling_emotion_lmui_fk','ophnucounselling_emotion');
		$this->dropIndex('ophnucounselling_emotion_cui_fk','ophnucounselling_emotion');

		$this->renameTable('ophnucounselling_emotion','ophnucounselling_precounsellingemo_emotion');

		$this->createIndex('ophnucounselling_precounsellingemo_emotion_lmui_fk','ophnucounselling_precounsellingemo_emotion','last_modified_user_id');
		$this->createIndex('ophnucounselling_precounsellingemo_emotion_cui_fk','ophnucounselling_precounsellingemo_emotion','created_user_id');
		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_lmui_fk','ophnucounselling_precounsellingemo_emotion','last_modified_user_id','user','id');
		$this->addForeignKey('ophnucounselling_precounsellingemo_emotion_cui_fk','ophnucounselling_precounsellingemo_emotion','created_user_id','user','id');
	}
}

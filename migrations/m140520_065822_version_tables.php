<?php

class m140520_065822_version_tables extends OEMigration
{
	public $tables = array(
		'et_ophnucounselling_consultation',
		'et_ophnucounselling_counselling',
		'et_ophnucounselling_patientid',
		'et_ophnucounselling_satisfaction',
		'ophnucounselling_caregivers_caregivers_present',
		'ophnucounselling_caregivers_relationship',
		'ophnucounselling_caregivers_relationship2',
		'ophnucounselling_caregivers_sw_present',
		'ophnucounselling_consultation_reason',
		'ophnucounselling_consultation_reason_assignment',
		'ophnucounselling_consultation_requested_by',
		'ophnucounselling_counsellingoutcome_counselling_outcome',
		'ophnucounselling_emotion',
		'ophnucounselling_patientid_identifier',
		'ophnucounselling_patientid_identifier_assignment',
		'ophnucounselling_post_emotion_assignment',
		'ophnucounselling_pre_emotion_assignment',
		'ophnucounselling_translator_translator_present',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->versionExistingTable($table);
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropTable($table.'_version');
		}
	}
}

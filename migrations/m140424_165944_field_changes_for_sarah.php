<?php

class m140424_165944_field_changes_for_sarah extends CDbMigration
{
	public function up()
	{
		$this->delete('ophnucounselling_caregivers_caregivers_present',"name = 'NA'");

		$this->insert('ophnucounselling_caregivers_relationship',array('id'=>3,'name'=>'Relative','display_order'=>3));
		$this->insert('ophnucounselling_caregivers_relationship',array('id'=>4,'name'=>'Other','display_order'=>4));

		$this->insert('ophnucounselling_caregivers_relationship2',array('id'=>3,'name'=>'Relative','display_order'=>3));
		$this->insert('ophnucounselling_caregivers_relationship2',array('id'=>4,'name'=>'Other','display_order'=>4));

		$this->update('element_type',array('name' => 'Patient satisfaction with the counseling experience'),"class_name = 'Element_OphNuCounselling_PatientSatisfaction'");
	}

	public function down()
	{
		$this->update('element_type',array('name' => 'Patient Satisfaction'),"class_name = 'Element_OphNuCounselling_PatientSatisfaction'");

		$this->delete('ophnucounselling_caregivers_relationship',"name = 'Relative' or name = 'Other'");
		$this->insert('ophnucounselling_caregivers_caregivers_present',array('id'=>3,'name'=>'NA','display_order'=>3));

		$this->delete('ophnucounselling_caregivers_relationship2',"name = 'Relative' or name = 'Other'");
	}
}

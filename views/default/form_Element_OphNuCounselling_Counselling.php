<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name; ?></h3>
	</header>

	<div class="element-fields">
		<?php echo $form->radioButtons($element, 'translator_present_id', CHtml::listData(OphNuCounselling_Translator_TranslatorPresent::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array('class' => 'linked-fields', 'data-linked-fields' => 'translator_name', 'data-linked-values' => 'Yes','label-character'=>'?'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'translator_name', array('hide' => !$element->translator_present || $element->translator_present->name != 'Yes'), array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'caregivers_present_id', CHtml::listData(OphNuCounselling_CareGivers_CaregiversPresent::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array('class' => 'linked-fields', 'data-linked-fields' => 'relationship_1_name,relationship_1_id,relationship_2_name,relationship_2_id', 'data-linked-values' => 'Yes','label-character'=>'?'), array('label' => 3, 'field' => 4))?>
		<div id="div_Element_OphNuCounselling_Counselling_relationship_1_name" class="row field-row"<?php if ($element->caregivers_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuCounselling_Counselling_relationship_1_name"><?php echo $element->getAttributeLabel('relationship_1_name')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'relationship_1_name', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuCounselling_Counselling_relationship_1_id"><?php echo $element->getAttributeLabel('relationship_1_id')?>:</label>
					</div>
					<div class="large-3 column end">
						<?php echo $form->dropDownList($element, 'relationship_1_id', CHtml::listData(OphNuEducation_CareGivers_Relationship1::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('nowrapper' =>
 true, 'empty'=>'- Please select -'))?>
					</div>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuCounselling_Counselling_relationship_2_name" class="row field-row"<?php if ($element->caregivers_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuCounselling_Counselling_relationship_2_name"><?php echo $element->getAttributeLabel('relationship_2_name')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'relationship_2_name', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuCounselling_Counselling_relationship_2_id"><?php echo $element->getAttributeLabel('relationship_2_id')?>:</label>
					</div>
					<div class="large-3 column end">
						<?php echo $form->dropDownList($element, 'relationship_2_id', CHtml::listData(OphNuEducation_CareGivers_Relationship1::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('nowrapper' => true, 'empty'=>'- Please select -'))?>
					</div>
				</div>
			</div>
		</div>
		<?php echo $form->radioButtons($element, 'sw_present_id', CHtml::listData(OphNuCounselling_CareGivers_SwPresent::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array('class' => 'linked-fields', 'data-linked-fields' => 'sw1name,sw2name', 'data-linked-values' => 'Yes', 'label-character' => '?'), array('label' => 3, 'field' => 4))?>
		<div id="div_Element_OphNuCounselling_Counselling_sw1name" class="row field-row"<?php if ($element->sw_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuCounselling_Counselling_sw1name"><?php echo $element->getAttributeLabel('sw1name')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'sw1name', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuCounselling_Counselling_sw2name" class="row field-row"<?php if ($element->sw_present_id != 1) {?> style="display: none"<?php }?>>
			<div class="large-3 column">
				<label for="Element_OphNuCounselling_Counselling_sw2name"><?php echo $element->getAttributeLabel('sw2name')?>:</label>
			</div>
			<div class="large-9 column end">
				<div class="row field-row">
					<div class="large-4 column">
						<?php echo $form->textField($element, 'sw2name', array('nowrapper' => true), array(), array('label' => 3, 'field' => 4))?>
					</div>
				</div>
			</div>
		</div>
		<?php echo $form->multiSelectList($element, 'OphNuCounselling_Pre_Emotions', 'pre_emotions', 'id', $this->getEmotionList($element,'pre_emotions'), array(), array('empty' => '- Please select -', 'label' => 'Pre-counseling emotional status'),false,false,null,false,false,array('label' => 3, 'field'=>4))?>
		<?php echo $form->dropDownList($element, 'counselling_outcome_id', CHtml::listData(OphNuCounselling_CounsellingOutcome_CounsellingOutcome::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','class' => 'linked-fields', 'data-linked-fields' => 'other_comments', 'data-linked-values' => 'Other (please specify)'),false,array('label'=>3,'field'=>4))?>
		<?php echo $form->textArea($element, 'other_comments', array(), !$element->counselling_outcome || $element->counselling_outcome->name != 'Other (please specify)', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'comments', array(), false, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'OphNuCounselling_Post_Emotions', 'post_emotions', 'id', $this->getEmotionList($element,'post_emotions'), array(), array('empty' => '- Please select -', 'label' => 'Post-counseling emotional status'),false,false,null,false,false,array('label' => 3, 'field' => 4))?>
	</div>
</section>

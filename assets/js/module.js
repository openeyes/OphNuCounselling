
/* Module-specific javascript can be placed here */

$(document).ready(function() {
			handleButton($('#et_save'),function() {
					});
	
	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'));

	handleButton($('#et_print'),function(e) {
		printIFrameUrl(OE_print_url, null);
		enableButtons();
		e.preventDefault();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$('input[name="Element_OphNuCounselling_Translator[translator_present_id]"]').click(function() {
		if ($(this).val() == '1') {
			$('#div_Element_OphNuCounselling_Translator_name').show();
			$('#Element_OphNuCounselling_Translator_name').focus();
		} else {
			$('#div_Element_OphNuCounselling_Translator_name').hide();
			$('#Element_OphNuCounselling_Translator_name_of_translator').val('');
		}
	});

	$('input[name="Element_OphNuCounselling_CareGivers[caregivers_present_id]"]').click(function() {
		if ($(this).val() == '1') {
			$('#div_Element_OphNuCounselling_CareGivers_relationship_1_name').show();
			$('#div_Element_OphNuCounselling_CareGivers_relationship_2_name').show();
			$('#Element_OphNuCounselling_CareGivers_relationship_1_name').focus();
		} else {
			$('#div_Element_OphNuCounselling_CareGivers_relationship_1_name').hide();
			$('#div_Element_OphNuCounselling_CareGivers_relationship_2_name').hide();
			$('#Element_OphNuCounselling_CareGivers_relationship_1_name').val('');
			$('#Element_OphNuCounselling_CareGivers_relationship_2_name').val('');
			$('#Element_OphNuCounselling_CareGivers_relationship_1_id').val('');
			$('#Element_OphNuCounselling_CareGivers_relationship_2_id').val('');
		}
	});

	$('input[name="Element_OphNuCounselling_CareGivers[sw_present_id]"]').click(function() {
		if ($(this).val() == '1') {
			$('#div_Element_OphNuCounselling_CareGivers_sw1name').show();
			$('#div_Element_OphNuCounselling_CareGivers_sw2name').show();
			$('#Element_OphNuCounselling_CareGivers_sw1name').focus();
		} else {
			$('#div_Element_OphNuCounselling_CareGivers_sw1name').hide();
			$('#div_Element_OphNuCounselling_CareGivers_sw2name').hide();
			$('#Element_OphNuCounselling_CareGivers_sw1name').val('');
			$('#Element_OphNuCounselling_CareGivers_sw2name').val('');
		}
	});

	$('#Element_OphNuCounselling_Consultation_reason_id').change(function() {
		if ($(this).children('option:selected').text() == 'Other (please specify)') {
			$('#div_Element_OphNuCounselling_Consultation_other_comments').show();
			$('#Element_OphNuCounselling_Consultation_other_comments').focus();
		} else {
			$('#div_Element_OphNuCounselling_Consultation_other_comments').hide();
			$('#Element_OphNuCounselling_Consultation_other_comments').val('');
		}
	});

	$('#Element_OphNuCounselling_Counselling_counselling_outcome_id').change(function() {
		if ($(this).children('option:selected').text() == 'Other (please specify)') {
			$('#div_Element_OphNuCounselling_Counselling_other_comments').show();
			$('#Element_OphNuCounselling_Counselling_other_comments').focus();
		} else {
			$('#div_Element_OphNuCounselling_Counselling_other_comments').hide();
			$('#Element_OphNuCounselling_Counselling_other_comments').val('');
		}
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}

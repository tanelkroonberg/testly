var current_type_id = 2;
var questions_table_body;
var n_test_id = 0;
var question_type;
var question_text;


function addMultipleChoice() {
	var html = '<div class="answer-option"><input type="radio" name="mc.correct" value="<id>"  />&nbsp<textarea name="mc.answer.<id>"></textarea></div>';
	var id = $('#multiple-choice-options textarea').length;
	alert(id);
	html = html.replace(/<id>/g, id+1);
	$('#multiple-choice-options').append(html);
	return false;
}
function addMultipleResponse() {
	var html = '<div class="answer-option"><input type="checkbox" name="mr.correct" value="<id>"  />&nbsp<textarea name="mr.answer.<id>"></textarea></div>';
	var id = $('#multiple-response-answer-options textarea').count();
	alert(id);
	html = html.replace(/<id>/g, id);
	$('#multiple-response-answer-option').append(html);
	return false;
}

function removeMultipleChoice() {
	if($('#multiple-choice-options textarea').length > 1)
		$('#multiple-choice-options .answer-option:last').remove();
	return false;
}
function removeMultipleResponse() {
	if($('#multiple-response-answer-option textarea').length > 1)
		$('#multiple-response-answer-option .answer-option:last').remove();
	return false;
}


function checkForm(){
	var elements = $('#type_id_' + current_type_id + ' input[type=checkbox]:not(.shuffle_answers), #type_id_' + current_type_id + ' input[type=radio]:not(#shuffle)');
	var textboxes = $('#type_id_' + current_type_id + ' textarea');
	for(var i = 0; i < elements.length; i++){
		if($(elements[i]).attr('checked') && $.trim($(textboxes[i]).val()) != "")
			return true
	}
	alert("Please mark which answer is correct");
	return false;
}
function remove_question_ajax(id){
	alert(id);
	if($('table#questions-table')){
	$.post(BASE_URL + "tests/remove_question/" + id)
		.done(function (data) {
			if (data == 'OK') {
				$('table#questions-table>tbody>tr#question' + id).remove();
				alert("Turniir kustutatud");
			}
			else
				alert("Viga\n\nServer vastas: '" + data + "'.\n\nKontakteeru arendajaga.");
		});
	}
}
function add_question_wrapper() {
	var text = $('#question-text').val();
	var type = current_type_id;
	alert(type);

	add_question(text, type);
}
function add_question(text, type){
	questions_table_body.append('' +
		'<tr id="new_test' + n_test_id + '">' +
		'<td>' +  + '</td>' +
		'<td><a data-toggle="modal" data-target="#myModal" href="#myModal">' + text + '</a> </td>' +
		'<td>' + type + '</td>' +
		'<td><a href="#" onclick="if (confirm(' + "'Oled kindel?')) remove_test('new_test" + n_test_id + "')" + '"><i class="icon-trash"></i></a>' +
		'</td>' +
		'</tr>');
}
function reset_numbers() {

	// Initialize row counter
	var n = 1;

	// Iterate through each first cell in every row in participants table and write row number
	questions_table_body.find('>tr>td:nth-child(1)').each(function () {
		$(this).html(n++ + '.');
	});
}

function remove_test(){

}

$(function(){
	$('#answer-template .answer-template').hide();
	$('#type_id_' + current_type_id).show();
	$('#type_id').bind('click change focus', function(event){
		if($(this).val() != current_type_id){
			$('#answer-template .answer-template').hide();
			current_type_id = $(this).val();
			$('#type_id_' + current_type_id).show();
		}
	});

	// Cache repetitive and expensive jQuery element finding operation results to variables (makes it faster)
	//test_id = $('input[type=hidden]#test_id').val();
	questions_table_body = $('table#questions-table > tbody:last');


	// change select box
	var list = $('#type_id option');
	for(var i = 0; i < list.length; i++){
		if($(list[i]).val() == current_type_id){
			$(list[i]).attr('selected', 'selected')
	}
	}

	$('textarea:first').focus();
});
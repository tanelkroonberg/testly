<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css"/>
<script>
	$(function() {
		$("#tabs").tabs();
	});
</script>
<style>
	#buttons{
		clear: both;
		margin-bottom: 15px;
		margin-left: 30px;
	}
	#question-button{
		margin-bottom: 10px;
	}

</style>
<div id="buttons" >
	<input type="hidden" id="test_id" value="<?=$tests['test_id']?>" name="test[test_id]">
	<a class="btn btn-large btn-inverse" href="<?=BASE_URL?>tests">Loobu</a>
	<button class="btn btn-large btn-primary" type="button" onclick="submit1()">Salvesta</button></div>


<div id="tabs" class="rows">
	<ul>
		<li><a href="#tabs-1">Üldine</a></li>
		<li><a href="#tabs-2">Küsimused</a></li>
		<li><a href="#tabs-3">Raportid</a></li>
	</ul>
	<div id="tabs-1">
		<form method="post">
			<label>Testi nimi</label>
			<input type="text" name="name" value="<?=$tests['name']?>">
			<label>Sissejuhatus</label>
			<textarea name="introduction"><?=$tests['introduction']?></textarea>
			<label>Kokkuvõte</label>
			<textarea name="conclusion"><?=$tests['conclusion']?></textarea>
			<label>Passcode</label>
			<input type="text" name="passcode" value="<?=$tests['passcode']?>">
		</form>
	</div>
	<div id="tabs-2">

			<div class="span6">
				<table id="questions-table" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>#</th>
						<th>Küsimus</th>
						<th>Tüüp</th>
						<th>Tegevused</th>
					</tr>
					</thead>
					<tbody>
					<? if (! empty($questions)): {
						$i = 1;
						foreach ($questions as $question):?>
							<tr id="e_question_<?=$question['question_id']?>">
								<td>
									<?=$i ++?>.
								</td>
								<td>
									<a data-toggle="modal" data-target="#myModal" href="#myModal"
									   onclick="newwindow = window.open(BASE_URL+'tests/view_question/','name','height=500, width=650','resizable=no');
							if (window.focus) {newwindow.focus()} return false;"
									   id="e_question_name"><?=$question['question_text']?></a>
								</td>
								<td>
									<?=$question['question_type']?>
								</td>
								<td>
									<a href="#" onclick="if (!confirm('Oled kindel?'))return false;
										remove_question_ajax('e_question<?=$question['question_id'] ?>'); return false;
										"><i
											class="icon-trash">
								</td>
							</tr>
						<? endforeach; }endif?>
					</tbody>
				</table>

			</div>
			<div class="span6">
				<button id="question-button" class="btn btn-large btn-primary" type="button" onclick="add_question_wrapper();
		reset_numbers()">Lisa
					küsimus</button>
		<p>Küsimus</p>
		<textarea id="question-text" name="question_text"></textarea>
		<p>Tüüp</p>
		<select name="type_id" id="type_id">
			<option value="1">Jah/Ei</option>
			<option value="2" selected="selected">Mitu õiget</option>
			<option value="3">Mitu õiget</option>
			<option value="4">Täida lünk</option>
		</select>
		<div id="answer-template">
			<div id="type_id_1" class="answer-template">
				<p>Sisesta kaks vastust ja märgi ära õige vastus</p>
				<input type="radio" name="tf.correct" value="0" checked="checked">
				<textarea name="answer.0">Õige</textarea>
				<input type="radio" name="tf.correct" value="1">
				<textarea name="answer.1">Väär</textarea>
			</div>
			<div id="type_id_2" class="answer-template">
				<p>Sisesta vastusevariandid ja märgi ära missugune variant on õige</p>
				<a href="#" onclick="return addMultipleChoice()">Lisa</a> / <a href="#" onclick="return removeMultipleChoice()
				">Eemalda</a> vastuse variant
				<div id="multiple-choice-options">
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="0" checked="checked">
						<textarea name="mc.answer.0"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="1">
						<textarea name="mc.answer.1"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="2">
						<textarea name="mc.answer.2"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="3">
						<textarea name="mc.answer.3"></textarea>
					</div>
				</div>
			</div>
			<div id="type_id_3" class="answer-template">
				<p>Sisesta vastusevariandid ja märgi ära missugused variandid on õiged</p>
				<a href="#" onclick="return addMultipleResponse()">Lisa</a> / <a href="#"
				onclick="return removeMultipleResponse()
				">Eemalda</a> vastuse variant
				<div id="multiple-response-answer-option">
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.0"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.1"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.2"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.3"></textarea>
					</div>
				</div>
			</div>

			<div id="type_id_4" class="answer-template">
				<p>Sisesta võimalikud vastusevariandid(Üks vastus ühte kasti)</p>
				<div id="fill-in-the-blank-answer-option">
					<div class="answer-option">
						<input type="checkbox" name="fitb.correct" checked="checked" disabled="true">
						<textarea name="fitb.answer.0"></textarea>
					</div>
				</div>
			</div>
		</div>
			</div>

	</div>
	<div id="tabs-3">
	</div>
</div>
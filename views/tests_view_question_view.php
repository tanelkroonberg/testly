<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= ASSETS_URL ?>css/normalize.css">
	<script src="<?= ASSETS_URL ?>js/vendor/modernizr-2.6.2.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?=ASSETS_URL?>js/vendor/jquery-1.9.1.min.js"><\/script>')
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script src="<?= ASSETS_URL ?>js/plugins.js"></script>
	<script src="<?= ASSETS_URL ?>js/main.js"></script>
	<script>BASE_URL = '<?=BASE_URL?>'</script>
	<?if (! empty($this->scripts)) : ?>
		<? foreach ($this->scripts as $script) : ?>
			<script src="<?= ASSETS_URL ?>js/<?= $script ?>"></script>
		<? endforeach ?>
	<? endif?>
	<style>
		html, body {
			height: 100%;
			background: url('<?=ASSETS_URL?>img/bg.png');
		}
	</style>
</head>
<body>
<button id="question-button" class="btn btn-large btn-primary" type="button" onclick="change_question()">Salvesta
</button>
<p>Küsimus</p>
<textarea name="question_text"></textarea>

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
		<a href="#" onclick="return addMultipleChoice()">Lisa</a> / <a href="#"
		onclick="return removeMultipleChoice()">Eemalda</a> vastuse variant
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
		onclick="return removeMultipleResponse()">Eemalda</a> vastuse variant
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
</body>
</html>
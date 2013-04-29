<h2 class="form-signin-heading">Testid</h2>
<p><a id="add_new_test" class="btn btn-large btn-primary" href="#">Lisa uus test</a></p>
<table id="tests-table" class="table table-bordered table-striped">
	<thead>
	<tr>
		<th>
			Testi nimi
		</th>
		<th>
			Testi koostaja
		</th>
		<th>
			Aeg
		</th>
		<th>
			Tegevused
		</th>
	</tr>
	</thead>
	<tbody>
	<? if (! empty ($tests)): foreach ($tests as $test): ?>
		<tr id="test<?=$test['test_id']?>">
			<td>
				<?=$test['name']?>
			</td>
			<td>
				<?=$test['username']?>
			</td>
			<td>
				<?=substr($test['created'], 0, 10)?>
			</td>
			<td>
				<?if(!empty($status)&&$status=='teacher'):?>
				<a href="<?=BASE_URL?>tests/edit/<?=$test['test_id']?>">Vaata<i
						class="icon-pencil"></i></a>
				<? endif?>
				<a href="#"
				   onclick="if (!confirm('Oled kindel?')) return false;
					   remove_test_ajax(<?=$test['test_id']?>);return false
					   ">Kustuta <i class="icon-trash"></i></a>
			</td>
<!-- remove_test_ajax(<?=$test['test_id']?>);return false-->
		</tr>
	<? endforeach; endif ?>
	</tbody>
</table>
<div hidden=""></div>
<link rel="stylesheet" type="text/css" href="<?=ASSETS_URL?>css/jquery.confirm.css" />

<div id="page" style="display: none">

	<div class="item">y
		<div class="delete">x</div>
	</div>
</div>

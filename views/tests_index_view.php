<h2 class="form-signin-heading">Testid</h2>
<p><a class="btn btn-large btn-primary" href="<?=BASE_URL?>tests/add">Lisa uus test</a></p>
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
		<tr id="test<?=['test_id'] ?>">
			<td>
				<?=$test['name']?>
			</td>
			<td>
				<?=$test['username']?>
			</td>
			<td>
				<?=$test['created']?>
			</td>
			<td>
				<?="Vaata"?>
				<a href="<?=BASE_URL?>tests/view/<?=$test['test_id']?>"><i
						class="icon-pencil"></i></a>
				<a href="<?= BASE_URL ?>tests/remove/<?=$test['test_id']?>"
				   onclick="if (!confirm('Oled kindel?'))return false; remove_tournament_ajax
					   (<?=$test['test_id']?>); return false">Kustuta <i class="icon-trash"></i></a>
			</td>

		</tr>
	<? endforeach; endif ?>
	</tbody>
</table>
<div hidden=""></div>
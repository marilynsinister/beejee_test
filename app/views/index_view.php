<div class="row">
	<div class="col-12">
		<div class="h1"><h1>Список задач</h1></div>
	</div>

</div>

<div class="row">
	<div class="col-10">
		<nav aria-label="...">
			<ul class="pagination">
				<li class="page-item<?=(($data['nav']['page'] - 1 <= 0)?" disabled":"")?>">
					<a class="page-link" href="<?=z_add_url_get(array('page' => $data['nav']['page'] - 1))?>?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<? for ($i = 1; $i <= $data['nav']['num_pages']; $i++): ?>

				<li class="page-item<?=(($data['nav']['page'] == $i)?" active":"")?>"><a class="page-link" href="<?=z_add_url_get(array('page' => $i))?>"><?=$i?></a></li>
				<? endfor; ?>
				<li class="page-item<?=(($data['nav']['page'] + 1 > $data['nav']['num_pages'])?" disabled":"")?>">
					<a class="page-link" href="<?=z_add_url_get(array('page' => $data['nav']['page'] + 1))?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="col-2">
		<a href="/task/add/" class="btn btn-primary">Добавить новую</a>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<? if (isset($_GET['success_at']) && $_GET['success_at'] == 1): ?>
			<div class="alert alert-success" role="alert">
				Задача успешно добавлена.
			</div>
		<? elseif(isset($_GET['success_at']) && $_GET['success_at'] == 0): ?>
			<div class="alert alert-danger" role="alert">
				Что-то пошло не так
			</div>
		<? endif; ?>

		<? if (isset($_GET['success_et']) && $_GET['success_et'] == 1): ?>
			<div class="alert alert-success" role="alert">
				Задача успешно отредактирована.
			</div>
		<? elseif(isset($_GET['success_et']) && $_GET['success_et'] == 0): ?>
			<div class="alert alert-danger" role="alert">
				Что-то пошло не так
			</div>
		<? endif; ?>

	</div>
</div>
<div class="row">
	<div class="col-12">

		<table class="table table-hover c-table">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">
					<a href="<?=((isset($_GET['order']) && $_GET['order']=='asc')?z_add_url_get(array('sort' => 'name', 'order' => 'desc')):z_add_url_get(array('sort' => 'name', 'order' => 'asc')))?>">
						Имя
						<?if (isset($_GET['sort']) && $_GET['sort'] == 'name'){
							if ($_GET['order']=='asc') echo '&#9650;';
							else echo '&#9660;';
						}?>
					</a>
				</th>
				<th scope="col">
					<a href="<?=((isset($_GET['order']) && $_GET['order']=='asc')?z_add_url_get(array('sort' => 'email', 'order' => 'desc')):z_add_url_get(array('sort' => 'email', 'order' => 'asc')))?>">
						Email
						<?if (isset($_GET['sort']) && $_GET['sort'] == 'email'){
							if ($_GET['order']=='asc') echo '&#9650;';
							else echo '&#9660;';
						}?>
					</a>
				</th>
				<th scope="col">Задача</th>
				<th scope="col">
					<a href="<?=((isset($_GET['order']) && $_GET['order']=='asc')?z_add_url_get(array('sort' => 'status', 'order' => 'desc')):z_add_url_get(array('sort' => 'status', 'order' => 'asc')))?>">
						Статус
						<?if (isset($_GET['sort']) && $_GET['sort'] == 'status'){
							if ($_GET['order']=='asc') echo '&#9650;';
							else echo '&#9660;';
						}?>
					</a>
				</th>
				<? if (isset($_SESSION['user'])): ?>

				<th scope="col">
				</th>

				<? endif; ?>
			</tr>
			</thead>
			<tbody>
			<? foreach ($data['items'] as $item): ?>
			<tr>
				<th scope="row"><?=$item['ID']?></th>
				<td><?=$item['USER_NAME']?></td>
				<td><?=$item['USER_EMAIL']?></td>
				<td><?=$item['TEXT']?></td>
				<td>
					<? if ($item['COMPLETED'] == 0): ?>
						<span class="badge badge-pill badge-danger">Не выполнено</span>
					<? else: ?>
						<span class="badge badge-pill badge-success">Выполнено</span>
					<? endif; ?>
				</td>
				<? if (isset($_SESSION['user'])): ?>
					<td><a href="/task/edit/<?=$item['ID']?>/" class="btn btn-primary">edit</a></td>
				<? endif; ?>

			</tr>
			<? endforeach;?>

			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<nav aria-label="...">
			<ul class="pagination">
				<li class="page-item<?=(($data['nav']['page'] - 1 <= 0)?" disabled":"")?>">
					<a class="page-link" href="<?=z_add_url_get(array('page' => $data['nav']['page'] - 1))?>?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<? for ($i = 1; $i <= $data['nav']['num_pages']; $i++): ?>

					<li class="page-item<?=(($data['nav']['page'] == $i)?" active":"")?>"><a class="page-link" href="<?=z_add_url_get(array('page' => $i))?>"><?=$i?></a></li>
				<? endfor; ?>
				<li class="page-item<?=(($data['nav']['page'] + 1 > $data['nav']['num_pages'])?" disabled":"")?>">
					<a class="page-link" href="<?=z_add_url_get(array('page' => $data['nav']['page'] + 1))?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="h1"><h1>Список задач</h1></div>
	</div>

</div>
<div class="row">
	<div class="col-8">
		<nav aria-label="...">
			<ul class="pagination">
				<li class="page-item<?=(($data['nav']['page'] - 1 <= 0)?" disabled":"")?>">
					<a class="page-link" href="?page=<?=$data['nav']['page'] - 1?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<? for ($i = 1; $i <= $data['nav']['num_pages']; $i++): ?>

				<li class="page-item<?=(($data['nav']['page'] == $i)?" active":"")?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
				<? endfor; ?>
				<li class="page-item<?=(($data['nav']['page'] + 1 > $data['nav']['num_pages'])?" disabled":"")?>">
					<a class="page-link" href="?page=<?=$data['nav']['page'] + 1?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="col-4">
		<a href="/task/add/" class="btn btn-primary">Добавить новую</a>
	</div>
</div>
<div class="row">
	<div class="col-12">

		<table class="table table-hover">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Имя</th>
				<th scope="col">Email</th>
				<th scope="col">Задача</th>
				<th scope="col">Статус</th>
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
					<a class="page-link" href="?page=<?=$data['nav']['page'] - 1?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<? for ($i = 1; $i <= $data['nav']['num_pages']; $i++): ?>

					<li class="page-item<?=(($data['nav']['page'] == $i)?" active":"")?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
				<? endfor; ?>
				<li class="page-item<?=(($data['nav']['page'] + 1 > $data['nav']['num_pages'])?" disabled":"")?>">
					<a class="page-link" href="?page=<?=$data['nav']['page'] + 1?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
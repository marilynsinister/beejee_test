<div class="row">
	<div class="col-12">

		<h1>Редактирование задачи #<?=$data['ID']?></h1>
		<form method="post">

			<div class="form-group">
				<label for="InputTask">Текст задачи</label>
				<textarea  name="task" class="form-control needs-validation" id="InputTask" placeholder="Текст задачи" required><?=$data['TEXT']?></textarea>
			</div>
			<div class="form-check">
				<input type="checkbox" name="completed"  class="form-check-input" id="completed" <?=(($data['COMPLETED'] == 1)?" checked": "")?>>
				<label class="form-check-label" for="completed">Выполнено</label>
			</div>
			<button type="submit" name="submit" value="1" class="btn btn-primary">Создать</button>
		</form>
	</div>
</div>
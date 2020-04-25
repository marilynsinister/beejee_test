<div class="row">
	<div class="col-12">

		<h1>Новая задача</h1>
		<form method="post">
			<div class="form-group">
				<label for="InputName">Имя пользователя</label>
				<input type="text" name="username" class="form-control" id="InputName"  placeholder="Enter name">
			</div>
			<div class="form-group">
				<label for="InputEmail">Email</label>
				<input type="email" name="email" class="form-control" id="InputEmail"  placeholder="Введите email">
			</div>
			<div class="form-group">
				<label for="InputTask">Текст задачи</label>
				<textarea  name="task" class="form-control" id="InputTask" placeholder="Текст задачи"></textarea>
			</div>

			<button type="submit" name="submit" value="1" class="btn btn-primary">Создать</button>
		</form>
	</div>
</div>
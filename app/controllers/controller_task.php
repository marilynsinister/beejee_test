<?
class Controller_Task extends Controller
{
	function __construct()
	{
		$this->model = new Model_Task();
		$this->view = new View();
	}
	function action_list()
	{
		$this->view->generate('index_view.php', 'main_view.php');
	}

	function action_add()
	{

		if (isset($_POST['submit'])){

			$last_id = $this->model->add($_POST);

			if ($last_id > 0) {
				header("Location: /?success_at=1");
			}
			else{
				header("Location: /?success_at=0");
			}
		}
		$this->view->generate('task/add_view.php', 'main_view.php');
	}

	function action_edit($id)
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['ADMIN'] == 1) {

			if (empty($id)) Router::ErrorPage404();

			$task = $this->model->get_one($id);

			if (isset($_POST['submit'])) {

				if (isset($_POST['completed']) && $_POST['completed'] == 'on'){
					$_POST['completed'] = 1;
				}
				else{
					$_POST['completed'] = 0;

				}
				$_POST['id'] = $id;
				$success = $this->model->edit($_POST);

				if ($success == '00000') {
					header("Location: /?success_et=1");
				}
				else{
					header("Location: /?success_et=0");
				}
			}
			$this->view->generate('task/edit_view.php', 'main_view.php', $task);
		}
		else{
			Router::ErrorPage404();
		}
	}
}
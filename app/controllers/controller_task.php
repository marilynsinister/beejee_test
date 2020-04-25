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

		if (isset($_POST['sumbit'])){

			$last_id = $this->model->add($_POST);
		}
		$this->view->generate('task/add_view.php', 'main_view.php');
	}
}
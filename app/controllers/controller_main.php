<?
class Controller_Main extends Controller
{
	function action_index()
	{
		include "app/models/model_task.php";
		$this->model = new Model_Task();

		$page = 1;
		if (!empty($_GET['page'])) {
			$page = intval($_GET['page']);
		}

		$nav_params = array(
			'page' 	=> $page,
			'num'  	=> 3,
			'total' => $this->model->get_num_all(),

		);

		$nav_params['num_pages'] = ceil($nav_params['total'] / $nav_params['num']);
		//dz($this->model->get_num_all());

		$nav_params['offset'] = ($nav_params['page'] * $nav_params['num']) - $nav_params['num']; // определяем, с какой записи нам выводить

		$items = $this->model->get_list($nav_params);

		$data = array(
			'items' => $items,
			'nav' 	=> $nav_params,
		);

		$this->view->generate('index_view.php', 'main_view.php', $data);
	}
}
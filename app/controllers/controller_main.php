<?
class Controller_Main extends Controller
{
	function action_index()
	{
		$this->view->generate('index_view.php', 'main_view.php');
	}
}
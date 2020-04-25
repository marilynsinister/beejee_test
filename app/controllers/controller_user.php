<?
class Controller_User extends Controller
{
	function __construct()
	{
		$this->model = new Model_User();
		$this->view = new View();
	}

	public function action_login()
	{

		if (isset($_POST['submit'])) {

			session_start();

			$userId = $this->model->get_user_id($_POST);

			if (!empty($userId))
				$_SESSION['user'] = $userId;

			header("Location: /");

		}

		$this->view->generate('user/login_view.php', 'main_view.php');
	}

	public function action_logout()
	{
		unset($_SESSION["user"]);
		session_destroy();
		header("Location: /");
		return true;
	}
}
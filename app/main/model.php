<?
class Model
{
	protected $db;

	public function __construct(){

		$this->db = new Database();
		$this->db->exec("set names utf8");
	}

	public function get_list()
	{
	}
}
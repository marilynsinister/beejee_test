<?
class Model_Task extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public  function get_num_all()
	{

		$total = $this->db->query('SELECT * from `tasks` WHERE `tasks`.`ACTIVE` = 1')->rowCount();

		return $total;
	}
	public  function get_list($nav_params = array()){

		$data = array();



		$sql = 'SELECT * from `tasks` WHERE `tasks`.`ACTIVE` = 1';

		if (!empty($nav_params['page'])){
			$sql .= ' LIMIT :offset, :num';
		}

		$rs = $this->db->prepare($sql);
		$rs->bindValue(':offset', (int) $nav_params['offset'], PDO::PARAM_INT);
		$rs->bindValue(':num', (int) $nav_params['num'], PDO::PARAM_INT);
		$rs->execute();

		$rs->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $rs->fetch())
		{
			$data[] = $row;
		}

		return $data;
	}

	public  function add($data){

		$rs = $this->db->prepare("INSERT INTO `tasks` (USER_NAME, USER_EMAIL, TEXT, COMPLETED, ACTIVE) VALUES (:username, :useremail, :task, 0, 1)");
		$rs->execute([':username' => $data['username'], ':useremail' => $data['email'], ':task' => $data['task']]);
		$rs->fetch();


		return $this->db->lastInsertId();
	}
}
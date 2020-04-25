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
	public  function get_list($nav_params = array(), $sort = array()){

		$data = array();

		if (empty($sort)){
			$sort = array(
				'field' => 'ID',
				'order' => 'DESC',
			);
		}


		$sql = 'SELECT * from `tasks` WHERE `tasks`.`ACTIVE` = 1';

		if (!empty($sort['field'])){
			$sql .= ' ORDER BY ' . $sort['field'] . ' ' . $sort['order'];
		}

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

	public  function get_one($id){
		$sql = 'SELECT * from `tasks` WHERE `tasks`.`ACTIVE` = 1 AND `tasks`.`ID` = :id';
		$rs = $this->db->prepare($sql);
		$rs->bindValue(':id', (int) $id, PDO::PARAM_INT);
		$rs->execute();
		$rs->setFetchMode(PDO::FETCH_ASSOC);

		return $rs->fetch();
	}
	public  function add($data){

		$rs = $this->db->prepare("INSERT INTO `tasks` (USER_NAME, USER_EMAIL, TEXT, TEXT_ORIGIN,  COMPLETED, ACTIVE) VALUES (:username, :useremail, :task, :task, 0, 1)");
		$rs->execute([':username' => htmlspecialchars($data['username']), ':useremail' => htmlspecialchars($data['email']), ':task' => htmlspecialchars($data['task'])]);

		$rs->fetch();


		return $this->db->lastInsertId();
	}

	public  function edit($data){

		$rs = $this->db->prepare("UPDATE `tasks` SET TEXT = :text, COMPLETED = :completed, EDITED = :edited WHERE `tasks`.`ID` = :id");
		$rs->bindValue(':text', htmlspecialchars($data['task']));
		$rs->bindValue(':id', (int) $data['id'], PDO::PARAM_INT);
		$rs->bindValue(':completed', (int) $data['completed'], PDO::PARAM_INT);
		$rs->bindValue(':edited', (int) $data['edited'], PDO::PARAM_INT);
		$rs->execute();
		//$rs->fetch();

		return $rs->errorCode();
	}
}
<?
class Model_User extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public  function get_user_id($data){

		$sql = 'SELECT `users`.`ID`, `users`.`NAME`, `users`.`EMAIL`, `users`.`ADMIN` from `users` WHERE `users`.`ACTIVE` = 1 AND `users`.`NAME` = :login AND `users`.`PASSWORD` = MD5(:password)';

		$rs = $this->db->prepare($sql);
		$rs->execute([':login' => $data['login'], ':password' => $data['password']]);
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		$res = $rs->fetch();

		return $res;
	}
}
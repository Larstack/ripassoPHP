<?php
	class Login{
		protected $username;
		protected $password;
		public function __construct($username, $password){
			$this->password = $password;
			$this->username = $username;
		}
		public function verificaAuth(){
			$db = Db::getInstance("accounts");
			$sql = "SELECT usu_login FROM usuarios
					WHERE usu_login=:usu_login AND usu_clave=:usu_clave";
			try{
				$db->beginTransaction();
				$st = $db->prepare($sql);
				$st->execute(array(':usu_login'=>$this->username,
					':usu_clave'=>$this->password));
				$db->commit();
			}
			catch(PDOException $e){
				$db->rollback();
				echo "Query error is occurred. ".$e->getMessage();
			}
			$result = $st->fetch(PDO::FETCH_ASSOC);
			$bool = true;
			if(empty($result)) $bool = false;
			return $bool;
		}
}
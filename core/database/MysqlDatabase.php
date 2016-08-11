<?php
namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database{

	private $db_name;
	private $db_user;
	private $db_pwd;
	private $db_host;
	private $db;

	public function __contruct($db_name, $db_user = 'offinote', $db_pwd = 'offinote', $db_host = 'localhost'){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pwd = $db_pwd;
		$this->db_host = $db_host;
	}

	private function getDb(){
		if ($this->db === null){
			$db = new PDO('mysql:dbname=offinote;host=localhost', 'offinote', 'offinote');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db = $db;	
		}
		return $this->db;
	}

	public function query($rqte, $class_name = null, $one = false){
		$requete = $this->getDb()->query($rqte);
		if($class_name === null){
			$requete->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		if($one){
			$data = $requete->fetch();
		} else {
			$data = $requete->fetchAll();
		}
		return $data;
	}

	public function prepare($rqte, $attribues, $class_name, $one = false){
		$requete = $this->getDb()->prepare($rqte);
		$requete->execute($attribues);
		$requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
		if($one){
			$data = $requete->fetch();	
		} else {
			$data = $requete->fetchAll();	
		}
		return $data;
	}
}
?>
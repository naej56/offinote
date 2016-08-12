<?php
namespace App;

use \PDO;

class Database{

	private $bdd_name;
	private $bdd_user;
	private $bdd_pwd;
	private $bdd_host;
	private $bdd;

	public function __contruct($bdd_name, $bdd_user = 'offinote', $bdd_pwd = 'offinote', $bdd_host = 'localhost'){
		$this->bdd_name = $bdd_name;
		$this->bdd_user = $bdd_user;
		$this->bdd_pwd = $bdd_pwd;
		$this->bdd_host = $bdd_host;
	}

	private function getBDD(){
		if ($this->bdd === null){
			$bdd = new PDO('mysql:dbname=offinote;host=localhost', 'offinote', 'offinote');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->bdd = $bdd;	
		}
		
		return $this->bdd;
	}

	public function query($rqte, $class_name, $one = false){
		$requete = $this->getBDD()->query($rqte);
		$requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
		if($one){
			$data = $requete->fetch();
		} else {
			$data = $requete->fetchAll();
		}
		return $data;
	}

	public function prepare($rqte, $attribues, $class_name, $one = false){
		$requete = $this->getBDD()->prepare($rqte);
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
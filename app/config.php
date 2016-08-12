<?php 
namespace App;

class Config{

	private $param = [];
	private static $_instance;

	public function __construct(){
		$this->param = require dirname(__DIR__) . '/config/param.php';
	}

	public static function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = new Config();
		}
		return self::$_instance;
	}

	public function get($cle){
		if(!isset($this->param[$cle])){
			return null;
		}
		return $this->param[$cle];
	}
}

 ?>
<?php 
namespace Core;

class Config{

	private $param = [];
	private static $_instance;

	public function __construct($file)
	{
		$this->param = require($file);
	}

	public static function getInstance($file)
	{
		if(is_null(self::$_instance)){
			self::$_instance = new Config($file);
		}
		return self::$_instance;
	}

	public function get($cle)
	{
		if(!isset($this->param[$cle])){
			return null;
		}
		return $this->param[$cle];
	}
}

 ?>
<?php
use Core\Config;
use Core\Database\MysqlDatabase;

class App{

	public $title = 'OffiNote';
	private static $_instance;
	private $db_instance;

	public static function getInstance()
	{
		if(is_null(self::$_instance)){
			self::$_instance = new App();
		}
		return self::$_instance;
	}

	public function getTable($name)
	{
		$classe_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
		return new $classe_name($this->getDb());
	}

	public function getDb()
	{
		$param = Config::getInstance(ROOT . '/config/param.php');
		if(is_null($this->db_instance)){
			$this->db_instance = new MysqlDatabase($param->get('db_name'), $param->get('db_user'), $param->get('dn_pass'), $param->get('db_host'));	
		}
		return $this->db_instance;
	}

	public static function load()
	{
		session_start();
		require ROOT . '/app/Autoloader.php';
		App\Autoloader::register();
		require ROOT . '/core/Autoloader.php';
		Core\Autoloader::register();
	}
}

?>
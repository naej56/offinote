<?php 
namespace App\Table;

class Table {
	
	protected $table;

	public function __construct(\App\Database\Database $db){
		$this->db = $db;
		if (is_null($this->table)){
			$expl = explode('\\', get_class($this));
			$class_name = end($expl);
			$this->table_name = strtolower(str_replace('Table', '', $class_name));	
		}
	}

	public function all(){
		return $this->db->query('SELECT * FROM note');
	}
}


 ?>
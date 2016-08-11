<?php 
namespace App\Entity;
use Core\Entity\Entity;

class NoteEntity extends Entity{
	public function getUrl(){
		return 'index.php?page=note&id=' . $this->note_id;
	}

	public function getExtrait(){
		$html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Voire la suite</a><p>';
		return $html;
	}
	
}

 ?>
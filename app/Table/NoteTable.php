<?php 
namespace App\Table;
use Core\Table\Table;

class NoteTable extends Table {

	public function last(){
		return $this->query("
			SELECT note.note_id, note.entete, note.contenu, note.date, categorie.categorie
			FROM note
			LEFT JOIN categorie On note.categorie_id = categorie.categorie_id
			ORDER BY note.date DESC");
	}
}

 ?>
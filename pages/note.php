<?php 
use Offinote\Offinote;
use Offinote\Tables\note;
use Offinote\Tables\categorie;


$note = note::find($_GET['id']);
if($note === false){
	Offinote::pageNotfound();
}

$categorie = categorie::find($note->categorie_id);
Offinote::setTitre($categorie->categorie . ' / ' . $note->entete);
?>

<h1><?= $note->entete; ?></h1>
<p><em><?= $categorie->categorie; ?></em></p>
<p><?= $note->contenu; ?></p>
<p><a href="index.php?pwd=home">Home</a></p>
<?php 
use Offinote\Offinote;
use Offinote\Table\note;
use Offinote\Table\categorie;

$categorie = categorie::find($note->categorie_id);
?>

<h1><?= $note->entete; ?></h1>
<p><em><?= $categorie->categorie; ?></em></p>
<p><?= $note->contenu; ?></p>
<p><a href="index.php?pwd=home">Home</a></p>
<?php 
use Offinote\Tables\categorie;
use Offinote\Tables\note;
use Offinote\Offinote;

$categorie = categorie::find($_GET['id']);
if($categorie === false){
	Offinote::pageNotfound();
};
$note = note::getByCat($_GET['id']);
$listeCat = categorie::all();
Offinote::setTitre($categorie->categorie);
?>

<h1><?= $categorie->categorie; ?></h1>

<div class="row">
	<div class="col-sm-8">
		<?php foreach ( $note as $data): ?>
			<h2><a href="<?= $data->url ?>"><?= $data->entete; ?></a></h2>
			<p><?= $data->contenu; ?></p>
		<?php endforeach; ?>
	</div>

	<div class="col-sm-4">
		<ul>
			<?php foreach ( categorie::all() as $cat): ?>
				<li><a href="<?= $cat->url ?>"><?= $cat->categorie; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<p><a href="index.php?pwd=home">Home</a></p>
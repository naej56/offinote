<?php 
use Offinote\Offinote;
use Offinote\Tables\note;
use Offinote\Tables\categorie;


?>

<div class="row">
	<div class="col-sm-8">
		<?php foreach ( App::getInstance()->getTable('note')->last() as $data): ?>
			<h2><a href="<?= $data->url ?>"><?= $data->entete; ?></a></h2>
			<p><em><?= $data->categorie; ?></em></p>
			<p><?= $data->extrait; ?></p>
		<?php endforeach; ?>
	</div>

	<div class="col-sm-4">
		<ul>
			<?php foreach ( App::getInstance()->getTable('categorie')->all() as $cat): ?>
				<li><a href="<?= $cat->url ?>"><?= $cat->categorie; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php
define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();


if(isset($_GET['page'])){
	$page = $_GET['page'];
} else {
	$page = '404';
}

ob_start();
if ($page === 'home') {
	require ROOT . '/pages/notes/home.php';
} elseif ($page === 'note') {
	require ROOT . '/pages/notes/note.php';
} elseif ($page === 'categorie') {
	require ROOT . '/pages/notes/categorie.php';
} else {
	require ROOT . '/pages/notes/home.php';
}
$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';

?>
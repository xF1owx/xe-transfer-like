
<?php
require_once ('vendor/autoload.php');
// require_once('views/home.html');


$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array('cache' => false));



$template = $twig->load('home.html');
echo $template->render(array(''));

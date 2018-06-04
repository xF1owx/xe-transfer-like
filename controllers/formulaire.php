<?php 

require_once('vendor/autoload.php');

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array('cache' => false));














$template = $twig->load('formulaire.html');
echo $template->render(array());


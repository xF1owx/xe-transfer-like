<?php

 $url = explode('/', $_SERVER['REQUEST_URI'], 4);

 if(count($url) > 3){
    array_pop($url);
}

//  var_dump($url);
// echo "<br>";
// var_dump($url);
// echo "<br>";
$path = implode('/', $url);


switch ($path) {
case '/xe-transfer-like':
case '/xe-transfer-like/' :
require_once('controllers/home.php');
break;
}
// case '/memegenerator/upload':
// case '/memegenerator/upload/':
// require_once('controllers/upload.php');
// break;

// case '/memegenerator/render':
// case '/memegenerator/render/':
// require_once('controllers/render.php');
// break;

// case '/memegenerator/creation':
// case '/memegenerator/creation/':
// require_once('controllers/creation.php');
// break;

// default:
// require_once('controllers/404-error.php');
// break;
// 
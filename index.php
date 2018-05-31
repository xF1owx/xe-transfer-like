<?php

<<<<<<< HEAD
switch ($_GET['action']) {
case 'home':
=======
//  $url = explode('/', $_SERVER['REQUEST_URI'], 4);

//  if(count($url) > 3){
//     array_pop($url);
// }

//  var_dump($url);
// echo "<br>";
// var_dump($url);
// echo "<br>";
// $path = implode('/', $url);

$path = $_SERVER['REQUEST_URI'];

switch ($path) {
case '/xe-transfer-like':
case '/xe-transfer-like/' :
>>>>>>> 310857b17782b896f5dc633ea57904acf5f786a4
require_once('controllers/home.php');
break;

case 'upload':
require_once('controllers/upload.php');
break;

<<<<<<< HEAD
case 'file':
require_once('controllers/download.php');
break;
=======
case '/xe-transfer-like/uploadSuccess':
case '/xe-transfer-like/uploadSuccess/':
require_once('controllers/uploadSuccess.php');
break;

}
>>>>>>> 310857b17782b896f5dc633ea57904acf5f786a4

default:
require_once('controllers/home.php');

}


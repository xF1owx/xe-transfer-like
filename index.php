<?php

switch ($_GET['action']){

    
case 'home':
require_once('controllers/home.php');
break;

case 'upload':
require_once('controllers/upload.php');
break;

case 'file':
require_once('controllers/download.php');
break;

case 'success':
require_once('controllers/uploadSuccess.php');
break;


default:
require_once('controllers/home.php');
}


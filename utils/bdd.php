<?php

try{
  
    $bdd=new PDO('mysql:host=localhost;dbname=xe_transfer;charset=utf8','admin','online@2017');
}
catch(Exeption $e)
{      
	die('Erreur:'.$e->getMessage());
}
    

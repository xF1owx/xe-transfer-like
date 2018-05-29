<?php

require_once('utils/bdd.php');
require_once('controllers/upload.php');

function uploadFileuser($usermail){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO `users`(mail_user) VALUES ($usermail)");
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
   echo "de adresse user de request:";
   var_dump ($usermail);
echo "</br>";

     return $result;
}

function uploadFileFile($path,$filename){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO `file`(url_file, name_file ) VALUES ($path,$filename)");
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
echo "de request path et nom fichier:";
   var_dump ($path,$filename);
echo "</br>";


     return $result;
}
function uploadFileDest($destinatairemail){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO `destinatraire`(mail_destinataire) VALUES ($destinatairemail)");
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
   echo "de request destinataire mail:";
   var_dump ($destinatairemail);
echo "</br>";


     return $result;
}

function uploadFileSend($message,$date){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO `send`(`message`,date_send) VALUES ($message,$date)");
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
   echo "de request message et date mail:";
   var_dump ($message,$date);
   echo "</br>";


     return $result;
}

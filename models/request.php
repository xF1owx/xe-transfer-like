<?php

require_once('utils/bdd.php');
require_once('controllers/upload.php');

function uploadFileuser($usermail){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO users(mail_user) VALUES (:usermail)");
    $response->bindParam(":usermail", $usermail, PDO::PARAM_STR);
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
   echo "de adresse user de request:";
   var_dump ($usermail);
echo "</br>";

     return $result;
}

function uploadFileFile($path,$filename,$date){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO file (url_file, name_file, file_date ) VALUES (:path,:filename,:date)");
    $response->bindParam(":path", $path, PDO::PARAM_STR);
    $response->bindParam(":filename", $filename, PDO::PARAM_STR);
    $response->bindParam(":date", $date, PDO::PARAM_STR);
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
echo "de request path et nom fichier:";
   var_dump ($path,$filename);
echo "</br>";


     return $result;
}
function uploadFileDest($destinatairemail,$message){
    
    var_dump("lol-".$destinatairemail);

    global $bdd;
    $response=$bdd->prepare("INSERT INTO destinataire(mail_destinataire, message) VALUES(:destinatairemail,:message)");
    $response->bindParam(":destinatairemail", $destinatairemail, PDO::PARAM_STR);
    $response->bindParam(":message", $message, PDO::PARAM_STR);
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
   echo "de request destinataire mail:";
   var_dump ($destinatairemail,$message);
echo "</br>";


     return $result;
}


function lastIdUser(){
global $bdd;
	$response=$bdd->prepare("SELECT MAX(id_user) AS lastIdUser FROM users");
	$response->execute();

	$result=$response->fetch(PDO::FETCH_ASSOC);

    return $result;
    
}
function lastIdFile(){
    global $bdd;
        $response=$bdd->prepare("SELECT MAX(id_file) AS lastIdFile FROM file");
        $response->execute();
    
        $result=$response->fetch(PDO::FETCH_ASSOC);
    
        return $result;
        
    }
    function lastIdDest(){
        global $bdd;
            $response=$bdd->prepare("SELECT MAX(id_destinataire) AS lastIdDest FROM destinataire");
            $response->execute();
        
            $result=$response->fetch(PDO::FETCH_ASSOC);
        
            return $result;
            
        }


                    function insertTableSend($lastiduser,$lastidfile,$lastiddest){
                        

                    }
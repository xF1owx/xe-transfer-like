<?php

require_once('utils/bdd.php');
// require_once('controllers/upload.php');

function uploadFileuser($usermail){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO users(mail_user) VALUES (:usermail)");
    $response->bindParam(":usermail", $usermail, PDO::PARAM_STR);
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);

     return $result;
}

function uploadFileFile($path,$filename,$downloadcode){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO file (url_file, name_file, download_code ) VALUES (:path,:filename,:downloadcode)");
    $response->bindParam(":path", $path, PDO::PARAM_STR);
    $response->bindParam(":filename", $filename, PDO::PARAM_STR);    
    $response->bindParam(":downloadcode", $downloadcode, PDO::PARAM_STR);
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
   
     return $result;
}
function uploadFileDest($destinatairemail,$message){
    

    global $bdd;
    $response=$bdd->prepare("INSERT INTO destinataire(mail_destinataire, message_destinataire) VALUES(:destinatairemail,:message)");
    $response->bindParam(":destinatairemail", $destinatairemail, PDO::PARAM_STR);
    $response->bindParam(":message", $message, PDO::PARAM_STR);
    $response->execute();

   $result=$response->fetchAll(PDO::FETCH_ASSOC);
  


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
                        global $bdd;
                        $response=$bdd->prepare("");
                        $response->execute();

                        $result=$response->fetch(PDO::FETCH_ASSOC);

                        return $result;

                    }

                    function userSend($lastiduser,$lastidfile, $lastiddest,$message,$date)
                    {                                

                        global $bdd;
                        echo "INSERT INTO send(id_user_send, id_destinataire, message, date_send, id_file) VALUES(".$lastiduser.",".$lastiddest.",'".$message."', ".$date.",".$lastidfile.")";
                        $response=$bdd->prepare("INSERT INTO send(id_user_send, id_destinataire, message, date_send, id_file) VALUES(:lastIdUser,:lastIdDest,:message, :date,:lastIdFile)");                        
                        $response->bindParam(":lastIdUser",  $lastiduser, PDO::PARAM_INT);
                        $response->bindParam(":lastIdFile", $lastidfile, PDO::PARAM_INT);
                        $response->bindParam(":lastIdDest", $lastiddest, PDO::PARAM_INT);
                        $response->bindParam(":message", $message, PDO::PARAM_STR);
                        $response->bindParam(":date", $date, PDO::PARAM_STR);                       
                        $response->execute();
                    }


                    function getFileDownload($urlfile){

                        global $bdd;
                        $response=$bdd->prepare("SELECT url_file FROM file WHERE download_code = :urlfile");
                        $response->bindParam(":urlfile", $urlfile, PDO::PARAM_STR);
                        $response->execute();
                        $result=$response->fetch(PDO::FETCH_ASSOC);

                        return $result;

                 

                    }

                    
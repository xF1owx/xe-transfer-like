<?php 

require_once('views/home.html');
require_once('models/request.php');


$usermail = ($_POST['userMail']);
$destinatairemail = ($_POST['destinataireMail']);
$message = ($_POST['message']);
$date = time();//TIMESTAMP DATE DU JOUR //
$filename = time().$_FILES['upFile']['name']; 

var_dump($_POST);
var_dump($_FILES['upFile']['name']);

if (isset($_FILES['upFile'])){

    

    $path = $_SERVER['DOCUMENT_ROOT'].'/xe-transfer-like/assets/medias/files/'.$filename;
    move_uploaded_file($_FILES['upFile']['tmp_name'], $path);

  uploadFileuser($usermail);
  uploadFileFile($path,$filename,$date);
  uploadFileDest($destinatairemail,$message);

  $lastiduser = lastIdUser(); //fonctionne, récupère derniere ligne dans la table users //
  $lastidfile = lastIdFile(); //fonctionne, récupère derniere ligne dans la table file //
  $lastiddest = lastIdDest(); //fonctionne, récupère derniere ligne dans la table destinataire //
  

  var_dump ($lastiduser['lastIdUser']); 
  var_dump ($lastidfile);
  var_dump ($message);
  
  userSend($lastiduser['lastIdUser'], $lastidfile['lastIdFile'], $lastiddest['lastIdDest'],$message, $date);

  mail($destinatairemail,'sujet', 'Bonjour votre fichier de '.$usermail.' est en attente de téléchargement.
  Vous pouvez utiliser ce lien '.$path.' pendant 10 jours.
  avec le message : '.$message.'');
  echo 'mail envoyé';
  echo '<p><a href="/xe-transfer-like">Retour à l\'accueil</a></p>';
  }


else{
    echo "error";
}






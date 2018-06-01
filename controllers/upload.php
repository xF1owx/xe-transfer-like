<?php 
require_once ('vendor/autoload.php');
// require_once('views/upload.html');
require_once('models/request.php');

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array('cache' => false));






if(!empty($_FILES)){
  $nomFichier = $_FILES['file']['name'];
  $tempRep = $_FILES['file']['tmp_name'];
  $error = $_FILES['file']['error'];

  if($error != 0 || !$tempRep){
    echo "Erreur : le fichier n'a pas pu être uploadé!";
    die();
  }

  if(move_uploaded_file($tempRep, 'files/'.$nomFichier)){
    echo "Chargement du fichier".$nomFichier."terminé!";
  }else{
    echo "Une erreur est survenue lors de l'envoi du fichier!";
  }
}




$usermail = ($_POST['userMail']);
$destinatairemail = ($_POST['destinataireMail']);
$message = ($_POST['message']);
$date = time();//TIMESTAMP DATE DU JOUR //
$filename = time().$_FILES['upFile']['name']; 
$downloadcode = time();


var_dump($_POST);
var_dump($_FILES['upFile']['name']);

if (isset($_FILES['upFile'])){

    
    $pathRoot = $_SERVER['DOCUMENT_ROOT'];
    $pathProjet = '/xe-transfer-like/';
    $pathCourt = 'assets/medias/files/';
    $path = $pathRoot.$pathProjet.'assets/medias/files/'.$filename;
    move_uploaded_file($_FILES['upFile']['tmp_name'], $path);

  uploadFileuser($usermail);
  uploadFileFile($pathCourt.$filename,$filename,$date,$downloadcode);
  uploadFileDest($destinatairemail,$message);

  $lastiduser = lastIdUser(); //fonctionne, récupère derniere ligne dans la table users //
  $lastidfile = lastIdFile(); //fonctionne, récupère derniere ligne dans la table file //
  $lastiddest = lastIdDest(); //fonctionne, récupère derniere ligne dans la table destinataire //
  

//   var_dump ($lastiduser['lastIdUser']); 
//   var_dump ($lastidfile);
//   var_dump ($message);
  
  userSend($lastiduser['lastIdUser'], $lastidfile['lastIdFile'], $lastiddest['lastIdDest'],$message, $date);

  mail($destinatairemail,'sujet', 'Bonjour votre fichier de '.$usermail.' est en attente de téléchargement.
  Vous pouvez utiliser ce lien https://florianr.promo-17.codeur.online/xe-transfer-like/file/'.$downloadcode.' pendant 10 jours.
  avec le message : '.$message.'');
  echo 'mail envoyé';
  echo '<p><a href="/xe-transfer-like">Retour à l\'accueil</a></p>';
  }


//  https://florianr.promo-17.codeur.online/public/xe-transfer-like/assets/medias/files/xxxxxxxxxxx //

else{
    echo "error";
    
}


$template = $twig->load('upload.html');
echo $template->render(array());







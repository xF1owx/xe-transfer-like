<?php 
require_once ('vendor/autoload.php');
require_once('models/request.php');

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array('cache' => false));

$usermail = ($_POST['userMail']);
$destinatairemail = ($_POST['destinataireMail']);
$message = ($_POST['message']);
$date = time();//TIMESTAMP DATE DU JOUR //
$filename = time().$_FILES['upFile']['name']; 
$downloadcode = time();




// if(!empty($_FILES)){
//   $nomFichier = $_FILES['upFile']['name'];
//   $tempRep = $_FILES['upFile']['tmp_name'];
//   $error = $_FILES['upFile']['error'];

//   if($error != 0 || !$tempRep){
//     echo "Erreur : le fichier n'a pas pu être uploadé!";
//     die();
//   }

//   if(move_uploaded_file($tempRep, 'files/'.$nomFichier)){
//     echo "Chargement du fichier ".$nomFichier." terminé!";
//   }else{
//     echo "Une erreur est survenue lors de l'envoi du fichier!";
//   }
// }




if (isset($_FILES['upFile'])){
  // if(isset($_POST['upload'])){
   
  
     $path = $_SERVER['DOCUMENT_ROOT'].'/xe-transfer-like/assets/medias/files/'.$filename;
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
     
   
     var_dump ($lastiduser['lastIdUser']); 
     var_dump ($lastidfile);
     var_dump ($message);
     var_dump ($destinatairemail);
     var_dump ($usermail);

     userSend($lastiduser['lastIdUser'], $lastidfile['lastIdFile'], $lastiddest['lastIdDest'],$message, $date);

     
     $to = $destinatairemail;
$subject = "Votre fichier";

$messagex = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<img src=\"https://nicolasj.promo-17.codeur.online/xe-transfer-like/assets/medias/logo.png\">
<p> Bonjour votre fichier de '.$usermail.' est en attente de téléchargement.</p>
Vous pouvez utiliser ce  <a href=\"https://nicolasj.promo-17.codeur.online/xe-transfer-like/file/$downloadcode\"> lien </a> 
<p> avec le message : '.$message.'');</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <xe-transfer-like@mamen.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$messagex,$headers);
    
     echo 'mail envoyé';
     echo '<p><a href="/xe-transfer-like">Retour à l\'accueil</a></p>';



     header('location: https://nicolasj.promo-17.codeur.online/xe-transfer-like/uploadSuccess');
                exit();
     }

else{
  echo "TG";
}


$template = $twig->load('upload.html');
echo $template->render(array());







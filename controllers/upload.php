<?php 
require_once ('vendor/autoload.php');
require_once('models/request.php');


$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array('cache' => false));


$usermail = ($_POST['userMail']);
$destinatairemail = ($_POST['destinataireMail']);
$message = ($_POST['message']);
$date = date('Y-m-d 00:00:00'); 
$filename = time().$_FILES['upFile']['name']; 
$downloadcode = time();


if (isset($_FILES['upFile'])){
 
     
  
     $path = $_SERVER['DOCUMENT_ROOT'].'/xe-transfer-like/assets/medias/files/'.$filename;
     $pathRoot = $_SERVER['DOCUMENT_ROOT'];
     $pathProjet = '/xe-transfer-like/';
     $pathCourt = 'assets/medias/files/';
     $path = $pathRoot.$pathProjet.'assets/medias/files/'.$filename;
       move_uploaded_file($_FILES['upFile']['tmp_name'], $path);
   
     uploadFileuser($usermail);
     uploadFileFile($pathCourt.$filename,$filename, $downloadcode);
     uploadFileDest($destinatairemail,$message);
   
     $lastiduser = lastIdUser(); //fonctionne, récupère derniere ligne dans la table users //
     $lastidfile = lastIdFile(); //fonctionne, récupère derniere ligne dans la table file //
     $lastiddest = lastIdDest(); //fonctionne, récupère derniere ligne dans la table destinataire //
     
   
     
     userSend($lastiduser['lastIdUser'], $lastidfile['lastIdFile'], $lastiddest['lastIdDest'],$message, $date);
     
     deleteOlderColumn();
     
     $to = $destinatairemail;
     $subject = "Votre fichier";
$messagex = "
<html>
<head>
<title>Votre Fichier </title>
</head>
<body class='fond'>
<p><img src=\"http://nicolasj.promo-17.codeur.online/xe-transfer-like/assets/medias/logo.png\"></p>
<p class='tex'> Bonjour,</br>
$usermail vous adresse ce message '$message'.</br> Votre fichier est en attente de téléchargement.</br>
Vous avez 10 jours pour le récupèrer à cette  <a href=\"https://nicolasj.promo-17.codeur.online/xe-transfer-like/file/$downloadcode\"> adresse</a>.</p>
</body>
</html> 
<style>
 body{
   text-align:center;
   background-color: rgb(207, 207, 207);
 }
 .tex{
   margin-left: 40px;
   margin-bottom: 40px;
   font-size:25px;
   text-align: center;
 
 }
</style>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <xe-transfer-like@mamen.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";
mail($to,$subject,$messagex,$headers);
     echo '<p><a href="/xe-transfer-like">Retour à l\'accueil</a></p>';

     header('location: https://nicolasj.promo-17.codeur.online/xe-transfer-like/uploadSuccess');
                exit();
     }
else{
  echo "Formulaire érroné ou incomplet";
}
$template = $twig->load('upload.html');
echo $template->render(array());

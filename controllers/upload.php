<?php 

require_once('views/home.html');
require_once('models/request.php');


$usermail = ($_POST['userMail']);
$destinatairemail = ($_POST['destinataireMail']);
$message = ($_POST['message']);
$date = microtime();//TIMESTAMP DATE DU JOUR //
$filename = time().$_FILES['upFile']['name']; 

var_dump($_POST);
var_dump($date);

if (isset($_FILES['upFile'])){

    

    $path = $_SERVER['DOCUMENT_ROOT'].'/xe-transfer-like/assets/medias/files/'.$filename;
    move_uploaded_file($_FILES['upFile']['tmp_name'], $path);

  uploadFileuser($usermail);
  uploadFileFile($path,$date,$filename);
  uploadFileDest($destinatairemail);
  uploadFileSend($message,$date);

}
else{
    echo "error";
}






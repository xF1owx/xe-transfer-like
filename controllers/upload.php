<?php 

require_once('views/home.html');


$usermail = ($_POST['userMail']);
$destinataireMail = ($_POST['destinataireMail']);
$message = ($_POST['message']);

var_dump ($usermail);
echo "</br>";
var_dump ($destinataireMail);
echo "</br>";
var_dump ($message); 
echo "</br>";
var_dump($_FILES['upFile']);
echo "</br>";


if (isset($_FILES['upFile'])){
    

    $path = $_SERVER['DOCUMENT_ROOT'].'/xe-transfer-like/assets/medias/files/'.$_FILES['upFile']['name'];
    move_uploaded_file($_FILES['upFile']['tmp_name'], $path);

  uploadFile();

}



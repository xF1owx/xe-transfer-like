<?php 

require_once('views/home.html');

var_dump($_FILES['upFile']);


if (isset($_FILES['upFile'])){
    

    $path = $_SERVER['DOCUMENT_ROOT'].'/xe-transfer-like/assets/medias/files/'.$_FILES['upFile']['name'];
    move_uploaded_file($_FILES['upFile']['tmp_name'], $path);

  

}

var_dump()

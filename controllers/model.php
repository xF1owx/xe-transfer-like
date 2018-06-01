<?php
function getImages()
{
$bdd = new PDO('mysql:host=localhost;dbname=nicolasj_generator_meme;charset=utf8','nicolasj','MZkQrGNiKM');
$response = $bdd->prepare("SELECT id, adress FROM img");
$response->fetchAll(PDO::FETCH_ASSOC);
$response->execute();
return $response;
}

function getImage($idimage)
{
    $db = new PDO('mysql:host=localhost;dbname=nicolasj_generator_meme;charset=utf8','nicolasj','MZkQrGNiKM');

    $image = $db->prepare('SELECT id, adress FROM img WHERE id=:id');
    $choix = $idimage;
    $image->bindParam(":id", $choix,PDO::PARAM_INT);
    $image->execute();
    $imageView = $image->fetch(PDO::FETCH_ASSOC);
    $image->closeCursor();
    return $imageView;
}
?>
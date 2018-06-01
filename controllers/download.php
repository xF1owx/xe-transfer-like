<?php 

require_once('models/request.php');


$urlfile = $_GET['url'];

$file = getFileDownload($urlfile);

echo "<a href=\"https://florianr.promo-17.codeur.online/xe-transfer-like/".$file['url_file']."\"> Lien </a>";

?>
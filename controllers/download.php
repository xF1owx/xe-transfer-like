<?php 

require_once('models/request.php');

echo "salut blaireau";

$urlfile = $_GET['url'];

getFileDownload($urlfile);

var_dump($urlfile);

$file = 'xe-transfer-like/assets/medias/files/'.$urlfile;

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>
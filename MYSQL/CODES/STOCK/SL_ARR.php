<?php
session_start();
$file = $_SESSION["FLNM"];
if (file_exists($file)) {
header('Content-Type: application/pdf');
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>
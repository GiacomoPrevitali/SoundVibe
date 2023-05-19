<?php
session_start();
require_once('config.php');

$json=array();
$sql ='DELETE FROM '.$_POST['IdU'].'_0 WHERE Id_Song="'.$_REQUEST['IdS'].'" AND Id_Playlist="'.$_REQUEST['IdP'].'"';
$result =$connection->query($sql);
echo json_encode($json);
?>
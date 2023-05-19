<?php
session_start();
require_once('config.php');

$json=array();
$sql ='DELETE FROM '.$_POST['IdU'].'_2 WHERE Id="'.$_REQUEST['IdP'].'"';
$result =$connection->query($sql);
echo json_encode($json);
?>
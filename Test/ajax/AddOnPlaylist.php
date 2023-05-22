<?php
//session_start();
require_once('config.php');


$sql ='INSERT INTO '.$_POST['IdU'].'_0 (Id,Id_Playlist,Id_Song) VALUES (NULL,"'.$_POST['IdP'].'","'.$_POST['IdS'].'")';

$result =$connection->query($sql);
$json=array();

    $null=array('Id'=>'A');
    array_push($json,$null);
    
echo json_encode($json);

?>
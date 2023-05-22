<?php
//session_start();
require_once('config.php');
$NUtente=htmlspecialchars($_POST['IdU'],ENT_QUOTES,'UTF-8');
$IdP=htmlspecialchars($_POST['IdP'],ENT_QUOTES,'UTF-8');
$IdS=htmlspecialchars($_POST['IdS'],ENT_QUOTES,'UTF-8');

$sql ='INSERT INTO '.$NUtente.'_0 (Id,Id_Playlist,Id_Song) VALUES (NULL,"'.$IdP.'","'.$IdS.'")';

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $firstname, $lastname, $email);




$result =$connection->query($sql);
$json=array();

    $null=array('Id'=>'A');
    array_push($json,$null);

echo json_encode($json);

?>
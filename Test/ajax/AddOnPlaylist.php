<?php
//session_start();
require_once('config.php');
$NUtente=htmlspecialchars($_POST['IdU'],ENT_QUOTES,'UTF-8');
$IdP=htmlspecialchars($_POST['IdP'],ENT_QUOTES,'UTF-8');
$IdS=htmlspecialchars($_POST['IdS'],ENT_QUOTES,'UTF-8');


$sql ='INSERT INTO canzoni (Id_Utente,Id_Playlist,Id_Song) VALUES (?,?,?)';

$stmt = $connection->prepare($sql);
$stmt->bind_param("sss", $NUtente,$IdP,$IdS);
$stmt->execute();

$result = $stmt->get_result();
$connection->close();
$stmt->close();
$json=array();

    $null=array('Id'=>'A');
    array_push($json,$null);

echo json_encode($json);

?>
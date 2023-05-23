<?php
session_start();
require_once('config.php');
$IdU=htmlspecialchars($_POST['IdU'],ENT_QUOTES,'UTF-8');
$IdP=htmlspecialchars($_POST['IdP'],ENT_QUOTES,'UTF-8');
$IdS=htmlspecialchars($_POST['IdS'],ENT_QUOTES,'UTF-8');


$sql ='DELETE FROM canzoni WHERE Id_Song=? AND Id_Playlist=? AND Id_Utente=?';

$stmt = $connection->prepare($sql);
$stmt->bind_param("sss", $IdS,$IdP,$IdU);
$stmt->execute();

$result = $stmt->get_result();
$connection->close();
$stmt->close();
$json=array();

//$result =$connection->query($sql);
echo json_encode($json);
?>
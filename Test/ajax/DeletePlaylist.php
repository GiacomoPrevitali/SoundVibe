<?php
session_start();
require_once('config.php');
$IdU=htmlspecialchars($_POST['IdU'],ENT_QUOTES,'UTF-8');
$IdP=htmlspecialchars($_POST['IdP'],ENT_QUOTES,'UTF-8');
$json=array();
$sql ='DELETE FROM playlist WHERE Id_Utente=? AND Id=?';

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $IdU,$IdP);
    $stmt->execute();
         
    $result = $stmt->get_result();
    //$connection->close();
    $stmt->close();
    $json=array();



$sql ='DELETE FROM canzoni WHERE Id_Playlist=?';

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s",$IdP);
    $stmt->execute();
         
    $result = $stmt->get_result();
    $connection->close();
    $stmt->close();
    $json=array();
//$result =$connection->query($sql);
echo json_encode($json);
?>


<?php
//session_start();
require_once('config.php');
$Id=htmlspecialchars($_POST['Id'],ENT_QUOTES,'UTF-8');
$Titolo=htmlspecialchars($_POST['TitoloPlaylist'],ENT_QUOTES,'UTF-8');
//$Immagine=htmlspecialchars($_POST['ImmaginePlaylist'],ENT_QUOTES,'UTF-8');
$Descrizione=htmlspecialchars($_POST['DescrizionePlaylist'],ENT_QUOTES,'UTF-8');
$Nome=htmlspecialchars($_POST['Nome'],ENT_QUOTES,'UTF-8');
$Cognome=htmlspecialchars($_POST['Cognome'],ENT_QUOTES,'UTF-8');
//$Immagine=substr($Immagine, 12);
$Utente=$Nome." ".$Cognome;
$sql ='INSERT INTO playlist (Id, Id_Utente, Titolo,  Descrizione, Autore) VALUES (NULL,?,?,?,?)';


$stmt = $connection->prepare($sql);
$stmt->bind_param("ssss", $Id, $Titolo ,$Descrizione,$Utente);
$stmt->execute();

$result = $stmt->get_result();
$connection->close();
$stmt->close();
$json=array();

    $null=array('Id'=>'A');
    array_push($json,$null);

echo json_encode($json);

?>
<?php
//session_start();
require_once('config.php');
$Id=htmlspecialchars($_POST['Id'],ENT_QUOTES,'UTF-8');
$Titolo=htmlspecialchars($_POST['TitoloPlaylist'],ENT_QUOTES,'UTF-8');
$Immagine=htmlspecialchars($_POST['ImmaginePlaylist'],ENT_QUOTES,'UTF-8');
$Descrizione=htmlspecialchars($_POST['DescrizionePlaylist'],ENT_QUOTES,'UTF-8');
$Nome=htmlspecialchars($_POST['Nome'],ENT_QUOTES,'UTF-8');
$Cognome=htmlspecialchars($_POST['Cognome'],ENT_QUOTES,'UTF-8');
$sql ='INSERT INTO '.$Id.'_2 (Id,Titolo,Immagine, Descrizione, Autore) VALUES (NULL,"'.$Titolo.'","'.substr($Immagine, 11).'","'.$Descrizione.'","'.$Nome.''.$Cognome.'")';

$result =$connection->query($sql);
$json=array();

    $null=array('Id'=>'A');
    array_push($json,$null);

echo json_encode($json);

?>
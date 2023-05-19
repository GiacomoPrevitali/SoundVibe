<?php
//session_start();
require_once('config.php');

$sql ='INSERT INTO '.$_POST['Id'].'_2 (Id,Titolo,Immagine, Descrizione, Autore) VALUES (NULL,"'.$_POST['TitoloPlaylist'].'","'.substr($_POST['ImmaginePlaylist'], 11).'","'.$_POST['DescrizionePlaylist'].'","'.$_POST['Nome'].''.$_POST['Cognome'].'")';

$result =$connection->query($sql);
$json=array();

    $null=array('Id'=>'A');
    array_push($json,$null);

echo json_encode($json);

?>
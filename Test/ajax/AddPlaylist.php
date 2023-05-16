<?php
require_once('config.php');
if(isset($_POST['NomePl'])){
    $sql='INSERT INTO '.$_POST['Id'].'_2 (Id, Titolo, Descrizione, Autore) VALUES (NULL,"'.$_POST['NomePl'].'", "'.$_POST['DescrPl'].'", "'.$_POST['Nome'].' '.$_POST['Cognome'].'")';
         
    $result =$connection->query($sql);

    echo json_encode(array('message' => 'Utente aggiunto con successo!'));
}
?>
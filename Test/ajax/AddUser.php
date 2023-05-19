<?php
     if(isset($_POST['Nome'])){
        require_once('config.php');
       
            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
        
        $sql='INSERT INTO users (Id, Nome, Cognome, Data_Nascita, Codice_Fiscale, Mail, Pass) VALUES (NULL, "'.$_POST['Nome'].'", "'.$_POST['Cognome'].'", "'.$_POST['Data_Nascita'].'", "'.$_POST['Codice_Fiscale'].'", "'.$_POST['Mail'].'", "'.md5($_POST['Password']).'")';
        $connection->query($sql);
            //fare chiamata per ID utente
        $sql='SELECT Id FROM users WHERE Mail="'.$_POST['Mail'].'"';
        $result =$connection->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $Id=$row['Id'];
                echo '<script>Alert("'.$Id.'");</script>';
            }
          }else{
            echo '<div class="alert alert-danger my-4">ERRORE</div>';
          }
          //$query = "SELECT * FROM " . $nome_tabella . " WHERE id = 1";
        $sql='CREATE TABLE '.$Id.'_2  (Id INT NOT NULL AUTO_INCREMENT , Titolo VARCHAR(255) NOT NULL , Immagine VARCHAR(255) NOT NULL , Descrizione VARCHAR(255) NOT NULL , Autore VARCHAR(255) NOT NULL , PRIMARY KEY (Id))';
        
        $connection->query($sql);
        $sql='CREATE TABLE '.$Id.'_0 (Id INT NOT NULL AUTO_INCREMENT , Id_Playlist INT NOT NULL , Id_Song INT NOT NULL , Data_Aggiunta DATE NOT NULL ,PRIMARY KEY (Id))';
        $connection->query($sql);
        $sql ='INSERT INTO '.$Id.'_2 (Id,Titolo,Immagine, Descrizione, Autore) VALUES (NULL,"Preferiti"," "," "," ")';
        $connection->query($sql);
        //$connecti
        $json=array();

        $null=array('Id'=>'A');
        array_push($json,$null);

        echo json_encode($json);
    }
    ?>
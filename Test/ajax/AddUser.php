<?php
     if(isset($_POST['Nome'])){
        require_once('config.php');
       $Nome=htmlspecialchars($_POST['Nome'],ENT_QUOTES,'UTF-8');
       $Cognome=htmlspecialchars($_POST['Cognome'],ENT_QUOTES,'UTF-8');
       $Data_Nascita=htmlspecialchars($_POST['Data_Nascita'],ENT_QUOTES,'UTF-8');
       $Codice_Fiscale=htmlspecialchars($_POST['Codice_Fiscale'],ENT_QUOTES,'UTF-8');
       $Mail=htmlspecialchars($_POST['Mail'],ENT_QUOTES,'UTF-8');
       $Password=htmlspecialchars($_POST['Password'],ENT_QUOTES,'UTF-8');
            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
        
        $sql='INSERT INTO users (Id, Nome, Cognome, Data_Nascita, Codice_Fiscale, Mail, Pass) VALUES (NULL, "'.$Nome.'", "'.$Cognome.'", "'.$Data_Nascita.'", "'.$Codice_Fiscale.'", "'.$Mail.'", "'.md5($Password).'")';
        $connection->query($sql);
            //fare chiamata per ID utente
        $sql='SELECT Id FROM users WHERE Mail="'.$Mail.'"';
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
<?php
    // if(isset($_POST['Nome'])){
    require_once('config.php');
       $Nome=htmlspecialchars($_POST['Nome'],ENT_QUOTES,'UTF-8');
       $Cognome=htmlspecialchars($_POST['Cognome'],ENT_QUOTES,'UTF-8');
       $Data_Nascita=htmlspecialchars($_POST['Data_Nascita'],ENT_QUOTES,'UTF-8');
       $Codice_Fiscale=htmlspecialchars($_POST['Codice_Fiscale'],ENT_QUOTES,'UTF-8');
       $Mail=htmlspecialchars($_POST['Mail'],ENT_QUOTES,'UTF-8');
       $Password=htmlspecialchars($_POST['Password'],ENT_QUOTES,'UTF-8');
       $passC=md5($Password);
       if(filter_var($Mail, FILTER_VALIDATE_EMAIL)){

       
            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
        
        $sql='INSERT INTO users (Id, Nome, Cognome, Data_Nascita, Codice_Fiscale, Mail, Pass) VALUES (NULL, ?, ?, ?, ?, ?, ?)';

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssss", $Nome, $Cognome, $Data_Nascita, $Codice_Fiscale, $Mail, $passC);
        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();


        $sql='SELECT Id FROM users WHERE Mail=?';

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $Mail);
        $stmt->execute();

        $result =$stmt->get_result();
        $stmt->close();



        $Titolo="Preferiti";
        $null=" ";

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $Id=$row['Id'];
            }
          }else{
            echo '<div class="alert alert-danger my-4">ERRORE</div>';
          }

          $sql ='INSERT INTO playlist (Id, Id_Utente, Titolo, Immagine, Descrizione, Autore) VALUES (NULL,?,?,?,?,?)';

          $stmt = $connection->prepare($sql);
          $stmt->bind_param("sssss", $Id, $Titolo, $null ,$null,$null);
          $stmt->execute();
          
          $result = $stmt->get_result();
          $connection->close();
          $stmt->close();
          $json=array();

        $null=array('Id'=>'A');
        array_push($json,$null);

        echo json_encode($json);
   // }
        }else{
            $json=array();

            $null=array('Id'=>'B');
            array_push($json,$null);

            echo json_encode($json);
        }
    ?>
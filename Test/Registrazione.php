<!DOCTYPE html>
<html>
    <head>
    <title>Registrazione</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style_registrazione.css" />

    </head>
    <body>
    <?php
     if(isset($_POST['Nome'])){
        $ip= '127.0.0.1';
        $username='root';
        $password='';
        $database='soundvibe';

       
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
        $sql='ALTER TABLE '.$Id.'_0 ADD CONSTRAINT Id_Playlist FOREIGN KEY (Id_Playlist) REFERENCES '.$Id.'_2(Id) ON DELETE RESTRICT ON UPDATE RESTRICT';
        $connection->query($sql);
        $sql='ALTER TABLE '.$Id.'_0 ADD CONSTRAINT Id_Song FOREIGN KEY (Id_Song) REFERENCES song(Id) ON DELETE RESTRICT ON UPDATE RESTRICT';
        $connection->query($sql);
         header("Location: Login.php");
        //$sql='ALTER TABLE '.$Id.'_0 ADD CONSTRAINT Id_Playlist FOREIGN KEY (Id_Playlist) REFERENCES prova(Id) ON DELETE RESTRICT ON UPDATE RESTRICT';

    }
    ?>
        <center>
        <div class="square">
            <form method="POST">
                    <input type="text"  name="Nome"             placeholder="Nome"              required    class="Input"><br>
                    <input type="text"  name="Cognome"          placeholder="Cognome"           required    class="Input"><br>
                    <input type="text"  name="Codice_Fiscale"   placeholder="Codice Fiscale"    required    class="Input"><br>
                    <input type="date"  name="Data_Nascita"     placeholder="Data di nascita "  required    class="Input"><br>
                    <input type="text"  name="Mail"             placeholder="Mail"              required    class="Input"><br>
                    <input type="password"  name="Password"      placeholder="Password"      required    class="Input"><br>
                
                <button type="submit" class="r">REGISTRATI</button>
            </form>
        </div>
        </center>
    </body>
</html>
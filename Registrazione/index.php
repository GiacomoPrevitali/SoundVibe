<!DOCTYPE html>
<html>
    <head>
    <title>Registrazione</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css" />

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
    }
    ?>
        <center>
        <div class="square">
            <form method="POST" action="index.php">
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
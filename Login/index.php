<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="script.js"></script>
  </head>
</head>
<body>
<div class="square">
<form method="POST" action="index.php">
    <div class="input">
    <input name="Mail" type="mail" pattern="[^ @]*@[^ @]*" placeholder="Mail" required><br>
    <input name="Password" type="password"  placeholder="Password" required>
    </div>
    <button type="submit">ACCEDI</button>
</form>
<a href = "ResetPassword.php">Hai dimenticato la password?</a>
</div>

<?php

if (isset($_POST['Mail'])){
    $ip= '127.0.0.1';
            $username='root';
            $password='';
            $database='SoundVibe';

            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
            $sql ='SELECT Nome FROM Users WHERE Pass="'.md5($_POST['Password']).'" AND mail="'.$_POST['Mail'].'" ';
            $result =$connection->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                
                  echo  '<option >'.$row['Nome'].'</option>';
                  
                }
              }else{
                  echo  '<option >'."Nessun utente trovato".'</option>';
              }


        }

?>
</body></html>
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
</body>
<form method="POST" action="ResetPassword.php">
    <input name="MailF" type="mail" pattern="[^ @]*@[^ @]*" placeholder="Mail" required>
    <button type="submit">ACCEDI</button>
</form>

<?php
if (isset($_POST['MailF'])){
            $ip= '127.0.0.1';
            $username='root';
            $password='';
            $database='SoundVibe';

            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
            $sql ='SELECT Mail FROM Users WHERE Mail="'.$_POST['MailF'].'" ';
            $result =$connection->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                
                  echo  '<option >'.$row['Mail'].'</option>';
                  $to="giacomoprevitali26@gmai.com";
                  $subject = "This is subject";
                  
                  $message = "<b>This is HTML message.</b>";
                  $message .= "<h1>This is headline.</h1>";
                  
                  $header = "From: gp262004@gmail.com \r\n";
                  $header .= "Cc:afgh@somedomain.com \r\n";
                  $header .= "MIME-Version: 1.0\r\n";
                  $header .= "Content-type: text/html\r\n";
                  $retval = mail ($to,$subject,$message,$header);
                  if( $retval == true ) {
                    echo "Message sent successfully...";
                 }else {
                    echo "Message could not be sent...";
                 }
                }
              }else{
                  echo  '<option >'."Nessun utente trovato".'</option>';
              }


        }

?>
</html>
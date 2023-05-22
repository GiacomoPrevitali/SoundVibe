<?php

        $ip= 'localhost';
       // $ip= '127.0.0.1';
        $username='SoundVibe_User';
        $password='1234';
        $database='soundvibe';
        
        $connection=new mysqli($ip,$username,$password,$database);
        if ($connection->connect_error) {
            die('C\'è stato un errore: ' . $connection->connect_error);
        }
?>

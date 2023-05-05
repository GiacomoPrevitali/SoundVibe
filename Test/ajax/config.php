<?php

        $ip= '127.0.0.1';
        $username='root';
        $password='';
        $database='soundvibe';
        
        $connection=new mysqli($ip,$username,$password,$database);
        if ($connection->connect_error) {
            die('C\'è stato un errore: ' . $connection->connect_error);
        }
?>

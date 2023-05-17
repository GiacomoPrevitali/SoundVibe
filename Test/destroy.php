<?php
session_start();
session_destroy();
location('Location: Login.php'); 
exit();
?>
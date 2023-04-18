<?php
//include "config.php";
echo "<script>console.log(IOIO);</script>";
$uname = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$ip= '127.0.0.1';
$username='root';
$password='';
$database='SoundVibe';

$connection=new mysqli($ip,$username,$password,$database);
if ($connection->connect_error) {
    die('C\'è stato un errore: ' . $connection->connect_error);
}
if ($uname != "" && $password != ""){
/*
    $sql_query = "select count(*) as cntUser from users where Mail='".$uname."' and Pass='".md5($password)."'";
    $result = $connection->query($$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if($count > 0){
        $_SESSION['uname'] = $uname;
        echo 1;
    }else{
        echo 0;
    }*/

    $sql ='SELECT Nome, Id  FROM users WHERE Pass="'.md5($password).'" AND mail="'.$uname.'" ';
    $result =$connection->query($sql);
    echo "<script>console.log(IOIO);</script>";
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
           /* $_SESSION['Nome']=$row['Nome'];
            $_SESSION['Id']=$row['Id'];*/
            echo "<script>console.log(IOIO);</script>";
            echo '<div class="alert alert-success my-4">Benvenuto '.$row['Nome'].'</div>';
            header("Location: index.php");
        }
      }else{
        echo '<div class="alert alert-danger my-4">Credenziali sbagliate</div>';
      }
}

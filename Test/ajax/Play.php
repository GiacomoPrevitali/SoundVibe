<?php
//session_start();
require_once('config.php');
if(isset($_POST['Id'])){

$Id=htmlspecialchars($_POST['Id'],ENT_QUOTES,'UTF-8');

$sql ='SELECT audio_url, Immagine FROM song WHERE Id=?';

$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $Id);
$stmt->execute();

$result = $stmt->get_result();
$connection->close();
$stmt->close();
$json=array();

if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        array_push($json,$row);
    }
    
}else{
   // echo json_encode(array('message' => "gdfgd" ));
    $null=array('Id'=>'A');
    array_push($json,$null);

}
echo json_encode($json);
}
?>
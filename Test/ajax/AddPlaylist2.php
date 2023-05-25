<?php
//session_start();
require_once('config.php');
$Titolo=htmlspecialchars($_POST['Titolo'],ENT_QUOTES,'UTF-8');

$sql ='SELECT Id FROM playlist WHERE Titolo=?';

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $Titolo);
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
    $null=array('Titolo'=>'A');
    array_push($json,$null);

}
echo json_encode($json);
?>
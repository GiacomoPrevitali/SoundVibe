<?php

require_once('config.php');
$Id=htmlspecialchars($_POST['Id'],ENT_QUOTES,'UTF-8');
$sql ='SELECT * FROM  playlist WHERE Id_Utente=?';

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

    $null=array('Id'=>'A');
    array_push($json,$null);

}
echo json_encode($json);

?>
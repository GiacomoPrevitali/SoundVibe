<?php

require_once('config.php');
//if(isset($_POST['IdP'])){

$IdU=htmlspecialchars($_POST['IdU'],ENT_QUOTES,'UTF-8');
$IdP=htmlspecialchars($_POST['IdP'],ENT_QUOTES,'UTF-8');

$sql ='SELECT Id_Song FROM canzoni WHERE Id_Playlist=? AND Id_Utente=?';

$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $IdP, $IdU);
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


?>
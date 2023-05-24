<?php
//session_start();
require_once('config.php');

$IdU=htmlspecialchars($_POST['IdU'],ENT_QUOTES,'UTF-8');

//$sql ='SELECT Id FROM canzoni WHERE Id_Playlist=? AND Id_Utente=?';
$sql ='SELECT Id FROM playlist WHERE Titolo="Preferiti" AND Id_Utente=?';

$stmt = $connection->prepare($sql);
$stmt->bind_param("s",$IdU);
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
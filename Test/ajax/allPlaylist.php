<?php
//session_start();
require_once('config.php');

//echo $_POST['IdU'];
//echo $_POST['IdP'];
$sql ='SELECT Id, Titolo FROM song WHERE Id="'.$_POST['Id'].'"';
//$sql ='SELECT * FROM '.$_POST['IdU'].'_0 JOIN song ON '.$_POST['IdU'].'_0.Id_Song = song.Id WHERE '.$_POST['IdU'].'_0.Id_Playlist='.$_POST['IdP'].'';
//$sql ='SELECT * FROM  38_0 WHERE Id_Playlist="'.$_POST['IdP'].'"';
//echo $_POST['Mail'];
$result =$connection->query($sql);
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
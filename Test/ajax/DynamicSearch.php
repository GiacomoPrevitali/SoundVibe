<?php

require_once('config.php');
//if(isset($_POST['valore'])){
//echo $_POST['IdU'];
//echo $_POST['IdP'];
$sql ='SELECT Titolo, Id FROM Song  WHERE Titolo LIKE "%'.$_POST['valore'].'%"';


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
    $null=array('Titolo'=>'A');
    array_push($json,$null);

}
echo json_encode($json);
//}

?>
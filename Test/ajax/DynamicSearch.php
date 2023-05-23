<?php

require_once('config.php');
if(isset($_POST['valore'])){
$Valore=htmlspecialchars($_POST['valore'],ENT_QUOTES,'UTF-8');
$sql ='SELECT Titolo, Id FROM Song  WHERE Titolo LIKE "%'.$Valore.'%"';


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
}

?>
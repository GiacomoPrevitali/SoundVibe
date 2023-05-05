<?php
//session_start();
require_once('config.php');

$sql ='SELECT * FROM users WHERE Mail="'.$_POST['Mail'].'" AND Pass="'.md5($_POST['Password']).'"';
$result =$connection->query($sql);
$json=array();
if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        array_push($json,$row);
    }
    
}else{
   // echo json_encode(array('message' => "gdfgd" ));
    $null=array('Nome'=>'A',
                'Cognome'=>'A',
                'Data_Nascita'=>'A',
                'Codice_Fiscale'=>'A',
                'Mail'=>'A',
                'Password'=>'A');
    array_push($json,$null);

}
echo json_encode($json);
?>
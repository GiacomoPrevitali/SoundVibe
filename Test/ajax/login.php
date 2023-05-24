<?php
//session_start();
require_once('config.php');
$Mail=htmlspecialchars($_POST['Mail'],ENT_QUOTES,'UTF-8');
$Password=htmlspecialchars($_POST['Password'],ENT_QUOTES,'UTF-8');
$Pass=md5($Password);
$sql ='SELECT * FROM users WHERE Mail=? AND Pass=?';


$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $Mail,$Pass);
$stmt->execute();
     
$result = $stmt->get_result();
//$connection->close();
$stmt->close();
$json=array();

if($result->num_rows>0){
    while($row=mysqli_fetch_assoc($result)){
        if($row['Id']==70){

            $null=array(
                'Id'=>'70',
                'Nome'=>'B',
                'Cognome'=>'A',
                'Data_Nascita'=>'A',
                'Codice_Fiscale'=>'A',
                'Mail'=>'A',
                'Pass'=>'A');
                array_push($json,$null);
        }
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
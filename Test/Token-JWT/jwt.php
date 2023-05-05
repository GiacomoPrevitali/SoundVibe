<?php

require_once 'jwt_utils.php';

$headers = array('alg'=>'HS256','typ'=>'JWT');
$payload = array('Nome'=>$_POST['Nome'],'Cognome'=>$_POST['Cognome'], 'Data_Nascita'=>$_POST['Data_Nascita'],'Codice_Fiscale'=>$_POST['Codice_Fiscale'], 'Mail'=>$_POST['Mail'],'Password'=>$_POST['Password'], 'exp'=>(time() + 60));

$jwt = generate_jwt($headers, $payload);

echo json_encode($jwt);;
//$p=is_jwt_valid($jwt);

?>
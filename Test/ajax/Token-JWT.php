<?php

//function is_jwt_valid($jwt, $secret = 'secret') {
	// split the jwt
	
	$secret = 'secret';
	$jwt=$_REQUEST['Jwt'];
	//echo $jwt;
	$tokenParts = explode('.', $jwt);
	$header = base64_decode($tokenParts[0]);
	$payload = base64_decode($tokenParts[1]);
	$signature_provided = $tokenParts[2];

	$data=json_decode($payload);
	//echo $payload;
	// check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
//	$expiration = json_decode($payload)->exp;
//	$is_token_expired = ($expiration - time()) < 0;

	// build a signature based on the header and payload using the secret
	$base64_url_header = base64url_encode($header);
	$base64_url_payload = base64url_encode($payload);
	$signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
	$base64_url_signature = base64url_encode($signature);

	// verify it matches the signature provided in the jwt
	$is_signature_valid = ($base64_url_signature === $signature_provided);
	//$result;
	if (!$is_signature_valid) {
		//$result=array('result'=>'0');
		//array_push($json,$result);
		$json=array('result'=>'0');
	} else {
		//$result=array('result'=>'1');
		$json=array('result'=>'1',
					'payload'=>$data);
		//array_push($json,$result);
	}
	//array_push($json,$result);
	echo json_encode($json);

//}
function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}
?>
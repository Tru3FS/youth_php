<?php
 
require_once('vendor/firebase/php-jwt/src/JWT.php');
require_once('vendor/firebase/php-jwt/src/BeforeValidException.php');
require_once('vendor/firebase/php-jwt/src/ExpiredException.php');
require_once('vendor/firebase/php-jwt/src/SignatureInvalidException.php');

use Firebase\JWT\JWT;

error_reporting(E_ALL&~E_NOTICE&~E_WARNING);


//------------------------------------------------------------------------------------
//JWT 토큰인증 : 토큰발급
//------------------------------------------------------------------------------------
function CreateToken($Center_ID, $DB_Name, $DB_IP, $expireSec)
{

	$tokenId = "*";
	$issuedAt = time();
	$notBefore = $issuedAt;
	$expire = $issuedAt + $expireSec;
	$serverName = "*";
	 
	$secret_key = "GYMUS_dG9rZW5JRF9leGFtcGxlp0aSI6ImRHOXJaVzVKUkY5bGVHRnRjR3hsIiwiaXNzIj";
	 
	$data = array(
	   'iat' => $issuedAt,
	   'jti' => $tokenId,
	   'nbf' => $notBefore,
	   'exp' => $expire,
	   'cid' => base64_encode($Center_ID),
	   'dbn' => base64_encode($DB_Name),
	   'iss' => base64_encode($DB_IP)
	   //'data' => [
	   //  'acco_id' => $acco_id,
	   //  'server_no' => $server_no,
	   //]
	);

	$jwt = JWT::encode($data, $secret_key);  
	return $jwt;
}



//------------------------------------------------------------------------------------
//JWT 토큰인증 : 토큰변조, 토근기간만료시 오류전송
//------------------------------------------------------------------------------------
function CheckToken(&$DB_Name)
{
	$jwt = $_COOKIE['IUS_JWT'];
	$secret_key = "GYMUS_dG9rZW5JRF9leGFtcGxlp0aSI6ImRHOXJaVzVKUkY5bGVHRnRjR3hsIiwiaXNzIj";

	try { 
		  $decoded = JWT::decode($jwt, $secret_key, array('HS256'));
		  //print_r($decoded);

		  $decoded_array = (array)$decoded;
		  $Center_ID = $decoded_array['cid'];
          $Center_ID = base64_decode($Center_ID);

		  $DB_Name = $decoded_array['dbn'];
          $DB_Name = base64_decode($DB_Name);

		  $DB_IP = $decoded_array['iss'];
          $DB_IP = base64_decode($DB_IP);

		  $DB_Name = $DB_Name.'<*>'.$DB_IP;

		  return true;

	} catch (Exception $e) {
		  //echo $e->getMessage(); 

		  //응답코드 헤더추가  
		  //http_response_code(511);

          $r_json = "";
		  $r_json = $r_json.'{';
          $r_json = $r_json.'"Result": {"ResultCode": -1, "ResultMsg": "Invalid JWT - Authentication failed!"}';
		  $r_json = $r_json.'}';
		  echo $r_json;

		  return false;
	}
}




?>
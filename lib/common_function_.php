<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;




require 'vendor/autoload.php';
require_once 'db.php';
require_once 'func_jwt.php';

//---------------------------------------------------------------------------
//JWT 토큰인증 : 토큰변조,토근기간만료시 오류전송
//---------------------------------------------------------------------------
if ($IsTokenCheck == True) 
  if(CheckToken($DBName) == false)
     exit;
//---------------------------------------------------------------------------

//*******사업장정보*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Company_Info -> 아이디 중복 체크
//------------------------------------------------------------------------------------
function CF_Company_Info($center_id, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT Center_Name, Center_ID, Corp_No, President, Telephone, Post_No, CONCAT(Address, ' ', IFNULL(Address_Detail, '')) as Address ";
	$sql = $sql."  FROM TB_Company ";
	$sql = $sql." WHERE Center_ID = :center_id ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
}

//*******회원가입*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Dup_ID_Check -> 아이디 중복 체크
//------------------------------------------------------------------------------------
function CF_Dup_ID_Check($center_id, $member_id, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID = :center_id ";
	$sql = $sql."   AND Web_ID    = :member_id ";
	$sql = $sql."   AND State     = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$db = null;
			CF_Web_Log('아이디중복체크', '아이디중복', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -30,"ResultMsg":"중복된 아이디입니다!!"}}';
		}

        $db = null;

		CF_Web_Log('아이디중복체크', '중복없음', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('아이디중복체크', '아이디중복체크실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_New -> 회원정보 신규 저장 -> 차후에 본인인증 키값 insert 필요
//------------------------------------------------------------------------------------
function CF_Join_New($center_id, $member_id, $member_pw, $member_name, $birth, $sex, $solar_yn, $cellular, $sms_yn, $ip, $url,$dupinfo,$cert_no){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$length = 4;
		$char   = 0;
		$type   = 'd';
		$format = "%{$char}{$length}{$type}";

		$cur_month	= substr(DATE("Ymd"), 2, 4);
		$member_code = CF_Nextval($center_id, 'M'.$cur_month);

		$member_code = $center_id.$cur_month.sprintf($format, $member_code);

  	 
		$db->beginTransaction();

		$sql = "";
		$sql = $sql."INSERT INTO TB_Member(Center_ID,     Member_Code,                     Member_Name,   Web_ID,  Web_Pw,  Sex,        Birth_Date,                               Solar_Yn,      Cellular,                                    Sms_Yn, ";
		$sql = $sql."                      Discount_Code, Ins_Date,                        Ins_ID,        Ins_IP,     State,      Agree_Date, Term_Agree,                               Privacy_Agree, Other_Agree, ";
		$sql = $sql."                      Privacy_Agree1, Privacy_Agree2,                 Privacy_Agree3, Dupinfo, cert_no) ";
		$sql = $sql."               VALUES(:center_id,          :member_code,                    :member_name,  :member_id, petra.pls_encrypt_b64(:member_pw, 200), :sex,       petra.pls_encrypt_b64(:birth, 100), :solar_yn,           petra.pls_encrypt_b64(:cellular, 100), :sms_yn, ";
		$sql = $sql."                      '00001',       F_DATE_TIME('yyyymmddhh24miss'), 'WEB',         :ip,        '001',      F_DATE_TIME('yyyymmdd'), 'Y', 'Y', 'N', 'N', 'N', 'N',:dupinfo,:cert_no) ";
		
		
		
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_code'  , $member_code);
		$stmt->bindParam(':member_name'  , $member_name);
		$stmt->bindParam(':member_id'    , $member_id);
		$stmt->bindParam(':member_pw'    , $member_pw);
		$stmt->bindParam(':sex'          , $sex);
		$stmt->bindParam(':sms_yn'       , $sms_yn);		
		$stmt->bindParam(':solar_yn'     , $solar_yn);		
		$stmt->bindParam(':birth'        , $birth);
		$stmt->bindParam(':cellular'     , $cellular);
		$stmt->bindParam(':ip'           , $ip);
		$stmt->bindParam(':dupinfo'      , $dupinfo);
		$stmt->bindParam(':cert_no'      , $cert_no);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('회원신규가입', '가입성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		
		$db->rollback();
		$db = null;
		CF_Web_Log('회원신규가입', '회원신규가입실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};


//------------------------------------------------------------------------------------
// ● 함수명 : CF_MEMBER_ID -> 회원정보
//------------------------------------------------------------------------------------
function CF_MEMBER_ID($center_id, $member_id, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT Member_Name, Web_ID, Member_Code, petra.pls_decrypt_b64(Cellular, 100) as Cellular, petra.pls_decrypt_b64(Birth_Date, 100) as Birth_Date, ";
	$sql = $sql."       Sex, Upd_Date, Solar_Yn, Sms_Yn, F_AGE(Center_ID, Birth_Date) as Age ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID   = :center_id ";
	$sql = $sql."   AND Web_ID      = :member_id ";
	$sql = $sql."   AND State       = '001' ";



	try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('회원정보 찾기', '회원정보 찾기성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('회원정보 찾기', '회원정보 찾기실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_DIVISION_ID -> 기존회원정보
//------------------------------------------------------------------------------------
function CF_DIVISION_ID($center_id, $member_code, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT Member_Name, Member_Code, petra.pls_decrypt_b64(Cellular, 100) as Cellular, petra.pls_decrypt_b64(Birth_Date, 100) as Birth_Date, Sex, Upd_Date, Solar_Yn, Sms_Yn, Term_Agree	";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID   = :center_id ";
	$sql = $sql."   AND Member_Code = :member_code ";
	$sql = $sql."   AND State       = '001' ";



	try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_code'  , $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('회원정보 찾기', '회원정보 찾기성공', $member_code, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('회원정보 찾기', '회원정보 찾기실패 : '.$e->getMessage(), $member_code, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};



//------------------------------------------------------------------------------------
// ● 함수명 : CF_MEMBER_ID2 -> 회원체크
//------------------------------------------------------------------------------------
function CF_MEMBER_ID2($center_id, $member_id, $member_pw, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID = :center_id ";
	$sql = $sql."   AND Web_ID    = :member_id ";
	$sql = $sql."   AND Web_Pw    = petra.pls_encrypt_b64(:member_pw, 200) ";	
	$sql = $sql."   AND State     = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);
		$stmt->bindParam(':member_pw'  , $member_pw);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

        //echo $cnt;

		if($cnt > 0){
			$db = null;
			CF_Web_Log('회원여부', '회원여부체크성공', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": 0,"ResultMsg":"회원여부체크성공"}}';
		}else{
			
			$db = null;
			CF_Web_Log('회원여부', '회원가입없음', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -30,"ResultMsg":"회원가입없음체크성공"}}';
			
		}	

        $db = null;

		//CF_Web_Log('회원여부', '회원여부체크성공', $member_id, $url, $ip);

        //$r_json = "";
		//$r_json = $r_json.'{';
        //$r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		//$r_json = $r_json.'}';
		//return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('회원여부', '회원여부체크실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};


//------------------------------------------------------------------------------------
// ● 함수명 : CF_MEMBER_ID2 -> 회원체크
//------------------------------------------------------------------------------------
function CF_MEMBER_ID3($center_id, $member_id, $cellular, $url){
	global $DBName;
	global $manage_gs_key;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID = :center_id ";
	$sql = $sql."   AND Web_ID    = :member_id ";
	//$sql = $sql."   AND Cellular =  HEX(AES_ENCRYPT(:cellular, :manage_gs_key)) ";	
	$sql = $sql."   AND State     = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);
		$stmt->bindParam(':cellular'  , $cellular);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

        //echo $cnt;

		if($cnt > 0){
			$db = null;
			CF_Web_Log('회원여부', '회원여부체크성공', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": 0,"ResultMsg":"회원여부체크성공"}}';
		}else{
			
			$db = null;
			CF_Web_Log('회원여부', '회원가입없음', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": 0,"ResultMsg":"회원가입없음체크성공"}}';
			
		}	

        $db = null;

		//CF_Web_Log('회원여부', '회원여부체크성공', $member_id, $url, $ip);

        //$r_json = "";
		//$r_json = $r_json.'{';
        //$r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		//$r_json = $r_json.'}';
		//return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('회원여부', '회원여부체크실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};
//------------------------------------------------------------------------------------
// ● 함수명 : CF_MEMBER_ID2 -> 회원체크
//------------------------------------------------------------------------------------
function CF_MEMBER_ID4($center_id, $member_id,$member_name, $cellular, $url){
	global $DBName;
	global $manage_gs_key;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID   = :center_id ";
	$sql = $sql."   AND Web_ID      = :member_id ";
	$sql = $sql."   AND Member_Name = :member_name ";
	$sql = $sql."   AND Cellular    = petra.pls_encrypt_b64(:cellular, 100) ";	
	$sql = $sql."   AND State       = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);
		$stmt->bindParam(':cellular'   , $cellular);
	    $stmt->bindParam(':member_name', $member_name);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

        //echo $cnt;

		if($cnt > 0){
			$db = null;
			CF_Web_Log('회원여부', '회원여부체크성공', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": 0,"ResultMsg":"회원여부체크성공"}}';
		}else{
			
			$db = null;
			CF_Web_Log('회원여부', '회원가입없음', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -10,"ResultMsg":"회원가입없음체크성공"}}';
			
		}	

        $db = null;

		//CF_Web_Log('회원여부', '회원여부체크성공', $member_id, $url, $ip);

        //$r_json = "";
		//$r_json = $r_json.'{';
        //$r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		//$r_json = $r_json.'}';
		//return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('회원여부', '회원여부체크실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_MEMBER_ID5 -> 회원정보체크
//------------------------------------------------------------------------------------
function CF_MEMBER_ID5($center_id, $member_name, $cellular, $birth, $url){
	global $DBName;
	global $manage_gs_key;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID   = :center_id ";
	$sql = $sql."   AND Member_Name = :member_name ";
	$sql = $sql."   AND Cellular   = petra.pls_encrypt_b64(:cellular, 100) ";
	$sql = $sql."   AND Birth_Date = petra.pls_encrypt_b64(:birth, 100) ";	
	$sql = $sql."   AND State       = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':cellular'     , $cellular);
		$stmt->bindParam(':birth'        , $birth);
	    $stmt->bindParam(':member_name'  , $member_name);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);
		

		$cnt    = $data['cnt'];

		if($cnt == 1){
			$sql = "";
			$sql = $sql."SELECT Member_Code, IFNULL(Web_ID, '') as Web_ID ";
			$sql = $sql."  FROM TB_Member ";
			$sql = $sql." WHERE Center_ID   = :center_id ";
			$sql = $sql."   AND Member_Name = :member_name ";
			$sql = $sql."   AND Cellular   = petra.pls_encrypt_b64(:cellular, 100) ";
			$sql = $sql."   AND Birth_Date = petra.pls_encrypt_b64(:birth, 100) ";	
			$sql = $sql."   AND State       = '001' ";

			$stmt = $db->prepare($sql);
			$stmt->bindParam(':center_id'    , $center_id);
			$stmt->bindParam(':cellular'     , $cellular);
			$stmt->bindParam(':birth'        , $birth);
			$stmt->bindParam(':member_name'  , $member_name);

			$stmt->execute();
			$data = $stmt-> fetch(PDO::FETCH_BOTH);

			$web_id = $data['Web_ID'];
		}

        //echo $web_id;

		if($cnt == 0){
			$db = null;
			CF_Web_Log('회원여부', '일치회원없음', $member_name, $url, $ip);
			return '{"Result": {"ResultCode": 1,"ResultMsg":"일치회원없음"}}';
		}else if($cnt ==1 && $web_id == ''){
			$db = null;
			CF_Web_Log('회원여부', '회원여부체크성공', $member_name, $url, $ip);
			return '{"Result": {"ResultCode": 0,"Result_Code":"'.$data['Member_Code'].'","ResultMsg":"회원여부체크성공"}}';
		}else if($cnt ==1 && $web_id != ''){
			$db = null;
			CF_Web_Log('회원여부', '회원여부체크성공', $member_name, $url, $ip);
			return '{"Result": {"ResultCode": 3,"Result_Code":"'.$data['Member_Code'].'","web_id":"'.$data['Web_ID'].'","ResultMsg":"이미 가입한 정보가 있습니다"}}';
		}else if($cnt > 1 && $web_id != ''){
			
			$db = null;
			CF_Web_Log('회원여부', '2건이상', $member_name, $url, $ip);
			return '{"Result": {"ResultCode": 4,"ResultMsg":"회원여부체크성공"}}';
			
		}else if($cnt > 1 && $web_id == ''){
			
			$db = null;
			CF_Web_Log('회원여부', '2건이상', $member_name, $url, $ip);
			return '{"Result": {"ResultCode": 2,"ResultMsg":"회원여부체크성공"}}';
			
		}	

        $db = null;

		//CF_Web_Log('회원여부', '회원여부체크성공', $member_id, $url, $ip);

        //$r_json = "";
		//$r_json = $r_json.'{';
        //$r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		//$r_json = $r_json.'}';
		//return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('회원여부', '회원여부체크실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};





//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_Pwd_Update -> 회원정보비밀번호 수정
//------------------------------------------------------------------------------------
function CF_Join_Phone_Update($center_id, $member_id, $cellular, $ip, $url){
	global $DBName;
	global $manage_gs_key;

   	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID = :center_id ";
	$sql = $sql."   AND Web_ID    = :member_id ";
    $sql = $sql."   AND Cellular  = petra.pls_encrypt_b64(:cellular, 100) ";	
	$sql = $sql."   AND State     = '001' ";


	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id' , $center_id);
		$stmt->bindParam(':cellular'  , $cellular);
	    $stmt->bindParam(':member_id' , $member_id);	

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];
		
		
		
		if($cnt > 0){
			$db = null;
			CF_Web_Log('본인전화번호', '본인전화번호', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -30,"ResultMsg":"본인전화번호"}}';
		}else{

		$cnt = 0;

		$sql = "";
		$sql = $sql."SELECT COUNT(*) as cnt ";
		$sql = $sql."  FROM TB_Member ";
		$sql = $sql." WHERE Center_ID = :center_id ";
	    $sql = $sql."   AND Cellular  = petra.pls_encrypt_b64(:cellular, 100) ";		
		$sql = $sql."   AND State     = '001' ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id' , $center_id);
		$stmt->bindParam(':cellular'  , $cellular);	

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$db = null;
			CF_Web_Log('중복전화번호', '중복전화번호', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -40,"ResultMsg":"중복전화번호"}}';
		}


		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Cellular  = petra.pls_encrypt_b64(:cellular, 100) ";
		$sql = $sql." WHERE Center_ID = :center_id ";
		$sql = $sql."   AND Web_ID    = :member_id ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'   , $center_id);
		$stmt->bindParam(':member_id'   , $member_id);
		$stmt->bindParam(':cellular'    , $cellular);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('회원정보전화번호수정', '회원정보전화번호수정성공', $member_id, $url, $ip);
        }

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('회원정보전화번호수정', '회원정보전화번호수정실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};


//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_Pwd_Update -> 회원정보비밀번호 수정
//------------------------------------------------------------------------------------
function CF_Join_Pwd_Update($center_id, $member_id, $member_pw, $ip, $url){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Web_Pw      =  petra.pls_encrypt_b64(:member_pw, 200) , ";
		$sql = $sql."       Upd_ID      = 'WEB', ";
		$sql = $sql."       Upd_Date    = F_DATE_TIME('yyyymmddhh24miss'), ";	
		$sql = $sql."       Upd_Ip      = :ip ";
		$sql = $sql." WHERE Center_ID = :center_id ";
		$sql = $sql."   AND Web_ID    = :member_id ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_id'    , $member_id);
		$stmt->bindParam(':member_pw'    , $member_pw);
		$stmt->bindParam(':ip'           , $ip);
		
		
		//echo $member_id;
		//echo $member_name;
		//echo $member_pw;
		//echo $ip;		
		

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('회원정보비밀번호수정', '회원정보비밀번호수정성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('회원정보비밀번호수정', '회원정보비밀번호수정실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};


//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_Update -> 회원정보 수정
//------------------------------------------------------------------------------------
function CF_Join_Update($center_id, $member_id, $member_pw, $member_name, $birth, $sex, $cellular, $ip, $url){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Web_Pw      = petra.pls_encrypt_b64(:member_pw, 200), ";
		$sql = $sql."       Sex         = :sex, ";
		$sql = $sql."       Birth_Date  = petra.pls_encrypt_b64(:birth, 100), ";
		$sql = $sql."       Cellular    = petra.pls_encrypt_b64(:cellular, 100), ";
		$sql = $sql."       Upd_Date    = F_DATE_TIME('yyyymmddhh24miss'), ";
		$sql = $sql."       Upd_ID      = 'WEB', ";
		$sql = $sql."       Upd_Ip      = :ip ";
		$sql = $sql." WHERE Center_ID = :center_id ";
		$sql = $sql."   AND Web_ID    = :member_id ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_id'    , $member_id);
		$stmt->bindParam(':member_name'  , $member_name);
		$stmt->bindParam(':member_pw'    , $member_pw);
		$stmt->bindParam(':sex'          , $sex);
		$stmt->bindParam(':birth'        , $birth);
		$stmt->bindParam(':cellular'     , $cellular);
		$stmt->bindParam(':ip'           , $ip);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('회원정보수정', '수정성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('회원정보수정', '회원정보수정실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_Update -> 회원정보 수정
//------------------------------------------------------------------------------------
function CF_Join_Update2($center_id, $member_id, $member_name, $birth, $sex, $solar_yn, $sms_yn, $ip, $url){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Sex         = :sex, ";
		$sql = $sql."       Solar_Yn    = :solar_yn, ";
		$sql = $sql."       Sms_Yn      = :sms_yn, ";		
		$sql = $sql."       Birth_Date  = petra.pls_encrypt_b64(:birth, 100), ";
		$sql = $sql."       Upd_Date    = F_DATE_TIME('yyyymmddhh24miss'), ";
		$sql = $sql."       Upd_ID      = 'WEB', ";
		$sql = $sql."       Upd_Ip      = :ip ";
		$sql = $sql." WHERE Center_ID = :center_id ";
		$sql = $sql."   AND Web_ID    = :member_id ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_id'    , $member_id);
    	$stmt->bindParam(':sex'          , $sex);
     	$stmt->bindParam(':solar_yn'     , $solar_yn);		
     	$stmt->bindParam(':sms_yn'       , $sms_yn);				
		$stmt->bindParam(':birth'        , $birth);
		$stmt->bindParam(':ip'           , $ip);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('회원정보수정', '수정성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('회원정보수정', '회원정보수정실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};



function CF_Join_Update3($center_id, $member_code, $member_id,  $member_pw, $member_name, $cellular,  $birth, $sex, $solar_yn, $sms_yn, $ip, $url, $agree_yn){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		if($agree_yn == 'Y'){
			$sql = "";
			$sql = $sql."UPDATE TB_Member ";
			$sql = $sql."   SET Sex          = :sex, ";
			$sql = $sql."       Web_ID       = :member_id, ";
			$sql = $sql."       Web_Pw       = petra.pls_encrypt_b64(:member_pw, 200), ";
			$sql = $sql."       Member_Name  = :member_name, ";
			$sql = $sql."       Cellular     = petra.pls_encrypt_b64(:cellular, 100), ";
			$sql = $sql."       Solar_Yn     = :solar_yn, ";
			$sql = $sql."       Sms_Yn       = :sms_yn, ";		
			$sql = $sql."       Birth_Date   = petra.pls_encrypt_b64(:birth, 100), ";
			$sql = $sql."       Upd_Date     = F_DATE_TIME('yyyymmddhh24miss'), ";
			$sql = $sql."       Upd_ID       = 'WEB', ";
			$sql = $sql."       Upd_Ip       = :ip ";
			$sql = $sql." WHERE Center_ID   = :center_id ";
			$sql = $sql."   AND Member_Code = :member_code ";
		}
		else{
			$sql = "";
			$sql = $sql."UPDATE TB_Member ";
			$sql = $sql."   SET Sex           = :sex, ";
			$sql = $sql."       Web_ID        = :member_id, ";
			$sql = $sql."       Web_Pw        = petra.pls_encrypt_b64(:member_pw, 200), ";
			$sql = $sql."       Member_Name   = :member_name, ";
			$sql = $sql."       Cellular      = petra.pls_encrypt_b64(:cellular, 100), ";
			$sql = $sql."       Solar_Yn      = :solar_yn, ";
			$sql = $sql."       Sms_Yn        = :sms_yn, ";		
			$sql = $sql."       Birth_Date    = petra.pls_encrypt_b64(:birth, 100), ";
			$sql = $sql."       Upd_Date      = F_DATE_TIME('yyyymmddhh24miss'), ";
			$sql = $sql."       Upd_ID        = 'WEB', ";
			$sql = $sql."       Upd_Ip        = :ip, ";
			$sql = $sql."       Term_Agree    = 'Y', ";
			$sql = $sql."       Privacy_Agree = 'Y', ";
			$sql = $sql."       Agree_Date    = F_DATE_TIME('yyyymmdd') ";
			$sql = $sql." WHERE Center_ID   = :center_id ";
			$sql = $sql."   AND Member_Code = :member_code ";
		}
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_code'  , $member_code);
		$stmt->bindParam(':member_id'    , $member_id);
		$stmt->bindParam(':member_pw'    , $member_pw);
		$stmt->bindParam(':member_name'  , $member_name);
		$stmt->bindParam(':cellular'     , $cellular);
    	$stmt->bindParam(':sex'          , $sex);
     	$stmt->bindParam(':solar_yn'     , $solar_yn);		
     	$stmt->bindParam(':sms_yn'       , $sms_yn);				
		$stmt->bindParam(':birth'        , $birth);
		$stmt->bindParam(':ip'           , $ip);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('기존회원 회원가입', '기존회원 회원가입성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('기존회원 회원가입', '기존회원 회원가입실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_Withdraw -> 회원탈퇴 -> 차후에 본인인증 키값도 삭제해야 함
//------------------------------------------------------------------------------------
function CF_Join_Withdraw($center_id, $member_code, $member_id, $ip, $url){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Member_Name           = '탈퇴회원', ";
		$sql = $sql."       Web_ID                = null, ";
		$sql = $sql."       Web_Pw                = null, ";
		$sql = $sql."       Post_No               = '', ";
		$sql = $sql."       Address               = '', ";
		$sql = $sql."       Address_Detail        = '', ";
		$sql = $sql."       Birth_Date            = petra.pls_encrypt_b64('19000101', 100) ";
		$sql = $sql."       Cellular              = petra.pls_encrypt_b64(null, 100) , ";
		$sql = $sql."       Telephone             = petra.pls_encrypt_b64(null, 100) , ";
		$sql = $sql."       Upd_Date              = F_DATE_TIME('yyyymmddhh24miss'), ";
		$sql = $sql."       Upd_ID                = 'WEB', ";
		$sql = $sql."       Upd_Ip                = :ip, ";
        $sql = $sql."       Dupinfo               = '', ";
        $sql = $sql."       cert_no               = '', ";
		$sql = $sql."       LATEST_TRY_LOGIN_DATE = null, ";
		$sql = $sql."       State                 = '002' ";
		$sql = $sql." WHERE Center_ID   = :center_id ";
		$sql = $sql."   AND Member_Code = :member_code ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_code'  , $member_code);
		$stmt->bindParam(':ip'           , $ip);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('회원탈퇴', '탈퇴성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('회원탈퇴', '회원탈퇴실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_FInd_ID -> 아이디 찾기
//------------------------------------------------------------------------------------
function CF_FInd_ID($center_id, $cellular, $member_name, $url){
	global $DBName;
    global $manage_gs_key;
	
	
	$sql = "";
    $sql = $sql."SELECT IFNULL(Web_ID, '') as Web_ID ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID   = :center_id ";
	$sql = $sql."   AND Member_Name = :member_name ";
	$sql = $sql."   AND Cellular    = petra.pls_encrypt_b64(:cellular, 100) ";
	$sql = $sql."   AND State       = '001' ";

     



	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;
		
		

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_name'  , $member_name);
		$stmt->bindParam(':cellular'     , $cellular);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($data as $row){
			//$member_id = $row['Web_ID'];
			
		}
       
	   //echo $member_id;
       

        $db = null;

		CF_Web_Log('아이디 찾기', '찾기성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('아이디 찾기', '아이디 찾기실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_FInd_PW -> 비밀번호 찾기(비번 초기화)
//------------------------------------------------------------------------------------
function CF_FInd_PW($center_id, $cellular, $member_name, $member_id, $init_password, $url){
	global $DBName;
    global $manage_gs_key;



	try{

        $db = new db();
        $db = $db->connect($DBName);


      	$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Web_Pw             = petra.pls_encrypt_b64(:init_password, 200), ";
		$sql = $sql."       Password_Change_Yn = 'N' ";
		$sql = $sql." WHERE Center_ID   = :center_id ";
		$sql = $sql."   AND Member_Name = :member_name ";
		$sql = $sql."   AND Web_ID      = :member_id ";
		$sql = $sql."   AND Cellular    = petra.pls_encrypt_b64(:cellular, 100) ";
		$sql = $sql."   AND State       = '001' ";


    	$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'     , $center_id);
		$stmt->bindParam(':member_name'   , $member_name);
		$stmt->bindParam(':member_id'     , $member_id);
		$stmt->bindParam(':cellular'      , $cellular);
		$stmt->bindParam(':init_password' , $init_password);
	
		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('비밀번호 찾기', '비밀번호찾기성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('비밀번호 찾기', '비밀번호 찾기실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//*******로그인*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Login
//------------------------------------------------------------------------------------
function CF_Login($center_id, $member_id, $member_pw, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID = :center_id ";
	$sql = $sql."   AND Web_ID    = :member_id ";
	$sql = $sql."   AND State     = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];
		
		if($cnt == 0){
			$db = null;
			CF_Web_Log('회원로그인', '존재하지 않는 아이디', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -30,"ResultMsg":"존재하지 않는 아이디 입니다!!"}}';
		}

		$cnt = 0;

		$sql = "";
		$sql = $sql."SELECT COUNT(*) as cnt ";
		$sql = $sql."  FROM TB_Member ";
		$sql = $sql." WHERE Center_ID = :center_id ";
		$sql = $sql."   AND Web_ID    = :member_id ";
		$sql = $sql."   AND Web_Pw    = petra.pls_encrypt_b64(:member_pw, 200)";		
		$sql = $sql."   AND State     = '001' ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);
		$stmt->bindParam(':member_pw'  , $member_pw);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt == 0){
			$db = null;
			CF_Web_Log('회원로그인', '비밀번호가 일치하지 않습니다', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -20,"ResultMsg":"비밀번호가 일치하지 않습니다!!"}}';
		}
		
		//로그인 성공 시 마지막 로그인일시 업데이트
		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Last_Web_Login_Date = F_DATE_TIME('yyyymmddhh24miss') ";
		$sql = $sql." WHERE Center_ID = :center_id ";
		$sql = $sql."   AND Web_ID    = :member_id ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'   , $center_id);
		$stmt->bindParam(':member_id'   , $member_id);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('회원로그인', '로그인성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('회원로그인', '로그인실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//*******웹접근로그*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Web_Log -> 회원탈퇴 -> 차후에 본인인증 키값도 삭제해야 함
//------------------------------------------------------------------------------------
function CF_Web_Log($event_name, $event_result, $member_id, $url, $ip){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."INSERT INTO TB_Web_Log(Event_ID,                         Event_Date, Event_Name,  Event_Result,  Member_ID,  URL,  IP) ";
		$sql = $sql."                VALUES(F_DATE_TIME('YYYYMMDDHH24MISSF'), Now(),      :event_name, :event_result, :member_id, :url, :ip) ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':event_name'  , $event_name);
		$stmt->bindParam(':event_result', $event_result);
		$stmt->bindParam(':member_id'   , $member_id);
		$stmt->bindParam(':url'         , $url);
		$stmt->bindParam(':ip'          , $ip);

		$stmt->execute();

		$db->commit();

        $db = null;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
    }

};

//*******채번*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Nextval
//------------------------------------------------------------------------------------
function CF_Nextval($p_center_id, $p_col){
	global $DBName;

	$db = new db();
    $db = $db->connect($DBName);
	$db->beginTransaction();
	
    $sql = "";
    $sql = $sql."SELECT CURRVAL AS LD_SEQ ";
	$sql = $sql."  FROM TB_SEQUENCE ";
	$sql = $sql." WHERE Center_ID = :p_center_id ";
	$sql = $sql."   AND Name      = :p_col FOR UPDATE ";
	
    try{
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':p_center_id' , $p_center_id);
		$stmt->bindParam(':p_col' ,       $p_col);
        $stmt->execute();
        $LD_SEQ = $stmt->fetch();		
		
        //해당 자료가 있으면 업데이트 후 +1 된 값 리턴
		if ($LD_SEQ[0] > 0)
		{
			//------------
			//업데이트
			//------------
			$LD_SEQ[0] += 1 ;
			
			$sql = "";
			$sql = $sql."UPDATE TB_SEQUENCE ";
			$sql = $sql."   SET Currval = :LD_SEQ ";
			$sql = $sql." WHERE Center_ID = :p_center_id ";
	        $sql = $sql."   AND Name      = :p_col ";

			try{

				$stmt = $db->prepare($sql);
				
				$stmt->bindParam(':p_center_id' , $p_center_id);
				$stmt->bindParam(':p_col' ,       $p_col);
				$stmt->bindParam(':LD_SEQ' ,      $LD_SEQ[0]);
				$stmt->execute();
				$db->commit(); 
                $db = null;
				
				return $LD_SEQ[0];

			}catch(Exception $e){
				$db->rollback();
				//echo '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
			}
		} 
		else {
			//------------
			//없으면 신규로 Insert
			//------------
			$sql = "";
			$sql = $sql."INSERT INTO TB_SEQUENCE (Center_ID,    Name,   Currval) ";
			$sql = $sql."                 VALUES (:p_center_id, :p_col, 1) ";

			try{

				$stmt = $db->prepare($sql);
				
				$stmt->bindParam(':p_center_id' , $p_center_id);
				$stmt->bindParam(':p_col' ,       $p_col);
				$stmt->execute();
				$db->commit(); 
				$db = null;

				return '1';

			}catch(Exception $e){
				$db->rollback();
				//echo '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
			}
		}
		
    }catch(Exception $e){
		//echo '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};


//*******신규 강습 조회*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Web_Application_Search
// ● 설  명 : 웹접수 기간 조회
//------------------------------------------------------------------------------------
function CF_Web_Application_Search ($center_id, $sales_code){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT a.Sales_Code, a.Sales_Item_Name,a.First_Start_Day_Yn, IFNULL(a.Web_Re_Start, '00000000') as Web_Re_Start, IFNULL(a.Web_Re_End, '00000000') as Web_Re_End, ";
	$sql = $sql."       IFNULL(a.Web_Re_Start_Time, '0000') as Web_Re_Start_Time, IFNULL(a.Web_Re_End_Time, '0000') as Web_Re_End_Time, IFNULL(a.Web_New_Start, '00000000') as Web_New_Start, ";
	$sql = $sql."       IFNULL(a.Web_New_End, '00000000') as Web_New_End, IFNULL(a.Web_New_Start_Time, '0000') as Web_New_Start_Time, IFNULL(a.Web_New_End_Time, '0000') as Web_New_End_Time, b.Web_Apply_Gubun ";
    $sql = $sql."  FROM TB_SaleItem   a INNER JOIN ";
	$sql = $sql."       TB_Systemsetting   b ON a.Center_ID = b.Center_ID";
    $sql = $sql." WHERE a.Center_ID        = :center_id ";
	$sql = $sql."   AND a.Sales_Code       = :sales_code ";
    $sql = $sql."   AND a.Sales_Division   = '003' ";
	$sql = $sql."   AND a.Online_Yn        = 'Y' ";
	$sql = $sql."   AND a.State            = '001' ";



    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':sales_code'      , $sales_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};
//*******신규 강습 조회*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Search_Place
// ● 설  명 : 신규 접수 시 업장 조회
//------------------------------------------------------------------------------------
function CF_Search_Place ($center_id, $sales_place_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT DISTINCT b.Detail_Code as Place_Code, b.Detail_Name as Place_Name ";
    $sql = $sql."  FROM TB_SaleItem a INNER JOIN ";
	$sql = $sql."       TB_Code_D   b ON a.Place_Code = b.Detail_Code AND b.Common_Code = 'H01' ";
    $sql = $sql." WHERE a.Center_ID           = :center_id ";
    $sql = $sql."   AND a.Sales_Division      = '003' ";
	$sql = $sql."   AND a.Sales_Place_Code LIKE :sales_place_code ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";
	$sql = $sql." ORDER BY b.Detail_Name ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':sales_place_code', $sales_place_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강이력조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강이력조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Search_Event
// ● 설  명 : 신규 접수 시 종목 조회
//------------------------------------------------------------------------------------
function CF_Search_Event ($center_id, $sales_place_code, $place_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT DISTINCT b.Detail_Code as Event_Code, b.Detail_Name as Event_Name ";
    $sql = $sql."  FROM TB_SaleItem a INNER JOIN ";
	$sql = $sql."       TB_Code_D   b ON a.Event_Code = b.Detail_Code AND b.Common_Code = 'H02' ";
    $sql = $sql." WHERE a.Center_ID           = :center_id ";
    $sql = $sql."   AND a.Sales_Division      = '003' ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";
	$sql = $sql." ORDER BY a.Event_Code ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('종목조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('종목조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Search_Class
// ● 설  명 : 신규 접수 시 강습반 조회
//------------------------------------------------------------------------------------
function CF_Search_Class ($center_id, $sales_place_code, $place_code, $event_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT DISTINCT b.Class_Code, b.Class_Name ";
    $sql = $sql."  FROM TB_SaleItem   a INNER JOIN ";
	$sql = $sql."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code AND a.Class_Code = b.Class_Code ";
    $sql = $sql." WHERE a.Center_ID           = :center_id ";
    $sql = $sql."   AND a.Sales_Division      = '003' ";
	$sql = $sql."   AND a.Event_Code       LIKE :event_code ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";
	$sql = $sql." ORDER BY a.Class_Code ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':event_code'      , $event_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('강습반조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('강습반조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Search_Sales_Code
// ● 설  명 : 신규 접수 시 프로그램 조회
//------------------------------------------------------------------------------------
function CF_Search_Sales_Code ($center_id, $event_code, $class_code, $sales_item_name, $Tmonth, $member_id, $url, $ip){
	global $DBName;

	if($sales_item_name == ''){
		$event_code = '%';
		$class_code = '%';
	}

	$sql = "";
    $sql = $sql."SELECT a.Sales_Code, a.Kiosk_Display_Text as Sales_Item_Name, b.Vat_Yn, a.Start_Time, a.End_Time, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
	$sql = $sql."       (SELECT Detail_Name FROM TB_CODE_D WHERE Common_Code = 'H02' AND Detail_Code = a.Event_Code) Event_Name, ";
	$sql = $sql."       a.Lesson_ID, b.Program_Sub_Name, b.Month_Qty, b.Unit_Price, a.Capacity_On_OffLine, a.Web_New_Start, a.Web_New_End, a.Web_New_STime, a.Web_New_ETime, ";
	$sql = $sql."       (SELECT COUNT(*) ";
	$sql = $sql."          FROM TB_Transaction ";
	$sql = $sql."         WHERE Center_ID        = a.Center_ID ";
	$sql = $sql."           AND Sales_Division   = '003' ";
	$sql = $sql."           AND Sales_Code       = a.Sales_Code ";
	$sql = $sql."           AND :Tmonth    BETWEEN Start_Date AND End_Date ";
	$sql = $sql."           AND End_Date        >= F_DATE_TIME('YYYYMMDD') ";
	$sql = $sql."           AND Transition_State = '001' ";
	$sql = $sql."           AND Trs_Type         = '001' ";
	$sql = $sql."           AND State            = '001') ";
	$sql = $sql."       + (SELECT COUNT(*) ";
	$sql = $sql."            FROM TB_Basket_Program ";
	$sql = $sql."           WHERE Center_ID       = a.Center_ID ";
	$sql = $sql."             AND Sales_Division  = '003' ";
	$sql = $sql."             AND Sales_Code      = a.Sales_Code ";
	$sql = $sql."             AND :Tmonth   BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sql = $sql."             AND State           = '001') ";
	$sql = $sql."       + (SELECT COUNT(*) ";
	$sql = $sql."           FROM tb_lecture_waiting ";
	$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
	$sql = $sql."            AND YYYYMM                     = LEFT(:start_date, 6) ";
	$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
	$sql = $sql."            AND Process_State              = '01') as Current_Person, ";
	$sql = $sql."       b.Age_From, b.Age_To, b.Vat_Yn, c.Detail_Code as Target_Code, c.Detail_Name as Target_Name ";
    $sql = $sql."  FROM TB_SaleItem       a INNER JOIN ";
	$sql = $sql."       TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code INNER JOIN ";
	$sql = $sql."       TB_Code_D         c ON b.Target_Code = c.Detail_Code AND Common_Code = 'H33' ";
    $sql = $sql." WHERE a.Center_ID             = :center_id ";
    $sql = $sql."   AND a.Sales_Division        = '003' ";
	$sql = $sql."   AND a.Event_Code         LIKE :event_code ";
	$sql = $sql."   AND a.Class_Code         LIKE :class_code ";
	$sql = $sql."   AND a.Kiosk_Display_Text LIKE CONCAT('%', :sales_item_name. '%') ";
	$sql = $sql."   AND a.Online_Yn             = 'Y' ";
	$sql = $sql."   AND b.Online_Yn             = 'Y' ";
	$sql = $sql."   AND a.First_Start_Day_Yn    = 'Y' ";
	$sql = $sql."   AND a.State                 = '001' ";
	$sql = $sql."   AND b.Apply_Date            = (SELECT MAX(Apply_Date) ";
	$sql = $sql."                                    FROM TB_SaleItem_Price ";
	$sql = $sql."                                   WHERE Center_ID   = a.Center_ID ";
	$sql = $sql."                                     AND Apply_Date <= CONCAT(:Tmonth, '01') ";
	$sql = $sql."                                 ) ";
	$sql = $sql." ORDER BY a.Sales_Item_Name ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':event_code'      , $event_code);
		$stmt->bindParam(':class_code'      , $class_code);
		$stmt->bindParam(':sales_item_name' , $sales_item_name);
		$stmt->bindParam(':Tmonth'          , $Tmonth);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('프로그램조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('프로그램조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Search_Sales_Code2
// ● 설  명 : 신규 접수 시 프로그램 조회 - 수시접수
//------------------------------------------------------------------------------------
function CF_Search_Sales_Code2 ($center_id, $event_code, $class_code, $sales_item_name, $Tmonth, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT a.Sales_Code, a.Kiosk_Display_Text as Sales_Item_Name, b.Vat_Yn, a.Start_Time, a.End_Time, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
	$sql = $sql."       (SELECT Detail_Name FROM TB_CODE_D WHERE Common_Code = 'H02' AND Detail_Code = a.Event_Code) Event_Name, ";
	$sql = $sql."       a.Lesson_ID, b.Program_Sub_Name, b.Month_Qty, b.Unit_Price, a.Capacity_On_OffLine, a.Web_New_Start, a.Web_New_End, a.Web_New_STime, a.Web_New_ETime, ";
	$sql = $sql."       (SELECT COUNT(*) ";
	$sql = $sql."          FROM TB_Transaction ";
	$sql = $sql."         WHERE Center_ID        = a.Center_ID ";
	$sql = $sql."           AND Sales_Division   = '003' ";
	$sql = $sql."           AND Sales_Code       = a.Sales_Code ";
	$sql = $sql."           AND :Tmonth    BETWEEN Start_Date AND End_Date ";
	$sql = $sql."           AND End_Date        >= F_DATE_TIME('YYYYMMDD') ";
	$sql = $sql."           AND Transition_State = '001' ";
	$sql = $sql."           AND Trs_Type         = '001' ";
	$sql = $sql."           AND State            = '001') ";
	$sql = $sql."       + (SELECT COUNT(*) ";
	$sql = $sql."            FROM TB_Basket_Program ";
	$sql = $sql."           WHERE Center_ID       = a.Center_ID ";
	$sql = $sql."             AND Sales_Division  = '003' ";
	$sql = $sql."             AND Sales_Code      = a.Sales_Code ";
	$sql = $sql."             AND :Tmonth   BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sql = $sql."             AND State           = '001') ";
	$sql = $sql."       + (SELECT COUNT(*) ";
	$sql = $sql."           FROM tb_lecture_waiting ";
	$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
	$sql = $sql."            AND YYYYMM                     = LEFT(:start_date, 6) ";
	$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
	$sql = $sql."            AND Process_State              = '01') as Current_Person, ";
	$sql = $sql."       b.Age_From, b.Age_To, b.Vat_Yn ";
    $sql = $sql."  FROM TB_SaleItem       a INNER JOIN ";
	$sql = $sql."       TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
    $sql = $sql." WHERE a.Center_ID             = :center_id ";
    $sql = $sql."   AND a.Sales_Division        = '003' ";
	$sql = $sql."   AND a.Event_Code         LIKE :event_code ";
	$sql = $sql."   AND a.Class_Code         LIKE :class_code ";
	$sql = $sql."   AND a.Kiosk_Display_Text LIKE CONCAT('%', :sales_item_name. '%') ";
	$sql = $sql."   AND a.Online_Yn             = 'Y' ";
	$sql = $sql."   AND b.Online_Yn             = 'Y' ";
	$sql = $sql."   AND a.State                 = '001' ";
	$sql = $sql."   AND a.First_Start_Day_Yn    = 'N' ";
	$sql = $sql."   AND b.Apply_Date            = (SELECT MAX(Apply_Date) ";
	$sql = $sql."                                    FROM TB_SaleItem_Price ";
	$sql = $sql."                                   WHERE Center_ID   = a.Center_ID ";
	$sql = $sql."                                     AND Apply_Date <= CONCAT(:Tmonth, '01') ";
	$sql = $sql."                                 ) ";
	$sql = $sql." ORDER BY a.Sales_Item_Name ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':event_code'      , $event_code);
		$stmt->bindParam(':class_code'      , $class_code);
		$stmt->bindParam(':sales_item_name' , $sales_item_name);
		$stmt->bindParam(':Tmonth'          , $Tmonth);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수시프로그램조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수시프로그램조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};


//------------------------------------------------------------------------------------
// ● 함수명 : CF_Search_Sales_Code_Info
// ● 설  명 : 프로그램 상세 조회
//------------------------------------------------------------------------------------
function CF_Search_Sales_Code_Info ($center_id, $sales_code){
	global $DBName;

	$sql = "";
	$sql = $sql."SELECT Next_Month_Day ";
	$sql = $sql."  FROM TB_SystemSetting ";
	$sql = $sql." WHERE Center_ID = :center_id ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$next_month_day = $data['Next_Month_Day'];

		$today = DATE('d');

		if((int)$today < (int)$next_month_day){
			$sql = "";
			$sql = $sql."SELECT DATE_FORMAT(Now(), '%Y%m') as YYYYMM ";
			$sql = $sql."  FROM DUAL ";
		}
		else{
			$sql = "";
			$sql = $sql."SELECT DATE_FORMAT(DATE_ADD(Now(), INTERVAL 1 MONTH), '%Y%m') as YYYYMM ";
			$sql = $sql."  FROM DUAL ";
		}

		$stmt = $db->prepare($sql);

		$stmt->execute();

		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$yyyymm = $data['YYYYMM'];

		$sql = "";
		$sql = $sql."SELECT c.Detail_Name as Lecture_Place, ";
		$sql = $sql."       CONCAT(:yyyymm, '01') as Start_Date, ";
		$sql = $sql."       DATE_FORMAT(LAST_DAY(DATE_ADD(CONCAT(:yyyymm, '01'), INTERVAL CAST(b.Month_Qty as int) - 1 MONTH)), '%Y%m%d') as End_Date, ";
		$sql = $sql."       F_WEEK_NAME(a.Use_Week) as Week_Name, ";
		$sql = $sql."       a.Start_Time, a.End_Time, b.Unit_Price, a.Lecture_Introduce, a.Lecture_Detail_Contents, a.Lecture_Guide, a.Sales_Item_Name,a.Sales_Division, ";
		$sql = $sql."       a.Sales_Place_Code, a.Event_Code, a.Month_Qty, d.Detail_Name as Event_Name,a.State, b.Vat_Yn, a.First_Start_Day_Yn ";
		$sql = $sql."  FROM TB_SaleItem        a INNER JOIN ";
		$sql = $sql."       TB_SaleItem_Price  b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN ";
		$sql = $sql."       TB_Code_D          c ON a.Lesson_Place = c.Detail_Code AND c.Common_Code = 'V30' LEFT OUTER JOIN ";
		$sql = $sql."       TB_Code_D          d ON a.Event_Code = d.Detail_Code AND d.Common_Code = 'H02' ";
		$sql = $sql." WHERE a.Center_ID           = :center_id ";
		$sql = $sql."   AND a.Sales_Code          = :sales_code ";
		$sql = $sql."   AND a.State               = '001' ";
		$sql = $sql."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) FROM TB_SaleItem_Price where Center_ID = a.Center_ID AND Apply_Date <= CONCAT(:yyyymm, '01')) ";
		$sql = $sql." ORDER BY a.Sales_Item_Name ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':sales_code'      , $sales_code);
		$stmt->bindParam(':yyyymm'          , $yyyymm);

		$stmt->execute();

		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

function CF_Search_Sales_Code_Info2 ($center_id, $sales_code, $unit_price){
	global $DBName;

	$sql = "";
	$sql = $sql."SELECT Next_Month_Day ";
	$sql = $sql."  FROM TB_SystemSetting ";
	$sql = $sql." WHERE Center_ID = :center_id ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$next_month_day = $data['Next_Month_Day'];

		$today = DATE('d');

		$sql = "";
		$sql = $sql."SELECT Event_Code, IFNULL(Special_Start_Date, '00000000') as Special_Start_Date, Sales_Place_Code, Place_Code ";
		$sql = $sql."  FROM TB_SaleItem ";
		$sql = $sql." WHERE Center_ID  = :center_id ";
		$sql = $sql."   AND Sales_Code = :sales_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':sales_code'      , $sales_code);

		$stmt->execute();

		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$event_code         = $data['Event_Code'];
		$special_start_date = $data['Special_Start_Date'];
		$sales_place_code   = $data['Sales_Place_Code'];
		$place_code         = $data['Place_Code'];

		if((int)$today < (int)$next_month_day){
			$sql = "";
			$sql = $sql."SELECT DATE_FORMAT(Now(), '%Y%m') as YYYYMM ";
			$sql = $sql."  FROM DUAL ";
		}
		else{
			$sql = "";
			$sql = $sql."SELECT DATE_FORMAT(DATE_ADD(Now(), INTERVAL 1 MONTH), '%Y%m') as YYYYMM ";
			$sql = $sql."  FROM DUAL ";
		}

		$stmt = $db->prepare($sql);

		$stmt->execute();

		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$yyyymm = $data['YYYYMM'];

		$sql = "";
		$sql = $sql."SELECT e.Detail_Name as Lecture_Place, ";
		$sql = $sql."       CASE WHEN a.First_Start_Day_Yn = 'Y' THEN CONCAT(:yyyymm, '01') ELSE DATE_FORMAT(Now(), '%Y%m%d') END as Start_Date, ";
		$sql = $sql."       CASE WHEN a.First_Start_Day_Yn = 'Y' THEN DATE_FORMAT(LAST_DAY(DATE_ADD(CONCAT(:yyyymm, '01'), INTERVAL CAST(b.Month_Qty as int) - 1 MONTH)), '%Y%m%d') ELSE DATE_FORMAT(DATE_ADD(DATE_ADD(Now(), INTERVAL CAST(b.Month_Qty as int) MONTH), INTERVAL -1 DAY), '%Y%m%d') END as End_Date, ";
		$sql = $sql."       F_WEEK_NAME(a.Use_Week) as Week_Name, ";
		$sql = $sql."       a.Start_Time, a.End_Time, b.Unit_Price as Unit_Price, a.Lecture_Introduce, a.Lecture_Detail_Contents, a.Lecture_Guide, a.Sales_Item_Name,  a.Sales_Division, ";
		$sql = $sql."       a.Sales_Place_Code, a.Event_Code, b.Month_Qty, d.Detail_Name as Event_Name,a.State, b.Vat_Yn, a.First_Start_Day_Yn, ";
		$sql = $sql."       IFNULL(a.Special_Start_Date, '00000000') as Special_Start_Date, IFNULL(a.Special_End_Date, '00000000') as Special_End_Date ";
		$sql = $sql."  FROM TB_SaleItem        a INNER JOIN ";
		$sql = $sql."       TB_SaleItem_Price  b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN ";
		$sql = $sql."       TB_Code_D          c ON a.Lesson_Place = c.Detail_Code AND c.Common_Code = 'V30' LEFT OUTER JOIN ";
		$sql = $sql."       TB_Code_D          d ON a.Event_Code = d.Detail_Code AND d.Common_Code = 'H02' LEFT OUTER JOIN ";
        $sql = $sql."       TB_Code_D          e ON a.Place_Code = e.Detail_Code AND e.Common_Code = 'H01' ";
		$sql = $sql." WHERE a.Center_ID           = :center_id ";
		$sql = $sql."   AND a.Sales_Code          = :sales_code ";
		$sql = $sql."   AND b.Unit_Price          = :unit_price ";
		$sql = $sql."   AND a.State               = '001' ";
		$sql = $sql."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) FROM TB_SaleItem_Price where Center_ID = a.Center_ID AND Apply_Date <= CONCAT(:yyyymm, '01')) ";
		$sql = $sql." ORDER BY a.Sales_Item_Name ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'        , $center_id);
		$stmt->bindParam(':sales_code'       , $sales_code);
		$stmt->bindParam(':yyyymm'           , $yyyymm);
		$stmt->bindParam(':unit_price'       , $unit_price);

		$stmt->execute();

		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};


//*******수강이력현황*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Member_Valid_List
// ● 설  명 : 수강이력현황 -> 재등록 유무도 같이 체크
//------------------------------------------------------------------------------------
function CF_Member_Valid_List ($center_id, $member_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT c.Detail_Name as Event_Name, b.Event_Code,a.Sales_Date,h.State,h.IDX, h.Center_ID, ";
	$sql = $sql."       d.Detail_Name as Sales_Division_Name, b.Sales_Division, ";
	$sql = $sql."       b.Sales_Code, b.Sales_Item_Name, a.Start_Date, a.End_Date, ";
	$sql = $sql."       f_week_name(b.Use_Week) as Week_Name, b.Start_Time, b.End_Time, ";
	$sql = $sql."       a.Receive_Amount, a.Org_Sale_Amount, a.Trs_No, a.Trs_Seq, a.Member_Seq, g.RefNo, IFNULL(g.Approval_Date, '') as Tran_Date, ";
	$sql = $sql."       a.Location_Code, a.Locker_No, ";
	$sql = $sql."       a.Lesson_Qty, a.Coupon_Count, a.Coupon_Use_Count, ";
	$sql = $sql."       TO_DAYS(a.End_Date) - TO_DAYS(F_DATE_TIME('YYYYMMDD')) + 1 AS Expire_Days, ";
	$sql = $sql."       e.Member_Name, ";
	$sql = $sql."       CASE WHEN a.End_Date >= F_DATE_TIME('YYYYMMDD') AND SUBSTRING(a.End_Date, 1, 6) = SUBSTRING(F_DATE_TIME('YYYYMMDD'), 1, 6) ";
	$sql = $sql."                 AND F_DATE_TIME('YYYYMMDD') BETWEEN b.Web_Re_Start AND b.Web_Re_End AND F_DATE_TIME('HH24MI') BETWEEN b.Web_Re_Start_Time AND b.Web_Re_End_Time ";
	$sql = $sql."                 AND (SELECT COUNT(*) ";
	$sql = $sql."                        FROM TB_Transaction ";
	$sql = $sql."                       WHERE Center_ID        = a.Center_ID ";
	$sql = $sql."                         AND Member_Code      = a.Member_Code ";
	$sql = $sql."                         AND Sales_Code       = a.Sales_Code ";
	$sql = $sql."                         AND Start_Date       > a.Start_Date ";
	$sql = $sql."                         AND Transition_State = '001' ";
	$sql = $sql."                         AND Trs_Type         = '001' ";
	$sql = $sql."                         AND State            = '001') = 0 AND b.State = '001' THEN 'Y' ELSE 'N' END as Repayment_Yn ";
	$sql = $sql."  FROM TB_Transaction      a INNER JOIN ";
	$sql = $sql."       TB_Saleitem         b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code INNER JOIN ";
	$sql = $sql."       TB_Code_D           c ON b.Event_Code = c.Detail_Code AND c.Common_Code = 'H02' INNER JOIN ";
	$sql = $sql."       TB_Cardapproval     g ON a.Center_ID = g.Center_ID AND a.Trs_No = g.Trs_No INNER JOIN ";
	$sql = $sql."       TB_Code_D           d ON b.Sales_Division = d.Detail_Code AND d.Common_Code = 'H03' INNER JOIN ";
    $sql = $sql."       TB_Basket_Program   h ON a.Center_ID = h.Center_ID AND a.Sales_Code = h.Sales_Code AND a.Member_Code = h.Member_Code INNER JOIN ";
	$sql = $sql."       TB_Member           e ON a.Center_ID = e.Center_ID AND a.Member_Code = e.Member_Code LEFT OUTER JOIN ";
	$sql = $sql."       TB_EventClass       f ON b.Center_ID = f.Center_ID AND b.Sales_Division = f.Sales_Division AND b.Event_Code = f.Event_Code AND b.Class_Code = f.Class_Code ";
	$sql = $sql." WHERE a.Center_ID                 = :center_id ";
	$sql = $sql."   AND a.Sales_Division           IN ('003', '010', '030', '035', '055', '056') ";
	$sql = $sql."   AND a.Member_Code               = :member_code ";
	$sql = $sql."   AND a.Sales_Date               >= DATE_FORMAT(DATE_ADD(Now(), interval -1 year), '%Y%m%d') ";
	$sql = $sql."   AND a.Transition_State         IN ('001', '015') ";
	$sql = $sql."   AND a.Trs_Type                  = '001' ";
	$sql = $sql."   AND a.State                     = '001' ";
	$sql = $sql."   AND b.First_Start_Day_Yn        = 'Y' ";
	$sql = $sql." Order By a.Sales_Date Desc ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강이력조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강이력조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



function CF_Member_Valid_List_Cnt ($center_id, $member_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT count(*) as total_count ";
    $sql = $sql."  FROM TB_Transaction  a INNER JOIN ";
    $sql = $sql."       TB_Saleitem     b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code INNER JOIN ";
	$sql = $sql."       TB_Code_D       c ON b.Event_Code = c.Detail_Code AND c.Common_Code = 'H02' LEFT OUTER JOIN ";
    $sql = $sql."       TB_Cardapproval g ON  a.Center_ID = g.Center_ID AND a.Trs_No = g.Trs_No LEFT OUTER JOIN ";
    $sql = $sql."       TB_Code_D       d ON b.Sales_Division = d.Detail_Code AND d.Common_Code = 'H03' LEFT OUTER JOIN ";
    $sql = $sql."       TB_Member       e ON a.Center_ID = e.Center_ID AND a.Member_Code = e.Member_Code LEFT OUTER JOIN ";
    $sql = $sql."       TB_EventClass   f ON b.Center_ID = f.Center_ID AND b.Sales_Division = f.Sales_Division AND b.Event_Code = f.Event_Code AND b.Class_Code = f.Class_Code ";
    $sql = $sql."  WHERE a.Center_ID                 =  :center_id ";
    $sql = $sql."    AND a.Sales_Division           IN ('003', '010', '030', '035', '055', '056') ";
    $sql = $sql."    AND a.Member_Code               =  :member_code ";
    $sql = $sql."    AND a.Sales_Date               >= DATE_FORMAT(DATE_ADD(Now(), interval -1 year), '%Y%m%d') ";
    $sql = $sql."    AND a.Transition_State         IN ('001', '015') ";
    $sql = $sql."    AND a.Trs_Type                  = '001' ";
    $sql = $sql."    AND a.State                     = '001' ";



    try{
        $db = new db();
        $db = $db->connect($DBName);

		$total_count = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'   , $center_id);
		$stmt->bindParam(':member_code' , $member_code);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$totalcount = $data['total_count'];

        $db = null;

		CF_Web_Log('수강이력조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null","TotalCount": '.$totalcount.'},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강이력조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};


function CF_Member_Valid_List_Page ($center_id, $member_code, $member_id, $url, $ip, $from_record,$rows, $age){
	global $DBName;




	$sql = "";
    $sql = $sql."SELECT c.Detail_Name as Event_Name, b.Event_Code,a.Sales_Date, a.Center_ID,a.Month_Qty, ";
    $sql = $sql."       d.Detail_Name as Sales_Division_Name, b.Sales_Division, ";
    $sql = $sql."       b.Sales_Code, b.Sales_Item_Name, a.Start_Date, a.End_Date, b.First_Start_Day_Yn, ";
    $sql = $sql."       f_week_name(b.Use_Week) as Week_Name, b.Start_Time, b.End_Time, ";
    $sql = $sql."       a.Receive_Amount, a.Org_Sale_Amount, h.Unit_Price, a.Trs_No, a.Trs_Seq, a.Member_Seq, g.RefNo, IFNULL(g.Approval_Date, '') as Tran_Date, IFNULL(g.Approval_Time, '') as Tran_Time, ";
    $sql = $sql."       a.Location_Code, a.Locker_No, ";
    $sql = $sql."       a.Lesson_Qty, a.Coupon_Count, a.Coupon_Use_Count, ";
    $sql = $sql."       TO_DAYS(a.End_Date) - TO_DAYS(F_DATE_TIME('YYYYMMDD')) + 1 AS Expire_Days, ";
    $sql = $sql."       e.Member_Name, ";
    $sql = $sql."       CASE WHEN a.End_Date >= F_DATE_TIME('YYYYMMDD') AND SUBSTRING(a.End_Date, 1, 6) = SUBSTRING(F_DATE_TIME('YYYYMMDD'), 1, 6) ";
    $sql = $sql."                 AND CASE WHEN a.Sales_Division = '055' THEN 1 = 2 ELSE F_DATE_TIME('YYYYMMDD') BETWEEN b.Web_Re_Start AND b.Web_Re_End AND F_DATE_TIME('HH24MI') BETWEEN b.Web_Re_Start_Time AND b.Web_Re_End_Time END ";
	$sql = $sql."                 AND (SELECT COUNT(*) ";
	$sql = $sql."                        FROM TB_Transaction ";
	$sql = $sql."                       WHERE Center_ID        = a.Center_ID ";
	$sql = $sql."                         AND Member_Code      = a.Member_Code ";
	$sql = $sql."                         AND Sales_Code       = a.Sales_Code ";
	$sql = $sql."                         AND Start_Date       > a.Start_Date ";
	$sql = $sql."                         AND Transition_State = '001' ";
	$sql = $sql."                         AND Trs_Type         = '001' ";
	$sql = $sql."                         AND State            = '001') = 0 AND b.State = '001' THEN 'Y' ELSE 'N' END as Repayment_Yn ";
    $sql = $sql."  FROM TB_Transaction    a INNER JOIN ";
    $sql = $sql."       TB_Saleitem       b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code INNER JOIN ";
	$sql = $sql."       TB_Saleitem_Price h ON b.Center_ID = h.Center_ID AND b.Sales_Code = h.Sales_Code AND LPAD(a.Month_Qty, 2, '0') = h.Month_Qty  INNER JOIN  ";
	//창동청소년센터의 경우에 단가 변경이 되어도 재수강 신청을 해야함(mhlee-2023.02.16)
	//$sql = $sql."                              AND CASE WHEN :center_id = '140'  THEN 1 = 1 ELSE a.Unit_Price = h.Unit_Price END";
	$sql = $sql."       TB_Code_D         c ON b.Event_Code = c.Detail_Code AND c.Common_Code = 'H02' LEFT OUTER JOIN ";
    $sql = $sql."       TB_Cardapproval   g ON  a.Center_ID = g.Center_ID AND a.Trs_No = g.Trs_No LEFT OUTER JOIN ";
    $sql = $sql."       TB_Code_D         d ON b.Sales_Division = d.Detail_Code AND d.Common_Code = 'H03' LEFT OUTER JOIN ";
    $sql = $sql."       TB_Member         e ON a.Center_ID = e.Center_ID AND a.Member_Code = e.Member_Code LEFT OUTER JOIN ";
    $sql = $sql."       TB_EventClass     f ON b.Center_ID = f.Center_ID AND b.Sales_Division = f.Sales_Division AND b.Event_Code = f.Event_Code AND b.Class_Code = f.Class_Code ";
    $sql = $sql."  WHERE a.Center_ID                 =  :center_id ";
    $sql = $sql."    AND a.Sales_Division           IN ('003', '010', '030', '035', '055', '056') ";
    $sql = $sql."    AND a.Member_Code               =  :member_code ";
    $sql = $sql."    AND a.Sales_Date               >= DATE_FORMAT(DATE_ADD(Now(), interval -1 year), '%Y%m%d') ";
    $sql = $sql."    AND a.Transition_State         IN ('001', '015') ";
    $sql = $sql."    AND a.Trs_Type                  = '001' ";
    $sql = $sql."    AND a.State                     = '001' ";
	$sql = $sql."    AND :age                  BETWEEN Age_From AND Age_To ";
	$sql = $sql."    AND h.Apply_Date                = (SELECT MAX(Apply_Date) FROM TB_SaleItem_Price where Center_ID = a.Center_ID AND Apply_Date <= CONCAT(DATE_FORMAT(DATE_ADD(a.End_Date, INTERVAL 1 MONTH), '%Y%m'), '01')) ";
    $sql = $sql."    Order By 3 Desc limit $from_record, $rows";



   

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

        $stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);
		$stmt->bindParam(':age'        , $age);
		

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강신청현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;




    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강이력조회', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

function CF_Member_Valid_List_View ($center_id, $trs_no, $trs_seq, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT c.Detail_Name as Event_Name, b.Event_Code,a.Sales_Date, a.Center_ID,a.Month_Qty, g.Approval_No, ";
	$sql = $sql."    d.Detail_Name as Sales_Division_Name, b.Sales_Division, ";
	$sql = $sql."    b.Sales_Code, b.Sales_Item_Name, a.Start_Date, a.End_Date, b.First_Start_Day_Yn, ";
	$sql = $sql."    f_week_name(b.Use_Week) as Week_Name, b.Start_Time, b.End_Time, ";
	$sql = $sql."    a.Receive_Amount, g.Card_Name, a.Org_Sale_Amount, a.Trs_No, a.Trs_Seq, a.Member_Seq, g.RefNo, IFNULL(g.Approval_Date, '') as Tran_Date,IFNULL(g.Approval_Time, '') as Tran_Time, ";
	$sql = $sql."    a.Location_Code, a.Locker_No, ";
	$sql = $sql."    a.Lesson_Qty, a.Coupon_Count, a.Coupon_Use_Count, ";
	$sql = $sql."    TO_DAYS(a.End_Date) - TO_DAYS(F_DATE_TIME('YYYYMMDD')) + 1 AS Expire_Days, ";
	$sql = $sql."    e.Member_Name, ";
	$sql = $sql."    CASE WHEN a.End_Date >= F_DATE_TIME('YYYYMMDD') AND SUBSTRING(a.End_Date, 1, 6) = SUBSTRING(F_DATE_TIME('YYYYMMDD'), 1, 6) ";
	$sql = $sql."    AND F_DATE_TIME('YYYYMMDDHH24MI') BETWEEN CONCAT(b.Web_Re_Start, b.Web_Re_Start_Time) AND CONCAT(b.Web_Re_End, b.Web_Re_End_Time) ";
	$sql = $sql."                 AND (SELECT COUNT(*) ";
	$sql = $sql."                        FROM TB_Transaction ";
	$sql = $sql."                       WHERE Center_ID        = a.Center_ID ";
	$sql = $sql."                         AND Member_Code      = a.Member_Code ";
	$sql = $sql."                         AND Sales_Code       = a.Sales_Code ";
	$sql = $sql."                         AND Start_Date       > a.Start_Date ";
	$sql = $sql."                         AND Transition_State = '001' ";
	$sql = $sql."                         AND Trs_Type         = '001' ";
	$sql = $sql."                         AND State            = '001') = 0 AND b.State = '001' THEN 'Y' ELSE 'N' END as Repayment_Yn ";
	$sql = $sql."     FROM TB_Transaction   a INNER JOIN ";
	$sql = $sql."          TB_Saleitem      b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code INNER JOIN ";
	$sql = $sql."          TB_Code_D        c ON b.Event_Code = c.Detail_Code AND c.Common_Code = 'H02' LEFT OUTER JOIN ";
	$sql = $sql."          TB_Cardapproval  g ON  a.Center_ID = g.Center_ID AND a.Trs_No = g.Trs_No LEFT OUTER JOIN ";
	$sql = $sql."          TB_Code_D        d ON b.Sales_Division = d.Detail_Code AND d.Common_Code = 'H03' LEFT OUTER JOIN ";
	$sql = $sql."          TB_Member        e ON a.Center_ID = e.Center_ID AND a.Member_Code = e.Member_Code LEFT OUTER JOIN ";
	$sql = $sql."          TB_EventClass    f ON b.Center_ID = f.Center_ID AND b.Sales_Division = f.Sales_Division AND b.Event_Code = f.Event_Code AND b.Class_Code = f.Class_Code ";
	$sql = $sql."     WHERE a.Center_ID  = :center_id ";
	$sql = $sql."       AND a.Trs_No     = :trs_no ";
	$sql = $sql."       AND a.Trs_Seq    = :trs_seq ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

        $stmt->bindParam(':center_id', $center_id);
		$stmt->bindParam(':trs_no', $trs_no);
		$stmt->bindParam(':trs_seq', $trs_seq);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강이력현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강이력현황', '수강이력조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



//*******수강신청현황*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Member_Basket_List
// ● 설  명 : 수강신청현황
//------------------------------------------------------------------------------------
function CF_Member_Basket_List ($center_id, $member_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT IDX, Member_Code, State, Sales_Code, ";
	$sql = $sql."       CASE WHEN State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN State = '006' THEN '환불완료' END State_Name,Center_ID, Sales_Item_Name, Start_Date, End_Date, Receive_Amount, Sales_Date, Week_Name ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Center_ID       = :center_id ";
	$sql = $sql."   AND Sales_Division IN ('003') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql."   AND State      NOT IN ('002', '100') ";
	$sql = $sql."   AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY IDX DESC ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강신청현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강신청현황', '수강신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};


function CF_Member_Basket_List_Main ($center_id, $member_code, $member_id, $url, $ip,$before2, $after2){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT b.IDX, b.Member_Code, b.State, b.Sales_Code, ";
	$sql = $sql."       CASE WHEN b.State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN b.State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN b.State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN b.State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN b.State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN b.State = '006' THEN '환불완료'  ";
	$sql = $sql."            WHEN b.State = '009' THEN '당일결제취소' END State_Name, b.Center_ID, b.Sales_Item_Name, b.Start_Date, b.End_Date, b.Receive_Amount, b.Sales_Date, b.Week_Name, a.Start_Time, a.End_Time, a.First_Start_Day_Yn,b.Trs_No, b.Trs_Seq ";
	$sql = $sql."  FROM TB_SaleItem  a INNER JOIN ";
	$sql = $sql."       TB_Basket_Program  b on a.Center_ID=b.Center_ID AND a.Sales_Code=b.Sales_Code ";
	$sql = $sql." WHERE b.Center_ID       = :center_id ";
	$sql = $sql."   AND b.Sales_Division IN ('003') ";
	$sql = $sql."   AND b.Member_Code     = :member_code ";
	$sql = $sql."   AND b.State          IN ('001', '002', '003', '004', '005', '006', '009') ";
	$sql = $sql."   AND (b.Sales_Date >= '$before2' OR b.Sales_Date <= '$after2') ";
	$sql = $sql."   AND CASE WHEN b.State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(b.Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(b.Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY b.IDX DESC limit 0,5";


 

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
       $stmt->bindParam(':center_id', $center_id);
		$stmt->bindParam(':member_code', $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강신청현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강신청현황', '수강신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



function CF_Member_Basket_List_Cnt ($center_id, $member_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT count(*) as total_count ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Center_ID       = :center_id ";
	$sql = $sql."   AND Sales_Division IN ('003') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql."   AND State      NOT IN ('002', '100') ";
	$sql = $sql."   AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY IDX DESC ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

 
	   $total_count = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_code'  , $member_code);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$totalcount = $data['total_count'];


        $db = null;

		CF_Web_Log('수강신청현황카운트', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null","TotalCount": '.$totalcount.'},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강신청현황카운트', '수강신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};


function CF_Member_Basket_List_Page ($center_id, $member_code, $member_id, $url, $ip, $from_record,$rws){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT b.IDX, b.Member_Code, b.State, b.Sales_Code, ";
	$sql = $sql."       CASE WHEN b.State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN b.State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN b.State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN b.State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN b.State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN b.State = '006' THEN '환불완료'  ";
	$sql = $sql."            WHEN b.State = '009' THEN '당일결제취소' END State_Name,b.Center_ID, b.Sales_Item_Name, b.Start_Date, b.End_Date, b.Receive_Amount, ";
	$sql = $sql."       b.Sales_Date, b.Week_Name, a.Start_Time, a.End_Time, a.First_Start_Day_Yn";
	$sql = $sql."  FROM TB_SaleItem  a INNER JOIN ";
	$sql = $sql."       TB_Basket_Program  b on a.Center_ID=b.Center_ID AND a.Sales_Code=b.Sales_Code ";
	$sql = $sql." WHERE b.Center_ID       = :center_id ";
	$sql = $sql."   AND b.Sales_Division IN ('003') ";
	$sql = $sql."   AND b.Member_Code     = :member_code ";
	$sql = $sql."   AND b.State      NOT IN ('002', '100') ";
	$sql = $sql."   AND CASE WHEN b.State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(b.Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(b.Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY b.IDX DESC limit $from_record, $rws";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);




        $db = null;

		CF_Web_Log('수강신청현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강신청현황', '수강신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



function CF_Member_Basket_Card_Check($center_id, $member_code, $member_id,$sales_code,$idx,$url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT State ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Center_ID       = :center_id ";
	$sql = $sql."   AND Sales_Division IN ('003') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql."   AND Sales_Code      = :sales_code ";
	$sql = $sql."   AND IDX     = :idx ";

	

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);
		$stmt->bindParam(':sales_code' , $sales_code);
		$stmt->bindParam(':idx' , $idx);


		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('장바구니상태', '성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('장바구니상태', '장바구니상태조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



function CF_Member_Basket_List2 ($center_id, $member_code, $member_id,$sales_code, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT IDX, Member_Code, State, Sales_Code, ";
	$sql = $sql."       CASE WHEN State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN State = '006' THEN '환불완료' ";
	$sql = $sql."            WHEN State = '009' THEN '당일결제취소' END State_Name,Center_ID, Sales_Item_Name, Start_Date, End_Date, Receive_Amount, Sales_Date, Week_Name ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Center_ID       = :center_id ";
	$sql = $sql."   AND Sales_Division IN ('003') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql."   AND Sales_Code      = :sales_code ";
	$sql = $sql."   AND State      IN ('001', '002') ";
	$sql = $sql."   AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY IDX DESC ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);
		$stmt->bindParam(':sales_code' , $sales_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강신청현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강신청현황', '수강신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



function CF_Member_Basket_List2_Cnt ($center_id, $member_code, $member_id,$sales_code, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT count(*) as total_count ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Center_ID       = :center_id ";
	$sql = $sql."   AND Sales_Division IN ('003') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql."   AND Sales_Code      = :sales_code ";
	$sql = $sql."   AND State          IN ('001', '002') ";
	$sql = $sql."   AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY IDX DESC ";

    try{
        $db = new db();
        $db = $db->connect($DBName);
 
		$total_count = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'    , $center_id);
		$stmt->bindParam(':member_code'  , $member_code);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$totalcount = $data['total_count'];


        $db = null;

		CF_Web_Log('수강신청현황카운트', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null","TotalCount": '.$totalcount.'},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강신청현황', '수강신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

function CF_Member_Basket_List2_Page ($center_id, $member_code, $member_id, $url, $ip, $from_record,$rws){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT IDX, Member_Code, State, Sales_Code, ";
	$sql = $sql."       CASE WHEN State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN State = '006' THEN '환불완료' ";
	$sql = $sql."            WHEN State = '009' THEN '당일결제취소' END State_Name,Center_ID, Sales_Item_Name, Start_Date, End_Date, Receive_Amount, Sales_Date, Week_Name ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Center_ID       = :center_id ";
	$sql = $sql."   AND Sales_Division IN ('003') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql."   AND Sales_Code      = :sales_code ";
	$sql = $sql."   AND State          IN ('001', '002') ";
	$sql = $sql."   AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY IDX DESC limit $from_record, $rws";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('수강이력현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('수강이력현황', '수강이력현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};






//*******환불신청현황*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Member_Refund_RequestList
// ● 설  명 : 환불신청현황
//------------------------------------------------------------------------------------



function CF_Member_Refund_RequestList_Cnt ($center_id, $member_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT  count(*) as total_count";
	$sql = $sql."  FROM TB_SaleItem  a INNER JOIN ";
	$sql = $sql."       TB_Basket_Program  b on a.Center_ID=b.Center_ID AND a.Sales_Code=b.Sales_Code ";
	$sql = $sql." WHERE b.Center_ID = :center_id ";
	$sql = $sql."   AND b.Sales_Division IN ('003') ";
	$sql = $sql."   AND ( b.State='005' OR  b.State='006') ";
	$sql = $sql."   AND  b.Member_Code     = :member_code ";
	$sql = $sql." ORDER BY  b.IDX DESC ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('환불신청현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('환불신청현황', '환불신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};


function CF_Member_Refund_RequestList ($center_id, $member_code, $member_id, $url, $ip, $from_record,$rws){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT  b.IDX,  b.Member_Code,  b.State,  b.Sales_Code, b.Trs_No, b.Trs_Seq, ";
	$sql = $sql."       CASE WHEN  b.State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN  b.State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN  b.State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN  b.State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN  b.State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN  b.State = '006' THEN '환불완료' END State_Name, b.Center_ID,  b.Sales_Item_Name, b.Start_Date,  b.End_Date,  ";
	$sql = $sql."       b.Week_Name,a.Start_Time, a.End_Time, a.First_Start_Day_Yn,   b.Receive_Amount, b.Sales_Date, IFNULL( b.Price_Idx, 0) as Price_Idx ";
	$sql = $sql."  FROM TB_SaleItem        a INNER JOIN ";
	$sql = $sql."       TB_Basket_Program  b on a.Center_ID=b.Center_ID AND a.Sales_Code=b.Sales_Code ";
	$sql = $sql." WHERE b.Center_ID = :center_id ";
	$sql = $sql."   AND b.Sales_Division IN ('003') ";
	$sql = $sql."   AND ( b.State='005' OR  b.State='006') ";
	$sql = $sql."   AND  b.Member_Code     = :member_code ";
	$sql = $sql." ORDER BY  b.IDX DESC limit $from_record, $rws";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_code', $member_code);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('환불신청현황', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('환불신청현황', '환불신청현황조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



//*******장바구니 담기 및 취소*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Basket_Insert
// ● 설  명 : 온라인 접수 신청
//------------------------------------------------------------------------------------
function CF_Basket_Insert ($center_id, $sales_division, $member_code, $sales_code, $sales_item_name, $week_name, $month_qty, $unit_price, $start_date, $end_date, $vat_yn, $member_id, $url, $ip, $child_counsel_yn, $event_code){
	global $DBName;

	$sql = "";
	$sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Basket_Program ";
	$sql = $sql." WHERE Center_ID   = :center_id ";
	$sql = $sql."   AND Member_Code = :member_code ";
	$sql = $sql."   AND Sales_Code  = :sales_code ";
	$sql = $sql."   AND Start_Date  = :start_date ";
	$sql = $sql."   AND End_Date    = :end_date ";
	$sql = $sql."   AND State      IN ('000', '001') ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);
		$stmt->bindParam(':end_date'       , $end_date);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$db->rollback();
			$db = null;
			$r_json = "";
			$r_json = $r_json.'{';
			$r_json = $r_json.'"Result": {"ResultCode": -30, "ResultMsg": "이미 신청한 강좌입니다!!"}';
			$r_json = $r_json.'}';
			return $r_json;

		}

		$sql = "";
		$sql = $sql."SELECT SUM(cnt) as cnt ";
		$sql = $sql."  FROM ( ";
		$sql = $sql."        SELECT COUNT(*) as cnt ";
		$sql = $sql."          FROM TB_Transaction a INNER JOIN ";
		$sql = $sql."               TB_SaleItem    b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
		$sql = $sql."         WHERE a.Center_ID                  = :center_id ";
		$sql = $sql."           AND a.Member_Code                = :member_code ";
		$sql = $sql."           AND a.Sales_Code                 = :sales_code ";
		$sql = $sql."           AND a.End_Date                  >= :start_date ";
		$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(a.Start_Date, 6) AND LEFT(a.End_Date, 6) ";
		$sql = $sql."           AND a.Transition_State           = '001' ";
		$sql = $sql."           AND a.Trs_Type                   = '001' ";
		$sql = $sql."           AND a.State                      = '001' ";
		$sql = $sql."           AND b.First_Start_Day_Yn         = 'Y' ";
		$sql = $sql."         UNION ALL ";
		$sql = $sql."        SELECT COUNT(*) as cnt ";
		$sql = $sql."          FROM TB_Transaction a INNER JOIN ";
		$sql = $sql."               TB_SaleItem    b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
		$sql = $sql."         WHERE a.Center_ID                  = :center_id ";
		$sql = $sql."           AND a.Member_Code                = :member_code ";
		$sql = $sql."           AND a.Sales_Code                 = :sales_code ";
		$sql = $sql."           AND a.End_Date                  >= :start_date ";
		$sql = $sql."           AND :start_date                 <= a.End_Date ";
		$sql = $sql."           AND a.Transition_State           = '001' ";
		$sql = $sql."           AND a.Trs_Type                   = '001' ";
		$sql = $sql."           AND a.State                      = '001' ";
		$sql = $sql."           AND b.First_Start_Day_Yn         = 'N' ";
		$sql = $sql."        ) x ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$db->rollback();
			$db = null;
			$r_json = "";
			$r_json = $r_json.'{';
			$r_json = $r_json.'"Result": {"ResultCode": -40, "ResultMsg": "이미 결제한 강좌이거나 수강중입니다!!"}';
			$r_json = $r_json.'}';
			return $r_json;

		}

		$sql = "";
		$sql = $sql."SELECT F_AGE(Center_ID, Birth_Date) as Age, Sex ";
		$sql = $sql."  FROM TB_Member ";
		$sql = $sql." WHERE Center_ID   = :center_id ";
		$sql = $sql."   AND Member_Code = :member_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$age = $data['Age'];
		$sex = $data['Sex'];

		$sql = "";
		$sql = $sql."SELECT Target_Code ";
		$sql = $sql."  FROM TB_SaleItem_Price ";
		$sql = $sql." WHERE Center_ID  = :center_id ";
		$sql = $sql."   AND Sales_Code = :sales_code ";
		$sql = $sql."   AND Month_Qty  = LPAD(:month_qty, 2, '0') ";
		$sql = $sql."   AND Unit_Price = :unit_price ";
		$sql = $sql."   AND :age BETWEEN Age_From AND Age_To ";
		$sql = $sql."   AND Apply_Date = (SELECT MAX(Apply_Date) ";
		$sql = $sql."                       FROM TB_SaleItem_Price ";
		$sql = $sql."                      WHERE Center_ID   = :center_id ";
		$sql = $sql."                        AND Apply_Date <= :start_date ";
		$sql = $sql."                    ) LIMIT 1 ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':month_qty'      , $month_qty);
		$stmt->bindParam(':unit_price'     , $unit_price);
		$stmt->bindParam(':age'            , $age);
		$stmt->bindParam(':start_date'     , $start_date);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$target_code = $data['Target_Code'];


		//Row Lock 걸기
		$sql = "";
		$sql = $sql."SELECT * ";
		$sql = $sql."  FROM TB_Program_Capacity ";
		$sql = $sql." WHERE Center_ID  = :center_id ";
		$sql = $sql."   AND Sales_Code = :sales_code FOR UPDATE ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);




		//정원 체크
		$sql = "";
		$sql = $sql."SELECT DISTINCT ";
		$sql = $sql."       a.Capacity, a.Fertile_Yn, a.Sales_Division, ";
		$sql = $sql."       ((SELECT COUNT(*) ";
		$sql = $sql."           FROM TB_Transaction ";
		$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
		$sql = $sql."            AND Sales_Division             = '003' ";
		$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
		$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
		$sql = $sql."            AND Transition_State           = '001' ";
		$sql = $sql."            AND Trs_Type                   = '001' ";
		$sql = $sql."            AND State                      = '001') + ";
		$sql = $sql."        (SELECT COUNT(*) ";
		$sql = $sql."           FROM TB_Basket_Program ";
		$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
		$sql = $sql."            AND Sales_Division             = '003' ";
		$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
		$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
		$sql = $sql."            AND State                      = '001') + ";
		$sql = $sql."        (SELECT COUNT(*) ";
		$sql = $sql."           FROM tb_lecture_waiting ";
		$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
		$sql = $sql."            AND YYYYMM                     = LEFT(:start_date, 6) ";
		$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
		$sql = $sql."            AND Process_State              = '01')) as Reg_Count ";
		$sql = $sql."  FROM TB_SaleItem       a ";
		$sql = $sql." WHERE a.Center_ID          = :center_id ";
		$sql = $sql."   AND a.Sales_Code         = :sales_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$capacity       = $data['Capacity'];
		$reg_count      = $data['Reg_Count'];
		$reg_fertile_yn = $data['Fertile_Yn'];
		$sales_division = $data['Sales_Division'];

		if($sales_division != '055'){
			if($capacity - $reg_count <= 0){
				$db->rollback();
				$db = null;
				$r_json = "";
				$r_json = $r_json.'{';
				$r_json = $r_json.'"Result": {"ResultCode": -50, "ResultMsg": "해당 강좌는 마감되었습니다!!"}';
				$r_json = $r_json.'}';
				return $r_json;
			}
		}




		$sql = "";
		$sql = $sql."SELECT IFNULL(a.Discount_Code, '00001') as Discount_Code, IFNULL(b.Discount_Rate, 0) as Discount_Rate, IFNULL(Add_Discount_Count, 0) as Add_Discount_Count, ";
		$sql = $sql."       IFNULL(a.Discount_Start_Date, '') as Discount_Start_Date, IFNULL(a.Discount_End_Date, '') as Discount_End_Date, IFNULL(b.Fertile_Yn, 'N') as Fertile_Yn ";
		$sql = $sql."  FROM TB_Member   a LEFT OUTER JOIN ";
		$sql = $sql."       TB_Discount b ON a.Center_ID = b.Center_ID AND a.Discount_Code = b.Discount_Code ";
		$sql = $sql." WHERE a.Center_ID   = :center_id ";
		$sql = $sql."   AND a.Member_Code = :member_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$discount_code       = $data['Discount_Code'];
		$discount_rate       = $data['Discount_Rate'];
		$add_discount_count  = $data['Add_Discount_Count'];
		$discount_start_date = $data['Discount_Start_Date'];
		$discount_end_date   = $data['Discount_End_Date'];
		$fertile_yn          = $data['Fertile_Yn'];

		if($sales_division == '055'){
			$discount_code = '00001';
			$discount_rate = 0;
		}
		else{
			if($discount_start_date != '' && $discount_end_date != ''){
				if(date('Ymd') >= $discount_start_date && date('Ymd') <= $discount_end_date){
					if($discount_code != '00001' && $add_discount_count > 0){
						//할인강좌갯수 체크
						$sql = "";
						$sql = $sql."SELECT (SELECT COUNT(*) ";
						$sql = $sql."          FROM TB_Transaction ";
						$sql = $sql."         WHERE Center_ID                  = a.Center_ID ";
						$sql = $sql."           AND Sales_Division             = '003' ";
						$sql = $sql."           AND Member_Code                = :member_code ";
						$sql = $sql."           AND Sales_Code                 = a.Sales_Code ";
						$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
						$sql = $sql."           AND Transition_State           = '001' ";
						$sql = $sql."           AND Trs_Type                   = '001' ";
						$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
						$sql = $sql."           AND State                      = '001') + ";
						$sql = $sql."       (SELECT COUNT(*) ";
						$sql = $sql."          FROM TB_Basket_Program ";
						$sql = $sql."         WHERE Center_ID                  = a.Center_ID ";
						$sql = $sql."           AND Member_Code                = :member_code ";
						$sql = $sql."           AND Sales_Division             = '003' ";
						$sql = $sql."           AND Sales_Code                 = a.Sales_Code ";
						$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
						$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
						$sql = $sql."           AND State                      = '001') as Discount_Count ";
						$sql = $sql."  FROM TB_SaleItem       a ";
						$sql = $sql." WHERE a.Center_ID          = :center_id ";
						$sql = $sql."   AND a.Sales_Code         = :sales_code ";

						$stmt = $db->prepare($sql);
						$stmt->bindParam(':center_id'      , $center_id);
						$stmt->bindParam(':member_code'    , $member_code);
						$stmt->bindParam(':sales_code'     , $sales_code);
						$stmt->bindParam(':start_date'     , $start_date);
						$stmt->bindParam(':discount_code'  , $discount_code);

						$stmt->execute();

						$data = $stmt->fetch(PDO::FETCH_BOTH);

						$discount_count  = $data['Discount_Count'];

						if($add_discount_count <= $discount_count){
							$discount_code = '00001';
							$discount_rate = 0;
						}
					}
				}
				else{
					$discount_code = '00001';
					$discount_rate = 0;
				}
			}
			else{
				if($discount_code != '00001' && $add_discount_count > 0){
					//할인강좌갯수 체크
					$sql = "";
					$sql = $sql."SELECT (SELECT COUNT(*) ";
					$sql = $sql."          FROM TB_Transaction ";
					$sql = $sql."         WHERE Center_ID                  = :center_id ";
					$sql = $sql."           AND Sales_Division             = '003' ";
					$sql = $sql."           AND Member_Code                = :member_code ";
					$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
					$sql = $sql."           AND Transition_State           = '001' ";
					$sql = $sql."           AND Trs_Type                   = '001' ";
					$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
					$sql = $sql."           AND State                      = '001') + ";
					$sql = $sql."       (SELECT COUNT(*) ";
					$sql = $sql."          FROM TB_Basket_Program ";
					$sql = $sql."         WHERE Center_ID                  = :center_id ";
					$sql = $sql."           AND Member_Code                = :member_code ";
					$sql = $sql."           AND Sales_Division             = '003' ";
					$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
					$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
					$sql = $sql."           AND State                      = '001') as Discount_Count ";
					$sql = $sql."  FROM DUAL ";

					$stmt = $db->prepare($sql);
					$stmt->bindParam(':center_id'      , $center_id);
					$stmt->bindParam(':member_code'    , $member_code);
					$stmt->bindParam(':start_date'     , $start_date);
					$stmt->bindParam(':discount_code'  , $discount_code);

					$stmt->execute();

					$data = $stmt->fetch(PDO::FETCH_BOTH);

					$discount_count  = $data['Discount_Count'];

					if($add_discount_count <= $discount_count){
						$discount_code = '00001';
						$discount_rate = 0;
					}
				}
			}
	}



		$sql = "";
		$sql = $sql."SELECT Discount_Rate, COUNT(*) as cnt ";
		$sql = $sql."  FROM TB_Discount_By_Sales_Code ";
		$sql = $sql." WHERE Center_ID     = :center_id ";
		$sql = $sql."   AND Sales_Code    = :sales_code ";
		$sql = $sql."   AND Discount_Code = :discount_code ";



		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':discount_code'  , $discount_code);


		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];





		if($cnt > 0){
			$discount_rate = $data['Discount_Rate'];
		}

		if($reg_fertile_yn != $fertile_yn){
			if($fertile_yn == 'Y'){
				$discount_code = '00001';
				$discount_rate = 0;
			}
		}
		else{
			if($reg_fertile_yn == 'Y'){
				if($age >= 13 && $age <= 55 && $sex == 'F'){
				}
				else{
					$discount_code = '00001';
					$discount_rate = 0;
				}
			}
		}

		//강북의 경우에 온라인에서는 할인적용 안함 - mhlee(2023.01.18)
		if($center_id == '104'){
			$discount_code = '00001';
			$discount_rate = 0;
		}

		$discount_amount = (string)(floor(((double)$unit_price * (double)$discount_rate / 100) / 10) * 10);
		$receive_amount = $unit_price - $discount_amount;

		$sql = "";
		$sql = $sql."SELECT IFNULL(a.Add_Discount_Code, '00001') as Add_Discount_Code, IFNULL(b.Discount_Rate, 0) as Add_Discount_Rate, IFNULL(Add_Discount_Count, 0) as Add_Discount_Count, ";
		$sql = $sql."       IFNULL(a.Add_Discount_Start_Date, '') as Add_Discount_Start_Date, IFNULL(a.Add_Discount_End_Date, '') as Add_Discount_End_Date, IFNULL(b.Fertile_Yn, 'N') as Add_Fertile_Yn ";
		$sql = $sql."  FROM TB_Member   a LEFT OUTER JOIN ";
		$sql = $sql."       TB_Discount b ON a.Center_ID = b.Center_ID AND a.Add_Discount_Code = b.Discount_Code ";
		$sql = $sql." WHERE a.Center_ID   = :center_id ";
		$sql = $sql."   AND a.Member_Code = :member_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$add_discount_code       = $data['Add_Discount_Code'];
		$add_discount_rate       = $data['Add_Discount_Rate'];
		$add_discount_count      = $data['Add_Discount_Count'];
		$add_discount_start_date = $data['Add_Discount_Start_Date'];
		$add_discount_end_date   = $data['Add_Discount_End_Date'];
		$add_fertile_yn          = $data['Add_Fertile_Yn'];

		if($sales_division == '055'){
			$add_discount_code = '00001';
			$add_discount_rate = 0;
		}
		else{
			if($add_discount_start_date != '' && $add_discount_end_date != ''){
				if(date('Ymd') >= $add_discount_start_date && date('Ymd') <= $add_discount_end_date){
					if($add_discount_code != '00001' && $add_discount_count > 0){
						//할인강좌갯수 체크
						$sql = "";
						$sql = $sql."SELECT (SELECT COUNT(*) ";
						$sql = $sql."          FROM TB_Transaction ";
						$sql = $sql."         WHERE Center_ID                  = :center_id ";
						$sql = $sql."           AND Sales_Division             = '003' ";
						$sql = $sql."           AND Member_Code                = :member_code ";
						$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
						$sql = $sql."           AND Transition_State           = '001' ";
						$sql = $sql."           AND Trs_Type                   = '001' ";
						$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
						$sql = $sql."           AND State                      = '001') + ";
						$sql = $sql."       (SELECT COUNT(*) ";
						$sql = $sql."          FROM TB_Basket_Program ";
						$sql = $sql."         WHERE Center_ID                  = :center_id ";
						$sql = $sql."           AND Sales_Division             = '003' ";
						$sql = $sql."           AND Member_Code                = :member_code ";
						$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
						$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
						$sql = $sql."           AND State                      = '001') as Discount_Count ";
						$sql = $sql."  FROM DUAL ";

						$stmt = $db->prepare($sql);
						$stmt->bindParam(':center_id'      , $center_id);
						$stmt->bindParam(':member_code'    , $member_code);
						$stmt->bindParam(':start_date'     , $start_date);
						$stmt->bindParam(':discount_code'  , $discount_code);

						$stmt->execute();

						$data = $stmt->fetch(PDO::FETCH_BOTH);

						$discount_count  = $data['Discount_Count'];

						if($add_discount_count <= $discount_count){
							$add_discount_code = '00001';
							$add_discount_rate = 0;
						}
					}
				}
				else{
					$add_discount_code = '00001';
					$add_discount_rate = 0;
				}
			}
			else{
				if($add_discount_code != '00001' && $add_discount_count > 0){
					//할인강좌갯수 체크
					$sql = "";
					$sql = $sql."SELECT (SELECT COUNT(*) ";
					$sql = $sql."          FROM TB_Transaction ";
					$sql = $sql."         WHERE Center_ID                  = a.Center_ID ";
					$sql = $sql."           AND Sales_Division             = '003' ";
					$sql = $sql."           AND Member_Code                = :member_code ";
					$sql = $sql."           AND Sales_Code                 = a.Sales_Code ";
					$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
					$sql = $sql."           AND Transition_State           = '001' ";
					$sql = $sql."           AND Trs_Type                   = '001' ";
					$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
					$sql = $sql."           AND State                      = '001') + ";
					$sql = $sql."       (SELECT COUNT(*) ";
					$sql = $sql."          FROM TB_Basket_Program ";
					$sql = $sql."         WHERE Center_ID                  = a.Center_ID ";
					$sql = $sql."           AND Sales_Division             = '003' ";
					$sql = $sql."           AND Member_Code                = :member_code ";
					$sql = $sql."           AND Sales_Code                 = a.Sales_Code ";
					$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
					$sql = $sql."           AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
					$sql = $sql."           AND State                      = '001') as Discount_Count ";
					$sql = $sql."  FROM TB_SaleItem       a ";
					$sql = $sql." WHERE a.Center_ID          = :center_id ";
					$sql = $sql."   AND a.Sales_Code         = :sales_code ";

					$stmt = $db->prepare($sql);
					$stmt->bindParam(':center_id'      , $center_id);
					$stmt->bindParam(':member_code'    , $member_code);
					$stmt->bindParam(':sales_code'     , $sales_code);
					$stmt->bindParam(':start_date'     , $start_date);
					$stmt->bindParam(':discount_code'  , $discount_code);

					$stmt->execute();

					$data = $stmt->fetch(PDO::FETCH_BOTH);

					$discount_count  = $data['Discount_Count'];

					if($add_discount_count <= $discount_count){
						$add_discount_code = '00001';
						$add_discount_rate = 0;
					}
				}
			}
		}




		$sql = "";
		$sql = $sql."SELECT Discount_Rate, COUNT(*) as cnt ";
		$sql = $sql."  FROM TB_Discount_By_Sales_Code ";
		$sql = $sql." WHERE Center_ID     = :center_id ";
		$sql = $sql."   AND Sales_Code    = :sales_code " ;
		$sql = $sql."   AND Discount_Code = :add_discount_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'        , $center_id);
		$stmt->bindParam(':sales_code'       , $sales_code);
		$stmt->bindParam(':add_discount_code', $add_discount_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$add_discount_rate = $data['Discount_Rate'];
		}

		if($reg_fertile_yn != $add_fertile_yn){
			if($add_fertile_yn == 'Y'){
				$add_discount_code = '00001';
				$add_discount_rate = 0;
			}
		}
		else{
			if($reg_fertile_yn == 'Y'){
				if($age >= 13 && $age <= 55 && $sex == 'F'){
				}
				else{
					$add_discount_code = '00001';
					$add_discount_rate = 0;
				}
			}
		}

		//강북의 경우에 온라인에서는 할인적용 안함 - mhlee(2023.01.18)
		if($center_id == '104'){
			$add_discount_code = '00001';
			$add_discount_rate = 0;
		}

		$add_discount_amount = (string)(floor(((double)$receive_amount * (double)$add_discount_rate / 100) / 10) * 10);
		$last_receive_amount = $receive_amount - $add_discount_amount;

		$sql = "";
		$sql = $sql."UPDATE TB_Program_Capacity ";
		$sql = $sql."   SET Reg_Count = 1 ";
		$sql = $sql." WHERE Center_ID  = :center_id ";
		$sql = $sql."   AND Sales_Code = :sales_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);

		$stmt->execute();

		$sql = "";
		$sql = $sql."SELECT IFNULL(Basket_Waiting_Time, 20) as Basket_Waiting_Time ";
		$sql = $sql."  FROM TB_SystemSetting ";
		$sql = $sql." WHERE Center_ID     = :center_id ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'        , $center_id);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$basket_waiting_time = $data['Basket_Waiting_Time'];

    

		$sql = "";
		$sql = $sql."INSERT INTO TB_Basket_Program(Center_ID,  Sales_Date,              Sales_Division,                  Member_Code,      Sales_Code,           Sales_Item_Name,  Week_Name,    Qty, ";
		$sql = $sql."                              Month_Qty,  Unit_Price,              Discount_Code,                   Discount_Amount,  Receive_Amount,       Start_Date,       End_Date,     Locker_No, ";
		$sql = $sql."                              Vat_Yn,     Remark,                  Ins_Date,                        Ins_ID,           Ins_IP,               State,            Online_Gubun, ";
		$sql = $sql."                              Payment_Start_Date, Payment_End_Date, Add_Discount_Code, Add_Discount_Amount, Location_Code, Target_Code) ";
		$sql = $sql."                       VALUES(:center_id, F_DATE_TIME('YYYYMMDD'), :sales_division,                 :member_code,     :sales_code,          :sales_item_name, :week_name,   1, ";
		$sql = $sql."                              :month_qty, :unit_price,             :discount_code,                  :discount_amount, :last_receive_amount, :start_date,      :end_date,    :locker_no, ";
		$sql = $sql."                              :vat_yn,    '',                      F_DATE_TIME('yyyymmddhh24miss'), :member_id,        :ip,                 '001',            'Online',     ";
		$sql = $sql."                              Now(),               DATE_ADD(Now(), INTERVAL :basket_waiting_time MINUTE), :add_discount_code, :add_discount_amount, :location_code, :target_code) ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'          , $center_id);
		$stmt->bindParam(':sales_division'     , $sales_division);
		$stmt->bindParam(':member_code'        , $member_code);
		$stmt->bindParam(':sales_code'         , $sales_code);
		$stmt->bindParam(':sales_item_name'    , $sales_item_name);
		$stmt->bindParam(':week_name'          , $week_name);
		$stmt->bindParam(':month_qty'          , $month_qty);
		$stmt->bindParam(':unit_price'         , $unit_price);
		$stmt->bindParam(':discount_code'      , $discount_code);
		$stmt->bindParam(':discount_amount'    , $discount_amount);
		$stmt->bindParam(':last_receive_amount', $last_receive_amount);
		$stmt->bindParam(':start_date'         , $start_date);
		$stmt->bindParam(':end_date'           , $end_date);
		$stmt->bindParam(':vat_yn'             , $vat_yn);
		$stmt->bindParam(':member_id'          , $member_id);
		$stmt->bindParam(':ip'                 , $ip);
		$stmt->bindParam(':basket_waiting_time', $basket_waiting_time);
		$stmt->bindParam(':add_discount_code'  , $add_discount_code);
		$stmt->bindParam(':add_discount_amount', $add_discount_amount);
		$stmt->bindParam(':location_code'      , $location_code);
		$stmt->bindParam(':locker_no'          , $locker_no);
		$stmt->bindParam(':target_code'        , $target_code);


		$stmt->execute();

        $idx = $db->lastInsertId();

		$db->commit();

        $db = null;

		CF_Web_Log('장바구니 넣기', '저장성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null","IDX": '.$idx.'}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('장바구니 넣기', '저장실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};




function CF_Basket_Check ($center_id, $sales_division, $member_code, $sales_code, $sales_item_name, $week_name, $month_qty,$monthqty, $unit_price, $start_date, $end_date, $vat_yn, $member_id, $url, $ip, $child_counsel_yn, $event_code){
	global $DBName;

	$sql = "";
	$sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Basket_Program ";
	$sql = $sql." WHERE Center_ID   = :center_id ";
	$sql = $sql."   AND Member_Code = :member_code ";
	$sql = $sql."   AND Sales_Code  = :sales_code ";
	$sql = $sql."   AND Start_Date  = :start_date ";
	$sql = $sql."   AND End_Date    = :end_date ";
	$sql = $sql."   AND Month_Qty   = :monthqty ";
	$sql = $sql."   AND State      IN ('000', '001') ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);
		$stmt->bindParam(':end_date'       , $end_date);
		$stmt->bindParam(':monthqty'       , $monthqty);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$db->rollback();
			$db = null;
			$r_json = "";
			$r_json = $r_json.'{';
			$r_json = $r_json.'"Result": {"ResultCode": -30, "ResultMsg": "이미 신청한 강좌입니다!!"}';
			$r_json = $r_json.'}';
			return $r_json;

		}

		$sql = "";
		$sql = $sql."SELECT SUM(cnt) as cnt ";
		$sql = $sql."  FROM ( ";
		$sql = $sql."        SELECT COUNT(*) as cnt ";
		$sql = $sql."          FROM TB_Transaction a INNER JOIN ";
		$sql = $sql."               TB_SaleItem    b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
		$sql = $sql."         WHERE a.Center_ID                  = :center_id ";
		$sql = $sql."           AND a.Member_Code                = :member_code ";
		$sql = $sql."           AND a.Sales_Code                 = :sales_code ";
		$sql = $sql."           AND a.End_Date                  >= :start_date ";
		$sql = $sql."           AND LEFT(:start_date, 6) BETWEEN LEFT(a.Start_Date, 6) AND LEFT(a.End_Date, 6) ";
		$sql = $sql."           AND a.Transition_State           = '001' ";
		$sql = $sql."           AND a.Trs_Type                   = '001' ";
		$sql = $sql."           AND a.State                      = '001' ";
		$sql = $sql."           AND b.First_Start_Day_Yn         = 'Y' ";
		$sql = $sql."         UNION ALL ";
		$sql = $sql."        SELECT COUNT(*) as cnt ";
		$sql = $sql."          FROM TB_Transaction a INNER JOIN ";
		$sql = $sql."               TB_SaleItem    b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
		$sql = $sql."         WHERE a.Center_ID                  = :center_id ";
		$sql = $sql."           AND a.Member_Code                = :member_code ";
		$sql = $sql."           AND a.Sales_Code                 = :sales_code ";
		$sql = $sql."           AND a.End_Date                  >= :start_date ";
		$sql = $sql."           AND :start_date                 <= a.End_Date ";
		$sql = $sql."           AND a.Transition_State           = '001' ";
		$sql = $sql."           AND a.Trs_Type                   = '001' ";
		$sql = $sql."           AND a.State                      = '001' ";
		$sql = $sql."           AND b.First_Start_Day_Yn         = 'N' ";
		$sql = $sql."        ) x ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$db->rollback();
			$db = null;
			$r_json = "";
			$r_json = $r_json.'{';
			$r_json = $r_json.'"Result": {"ResultCode": -40, "ResultMsg": "이미 결제한 강좌이거나 수강중입니다!!"}';
			$r_json = $r_json.'}';
			return $r_json;

		}

		//Row Lock 걸기
		$sql = "";
		$sql = $sql."SELECT * ";
		$sql = $sql."  FROM TB_Program_Capacity ";
		$sql = $sql." WHERE Center_ID  = :center_id ";
		$sql = $sql."   AND Sales_Code = :sales_code FOR UPDATE ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		//정원 체크
		$sql = "";
		$sql = $sql."SELECT DISTINCT ";
		$sql = $sql."       a.Capacity, ";
		$sql = $sql."       ((SELECT COUNT(*) ";
		$sql = $sql."           FROM TB_Transaction ";
		$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
		$sql = $sql."            AND Sales_Division             = '003' ";
		$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
		$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
		$sql = $sql."            AND Transition_State           = '001' ";
		$sql = $sql."            AND Trs_Type                   = '001' ";
		$sql = $sql."            AND State                      = '001') + ";
		$sql = $sql."        (SELECT COUNT(*) ";
		$sql = $sql."           FROM TB_Basket_Program ";
		$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
		$sql = $sql."            AND Sales_Division             = '003' ";
		$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
		$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
		$sql = $sql."            AND State                      = '001') + ";
		$sql = $sql."       (SELECT COUNT(*) ";
		$sql = $sql."           FROM tb_lecture_waiting ";
		$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
		$sql = $sql."            AND YYYYMM                     = LEFT(:start_date, 6) ";
		$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
		$sql = $sql."            AND Process_State              = '01')) as Reg_Count ";
		$sql = $sql."  FROM TB_SaleItem       a ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);
		$stmt->bindParam(':month_qty'       , $month_qty);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$capacity  = $data['Capacity'];
		$reg_count = $data['Reg_Count'];

		if($capacity - $reg_count <= 0){
			$db->rollback();
			$db = null;
			$r_json = "";
			$r_json = $r_json.'{';
			$r_json = $r_json.'"Result": {"ResultCode": -50, "ResultMsg": "해당 강좌는 마감되었습니다!!"}';
			$r_json = $r_json.'}';
			return $r_json;
		}

		$sql = "";
		$sql = $sql."SELECT IFNULL(a.Discount_Code, '00001') as Discount_Code, IFNULL(b.Discount_Rate, 0) as Discount_Rate, IFNULL(Add_Discount_Count, 0) as Add_Discount_Count, ";
		$sql = $sql."       IFNULL(a.Discount_Start_Date, '') as Discount_Start_Date, IFNULL(a.Discount_End_Date, '') as Discount_End_Date ";
		$sql = $sql."  FROM TB_Member   a LEFT OUTER JOIN ";
		$sql = $sql."       TB_Discount b ON a.Center_ID = b.Center_ID AND a.Discount_Code = b.Discount_Code ";
		$sql = $sql." WHERE a.Center_ID   = :center_id ";
		$sql = $sql."   AND a.Member_Code = :member_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$discount_code       = $data['Discount_Code'];
		$discount_rate       = $data['Discount_Rate'];
		$add_discount_count  = $data['Add_Discount_Count'];
		$discount_start_date = $data['Discount_Start_Date'];
		$discount_end_date   = $data['Discount_End_Date'];

		if($discount_start_date == '' || $discount_end_date == ''){
			$discount_code = '00001';
			$discount_rate = 0;
		}
		else{
			if($discount_code != '00001' && $add_discount_count > 0){
				//할인강좌갯수 체크
				$sql = "";
				$sql = $sql."SELECT ((SELECT COUNT(*) ";
				$sql = $sql."           FROM TB_Transaction ";
				$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
				$sql = $sql."            AND Sales_Division             = '003' ";
				$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
				$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
				$sql = $sql."            AND Transition_State           = '001' ";
				$sql = $sql."            AND Trs_Type                   = '001' ";
				$sql = $sql."            AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
				$sql = $sql."            AND State                      = '001') + ";
				$sql = $sql."        (SELECT COUNT(*) ";
				$sql = $sql."           FROM TB_Basket_Program ";
				$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
				$sql = $sql."            AND Sales_Division             = '003' ";
				$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
				$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
				$sql = $sql."            AND (Discount_Code = :discount_code OR Add_Discount_Code = :discount_code) ";
				$sql = $sql."            AND State                      = '001') as Discount_Count ";
				$sql = $sql."  FROM TB_SaleItem       a ";
				$sql = $sql." WHERE a.Center_ID          = :center_id ";
				$sql = $sql."   AND a.Sales_Code         = :sales_code ";

				$stmt = $db->prepare($sql);
				$stmt->bindParam(':center_id'      , $center_id);
				$stmt->bindParam(':sales_code'     , $sales_code);
				$stmt->bindParam(':start_date'     , $start_date);
				$stmt->bindParam(':discount_code'  , $discount_code);

				$stmt->execute();

				$data = $stmt->fetch(PDO::FETCH_BOTH);

				$discount_count  = $data['Discount_Count'];

				if($add_discount_count <= $discount_count){
					$db->rollback();
					$db = null;
					$r_json = "";
					$r_json = $r_json.'{';
					$r_json = $r_json.'"Result": {"ResultCode": -50, "ResultMsg": "해당월 강좌 할인 수량을 초과하였습니다!!"}';
					$r_json = $r_json.'}';
					return $r_json;
				}
			}
		}

		$sql = "";
		$sql = $sql."SELECT Discount_Rate, COUNT(*) as cnt ";
		$sql = $sql."  FROM TB_Discount_By_Sales_Code ";
		$sql = $sql." WHERE Center_ID     = :center_id ";
		$sql = $sql."   AND Sales_Code    = :sales_code " ;
		$sql = $sql."   AND Discount_Code = :discount_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':discount_code'  , $discount_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$discount_rate = $data['Discount_Rate'];
		}

		$discount_amount = (string)(floor(((double)$unit_price * (double)$discount_rate / 100) / 10) * 10);
		$receive_amount = $unit_price - $discount_amount;

		$sql = "";
		$sql = $sql."SELECT IFNULL(a.Add_Discount_Code, '00001') as Add_Discount_Code, IFNULL(b.Discount_Rate, 0) as Add_Discount_Rate, IFNULL(Add_Discount_Count, 0) as Add_Discount_Count, ";
		$sql = $sql."       IFNULL(a.Add_Discount_Start_Date, '') as Add_Discount_Start_Date, IFNULL(a.Add_Discount_End_Date, '') as Add_Discount_End_Date ";
		$sql = $sql."  FROM TB_Member   a LEFT OUTER JOIN ";
		$sql = $sql."       TB_Discount b ON a.Center_ID = b.Center_ID AND a.Add_Discount_Code = b.Discount_Code ";
		$sql = $sql." WHERE a.Center_ID   = :center_id ";
		$sql = $sql."   AND a.Member_Code = :member_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$add_discount_code       = $data['Add_Discount_Code'];
		$add_discount_rate       = $data['Add_Discount_Rate'];
		$add_discount_count      = $data['Add_Discount_Count'];
		$add_discount_start_date = $data['Add_Discount_Start_Date'];
		$add_discount_end_date   = $data['Add_Discount_End_Date'];

		if($add_discount_start_date == '' || $add_discount_end_date == ''){
			$discount_code = '00001';
			$discount_rate = 0;
		}
		else{
			if($add_discount_code != '00001' && $add_discount_count > 0){
				//할인강좌갯수 체크
				$sql = "";
				$sql = $sql."SELECT ((SELECT COUNT(*) ";
				$sql = $sql."           FROM TB_Transaction ";
				$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
				$sql = $sql."            AND Sales_Division             = '003' ";
				$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
				$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
				$sql = $sql."            AND Transition_State           = '001' ";
				$sql = $sql."            AND Trs_Type                   = '001' ";
				$sql = $sql."            AND (Discount_Code = :add_discount_code OR Add_Discount_Code = :add_discount_code) ";
				$sql = $sql."            AND State                      = '001') + ";
				$sql = $sql."        (SELECT COUNT(*) ";
				$sql = $sql."           FROM TB_Basket_Program ";
				$sql = $sql."          WHERE Center_ID                  = a.Center_ID ";
				$sql = $sql."            AND Sales_Division             = '003' ";
				$sql = $sql."            AND Sales_Code                 = a.Sales_Code ";
				$sql = $sql."            AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
				$sql = $sql."            AND (Discount_Code = :add_discount_code OR Add_Discount_Code = :add_discount_code) ";
				$sql = $sql."            AND State                      = '001') as Discount_Count ";
				$sql = $sql."  FROM TB_SaleItem       a ";
				$sql = $sql." WHERE a.Center_ID          = :center_id ";
				$sql = $sql."   AND a.Sales_Code         = :sales_code ";

				$stmt = $db->prepare($sql);
				$stmt->bindParam(':center_id'        , $center_id);
				$stmt->bindParam(':sales_code'       , $sales_code);
				$stmt->bindParam(':start_date'       , $start_date);
				$stmt->bindParam(':add_discount_code', $add_discount_code);

				$stmt->execute();

				$data = $stmt->fetch(PDO::FETCH_BOTH);

				$discount_count  = $data['Discount_Count'];

				if($add_discount_count <= $discount_count){
					$db->rollback();
					$db = null;
					$r_json = "";
					$r_json = $r_json.'{';
					$r_json = $r_json.'"Result": {"ResultCode": -50, "ResultMsg": "해당월 강좌 할인 수량을 초과하였습니다!!"}';
					$r_json = $r_json.'}';
					return $r_json;
				}
			}
		}

		$sql = "";
		$sql = $sql."SELECT Discount_Rate, COUNT(*) as cnt ";
		$sql = $sql."  FROM TB_Discount_By_Sales_Code ";
		$sql = $sql." WHERE Center_ID     = :center_id ";
		$sql = $sql."   AND Sales_Code    = :sales_code " ;
		$sql = $sql."   AND Discount_Code = :add_discount_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'        , $center_id);
		$stmt->bindParam(':sales_code'       , $sales_code);
		$stmt->bindParam(':add_discount_code', $add_discount_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$add_discount_rate = $data['Discount_Rate'];
		}

		$add_discount_amount = (string)(floor(((double)$receive_amount * (double)$add_discount_rate / 100) / 10) * 10);
		$last_receive_amount = $receive_amount - $add_discount_amount;

		$sql = "";
		$sql = $sql."UPDATE TB_Program_Capacity ";
		$sql = $sql."   SET Reg_Count = 1 ";
		$sql = $sql." WHERE Center_ID  = :center_id ";
		$sql = $sql."   AND Sales_Code = :sales_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);

		$stmt->execute();

        $db = null;

		CF_Web_Log('장바구니 조회성공', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('장바구니 조회성공', '조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Basket_Cancel
// ● 설  명 : 신청내용 취소
//------------------------------------------------------------------------------------
function CF_Basket_Cancel ($idx, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
	$sql = $sql."UPDATE TB_Basket_Program ";
	$sql = $sql."   SET State    = '003', ";
	$sql = $sql."       Upd_Date = Now(), ";
	$sql = $sql."       Upd_ID   = 'SYSTEM', ";
	$sql = $sql."       Upd_IP    = '127.0.0.1' ";
	$sql = $sql." WHERE IDX = :idx ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':idx'      , $idx);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('장바구니 취소', '취소성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('장바구니 취소', '취소실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};



//------------------------------------------------------------------------------------
// ● 함수명 : CF_Basket_Del
// ● 설  명 : 신청내용 취소
//------------------------------------------------------------------------------------
function CF_Basket_Del ($idx, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
	$sql = $sql."DELETE FROM TB_Basket_Program ";
	$sql = $sql." WHERE IDX = :idx ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':idx'      , $idx);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('장바구니 삭제', '삭제성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('장바구니 삭제', '삭제실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
};

//*******비밀번호 초기화 문자발송*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_PW_Init_SMS_Send -> 아이디 중복 체크
//------------------------------------------------------------------------------------
function CF_PW_Init_SMS_Send($center_id, $member_id, $new_pw, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT CAST(AES_DECRYPT(UNHEX(Cellular), 'fK#h19qaZ$5djs,<') AS CHAR) as Cellular, Member_Name,  ";
	$sql = $sql."       b.Telephone, b.Center_Name ";
	$sql = $sql."  FROM TB_Member  a INNER JOIN ";
	$sql = $sql."       TB_Company b ON a.Center_ID = b.Center_ID ";
	$sql = $sql." WHERE a.Center_ID = :center_id ";
	$sql = $sql."   AND a.Web_ID    = :member_id ";
	$sql = $sql."   AND a.State     = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':member_id'  , $member_id);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cellular    = $data['Cellular'];
		$member_name = $data['Member_Name'];
		$telephone   = $data['Telephone'];
		$center_name = $data['Center_Name'];

		$msg_body = '초기화된 비밀번호 입니다. -> '.$new_pw;

		$db->beginTransaction();

		$sql = "";
		$sql = $sql." INSERT INTO BIZ_MSG (	cmid,                   msg_type,	status,	   request_time,  send_time,    dest_phone,	    dest_name,	   send_phone, ";
		$sql = $sql." 						send_name,	            subject,	msg_body,  nation_code,	  sender_key,   template_code,  wap_url,       ad_flag, ";
		$sql = $sql." 						timeout,                re_type,    re_body,   re_part )  ";
		$sql = $sql."				VALUES (nextval(sms_cmid_seq),	'0',		'0',	   Now(),	      Now(),         :dest_phone,   :dest_name,    :send_phone, ";
		$sql = $sql." 						:send_name,	            '',         :msg_body, null,          null,          null,          null,          null, ";
		$sql = $sql." 						null,                   null,       null,      null ) ";
	
		$stmt = $db->prepare($sql);

		$stmt->bindParam(':dest_phone'	,	$cellular);
		$stmt->bindParam(':dest_name'	,	$member_name);
		$stmt->bindParam(':send_phone'	,	$telephone);
		$stmt->bindParam(':send_name' ,		$center_name);
		$stmt->bindParam(':msg_body'	,	$msg_body);
		
		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('비밀번호초기화', '비밀번호 초기화 문자 발송', $member_id, $url, $ip);

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('비밀번호초기화', '비밀번호 초기화 문자 발송 실패 : '.$e->getMessage(), $member_id, $url, $ip);        
    }

};


?>


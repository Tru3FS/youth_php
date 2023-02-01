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


//*******회원가입*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Dup_ID_Check -> 아이디 중복 체크
//------------------------------------------------------------------------------------
function CF_Dup_ID_Check($member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID = '01' ";
	$sql = $sql."   AND Member_ID = :member_id ";
	$sql = $sql."   AND State     = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
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
function CF_Join_New($member_id, $member_pw, $member_name, $birth, $sex, $cellular, $ip, $url){
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
		$member_code = CF_Nextval('01', 'M'.$cur_month);

		$member_code = '01'.$cur_month.sprintf($format, $member_code);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."INSERT INTO TB_Member(Center_ID,     Member_Code,                     Member_Name,   Member_Id,  Member_PW,  Sex,        Birth_Date,                               Solar_Yn,      Cellular,                                    Sms_Yn, ";
		$sql = $sql."                      Discount_Code, Ins_Date,                        Ins_ID,        Ins_IP,     State,      Agree_Date, Term_Agree,                               Privacy_Agree, Other_Agree, ";
		$sql = $sql."                      Privacy_Agree1, Privacy_Agree2,                 Privacy_Agree3) ";
		$sql = $sql."               VALUES('01',          :member_code,                    :member_name,  :member_id, sha2(:member_pw, 256), :sex,       HEX(AES_ENCRYPT(:birth, :manage_gs_key)), '1',           HEX(AES_ENCRYPT(:cellular, :manage_gs_key)), 'Y', ";
		$sql = $sql."                      '00001',       F_DATE_TIME('yyyymmddhh24miss'), 'WEB',         :ip,        '001',      F_DATE_TIME('yyyymmdd'), '', '', '', '', '', '') ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':member_code'  , $member_code);
		$stmt->bindParam(':member_name'  , $member_name);
		$stmt->bindParam(':member_id'    , $member_id);
		$stmt->bindParam(':member_pw'    , $member_pw);
		$stmt->bindParam(':sex'          , $sex);
		$stmt->bindParam(':birth'        , $birth);
		$stmt->bindParam(':cellular'     , $cellular);
		$stmt->bindParam(':ip'           , $ip);
		$stmt->bindParam(':manage_gs_key', $manage_gs_key);

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
// ● 함수명 : CF_Join_Update -> 회원정보 수정
//------------------------------------------------------------------------------------
function CF_Join_Update($member_id, $member_pw, $member_name, $birth, $sex, $cellular, $ip, $url){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Member_Name = :member_name, ";
		$sql = $sql."       Member_PW   = sha2(:member_pw, 256), ";
		$sql = $sql."       Sex         = :sex, ";
		$sql = $sql."       Birth_Date  = HEX(AES_ENCRYPT(:birth, :manage_gs_key)), ";
		$sql = $sql."       Cellular    = HEX(AES_ENCRYPT(:cellular, :manage_gs_key)), ";
		$sql = $sql."       Upd_Date    = F_DATE_TIME('yyyymmddhh24miss'), ";
		$sql = $sql."       Upd_ID      = 'WEB', ";
		$sql = $sql."       Upd_Ip      = :ip ";
		$sql = $sql." WHERE Center_ID = '01' ";
		$sql = $sql."   AND Member_ID = :member_id ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':member_id'    , $member_id);
		$stmt->bindParam(':member_name'  , $member_name);
		$stmt->bindParam(':member_pw'    , $member_pw);
		$stmt->bindParam(':sex'          , $sex);
		$stmt->bindParam(':birth'        , $birth);
		$stmt->bindParam(':cellular'     , $cellular);
		$stmt->bindParam(':ip'           , $ip);
		$stmt->bindParam(':manage_gs_key', $manage_gs_key);

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
// ● 함수명 : CF_Join_Withdraw -> 회원탈퇴 -> 차후에 본인인증 키값도 삭제해야 함
//------------------------------------------------------------------------------------
function CF_Join_Withdraw($member_code, $member_id, $ip, $url){
	global $DBName;
	global $manage_gs_key;

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Member_Name    = '탈퇴회원', ";
		$sql = $sql."       Member_ID      = null, ";
		$sql = $sql."       Member_PW      = null, ";
		$sql = $sql."       Post_No        = '', ";
		$sql = $sql."       Address        = '', ";
		$sql = $sql."       Address_Detail = '', ";
		$sql = $sql."       Birth_Date     = HEX(AES_ENCRYPT('19000101', :manage_gs_key)), ";
		$sql = $sql."       Cellular       = null, ";
		$sql = $sql."       Telephone      = null, ";
		$sql = $sql."       Upd_Date       = F_DATE_TIME('yyyymmddhh24miss'), ";
		$sql = $sql."       Upd_ID         = 'WEB', ";
		$sql = $sql."       Upd_Ip         = :ip, ";
		$sql = $sql."       State          = '002' ";
		$sql = $sql." WHERE Center_ID   = '01' ";
		$sql = $sql."   AND Member_Code = :member_code ";
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':member_code'  , $member_code);
		$stmt->bindParam(':ip'           , $ip);
		$stmt->bindParam(':manage_gs_key', $manage_gs_key);

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
function CF_FInd_ID($cellular, $member_name, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT Member_ID ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID   = '01' ";
	$sql = $sql."   AND Member_Name = :member_name ";
	$sql = $sql."   AND Cellular    = HEX(AES_ENCRYPT(:cellular, :manage_gs_key)) ";
	$sql = $sql."   AND State       = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':member_name'  , $member_name);
		$stmt->bindParam(':cellular'     , $cellular);
		$stmt->bindParam(':manage_gs_key', $manage_gs_key);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($data as $row){
			$member_id = $row['Member_ID'];
		}

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
function CF_FInd_PW($cellular, $member_name, $member_id, $init_password, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."UPDATE TB_Member ";
	$sql = $sql."   SET Member_PW          = sha2(:init_password, 256), ";
	$sql = $sql."       Password_Change_Yn = 'N' ";
	$sql = $sql." WHERE Center_ID   = '01' ";
	$sql = $sql."   AND Member_Name = :member_name ";
	$sql = $sql."   AND Member_ID   = :member_id ";
	$sql = $sql."   AND Cellular    = HEX(AES_ENCRYPT(:cellular, :manage_gs_key)) ";
	$sql = $sql."   AND State       = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':member_name'   , $member_name);
		$stmt->bindParam(':member_id'     , $member_id);
		$stmt->bindParam(':cellular'      , $cellular);
		$stmt->bindParam(':init_password' , $init_password);
		$stmt->bindParam(':manage_gs_key' , $manage_gs_key);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

		foreach ($data as $row){
			$member_id = $row['Member_ID'];
		}

        $db = null;

		CF_Web_Log('비밀번호 찾기', '비밀번호찾기성공', $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('비밀번호 찾기', '비밀번호 찾기실패 : '.$e->getMessage(), $member_id, $url, $ip);
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }

};

//*******로그인*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Login
//------------------------------------------------------------------------------------
function CF_Login($member_id, $member_pw, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT COUNT(*) as cnt ";
	$sql = $sql."  FROM TB_Member ";
	$sql = $sql." WHERE Center_ID = '01' ";
	$sql = $sql."   AND Member_ID = :member_id ";
	$sql = $sql."   AND State     = '001' ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$cnt = 0;

		$stmt = $db->prepare($sql);
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
		$sql = $sql." WHERE Center_ID = '01' ";
		$sql = $sql."   AND Member_ID = :member_id ";
		$sql = $sql."   AND Member_PW = sha2(:member_pw, 256) ";
		$sql = $sql."   AND State     = '001' ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':member_id'  , $member_id);
		$stmt->bindParam(':member_pw'  , $member_pw);

		$stmt->execute();
		$data = $stmt-> fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt == 0){
			$db = null;
			CF_Web_Log('회원로그인', '비밀번호가 일치하지 않습니다', $member_id, $url, $ip);
			return '{"Result": {"ResultCode": -30,"ResultMsg":"비밀번호가 일치하지 않습니다!!"}}';
		}
		
		//로그인 성공 시 마지막 로그인일시 업데이트
		$db->beginTransaction();

		$sql = "";
		$sql = $sql."UPDATE TB_Member ";
		$sql = $sql."   SET Last_Web_Login_Date = F_DATE_TIME('yyyymmddhh24miss') ";
		$sql = $sql." WHERE Center_ID = '01' ";
		$sql = $sql."   AND Member_ID = :member_id ";

		$stmt = $db->prepare($sql);
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
function CF_Web_Application_Search ($center_id, $sales_place_code, $place_code, $event_code, $class_code){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT a.Sales_Code, a.Sales_Item_Name, b.Web_Re_Start, b.Web_Re_End, b.Web_Re_Start_Time, b.Web_Re_End_Time, b.Web_New_Start, b.Web_New_End, b.Web_New_Start_Time, b.Web_New_End_Time ";
    $sql = $sql."  FROM TB_SaleItem   a INNER JOIN ";
	$sql = $sql."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code AND a.Class_Code = b.Calss_Code ";
    $sql = $sql." WHERE a.Center_ID           = :center_id ";
    $sql = $sql."   AND a.Sales_Division      = '003' ";
	$sql = $sql."   AND a.Event_Code       LIKE :event_code ";
	$sql = $sql."   AND a.Place_Code       LIKE :place_code ";
	$sql = $sql."   AND a.Sales_Place_Code LIKE :sales_place_code ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':sales_place_code', $sales_place_code);
		$stmt->bindParam(':place_code'      , $place_code);
		$stmt->bindParam(':event_code'      , $event_code);
		$stmt->bindParam(':class_code'      , $class_code);

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

		CF_Web_Log('업장조회', '조회성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('업장조회', '조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
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
	$sql = $sql."   AND a.Place_Code       LIKE :place_code ";
	$sql = $sql."   AND a.Sales_Place_Code LIKE :sales_place_code ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";
	$sql = $sql." ORDER BY b.Detail_Name ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':place_code'      , $place_code);
		$stmt->bindParam(':sales_place_code', $sales_place_code);

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
		CF_Web_Log('종목조회', '조회실패 : '.$e->getMessage(), $member_id, $url, $ip);
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
	$sql = $sql."   AND a.Place_Code       LIKE :place_code ";
	$sql = $sql."   AND a.Sales_Place_Code LIKE :sales_place_code ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";
	$sql = $sql." ORDER BY b.Class_Name ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':event_code'      , $event_code);
		$stmt->bindParam(':place_code'      , $place_code);
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
// ● 함수명 : CF_Search_Sales_Code
// ● 설  명 : 신규 접수 시 프로그램 조회
//------------------------------------------------------------------------------------
function CF_Search_Sales_Code ($center_id, $sales_place_code, $place_code, $event_code, $class_code, $Tmonth, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT a.Sales_Code, a.Kiosk_Display_Text as Sales_Item_Name, a.Vat_Yn, a.Start_Time, a.End_Time, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
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
	$sql = $sql."             AND State           = '001') as Current_Person, a.First_Start_Day_Yn ";
    $sql = $sql."  FROM TB_SaleItem       a INNER JOIN ";
	$sql = $sql."       TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
    $sql = $sql." WHERE a.Center_ID           = :center_id ";
    $sql = $sql."   AND a.Sales_Division      = '003' ";
	$sql = $sql."   AND a.Event_Code       LIKE :event_code ";
	$sql = $sql."   AND a.Class_Code       LIKE :class_code ";
	$sql = $sql."   AND a.Place_Code       LIKE :place_code ";
	$sql = $sql."   AND a.Sales_Place_Code LIKE :sales_place_code ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND b.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";
	$sql = $sql."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) ";
	$sql = $sql."                                  FROM TB_SaleItem_Price ";
	$sql = $sql."                                 WHERE Center_ID   = a.Center_ID ";
	$sql = $sql."                                   AND Apply_Date <= CONCAT(:Tmonth, '01') ";
	$sql = $sql."                               ) ";
	$sql = $sql." ORDER BY a.Sales_Item_Name ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':event_code'      , $event_code);
		$stmt->bindParam(':class_code'      , $class_code);
		$stmt->bindParam(':place_code'      , $place_code);
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

		$yyyymm = $data['YYYYMM'];

		$sql = "";
		$sql = $sql."SELECT c.Detail_Name as Lecture_Place, ";
		$sql = $sql."       CONCAT(:yyyymm, '01') as Start_Date, ";
		$sql = $sql."       DATE_FORMAT(LAST_DAY(DATE_ADD(CONCAT(:yyyymm, '01'), INTERVAL CAST(b.Month_Qty as int) - 1 MONTH)), '%Y%m%d') as End_Date, ";
		$sql = $sql."       F_WEEK_NAME(a.Use_Week) as Week_Name, ";
		$sql = $sql."       a.Start_Time, a.End_Time, b.Unit_Price, a.Lecture_Introduce, a.Lecture_Detail_Contents, a.Lecture_Guide, a.Sales_Item_Name, a.Event_Code, d.Detail_Name as Event_Name ";
		$sql = $sql."  FROM TB_SaleItem        a INNER JOIN ";
		$sql = $sql."       TB_SaleItem_Price  b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN ";
		$sql = $sql."       TB_Code_D          c ON a.Lesson_Place = c.Detail_Code AND c.Common_Code = 'V30' LEFT OUTER JOIN ";
		$sql = $sql."       TB_Code_D          d ON a.Event_Code = d.Detail_Code AND d.Common_Code = 'H02' ";
		$sql = $sql." WHERE a.Center_ID           = :center_id ";
		$sql = $sql."   AND a.Sales_Code          = :sales_code ";
		$sql = $sql."   AND a.State               = '001' ";
		$sql = $sql."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) ";
		$sql = $sql."                                  FROM TB_SaleItem_Price ";
		$sql = $sql."                                 WHERE Center_ID   = a.Center_ID ";
		$sql = $sql."                                   AND Apply_Date <= F_DATE_TIME('YYYYMMDD') ";
		$sql = $sql."                               ) ";
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

//*******수강이력현황*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Member_Valid_List
// ● 설  명 : 수강이력현황 -> 재등록 유무도 같이 체크
//------------------------------------------------------------------------------------
function CF_Member_Valid_List ($center_id, $member_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT c.Detail_Name as Event_Name, b.Event_Code, ";
	$sql = $sql."       d.Detail_Name as Sales_Division_Name, b.Sales_Division, ";
	$sql = $sql."       b.Sales_Code, b.Sales_Item_Name, a.Start_Date, a.End_Date, ";
	$sql = $sql."       f_week_name(b.Use_Week) as Week_Name, b.Start_Time, b.End_Time, ";
	$sql = $sql."       a.Receive_Amount, a.Org_Sale_Amount, a.Trs_No, a.Trs_Seq, a.Member_Seq, ";
	$sql = $sql."       a.Location_Code, a.Locker_No, ";
	$sql = $sql."       a.Lesson_Qty, a.Coupon_Count, a.Coupon_Use_Count, ";
	$sql = $sql."       TO_DAYS(a.End_Date) - TO_DAYS(F_DATE_TIME('YYYYMMDD')) + 1 AS Expire_Days, ";
	$sql = $sql."       e.Member_Name, ";
	$sql = $sql."       CASE WHEN a.End_Date >= F_DATE_TIME('YYYYMMDD') AND SUBSTRING(a.End_Date, 1, 6) = SUBSTRING(F_DATE_TIME('YYYYMMDD'), 1, 6) ";
	$sql = $sql."                 AND F_DATE_TIME('YYYYMMDDHH24MI') BETWEEN CONCAT(f.Web_Re_Start, f.Web_Re_Start_Time) AND CONCAT(f.Web_Re_End, f.Web_Re_End_Time) THEN 'Y' ELSE 'N' END as Repayment_Yn ";
	$sql = $sql."  FROM TB_Transaction a INNER JOIN ";
	$sql = $sql."       TB_Saleitem    b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code INNER JOIN ";
	$sql = $sql."       TB_Code_D      c ON b.Event_Code = c.Detail_Code AND c.Common_Code = 'H02' INNER JOIN ";
	$sql = $sql."       TB_Code_D      d ON b.Sales_Division = d.Detail_Code AND d.Common_Code = 'H03' INNER JOIN ";
	$sql = $sql."       TB_Member      e ON a.Center_ID = e.Center_ID AND a.Member_Code = e.Member_Code LEFT OUTER JOIN ";
	$sql = $sql."       TB_EventClass  f ON b.Center_ID = f.Center_ID AND b.Sales_Division = f.Sales_Division AND b.Event_Code = f.Event_Code AND b.Class_Code = f.Class_Code ";
	$sql = $sql." WHERE a.Center_ID                 = :center_id ";
	$sql = $sql."   AND a.Sales_Division           IN ('003', '010', '030', '035', '055', '056') ";
	$sql = $sql."   AND a.Member_Code               = :member_code ";
	$sql = $sql."   AND a.Sales_Date               >= DATE_FORMAT(DATE_ADD(Now(), interval -1 year), '%Y%m%d') ";
	$sql = $sql."   AND a.Transition_State         IN ('001', '015') ";
	$sql = $sql."   AND a.Trs_Type                  = '001' ";
	$sql = $sql."   AND a.State                     = '001' ";
	$sql = $sql."   AND b.First_Start_Day_Yn = 'Y' ";

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

//*******재수강 신청 시 장바구니 넣기*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Repayment_Basket_Insert
// ● 설  명 : 수강이력현황 -> 재등록 유무도 같이 체크
//------------------------------------------------------------------------------------
function CF_Repayment_Basket_Insert ($center_id, $trs_no, $trs_seq, $member_id, $url, $ip){
	global $DBName;

	//3개월 문화강좌 중간에 받은 내용이 있을 경우에 금액 재계산 필요!!!!

	$sql = "";
	$sql = $sql."INSERT INTO TB_Basket_Program(Center_ID,   Sales_Date,                Sales_Division,   Member_Code,      Sales_Code,     Sales_Item_Name,  Week_Name,          Qty, ";
	$sql = $sql."                              Month_Qty,   Unit_Price,                Discount_Code,    Discount_Amount,  Receive_Amount,  ";
	$sql = $sql."                              Start_Date, ";
	$sql = $sql."                              End_Date, ";
	$sql = $sql."                              Locker_No,    Vat_Yn,                   Remark,           Ins_Date,                         Ins_ID,           Ins_IP,             State, ";
	$sql = $sql."                              Online_Gubun, Payment_Start_Date,       Payment_End_Date) ";
    $sql = $sql."                       SELECT a.Center_ID,  F_DATE_TIME('YYYYYMMDD'), a.Sales_Division, a.Member_Code,                    a.Sales_Code,      b.Sales_Item_Name, F_WEEK_NAME(b.Use_Week), 1, ";
	$sql = $sql."                              a.Month_Qty,  a.Unit_Price,             a.Discount_Code,                                    a.Discount_Amount, a.Receive_Amount, ";
	$sql = $sql."                              CONCAT(DATE_FORMAT(DATE_ADD(a.End_Date, INTERVAL 1 MONTH), '%Y%m'), '01'), ";
	$sql = $sql."                              DATE_FORMAT(LAST_DAY(DATE_ADD(CONCAT(CONCAT(DATE_FORMAT(DATE_ADD(a.End_Date, INTERVAL 1 MONTH), '%Y%m'), '01'), '01'), INTERVAL CAST(b.Month_Qty as int) - 1 MONTH)), '%Y%m%d'), ";
	$sql = $sql."                              '',           b.Vat_Yn,                 '',               F_DATE_TIME('yyyymmddhh24miss'),  :member_id,        :ip,               '001' ";
	$sql = $sql."                         FROM TB_Transaction a INNER JOIN ";
	$sql = $sql."                              TB_Saleitem    b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
	$sql = $sql."                        WHERE a.Center_ID                 = :center_id ";
	$sql = $sql."                          AND a.Trs_No                    = :trs_no ";
	$sql = $sql."                          AND a.Trs_Seq                   = :trs_seq ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);
		$stmt->bindParam(':trs_no'     , $trs_no);
		$stmt->bindParam(':trs_seq'    , $trs_seq);
		$stmt->bindParam(':member_id'  , $member_id);
		$stmt->bindParam(':ip'         , $ip);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

		CF_Web_Log('재등록신청', '신청성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		CF_Web_Log('재등록신청', '신청실패 : '.$e->getMessage(), $member_id, $url, $ip);
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
    $sql = $sql."SELECT IDX, Member_Code, State, ";
	$sql = $sql."       CASE WHEN State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN State = '006' THEN '환불완료' END State_Name,Center_ID, Sales_Item_Name, Rent_Start_Time, Rent_End_Time, Receive_Amount, Sales_Date ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Sales_Division IN ('003') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql."   AND State      NOT IN ('002', '100') ";
	$sql = $sql."   AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END ";
	$sql = $sql." ORDER BY IDX DESC ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

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

//*******환불신청현황*******//
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Member_Refund_RequestList
// ● 설  명 : 환불신청현황
//------------------------------------------------------------------------------------
function CF_Member_Refund_RequestList ($center_id, $member_code, $member_id, $url, $ip){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT IDX, Member_Code, State, ";
	$sql = $sql."       CASE WHEN State = '001' THEN '결제대기' ";
	$sql = $sql."            WHEN State = '002' THEN '결제완료' ";
	$sql = $sql."            WHEN State = '003' THEN '신청취소' ";
	$sql = $sql."            WHEN State = '004' THEN '시간경과취소' ";
	$sql = $sql."            WHEN State = '005' THEN '환불신청' ";
	$sql = $sql."            WHEN State = '006' THEN '환불완료' END State_Name,Center_ID, Sales_Item_Name, Rent_Start_Time, Rent_End_Time, Receive_Amount, Sales_Date, IFNULL(Price_Idx, 0) as Price_Idx ";
	$sql = $sql."  FROM TB_Basket_Program  ";
	$sql = $sql." WHERE Sales_Division IN ('003') ";
	$sql = $sql."   AND (State='005' OR State='006') ";
	$sql = $sql."   AND Member_Code     = :member_code ";
	$sql = $sql." ORDER BY IDX DESC ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);

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
function CF_Basket_Insert ($center_id, $sales_division, $member_code, $sales_code, $sales_item_name, $week_name, $month_qty, $unit_price, $start_date, $end_date, $vat_yn, $member_id, $url, $ip){
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
			$db = null;
			$r_json = "";
			$r_json = $r_json.'{';
			$r_json = $r_json.'"Result": {"ResultCode": -30, "ResultMsg": "이미 신청한 강좌입니다!!"}';
			$r_json = $r_json.'}';
			return $r_json;

		}

		$sql = "";
		$sql = $sql."SELECT COUNT(*) as cnt ";
		$sql = $sql."  FROM TB_Transaction ";
		$sql = $sql." WHERE Center_ID                  = :center_id ";
		$sql = $sql."   AND Member_Code                = :member_code ";
		$sql = $sql."   AND Sales_Code                 = :sales_code ";
		$sql = $sql."   AND End_Date                  >= :start_date ";
		$sql = $sql."   AND LEFT(:start_date, 6) BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
		$sql = $sql."   AND Transition_State           = '001' ";
		$sql = $sql."   AND Trs_Type                   = '001' ";
		$sql = $sql."   AND State                      = '001' ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$cnt = $data['cnt'];

		if($cnt > 0){
			$db = null;
			$r_json = "";
			$r_json = $r_json.'{';
			$r_json = $r_json.'"Result": {"ResultCode": -40, "ResultMsg": "이미 결제한 강좌이거나 수강중입니다!!"}';
			$r_json = $r_json.'}';
			return $r_json;

		}

		$db->beginTransaction();

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
		$sql = $sql."            AND State                      = '001')) as Reg_Count, a.Vat_Yn ";
		$sql = $sql."  FROM TB_SaleItem       a INNER JOIN ";
		$sql = $sql."       TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code ";
		$sql = $sql." WHERE a.Center_ID          = :center_id ";
		$sql = $sql."   AND a.Sales_Code         = :sales_code ";
		$sql = $sql."   AND a.Online_Yn          = 'Y' ";
		$sql = $sql."   AND a.State              = '001' ";
		$sql = $sql."   AND b.Apply_Date         =  (SELECT MAX(Apply_Date) ";
		$sql = $sql."                                  FROM TB_SaleItem_Price ";
		$sql = $sql."                                 WHERE Center_ID   = a.Center_ID ";
		$sql = $sql."                                   AND Apply_Date <= F_DATE_TIME('YYYYYMMDD') ";
		$sql = $sql."                               ) ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':start_date'     , $start_date);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$capacity  = $data['Capacity'];
		$reg_count = $data['Reg_Count'];
		$vat_yn    = $data['Vat_Yn'];

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
		$sql = $sql."SELECT F_NVLS(a.Discount_Code, '00001') as Discount_Code, F_NVLN(b.Discount_Rate, 0) as Discount_Rate ";
		$sql = $sql."  FROM TB_Member   a LEFT OUTER JOIN ";
		$sql = $sql."       TB_Discount b ON a.Center_ID = b.Center_ID AND a.Discount_Code = b.Discount_Code ";
		$sql = $sql." WHERE a.Center_ID   = :center_id ";
		$sql = $sql."   AND a.Member_Code = :member_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':member_code'    , $member_code);

		$stmt->execute();

		$data = $stmt->fetch(PDO::FETCH_BOTH);

		$discount_code = $data['Discount_Code'];
		$discount_rate = $data['Discount_Rate'];

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
		$sql = $sql."UPDATE TB_Program_Capacity ";
		$sql = $sql."   SET Reg_Count = 1 ";
		$sql = $sql." WHERE Center_ID  = :center_id ";
		$sql = $sql."   AND Sales_Code = :sales_code ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_code'     , $sales_code);

		$stmt->execute();

		$sql = "";
		$sql = $sql."INSERT INTO TB_Basket_Program(Center_ID,  Sales_Date,              Sales_Division,                  Member_Code,      Sales_Code,      Sales_Item_Name,  Week_Name,    Qty, ";
		$sql = $sql."                              Month_Qty,  Unit_Price,              Discount_Code,                   Discount_Amount,  Receive_Amount,  Start_Date,       End_Date,     Locker_No, ";
		$sql = $sql."                              Vat_Yn,     Remark,                  Ins_Date,                        Ins_ID,           Ins_IP,          State,            Online_Gubun, Payment_Start_Date, Payment_End_Date) ";
		$sql = $sql."                       VALUES(:center_id, F_DATE_TIME('YYYYMMDD'), :sales_division,                 :member_code,     :sales_code,     :sales_item_name, :week_name,   1, ";
		$sql = $sql."                              :month_qty, :unit_price,             :discount_code,                  :discount_amount, :receive_amount, :start_date,      :end_date,    '', ";
		$sql = $sql."                              :vat_yn,    '',                      F_DATE_TIME('yyyymmddhh24miss'), :member_id,        :ip,            '001',            'Online',     Now(),               DATE_ADD(Now(), INTERVAL 6 HOUR)) ";

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'      , $center_id);
		$stmt->bindParam(':sales_division' , $sales_division);
		$stmt->bindParam(':member_code'    , $member_code);
		$stmt->bindParam(':sales_code'     , $sales_code);
		$stmt->bindParam(':sales_item_name', $sales_item_name);
		$stmt->bindParam(':week_name'      , $week_name);
		$stmt->bindParam(':month_qty'      , $month_qty);
		$stmt->bindParam(':unit_price'     , $unit_price);
		$stmt->bindParam(':discount_code'  , $discount_code);
		$stmt->bindParam(':discount_amount', $discount_amount);
		$stmt->bindParam(':receive_amount' , $receive_amount);
		$stmt->bindParam(':start_date'     , $start_date);
		$stmt->bindParam(':end_date'       , $end_date);
		$stmt->bindParam(':vat_yn'         , $vat_yn);
		$stmt->bindParam(':member_id'      , $member_id);
		$stmt->bindParam(':ip'             , $ip);

		$stmt->execute();

		$db->commit();

        $db = null;

		CF_Web_Log('장바구니 넣기', '저장성공 : '.$member_code, $member_id, $url, $ip);

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"}';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db->rollback();
		$db = null;
		CF_Web_Log('장바구니 넣기', '저장실패 : '.$e->getMessage(), $member_id, $url, $ip);
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

?>


<?php
if (!defined('_SAMSUNG_')) exit; // 개별 페이지 접근 불가



    session_start();
/*
┌ cb_encode_path 변수에 대한 설명  ──────────────────────────────────
	모듈 경로설정은, '/절대경로/모듈명' 으로 정의해 주셔야 합니다.
	
	+ FTP 로 모듈 업로드시 전송형태를 'binary' 로 지정해 주시고, 권한은 755 로 설정해 주세요.
	
	+ 절대경로 확인방법
	  1. Telnet 또는 SSH 접속 후, cd 명령어를 이용하여 모듈이 존재하는 곳까지 이동합니다.
	  2. pwd 명령어을 이용하면 절대경로를 확인하실 수 있습니다.
	  3. 확인된 절대경로에 '/모듈명'을 추가로 정의해 주세요.
└────────────────────────────────────────────────────────────────────
*/




// 실행모듈
if(PHP_INT_MAX == 2147483647) // 32-bit
    $cb_encode_path = NC_NICE_PATH.'/bin/CPClient';
else
    $cb_encode_path = NC_NICE_PATH.'/bin/CPClient_x64';


    $sitecode   = "CA130";				// NICE로부터 부여받은 사이트 코드
    $sitepasswd = "24Zd4WS1gfaO";			// NICE로부터 부여받은 사이트 패스워드
    
    $niceForm_action    = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";


//$sRequestNumber="BC283_2022063011200904989";

//업체정보 암호화 데이타 : //[AgAFQkMyODPaNVxcPGi9Zu756F0ijQjl7YippOpRa0VWtJSVg5M6m5ad1cSi2Gb9YSvL3yQ7CLIeGKLWIVfROId/gU7jzKbIVEsGAmECdBaU1ohaV79jJmfVij34g7yguPUcUmu2p2Jo+gKfz5K+rJaMd/OMMGqAe/peuIGuXnLFfziIkbrStCB3U7ODDjKBcSrvrreV1e2GeYZVSbzRIsTyGmKkVmAkAUiUzPiyRMcyg1e09ogQnAiC1fUi9v5G4F9L3kvpfEYmGQ6ZTHW9RdCl8bkCut6j85582fjt/IMxLnt0oLYq3KKWwmuSAoRgWXlz1zWO+MCpX//ZLCnxbfFABm/yMcl52vFROcduBbkyMSYgFUVwAgwlUBtlNLHxCP9vfo3mahRkEPWJ+xhHwcEXbtiZjNfiwT86cG0WtzrDlYh2BN0ubDlvq+fTkpjERyTzeuXeFr9DZPAr8Q+DtTepNuYPFn3f/+kVfpuhBbuM4QnhYJAoUCiK0HCrDjaINWtiuNxUKEBN0=]


//
//if(!$sitecode)
//    alert('나이스평가정보(NICE) 휴대폰 본인확인 서비스 사이트코드가 없습니다.\\관리자 > 기본환경설정에 NICE 사이트코드를 입력해 주십시오.', NC_URL);


$authtype = "";      		// 없으면 기본 선택화면, X: 공인인증서, M: 핸드폰, C: 카드
    	
$popgubun 	= "N";			//Y : 취소버튼 있음 / N : 취소버튼 없음
$customize 	= "";			//없으면 기본 웹페이지 / Mobile : 모바일페이지
    
$gender = "";      			// 없으면 기본 선택화면, 0: 여자, 1: 남자
	
$reqseq = "REQ_0123456789";     // 요청 번호, 이는 성공/실패후에 같은 값으로 되돌려주게 되므로
                                // 업체에서 적절하게 변경하여 쓰거나, 아래와 같이 생성한다.
									
// 실행방법은 싱글쿼터(`) 외에도, 'exec(), system(), shell_exec()' 등등 귀사 정책에 맞게 처리하시기 바랍니다.
$reqseq = `$cb_encode_path SEQ $sitecode`;
    
// CheckPlus(본인인증) 처리 후, 결과 데이타를 리턴 받기위해 다음예제와 같이 http부터 입력합니다.
// 리턴url은 인증 전 인증페이지를 호출하기 전 url과 동일해야 합니다. ex) 인증 전 url : http://www.~ 리턴 url : http://www.~
$returnurl = NC_NICE_URL."/checkplus_success.php?center_id=".$center_id;	// 성공시 이동될 URL
$errorurl = NC_NICE_URL."/checkplus_fail.php?center_id=".$center_id;		// 실패시 이동될 URL



function GetValue($str , $name) //해당 함수에서 에러 발생 시 $len => (int)$len 로 수정 후 사용하시기 바랍니다.
{
    $pos1 = 0;  //length의 시작 위치
    $pos2 = 0;  //:의 위치

    while( $pos1 <= strlen($str) )
    {
        $pos2 = strpos( $str , ":" , $pos1);
        $len = substr($str , $pos1 , $pos2 - $pos1);
        $key = substr($str , $pos2 + 1 , $len);
        $pos1 = $pos2 + $len + 1;
        if( $key == $name )
        {
            $pos2 = strpos( $str , ":" , $pos1);
            $len = substr($str , $pos1 , $pos2 - $pos1);
            $value = substr($str , $pos2 + 1 , $len);
            return $value;
        }
        else
        {
            // 다르면 스킵한다.
            $pos2 = strpos( $str , ":" , $pos1);
            $len = substr($str , $pos1 , $pos2 - $pos1);
            $pos1 = $pos2 + $len + 1;
        }            
    }
}

?>
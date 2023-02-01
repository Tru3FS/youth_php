<?
if (!defined("_SAMSUNG_")) exit; // 개별 페이지 접근 불가 
/*
 
 
1) 로그인시 암호를 잘못입력하는 경우 기록파일에 저장을 한다.
2) 한IP에서 일정시간동안 정해진수 이상 로그인을 시도하면 로그인과다로 표시하고 종료한다.
3) 종료시 로그인 시도 담당자와 관리자에게 문자전송.
4) 로그인성공시 실패 기록을 삭제한다.
5) 접속제한수는 제한은 10회 IP차단은 10회 로되어있습니다. 소스에서 수정가능
 
  $max_limit_out=10;  //하루동안 10번이상 시도하면 ip를 접근차단으로 지정하고 종료함..
  $max_limit_warn=10; //하루동안 10번이상 시도하면 접속을 종료하고 로그인 시도 담당자와 관리자에게 문자 발송
 
 
*/


$member_id=$_POST['member_id'];
 
$sql = " select Web_ID,Web_Pw from TB_MEMBER where Web_ID = '{$member_id}' ";
$mb = sql_fetch($sql);

if (strstr($PHP_SELF,"login_check.php") && $_POST['member_id']) {
    $max_limit_out = 5; //하루동안 0번이상 시도하면 ip를 접근차단으로 지정하고 종료함..
    $max_limit_warn = 5; //하루동안 0번이상 시도하면 접속을 종료하고 로그인 시도 담당자와 관리자에게 쪽지를 보냄

    $mb = sql_fetch("select Web_ID,Web_Pw from TB_MEMBER where Web_ID='{$_POST['member_id']}' limit 1");

    $key1 = date('ymd')."|{$_SERVER['REMOTE_ADDR']}";
    
   if(PHP_VERSION >= '5.4.0') {
        if (NC_STRING_ENCRYPT_FUNCTION == 'create_hash') {
            $ty_password = get_encrypt_string($_POST['member_pwd']);
        } else {
            $ty_password = sql_password($_POST['member_pwd']);
        }
    } else {
        $ty_password = sql_password($_POST['member_pwd']);
    }
    
    if ($mb && $mb['Web_ID'] == $ty_password) {
        sql_fetch("delete from TB_Login_Count where Web_ID='{$mb['Web_ID']}' and po_rel_table='@login_check' and po_rel_action='{$key1}'");
    }
    else if ($mb && $mb['Web_Pw'] != $ty_password) {
        $row = sql_fetch("select count(*) as cnt from TB_Login_Count where Web_ID='{$mb['Web_ID']}' and po_rel_table='@login_check' and po_rel_action='{$key1}'");
        if ($row['cnt'] > $max_limit_out) {
            //10분후 로그인 횟수 초기화 

            exit;
        }
        // 로그인 카운트 데이타 생성
        $sql = "
            insert into TB_Login_Count set 
            Web_ID = '{$mb['Web_ID']}',
            Lo_Datetime = '{$nc['time_ymdhis']}',
            Lo_Content = '".addslashes("로그인시도:{$_SERVER['REMOTE_ADDR']} {$_POST['mb_password']} {$_SERVER['HTTP_USER_AGENT']}")."',
            po_rel_table = '@login_check',
            po_rel_id = '{$mb['Web_ID']}',
            po_rel_action = '{$key1}' "
        ;
        sql_query($sql);
        //접근이 너무 많음 차단함..
        if ($row['cnt'] > $max_limit_warn) {
         
            // 본인에게 문자발송
      
            // 관리자에게 문자발송
          
            alert("로그인 실패 횟수를 초과했습니다. 다음날 로그인을 시도해주세요.  ({$row['cnt']}/{$max_limit_warn})");
            exit;
        }
    }
}
?>
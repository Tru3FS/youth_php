<?php
if(!defined('_SAMSUNG_')) exit; // 개별 페이지 접근 불가

function get_real_client_ip(){

    $real_ip = $_SERVER['REMOTE_ADDR'];

    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/', $_SERVER['HTTP_X_FORWARDED_FOR']) ){
        $real_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return preg_replace('/[^0-9.]/', '', $real_ip);
}

function alert($msg, $move='back', $myname='')
{
	if(!$msg) $msg = '올바른 방법으로 이용해 주십시오.';

	switch($move)
	{
		case "back" :
			$url = "history.go(-1);void(1);";
			break;
		case "close" :
			$url = "window.close();";
			break;
		case "parent" :
			$url = "parent.document.location.reload();";
			break;
		case "replace" :
			$url = "opener.document.location.reload();window.close();";
			break;
		case "no" :
			$url = "";
			break;
		case "shash" :
			$url = "location.hash='{$myname}';";
			break;
		case "thash" :
			$url  = "opener.document.location.reload();";
			$url .= "opener.document.location.hash='{$myname}';";
			$url .= "window.close();";
			break;
		default :
			$url = "location.href='{$move}'";
			break;
	}

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">";
	echo "<script type=\"text/javascript\">alert(\"{$msg}\");{$url}</script>";
	exit;
}

function sel_count($table, $where)
{
	$row = sql_fetch("select count(*) as cnt from $table $where ");
	return (int)$row['cnt'];
}


// 날짜를 select 박스 형식으로 얻는다
function date_select($date, $name="", $date_y, $date_m, $date_d)
{
	$s = "";
	if(substr($date, 0, 4) == "0000") {
		$date = NC_TIME_YMDHIS;
	}
	preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", $date, $m);

	// 년
	$s .= "<select name='{$name}_y'>";
	$s .= "<option value='0000'>선택";
	for($i=$m[0]-3; $i<=$m[0]+3; $i++) {
		$s .= "<option value='$i'";
		if($date_y == $i) {
			$s .= " selected";
		}
		$s .= ">$i";
	}
	$s .= "</select>년 \n";

	// 월
	$s .= "<select name='{$name}_m'>";
	$s .= "<option value='00'>선택";
	for($i=1; $i<=12; $i++) {
		$ms = sprintf('%02d',$i);
		$s .= "<option value='$ms'";
		if($date_m == $ms) {
			$s .= " selected";
		}
		$s .= ">$ms";
	}
	$s .= "</select>월 \n";

	// 일
	$s .= "<select name='{$name}_d'>";
	$s .= "<option value='00'>선택";
	for($i=1; $i<=31; $i++) {
		$ds = sprintf('%02d',$i);
		$s .= "<option value='$ds'";
		if($date_d == $ds) {
			$s .= " selected";
		}
		$s .= ">$ds";
	}
	$s .= "</select>일 \n";

	return $s;
}

// 계좌정보를 select 박스 형식으로 얻는다
function get_bank_account($name, $selected='')
{
	global $default;

	$str  = '<select id="'.$name.'" name="'.$name.'">'.PHP_EOL;
	$str .= '<option value="">선택하십시오</option>'.PHP_EOL;

	$bank = unserialize($default['de_bank_account']);
	for($i=0; $i<5; $i++) {
		$bank_account = $bank[$i]['name'].' '.$bank[$i]['account'].' '.$bank[$i]['holder'];
		if(trim($bank_account)) {
			$str .= option_selected($bank_account, $selected, $bank_account);
		}
	}
	$str .= '</select>'.PHP_EOL;

	return $str;
}


// 계좌정보를 select 박스 형식으로 얻는다
function get_bank_account2($name, $selected='')
{
	global $default;

	$str  = '<select id="'.$name.'" name="'.$name.'" class="tune"  tabindex="-1">'.PHP_EOL;
	$str .= '<option value="">선택하십시오</option>'.PHP_EOL;

	$bank = unserialize($default['de_bank_account']);
	for($i=0; $i<5; $i++) {
		$bank_account = $bank[$i]['name'].' '.$bank[$i]['account'].' '.$bank[$i]['holder'];
		if(trim($bank_account)) {
			$str .= option_selected($bank_account, $selected, $bank_account);
		}
	}
	$str .= '</select>'.PHP_EOL;

	return $str;
}

// 날짜검색
function get_search_date($fr_date, $to_date, $fr_val, $to_val, $is_last=true)
{
	$input_end = ' class="frm_input w80" maxlength="10">'.PHP_EOL;
	$js = " onclick=\"search_date('{$fr_date}','{$to_date}',this.value);\"";

	$frm = array();
	$frm[] = '<label for="'.$fr_date.'" class="sound_only">시작일</label>'.PHP_EOL;
	$frm[] = '<input type="text" name="'.$fr_date.'" value="'.$fr_val.'" id="'.$fr_date.'"'.$input_end;
	$frm[] = ' ~ '.PHP_EOL;
	$frm[] = '<label for="'.$to_date.'" class="sound_only">종료일</label>'.PHP_EOL;
	$frm[] = '<input type="text" name="'.$to_date.'" value="'.$to_val.'" id="'.$to_date.'"'.$input_end;
	$frm[] = '<span class="btn_group">';
	$frm[] = '<input type="button"'.$js.' class="btn_small white" value="오늘">';
	$frm[] = '<input type="button"'.$js.' class="btn_small white" value="어제">';
	$frm[] = '<input type="button"'.$js.' class="btn_small white" value="일주일">';
	$frm[] = '<input type="button"'.$js.' class="btn_small white" value="지난달">';
	$frm[] = '<input type="button"'.$js.' class="btn_small white" value="1개월">';
	$frm[] = '<input type="button"'.$js.' class="btn_small white" value="3개월">';
	if($is_last) $frm[] = '<input type="button"'.$js.' class="btn_small white" value="전체">';
	$frm[] = '</span>';

	return implode('', $frm);
}

// input vars 체크
function check_input_vars()
{
    $max_input_vars = ini_get('max_input_vars');

    if($max_input_vars) {
        $post_vars = count($_POST, COUNT_RECURSIVE);
        $get_vars = count($_GET, COUNT_RECURSIVE);
        $cookie_vars = count($_COOKIE, COUNT_RECURSIVE);

        $input_vars = $post_vars + $get_vars + $cookie_vars;

        if($input_vars > $max_input_vars) {
            alert('폼에서 전송된 변수의 개수가 max_input_vars 값보다 큽니다.\\n전송된 값중 일부는 유실되어 DB에 기록될 수 있습니다.\\n\\n문제를 해결하기 위해서는 서버 php.ini의 max_input_vars 값을 변경하십시오.');
        }
    }
}

// 문자열 암복호화
class str_encrypt
{
    var $salt;
    var $lenght;

    function __construct($salt='')
    {
        if(!$salt)
            $this->salt = md5(preg_replace('/[^0-9A-Za-z]/', substr(NC_MYSQL_USER, -1), NC_MYSQL_PASSWORD));
        else
            $this->salt = $salt;

        $this->length = strlen($this->salt);
    }

    function encrypt($str)
    {
        $length = strlen($str);
        $result = '';

        for($i=0; $i<$length; $i++) {
            $char    = substr($str, $i, 1);
            $keychar = substr($this->salt, ($i % $this->length) - 1, 1);
            $char    = chr(ord($char) + ord($keychar));
            $result .= $char;
        }

        return base64_encode($result);
    }

    function decrypt($str) {
        $result = '';
        $str    = base64_decode($str);
        $length = strlen($str);

        for($i=0; $i<$length; $i++) {
            $char    = substr($str, $i, 1);
            $keychar = substr($this->salt, ($i % $this->length) - 1, 1);
            $char    = chr(ord($char) - ord($keychar));
            $result .= $char;
        }

        return $result;
    }
}



function sql_affected_rows($link=null)
{
    global $tb;
    if(!$link)
        $link = $tb['connect_db'];
    if(function_exists('mysqli_affected_rows') && NC_MYSQLI_USE)
        return mysqli_affected_rows($link);
    else
        return mysql_affected_rows($link);
}








?>
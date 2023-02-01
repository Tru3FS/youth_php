<?php
if(!defined('_SAMSUNG_')) exit;

function get_login_oauth($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/login_with_" + type + ".php";'.PHP_EOL;
		echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		echo 'window.open(url,type,opt);'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
					$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
					break;
				case 'naver':
					$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
					break;
				case 'kakao':
					$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					break;
			}
		} else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}



function get_login_oauth_mo($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/ologin_with_" + type + ".php";'.PHP_EOL;
		//echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		//echo 'window.open(url,type,opt);'.PHP_EOL;
		echo 'location.href=url;'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
				 $str = '<li class="sns_login_item sns_login_facebook"><a class="js-btn-facebook-login" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
					break;
				case 'naver':
				   $str = '<li class="sns_login_item sns_login_naver"><a class="js-btn-naver-login" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
					break;
				case 'kakao':
					$str = '<li class="sns_login_item sns_login_kakao"><a class="js-btn-kakao-login" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					break;
			}
		} else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}






function get_login_oauth2($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/login_with_" + type + ".php";'.PHP_EOL;
		echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		echo 'window.open(url,type,opt);'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
				 $str = '<li class="sns_login_item sns_login_facebook"><a class="js-btn-facebook-login" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
					break;
				case 'naver':
				   $str = '<li class="sns_login_item sns_login_naver"><a class="js-btn-naver-login" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
					break;
				case 'kakao':
					$str = '<li class="sns_login_item sns_login_kakao"><a class="js-btn-kakao-login" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					break;
			}
		} else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}


function get_login_oauth2_mo($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/mlogin_with_" + type + ".php";'.PHP_EOL;
		//echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		//echo 'window.open(url,type,opt);'.PHP_EOL;
		echo 'location.href=url;'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
				 $str = '<li class="sns_join_item sns_join_facebook"><a class="sns-login fa js-btn-sns-connect btn" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
					break;
				case 'naver':
				 
				   $str = '<li class="sns_join_item sns_join_naver"><a class="sns-login na js-btn-sns-connect btn" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
					break;
				case 'kakao':
					$str = '<li class="sns_join_item sns_join_kakao"><a class="sns-login ka js-btn-sns-connect btn" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					break;
			}
		} else if($img == '2') { // Link
			switch($type) {
				case 'facebook':
				 $str = '<li class="sns_login_item sns_login_facebook"><a class="js-btn-facebook-login" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
					break;
				case 'naver':
				   $str = '<li class="sns_login_item sns_login_naver"><a class="js-btn-naver-login" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
					break;
				case 'kakao':
					$str = '<li class="sns_login_item sns_login_kakao"><a class="js-btn-kakao-login" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					break;
			}
		}else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}





function get_login_oauth3($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/loginx_with_" + type + ".php";'.PHP_EOL;
		echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		echo 'window.open(url,type,opt);'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
				 $str = '<li class="sns_login_item sns_login_facebook"><a class="js-btn-facebook-login" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
					break;
				case 'naver':
				   $str = '<li class="sns_login_item sns_login_naver"><a class="js-btn-naver-login" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
					break;
				case 'kakao':
					$str = '<li class="sns_login_item sns_login_kakao"><a class="js-btn-kakao-login" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					break;
			}
		} else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}



function get_login_oauth3_mo($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/mloginx_with_" + type + ".php";'.PHP_EOL;
		//echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		//echo 'window.open(url,type,opt);'.PHP_EOL;
		echo 'location.href=url;'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
				 $str = '<li class="sns_join_item sns_join_facebook"><a class="sns-login fa js-btn-sns-connect btn" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
					break;
				case 'naver':
				 
				   $str = '<li class="sns_join_item sns_join_naver"><a class="sns-login na js-btn-sns-connect btn" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
					break;
				case 'kakao':
					$str = '<li class="sns_join_item sns_join_kakao"><a class="sns-login ka js-btn-sns-connect btn" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					break;
			}
		} else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}




function get_login_oauth4($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/loginc_with_" + type + ".php";'.PHP_EOL;
		echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		echo 'window.open(url,type,opt);'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
				//$str = '<li class="sns_login_item sns_login_facebook"><a class="js-btn-facebook-login" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
				 $str=' <a class="hs_btn hs_icon_btn secondary hs_icon_check boarddwrite-save hs-btn-facebook-login" data-facebook-type="my_page_password" href="javascript:'.$str.'"><em>인증하기</em></a>'.PHP_EOL;
					break;
				case 'naver':
				 //$str = '<li class="sns_login_item sns_login_naver"><a class="js-btn-naver-login" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
				 $str=' <a class="hs_btn hs_icon_btn secondary hs_icon_check boarddwrite-save hs-btn-naver-login" data-naver-type="my_page_password" href="javascript:'.$str.'"><em>인증하기</em></a>'.PHP_EOL;
					break;
				case 'kakao':
					//$str = '<li class="sns_login_item sns_login_kakao"><a class="js-btn-kakao-login" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					 $str=' <a class="hs_btn hs_icon_btn secondary hs_icon_check boarddwrite-save hs-btn-kakao-login" data-kakao-type="my_page_password" href="javascript:'.$str.'"><em>인증하기</em></a>'.PHP_EOL;
					break;
			}
		} else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}



function get_login_oauth4_mo($type, $img='') {

	if(!$type) return;

	if(!defined('APMS_SNS_LOGIN_OAUTH')) {
		define('APMS_SNS_LOGIN_OAUTH', true);

		global $url, $urlencode;

		$return_url = (isset($url) && $url) ? $url : $urlencode;

		echo '<script>'.PHP_EOL;
		echo 'function login_oauth(type,ww,wh) {'.PHP_EOL;
		echo 'var url = "'.BV_PLUGIN_URL.'/login-oauth/mloginc_with_" + type + ".php";'.PHP_EOL;
		//echo 'var opt = "width=" + ww + ",height=" + wh + ",left=0,top=0,scrollbars=1,toolbars=no,resizable=yes";'.PHP_EOL;
		//echo 'window.open(url,type,opt);'.PHP_EOL;
		echo 'location.href=url;'.PHP_EOL;
		echo '}'.PHP_EOL;
		echo '</script>'.PHP_EOL;
		echo '<input type="hidden" name="slr_url" value="'.$return_url.'">'.PHP_EOL;
	}

	// Size
	switch($type) {
		case 'facebook'	: $ww = 1024; $wh = 640; break;
		case 'twitter'	: $ww = 600; $wh = 600; break;
		case 'google'	: $ww = 460; $wh = 640; break;
		case 'naver'	: $ww = 460; $wh = 517; break;
		case 'kakao'	: $ww = 480; $wh = 680;	break;
		default			: $ww = 600; $wh = 600; break;
	}

	$str = "login_oauth('".$type."','".$ww."','".$wh."');";
	if($img) {
		if($img == '1') { // Link
			switch($type) {
				case 'facebook':
				//$str = '<li class="sns_login_item sns_login_facebook"><a class="js-btn-facebook-login" href="javascript:'.$str.'">페이스북 아이디 로그인</a></li>'.PHP_EOL;	
				//$str = '<a href="javascript:'.$str.'" class="bt_face"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_face.png" alt="Sign in with '.$type.'"></span> 페이스북 로그인</a>'.PHP_EOL;
				 $str=' <a class="hs_btn hs_basic_btn primary js-btn-naver-login" data-facebook-type="my_page_password" href="javascript:'.$str.'"><em>인증하기</em></a>'.PHP_EOL;
					break;
				case 'naver':
				 //$str = '<li class="sns_login_item sns_login_naver"><a class="js-btn-naver-login" href="javascript:'.$str.'">네이버 아이디 로그인</a></li>'.PHP_EOL;
				//$str = '<a href="javascript:'.$str.'" class="bt_naver"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_naver.png" alt="Sign in with '.$type.'"></span> 네이버 로그인</a>'.PHP_EOL;
				 $str=' <a class="hs_btn hs_basic_btn primary js-btn-naver-login" data-naver-type="my_page_password" href="javascript:'.$str.'"><em>인증하기</em></a>'.PHP_EOL;
					break;
				case 'kakao':
					//$str = '<li class="sns_login_item sns_login_kakao"><a class="js-btn-kakao-login" href="javascript:'.$str.'">카카오톡 아이디 로그인</a></li>'.PHP_EOL;
					//$str = '<a href="javascript:'.$str.'" class="bt_kakao"><span class="bt_ic"><img src="'.BV_IMG_URL.'/ic_kakao.png" alt="Sign in with '.$type.'"></span> 카카오톡 로그인</a>'.PHP_EOL;
					 $str=' <a class="hs_btn hs_basic_btn primary js-btn-naver-login" data-kakao-type="my_page_password" href="javascript:'.$str.'"><em>인증하기</em></a>'.PHP_EOL;
					break;
			}
		} else {
			$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
		}
	} else {
		$img = BV_PLUGIN_URL.'/login-oauth/img/'.$type.'.png';
		$str = '<a href="javascript:'.$str.'"><img src="'.$img.'" alt="Sign in with '.$type.'"></a>'.PHP_EOL;
	}

    return $str;
}




?>
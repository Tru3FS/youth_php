<?php
include_once("./_common.php");


//$mypage='1';
//if(!$is_member) {
//	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
//}
$n_type="member_edit";
$page_info="member_edit";


$url = isset($_GET['url']) ? strip_tags($_GET['url']) : '';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
    if ($url)
        goto_url($url);
    else
        goto_url(NC_URL);
}



include_once("./_head.php");



include_once(NC_MYTHEME_PATH.'/m_edit_step_01.skin.php');


include_once("./_tail.php");
?>
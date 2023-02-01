<?php
include_once("./_common.php");


//$mypage='1';
if(!$is_member) {
	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
}
$n_type="privacy";
$page_info="mypage";


$url = isset($_GET['url']) ? strip_tags($_GET['url']) : '';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
//if ($is_member) {
//    if ($url)
//        goto_url($url);
//    else
//        goto_url(NC_URL);
//}

define('NC_EDITOR_LIB', NC_LIB_PATH."/editor.lib.php");
include_once(NC_EDITOR_LIB);




include_once(NC_EDITOR_LIB);
function daumeditor($id, $content, $is_dhtml_editor=true)
{
    global $config;
    $daumeditor_path = NC_PLUGIN_PATH.'/editor/daumeditor2';
    $daumeditor_url = NC_EDITOR_URL.'/daumeditor2';
    $html .= "\n<span class=\"sound_only\">웹 에디터 시작</span>";
    $html = '<link rel="stylesheet" href="'.$daumeditor_url.'/css/editor.css" type="text/css" charset="utf-8"/>
    <script src="'.$daumeditor_url.'/js/editor_loader.js" type="text/javascript" charset="utf-8"></script>';
    /*
    $html .= include_once('editor.php');
    $daumeditor_class = $is_dhtml_editor ? "daumeditor" : "";
    $html .= "\n<textarea id=\"$id\" name=\"$id\" class=\"$daumeditor_class\" maxlength=\"65536\" style=\"width:100%;height:300px\">$content</textarea>";
    */
    ob_start();
    include $daumeditor_path.'/editor.php';
    $html .= ob_get_contents();
    ob_end_clean();
    $html .= "\n<span class=\"sound_only\">웹 에디터 끝</span>";
    return $html;
}
$daum_html = daumeditor('g_content',$content);


include_once("./_head.php");



include_once(NC_MYTHEME_PATH.'/privacy.skin.php');


include_once("./_tail.php");
?>
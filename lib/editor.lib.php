<?php
if(!defined('_SAMSUNG_')) exit;

/*************************************************************************
**
**  에디터 관련 함수 모음
**
*************************************************************************/
function editor_html($id, $content, $is_dhtml_editor=true)
{
    static $js = true;

    $editor_url = NC_EDITOR_URL.'/smarteditor2';
     
	
	
	
	
	
    $html = "";
    $html .= "<span class=\"sound_only\">웹에디터 시작..</span>";
    if($is_dhtml_editor && $js) {
		//$html .="테스트";
        $html .= "\n".'<script src="'.$editor_url.'/js/service/HuskyEZCreator.js"></script>';
        $html .= "\n".'<script>var bv_editor_url = "'.$editor_url.'", oEditors = [], ed_nonce = "'.ft_nonce_create('smarteditor').'";</script>';
        $html .= "\n".'<script src="'.$editor_url.'/config.js"></script>';
        $js = false;
    }

    $smarteditor_class = $is_dhtml_editor ? "smarteditor2" : "";
    $html .= "\n<textarea id=\"$id\" name=\"$id\" class=\"$smarteditor_class jt_form_field\" maxlength=\"65536\" style=\"width:100%;height:503px\">$content</textarea>";
    $html .= "\n<span class=\"sound_only\">웹 에디터 끝.</span>";
    return $html;
}



function editor_html2($id, $content, $is_dhtml_editor=true)
{
    static $js = true;

    $editor_url = NC_EDITOR_URL.'/smarteditor2';

    $html = "";
    $html .= "<span class=\"sound_only\">웹에디터 시작</span>";
    if($is_dhtml_editor && $js) {
        $html .= "\n".'<script src="'.$editor_url.'/js/HuskyEZCreator.js"></script>';
        $html .= "\n".'<script>var tw_editor_url = "'.$editor_url.'", oEditors = [];</script>';
        $html .= "\n".'<script src="'.$editor_url.'/config.js"></script>';
        $js = false;
    }

    $smarteditor_class = $is_dhtml_editor ? "smarteditor2" : "";
    $html .= "\n<textarea id=\"$id\" name=\"$id\" class=\"$smarteditor_class jt_form_field\" maxlength=\"65536\" style=\"width:100%\">$content</textarea>";
    $html .= "\n<span class=\"sound_only\">웹 에디터 끝</span>";
    return $html;
}


// textarea 로 값을 넘긴다. javascript 반드시 필요
function get_editor_js($id, $is_dhtml_editor=true)
{
    if($is_dhtml_editor) {
        return "var {$id}_editor_data = oEditors.getById['{$id}'].getIR();\noEditors.getById['{$id}'].exec('UPDATE_CONTENTS_FIELD', []);\nif(jQuery.inArray(document.getElementById('{$id}').value.toLowerCase().replace(/^\s*|\s*$/g, ''), ['&nbsp;','<p>&nbsp;</p>','<p><br></p>','<div><br></div>','<p></p>','<br>','']) != -1){document.getElementById('{$id}').value='';}\n";
    } else {
        return "var {$id}_editor = document.getElementById('{$id}');\n";
    }
}

//  textarea 의 값이 비어 있는지 검사
function chk_editor_js($id, $is_dhtml_editor=true)
{
    if($is_dhtml_editor) {
        return "if(!{$id}_editor_data || jQuery.inArray({$id}_editor_data.toLowerCase(), ['&nbsp;','<p>&nbsp;</p>','<p><br></p>','<p></p>','<br>']) != -1) { alert(\"내용을 입력해 주십시오.\"); oEditors.getById['{$id}'].exec('FOCUS'); return false; }\n";

       alert("test");

    } else {
        return "if(!{$id}_editor.value) { alert(\"내용을 입력해 주십시오.\"); {$id}_editor.focus(); return false; }\n";
    }
}

if (!defined('FT_NONCE_UNIQUE_KEY'))
    define( 'FT_NONCE_UNIQUE_KEY' , sha1($_SERVER['SERVER_SOFTWARE'].NC_MYSQL_USER.session_id().NC_TABLE_PREFIX) );

if (!defined('FT_NONCE_SESSION_KEY'))
    define( 'FT_NONCE_SESSION_KEY' , substr(md5(FT_NONCE_UNIQUE_KEY), 5) );

if (!defined('FT_NONCE_DURATION'))
    define( 'FT_NONCE_DURATION' , 60 * 60 ); // 300 makes link or form good for 5 minutes from time of generation,  300은 5분간 유효, 60 * 60 은 1시간

if (!defined('FT_NONCE_KEY'))
    define( 'FT_NONCE_KEY' , '_nonce' );

// This method creates a key / value pair for a url string
if(!function_exists('ft_nonce_create_query_string')){
    function ft_nonce_create_query_string( $action = '' , $user = '' ){
        return FT_NONCE_KEY."=".ft_nonce_create( $action , $user );
    }
}

if(!function_exists('ft_get_secret_key')){
    function ft_get_secret_key($secret){
        return md5(FT_NONCE_UNIQUE_KEY.$secret);
    }
}

// This method creates an nonce. It should be called by one of the previous two functions.
if(!function_exists('ft_nonce_create')){
    function ft_nonce_create( $action = '',$user='', $timeoutSeconds=FT_NONCE_DURATION ){

        $secret = ft_get_secret_key($action.$user);

        set_session('token_'.FT_NONCE_SESSION_KEY, $secret);

		$salt = ft_nonce_generate_hash();
		$time = time();
		$maxTime = $time + $timeoutSeconds;
		$nonce = $salt . "|" . $maxTime . "|" . sha1( $salt . $secret . $maxTime );
		return $nonce;

    }
}

// This method validates an nonce
if(!function_exists('ft_nonce_is_valid')){
    function ft_nonce_is_valid( $nonce, $action = '', $user='' ){

        $secret = ft_get_secret_key($action.$user);

        $token = get_session('token_'.FT_NONCE_SESSION_KEY);

        if ($secret != $token){
            return false;
        }

		if (is_string($nonce) == false) {
			return false;
		}
		$a = explode('|', $nonce);
		if (count($a) != 3) {
			return false;
		}
		$salt = $a[0];
		$maxTime = intval($a[1]);
		$hash = $a[2];
		$back = sha1( $salt . $secret . $maxTime );
		if ($back != $hash) {
			return false;
		}
		if (time() > $maxTime) {
			return false;
		}
		return true;
    }
}

// This method generates the nonce timestamp
if(!function_exists('ft_nonce_generate_hash')){
    function ft_nonce_generate_hash(){
		$length = 10;
		$chars='1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
		$ll = strlen($chars)-1;
		$o = '';
		while (strlen($o) < $length) {
			$o .= $chars[ rand(0, $ll) ];
		}
		return $o;
    }
}
?>
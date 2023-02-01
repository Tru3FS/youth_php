<?php
/********************
    ��� ����
********************/

define('NC_VERSION', '��û�� V2');

if(defined('_PURENESS_')) return;



// �� ����� ���ǵ��� ������ ������ ���� �������� ������ ����� �� ����
define('_SAMSUNG_', true);





if(PHP_VERSION >= '5.1.0') {
    //if(function_exists("date_default_timezone_set")) date_default_timezone_set("Asia/Seoul");
    date_default_timezone_set("Asia/Seoul");
}




/********************
    ��� ���
********************/

/*
���ȼ��� ������
ȸ������, �۾��⿡ ���Ǵ� https �� ���۵Ǵ� �ּҸ� ���մϴ�.
��Ʈ�� �ִٸ� ������ �ڿ� :443 �� ���� �Է��ϼ���.
���ȼ����ּҰ� ���ٸ� �������� �νø� �Ǹ� ���ȼ����ּ� �ڿ� / �� ������ �ʽ��ϴ�.
�Է¿�) https://www.domain.com:443
*/

/*
���� urlencode ������ ����� ������ �Է�
*/

/*
define('NC_DOMAIN', 'https://'.$_SERVER['HTTP_HOST']); 
define('NC_HTTPS_DOMAIN', 'https://'.$_SERVER['HTTP_HOST']);
define('NC_COOKIE_DOMAIN',  '.'.$_SERVER['HTTP_HOST']);
*/

define('NC_DOMAIN', '');
define('NC_NDOMAIN', '');
define('NC_HTTPS_DOMAIN', '');
define('NC_NDOMAINX', '');

define('baseURL', '');
define('baseSSL', '');


/*
www.sample.co.kr �� sample.co.kr �������� ���� �ٸ� ���������� �ν��մϴ�. ��Ű�� �����Ϸ��� .sample.co.kr �� ���� �Է��ϼ���.
�̰��� �Է��� ���ٸ� www ���� �����ΰ� �׷��� ���� �������� ��Ű�� �������� �����Ƿ� �α����� Ǯ�� �� �ֽ��ϴ�.
*/
define('NC_COOKIE_DOMAIN',  '');
define('NC_DBCONFIG_FILE',  'dbconfig.php');

define('NC_ADMIN_DIR',      'admin');
define('NC_BBS_DIR',        'bbs');
define('NC_CSS_DIR',        's_css');
define('NC_DATA_DIR',       'data');
define('NC_EXTEND_DIR',     'extend');
define('NC_IMG_DIR',        's_img');
define('NC_JS_DIR',         's_js');
define('NC_LIB_DIR',        'lib');
define('NC_MOBILE_DIR',     'm');
define('NC_MYPAGE_DIR',     'mypage');
define('NC_MEMBER_DIR',     's_member');
define('NC_PLUGIN_DIR',     'plugin');
define('NC_SHOP_DIR',       'dobong');
define('NC_RENT_DIR',       'rent');
define('NC_LECTURE_DIR',    'lecture');
define('NC_THEME_DIR',		'theme');
define('NC_EDITOR_DIR',     'editor');
define('NC_LGXPAY_DIR',     'lgxpay');
define('NC_PHPMAILER_DIR',  'PHPMailer');
define('NC_SESSION_DIR',    'session');
define('NC_OKNAME_DIR',     'okname');
define('NC_KCPCERT_DIR',    'kcpcert');
define('NC_GUIDE_DIR',       'guide');
define('NC_UTIL_DIR',       'util');
define('NC_CENTER_DIR',       's_center');
define('NC_NICE_DIR',       'nice');


// URL �� �������󿡼��� ��� (���������� ������)
if(NC_DOMAIN) {
    define('NC_URL', NC_DOMAIN);
} else {
    if(isset($nc_path['url']))
        define('NC_URL', $nc_path['url']);
    else
        define('NC_URL', '');
}

if(isset($nc_path['path'])) {
    define('NC_PATH', $nc_path['path']);
} else {
    define('NC_PATH', '');
}





define('NC_ADMIN_URL',      NC_URL.'/'.NC_ADMIN_DIR);
define('NC_BBS_URL',        NC_URL.'/'.NC_BBS_DIR);
define('NC_CSS_URL',        NC_URL.'/'.NC_CSS_DIR);
define('NC_DATA_URL',       NC_URL.'/'.NC_DATA_DIR);
define('NC_IMG_URL',        NC_URL.'/'.NC_IMG_DIR);
define('NC_JS_URL',         NC_URL.'/'.NC_JS_DIR);
define('NC_SHOP_URL',       NC_URL.'/'.NC_SHOP_DIR);
define('NC_LIB_URL',        NC_URL.'/'.NC_LIB_DIR);
define('NC_PLUGIN_URL',     NC_URL.'/'.NC_PLUGIN_DIR);
define('NC_MYPAGE_URL',     NC_URL.'/'.NC_MYPAGE_DIR);
define('NC_MEMBER_URL',     NC_URL.'/'.NC_MEMBER_DIR);
define('NC_EDITOR_URL',     NC_PLUGIN_URL.'/'.NC_EDITOR_DIR);
define('NC_LGXPAY_URL',     NC_PLUGIN_URL.'/'.NC_LGXPAY_DIR);
define('NC_OKNAME_URL',     NC_PLUGIN_URL.'/'.NC_OKNAME_DIR);
define('NC_KCPCERT_URL',    NC_PLUGIN_URL.'/'.NC_KCPCERT_DIR);
define('NC_GUIDE_URL',     NC_URL.'/'.NC_GUIDE_DIR);
define('NC_UTIL_URL',     NC_URL.'/'.NC_UTIL_DIR);
define('NC_CENTER_URL',     NC_URL.'/'.NC_CENTER_DIR);

// PATH �� �����󿡼��� ������
define('NC_ADMIN_PATH',     NC_PATH.'/'.NC_ADMIN_DIR);
define('NC_BBS_PATH',       NC_PATH.'/'.NC_BBS_DIR);
define('NC_DATA_PATH',      NC_PATH.'/'.NC_DATA_DIR);
define('NC_EXTEND_PATH',    NC_PATH.'/'.NC_EXTEND_DIR);
define('NC_LIB_PATH',       NC_PATH.'/'.NC_LIB_DIR);
define('NC_PLUGIN_PATH',    NC_PATH.'/'.NC_PLUGIN_DIR);
define('NC_SHOP_PATH',      NC_PATH.'/'.NC_SHOP_DIR);
define('NC_MYPAGE_PATH',    NC_PATH.'/'.NC_MYPAGE_DIR);
define('NC_SESSION_PATH',   NC_DATA_PATH.'/'.NC_SESSION_DIR);
define('NC_EDITOR_PATH',    NC_PLUGIN_PATH.'/'.NC_EDITOR_DIR);
define('NC_PHPMAILER_PATH', NC_PLUGIN_PATH.'/'.NC_PHPMAILER_DIR);
define('NC_LGXPAY_PATH',    NC_PLUGIN_PATH.'/'.NC_LGXPAY_DIR);
define('NC_OKNAME_PATH',    NC_PLUGIN_PATH.'/'.NC_OKNAME_DIR);
define('NC_KCPCERT_PATH',   NC_PLUGIN_PATH.'/'.NC_KCPCERT_DIR);
define('NC_GUIDE_PATH',     NC_PATH.'/'.NC_GUIDE_DIR);
define('NC_MEMBER_PATH',     NC_PATH.'/'.NC_MEMBER_DIR);
define('NC_CENTER_PATH',     NC_PATH.'/'.NC_CENTER_DIR);

define('NC_RENT_URL',       NC_URL.'/'.NC_RENT_DIR);
define('NC_LECTURE_URL',       NC_URL.'/'.NC_LECTURE_DIR);

define('NC_RENT_PATH',       NC_PATH.'/'.NC_RENT_DIR);
define('NC_LECTURE_PATH',       NC_PATH.'/'.NC_LECTURE_DIR);

define('NC_NICE_URL',       NC_PLUGIN_URL.'/'.NC_NICE_DIR);
define('NC_NICE_PATH',      NC_PLUGIN_PATH.'/'.NC_NICE_DIR);

// ����ϰ�� ���
define('NC_MPATH',			NC_PATH.'/'.NC_MOBILE_DIR);
define('NC_MURL',			NC_URL.'/'.NC_MOBILE_DIR);
define('NC_MBBS_PATH',		NC_MPATH.'/'.NC_BBS_DIR);
define('NC_MBBS_URL',		NC_MURL.'/'.NC_BBS_DIR);
define('NC_MCSS_PATH',		NC_MPATH.'/'.NC_CSS_DIR);
define('NC_MCSS_URL',		NC_MURL.'/'.NC_CSS_DIR);
define('NC_MIMG_PATH',		NC_MPATH.'/'.NC_IMG_DIR);
define('NC_MIMG_URL',		NC_MURL.'/'.NC_IMG_DIR);
define('NC_MJS_PATH',		NC_MPATH.'/'.NC_JS_DIR);
define('NC_MJS_URL',		NC_MURL.'/'.NC_JS_DIR);
define('NC_MSHOP_PATH',		NC_MPATH.'/'.NC_SHOP_DIR);
define('NC_MSHOP_URL',		NC_MURL.'/'.NC_SHOP_DIR);
//==============================================================================


//==============================================================================
// ����� ����
// pc ���� �� ����� ��⿡���� PCȭ�� ������
// mobile ���� �� PC������ �����ȭ�� ������
// both ���� �� ���� ��⿡ ���� ȭ�� ������
//------------------------------------------------------------------------------
define('NC_SET_DEVICE', 'both');
define('NC_USE_MOBILE', false); // ����� Ȩ�������� ������� ���� ��� false �� ����


/********************
    �ð� ���
********************/
// ������ �ð��� ���� ����ϴ� �ð��� Ʋ�� ��� �����ϼ���.
// �Ϸ�� 86400 ���Դϴ�. 1�ð��� 3600��
// 6�ð��� ���� ��� time() + (3600 * 6);
// 6�ð��� ���� ��� time() - (3600 * 6);
define('NC_SERVER_TIME',    time());
define('NC_TIME_YEAR',		date("Y", NC_SERVER_TIME));
define('NC_TIME_MONTH',		date("m", NC_SERVER_TIME));
define('NC_TIME_DAY',		date("d", NC_SERVER_TIME));
define('NC_TIME_YM',		date("Y-m", NC_SERVER_TIME));
define('NC_TIME_YMDHIS',	date("Y-m-d H:i:s", NC_SERVER_TIME));
define('NC_TIME_YHS',		date("YmdHis", NC_SERVER_TIME));
define('NC_TIME_YMD',		substr(NC_TIME_YMDHIS, 0, 10));
define('NC_TIME_HIS',		substr(NC_TIME_YMDHIS, 11, 8));

// �Է°� �˻� ��� (���ڸ� �����Ͻø� �ȵ˴ϴ�.)
define('NC_ALPHAUPPER',		1); // ���빮��
define('NC_ALPHALOWER',		2); // ���ҹ���
define('NC_ALPHABETIC',		4); // ����,�ҹ���
define('NC_NUMERIC',		8); // ����
define('NC_HANGUL',		   16); // �ѱ�
define('NC_SPACE',         32); // ����
define('NC_SPECIAL',       64); // Ư������

// �۹̼�
define('NC_DIR_PERMISSION',  0707); // ���丮 ������ �۹̼�
define('NC_FILE_PERMISSION', 0644); // ���� ������ �۹̼�

// ����� ���� ���� $_SERVER['HTTP_USER_AGENT']
define('NC_MOBILE_AGENT', 'phone|samsung|lgtel|mobile|[^A]skt|nokia|blackberry|android|sony');

// SMTP
// lib/mailer.lib.php ���� ���
define('NC_SMTP',      '127.0.0.1');
define('NC_SMTP_PORT', '25');

// �����ڵ� ���� �ּұݾ� ����
// ���� �ܾ��� ���� �ݾ׺��� ���� ���� �ֹ��� SMS �߼� ����
// define('NC_ICODE_COIN', 100);
/********************
    ��Ÿ ���
********************/

// ��ȣȭ �Լ� ����
// ����Ʈ � �� ������ �����ϸ� �α����� �ȵǴ� ���� ������ �߻��մϴ�.
define('NC_STRING_ENCRYPT_FUNCTION', 'sql_password');

// SQL ������ ǥ���� ������ ����
// ������ ǥ���Ϸ��� TRUE �� ����
define('NC_DISPLAY_SQL_ERROR', false);

// escape string ó�� �Լ� ����
// addslashes �� ���� ����
define('NC_ESCAPE_FUNCTION', 'sql_escape_string');

// sql_escape_string �Լ����� ���� ����
//define('NC_ESCAPE_PATTERN',  '/(and|or).*(union|select|insert|update|delete|from|where|limit|create|drop).*/i');
//define('NC_ESCAPE_REPLACE',  '');

// ����� jpg Quality ����
define('NC_THUMB_JPG_QUALITY', 90);

// ����� png Compress ����
define('NC_THUMB_PNG_COMPRESS', 5);

// MySQLi ��뿩�θ� �����մϴ�.
define('NC_MYSQLI_USE', true);

// �ɼ� ID Ư������ ���͸� ����
define('NC_OPTION_ID_FILTER', '/[\'\"\\\'\\\"]/');

// ���Թ����� ���� ��ȣȭ Ű��
define('NC_HASH_TOKEN', md5(NC_URL.NC_TIME_YMD.$_SERVER['REMOTE_ADDR']));

// ip ������ ����
/* 123.456.789.012 ip�� ���� ����� �����ϴ� �����
\\1 �� 123, \\2�� 456, \\3�� 789, \\4�� 012�� ���� �����ǹǷ�
ǥ�õǴ� �κ��� \\1 �� ���� ����Ͻø� �ǰ� ���� �κ��� ������
�ٸ� ���ڸ� �����ֽø� �˴ϴ�.
*/
define('NC_IP_DISPLAY', '\\1.��.\\3.\\4');

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {   //https ����϶� daum �ּ� js
    define('NC_POSTCODE_JS', '<script src="https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js"></script>');
} else {  //http ����϶� daum �ּ� js
    define('NC_POSTCODE_JS', '<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>');
}




?>
<?php
if(!defined('_SAMSUNG_')) exit; // 개별 페이지 접근 불가



// 마이크로 타임을 얻어 계산 형식으로 만듦
function get_microtime()
{
	list($usec, $sec) = explode(" ",microtime());
	return ((float)$usec + (float)$sec);
}

// 세션변수 생성
function set_session($session_name, $value)
{
	if(PHP_VERSION < '5.3.0')
		session_register($session_name);
	// PHP 버전별 차이를 없애기 위한 방법
	$$session_name = $_SESSION["$session_name"] = $value;
}

// 세션변수값 얻음
function get_session($session_name)
{
	return $_SESSION[$session_name];
}

// 쿠키변수 생성
function set_cookie($cookie_name, $value, $expire)
{
	//setcookie(md5($cookie_name), base64_encode($value), time() + $expire, '/', $_SERVER['HTTP_HOST'].'/Noble');
	setcookie(md5($cookie_name), base64_encode($value), time() + $expire, '/', $_SERVER['HTTP_HOST']);
}

// 쿠키변수값 얻음
function get_cookie($cookie_name)
{
    $cookie = md5($cookie_name);
    if (array_key_exists($cookie, $_COOKIE))
        return base64_decode($_COOKIE[$cookie]);
    else
        return "";

	//return base64_decode($_COOKIE[md5($cookie_name)]);
}

// 변수 또는 배열의 이름과 값을 얻어냄. print_r() 함수의 변형
function print_r2($var)
{
    ob_start();
    print_r($var);
    $str = ob_get_contents();
    ob_end_clean();
    $str = str_replace(" ", "&nbsp;", $str);
    echo nl2br("<span style='font-family:Tahoma, 굴림; font-size:9pt;'>$str</span>");
}

// 한페이지에 보여줄 행, 현재페이지, 총페이지수, URL
function get_paging($write_pages, $cur_page, $total_page, $url, $add="")
{
	if(!$cur_page) $cur_page = 1;
	if(!$total_page) $total_page = 1;
	if($total_page < 1) return '';

	$url = preg_replace('#&page=[0-9]*#', '', $url) . '&page=';

    $str = '';
	if($cur_page < 2) {
		$str .= '<span class="pg_start">처음</span>'.PHP_EOL;
	} else {
		$str .= '<a href="'.$url.'1'.$add.'" class="pg_page pg_start">처음</a>'.PHP_EOL;
	}

	$start_page = (((int)(($cur_page - 1 ) / $write_pages)) * $write_pages) + 1;
	$end_page = $start_page + $write_pages - 1;

	if($end_page >= $total_page) $end_page = $total_page;

	if($start_page > 1) {
		$str .= '<a href="'.$url.($start_page-1).$add.'" class="pg_page pg_prev">이전</a>'.PHP_EOL;
	} else {
		$str .= '<span class="pg_prev">이전</span>'.PHP_EOL;
	}

    if($total_page > 0) {
        for($k=$start_page;$k<=$end_page;$k++) {
            if($cur_page != $k) {
                $str .= '<a href="'.$url.$k.$add.'" class="pg_page">'.$k.'<span class="sound_only">페이지</span></a>'.PHP_EOL;
            } else {
                $str .= '<span class="sound_only">열린</span><strong class="pg_current">'.$k.'</strong><span class="sound_only">페이지</span>'.PHP_EOL;
			}
        }
    }

	if($total_page > $end_page) {
		$str .= '<a href="'.$url.($end_page+1).$add.'" class="pg_page pg_next">다음</a>'.PHP_EOL;
	} else {
		$str .= '<span class="pg_next">다음</span>'.PHP_EOL;
	}

	if($cur_page < $total_page) {
		$str .= '<a href="'.$url.$total_page.$add.'" class="pg_page pg_end">맨끝</a>'.PHP_EOL;
	} else {
		$str .= '<span class="pg_end">맨끝</span>'.PHP_EOL;
	}

    return "<nav class=\"pg_wrap\"><span class=\"pg\">{$str}</span></nav>";
}



// 한페이지에 보여줄 행, 현재페이지, 총페이지수, URL
function get_paging2($write_pages, $cur_page, $total_page, $url, $add="")
{
	if(!$cur_page) $cur_page = 1;
	if(!$total_page) $total_page = 1;
	if($total_page < 1) return '';

  


	$url = preg_replace('#&page=[0-9]*#', '', $url) . '&page=';

    $str = '';
	if($cur_page < 2) {
		$str .= '<li class="btn_page btn_page_first"><span aria-label="First"></span></li>'.PHP_EOL;
	} else {
		$str .= '<li class="btn_page btn_page_first"><span aria-label="First"><a href="'.$url.'1'.$add.'" class="pg_page pg_start"></a></span></li>'.PHP_EOL;
	}

	$start_page = (((int)(($cur_page - 1 ) / $write_pages)) * $write_pages) + 1;
	$end_page = $start_page + $write_pages - 1;

	if($end_page >= $total_page) $end_page = $total_page;

	if($start_page > 1) {
		$str .= '<li class="btn_page btn_page_prev"><span aria-label="Previous"><a href="'.$url.($start_page-1).$add.'" class="pg_page pg_prev"></a></span></li>'.PHP_EOL;
	} else {
		$str .= '<li class="btn_page btn_page_prev"><span aria-label="Previous"></span></li>'.PHP_EOL;
	}

    if($total_page > 0) {
        for($k=$start_page;$k<=$end_page;$k++) {
            if($cur_page != $k) {
                $str .= '<li><a href="'.$url.$k.$add.'">'.$k.'</a></li>'.PHP_EOL;
            } else {
                $str .= '<li class="on"><span>'.$k.'</span></li>'.PHP_EOL;
			}
        }
    }

	if($total_page > $end_page) {
		$str .= '<li class="btn_page btn_page_next"><span aria-label="Next"><a href="'.$url.($end_page+1).$add.'" class="pg_page pg_next"></a></span></li>'.PHP_EOL;
	} else {
		$str .= '<li class="btn_page btn_page_next"><span aria-label="Next"></span></li>'.PHP_EOL;
	}

	if($cur_page < $total_page) {
		$str .= '<li class="btn_page btn_page_last"><span aria-label="Last"><a href="'.$url.$total_page.$add.'" class="pg_page pg_end"></a></span></li>'.PHP_EOL;
	} else {
		$str .= '<li class="btn_page btn_page_last"><span aria-label="Last"></span></li>'.PHP_EOL;
	}

    return "<div class=\"pagination\"><ul>{$str}</ul></div>";
}


/*
<div class="ds_pagination">
 <span class="first p_num"></span>
<span class="prev p_num"></span>
<span class="act p_num" >1</span>
<a class="p_num" href="#!" >2</a>
<a class="p_num" href="#!" >3</a>
<a class="p_num" href="#!" >4</a>
<a class="p_num" href="#!" >5</a>
<a class="p_num" href="#!" >6</a>
<a class="p_num" href="#!" >7</a>
<a class="p_num" href="#!" >8</a>
<a class="p_num" href="#!" >9</a>
<a class="p_num" href="#!" >10</a>
<a class="next p_num" href="#!" ></a>
<a class="last p_num" href="#!" ></a>
</div>
*/

function get_paging_ca($write_pages, $cur_page, $total_page, $url, $add="")
{
	if(!$cur_page) $cur_page = 1;
	if(!$total_page) $total_page = 1;
	if($total_page < 1) return '';

  


	$url = preg_replace('#&page=[0-9]*#', '', $url) . '&page=';

    $str = '';
	if($cur_page < 2) {
		$str .= '<span class="first p_num"></span>'.PHP_EOL;
	} else {
		$str .= '<a href="'.$url.'1'.$add.'" class="first p_num"></a>'.PHP_EOL;
	}

	$start_page = (((int)(($cur_page - 1 ) / $write_pages)) * $write_pages) + 1;
	$end_page = $start_page + $write_pages - 1;

	if($end_page >= $total_page) $end_page = $total_page;

	if($start_page > 1) {
		$str .= '<a href="'.$url.($start_page-1).$add.'" class="prev p_num"></a>'.PHP_EOL;
	} else {
		$str .= '<span class="prev p_num"></span>'.PHP_EOL;
	}

    if($total_page > 0) {
        for($k=$start_page;$k<=$end_page;$k++) {
            if($cur_page != $k) {
                $str .= '<a class="p_num" href="'.$url.$k.$add.'">'.$k.'</a>'.PHP_EOL;
            } else {
                $str .= '<span class="act p_num" >'.$k.'</span>'.PHP_EOL;
			}
        }
    }

	if($total_page > $end_page) {
		$str .= '<a class="next p_num" href="'.$url.($end_page+1).$add.'"></a>'.PHP_EOL;
	} else {
		$str .= '<span class="next p_num" href="#!" ></span>'.PHP_EOL;
	}

	if($cur_page < $total_page) {
		$str .= '<a class="last p_num" href="'.$url.$total_page.$add.'" ></a>'.PHP_EOL;
	} else {
		$str .= '<span class="last p_num" ></span>'.PHP_EOL;
	}

    return "<div class=\"ds_pagination\">{$str}</div>";
}


function get_paging_ca2($write_pages, $cur_page, $total_page, $url, $add="")
{
	if(!$cur_page) $cur_page = 1;
	if(!$total_page) $total_page = 1;
	if($total_page < 1) return '';

  


	$url = preg_replace('#&page=[0-9]*#', '', $url) . '&page=';

    $str = '';
	if($cur_page < 2) {
		$str .= '<span class="first p_num"></span>'.PHP_EOL;
	} else {
		$str .= '<a href="'.$url.'1'.$add.'" class="first p_num" ></a>'.PHP_EOL;
	}

	$start_page = (((int)(($cur_page - 1 ) / $write_pages)) * $write_pages) + 1;
	$end_page = $start_page + $write_pages - 1;

	if($end_page >= $total_page) $end_page = $total_page;

	if($start_page > 1) {
		$str .= '<a href="'.$url.($start_page-1).$add.'" class="prev p_num"></a>'.PHP_EOL;
	} else {
		$str .= '<span class="prev p_num"></span>'.PHP_EOL;
	}

    if($total_page > 0) {
        for($k=$start_page;$k<=$end_page;$k++) {
            if($cur_page != $k) {
                $str .= '<a class="p_num" href="'.$url.$k.$add.'" data-value="'.$k.'">'.$k.'</a>'.PHP_EOL;
            } else {
                $str .= '<span class="act p_num" >'.$k.'</span>'.PHP_EOL;
			}
        }
    }

	if($total_page > $end_page) {
		$str .= '<a class="next p_num" href="'.$url.($end_page+1).$add.'"></a>'.PHP_EOL;
	} else {
		$str .= '<span class="next p_num" href="#!" ></span>'.PHP_EOL;
	}

	if($cur_page < $total_page) {
		$str .= '<a class="last p_num" href="'.$url.$total_page.$add.'" ></a>'.PHP_EOL;
	} else {
		$str .= '<span class="last p_num" ></span>'.PHP_EOL;
	}

    return "<div class=\"ds_pagination\">{$str}</div>";
}

// 모바일인지 체크
function is_mobile()
{
	return preg_match('/'.NC_MOBILE_AGENT.'/i', $_SERVER['HTTP_USER_AGENT']);
}

// 전화번호 정규식 0112223333을 011-222-3333 으로 변환
function replace_tel($obj)
{
	if(!$obj) return;

	$obj = preg_replace('/[^\d\n]+/', '', $obj);

	if(substr($obj,0,1) != "0" && strlen ($obj ) > 8) $obj = "0".$obj ;
		$telnum3 = substr( $obj, -4 );

	if(in_array(substr($obj, 0, 3), array('013','050','030')))
		$telnum1 = substr($obj, 0, 4);
	else if(substr($obj, 0, 2) == "01")
		$telnum1 = substr($obj, 0, 3);
	else if(substr($obj, 0, 2) == "02")
		$telnum1 = substr($obj, 0, 2);
	else if(substr($obj, 0, 1) == "0" )
		$telnum1 = substr($obj, 0, 3);

	$telnum2 = substr($obj, strlen($telnum1), -4);
	if(!$telnum1) return $telnum2 . "-" . $telnum3 ;
	else return $telnum1 . "-" . $telnum2 . "-" . $telnum3 ;
}

// unescape nl 얻기
function conv_unescape_nl($str)
{
    $search = array('\\r', '\r', '\\n', '\n');
    $replace = array('', '', "\n", "\n");

    return str_replace($search, $replace, $str);
}


// 시간이 비어 있는지 검사
function is_null_time($datetime)
{
    // 공란 0 : - 제거
    $datetime = preg_replace("/[ 0:-]/", "", $datetime);
    if ($datetime == "")
        return true;
    else
        return false;
}

// 경고메세지 출력후 창을 닫음
function alert_close($msg)
{
   if(!$msg) $msg = '올바른 방법으로 이용해 주십시오.';

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">";
	echo "<script type='text/javascript'>alert(\"{$msg}\");window.close();</script>";exit;
}

// 메타태그를 이용한 URL 이동
// header("location:URL") 을 대체
function goto_url($url)
{
	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">";
	echo "<script type='text/javascript'>location.replace('{$url}');</script>";
	exit;
}


// 글자수를 자루는 함수.
function cut_str($str, $len, $suffix="…")
{
    $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    $str_len = count($arr_str);

    if($str_len >= $len) {
        $slice_str = array_slice($arr_str, 0, $len);
        $str = join("", $slice_str);

        return $str . ($str_len > $len ? $suffix : '');
    } else {
        $str = join("", $arr_str);
        return $str;
    }
}

// 문자열이 한글, 영문, 숫자, 특수문자로 구성되어 있는지 검사
function check_string($str, $options)
{
    $s = '';
    for($i=0;$i<strlen($str);$i++) {
        $c = $str[$i];
        $oc = ord($c);

        // 한글
        if($oc >= 0xA0 && $oc <= 0xFF) {
            if($options & NC_HANGUL) {
                $s .= $c . $str[$i+1] . $str[$i+2];
            }
            $i+=2;
        }
        // 숫자
        else if($oc >= 0x30 && $oc <= 0x39) {
            if($options & NC_NUMERIC) {
                $s .= $c;
            }
        }
        // 영대문자
        else if($oc >= 0x41 && $oc <= 0x5A) {
            if(($options & NC_ALPHABETIC) || ($options & NC_ALPHAUPPER)) {
                $s .= $c;
            }
        }
        // 영소문자
        else if($oc >= 0x61 && $oc <= 0x7A) {
            if(($options & NC_ALPHABETIC) || ($options & NC_ALPHALOWER)) {
                $s .= $c;
            }
        }
        // 공백
        else if($oc == 0x20) {
            if($options & NC_SPACE) {
                $s .= $c;
            }
        }
        else {
            if($options & NC_SPECIAL) {
                $s .= $c;
            }
        }
    }

    // 넘어온 값과 비교하여 같으면 참, 틀리면 거짓
    return ($str == $s);
}

// url에 http:// 를 붙인다
function set_http($url)
{
    if(!trim($url)) return;

    if(!preg_match("/^(http|https|ftp|telnet|news|mms)\:\/\//i", $url))
        $url = "http://" . $url;

    return $url;
}

// 불법접근을 막도록 토큰을 생성하면서 토큰값을 리턴
function get_token()
{
	$token = md5(uniqid(rand(), true));
	set_session("ss_token", $token);

	return $token;
}

// POST로 넘어온 토큰과 세션에 저장된 토큰 비교
function check_token()
{
	set_session('ss_token', '');
	return true;
}

// 내용을 변환
function conv_content($content, $html, $filter=true)
{
    if($html)
    {
        $source = array();
        $target = array();

        $source[] = "//";
        $target[] = "";

        if($html == 2) { // 자동 줄바꿈
            $source[] = "/\n/";
            $target[] = "<br/>";
        }

        // 테이블 태그의 개수를 세어 테이블이 깨지지 않도록 한다.
        $table_begin_count = substr_count(strtolower($content), "<table");
        $table_end_count = substr_count(strtolower($content), "</table");
        for($i=$table_end_count; $i<$table_begin_count; $i++)
        {
            $content .= "</table>";
        }

        $content = preg_replace($source, $target, $content);

        if($filter)
            $content = html_purifier($content);
    }
    else // text 이면
    {
        // & 처리 : &amp; &nbsp; 등의 코드를 정상 출력함
        $content = html_symbol($content);

        // 공백 처리
		//$content = preg_replace("/  /", "&nbsp; ", $content);
		$content = str_replace("  ", "&nbsp; ", $content);
		$content = str_replace("\n ", "\n&nbsp;", $content);

        $content = get_text($content, 1);
        $content = url_auto_link($content);
    }

    return $content;
}

// http://htmlpurifier.org/
// Standards-Compliant HTML Filtering
// Safe  : HTML Purifier defeats XSS with an audited whitelist
// Clean : HTML Purifier ensures standards-compliant output
// Open  : HTML Purifier is open-source and highly customizable
function html_purifier($html)
{
    $f = file(NC_PLUGIN_PATH.'/htmlpurifier/safeiframe.txt');
    $domains = array();
    foreach($f as $domain){
        // 첫행이 # 이면 주석 처리
        if(!preg_match("/^#/", $domain)) {
            $domain = trim($domain);
            if($domain)
                array_push($domains, $domain);
        }
    }
    // 내 도메인도 추가
    array_push($domains, $_SERVER['HTTP_HOST'].'/');
    $safeiframe = implode('|', $domains);

    include_once(NC_PLUGIN_PATH.'/htmlpurifier/HTMLPurifier.standalone.php');
    $config = HTMLPurifier_Config::createDefault();
    // data/cache 디렉토리에 CSS, HTML, URI 디렉토리 등을 만든다.
    $config->set('Cache.SerializerPath', NC_DATA_PATH.'/cache');
    $config->set('HTML.SafeEmbed', false);
    $config->set('HTML.SafeObject', false);
    $config->set('Output.FlashCompat', false);
    $config->set('HTML.SafeIframe', true);
    $config->set('URI.SafeIframeRegexp','%^(https?:)?//('.$safeiframe.')%');
    $config->set('Attr.AllowedFrameTargets', array('_blank'));
    $purifier = new HTMLPurifier($config);
    return $purifier->purify($html);
}

// 악성태그 변환
function bad_tag_convert($code)
{
	//return preg_replace("/\<([\/]?)(script|iframe)([^\>]*)\>/i", "&lt;$1$2$3&gt;", $code);
	// script 나 iframe 태그를 막지 않는 경우 필터링이 되도록 수정
	return preg_replace("/\<([\/]?)(script|iframe|form)([^\>]*)\>?/i", "&lt;$1$2$3&gt;", $code);
}

// way.co.kr 의 wayboard 참고
function url_auto_link($str)
{
    $str = str_replace(array("&lt;", "&gt;", "&amp;", "&quot;", "&nbsp;", "&#039;"), array("\t_lt_\t", "\t_gt_\t", "&", "\"", "\t_nbsp_\t", "'"), $str);
    $str = preg_replace("/([^(href=\"?'?)|(src=\"?'?)]|\(|^)((http|https|ftp|telnet|news|mms):\/\/[a-zA-Z0-9\.-]+\.[가-힣\xA1-\xFEa-zA-Z0-9\.:&#=_\?\/~\+%@;\-\|\,\(\)]+)/i", "\\1<A HREF=\"\\2\" TARGET=\"_blank\">\\2</A>", $str);
    $str = preg_replace("/(^|[\"'\s(])(www\.[^\"'\s()]+)/i", "\\1<A HREF=\"http://\\2\" TARGET=\"_blank\">\\2</A>", $str);
    $str = preg_replace("/[0-9a-z_-]+@[a-z0-9._-]{4,}/i", "<a href=\"mailto:\\0\">\\0</a>", $str);
    $str = str_replace(array("\t_nbsp_\t", "\t_lt_\t", "\t_gt_\t", "'"), array("&nbsp;", "&lt;", "&gt;", "&#039;"), $str);

    return $str;
}

// TEXT 형식으로 변환
function get_text($str, $html=0, $restore=false)
{
    $source[] = "<";
    $target[] = "&lt;";
    $source[] = ">";
    $target[] = "&gt;";
    $source[] = "\"";
    $target[] = "&#034;";
    $source[] = "\'";
    $target[] = "&#039;";

    if($restore)
        $str = str_replace($target, $source, $str);

    // 3.31
    // TEXT 출력일 경우 &amp; &nbsp; 등의 코드를 정상으로 출력해 주기 위함
    if($html == 0) {
        $str = html_symbol($str);
    }

    if($html) {
        $source[] = "\n";
        $target[] = "<br/>";
    }

    return str_replace($source, $target, $str);
}

// 3.31
// HTML SYMBOL 변환
// &nbsp; &amp; &middot; 등을 정상으로 출력
function html_symbol($str)
{
    return preg_replace("/\&([a-z0-9]{1,20}|\#[0-9]{0,3});/i", "&#038;\\1;", $str);
}

function get_selected($field, $value)
{
	return ($field==$value) ? ' selected="selected"' : '';
}

function get_checked($field, $value)
{
	return ($field==$value) ? ' checked="checked"' : '';
}

function option_selected($value, $selected, $text='')
{
    if(!$text) $text = $value;
    if($value == $selected)
        return "<option value=\"$value\" selected=\"selected\">$text</option>\n";
    else
        return "<option value=\"$value\">$text</option>\n";
}

// 코드 : http://in2.php.net/manual/en/function.mb-check-encoding.php#95289
function is_utf8($str)
{
    $len = strlen($str);
    for($i = 0; $i < $len; $i++) {
        $c = ord($str[$i]);
        if ($c > 128) {
            if (($c > 247)) return false;
            elseif ($c > 239) $bytes = 4;
            elseif ($c > 223) $bytes = 3;
            elseif ($c > 191) $bytes = 2;
            else return false;
            if (($i + $bytes) > $len) return false;
            while ($bytes > 1) {
                $i++;
                $b = ord($str[$i]);
                if ($b < 128 || $b > 191) return false;
                $bytes--;
            }
        }
    }
    return true;
}

// UTF-8 문자열 자르기
// 출처 : https://www.google.co.kr/search?q=utf8_strcut&aq=f&oq=utf8_strcut&aqs=chrome.0.57j0l3.826j0&sourceid=chrome&ie=UTF-8
function utf8_strcut( $str, $size, $suffix='...' )
{
	$substr = substr( $str, 0, $size * 2 );
	$multi_size = preg_match_all( '/[\x80-\xff]/', $substr, $multi_chars );

	if( $multi_size > 0 )
		$size = $size + intval( $multi_size / 3 ) - 1;

	if( strlen( $str ) > $size ) {
		$str = substr( $str, 0, $size );
		$str = preg_replace( '/(([\x80-\xff]{3})*?)([\x80-\xff]{0,2})$/', '$1', $str );
		$str .= $suffix;
	}

	return $str;
}

// CHARSET 변경 : euc-kr -> utf-8
function iconv_utf8($str)
{
	return iconv('euc-kr', 'utf-8', $str);
}

// CHARSET 변경 : utf-8 -> euc-kr
function iconv_euckr($str)
{
	return iconv('utf-8', 'euc-kr', $str);
}

// 한글 요일
function get_yoil($date, $full=0)
{
	$arr_yoil = array ('일', '월', '화', '수', '목', '금', '토');

	$yoil = date("w", strtotime($date));
	$str = $arr_yoil[$yoil];
	if($full) {
		$str .= '요일';
	}
	return $str;
}

// 날짜형식 변환
function date_conv($date, $case=1)
{
	$date = conv_number($date);
    if($case == 1) { // 년-월-일 로 만들어줌
        $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $date);
    } else if($case == 2) { // 년월일 로 만들어줌
        $date = preg_replace("/-/", "", $date);
    } else if($case == 3) { // 년 월 일 로 만들어줌
        $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1년 \\2월 \\3일", $date);
    } else if($case == 4) { // 년.월.일 로 만들어줌
        $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1/\\2/\\3", $date);
    }

    return $date;
}

// rm -rf 옵션 : exec(), system() 함수를 사용할 수 없는 서버 또는 win32용 대체
// www.php.net 참고 : pal at degerstrom dot com
function rm_rf($file)
{
    if(file_exists($file)) {
        if(is_dir($file)) {
            $handle = opendir($file);
            while($filename = readdir($handle)) {
                if($filename != '.' && $filename != '..') {
                    rm_rf($file.'/'.$filename);
				}
            }
            closedir($handle);

            @chmod($file, NC_DIR_PERMISSION);
            @rmdir($file);
        } else {
            @chmod($file, NC_FILE_PERMISSION);
            @unlink($file);
        }
    }
}

// 동일한 host url 인지
function check_url_host($url, $msg='', $return_url=NC_URL)
{
    if(!$msg)
        $msg = 'url에 타 도메인을 지정할 수 없습니다.';

    $p = @parse_url($url);
    $host = preg_replace('/:[0-9]+$/', '', $_SERVER['HTTP_HOST']);

    if(stripos($url, 'http:') !== false) {
        if(!isset($p['scheme']) || !$p['scheme'] || !isset($p['host']) || !$p['host'])
            alert('url 정보가 올바르지 않습니다.', $return_url);
    }

    if((isset($p['scheme']) && $p['scheme']) || (isset($p['host']) && $p['host'])) {
        //if($p['host'].(isset($p['port']) ? ':'.$p['port'] : '') != $_SERVER['HTTP_HOST']) {
        if($p['host'] != $host) {
            echo '<script>'.PHP_EOL;
            echo 'alert("url에 타 도메인을 지정할 수 없습니다.");'.PHP_EOL;
            echo 'document.location.href = "'.$return_url.'";'.PHP_EOL;
            echo '</script>'.PHP_EOL;
            echo '<noscript>'.PHP_EOL;
            echo '<p>'.$msg.'</p>'.PHP_EOL;
            echo '<p><a href="'.$return_url.'">돌아가기</a></p>'.PHP_EOL;
            echo '</noscript>'.PHP_EOL;
            exit;
        }
    }
}

/*******************************************************************************
    유일한 키를 얻는다.

    결과 :

        년월일시분초00 ~ 년월일시분초99
        년(4) 월(2) 일(2) 시(2) 분(2) 초(2) 100분의1초(2)
        총 16자리이며 년도는 2자리로 끊어서 사용해도 됩니다.
        예) 2008062611570199 또는 08062611570199 (2100년까지만 유일키)

    사용하는 곳 :
    1. 주문번호 생성시에 사용한다.
    2. 기타 유일키가 필요한 곳에서 사용한다.
*******************************************************************************/

// 문자열 암호화
function get_encrypt_string($str)
{
    if(defined('NC_STRING_ENCRYPT_FUNCTION') && NC_STRING_ENCRYPT_FUNCTION) {
        $encrypt = call_user_func(NC_STRING_ENCRYPT_FUNCTION, $str);
    } else {
        $encrypt = sql_password($str);
    }

    return $encrypt;
}

function escape_trim($field)
{
    $str = call_user_func('addslashes', $field);
    return $str;
}

// XSS 관련 태그 제거
function clean_xss_tags($str)
{
    $str = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);

    return $str;
}

// date 형식 변환
function conv_date_format($format, $date, $add='')
{
    if($add)
        $timestamp = strtotime($add, strtotime($date));
    else
        $timestamp = strtotime($date);

    return date($format, $timestamp);
}


// XSS 관련 태그 제거
function clean_xss_tags_($str, $check_entities=0)
{
    $str_len = strlen($str);
    
    $i = 0;
    while($i <= $str_len){
        $result = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);
        
        if( $check_entities ){
            $result = str_replace(array('&colon;', '&lpar;', '&rpar;', '&NewLine;', '&Tab;'), '', $result);
        }
        
        $result = preg_replace('#([^\p{L}]|^)(?:javascript|jar|applescript|vbscript|vbs|wscript|jscript|behavior|mocha|livescript|view-source)\s*:(?:.*?([/\\\;()\'">]|$))#ius',
                '$1$2', $result);

        if((string)$result === (string)$str) break;

        $str = $result;
        $i++;
    }

    return $str;
}


// 검색어 특수문자 제거
function get_search_string($stx)
{
    $stx_pattern = array();
    $stx_pattern[] = '#\.*/+#';
    $stx_pattern[] = '#\\\*#';
    $stx_pattern[] = '#\.{2,}#';
    $stx_pattern[] = '#[/\'\"%=*\#\(\)\|\+\&\!\$~\{\}\[\]`;:\?\^\,]+#';

    $stx_replace = array();
    $stx_replace[] = '';
    $stx_replace[] = '';
    $stx_replace[] = '.';
    $stx_replace[] = '';

    $stx = preg_replace($stx_pattern, $stx_replace, $stx);

    return $stx;
}

// ftp 폴더삭제
function rrmdir($dir) {
	foreach(glob($dir . '/*') as $file) {
		if(is_dir($file))
			rrmdir($file);
		else
			@unlink($file);
	}
	rmdir($dir);
}

// sns 공유하기
function get_sns_share_link($sns, $url, $title, $image_url)
{
	global $default;

    if(!$sns)
        return '';

	$title = str_replace('\"', '"', strip_tags($title));
	$title = str_replace('\'', '', $title);
	$sns_send = NC_LIB_URL.'/sns_send.php?longurl='.urlencode($url).'&amp;title='.urlencode($title);

    switch($sns) {
		case 'facebook':
			$facebook_url = $sns_send.'&amp;sns=facebook';
			$str = 'share_sns(\'facebook\', \''.$facebook_url.'\'); return false;';
			$str = '<a href="'.$facebook_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
            break;
        case 'twitter':
			$twitter_url = $sns_send.'&amp;sns=twitter';
			$str = 'share_sns(\'twitter\', \''.$twitter_url.'\'); return false;';
			$str = '<a href="'.$twitter_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
			break;
        case 'naver':
			$naver_url = $sns_send.'&amp;sns=naver';
			$str = 'share_sns(\'naver\',\''.$naver_url.'\'); return false;';
			$str = '<a href="'.$naver_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'" alt="Naver"></a>'.PHP_EOL;
            break;
		//case 'googleplus':
		//	$gplus_url = $sns_send.'&amp;sns=googleplus';
        //	$str = 'share_sns(\'googleplus\',\''.$gplus_url.'\'); return false;';
		//	$str = '<a href="'.$gplus_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
        //	break;
		case 'kakaostory':
			$kakaostory_url = $sns_send . '&amp;sns=kakaostory';
            $str = 'share_sns(\'kakaostory\',\'' . $kakaostory_url . '\'); return false;';
			$str = '<a href="'.$kakaostory_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
            break;
		case 'naverband':
			$naverband_url = $sns_send . '&amp;sns=naverband';
            $str = 'share_sns(\'naverband\',\'' . $naverband_url . '\'); return false;';
			$str = '<a href="'.$naverband_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
            break;
		case 'pinterest':
			$pinterest_url = $sns_send . '&amp;sns=pinterest';
            $str = 'share_sns(\'pinterest\',\'' . $pinterest_url . '\'); return false;';
			$str = '<a href="'.$pinterest_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
            break;
		case 'tumblr':
			$tumblr_url = $sns_send.'&amp;sns=tumblr';
			$str = 'share_sns(\'tumblr\',\''.$tumblr_url.'\'); return false;';
			$str = '<a href="'.$tumblr_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
            break;
		case 'kakaotalk':
			if($default['de_kakao_js_apikey'])
                $str = '<a href="javascript:kakaolink_send(\''.str_replace('+', ' ', urlencode($title)).'\', \''.urlencode($url).'\');"><img src="'.$image_url.'"></a>'.PHP_EOL;
			break;
    }

    return $str;
}



// sns 공유하기
function get_sns_share_link2($sns, $url, $title)
{
	global $default;

    if(!$sns)
        return '';

	$title = str_replace('\"', '"', strip_tags($title));
	$title = str_replace('\'', '', $title);
	$sns_send = NC_LIB_URL.'/sns_send.php?longurl='.urlencode($url).'&amp;title='.urlencode($title);

    switch($sns) {
		case 'facebook':
			$facebook_url = $sns_send.'&amp;sns=facebook';
			$str = 'share_sns(\'facebook\', \''.$facebook_url.'\'); return false;';
			$str = '<a href="'.$facebook_url.'" onclick="'.$str.'" target="_blank" data-sns="facebook"></a>'.PHP_EOL;
            break;
        case 'twitter':
			$twitter_url = $sns_send.'&amp;sns=twitter';
			$str = 'share_sns(\'twitter\', \''.$twitter_url.'\'); return false;';
			$str = '<a href="'.$twitter_url.'" onclick="'.$str.'" target="_blank"  data-sns="twitter"></a>'.PHP_EOL;
			break;
        case 'naver':
			$naver_url = $sns_send.'&amp;sns=naver';
			$str = 'share_sns(\'naver\',\''.$naver_url.'\'); return false;';
			$str = '<a href="'.$naver_url.'" onclick="'.$str.'" target="_blank"  data-sns="naver"></a>'.PHP_EOL;
            break;
		//case 'googleplus':
		//	$gplus_url = $sns_send.'&amp;sns=googleplus';
        //	$str = 'share_sns(\'googleplus\',\''.$gplus_url.'\'); return false;';
		//	$str = '<a href="'.$gplus_url.'" onclick="'.$str.'" target="_blank"><img src="'.$image_url.'"></a>'.PHP_EOL;
        //	break;
		case 'kakaostory':
			$kakaostory_url = $sns_send . '&amp;sns=kakaostory';
            $str = 'share_sns(\'kakaostory\',\'' . $kakaostory_url . '\'); return false;';
			$str = '<a href="'.$kakaostory_url.'" onclick="'.$str.'" target="_blank"  data-sns="kakaostory"></a>'.PHP_EOL;
            break;
		case 'naverband':
			$naverband_url = $sns_send . '&amp;sns=naverband';
            $str = 'share_sns(\'naverband\',\'' . $naverband_url . '\'); return false;';
			$str = '<a href="'.$naverband_url.'" onclick="'.$str.'" target="_blank"></a>'.PHP_EOL;
            break;
		case 'pinterest':
			$pinterest_url = $sns_send . '&amp;sns=pinterest';
            $str = 'share_sns(\'pinterest\',\'' . $pinterest_url . '\'); return false;';
			$str = '<a href="'.$pinterest_url.'" onclick="'.$str.'" target="_blank"></a>'.PHP_EOL;
            break;
		case 'tumblr':
			$tumblr_url = $sns_send.'&amp;sns=tumblr';
			$str = 'share_sns(\'tumblr\',\''.$tumblr_url.'\'); return false;';
			$str = '<a href="'.$tumblr_url.'" onclick="'.$str.'" target="_blank"></a>'.PHP_EOL;
            break;
		case 'kakaolink':
			if($default['de_kakao_js_apikey'])
                $str = '<a href="javascript:kakaolink_send(\''.str_replace('+', ' ', urlencode($title)).'\', \''.urlencode($url).'\');" data-sns="kakaolink"></a>'.PHP_EOL;
			break;
    }

    return $str;
}




/*************************************************************************
**
**  접속자집계 관련 함수 모음
**
*************************************************************************/

// get_browser() 함수는 이미 있음
function get_brow($agent)
{
    $agent = strtolower($agent);

    //echo $agent; echo "<br/>";

    if(preg_match("/msie ([1-9][0-9]\.[0-9]+)/", $agent, $m)) { $s = 'MSIE '.$m[1]; }
    else if(preg_match("/firefox/", $agent))            { $s = "FireFox"; }
    else if(preg_match("/chrome/", $agent))             { $s = "Chrome"; }
    else if(preg_match("/x11/", $agent))                { $s = "Netscape"; }
    else if(preg_match("/opera/", $agent))              { $s = "Opera"; }
    else if(preg_match("/gec/", $agent))                { $s = "Gecko"; }
    else if(preg_match("/bot|slurp/", $agent))          { $s = "Robot"; }
    else if(preg_match("/internet explorer/", $agent))  { $s = "IE"; }
    else if(preg_match("/mozilla/", $agent))            { $s = "Mozilla"; }
    else { $s = "기타"; }

    return $s;
}

function get_os($agent)
{
    $agent = strtolower($agent);

    //echo $agent; echo "<br/>";

    if(preg_match("/windows 98/", $agent))                 { $s = "98"; }
    else if(preg_match("/windows 95/", $agent))             { $s = "95"; }
    else if(preg_match("/windows nt 4\.[0-9]*/", $agent))   { $s = "NT"; }
    else if(preg_match("/windows nt 5\.0/", $agent))        { $s = "2000"; }
    else if(preg_match("/windows nt 5\.1/", $agent))        { $s = "XP"; }
    else if(preg_match("/windows nt 5\.2/", $agent))        { $s = "2003"; }
    else if(preg_match("/windows nt 6\.0/", $agent))        { $s = "Vista"; }
    else if(preg_match("/windows nt 6\.1/", $agent))        { $s = "Windows7"; }
    else if(preg_match("/windows nt 6\.2/", $agent))        { $s = "Windows8"; }
    else if(preg_match("/windows 9x/", $agent))             { $s = "ME"; }
    else if(preg_match("/windows ce/", $agent))             { $s = "CE"; }
    else if(preg_match("/mac/", $agent))                    { $s = "MAC"; }
    else if(preg_match("/linux/", $agent))                  { $s = "Linux"; }
    else if(preg_match("/sunos/", $agent))                  { $s = "sunOS"; }
    else if(preg_match("/irix/", $agent))                   { $s = "IRIX"; }
    else if(preg_match("/phone/", $agent))                  { $s = "Phone"; }
    else if(preg_match("/bot|slurp/", $agent))              { $s = "Robot"; }
    else if(preg_match("/internet explorer/", $agent))      { $s = "IE"; }
    else if(preg_match("/mozilla/", $agent))                { $s = "Mozilla"; }
    else { $s = "기타"; }

    return $s;
}

/*************************************************************************
**
**  SQL 관련 함수 모음
**
*************************************************************************/

// DB 연결
function sql_connect($host, $user, $pass, $port, $db=NC_MYSQL_DB)
{
    if(function_exists('mysqli_connect') && NC_MYSQLI_USE) {
        $link = mysqli_connect($host, $user, $pass, $db, $port);

        // 연결 오류 발생 시 스크립트 종료
        if(mysqli_connect_errno()) {
            die('Connect Error: '.mysqli_connect_error());
        }
    } else {
        $link = mysql_connect($host.":".$port, $user, $pass);
    }

    return $link;
}

// DB 선택
function sql_select_db($db, $connect)
{
    if(function_exists('mysqli_select_db') && NC_MYSQLI_USE)
        return @mysqli_select_db($connect, $db);
    else
        return @mysql_select_db($db, $connect);
}

function sql_set_charset($charset, $link=null)
{
    global $tb;

    if(!$link)
        $link = $tb['connect_db'];

    if(function_exists('mysqli_set_charset') && NC_MYSQLI_USE)
        mysqli_set_charset($link, $charset);
    else
        mysql_query(" set names {$charset} ", $link);
    
}

// mysqli_query 와 mysqli_error 를 한꺼번에 처리
// mysql connect resource 지정 - 명랑폐인님 제안
function sql_query($sql, $error=NC_DISPLAY_SQL_ERROR, $link=null)
{
    global $tb;

    if(!$link)
        $link = $tb['connect_db'];

    // Blind SQL Injection 취약점 해결
    $sql = trim($sql);
    // union의 사용을 허락하지 않습니다.
    //$sql = preg_replace("#^select.*from.*union.*#i", "select 1", $sql);
    $sql = preg_replace("#^select.*from.*[\s\(]+union[\s\)]+.*#i ", "select 1", $sql);
    // `information_schema` DB로의 접근을 허락하지 않습니다.
    $sql = preg_replace("#^select.*from.*where.*`?information_schema`?.*#i", "select 1", $sql);

    if(function_exists('mysqli_query') && NC_MYSQLI_USE) {
		
        if($error) {
            $result = @mysqli_query($link, $sql) or die("<p>$sql<p>" . mysqli_errno($link) . " : " .  mysqli_error($link) . "<p>error file : {$_SERVER['SCRIPT_NAME']}");
        } else {
            $result = @mysqli_query($link, $sql);
        }
    } else {
		
        if($error) {
            $result = @mysql_query($sql, $link) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : {$_SERVER['SCRIPT_NAME']}");
        } else {
            $result = @mysql_query($sql, $link);
        }
    }

    return $result;
}

// 쿼리를 실행한 후 결과값에서 한행을 얻는다.
function sql_fetch($sql, $error=NC_DISPLAY_SQL_ERROR, $link=null)
{
    global $tb;

    if(!$link)
        $link = $tb['connect_db'];

    $result = sql_query($sql, $error, $link);
    //$row = @sql_fetch_array($result) or die("<p>$sql<p>" . mysqli_errno() . " : " .  mysqli_error() . "<p>error file : $_SERVER['SCRIPT_NAME']");
    $row = sql_fetch_array($result);
    return $row;
}

// 결과값에서 한행 연관배열(이름으로)로 얻는다.
function sql_fetch_array($result)
{
    if(function_exists('mysqli_fetch_assoc') && NC_MYSQLI_USE)
        $row = @mysqli_fetch_assoc($result);
    else
        $row = @mysql_fetch_assoc($result);

    return $row;
}

// $result에 대한 메모리(memory)에 있는 내용을 모두 제거한다.
// sql_free_result()는 결과로부터 얻은 질의 값이 커서 많은 메모리를 사용할 염려가 있을 때 사용된다.
// 단, 결과 값은 스크립트(script) 실행부가 종료되면서 메모리에서 자동적으로 지워진다.
function sql_free_result($result)
{
    if(function_exists('mysqli_free_result') && NC_MYSQLI_USE)
        return mysqli_free_result($result);
    else
        return mysql_free_result($result);
}

function sql_password($value)
{
    // mysql 4.0x 이하 버전에서는 password() 함수의 결과가 16bytes
    // mysql 4.1x 이상 버전에서는 password() 함수의 결과가 41bytes
    $row = sql_fetch(" select password('$value') as pass ");

    return $row['pass'];
}

// 비밀번호 비교
function check_password($pass, $hash)
{
    $password = get_encrypt_string($pass);

    return ($password === $hash);
}

function sql_insert_id($link=null)
{
    global $tb;

    if(!$link)
        $link = $tb['connect_db'];

    if(function_exists('mysqli_insert_id') && NC_MYSQLI_USE)
        return mysqli_insert_id($link);
    else
        return mysql_insert_id($link);
}

function sql_num_rows($result)
{
    if(function_exists('mysqli_num_rows') && NC_MYSQLI_USE)
        return mysqli_num_rows($result);
    else
        return mysql_num_rows($result);
}

function sql_fetch_row($result)
{
    if(function_exists('mysqli_fetch_row') && NC_MYSQLI_USE)
        return mysqli_fetch_row($result);
    else
        return mysql_fetch_row($result);
}

function sql_field_names($table, $link=null)
{
    global $tb;

    if(!$link)
        $link = $tb['connect_db'];

    $columns = array();

    $sql = " select * from `$table` limit 1 ";
    $result = sql_query($sql, $link);

    if(function_exists('mysqli_fetch_field') && NC_MYSQLI_USE) {
        while($field = mysqli_fetch_field($result)) {
            $columns[] = $field->name;
        }
    } else {
        $i = 0;
        $cnt = mysql_num_fields($result);
        while($i < $cnt) {
            $field = mysql_fetch_field($result, $i);
            $columns[] = $field->name;
            $i++;
        }
    }

    return $columns;
}

function sql_error_info($link=null)
{
    global $tb;

    if(!$link)
        $link = $tb['connect_db'];

    if(function_exists('mysqli_error') && NC_MYSQLI_USE) {
        return mysqli_errno($link) . ' : ' . mysqli_error($link);
    } else {
        return mysql_errno($link) . ' : ' . mysql_error($link);
    }
}

// PHPMyAdmin 참고
function get_table_define($table, $crlf="\n")
{
    global $tb;

    // For MySQL < 3.23.20
    $schema_create .= 'CREATE TABLE ' . $table . ' (' . $crlf;

    $sql = 'SHOW FIELDS FROM ' . $table;
    $result = sql_query($sql);
    while($row = sql_fetch_array($result))
    {
        $schema_create .= '    ' . $row['Field'] . ' ' . $row['Type'];
        if(isset($row['Default']) && $row['Default'] != '')
        {
            $schema_create .= ' DEFAULT \'' . $row['Default'] . '\'';
        }
        if($row['Null'] != 'YES')
        {
            $schema_create .= ' NOT NULL';
        }
        if($row['Extra'] != '')
        {
            $schema_create .= ' ' . $row['Extra'];
        }
        $schema_create     .= ',' . $crlf;
    } // end while
    sql_free_result($result);

    $schema_create = preg_replace('/,' . $crlf . '$/', '', $schema_create);

    $sql = 'SHOW KEYS FROM ' . $table;
    $result = sql_query($sql);
    while($row = sql_fetch_array($result))
    {
        $kname    = $row['Key_name'];
        $comment  = (isset($row['Comment'])) ? $row['Comment'] : '';
        $sub_part = (isset($row['Sub_part'])) ? $row['Sub_part'] : '';

        if($kname != 'PRIMARY' && $row['Non_unique'] == 0) {
            $kname = "UNIQUE|$kname";
        }
        if($comment == 'FULLTEXT') {
            $kname = 'FULLTEXT|$kname';
        }
        if(!isset($index[$kname])) {
            $index[$kname] = array();
        }
        if($sub_part > 1) {
            $index[$kname][] = $row['Column_name'] . '(' . $sub_part . ')';
        } else {
            $index[$kname][] = $row['Column_name'];
        }
    } // end while
    sql_free_result($result);

    while(list($x, $columns) = @each($index)) {
        $schema_create     .= ',' . $crlf;
        if($x == 'PRIMARY') {
            $schema_create .= '    PRIMARY KEY (';
        } else if(substr($x, 0, 6) == 'UNIQUE') {
            $schema_create .= '    UNIQUE ' . substr($x, 7) . ' (';
        } else if(substr($x, 0, 8) == 'FULLTEXT') {
            $schema_create .= '    FULLTEXT ' . substr($x, 9) . ' (';
        } else {
            $schema_create .= '    KEY ' . $x . ' (';
        }
        $schema_create     .= implode($columns, ', ') . ')';
    } // end while

    $schema_create .= $crlf . ') ENGINE=InnoDB DEFAULT CHARSET=utf8';

    return $schema_create;
} // end of the 'PMA_getTableDef()' function


// 테이블 존재여부 검사
function table_exists($tablename, $database=false)
{
    if(!$database) {
        $res = sql_query("SELECT DATABASE()");
        $row = sql_fetch_row($res);
		$database = $row[0];
    }

    $row = sql_fetch("
        SELECT COUNT(*) AS cnt
          FROM information_schema.tables
         WHERE table_schema = '$database'
           AND table_name = '$tablename'
    ");

    return (int)$row['cnt'];
}

// mysql_query("insert into..  형태를 구현
// table은 쿼리를 실행할 테이블 명
// $values 는 연관배열 형태. 즉 array('name'=>'kk', 'id'=>'');
function insert($table,$values)
{
	$count=count($values);
	if(!$count) return false;

	$i=1;
	while(list($index,$key)=each($values)){
		if($i==$count){
			$field=$field.$index;
			if($index=='passwd')
			{	$value=$value."password('".trim($key)."')";	}
			else
			{	$value=$value."'".trim($key)."'";	}
		}
		else{
			$field=$field.$index.",";
			if($index=='passwd')
			{	
				$value=$value."password('".trim($key)."'),";	}
			else
			{	$value=$value."'".trim($key)."',";	}
		}
		$i++;
	}

	$sql = "insert into $table ($field) VALUES ($value)";	// 실제 쿼리 생성
	return sql_query($sql);
}

// mysql_query("update $table set ...") 함수를 구현
// $table는 적용할 table명
// $values는 값을 배열 array('name'=>'','id'=>'')
function update($table,$values,$where="")
{
	$count=count($values);
	if(!$count)return false;

	$i=1;

	while(  list($index,$key)=each($values) ){

		if($i==$count)
		{
			if($index=='passwd')
			{	$value=$value.$index."=password('".trim($key)."') ";	}
			else
			{	$value=$value.$index."='".trim($key)."' ";	}
		}
		else
		{
			if($index=='passwd')
			{	$value=$value.$index."=password('".trim($key)."'), ";	}
			else
			{	$value=$value.$index."='".trim($key)."', ";	}
		}

		$i++;
	}

	$sql = "update $table SET $value ".$where;	// 실제 쿼리 생성
	return sql_query($sql);
}

/*************************************************************************
**
**  SMS 관련 함수 모음
**
*************************************************************************/

// str_replace
function rpc($str, $kind=",", $conv="")
{
	return str_replace($kind, $conv, $str);
}

// 문자열중 숫자만 추출
function conv_number($str)
{
	return preg_replace("/[^0-9]*/s", "", $str);
}

// 발신번호 유효성 체크
function check_vaild_callback($callback){
   $_callback = preg_replace('/[^0-9]/','', $callback);

   /**
   * 1588 로시작하면 총8자리인데 7자리라 차단
   * 02 로시작하면 총9자리 또는 10자리인데 11자리라차단
   * 1366은 그자체가 원번호이기에 다른게 붙으면 차단
   * 030으로 시작하면 총10자리 또는 11자리인데 9자리라차단
   */

   if( substr($_callback,0,4) == '1588') if( strlen($_callback) != 8) return false;
   if( substr($_callback,0,2) == '02')   if( strlen($_callback) != 9  && strlen($_callback) != 10 ) return false;
   if( substr($_callback,0,3) == '030')  if( strlen($_callback) != 10 && strlen($_callback) != 11 ) return false;

   if( !preg_match("/^(02|0[3-6]\d|01(0|1|3|5|6|7|8|9)|070|080|007)\-?\d{3,4}\-?\d{4,5}$/",$_callback) &&
       !preg_match("/^(15|16|18)\d{2}\-?\d{4,5}$/",$_callback) ){
             return false;
   } else if( preg_match("/^(02|0[3-6]\d|01(0|1|3|5|6|7|8|9)|070|080)\-?0{3,4}\-?\d{4}$/",$_callback )) {
             return false;
   } else {
             return true;
   }
}

// get_sock 함수 대체
if(!function_exists("get_sock")) {
    function get_sock($url)
    {
        // host 와 uri 를 분리
        //if(ereg("http://([a-zA-Z0-9_\-\.]+)([^<]*)", $url, $res))
        if(preg_match("/http:\/\/([a-zA-Z0-9_\-\.]+)([^<]*)/", $url, $res))
        {
            $host = $res[1];
            $get  = $res[2];
        }

        // 80번 포트로 소캣접속 시도
        $fp = fsockopen ($host, 80, $errno, $errstr, 30);
        if(!$fp)
        {
            die("$errstr ($errno)\n");
        }
        else
        {
            fputs($fp, "GET $get HTTP/1.0\r\n");
            fputs($fp, "Host: $host\r\n");
            fputs($fp, "\r\n");

            // header 와 content 를 분리한다.
            while(trim($buffer = fgets($fp,1024)) != "")
            {
                $header .= $buffer;
            }
            while(!feof($fp))
            {
                $buffer .= fgets($fp,1024);
            }
        }
        fclose($fp);

        // content 만 return 한다.
        return $buffer;
    }
}

// 인증, 결제 모듈 실행 체크
function module_exec_check($exe, $type)
{
    $error = '';
    $is_linux = false;
    if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')
        $is_linux = true;

    // 모듈 파일 존재하는지 체크
    if(!is_file($exe)) {
        $error = $exe.' 파일이 존재하지 않습니다.';
    } else {
        // 실행권한 체크
        if(!is_executable($exe)) {
            if($is_linux)
                $error = $exe.'\n파일의 실행권한이 없습니다.\n\nchmod 755 '.basename($exe).' 과 같이 실행권한을 부여해 주십시오.';
            else
                $error = $exe.'\n파일의 실행권한이 없습니다.\n\n'.basename($exe).' 파일에 실행권한을 부여해 주십시오.';
        } else {
            // 바이너리 파일인지
            if($is_linux) {
                $search = false;
                $isbinary = true;
                $executable = true;

                switch($type) {
                    case 'ct_cli':
                        exec($exe.' -h 2>&1', $out, $return_var);

                        if($return_var == 139) {
                            $isbinary = false;
                            break;
                        }

                        for($i=0; $i<count($out); $i++) {
                            if(strpos($out[$i], 'KCP ENC') !== false) {
                                $search = true;
                                break;
                            }
                        }
                        break;
                    case 'pp_cli':
                        exec($exe.' -h 2>&1', $out, $return_var);

                        if($return_var == 139) {
                            $isbinary = false;
                            break;
                        }

                        for($i=0; $i<count($out); $i++) {
                            if(strpos($out[$i], 'CLIENT') !== false) {
                                $search = true;
                                break;
                            }
                        }
                        break;
                    case 'okname':
                        exec($exe.' D 2>&1', $out, $return_var);

                        if($return_var == 139) {
                            $isbinary = false;
                            break;
                        }

                        for($i=0; $i<count($out); $i++) {
                            if(strpos(strtolower($out[$i]), 'ret code') !== false) {
                                $search = true;
                                break;
                            }
                        }
                        break;
                }

                if(!$isbinary || !$search) {
                    $error = $exe.'\n파일을 바이너리 타입으로 다시 업로드하여 주십시오.';
                }
            }
        }
    }

    if($error) {
        $error = '<script>alert("'.$error.'");</script>';
    }

    return $error;
}


/*************************************************************************
**
**  기타 함수 모음
**
*************************************************************************/

// 회원의 정보를 추출 ($mb_no는 회원의 주키값)
function get_member_no($mb_no, $fileds='*')
{
	return sql_fetch("select $fileds from tb_member where Member_Code='$mb_no' ");
}

// 회원의 정보를 리턴
function get_member($mb_id, $fileds='*')
{
	return sql_fetch("select $fileds from tb_member where Web_ID = TRIM('$mb_id')");
}

// 생년월일을 기준으로 연령대 뽑기
function get_birth_age($birth)
{
	if(!$birth) return '';

	$birth = substr($birth,0,4);
	$age = substr(date("Y")-$birth,0,1).'0';

	return $age;
}

// 게시판 스킨경로를 얻는다
function get_skin_dir($skin='')
{
	$result_array = array();

	$dirname = NC_BBS_PATH."/skin/";
	$handle = opendir($dirname);
	while($file = readdir($handle))
	{
		if($file == "."||$file == "..") continue;

		if(is_dir($dirname.$file)) $result_array[] = $file;
	}
	closedir($handle);
	sort($result_array);

	return $result_array;
}

// 테마 path
function get_theme_path($skin)
{
	$skin_path = NC_PATH.'/theme/'.$skin;


	return $skin_path;


}
function get_center_theme_path($skin)
{
	$skin_path = NC_PATH.'/s_center_theme/'.$skin;

    return $skin_path;
}

function get_lecture_theme_path($skin)
{
	$skin_path = NC_PATH.'/lecture_theme/'.$skin;

    return $skin_path;
}

function get_rent_theme_path($skin)
{
	$skin_path = NC_PATH.'/rent_theme/'.$skin;

    return $skin_path;
}
function get_mypage_theme_path($skin)
{
	$skin_path = NC_PATH.'/mypage_theme/'.$skin;

    return $skin_path;
}

function get_member_theme_path($skin)
{
	$skin_path = NC_PATH.'/s_member_theme/'.$skin;

    return $skin_path;
}


// 기본테마 url
function get_theme_url($skin)
{
	$skin_url = NC_URL.'/theme/'.$skin;

    return $skin_url;
}

// 강좌테마 url
function get_lecture_theme_url($skin)
{
	$skin_url = NC_URL.'/lecture_theme/'.$skin;

    return $skin_url;
}
// 렌트테마 url
function get_rent_theme_url($skin)
{
	$skin_url = NC_URL.'/rent_theme/'.$skin;

    return $skin_url;
}
// 마이테마 url
function get_mypage_theme_url($skin)
{
	$skin_url = NC_URL.'/mypage_theme/'.$skin;

    return $skin_url;
}
// 센터테마 url
function get_center_theme_url($skin)
{
	$skin_url = NC_URL.'/s_center_theme/'.$skin;

    return $skin_url;
}
function get_member_theme_url($skin)
{
	$skin_url = NC_URL.'/s_member_theme/'.$skin;

    return $skin_url;
}
// pc 테마 스킨경로를 얻는다
function get_theme_dir()
{
    $result_array = array();

    $dirname = NC_PATH.'/theme/';
    if(!is_dir($dirname))
        return;

    $handle = opendir($dirname);
    while($file = readdir($handle)) {
        if($file == '.'||$file == '..') continue;

        if(is_dir($dirname.$file)) $result_array[] = $file;
    }
    closedir($handle);
    sort($result_array);

    return $result_array;
}

// mobile 테마 path
function get_mobile_theme_path($skin)
{
	$skin_path = NC_PATH.'/m/theme/'.$skin;

    return $skin_path;
}

// mobile 테마 url
function get_mobile_theme_url($skin)
{
	$skin_url = NC_URL.'/m/theme/'.$skin;

    return $skin_url;
}

// mobile 테마 스킨경로를 얻는다
function get_mobile_theme_dir()
{
    $result_array = array();

    $dirname = NC_PATH.'/m/theme/';
    if(!is_dir($dirname))
        return;

    $handle = opendir($dirname);
    while($file = readdir($handle)) {
        if($file == '.'||$file == '..') continue;

        if(is_dir($dirname.$file)) $result_array[] = $file;
    }
    closedir($handle);
    sort($result_array);

    return $result_array;
}

// 원격지에 파일이 존재하는지 확인
// $filepath = "http://원격지 URL/파일명.png";
function remoteFileExist($filepath)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$filepath);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if(curl_exec($ch)!==false) {
		return true;
    } else {
        return false;
    }
}

function radio_checked($field, $checked, $value, $text='')
{
    if(!$text) $text = $value;

	$str = '<label><input type="radio" name="'.$field.'" value="'.$value.'"';
	if($value == $checked) $str.= ' checked="checked"';
    $str.= '> '.$text.'</label>'.PHP_EOL;

	return $str;
}

function check_checked($field, $checked, $value, $text='')
{
    if(!$text) $text = $value;

	$str = '<label><input type="checkbox" name="'.$field.'" value="'.$value.'"';
	if($value == $checked) $str.= ' checked="checked"';
    $str.= '> '.$text.'</label>'.PHP_EOL;

	return $str;
}

// 불법접근을 막도록 토큰을 생성하면서 토큰값을 리턴
function get_admin_token()
{
    $token = md5(uniqid(rand(), true));
    set_session('ss_admin_token', $token);

    return $token;
}

// POST로 넘어온 토큰과 세션에 저장된 토큰 비교
function check_admin_token()
{
    $token = get_session('ss_admin_token');
    set_session('ss_admin_token', '');

    if(!$token || !$_REQUEST['token'] || $token != $_REQUEST['token'])
        alert('올바른 방법으로 이용해 주십시오.', NC_URL);

    return true;
}

// POST로 넘어온 토큰과 세션에 저장된 토큰 비교
function ajax_admin_token()
{
    $token = get_session('ss_admin_token');
    set_session('ss_admin_token', '');

    if(!$token || !$_REQUEST['token'] || $token != $_REQUEST['token'])
		die("{\"error\":\"올바른 방법으로 이용해 주십시오.\"}");

    return true;
}

// 관리자 페이지 referer 체크
function admin_referer_check($return=false)
{
    $referer = trim($_SERVER['HTTP_REFERER']);
    if(!$referer) {
        $msg = '정보가 올바르지 않습니다.';

        if($return)
            return $msg;
        else
            alert($msg, NC_URL);
    }

    $p = @parse_url($referer);
    $host = preg_replace('/:[0-9]+$/', '', $_SERVER['HTTP_HOST']);

    if($host != $p['host']) {
        $msg = '올바른 방법으로 이용해 주십시오.';

        if($return)
            return $msg;
        else
            alert($msg, NC_URL);
    }
}

// 이메일 주소 추출
function get_email_address($email)
{
    preg_match("/[0-9a-z._-]+@[a-z0-9._-]{4,}/i", $email, $matches);

    return $matches[0];
}

// 주소출력
function print_address($addr1, $addr2, $addr3, $addr4)
{
    $address = get_text(trim($addr1));
    $addr2   = get_text(trim($addr2));
    $addr3   = get_text(trim($addr3));

    if($addr4 == 'N') {
        if($addr2)
            $address .= ' '.$addr2;
    } else {
        if($addr2)
            $address .= ', '.$addr2;
    }

    if($addr3)
        $address .= ' '.$addr3;

    return $address;
}

// 관리자 체크.
function is_admin($grade='')
{
	global $member;

	$grade = $grade ? $grade : $member['grade'];

	switch($grade)
	{
		case '1' :
			return true;
			break;
		default :
			return false;
	}
}

// 로그인 후 이동할 URL
function login_url($url='')
{
    if(!$url) $url = NC_URL;

    return urlencode(clean_xss_tags(urldecode($url)));
}

// 금액 표시
function display_price($price)
{
	return number_format($price, 0).'원';
}

// 금액 표시
function display_price2($price)
{
	return '<span class="spr">'.number_format($price).'<span>원</span></span>';
}


// 수량 표시
function display_qty($price)
{
	return number_format($price, 0).'개';
}
// 수량 표시2
function display_qty2($price)
{
	return '<span lang="en">'.number_format($price, 0).'</span> 장';
	//return number_format($price, 0).'개';
}



// 은행정보 : select 형태로 얻음
function get_bank_select($name, $opt='')
{
	$str = "<select name=\"{$name}\" id=\"{$name}\"";
    if($opt) $str .= " $opt";
    $str .= ">\n";
	$str.= "<option value=''>선택</option>\n";
	$str.= "<option value='경남은행'>경남은행</option>\n";
	$str.= "<option value='광주은행'>광주은행</option>\n";
	$str.= "<option value='국민은행'>국민은행</option>\n";
	$str.= "<option value='기업은행'>기업은행</option>\n";
	$str.= "<option value='농협'>농협</option>\n";
	$str.= "<option value='대구은행'>대구은행</option>\n";
	$str.= "<option value='도이치뱅크'>도이치뱅크</option>\n";
	$str.= "<option value='부산은행'>부산은행</option>\n";
	$str.= "<option value='산업은행'>산업은행</option>\n";
	$str.= "<option value='상호저축은행'>상호저축은행</option>\n";
	$str.= "<option value='새마을금고'>새마을금고</option>\n";
	$str.= "<option value='수협중앙회'>수협중앙회</option>\n";
	$str.= "<option value='신용협동조합'>신용협동조합	</option>\n";
	$str.= "<option value='신한은행'>신한은행</option>\n";
	$str.= "<option value='외환은행'>외환은행</option>\n";
	$str.= "<option value='우리은행'>우리은행</option>\n";
	$str.= "<option value='우체국'>우체국</option>\n";
	$str.= "<option value='전북은행'>전북은행</option>\n";
	$str.= "<option value='제주은행'>제주은행</option>\n";
	$str.= "<option value='하나은행'>하나은행</option>\n";
	$str.= "<option value='한국시티은행'>한국시티은행</option>\n";
	$str.= "<option value='HSBC'>HSBC</option>\n";
	$str.= "<option value='SC제일은행'>SC제일은행</option>\n";
	$str.= "</select>";

	return $str;
}

// 특정필드는 제외
function get_columns($tablename)
{
	$columns = array();
    $res = sql_query("SHOW COLUMNS FROM {$tablename}");
    while($row=sql_fetch_array($res)) {
        $columns[] = $row["Field"];
    }

    return $columns;
}


// 배열을 comma 로 구분하여 연결
function gnd_implode($str, $comma=",")
{
	$arr = is_array($str) ? $str : array($str);

	return implode($comma, $arr);
}


// 쿼리에 맞게 콤마로 구분
function mb_comma($list)
{
	$mid = $comma = '';
	foreach($list as $id) {
		$id = trim($id);
		$mid .= $comma."'{$id}'";
		$comma = ',';
	}

	return $mid;
}

// 스킨 style sheet 파일 얻기
function get_skin_stylesheet($skin_path, $dir='')
{
    if(!$skin_path)
        return "";

    $str = "";
    $files = array();

    if($dir)
        $skin_path .= '/'.$dir;

    $skin_url = NC_URL.str_replace("\\", "/", str_replace(NC_PATH, "", $skin_path));

    if(is_dir($skin_path)) {
        if($dh = opendir($skin_path)) {
            while(($file = readdir($dh)) !== false) {
                if($file == "." || $file == "..")
                    continue;

                if(is_dir($skin_path.'/'.$file))
                    continue;

                if(preg_match("/\.(css)$/i", $file))
                    $files[] = $file;
            }
            closedir($dh);
        }
    }

    if(!empty($files)) {
        sort($files);

        foreach($files as $file) {
            $str .= '<link rel="stylesheet" href="'.$skin_url.'/'.$file.'?='.date("md").'">'."\n";
        }
    }

    return $str;

    /*
    // glob 를 이용한 코드
    if(!$skin_path) return '';
    $skin_path .= $dir ? '/'.$dir : '';

    $str = '';
    $skin_url = NC_URL.str_replace('\\', '/', str_replace(NC_PATH, '', $skin_path));

    foreach (glob($skin_path.'/*.css') as $filepath) {
        $file = str_replace($skin_path, '', $filepath);
        $str .= '<link rel="stylesheet" href="'.$skin_url.'/'.$file.'?='.date('md').'">'."\n";
    }
    return $str;
    */
}

// 스킨 javascript 파일 얻기
function get_skin_javascript($skin_path, $dir='')
{
    if(!$skin_path)
        return "";

    $str = "";
    $files = array();

    if($dir)
        $skin_path .= '/'.$dir;

    $skin_url = NC_URL.str_replace("\\", "/", str_replace(NC_PATH, "", $skin_path));

    if(is_dir($skin_path)) {
        if($dh = opendir($skin_path)) {
            while(($file = readdir($dh)) !== false) {
                if($file == "." || $file == "..")
                    continue;

                if(is_dir($skin_path.'/'.$file))
                    continue;

                if(preg_match("/\.(js)$/i", $file))
                    $files[] = $file;
            }
            closedir($dh);
        }
    }

    if(!empty($files)) {
        sort($files);

        foreach($files as $file) {
            $str .= '<script src="'.$skin_url.'/'.$file.'"></script>'."\n";
        }
    }

    return $str;
}

// file_put_contents 는 PHP5 전용 함수이므로 PHP4 하위버전에서 사용하기 위함
// http://www.phpied.com/file_get_contents-for-php4/
if(!function_exists('file_put_contents')) {
    function file_put_contents($filename, $data) {
        $f = @fopen($filename, 'w');
        if(!$f) {
            return false;
        } else {
            $bytes = fwrite($f, $data);
            fclose($f);
            return $bytes;
        }
    }
}

// HTML 마지막 처리
function html_end()
{
    global $html_process;

    return $html_process->run();
}

function add_stylesheet($stylesheet, $order=0)
{
    global $html_process;

    if(trim($stylesheet))
        $html_process->merge_stylesheet($stylesheet, $order);
}

function add_javascript($javascript, $order=0)
{
    global $html_process;

    if(trim($javascript))
        $html_process->merge_javascript($javascript, $order);
}

class html_process {
    protected $css = array();
    protected $js  = array();

    function merge_stylesheet($stylesheet, $order)
    {
        $links = $this->css;
        $is_merge = true;

        foreach($links as $link) {
            if($link[1] == $stylesheet) {
                $is_merge = false;
                break;
            }
        }

        if($is_merge)
            $this->css[] = array($order, $stylesheet);
    }

    function merge_javascript($javascript, $order)
    {
        $scripts = $this->js;
        $is_merge = true;

        foreach($scripts as $script) {
            if($script[1] == $javascript) {
                $is_merge = false;
                break;
            }
        }

        if($is_merge)
            $this->js[] = array($order, $javascript);
    }

    function run()
    {
        global $tb, $member;

  

        $buffer = ob_get_contents();
        ob_end_clean();

        $stylesheet = '';
        $links = $this->css;

        if(!empty($links)) {
            foreach ($links as $key => $row) {
                $order[$key] = $row[0];
                $index[$key] = $key;
                $style[$key] = $row[1];
            }

            array_multisort($order, SORT_ASC, $index, SORT_ASC, $links);

            foreach($links as $link) {
                if(!trim($link[1]))
                    continue;

                $link[1] = preg_replace('#\.css([\'\"]?>)$#i', '.css?ver='.NC_CSS_VER.'$1', $link[1]);

                $stylesheet .= PHP_EOL.$link[1];
            }
        }

        $javascript = '';
        $scripts = $this->js;
        $php_eol = '';

        unset($order);
        unset($index);

        if(!empty($scripts)) {
            foreach ($scripts as $key => $row) {
                $order[$key] = $row[0];
                $index[$key] = $key;
                $script[$key] = $row[1];
            }

            array_multisort($order, SORT_ASC, $index, SORT_ASC, $scripts);

            foreach($scripts as $js) {
                if(!trim($js[1]))
                    continue;

                $js[1] = preg_replace('#\.js([\'\"]?>)$#i', '.js?ver='.NC_JS_VER.'$1', $js[1]);

                $javascript .= $php_eol.$js[1];
                $php_eol = PHP_EOL;
            }
        }

        /*
        </title>
        <link rel="stylesheet" href="default.css">
        밑으로 스킨의 스타일시트가 위치하도록 하게 한다.
        */
        $buffer = preg_replace('#(</title>[^<]*<link[^>]+>)#', "$1$stylesheet", $buffer);

        /*
        </head>
        <body>
        전에 스킨의 자바스크립트가 위치하도록 하게 한다.
        */
        $nl = '';
        if($javascript)
            $nl = "\n";
        $buffer = preg_replace('#(</head>[^<]*<body[^>]*>)#', "$javascript{$nl}$1", $buffer);

        return $buffer;
    }
}

/*************************************************************************
**
**  본인인증 함수 모음
**
*************************************************************************/

// 휴대폰번호의 숫자만 취한 후 중간에 하이픈(-)을 넣는다.
function hyphen_hp_number($hp)
{
    $hp = preg_replace("/[^0-9]/", "", $hp);
    return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $hp);
}
//TB_Cert_History 인증내역 테이블
//cr_id int(11) auto_increment 인증내역번호
//Web_ID varchar(20) 회원아이디
//cr_company varchar(255) 인증요청서비스
//cr_method varchar(255) 인증요청유형
//cr_ip varchar(255) 요청
//cr_date date 0000-00-00 요청일
//cr_time time 00:00:00 요청시간


// 본인확인내역 기록
function insert_cert_history($mb_id, $company, $method,$ip)
{
    $sql = " insert into tb_identification_log
                set Web_ID = '$mb_id',
                    cr_company = '$company',
                    cr_method = '$method',
                    cr_ip = '$ip',
                    cr_date = '".NC_TIME_YMD."',
                    cr_time = '".NC_TIME_HIS."' ";
    sql_query($sql);
}

// 인증시도회수 체크--인증시도 횟수 테이블
function certify_count_check($mb_id, $type,$ip)
{
    global $config;

 
    $sql = " select count(*) as cnt from tb_identification_log ";

    if($mb_id) {
        $sql .= " where Web_ID = '$mb_id' ";
    } else {
        $sql .= " where cr_ip = '$ip' ";
    }

    $sql .= " and cr_method = '".$type."' and cr_date = '".NC_TIME_YMD."' ";

    $row = sql_fetch($sql);

    switch($type) {
        case 'hp':
            $cert = '휴대폰';
            break;
        case 'ipin':
            $cert = '아이핀';
            break;
        default:
            break;
    }

$cf_cert_limit =5; //하루 본인인증 횟수 




    if($row['cnt'] >= $cf_cert_limit)
        alert_close('오늘 '.$cert.' 본인확인(5회) '.$row['cnt'].'회 초과로 이상 이용할 수 없습니다.');
}

?>
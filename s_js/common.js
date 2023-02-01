function inputPhoneNumber(obj) {



    var number = obj.value.replace(/[^0-9]/g, "");
    var phone = "";



    if(number.length < 4) {
        return number;
    } else if(number.length < 7) {
        phone += number.substr(0, 3);
        phone += "-";
        phone += number.substr(3);
    } else if(number.length < 11) {
        phone += number.substr(0, 3);
        phone += "-";
        phone += number.substr(3, 3);
        phone += "-";
        phone += number.substr(6);
    } else {
        phone += number.substr(0, 3);
        phone += "-";
        phone += number.substr(3, 4);
        phone += "-";
        phone += number.substr(7);
    }
    obj.value = phone;
}


function urlencode(str) {
    str = (str + '').toString();
    return encodeURIComponent(str)
        .replace(/!/g, '%21')
        .replace(/'/g, '%27')
        .replace(/\(/g, '%28')
        .replace(/\)/g, '%29')
        .replace(/\*/g, '%2A')
        .replace(/%20/g, '+');
}

function urldecode(str) {
    return decodeURIComponent((str + '')
        .replace(/%(?![\da-f]{2})/gi, function() {
            return '%25';
        })
        .replace(/\+/g, '%20'));
}
 

function rawurlencode(str) {
    str = (str + '').toString();
    return encodeURIComponent(str)
        .replace(/!/g, '%21')
        .replace(/'/g, '%27')
        .replace(/\(/g, '%28')
        .replace(/\)/g, '%29')
        .replace(/\*/g, '%2A');
}
 

function rawurldecode(str) {
    return decodeURIComponent((str + '')
        .replace(/%(?![\da-f]{2})/gi, function() {
            return '%25';
        }));
}


// 본인확인 인증창 호출
function certify_win_open(type, url, event)
{



    if (typeof event == "undefined") {
        event = window.event;
    }

    if(type == 'kcb-ipin')
    {
        var popupWindow = window.open( url, "kcbPop", "left=200, top=100, status=0, width=450, height=550" );
        popupWindow.focus();
    }
    else if(type == 'kcb-hp')
    {
        var popupWindow = window.open( url, "auth_popup", "left=200, top=100, width=430, height=590, scrollbar=yes" );
        popupWindow.focus();
    }
	  else if(type == 'nice-hp')
    {


        var popupWindow = window.open( url, "nicePop", "left=200, top=100, width=430, height=590, scrollbar=yes" );
        popupWindow.focus();
    }
    else if(type == 'kcp-hp')
    {
        if($("input[name=veri_up_hash]").length < 1)
                $("input[name=cert_no]").after('<input type="hidden" name="veri_up_hash" value="">');

        if( navigator.userAgent.indexOf("Android") > - 1 || navigator.userAgent.indexOf("iPhone") > - 1 )
        {
            var $frm = $(event.target.form);
            if($("#kcp_cert").length < 1) {
                $frm.wrap('<div id="cert_info"></div>');

                $("#cert_info").append('<form name="form_temp" method="post">');
            } else {
                $("#kcp_cert").remove();
            }

            $("#cert_info")
                .after('<iframe id="kcp_cert" name="kcp_cert" width="100%" height="700" frameborder="0" scrolling="no" style="display:none"></iframe>');

            var temp_form = document.form_temp;
            temp_form.target = "kcp_cert";
            temp_form.action = url;

            document.getElementById( "cert_info" ).style.display = "none";
            document.getElementById( "kcp_cert"  ).style.display = "";

            temp_form.submit();
        }
        else
        {
            var return_gubun;
            var width  = 410;
            var height = 500;

            var leftpos = screen.width  / 2 - ( width  / 2 );
            var toppos  = screen.height / 2 - ( height / 2 );

            var winopts  = "width=" + width   + ", height=" + height + ", toolbar=no,status=no,statusbar=no,menubar=no,scrollbars=no,resizable=no";
            var position = ",left=" + leftpos + ", top="    + toppos;
            var AUTH_POP = window.open(url,'auth_popup', winopts + position);
        }
    }
    else if(type == 'lg-hp')
    {

        if( g5_is_mobile )
        {
            var $frm = $(event.target.form),
                lgu_cert = "lgu_cert";

            if($("#lgu_cert").length < 1) {
                $frm.wrap('<div id="cert_info"></div>');

                $("#cert_info").append('<form name="form_temp" method="post">');
            } else {
                $("#"+lgu_cert).remove();
            }

            $("#cert_info")
                .after('<iframe id="'+lgu_cert+'" name="lgu_cert" width="100%" src="'+url+'" height="700" frameborder="0" scrolling="no" style="display:none"></iframe>');

            document.getElementById( "cert_info" ).style.display = "none";
            document.getElementById( lgu_cert  ).style.display = "";

        } else {
            var width= 640;
            var height = 660;

            var leftpos = screen.width  / 2 - ( width  / 2 );
            var toppos  = screen.height / 2 - ( height / 2 );

            var popupWindow = window.open( url, "auth_popup", "left=" + leftpos + ", top="    + toppos + ", width=" + width   + ", height=" + height + ", scrollbar=yes" );
            popupWindow.focus();
        }
    }
}

// 인증체크
function cert_confirm()
{
    var type;
    var val = document.nc_frm_agree.cert_type.value

    switch(val) {
        case "ipin":
            type = "아이핀";
            break;
        case "hp":
            type = "휴대폰";
            break;
         case "nice-hp":
            type = "휴대폰";
            break;
        default:
            return true;
    }

    if(confirm("이미 "+type+"으로 본인확인을 완료하셨습니다.\n\n이전 인증을 취소하고 다시 인증하시겠습니까?"))
        return true;
    else
        return false;
}
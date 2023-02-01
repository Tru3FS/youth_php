 
 <?php
 
include_once('../../../../../common.php');
 


$b_simg = (isset($_REQUEST["b_simg"]) && $_REQUEST["b_simg"]) ? $_REQUEST["b_simg"] : NULL;

$bcnt = explode(',' , $b_simg);


$num_b = count($bcnt);


//echo $b_simg;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Daum에디터 - 이미지 첨부</title> 
<script src="../../js/popup.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="../../css/popup.css" type="text/css"  charset="utf-8"/>

<script type='text/javascript' src='../../js/jquery-1.6.1.min.js'></script>

<script type='text/javascript' src='../../js/jquery.loadmask.min.js'></script>


<script type="text/javascript"> 
// <![CDATA[


function done() {
		if (typeof(execAttach) == 'undefined') { //Virtual Function
	        return;
	    }

<?php
for($i=0;$i < count($bcnt);$i++)
{
?>
var _mockdata = {
			'imageurl': '/upload_file/editor/<?php echo $bcnt[$i];?>',
			'filename': '<?php echo $bcnt[$i];?>',
			'filesize': 1200,
			'imagealign': 'C',
			'originalurl': '',
			'thumburl': ''
};
		
execAttach(_mockdata);
<?php 
}
?>
closeWindow();
}
	function initUploader(){
	    var _opener = PopupUtil.getOpener();
	    if (!_opener) {
	        alert('잘못된 경로로 접근하셨습니다.');
	        return;
	    }
	    
	    var _attacher = getAttacher('image', _opener);
	    registerAction(_attacher);
	}
// ]]>
</script>

<script language="javascript"> 
<!--
function render_frmchk(frm) {
  if(!frm.bfile.value) {
    alert("업로드하실 이미지를 선택해주세요.");
    frm.bfile.focus();
    return false;
  }
  
  $("#uploadform").mask('');
 
  return true;
}
//-->
</script>

</head>
<body onload="initUploader();" id="uploadform">
<div class="wrapper">
	<div class="header">
		<h1>사진 첨부</h1>
	</div>	
	<div class="body">
		<form name="form" method="post" action="./Editor_upload.asp" enctype="multipart/form-data" onsubmit="return render_frmchk(this);">
  <input type="hidden" name="md" value="post">

		<dl  class="alert">
		    <dt><a href="#" onclick="done();">
			<?php
for($i=0;$i < count($bcnt);$i++)
{
?>
			<img src="../../../../../upload_file/editor/<?php echo $bcnt[$i];?>"  style="border:1px solid #CCCCCC"><br>
			<?php 
}
?></a></dt>
     
		 
		 <dd>&nbsp;</dd>
		    <dd>* 아래의 등록 버튼을 누르시면 업로드 하신 이미지가 에디터로 첨부됩니다.</dd>
		</dl>
  </form>
	</div>
	<div class="footer">
		<p><a href="#" onclick="closeWindow();" title="닫기" class="close">닫기</a></p>
		<ul>
			<li class="submit"><a href="#" onclick="done();" title="등록" class="btnlink">등록</a> </li>
			<li class="cancel"><a href="#" onclick="closeWindow();" title="취소" class="btnlink">취소</a></li>
		</ul>
	</div>
</div>
</body>
</html>



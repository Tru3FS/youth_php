<?php
include_once('../../../../../common.php');
// 설정
$uploads_dir = NC_PATH.'/upload_file/editor';
$allowed_ext = array('jpg','jpeg','png','gif',"PNG","JPG","JPEG","GIF");
 




 
for($i = 0; $i < count($_FILES['myfile']['name']); $i++)
{
	
	
// 변수 정리
  $uploadfile = $_FILES['myfile']['name'][$i];
  $ext = substr(strrchr($_FILES['myfile']['name'][$i], "."), 1); 

  $fPath = md5(rand() * time()) . ".$ext";
  $names = time().".".$ext; 


    $me[] = $fPath;

// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
	echo json_encode( array(
		'status' => 'error',
		'message' => '허용되지 않는 확장자입니다. 1'
	));
	exit;
}	
	
	
// 파일 이동
//move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");



 
 
 
        if(move_uploaded_file($_FILES['myfile']['tmp_name'][$i],"$uploads_dir/$fPath")){
            //echo "파일이 업로드 되었습니다.<br />";
            //echo "<img src ={$_FILES['myfile']['name'][$i]} style='width:100px'> <p>";
            //echo "1. file name : {$_FILES['myfile']['name'][$i]}<br />";
            //echo "2. file type : {$_FILES['myfile']['type'][$i]}<br />";
            //echo "3. file size : {$_FILES['myfile']['size'][$i]} byte <br />";
            //echo "4. temporary file size : {$_FILES['myfile']['size'][$i]}<br />";
			
			
			
			
        } else {
            echo "파일 업로드 실패 !! 다시 시도해주세요.<br />";
			// 오류 확인
if( !isset($_FILES['myfile']['error']) ) {
	echo json_encode( array(
		'status' => 'error',
		'message' => '파일이 첨부되지 않았습니다.',
		'message2' => '1'
	));
	exit;
}
$error = $_FILES['myfile']['error'];
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			$message = "파일이 너무 큽니다. ($error) 1s";
			break;
		case UPLOAD_ERR_NO_FILE:
			$message = "파일이 첨부되지 않았습니다. ($error) 2s";
			break;
		default:
			$message = "파일이 제대로 업로드되지 않았습니다. ($error) 3s";
	}
	echo json_encode( array(
		'status' => 'error',
		'message' => $message,
		'message2' => '2'
	));
	exit;
}

        }


 }
 
// 파일 정보 출력

?>


<form name="orderresult" action="./image_insert.php">
 <input name='b_simg' type='hidden'  value="<?php echo implode(',',$me);?>">
 </form>

<script language="javascript">
document.orderresult.submit();
</script>
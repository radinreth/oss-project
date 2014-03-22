<?php
if(session_id() == '') {
		session_start();
	}
	
include("../../../class/_class.php");

$files = str_replace(array("[]"), "", $_POST['c_v']);
$path = "../../images/uploaded/";
//echo $_FILES[$files]['name'];

	$file_ary = array();
    $file_count = count($_FILES[$files]['name']);
    $file_keys = array_keys($_FILES[$files]);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $_FILES[$files][$key][$i];
        }
    }
if(!empty($_FILES[$files]) && count($file_ary) > 0){
	
	$result = '<ol class="attach-list">';
	foreach ($file_ary as $file) {
		//$f = 'File Name: ' . $file['name'].'File tmp: ' . $file['tmp_name'].'File Size: ' . $file['size'];
		//$result .= $f;
		$invalid_formats = array("php", "js", "exe", "bat");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
			$name = $file['name'];
			$size = $file['size'];
			if (strlen($name)) {
				list($txt, $ext) = explode(".", $name);
				if(!in_array($ext,$invalid_formats)){
					if($size < (20 * 1024 * 1024)){
						$real_name = time().$file['name'];
						$tmp = $file['tmp_name'];
						
						$vis_id = $_POST['v_id'];
						$chm_who = 2;
						//$_SESSION['ccm_id'] = 2; // get file from session.
						session_write_close();
						
						$sql = "insert into tbl_chat_message(chm_id, vis_id, chm_file, chm_filesize, add_datetime) values(uuid(), '$vis_id', '$name', '$size', CURRENT_TIMESTAMP)";
						
						$opt = new Operations();
							
						if(move_uploaded_file($tmp, $path.$real_name) && ($opt->send_file_info($vis_id, $chm_who, time().$name, $size, $_SESSION['ccm_id']) == 1)){
							$result .= '<li>'.$name.' upload successful!</li>';
						}else{
							$result .= '<li>'.$name.' upload fail!</li>';
						}
					}else{
						$result .= '<li>'.$name.' size Max 20MB</li>';	
					}
				}else{
					$result .= '<li>'.$name.': invalid file!</li>';
				}
				
			}
		}
    }
}
echo $result.'</ol>';
exit();

/*$path = "../../images/students/";

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['h_student_photo']['name'];
			$size = $_FILES['h_student_photo']['size'];

			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['h_student_photo']['tmp_name'];
							
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									
									echo '<img src="../images/students/'.$actual_image_name.'" id="img_student_photo" alt="photo student profile" width="92px" height="111px" />';
									
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}*/
?>
<?php

if(session_id() == '') {
	session_start();
}
	session_write_close();
include_once("../../../class/_class.php");

$files = $_POST['c_v'];
$path = "../../images/uploaded/";

	$file_ary = array();
    $file_count = count($_FILES[$files]['name']);
    $file_keys = array_keys($_FILES[$files]);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $_FILES[$files][$key][$i];
        }
    }
if(!empty($_FILES[$files]) && count($file_ary) > 0){
	
	$result = '<ol>';
	foreach ($file_ary as $file) {

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
						$chm_who = 1;

						$ccm_id = $_SESSION['ccm_id'];
						
						$sql = "insert into tbl_chat_message(
											chm_id, 
											vis_id, 
											chm_file, 
											chm_filesize, 
											add_datetime) 
											values (
											uuid(), 
											'$vis_id', 
											'$name', 
											'$size',
											CURRENT_TIMESTAMP)
											";
						
						$opt = new Operations();
	
						if((move_uploaded_file($tmp, $path.$real_name)==1) && ($opt->send_file_info($vis_id, $chm_who, time().$name, $size, $ccm_id) == 1)){
							$result .= '<li>'.$name.' upload successful!</li>';
						}else{
							$result .= '<li>'.$name.' upload fail!</li>';
						}
					}else{
						$result .= '<li>'.$name.' size Max 20MB</li>';	
					}
				}else{
					$result .= '<li>'.$name.': invalid file!(any files beside executeable file)</li>';
				}
				
			}
		}
    }
}
echo $result.'</ol>';
exit();


?>
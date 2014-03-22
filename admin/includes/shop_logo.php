<?php
include '../../class/class.php';
$path = "../../images/company_logo/";

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['com_logo']['name'];
			$size = $_FILES['com_logo']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['com_logo']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									$_SESSION['shop_logo']=$actual_image_name;

									echo "<img src='../../images/company_logo/".$actual_image_name."'  class='preview' width=100px> ";

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
		}
?>
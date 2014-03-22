<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
	include('../class/class.php');
	define('PAGE_TITLE','contact');	
	if(isset($_POST['send'])){
		$fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];       
        $message=$_POST['message'];
        $obj->SendEmail($fullname,$email,$subject,$message);
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>OSS : Contact</title>
<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />



</head>
<body>

	<div class="v_wrap">
		<?php include('../includes/header.php');?>
	</div>

	<div class="v_wrap">
		<div id="v_wrap_title">
			<div class="v_title">Office</div>
			<div class="v_slogan">{short description about where to find us}</div>
		</div>
	</div>

	<div class="v_wrap">		
		<div id="v_wrap_contact">
			<div class="v_contact_all">
				<div class="v_contact">
					<div class="v_contact_content">
						<div class="v_contact_image"><img src="../images/contact/v_location.png"></div>
						<div class="v_contact_detail">GoChat, Inc.<br>201 palm street.<br>Takhmao, KH27098 Kandal provice, Cambodia.
						</div>
					</div>
					<div class="v_contact_content">
						<div class="v_contact_image"><img src="../images/contact/v_phone.png"></div>
						<div class="v_contact_detail">+(855) 93 888 999</div>
					</div>
				</div>
				<div class="v_contact_right">
					<div class="v_contact_content">
						<div class="v_contact_image">&nbsp;</div>
						<div class="v_contact_detail">In case you have any difficulty in submitting form. Please send email directly to:</div>
					</div>
					<div class="v_contact_content">
						<div class="v_contact_image"><img src="../images/contact/v_order.png"></div>
						<div class="v_contact_detail">
							<div class="v_contact_title">Orders & Sales</div>
							<div class="v_contact_email">sales@gochat.com</div>
							<div class="v_contact_title">Technicals & Suppots</div>
							<div class="v_contact_email">support@gochat.com</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="v_wrap_content">
			<div class="v_content">				
					<div id="v_wrap_signup">
                    		<form name="frm_contact" action="" method="post">
							<div class="v_wrap_text">
								<div class="v_label">Fullname</div>
								<div class="v_form_right"><input type="text" class="v_textbox" name="fullname"></div>								
							</div>
							<div class="v_wrap_text">
								<div class="v_label">Email</div>
								<div class="v_form_right"><input type="text" class="v_textbox" name="email"></div>								
							</div>
							<div class="v_wrap_text">
								<div class="v_label">Subject</div>
								<div class="v_form_right"><input type="text" class="v_textbox" name="subject"></div>								
							</div>
							<div class="v_wrap_text">
								<div class="v_label">Message</div>
								<div class="v_form_right"><input type="text" class="v_textbox v_textarea" name="message"></div>								
							</div>
							<div class="v_wrap_text">
								<div class="v_label"></div>
								<div class="v_form_right"><input type="submit" class="v_button v_signup" value="Send Message" name="send"></div>								
							</div>
                            <div class="v_wrap_text">
                            	<div class="v_form_right" style="text-align:center; font-style:italic; color:#639;"><?php echo $_SESSION["error_message"];?></div>
                            </div>
                           </form> 
					</div>
			</div>
		</div>
	</div>

	<div class="v_wrap">
		<?php include('../includes/s_footer.php');?>
	</div>
</body>
</html>
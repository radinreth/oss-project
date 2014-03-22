<?php
include '../class/class.php';
define('PAGE_TITLE','sign_up');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" />
<script src="../js/jquery-2.0.3.js"></script>
<script src="../js/main.js"></script>

<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>
<title>Administration page</title>

</head>

<body>
<div id="s_content_all">
	<div id="s_header">
    	<?php include('../includes/header.php');?>            
    </div>
    <div id="s_body">
    	<div id="s_description_login">
        	<div id="s_title_b">
            	<div id="s_proverb" style="width:80%; float:left; text-align:right;color:#5d5d5d; ">Administrator of !&nbsp;</div>
            	<div style="width:20%; float:left; padding-top:8px; text-align:left;"><img src="../images/commons/gochat.png" /></div>
            </div>
        </div>
        
        <div id="s_form_sign_up">
        	<form name="frmlogin" method="post" action="../includes/main_all.php" id="frmlogin">
            	
            <label style="padding-bottom:10px; float:left;"><input type="text" id="txtemail" name="txtemail" class="txtname_log" placeholder="User name" /></label>
                <label style="padding-bottom:10px; float:left;"><input type="password" id="txtpassword" name="txtpassword" class="txtname_log" placeholder="Password" /></label>
                <input type="hidden" name="RadioGroup1" value="3" id="RadioGroup1_0" />
                <label style="padding-bottom:10px; float:left;"><input type="submit" class="btn_signup" value="LOG IN" /></label>
                
                <label style="font-size:16px;"></label>
          </form>
          <div id="AlertMessage" style="color:#F00; font-size:15px;"></div>
            
        </div>
        
    </div>
    
    <br class="clear" />
    <div id="s_footer">
    	<?php include('../includes/s_footer.php');?>
    </div>
    
</div>
</body>
</html>

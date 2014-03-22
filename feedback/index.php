
<?php
    define('PAGE_TITLE','feedback');
	include('../class/class.php');
	
	if(isset($_POST['btn_suggest'])){
		//echo "hello";
		$fullname=$_POST['txtfullname'];
        $email=$_POST['txtemail'];
        $subject=$_POST['txtsubject'];       
        $message=$_POST['textarea'];
        $obj->SendEmail($fullname,$email,$subject,$message);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" />


<script type="text/javascript" src="../js/library/jquery.min.js" charset="utf-8"></script>
<link type="text/css" rel="stylesheet" href="../js/library/jquery-te-1.4.0.css">

<script type="text/javascript" src="../js/library/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<title>Untitled Document</title>
</head>

<body>

<div id="s_content_all">
	<div id="s_header">
    	<?php include('../includes/header.php');?>
        
        
    </div>
   
    <div id="r_body">
    	<div id="r_description">
        	<div id="s_title_b">
            	<div id="s_proverb" style="width:100%; float:left; text-align:center;color:#5d5d5d; font-family:'Segoe UI'; font-size:29px; ">FEEDBACK & SUGGESTION</div>
            	<div id="s_proverb" style="width:100%; float:left; text-align:center;color:#5d5d5d; font-family:'Segoe UI'; font-size:8px; ">{&nbsp;short description about what you want&nbsp;}</div>
            </div>
    	</div>
        
        <div id="r_form_sign_up">
			<div class="r_title_des" style="font-family:'Segoe UI'; font-size:19px;">You can request suggestion from our site using the following form:</div>
            <div class="r_title_des" style="font-family:'Segoe UI'; font-size:13px;">Before the requesting start, we hope what you request is in the purpose </div>
            <div class="r_title_des" style="font-family:'Segoe UI'; font-size:13px;">of correctness of the system. </div>
            <div class="r_title_des" style="font-family:'Segoe UI'; font-size:13px;">&quot;  CRITICAL FOR DEVELOPMENT! &quot;</div>
            <div class="r_title_des" style="font-family:'Segoe UI'; font-size:13px; padding-top:20px;">
            <div style="color:#636; font-style:italic;"><?php echo $_SESSION["error_message"];?></div>
            <form name="frm_feedback" id="frm_feedback" action="?" method="post">
            <label>Full name<label style="color:#F00;">*</label></label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtfullname" id="txtfullname" class="txtname"/><br />
            <label>E-mail<label style="color:#F00;">*</label></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtemail" id="txtemail" class="txtname"/><br />
            <label>Subject</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtsubject" id="txtsubject" class="txtname"/><br />
            
            
            <div class="r_title_des" style="font-family:'Segoe UI'; font-size:13px; padding-top:10px; padding-bottom:0px;">
            <textarea name="textarea" class="txtdescription"></textarea>
            <script>
				$('.txtdescription').jqte();
			</script>
            </div>
             <div class="r_title_des" style="font-family:'Segoe UI'; font-size:13px; text-align:center;">
             	<input type="submit" value="Send Email" id="btn_suggest" name="btn_suggest"/>            
             </div>
             
             </form>
             </div>
        </div>
        
    </div>
    
    <br class="clear" />
    <div id="s_footer">
    	<?php include('../includes/s_footer.php');?>
        
    </div>
    
</div>
</body>
</html>

<?php
	include('../../class/class.php');
	if($_GET['action']=='' || !$_GET['action']){
	$obj->user_name=$_POST['user_name'];
	$obj->opt_id=$_SESSION['id_operator'];
	$obj->user_gender=$_POST['user_gender'];
	$obj->user_phone=$_POST['user_phone'];
	$obj->user_email=$_POST['user_email'];
	$obj->password=md5($_POST['password']);
	$obj->status=$_POST['status'];
	$obj->chat_status=$_POST['chat_status'];
	}
	if($_GET['do']=='save'){
		if(($_POST['user_name']=='' || $_POST['user_phone']=='') || ($_POST['user_email']=='' || $_POST['password']=='')){
			$_SESSION['show_message']='<div style="color:red;">Please fill all Information...!</div>';
		}else{
			//$photo=$obj->l_upload($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"],'../images/new_user/');
			$obj->photo=$_SESSION['photo_user'];
			$obj->l_saveUsers();
			$_SESSION['show_message']='<div style="color:blue;">Successful Created...!</div>';
			//unset($_SESSION['show_message']);
			if($_SESSION['photo_user']!=""){
				unset($_SESSION['photo_user']);
			}
			//unset($_SESSION['photo_user']);
			header("location:../user");
			
		}
		
	}
	else if($_GET['action']=='edit1'){
		$edit=$obj->l_returnArrayRow("*",TABLE_COUNTER, "where ccm_id='".$_GET['user_id']."'");
		unset($_SESSION['show_message']);
	}
	if($_GET['do']=='edit'){
		$obj->photo=$_SESSION['photo_user'];
		$obj->l_saveUsers('update','where ccm_id="'.$_GET['user_id'].'"');
		$_SESSION['show_message']='<div style="color:blue;">Successful Updated...!</div>';
		unset($_SESSION['photo_user']);
		header("location:../user");
	}
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Reports</title>
<link rel="stylesheet" href="../css/style.css" /><!---style with header--->
<link rel="stylesheet" href="../css/r_style_css.css" type="text/css" />
<script type="text/javascript" src="../js/jquery-2.0.0.min.js"></script>
<script src="../js/jquery.form.js" type="text/javascript"></script>
<script src="../js/new_user.js" type="text/javascript"></script>
<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>
</head>
<body>
	
    	<?php include('../includes/header.php');?><!--content-header-->
        <div id="r_body">
        <form name="users" action="?do=<?php echo ($_GET['action']=='edit1')?'edit&user_id='.$_GET['user_id']:'save'?>" method="post">
    		<div id="r_body_cover">
              <div id="r_column_info">
               	<div class="r_inside_tb_info">
                        	<div class="hold_text_field">
                            	<div class="label_fiel">NAME:</div>
                                <div class="input_text"><input type="text" name="user_name" class="r_tb_info" value="<?php echo $edit['ccm_name']; ?>"/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">PHONE:</div>
                                <div class="input_text"><input type="text" name="user_phone" class="r_tb_info" value="<?php echo $edit['ccm_phone']; ?>"/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">EMAIL:</div>
                                <div class="input_text"><input type="text" name="user_email" class="r_tb_info" value="<?php echo $edit['ccm_email']; ?>"/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">Password:</div>
                                <div class="input_text"><input type="Password" name="password" class="r_tb_info" value=""/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">GENDER:</div>
                                <div class="input_text">
                                <select name="user_gender" class="gender">
                                <option value="1">Male</option>
                                <option value="2" <?php echo ($edit['gender']=="2"?"selected":''); ?>>Female</option>
                                </select>
                                </div>
                            </div>
                  		</div>  
               	<div id="r_column_info_right">
       	  		 <div id="r_photo"><img width="100px" src="../images/new_user/<?php echo $edit['photo']!=''?$edit['photo']:'default.png' ?>" /></div>
                  <div id="r_browse" onclick="document.getElementById('user_photo').click();">Choose image</div>
                </div>
          	</div>
            <div id="r_column_down">
              <div class="r_font_standard">
              			<div id="r_authorized">
              				<table>
                            	<tr>

                                    <td width="86" align="center">CHATS :</td>
                                    <td width="20"><input type="radio" name="chat_status" id="r_accept" value="1" <?php echo ($edit['chat_status']=="1"?"checked":''); ?> /></td>
                                    <td width="92">Accept</td>
                                    <td width="108" align="center">STATUS :</td>
                                    <td width="20"><input type="radio" name="status" id="r_visible" value="1" <?php echo ($edit['ccm_status']=="1"?"checked":''); ?> /></td>
                                    <td width="115">Enable</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type="radio" name="chat_status" id="r_Not_accept" value="0" <?php echo ($edit['chat_status']=="0"?"checked":''); ?>/></td>
                                    <td>Not accept</td>
                                    <td>&nbsp;</td>
                                    <td><input type="radio" name="status" id="r_none" value="0" <?php echo ($edit['ccm_status']=="0"?"checked":''); ?>/></td>
                                    <td>Disable</td>
                                    
                                    
                                </tr>
                                <tr>
                                	<td>&nbsp;</td>
                                	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    
                                </tr>
                                <tr>
                                	<td>&nbsp;</td>
                                	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right"><input type="submit" value="<?php echo ($_GET['action']=='edit1')?'Update':'Save'?>" id="btn_save_user"/></td>
                                    <td>&nbsp;</td>
                                    <td>or &nbsp;<input type="reset" value="Reset" style="border:0px; background:#999; color:#FFF; width:55px; height:23px;" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    
                                </tr>
                                <tr>
                                <td colspan="4"><div id="show_message" style="text-align:center; color:rgb(23, 187, 81);"><?php echo $_SESSION['show_message']; ?></div></td>
                                </tr>
                            
                            </table>
                    	</div>
               </div>
         	</div>
      		</div>
      	</form>
        
        <form name="frm_uploadimage" id="frm_uploadimage"  action="../includes/user_photo.php" method="post" enctype="multipart/form-data">	
        	<input type="file" name="photo" value="Browse" id="user_photo" style="display:none;" />
        </form>
    </div><!--content-all-->
</body>

</html>
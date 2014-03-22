<?php
	include_once '../../class/class.php';
	$state='';
	$opt_id= $_SESSION['id_operator'];
	$sql="Select *from ".TABLE_COMPANY." where user_id='$opt_id'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
	if($num>0){
		$state='1';
		$company=mysql_fetch_array($query);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Reports</title>

<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>

<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/style_report.css" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="../js/script.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" language="javascript" src="../js/getMap_script.js"></script>
</head>

<body>
	<div id="content-all">
    	<?php include('../includes/header.php');?><!--content-header-->
        <div id="body_s">
	<div id="content_s_all">
    	<div id="counter_report_search_com">
        	
        </div>
      <div id="counter_report_s_register">
        	<div id="chart_line">
            	<div id="chart_logo"><img src="../images/set-company.png" width="40px" height="40px" title="chart counter report" alt="chart counter report" /></div>
                <div id="chart_text">Create Shop Profile </a></div>
                <div id="chat_data_show_blank"></div>
                <div id="chat_data_show">
                <a href="../../company_profile/?shop_code=<?php echo $company['com_id'];?>" target="_blank"><?php echo (($state=='1')?'View Profile |':'');?></a> 

                <span class="embed_span" onclick="alert('<script type=\'text/javascript\' language=\'javascript\' src=\'http:\/\/192.168.1.6:81\/IS440\/4\/7. websites\/js\/jquery.min.js\'><\/script>\n<script type=\'text/javascript\' language=\'javascript\' src=\'http:\/\/192.168.1.6:81\/IS440\/4\/7. websites\/js\/jquery.form.js\'><\/script>\n\n<script type=\'text\/javascript\'>\nvar shop_code = <?php echo $company['com_id'];?>;\n\n(function() {\n\tvar lc = document.createElement(\'script\'); \n\tlc.type = \'text\/javascript\'; \n\tlc.async = true; \n\tlc.src = \'http:\/\/192.168.1.6:81\/IS440\/4\/7. websites\/js\/box.js\';\n\tvar s = document.getElementsByTagName(\'script\')[0]; \n\ts.parentNode.insertBefore(lc, s); })();\n<\/script>');">
                    <?php echo ($state==1) ? "Embed Script |":"" ?>
                </span>
               	<a href="../set-promotion/"><?php echo (($state=='1')?'Add Promotion':'');?></a>

              </div>
                
            </div>
            <div id="show_chart_setcompnay">
            
            <div id="logo_com" style="width:400px; text-align:right; margin-left:300px;">
            <form name="frm_comphoto" id="frm_comphoto" action="../includes/shop_logo.php" method="post" enctype="multipart/form-data">
            <input type="file" name="com_logo" id="com_logo" style="display:none;"/>
            
            </form>
            </div>
            
            <form name="<?php echo (($state!='')?'frm_updatcompany':'frm_recompany'); ?>" id="<?php echo (($state!='')?'frm_updatcompany':'frm_recompany'); ?>" action="../includes/main_ad.php" method="post">
            <table width="697" border="0">
              <tr>
                <td width="286" ><label>
                  <input type="text" name="<?php echo (($state!='')?'txt_brandname_update':'txt_brandname'); ?>" id="<?php echo (($state!='')?'txt_brandname_update':'txt_brandname'); ?>" class="text_com" placeholder="Company Name" value="<?php echo $company['com_branch'];?>" />
                </label></td>
                <td width="381"><label style="text-align:right;">
            <div id="photo_view" onclick="document.getElementById('com_logo').click();"><img src="../../images/company_logo/<?php echo $company['com_logo']!=''?$company['com_logo']:'company-icon.png';?>" width="100px"  /></div></label></td>

              </tr>
              <tr>
                <td><label>
                  <input type="text" name="txt_phone" id="txt_phone"  class="text_com" placeholder="Your Company Phone" value="<?php echo $company['com_phone'];?>" />
                </label></td>
                <td><label>
                  <input type="text" name="txt_website" id="txt_website"  class="text_com" placeholder="http://yourcompanywebsite.com" value="<?php echo $company['com_website'];?>" />
                </label></td>
              </tr>
              <tr>
                <td><label>
                  <input type="text" name="txt_email" id="txt_email"  class="text_com" placeholder="Company Email" value="<?php echo $company['com_email'];?>" />
                </label></td>
                <td><label>
                  <input type="text" name="txt_address" id="txt_address"  class="text_com" placeholder="Company Address" value="<?php echo $company['com_address'];?>" />
                </label></td>
              </tr>
              <tr>
                <td height="437" colspan="2"><textarea name="txt_description" cols="80" rows="10" class="text_com_area" placeholder="Company Description"><?php echo $company['com_describtion'];?></textarea>                 &nbsp;</td>
              </tr>
              <tr>
                <td colspan="2">
                            
            <input type="text" class="text_box" id="latitude" name="latitude" value="<?php echo (($state!='')?$company['late']:'11.57337522528485'); ?>" style="display:none;">&nbsp;
            <input type="text" class="text_box" id="longitude" name="longitude" value="<?php echo (($state!='')?$company['longitued']:'104.92080688476562'); ?>" style="display:none;"><br />
            
            <div id="mapCanvas" style="height:300px; width:680px;"></div></td>
              </tr>
              
              <tr>
              <?php 
			  if($state!=''){
			  ?>
              <td align="right";><input name="btn_update_company" type="Submit" value="Update Shop" class="com_btn" />&nbsp;</td>
              <td align="left";><input name="btn_update_company" type="reset" value="Reset" class="com_btn" />&nbsp;</td>
              <?php
			  }else{
			  ?>
              <td align="right";><input name="btn_save_company" type="Submit" value="Save Shop" class="com_btn" />&nbsp;</td>
              <td align="left";><input name="btn_save_company" type="reset" value="Reset" class="com_btn" />&nbsp;</td>
              <?php
			  }
			  ?>
               
               
              </tr>
              <tr>
              <td colspan="2"><div id="show_mess"></div></td>
              </tr>
            </table>
            
            </form>
            
        </div>
          	
            
            
      </div>
    </div>
</div>
    </div><!--content-all-->
</body>

</html>
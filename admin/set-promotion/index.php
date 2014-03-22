<?php
	include '../../class/class.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Administrator Set Promotion</title>
<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>

<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/style_report.css" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="../js/script.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" language="javascript" src="../js/getMap_script.js"></script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
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
                <div id="chart_text">Create Shop Promotion</div>
                <div id="chat_data_show_blank"></div>
                <div id="chat_data_show">
               	 
              </div>
                
            </div>
            <div id="show_chart_setcompnay">
            
            <div id="logo_com" style="width:400px; height:200px; text-align:right; margin-left:20px;">
            <form name="frm_comphoto" id="frm_comphoto" action="../includes/shop_promotion.php" method="post" enctype="multipart/form-data">
            <input type="file" name="com_logo" id="com_logo" style="display:none;"/><label style="text-align:right;">
            <div id="photo_view" style="width:400px;height:200px; color:#FFF;" onclick="document.getElementById('com_logo').click();">Click here to upload image</div></label>
            </form>
            </div>
            
            <form name="frm_setpromotion" id="frm_setpromotion" action="../includes/main_ad.php" method="post">
            <table width="697" border="0" cellpadding="20">
              <tr>
                <td height="437" colspan="2"><textarea name="txt_description_pro" cols="80" rows="10" class="text_com_area" placeholder="Company Description"></textarea></td>
              </tr>
              <tr>
               <td align="right";><input name="btn_save_promotion" type="Submit" value="Save" class="com_btn" />&nbsp;</td>
               <td align="left";><input name="btn_reset" type="reset" value="Reset" class="com_btn" />&nbsp;</td>
              </tr>
            </table>
            </form>
            <table width="690" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
              <?php
			  $opt_id=$_SESSION['id_operator'];
			  $company_id=$obj->convert_idto_other(TABLE_COMPANY,'user_id','com_id',$opt_id);
			  $sql="Select *from ".TABLE_PROMOTION." where com_id='$company_id' and prm_status='1'";
			  $query=mysql_query($sql);
			  while($promotion=mysql_fetch_array($query)){
				  $i=$i+1;
			  ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><img src="../../images/promotion/<?php echo $promotion['prm_image'];?>" width="100px" /></td>
                <td><?php echo $promotion['describtion'];?></td>
                <td class="btn_removepromotion" pormotion_id=<?php echo $promotion['prm_id'];?>>Delete</td>
              </tr>
              <?php 
			  }
			  ?>
            </table>
        </div>
          	
            
            
      </div>
    </div>
</div>
    </div><!--content-all-->
</body>

</html>
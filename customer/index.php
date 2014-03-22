<?php 
include '../class/class.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" />
<title>OSS: Customers</title>
<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>

</head>

<body>

<div id="s_content_all">
	<?php include '../includes/header.php';?>
    
    <div id="l_body">
      <div id="l_c_title" class="l_font_30">SUCCESS CUSTOMERS</div><br /><br />
      <div id="l_c_subtitle" class="l_font_10">{Meet our successful customers who currently using OSS}</div>
      <div id="l_c_company_back">
      <?php
			$sql="Select *from ".TABLE_COMPANY."";
			$query=mysql_query($sql);
			$numrow=mysql_num_rows($query);
				while($company=mysql_fetch_array($query)){
	?>
      
      <div class="l_c_company">
        <div class="l_c_company_mid">
        	
        	<div class="l_c_company_logo"><img src="../images/company_logo/<?php echo ($company['com_logo']!='')?$company['com_logo']:'defaul_logo.jpg'; ?>" width="212" height="185" /></div>
        	<div class="l_c_company_txt">
            <table width="100%" border="0">
  <tr>
    <td class="l_font_24"><?php echo $company['com_branch']; ?></td>
  </tr>
  <tr>
    <td style="font-size:13px;"><?php echo $company['com_describtion']; ?></td>
  </tr>
  <tr>
    <td class="l_right"><a class="l_font_red" href="../company_profile/?shop_code=<?php echo $company['com_id']; ?>">read more >></a></td>
  </tr>
</table>
            </div>
            
        </div>
      </div>  
     
      <?php
			}
	 ?>
      </div> 
      

      
    </div>
  <br class="clear" />
    <?php
	include '../includes/s_footer.php';
	?>
    
</div>
</body>
</html>

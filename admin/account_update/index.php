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
                <div id="chart_text" style="font-size:24px;">Account Information</div>
                <div id="chat_data_show_blank"></div>
                <div id="chat_data_show">
               	 
              </div>
                
            </div>
            <div id="show_chart_setcompnay">
            	<div class="text_info" style="font-size:18px;"><strong> The account status</strong>: <?php if($_SESSION['package']==0){echo "Free";}else if($_SESSION['package']==1){echo "Premium";}else{echo "Golden";};?> Account</div>
                <div class="text_info" style="font-size:18px;">&diams; Total counter: <?php if($_SESSION['package']==0){echo "3";}else if($_SESSION['package']==1){echo "10";}else{echo "20";};?> counters</div>
                <div class="text_info" style="font-size:18px;">&diams; Counter used: <?php echo $obj->check_new_opt($_SESSION['id_operator']);?> counters</div>
                <div class="text_info" style="font-size:18px;">&diams; This account will expired on :<?php echo date("Y-M-d", strtotime($_SESSION['expired_date']));?></div>
                
                <div class="text_info" style="font-size:18px; margin-top:10px;">
                <?php if($_SESSION['package']==0){
					?>
                    <button type="button" class="btn_upgrade" id="1" operterator="<?php echo $_SESSION['id_operator'];?>">Upgrade Premium Account</button>
                    <button type="button" class="btn_upgrade" id="2" operterator="<?php echo $_SESSION['id_operator'];?>">Upgrade Golden Account</button>
                    <?php
				}else if($_SESSION['package']==1){
					?>
                    <button type="button" class="btn_upgrade" id="2" operterator="<?php echo $_SESSION['id_operator'];?>">Upgrade Golden Account</button>
                    <?php
				}else{
					?>
                    <button type="button" class="btn_upgrade" id="2" operterator="<?php echo $_SESSION['id_operator'];?>">Upgrade to continue golden</button>
                    <?php
				};?>
            		
            	</div>
                
                 <div class="text_info" style="font-size:10px; margin-top:10px;font-family:Arial, Helvetica, sans-serif;">
                 When you upgrade your account, Your account  will disable account, untill you connect your admin to aproval : <strong>012 022 022 / 011 433 343</strong>
                 </div>
                
        	</div>
          	
            
            
      </div>
    </div>
</div>
    </div><!--content-all-->
</body>

</html>
<?php
	include("../../class/class.php");
	if($_GET["action"]=="view_counter"){
		$count_id=$_GET["counter_id"];
		$user=$obj->l_returnArrayRow('*',TABLE_COUNTER, 'where ccm_id ='.$count_id);
	}
	
	if($_GET["action"]=="delete" && $_GET["user_id"]!=""){
		$obj->l_saveUsers('delete','where ccm_id="'.$_GET["user_id"].'"');
		header("location:./");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Reports</title>
<link rel="stylesheet" href="../css/style.css" /><!---style with header--->
<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>

<link rel="stylesheet" type="text/css" hr href="../css/stylesheet/index.css" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet/normalize.css" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet/base.css" />
<link rel="stylesheet" type="text/css" href="../css/tooltipster.css" />
<script type="text/javascript" src="../js/jquery.tooltipster.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			 $('.tooltip').tooltipster();
		});
</script>
</head>

<body>
	<div id="content-all">
    	<?php include('../includes/header.php');?><!--content-header-->
        <div id="l_content_body">
	<div id="l_body">
    	<div id="l_body_left">
        	<div class="l_online l_font_16">
            Status  
            </div> 
            <div class="l_whole_user"> 
            <?php
				$i=1;
				$user_id= $_SESSION['id_operator'];
				//echo $user_id;
				$sql=$obj->l_returnArray('*',TABLE_COUNTER, "where ccm_status=1 and chat_status='1' and user_id='".$user_id."'");
				while($counter=mysql_fetch_array($sql)){
			?>
           			<a href="?action=view_counter&counter_id=<?php echo $counter['ccm_id']?>"><!--online_status=1-->
                    
                    <div class="l_user">
						 <span style="color:<?php echo ($counter['online_status']=='1')?'#093;':'#666;'?>; font-size:23px;">&bull;</span>
						 <?php echo $counter['ccm_name']; ?>
                    </div>
                    </a>
           		
          	<?php
		   			$i++;
					}
		   ?>
           </div>
           
            
            <div class="l_online l_font_16">
           	Not Chat
           </div>
            <div class="l_whole_user">
            <?php
				$i=1;
				$user_id=$_SESSION['id_operator'];
				$sql=$obj->l_returnArray('*',TABLE_COUNTER, "where chat_status=0 and ccm_status=1  and user_id='".$user_id."'");
				while($counter=mysql_fetch_array($sql)){
			?>
           		
					<a href="?action=view_counter&counter_id=<?php echo $counter['ccm_id']?>">
                    <div class="l_user">
           			<?php echo $counter['ccm_name']; ?>
                     </div> 
            	 </a>
          		
           		<?php
		   		$i++;
				}
		  		 ?>
            </div>
            <div class="l_online l_font_16">
           	Disable
           </div>
            <div class="l_whole_user">
            <?php
				$i=1;
				$sql=$obj->l_returnArray('*',TABLE_COUNTER, "where ccm_status=0 and user_id='".$user_id."'");
				while($counter=mysql_fetch_array($sql)){
			?>
           		
					<a href="?action=view_counter&counter_id=<?php echo $counter['ccm_id']?>">
                    <div class="l_user">
           			<?php echo $counter['ccm_name']; ?>
                    </div> 
            	 	</a>
          		 
           		<?php
		   		$i++;
				}
		  		 ?>
            </div> 
           <input type="button" style="border:none" class="l_btn_new" value="New User" onclick="window.location.href='../new_user'"  />
        </div>
        <div id="l_body_right">
<div id="l_info">
            	<div id="l_photo"><img width="100px" src="../images/new_user/<?php echo ($user['photo']=="")?"default.png":$user['photo'] ?>" /></div>
                <div id="l_name">
				  <div class="l_height_30 l_bold"><?php echo (($user['ccm_name']!='')?$user['ccm_name']:'None'); ?></div>
				  <div class="l_height_30 l_font_12"><?php echo ($user['gender']=='1'?'Male':'Female'); ?></div>
				  <div class="l_height_30 l_font_12"><?php echo (($user['ccm_phone']!='')?$user['ccm_phone']:'None'); ?></div>
				</div>
          </div>
            <div id="l_contract">
            <table border="0">
  <tr>
    <td width="38%" align="right">Email: </td>
    <td width="62%"><?php echo (($user['ccm_email']!='')?$user['ccm_email']:'None'); ?></td>
  </tr>
</table>

          </div>
          <div id="l_u_sign">
          	<section style="display:inline">
          			<span class="tooltip l_sign_chat" title="Chat"><div class="l_number"><?php echo $obj->Total_coulnter_chated_miss($user['ccm_id'],1);?>+</div>
         			</span>
          	</section>
          	<section style="display:inline">
          			<span class="tooltip l_sign_favorite" title="Favorite"><div class="l_number"><?php echo $obj->get_satify($user['ccm_id']);?></div>
         			</span>
          	</section>
          	<section style="display:inline">
          			<span class="tooltip l_sign_misschat" title="MissChat"><div class="l_number"><?php echo $obj->Total_coulnter_chated_miss($user['ccm_id'],0);?>+</div>
         			</span>
          	</section>
	      </div>
          <div class="l_button">
          <form name="frm_user" method="post" action="">
          <table width="100%" border="0">
  <tr>
    <td width="81%">
    <?php
	if($_GET['action']!=''){
	?>
    <a href="?action=delete&user_id=<?php echo $_GET['counter_id']; ?>" onclick="return confirm('Do you want to delete?');"><ul class="l_btn_delete">Delete</ul></a>
    <?php
	}
	?>    </td>
    <td width="19%" height="44">
    <?php
	if($_GET['action']!=''){
		?>
        <input type="button" onclick="window.location.href='../new_user?action=edit1&user_id=<?php echo $_GET['counter_id']; ?>'" style="border:hidden" class="l_btn_edit" value="Edit" />
        <?php
	}
	?></td>
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
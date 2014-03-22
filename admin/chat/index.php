<?php

if(session_id() == '') {
		session_start();
	}
	
	include("../../class/_class.php");
	//echo 'ccm_id: '.$_SESSION['ccm_id'];
	session_write_close();
	$obj = new Operations();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator | dashboard</title>
<link rel="stylesheet" href="../../chat_mode/css/easy-responsive-tabs.css" />
<link rel="stylesheet" href="../../chat_mode/css/style.css" />

<script type="text/javascript" language="javascript" src="../../chat_mode/js/jquery.min.js"></script>
<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>


<script type="text/javascript" language="javascript" src="../../chat_mode/js/jquery.form.js"></script>

<script type="text/javascript" language="javascript" src="../../chat_mode/js/easyResponsiveTabs.js"></script>

<script type="text/javascript" language="javascript" src="../../chat_mode/js/script_back.js"></script>


<!--popup-->
<script type="text/javascript" src="../../chat_mode/js/jquery.ulightbox.js"></script>
<link rel="stylesheet" type="text/css" href="../../chat_mode/css/jquery.ulightbox.css" />
<!--end-->


<style>
	#pop-online-opt {
		max-height: 70px; 
		overflow-y: scroll;	
	}
	#pop-online-opt li {
		/*color: #666;*/
		padding:3px;
		font-size: 11px;
	}
	#pop-online-opt li:hover{
		background: #39F;
		color: #FFF;
		font-size: 11px;
		cursor: pointer;
	}
	.active_online_opt {
		font-weight: bold;
		color: #39F;
	}
</style>
</head>

<body>   
	<div id="content-all">
    	<?php include('../includes/header.php');?>
        <div id="account-menu" style="width: 182px; height:75px; background: url(images/account-click.png) no-repeat; position: fixed; right: 60px;top:42px; display:none">
            <div class="log-action" style="position:absolute; top: 17px; right: 60px;">
            	<ul class="log-action-menu">
                	<li>
                    	<span>Swich account</span>
                    </li>
                    <li>
                    	<span>Sign out</span>
                    </li>
                </ul>
            </div>
            <img src="images/avatar-log.png" style="position:absolute; top: 17px; right:10px;" />
        </div>
        
		<input type="hidden" id="c-visitor" />
        <input type="hidden" id="ccm_id" value="<?php echo $_SESSION['ccm_id'];?>" />
        <div id="content-body">
        	<?php
			$has_chat_message = $obj->has_chat_message($_SESSION['ccm_id']);
            if(mysql_num_rows($has_chat_message) == 0){
			
			//if(!isset($_SESSION['ccm_id'])){
			//if(false){
			?>
        		<h1 style="text-align:center">Currently, you don't have any conversation yet!</h1>
        	<?php
            }else{
			?>
        	<div id="main-body">
            	<!--vertical Tabs-->
                <div id="verticalTab">
                    <ul class="resp-tabs-list">
                    	<?php
						
						$query = $obj->get_visitors($_SESSION['ccm_id']); // get the current counter id

						$v = array();
						while($row = mysql_fetch_array($query)){
							$v[] = $row['vis_id'];
							$visitor = $obj->get_name($row['vis_id'], "tbl_visitors", "vis_id=".$row['vis_id']);
						?>
                            <li data-id="<?php echo $row['vis_id']?>">
                                <img src="../images/avatar.png" />
                                <span class="v-name"><?php echo $visitor['vis_name']?></span>
                                <span class="v-geo"><?php echo $visitor['vis_email']?></span>
                            </li>
                        <?php
						}
						?>
                       
                    </ul>
                    <div class="resp-tabs-container">
                    	<?php

                        for($row = 0; $row < mysql_num_rows($query); $row++){
						?>
                        <div class="box-wrapper" style="position:relative;">
                        	<div class="chat-header">
                            	<ul class="chat-menu fr">
                                	<li>
                                    	<img src="../images/history-chat.png" class="img-history" title="send history" alt="send history" />
                                    </li>
                                    <li>
                                    	<img src="../images/switch.png" class="switch_opt" id="switch_opt" title="switch operator" alt="switch operator" />
                                    </li>
                                </ul>
                            </div>
                            
                          <ul id="<?php echo 'chatMessageList-'.$v[$row] ?>" class="chatMessageList" style="margin-top: 40px;margin-bottom: 56px;"></ul>
                            
						   <div class="text-chat-wrapper">
                           		<div class="loading">
                                	<img src="../../chat_mode/images/fb-load.gif" />
                                </div>
                                
                                <span class="attach" onclick="document.getElementById('<?php echo 'file-'.$v[$row] ?>').click();">
                                </span>
                                
                                <form name="<?php echo 'form_'.$v[$row]; ?>" class="formPostChat" id="<?php echo 'form_'.$v[$row]; ?>" action="../../chat_mode/js/ajax/ajaximage.php" method="post" enctype="multipart/form-data">
                                	<input type="file" style="display:none;" class="files" id="<?php echo 'file-'.$v[$row] ?>" name="<?php echo 'files_'.$v[$row].'[]' ?>" multiple="multiple" />
                                    
	                                <input class="postText" name="postText" type="text" />
                                    <button id="<?php echo 'send-'.$v[$row]; ?>" class="send" >send</button>
                                </form>
                                <div class="result"></div>
                           </div>
                        </div>
                        <?php
						}
						?>
                       
                        </div>
                    </div>
                </div>
                <div class="cls"></div>
            </div>
            <div class="cls"></div>
            <?php
			}
			?>
        </div><!--content-body-->
    </div><!--content-all-->
    <div id="switch-result" style="position:absolute; bottom:0;">
    	<ol id="list-switch-result"></ol>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
		
		$('.switch_opt').click(function() {
			uLightBox.alert({
				width: '500px',
				title: '200px',
				rightButtons: ['OK'],
				leftButtons: ['Cancel'],
				opened: function() {
					<?php
						$get_current_shop_id = $obj->return_row("*", "tbl_counter_companies", "ccm_id=".$_SESSION['ccm_id']);
						$opt_onlines = $obj->return_array("*", "tbl_counter_companies", "where ccm_id <> ".$_SESSION['ccm_id']."  and ccm_status='1' and chat_status='1' and online_status='1' and user_id = ".$get_current_shop_id['user_id']);
						if(mysql_num_rows($opt_onlines) > 0){
					?>
					$('<div />').html(
									   "<ol id='pop-online-opt'>" +
									   <?php
									  
									  
									   
									   while($rows = mysql_fetch_array($opt_onlines)){
									   ?>
									   "<li data-id='<?php echo $rows['ccm_id']; ?>' class='lb' onclick='$(\".lb\").removeClass(\"active_online_opt\");$(this).addClass(\"active_online_opt\")'><?php echo $rows['ccm_name']?></li>" +
									   <?php
									   }
									   ?>
									   "</ol>"
									   ).appendTo('#lbContent');
					$('<div />').html("<textarea cols='54' rows='5' id='memo' placeholder='short description...'></textarea>").appendTo("#lbContent");
				<?php
						}else{
							?>
								$('<div />').html("<h2 id=\"no-opt\" style=\"text-align:center; color: red\">No operator online!</h2>").appendTo("#lbContent");						
							<?php
						}
				?>
				},
				onClick: function(button) {
					console.log(button);
				}
			});
		});
		
		
		
    });
</script>
</html>
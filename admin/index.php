<?php
include '../class/class.php';
include 'class/block_atemp.php';
if($_GET['action']=="logout"){
	$obj->logout();
	header("Location:../");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Reports</title>
<link rel="stylesheet" href="css/style.css" /><!---style with header--->
<script type="text/javascript" language="javascript" src="js/jquery-1.6.3.min.js"></script>

</head>

<body>
	<div id="content-all">
    	
        <div id="content-header">
        	<div class="header">
                <div id="admin-logo" class="fl">
                    <img src="images/admin-logo.png" />
                </div>
                
                <div id="menu-lists" class="fl">
                    <ul>
                    	<?php if(isset($_SESSION['position_counter'])){?>
                    	<!--chart-->
                        <li><a href="chat">
                        	<span class="ico chat"></span>
                            <span class="ico-text">CHAT</span>
                            </a>
                        </li>
                        <?php }else if(isset($_SESSION['position_opterator'])){?>
                        <!--history-->
                        <li><a href="history">
                        	<span class="ico history"></span>
                             <span class="ico-text">HISTORY</span>
                            </a>
                        </li>
                        <!--user-->
                        <li><a href="user">
                        	<span class="ico users"></span>
                             <span class="ico-text">USERS</span>
                            </a>
                        </li>
                        <!--report_shop-->
                        <li><a href="report_shop">
                        	<span class="ico report"></span>
                             <span class="ico-text">REPORT</span>
                            </a>
                        </li>
                        <!--Company-->
                        <li><a href="set-company">
                        	<span class="ico report"></span>
                             <span class="ico-text">Company</span>
                            </a>
                        </li>
                        <?php }else{?>
                        <!--report admin-->
                        <li><a href="report_admin">
                        	<span class="ico report"></span>
                             <span class="ico-text">REPORT</span>
                            </a>
                        </li>
                        <!--control operator-->
                        <li><a href="control-operator">
                        	<span class="ico report"></span>
                             <span class="ico-text">CONTROL</span>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                
                <div id="sca" class="fl">
                    <div class="config fl text-center">
                    	<img src="images/config.png" />
                    </div>
                    <div class="account fl text-center">
                    	<h5 id="current-account"><?php echo ucwords($_SESSION['name']); ?> | <a href="?action=logout">Log out</a></h5>
                    </div>
                </div><!--sca-->
            </div>
        </div><!--content-header-->
        <div id="message" style="width:100%; height:auto; margin-top:50px; font-size:20px; text-align:center;"><img src="images/gochat.png" /></div>
       
    </div><!--content-all-->
</body>

</html>
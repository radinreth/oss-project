<?php
if($_GET['action']=="logout"){
	include_once("../../class/class.php");
	$obj->logout();
	header("Location:../../");
}
?>
<div id="content-header">
        	<div class="header">
                <div id="admin-logo" class="fl">
                    <img src="../images/admin-logo.png" />
                </div>
                
                <div id="menu-lists" class="fl">
                    <ul>
                        <?php if(isset($_SESSION['position_counter'])){?><!--counter function-->
                    	<!--chart-->
                        <li><a href="../chat">
                        	<span class="ico chat"></span>
                            <span class="ico-text">CHAT</span>
                            </a>
                        </li>
                        <?php }else if(isset($_SESSION['position_opterator'])){?> <!--operator function-->
                        <!--history-->
                        <li><a href="../history">
                        	<span class="ico history"></span>
                             <span class="ico-text">HISTORY</span>
                            </a>
                        </li>
                        <!--user-->
                        <li><a href="../user">
                        	<span class="ico users"></span>
                             <span class="ico-text">USERS</span>
                            </a>
                        </li>
                        <!--report_shop-->
                        <li><a href="../report_shop">
                        	<span class="ico report"></span>
                             <span class="ico-text">REPORT</span>
                            </a>
                        </li>
                        <!--company profile-->
                        <li><a href="../set-company">
                        	<span class="ico report"></span>
                             <span class="ico-text">Company</span>
                            </a>
                        </li>
                        
                        <?php }else{?><!--Admin function-->
                        <!--report admin-->
                        <li><a href="../report_admin">
                        	<span class="ico report"></span>
                             <span class="ico-text">REPORT</span>
                            </a>
                        </li>
                        <!--control operator-->
                        <li><a href="../control-operator">
                        	<span class="ico report"></span>
                             <span class="ico-text">CONTROL</span>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                
                <div id="sca" class="fl">
                    <div class="config fl text-center">
                    	<img src="../images/config.png" />
                    </div>
                    <div class="account fl text-center">
                    	<h5 id="current-account" style="cursor:pointer;"><?php echo ucwords($_SESSION['name']); ?> | <a href="?action=logout">Log out</a></h5>
                    </div>
                    <div class="cls"></div>
                </div><!--sca-->
            </div>
        </div>
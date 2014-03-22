<?php
include '../class/block_atemp.php';
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
                        <li><a href="../chat/?page=chat">
                        	<span class="ico chat"></span>
                            <span class="ico-text <?php echo (($_GET['page'])=='chat'?'active_manu':''); ?>">CHAT</span>
                            </a>
                        </li>
                        <?php }else if(isset($_SESSION['position_opterator'])){?> <!--operator function-->
                        <!--history-->
                        <li><a href="../history/?page=history">
                        	<span class="ico history"></span>
                             <span class="ico-text <?php echo (($_GET['page'])=='history'?'active_manu':''); ?>">HISTORY</span>
                            </a>
                        </li>
                        <!--user-->
                        <li><a href="../user/?page=user">
                        	<span class="ico users"></span>
                             <span class="ico-text <?php echo (($_GET['page'])=='user'?'active_manu':''); ?>">USERS</span>
                            </a>
                        </li>
                        <!--report_shop-->
                        <li><a href="../report_shop/?page=re_sh">
                        	<span class="ico report"></span>
                             <span class="ico-text <?php echo (($_GET['page'])=='re_sh'?'active_manu':''); ?>">REPORT</span>
                            </a>
                        </li>
                        <!--company profile-->
                        <li><a href="../set-company/?page=company">
                        	<span class="ico report"></span>
                             <span class="ico-text <?php echo (($_GET['page'])=='company'?'active_manu':''); ?>">Company</span>
                            </a>
                        </li>
                        
                        <?php }else{?><!--Admin function-->
                        <!--report admin-->
                        <li><a href="../report_admin/?page=report_ad">
                        	<span class="ico report"></span>
                             <span class="ico-text <?php echo (($_GET['page'])=='report_ad'?'active_manu':''); ?>">REPORT</span>
                            </a>
                        </li>
                        <!--control operator-->
                        <li><a href="../control-operator/?page=control">
                        	<span class="ico report"></span>
                             <span class="ico-text <?php echo (($_GET['page'])=='control'?'active_manu':''); ?>">CONTROL</span>
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
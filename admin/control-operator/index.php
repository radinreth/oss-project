<?php 
include '../../class/class.php';
if($_GET['action']=='search'){
	$opt_id=$_POST['txt_opt'];
	$sql="Select *from ".TABLE_USER." where user_id='$opt_id'";
}else{
	$sql="Select *from ".TABLE_USER."";
}
$query=mysql_query($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator | Control Operator</title>
<link rel="stylesheet" href="../css/easy-responsive-tabs.css" />
<link rel="stylesheet" href="../css/style.css" />
<link href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>
<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" language="javascript" src="../js/easyResponsiveTabs.js"></script>
<script language="javascript" type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<body>
	<div id="content-all">
    	<?php include('../includes/header.php');?>
        <!--content-header-->
        <div id="account-menu" style="width: 182px; height:75px; background: url(../images/account-click.png) no-repeat; position: fixed; right: 60px;top:42px; display:none">
            <div class="log-action" style="position:absolute; top: 17px; right: 60px;">
            	<ul class="log-action-menu">
                	<li>
                    	<span><a href="javascript:;">Swich account</a></span>
                    </li>
                    <li>
                    	<span><a href="javascript:;">Sign out</a></span>
                    </li>
                </ul>
            </div>
            <img src="../images/avatar-log.png" style="position:absolute; top: 17px; right:10px;" />
        </div>
        <div id="content-body">
        	<div id="content-operator">
            	  <div id="operator-search">
            	  		<div id="operator-search-form">
                        	<form name="frm_search_opt" id="" method="post" action="?action=search">								
	            	  			<input type="text" placeholder="radin reth" class="textbox-search" name="txt_opt" value="<?php echo $_POST['txt_opt'];?>">
	            	  			<input type="submit" class="button-search" value="">
                            </form>	            	  		
            	  		</div>
            	  		
            	  </div>  
            	  <div id="wrap-content-operator">
            	  		<div id="operator-list">
							<table width="100%" cellspacing='3' background-color='#e4e2e2'>
								<tr>
									<th>No</th>
									<th>Name</th>
                                    <th>Phone</th>
                                    <th>E-mail</th>
									<th>Registerd Date</th>
									<th>Packaged</th>
									<th colspan="2">Action</th>
								</tr>
                                <?php
								$i=0;
								while($operator=mysql_fetch_array($query)){
									$i=$i+1;
								?>
    								<tr>
                                        <a href="javascript:;">
    									<td><?php echo $i;?></td>
    									<td class="btn_show" user_id="<?php echo $operator['user_id'];?>"><?php echo $operator['user_name'];?></td>
                                        <td class="btn_show" user_id="<?php echo $operator['user_id'];?>"><?php echo $operator['user_phone'];?></td>
    									<td class="btn_show" user_id="<?php echo $operator['user_id'];?>"><?php echo $operator['user_email'];?></td>
    									<td class="btn_show" user_id="<?php echo $operator['user_id'];?>"><?php echo $operator['register_date'];?></td>
    									<td>
										<?php  
										if($operator['package']=='0'){
											echo "Free";
										}else if($operator['package']=='1'){
											echo "Premium";
										}else{
											echo "Individual";
										}
										?>
                                        </td>
                                        
    									<td>
                                        <?php if($operator['status']=='1'){?>
                                        OK
                                        <?php }else{ if($operator['package']=='0'){
											echo "OK";
										}else{?>
                                        	<input type="checkbox" value="1" class="btn_confirm"  user_code="<?php echo $operator['user_id'];?>">Confirm
                                        <?php }}?>
                                        </td>
    									<td>
                                        <?php
										if($operator['status']=='2'){
										?>
                                        	&nbsp;Disable
                                         <?php
										}else{
										?>
                                        <input type="checkbox" value="0" class="btn_block"  user_code="<?php echo $operator['user_id'];?>">Disable
                                        <?php 
										}
										?>  
                                        </td>	
                                        </a>
    								</tr>                                
								<?php
								}
								?>
							</table>
						</div>
            	  		<div id="operator-details">
            	  			<!--ajax comeing here-->
                            <div class="operator-profile">
            	  				<div class="operator-image"><img src="../../images/company_logo/company-icon.png" alt="Defual" width="77px" height="77px"></div>
            	  				<div class="operator-content">
                                    <div class="operator-name"> NONE</div>
                                    <div class="operator-email">Email:NONE</div>
                                    <div class="operator-phone">Tel: NONE</div>
                                    <div class="operator-address">
                                        Address<br>
                                        <div class="font-normal">© 2013 GoChat corporation, Cambodia </div>
                                        <div class="font-normal">NONE </div>
                                        <div class="font-normal">NONE</div>
                                    </div>
                                </div>

            	  			</div>
							<div class="operator-maps"> 
            <div id="mapCanvas" style="height:200px;"><a target="new" href="http://maps.google.com.kh/maps?ll=11.57724313747634,104.91891860961914&z=16&t=m&q=11.57724313747634,104.91891860961914"><img src="../images/control-operator/operator-maps.png" style="cursor:pointer;" title="Please click to see shop location" title="Please click to see shop location"/></a></div></div>
                          <!--  end ajax-->
                            
            	  		</div>
            	  </div> 
            </div>
            <div class="cls"></div>
        </div><!--content-body-->
    </div><!--content-all-->
</body>
</html>
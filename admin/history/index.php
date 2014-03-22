<?php
	include('../../class/class.php');
	$operator_id=$_SESSION['id_operator'];
	//echo $operator_id;
	$sql="Select * from ".TABLE_COUNTER." where user_id='$operator_id'";
	//echo $sql;
	$arr=$obj->ReturnArray($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator | History</title>
<link rel="stylesheet" href="../css/easy-responsive-tabs.css" />
<link rel="stylesheet" href="../css/style_h.css" />
<link rel="stylesheet" href="../css/style-operator.css" />
<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>
<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>

<!-- <script src="../js/jquery-ui.js"></script> -->

<script src="../js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" language="javascript" src="../js/easyResponsiveTabs.js"></script>

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
        	<div id="main-body">
            	<!--vertical Tabs-->
                <?php
				if(mysql_num_rows($arr)>0){
				?>
                <div id="content">
					<div id="wrap-filter">
						<div id="filter-text">Filters chat by : </div>						
						<div id="wrap-filter-menu">
							<ul id="filter-menu">
								<li>
									<a href="">Date</a>
									<ul>
                                    <!--new edit-->
										<li><a href="?action=today&date=<?php echo date('Y-m-d');?>">Today</a></li>
										<li><a href="?action=yesterday&date=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' - 1 days'));?>">Yesterday</a></li>
										<li><a href="?action=lastweek&date=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' - 7 days'));?>">Last Week</a></li>
										<!--<li><a href="javascript:;">Custom Date</a></li>-->
                                        <!--new edit-->
									</ul>
								</li>
								<li>
									<a href="">Rate</a>
									<ul>
                                    <!--new edit-->
										<li><a href="?action=rated&rated=rate">Rated</a></li>
										<!-- <li><a href="?ratacted=not">Not Rated</a></li> -->
										<li><a href="?action=good&rated=good">Rated good</a></li>
										<li><a href="?action=bad&rated=bad">Rated bad</a></li>
                                        <!--new edit-->
									</ul>
								</li>
								<!--<li><a href="">Type</a></li>-->								
							</ul>
							<div class="cls"></div>					
						</div>
						<div class="cls"></div>				
					</div>					
					<div id="verticalTab">
						
						
						<?php
						if(mysql_num_rows($arr)>0){
							while ($row=mysql_fetch_array($arr)){				
						?>
                        <ul class="resp-tabs-list">
							<li class="filter-wrap-content">																			
									<span class="filter-image"><img src="../images/history/chat.png"></span>
									<span class="filter-title_v"><?php echo strtoupper($row['ccm_name']);?></span>
									<span class="filter-time" style="float:right"><?php echo $row['add_datetime'];?></span>	
							</li>
                            
                        </ul>
                        
                 		<div class="resp-tabs-container">
                        
							<div><!--new edit-->
                                    	<?php
										if($_GET['action']=="today"){
											$today=$_GET['date'];
											$sql="Select *from ".TABLE_CHART." where ccm_id=".$row['ccm_id']." and add_datetime>'$today' order by ccm_id desc";
										}else if($_GET['action']=="yesterday"){
											$yesterday=$_GET['date'];
											$sql="Select *from ".TABLE_CHART." where ccm_id=".$row['ccm_id']." and add_datetime>'$yesterday' order by ccm_id desc";
										}else if($_GET['action']=="lastweek"){
											$lastweek=$_GET['date'];
											$sql="Select *from ".TABLE_CHART." where ccm_id=".$row['ccm_id']." and add_datetime>'$lastweek' order by ccm_id desc";
										}else if($_GET['action']=="rated"){
											$sql="Select *from ".TABLE_CHART." where ccm_id=".$row['ccm_id']." and rated!='0' order by ccm_id desc";
										}else if($_GET['action']=="bad"){
											$sql="Select *from ".TABLE_CHART." where ccm_id=".$row['ccm_id']." and rated>0 and rated<=3 order by ccm_id desc";
										}else if($_GET['action']=="good"){
											$sql="Select *from ".TABLE_CHART." where ccm_id=".$row['ccm_id']." and rated>3 order by ccm_id desc";
										}else{
											$sql="Select *from ".TABLE_CHART." where ccm_id=".$row['ccm_id']." order by ccm_id desc";
										}
										
										//echo $sql;
										$query1=mysql_query($sql);
										$num_row1=mysql_num_rows($query1);
										if($num_row1>0){
											while($message=mysql_fetch_array($query1)){
										?>
                                        <p>
                                        <span class="chat-details">
										
										<span class="chat-des">
											<span class="chat-users" style="font-size:13px;"><?php echo ':: '.$obj->return_single("vis_name",VISITORS,'vis_id='.$message['vis_id']);?></span>
											<span class="chat-text"><?php echo htmlspecialchars($message['chm_msg']); ?></span>
										</span>
                                        <span class="chat-time" style="font-size:10px;"><?php echo (($message['chm_who']=='1')?'Counter message':'Visitor message'); ?></span>
                                        <span class="chat-time"><?php echo $message['add_datetime']; ?></span>
                                        <div class="cls"></div>
										</span>	
                                        <div class="cls"></div>
                                        </p>
                                         <?php
										    }
										} else {
										?>
                                        	<div>Not yet chat</div>
                                        <?php	
										}
										?>
								
							</div>
                              
						</div>
                     
						<?php
							}
						}
						?>
						
                        
						
                        
					</div>
				</div>
                <?php
				}else{
				?>
                	<div> 
                    	<h2 style="text-align:center">No Counter yet!</h2>
                    </div>
                <?php
				}
				?>
                <div class="cls"></div>
            </div>
            <div class="cls"></div>
        </div><!--content-body-->
    </div><!--content-all-->
</body>
<script language="javascript" type="text/javascript" src="../js/script.js"></script>
</html>
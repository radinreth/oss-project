<?php
	include '../../class/class.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Reports</title>

<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>

<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/style_report.css" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/graph_google.js"></script>
<?php
		if($_GET['action']=="submit"){
			$count_id=$_POST['text_search_counter'];
		
			$arr_month_chat=$obj->Total_counter_chate_monthly($count_id);
		  	$array_chat=json_encode($arr_month_chat);
		}
		if($_GET['action']=='submit_month'){
			$count_id=$_GET['count_id'];
			$arr_month_chat=$obj->Total_counter_chate_monthly($count_id);
		  	$array_chat=json_encode($arr_month_chat);
		}
		if($_GET['action']=='submit_year'){
			
			$count_id=$_GET['count_id'];
			$arr_month_chat=$obj->Total_chat_report_yearly($count_id);
		  	$array_chat=json_encode($arr_month_chat);
		}
		  	  
?>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable(<?php echo $array_chat; ?>);
        // Create and draw the visualization.
        new google.visualization.ColumnChart(document.getElementById('show_chart')).
            draw(data,
                 {title:"",
                  width:697, height:215,backgroundColor:'#e4e5e7'}
            );
      }
      

      google.setOnLoadCallback(drawVisualization);
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
    </script>
</head>

<body>
	<div id="content-all">
    	<?php include('../includes/header.php');?><!--content-header-->
        <div id="body_s">
	<div id="content_s_all">
    	<div id="counter_report_search">
        	<form name="frm_search_counter" action="?action=submit" method="post" id="frm_search_counter">
            	<select name="text_search_counter" id="text_search_counter" class="text_search_counter" onchange="document.getElementById('frm_search_counter').submit();">
                	<option>Select counter</option>
                	<?php 
					$opt_id=$_SESSION['id_operator'];
					$sql="Select *from ".TABLE_COUNTER." where user_id='$opt_id'";
					echo $sql;
					$query=mysql_query($sql);
					$numrow=mysql_num_rows($query);
					if($numrow>0){
						while($counter=mysql_fetch_array($query)){
					?>
            	  		<option value="<?php echo $counter['ccm_id'];?>" <?php echo ($_POST['text_search_counter']==$counter['ccm_id'])?'Selected':'';?>><?php echo $counter['ccm_name'];?></option>
                  	<?php
						}
					}else{
					?>
                    <option>No counter to seach</option>
                    <?php
					}
					?>
          	  </select>
            	<!--<input type="submit" value="Search" style="width:120px; height:28px; margin-top:2px;" />-->
            </form>
        </div>
      <div id="counter_report_s">
        	<div id="chart_line">
            	<div id="chart_logo"><img src="../images/chat_logo.png" title="chart counter report" alt="chart counter report" /></div>
                <div id="chart_text">CHART</div>
                <div id="chat_data_show_blank"></div>
                <div id="chat_data_show">
               	 [<a href="?action=submit_month&count_id=<?php echo $_POST['text_search_counter']; ;?><?php echo $_GET['count_id'];?>">Month</a>]&nbsp;&nbsp;[<a href="?action=submit_year&count_id=<?php echo $_POST['text_search_counter']; ;?><?php echo $_GET['count_id'];?>">Year</a>]
                </div>
                
            </div>
            <div id="show_chart"></div>
          	<div id="queued_visitor" class="show_calculator_chart">
            	<div class="icons_data_show"><img src="../images/queuse_visitor.png" /></div>
                <div class="text_data_meaning">QUEUED VISITORS</div>
                <div class="chart_data_s"><?php echo $_SESSION['avg_miss'];?> /month</div>
          	</div>
            <div id="queued_visitor" class="show_calculator_chart">
            	<div class="icons_data_show"><img src="../images/heart_chart.png" /></div>
                <div class="text_data_meaning">VISITORS SATISFACTION</div>
                <div class="chart_data_s"><?php echo $_SESSION['avg_quality'];?>%</div>
          	</div>
            <div id="queued_visitor" class="show_calculator_chart">
            	<div class="icons_data_show"><img src="../images/house_icons.png" /></div>
                <div class="text_data_meaning">AVAILABITITY</div>
               
                <div class="chart_data_s"><?php echo $obj->ccm_available($count_id);?></div>
          	</div>
      </div>
    </div>
</div>
    </div><!--content-all-->
</body>

</html>
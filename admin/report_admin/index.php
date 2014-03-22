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
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <?php 
		$arr_month_register=$obj->Total_counter_register_monthly();
		$array_reg=json_encode($arr_month_register);
		
		$arr_month_fanace=$obj->Total_counter_finace_monthly();
		$arry_fin=json_encode($arr_month_fanace);
		//print_r($arry_fin);
	?>
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable(<?php echo $array_reg;?>);
      
        // Create and draw the visualization.
        new google.visualization.ColumnChart(document.getElementById('show_chart')).
            draw(data,
                 {title:"",
                  width:697, height:215,backgroundColor:'#e4e5e7'}
        );
      }
      
      google.setOnLoadCallback(drawVisualization);
	  
    </script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $arry_fin;?>);
        var options = {
          title:"",
                  width:697, height:215,backgroundColor:'#e4e5e7'
        };

        var chart = new google.visualization.LineChart(document.getElementById('show_chart_income'));
        chart.draw(data, options);
      }
    </script>

</head>

<body>
	<div id="content-all">
    	<?php include('../includes/header.php');?><!--content-header-->
        <div id="body_s_adm">
	<div id="content_s_all_adm">
    	<div id="counter_report_search_adm">
        	Filters by:&nbsp;&nbsp;[<a href="">Month</a>]&nbsp;&nbsp;<!--[<a href="">Year</a>]-->
        </div>
      <div id="counter_report_s_adm">
      		<!--income statement-->
        	<div id="chart_line">
            	<div id="chart_logo"><img src="../images/chat_report.png" title="chart counter report" alt="chart counter report" /></div>
                <div id="chart_text">REGISTRATION ACCOUNT</div>
                <div id="chat_data_show_blank"></div>
                <div id="chat_data_show">
               	 
                </div>
                
            </div>
            <div id="show_chart"></div>
            
            <!--income statement-->
            <div id="chart_line" style="margin-top:20px;">
            	<div id="chart_logo"><img src="../images/grap_report.png" title="chart counter report" alt="chart counter report" /></div>
                <div id="chart_text">FINANCIAL REPORT</div>
                <div id="chat_data_show_blank"></div>
                <div id="chat_data_show">
               	 
                </div>
                
            </div>
            <div id="show_chart_income"></div>
            
          	<div id="queued_visitor" class="show_calculator_chart">
            	<div class="icons_data_show"><img src="../images/total_imcome.png" /></div>
                <div class="text_data_meaning">TOTAL INCOME</div>
                <div class="chart_data_s"><label style="color:#930;">$<?php echo $_SESSION['total_income'];?></label></div>
          	</div>
            <div id="queued_visitor" class="show_calculator_chart">
            	<div class="icons_data_show"><img src="../images/operator_total.png" /></div>
                <div class="text_data_meaning">TOTAL OPERATOR</div>
                <div class="chart_data_s"><label style="color:#930;"><?php echo $_SESSION['total_opt']; ?></label></div>
          	</div>
            <div id="queued_visitor" class="show_calculator_chart_adm">
            	<div class="icons_data_show_recent_confirm"><img src="../images/total_confirm.png" /></div>
                <div class="text_data_meaning_admin">RECENT CONFIRM<br />TOTAL DEACTIVE ACCOUNT</div>
                <div class="chart_data_s_adm"><label style="color:#930;"><?php echo $obj->Total_active_account();?></label><br /><label style="color:#930;"><?php echo $obj->Total_disactive_account();?></label></div>
          	</div>
      </div>
    </div>
</div>
    </div><!--content-all-->
</body>

</html>
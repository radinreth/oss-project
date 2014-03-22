
<?php
  include('../class/class.php');
  define('PAGE_TITLE','support');
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" />



<script type="text/javascript" src="../lib/jquery.js"></script>
<script type="text/javascript" src="../lib/chili-1.7.pack.js"></script>
  
<script type="text/javascript" src="../lib/jquery.easing.js"></script>
<script type="text/javascript" src="../lib/jquery.dimensions.js"></script>
<script type="text/javascript" src="../js/jquery.accordion.js"></script>
<title>OSS : Support</title>
<script type="text/javascript">
		jQuery().ready(function(){ 
        jQuery('#list2').accordion({
              event: 'mouseover',
              active: '.selected',
              selectedClass: 'active',
              animated: "bounceslide",
              header: "dt"
          }).bind("change.ui-accordion", function(event, ui) {
            jQuery('<div>' + ui.oldHeader.text() + ' hidden, ' + ui.newHeader.text() + ' shown</div>').appendTo('#log');
          });
          jQuery('#list3').accordion({
              event: 'mouseover',
              active: '.selected',
              selectedClass: 'active',
              animated: "bounceslide",
              header: "dt"
          }).bind("change.ui-accordion", function(event, ui) {
            jQuery('<div>' + ui.oldHeader.text() + ' hidden, ' + ui.newHeader.text() + ' shown</div>').appendTo('#log');
          });
          jQuery('#list4').accordion({
              event: 'mouseover',
              active: '.selected',
              selectedClass: 'active',
              animated: "bounceslide",
              header: "dt"
          }).bind("change.ui-accordion", function(event, ui) {
            jQuery('<div>' + ui.oldHeader.text() + ' hidden, ' + ui.newHeader.text() + ' shown</div>').appendTo('#log');
          });

  });
</script>
<style type="text/css">
    #result
  {
    position:absolute;
    width:500px;
    padding:10px;
    display:none;
    margin-top:-1px;
    border-top:0px;
    overflow:hidden;
    border:1px #CCC solid;
    background-color: white;
  }
  .show
  {
    padding:10px; 
    border-bottom:1px #999 dashed;
    font-size:15px; 
    height:50px;
  }
  .show:hover
  {
    background:#4c66a4;
    color:#FFF;
    cursor:pointer;
  }
</style>
</head>

<body>
<div id="s_content_all">
	<?php include '../includes/header.php';?>
    
    
    
    <div id="l_body">
      	<div id="l_s_title">
        <table width="100%" border="0">
  <tr>
    <td class="l_font_help l_font_30">Help and support</td>
  </tr>
  <tr>
    <td class="l_font_10">Clearing out your problem with GOCHAT helpful docs</td>
  </tr>
</table>
        </div>
       <!--  <div id="l_s_search">
        	<div id="l_s_search_box">
        		<div id="l_s_search_box_left"></div>
           		<input id="l_s_search_box_mid" class="search" style="border:hidden" type="text" placeholder="Type and search" />
              <div id="result"></div>
            	<div id="l_s_search_box_right"></div>
            </div>
            <div id="l_s_search_btn_left"></div>
           	<input style="border:hidden" id="l_s_search_btn_mid" type="button" value="Search" />
            <div id="l_s_search_btn_right"></div>
        </div> -->
        
        <div class="l_s_back">
        	<div class="l_s_sign_left"></div>
            <div class="l_s_sign_mid">
            	<div class="l_s_title_txt l_font_24 l_font_frequancy">
                Frequently Asked Questions
                </div>
                <div class="l_s_txt">
                  <dl id="list2">
                    <?php
					$sql="select * from ".KNOWLEDGES. " where type='3'";
                    $newsql=$sql;
                    $result=$obj->ReturnArray($newsql); 
                    if(mysql_num_rows($result)){
                      while($arr=mysql_fetch_array($result)){               
                    ?>
                      <dt>
                        <!-- <img src="../images/support/point.png" width="13" height="13" /> -->
                        <div class="l_font_sky" style="font-weight:bolder;"><?php echo $arr['kno_ques'];?></div>
                      </dt>
                     
                      <dd>
                        <?php echo $arr['kno_ans'];?>
                      </dd>
                    <?php
                      }
                    }  
                    ?>   
                  </dl>                  
                </div>
            </div>
            <div class="l_s_sign_right"></div>
        </div>
        <div class="l_s_back">
        	<div class="l_s_get_left"></div>
            <div class="l_s_sign_mid">
            	<div class="l_s_title_txt l_font_frequancy l_font_24">
                Get started!
                </div>
                <div class="l_s_txt">
                  <dl id="list3">
                    <?php
					$sql="select * from ".KNOWLEDGES." where type='1'";
                    $newsql=$sql;
                    $result=$obj->ReturnArray($newsql); 
                    if(mysql_num_rows($result)){
                      while($arr=mysql_fetch_array($result)){               
                    ?>
                      <dt>
                        <!-- <img src="../images/support/point.png" width="13" height="13" /> -->
                        <div class="l_font_sky" style="font-weight:bold;"><?php echo $arr['kno_ques'];?></div>
                      </dt>
                      <dd>
                        <?php echo $arr['kno_ans'];?>
                      </dd>
                    <?php
                      }
                    }  
                    ?> 
                                        
                  </dl>
                </div>
            </div>
            <div class="l_s_sign_right"></div>
        </div>
        <div class="l_s_back">
        	<div class="l_s_best_left"></div>
            <div class="l_s_sign_mid">
            	<div class="l_s_title_txt l_font_24 l_font_frequancy">
                Best practices
                </div>
                <div class="l_s_txt">
                    <dl id="list4">
                    <?php
					$sql="select * from ".KNOWLEDGES. " where type='2'";
                    $newsql=$sql;
                    $result=$obj->ReturnArray($newsql); 
                    if(mysql_num_rows($result)){
                      while($arr=mysql_fetch_array($result)){               
                    ?>
                      <dt>
                        <div class="l_font_sky" style="font-weight:bold;"><?php echo $arr['kno_ques'];?></div>
                      </dt>
                     
                      <dd>
                        <?php echo $arr['kno_ans'];?>
                      </dd>
                    <?php
                      }
                    }  
                    ?>                      
                     
                  </dl>
                </div>
            </div>
            <div class="l_s_sign_right"></div>
        </div>          
    </div>
  <br class="clear" />
    <?php
	include '../includes/s_footer.php';
	?>
    
</div>
</body>
</html>

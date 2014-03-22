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
            Online 
            </div>
           <div class="l_user">
           	Songleang
           </div> 
           <div class="l_online l_font_16">
           	Offline
           </div>
           <div class="l_user">
           	Rotha
           </div> 
           <input type="button" style="border:none" class="l_btn_new" value="New User" onclick="window.location.href='../new_user'"  />
        </div>
        <div id="l_body_right">
<div id="l_info">
            	<div id="l_photo"></div>
                <div id="l_name">
                <table width="80%" border="0">
  <tr>
    <td class=" l_bold">Songleang</td>
  </tr>
  <tr>
    <td>Male</td>
  </tr>
  <tr>
    <td style="font-size:14px">070904645</td>
  </tr>
</table>

</div>
          </div>
            <div id="l_contract">
            <table width="85%" border="0">
  <tr>
    <td width="38%" align="right">Job Title:</td>
    <td width="62%">Customer support</td>
  </tr>
  <tr>
    <td align="right">Email:</td>
    <td>radin.reth@gmail.com</td>
  </tr>
</table>

            </div>
          <div id="l_u_sign">
          	<section style="display:inline">
          			<span class="tooltip l_sign_chat" title="Chat"><div class="l_number">99+</div>
         			</span>
          	</section>
          	<section style="display:inline">
          			<span class="tooltip l_sign_favorite" title="Favorite"><div class="l_number">99+</div>
         			</span>
          	</section>
          	<section style="display:inline">
          			<span class="tooltip l_sign_misschat" title="MissChat"><div class="l_number">99+</div>
         			</span>
          	</section>
	      </div>
          <input type="button" style="border:hidden" id="l_btn_edit" value="Edit" />

            
      </div>
        
    </div>
</div>
    </div><!--content-all-->
</body>

</html>
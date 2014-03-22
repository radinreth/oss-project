<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Reports</title>
<link rel="stylesheet" href="../css/style.css" /><!---style with header--->
<link rel="stylesheet" href="../css/r_style_css.css" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>
</head>

<body>
	<div id="content-all">
    	<?php include('../includes/header.php');?><!--content-header-->
        <div id="r_body">
    	<div id="r_body_cover"> 
     
             
              <div id="r_column_info">
               		
                    	<div class="r_inside_tb_info">
                        	<div class="hold_text_field">
                            	<div class="label_fiel">NAME:</div>
                                <div class="input_text"><input type="text" class="r_tb_info"/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">PHONE:</div>
                                <div class="input_text"><input type="text" class="r_tb_info"/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">JOB TITLE:</div>
                                <div class="input_text"><input type="text" class="r_tb_info"/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">EMAIL:</div>
                                <div class="input_text"><input type="text" class="r_tb_info"/></div>
                            </div>
                            <div class="hold_text_field">
                            	<div class="label_fiel">GENDER:</div>
                                <div class="input_text">
                                <select class="gender">
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                                </div>
                            </div>
                          
                            
                            
                       
                  		</div>
                    
               	<div id="r_column_info_right">
                	
       	  		  <div id="r_photo"></div>
                  <div id="r_browse" onclick="document.getElementById('brow_photo').click();">Choose image</div>
                  <input type="file" value="Browse" id="brow_photo" style="display:none;" />
                 	
                </div>
          </div>
      
              <div id="r_column_down">
              <div class="r_font_standard">
              			<div id="r_authorized">
                        	
              				<table>
                            	<tr>
                                	<td width="108">PERMISION:</td>
                                	<td width="20"><input type="radio" name="normal" id="r_normal" /></td>
                                    <td width="97">Normal</td>
                                    <td width="86" align="center">CHATS:</td>
                                    <td width="20"><input type="radio" name="accept" id="r_accept" /></td>
                                    <td width="92">Accept</td>
                                    <td width="108" align="center">VISIBILITY:</td>
                                    <td width="20"><input type="radio" name="visible" id="r_visible" /></td>
                                    <td width="115">Visible</td>
                                </tr>
                                <tr>
                                	<td>&nbsp;</td>
                                	<td><input type="radio" name="admin" id="r_admin"/></td>
                                    <td>Administrator</td>
                                    <td>&nbsp;</td>
                                    <td><input type="radio" name="Not_accept" id="r_Not_accept"/></td>
                                    <td>Not accept</td>
                                    <td>&nbsp;</td>
                                    <td><input type="radio" name="none" id="r_none"/></td>
                                    <td>None</td>
                                    
                                    
                                </tr>
                                <tr>
                                	<td>&nbsp;</td>
                                	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    
                                </tr>
                                <tr>
                                	<td>&nbsp;</td>
                                	<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right"><input type="button" value="Save" id="btn_save_user"/></td>
                                    <td>&nbsp;</td>
                                    <td>or&nbsp;&nbsp; Cancel</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    
                                </tr>
                                
                            
                            </table>
                    </div>
                    </div>
          
          </div>
             
      </div>
      </div>
    </div><!--content-all-->
</body>

</html>
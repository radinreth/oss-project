<?php
//din
if(session_id() == '') {
		session_start();
	}
	include_once("../class/_class.php");
	
	//echo $_SESSION['ccm_id'];
	if(!(isset($_SESSION['ccm_id']) && $_SESSION['ccm_id'] != "" && $_SESSION['ccm_id'] != NULL) or ($_SESSION['ccm_id']==-1)){
		$obj = new Operations();
		$_SESSION['ccm_id'] = $obj->get_ccm();

		//echo '-> '.$_SESSION['ccm_id'];

		session_write_close();
	}
  //echo '--> '.$_SESSION['ccm_id'];
//***
?>

<?php
include '../class/class.php';
$shop_code=$_GET['shop_code'];

$check=mysql_num_rows(mysql_query("Select com_id from ".TABLE_COMPANY." where com_id='$shop_code'"));
if($check==0){
	header("location:../not_found/");
}
if($shop_code==''){
	header("location:../not_found/");
}

$commpany=$obj->get_shop_detial($shop_code);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="SHORTCUT ICON" href="http://www.ffg-cambo.com/oss-mekong/images/commons/icons.png"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="online, supporting, system, cambodia, connection, improve, business, organization"  />
<meta name="description" content="online supporting system helps your organization to connect with your customers in a convenience way and effectively improve business profit" />

<!--flexslider-->
<!--<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />-->
<link rel="stylesheet" type="text/css" href="../css/stylesheet/index.css" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet/normalize.css" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet/base.css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />

<!--din-->
<link rel="stylesheet" type="text/css" href="../chat_mode/css/base.css" />
<link rel="stylesheet" type="text/css" href="../chat_mode/css/index.css" />
<!--***-->

<!--din-->
<script type="text/javascript" language="javascript" src="../chat_mode/js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../chat_mode/js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="../chat_mode/js/script.js"></script>
<!--***-->

<!--***<script type="text/javascript" language="javascript" src="js/jquery-2.0.3.js"></script>-->
<script type="text/javascript" language="javascript" src="js/main.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="../js/getMap_script.js">
<!--/*=============Facebook comment==============*/-->

<!--=============Map==================-->
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>-->
<!--/*    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>*/-->


<script type="text/javascript">
 $('document').ready(function(){
							  
	$('.login').click(function(){
		$('#login_container').toggleClass("show-hide");
	});
	
 });
</script>

<script src="js/modernizr.js"></script>
<title>Shop Profile</title>
</head>
<body>
<input type="hidden" id="inserted_vis_id" value="<?php echo $_SESSION['vis_id']; ?>" />
<input type="hidden" id="ccm_id" value="<?php echo $_SESSION['ccm_id']; ?>" />

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="contain-wrapper">
	<!--din-->
    <div class="chat-box">
    	<?php
        if($_SESSION['ccm_id']==-1){
		?>
        	<h5>No counter available!</h5>
        <?php
		}else{
		?>
            <h5>Chat now!</h5>
            <img src="../chat_mode/images/like.png" class="ico-fb" id="like" />
            <img src="../chat_mode/images/dislike.png" class="ico-fb" id="dislike" />
            <?php
			//echo $_SESSION['vis_id'];
            if(!isset($_SESSION['vis_id'])){
            ?>
                <div id="basic-info">
                    <h3>Basic Information</h3>
                    <input type="text" placeholder="name" value="radin" id="u_name">
                    <input type="text" placeholder="email" value="radin@yoolk.com" id="u_email">
                    <input type="button" value="ok" id="basic-btn">
                    <h6 id="basic-saving"></h6>
                </div>
            <?php
            }
            ?>
            
            <ul id="chatMessageList"></ul>
                                  
            <form name="formPostChat" class="formPostChat" id="formPostChat" action="../chat_mode/js/ajax/ajaximageClient.php" method="post" enctype="multipart/form-data">
                <input type="file" class="filePostChat" id="filePostChat" name="filePostChat[]" multiple="multiple" />
                <div style="background: #fff; text-align:center; display:none;" id="client-load-img">
                    <img src="../chat_mode/images/fb_loader.gif">
                </div>
                <input type="text" placeholder="write your message here" id="chm_msg">
                <button id="send" class="send" >send</button>
             </form>
             <div class="result"></div>
         <?php
         }
		 ?>
    </div>
    <!--***-->
    <header>
    	<section id="logo">
        	<a href="./"><img src="../images/commons/logo.png" alt="gochat logo" /></a>
            <div id="date_show">Thu, 04-July-2013 23:25</div>
        </section>
        <nav id="nav-top">
        	<ul>
            	<a href="../"><img src="../images/commons/ico/home.png" alt="nav home" />&nbsp;&nbsp;<li class="active" style="color:#09F;">Home</li></a>
                <a href="../benefits"><img src="../images/commons/ico/services.png" alt="nav service" />&nbsp;&nbsp;<li>Benefit</li></a>
                <a href="../price"><img src="../images/commons/ico/price.png" alt="nav price" />&nbsp;&nbsp;<li>Price</li></a>
            	<a href="../about"><img src="../images/commons/ico/about.png" alt="nav about" />&nbsp;&nbsp;<li>About</li></a>
                <a href="../contact"><img src="../images/commons/ico/contact.png" alt="nav contact" />&nbsp;&nbsp;<li>Contact</li></a>

           </ul>
        </nav>
        <section id="header-button">
        	<span class="button-top login"><a href="../log_in/" style="text-decoration:none; color:#FFF;">Log in</a></span>
        	<!--login-->
            
            <!--end login-->
        </section>
        
    </header>
    <section id="contain-body">
        	<div id="l_c_body">
            	<div id="l_c_left">
       	    <div id="l_c_contract">

                    	<div id="l_c_photo"><img src="../images/company_logo/<?php echo $commpany["com_logo"];?>" width="79" /></div>
                        <div id="l_c_title_shop">
                        <table width="95%" border="0">
  <tr>
    <td class="l_border_bottom"><?php echo $commpany["com_branch"];?></td>
  </tr>
  <tr>
    <td class="l_font_10" style="font-size:14px;">Email:&nbsp;<?php echo $commpany["com_email"];?></td>
  </tr>
  <tr>
    <td class="l_font_10" style="font-size:13px;">Tel:&nbsp;<?php echo $commpany["com_phone"];?></td>
  </tr>
</table>

        </div>
                    </div>
                <div id="l_c_map">
                	<div id="l_c_map_show">
						<div id="map-canvas">
                       <!-- <img border="0" alt="Points of Interest in Lower Manhattan" src="http://maps.googleapis.com/maps/api/staticmap?zoom=13&size=670x230&maptype=roadmap
&markers=color:blue%7Clabel:S%7C<?php //echo $commpany["late"];?>,<?php //echo $commpany["longitued"];?>&markers=color:green%7Clabel:G%7C<?php //echo $commpany["late"];?>,<?php //echo $commpany["longitued"];?>
&markers=color:red%7Clabel:C%7C<?php //echo $commpany["late"];?>,<?php //echo $commpany["longitued"];?>&sensor=false"></img>-->
<input type="text" class="text_box" id="latitude" name="latitude" value="<?php echo (($company['late']!='')?$company['late']:'11.57337522528485'); ?>" style="display:none;">
<input type="text" class="text_box" id="longitude" name="longitude" value="<?php echo (($company['longitued']!='')?$company['longitued']:'104.92080688476562'); ?>" style="display:none;">
            
            <div id="mapCanvas" style="height:230px; width:680px;"></div>
</div>
                    </div>
                    <div id="l_c_map_address">
                    <table style="text-align:right" width="100%" border="0">
  <tr>
    <td>© 2013 GoChat corporation, Cambodia</td>
  </tr>
  <tr>
    <td><?php echo $commpany["com_describtion"];?></td>
  </tr>
  <tr>
    <td>GoChat is the best way to improve your Company...!</td>
  </tr>
</table>

                    </div>
                
                </div>
              </div>
                <div id="l_c_right">
                <?php 
				$sql="select *from ".TABLE_PROMOTION." where com_id='$shop_code' and prm_status='1' limit 3";
			   	$query=mysql_query($sql);

				$numrow=mysql_num_rows($query);
				if($numrow>0){

			   	while($result=mysql_fetch_array($query)){
				?>
           	    <div class="l_c_news">
                    	<div class="l_c_sign"><img src="../images/company_profile/sign.png" width="40" height="47" /></div>
                        <div class="l_c_text">
                       	  <div class="l_c_title">
                            	<?php echo $result['describtion'];?>
                          </div>
                          <div class="l_c_letter">
                            <img src="../images/promotion/<?php echo $result['prm_image'];?>" width="292"/>
                          </div>
                          <!--<div class="l_c_read"><a style="text-decoration:none" href="#">Read More >></a></div>-->
                        </div>
                  </div>
                <?php }}else{?>
                <div class="l_c_news">
                <div class="l_c_sign"><img src="../images/company_profile/sign.png" width="40" height="47" /></div>
                
                <div class="l_c_text">
                       	  <div class="l_c_title">
                            	The Promotion coming soon..!
                          </div>
                          <div class="l_c_letter">
                            
                          </div>
                          <!--<div class="l_c_read"><a style="text-decoration:none" href="#">Read More >></a></div>-->
                        </div>
                </div>
                <div class="l_c_news">
                <div class="l_c_sign"><img src="../images/company_profile/sign.png" width="40" height="47" /></div>
                
                <div class="l_c_text">
                       	  <div class="l_c_title">
                            	Get More promotion here, come sooz..!
                          </div>
                          <div class="l_c_letter">
                            
                          </div>
                          <!--<div class="l_c_read"><a style="text-decoration:none" href="#">Read More >></a></div>-->
                        </div>
                </div>
                <div class="l_c_news">
                <div class="l_c_sign"><img src="../images/company_profile/sign.png" width="40" height="47" /></div>
                
                <div class="l_c_text">
                       	  <div class="l_c_title">
                            	Discount , Korb Sri morng :) coming soon..!
                          </div>
                          <div class="l_c_letter">
                            
                          </div>
                          <!--<div class="l_c_read"><a style="text-decoration:none" href="#">Read More >></a></div>-->
                        </div>
                </div>
                <?php
				}
				?>
                </div>
                
            </div>
            
        <div id="l_c_comment">
			<div class="fb-comments" data-href="http://ffg-cambo.com/oss-mekong/company_profile/?shop_code=<?php echo $_Get['shop_code'];?>" data-width="1150px" data-numposts="5" data-colorscheme="light"></div>

        </div>
        
        <section id="device-support">
        	<ul>
            	<li><img src="../images/commons/desktop.png" alt="desktop" /></li>
                <li><img src="../images/commons/laptop.png" alt="laptop" /></li>
                <li><img src="../images/commons/tablet.png" alt="tablet" /></li>
                <li><img src="../images/commons/phone.png" alt="phone" /></li>
            </ul>
        </section>
<section id="device-name">
        	<ul>
            	<li>Desktop</li>
                <li>Laptop</li>
                <li>Tablet</li>
                <li>Phone</li>
            </ul>
            <img src="../images/commons/color-line.png" alt="color line"/>
        </section>
    </section>
    <footer>
    	<div style="float:left;">
            <nav id="nav-bottom">
                <ul>
                    <li><a href="about" style="text-decoration:none;">About</a></li>
                    <li><a href="customer" style="text-decoration:none;">Customers</a></li>
                    <li><a href="support" style="text-decoration:none;">Support</a></li>
                </ul>
                <ul>
                    
                    <li><a href="contact" style="text-decoration:none;">Contact</a></li>
                    <li><a href="feedback" style="text-decoration:none;">Feedback</a></li>
                </ul>
            </nav>
            <section id="copy-right">
                <aside>
                    <img src="../images/commons/logo-bottom.png" alt="logo goChat bottom" />
                </aside>
                <aside>
                    <span class="string-copy-right">&copy; 2013 GoChat corporation, Cambodia</span>
                </aside>
                <aside><span class="string-copy-right">All rights reserved</span></aside>
            </section>
        </div>
        <section id="social-share">
       <!-- twitter -->
        	<a href="https://twitter.com/share"  data-url="http://beta.thmey365.com" data-text="hello" data-via="sobothsim" data-size="large" data-count="none"><img src="../images/commons/share-twitter.png" alt="share twitter" /></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        	<!--end twitter -->
            <!-- facebook -->
            <a href="#" 
              onclick="
                window.open(
                  'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('http://ffg-cambo.com/oss-mekong'), 
                  'facebook-share-dialog', 
                  'width=626,height=436'); 
                return false;">  
            <img src="../images/commons/share-facebook.png" alt="share facebook" />
            </a>
            <!-- facebook end -->
            <!-- google pluse -->
            <a href="https://plus.google.com/share?url={http://beta.thmey365.com}" onClick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="../images/commons/share-gplus.png" alt="share google pluse" /></a>
  
            <!-- end google pluse -->
            
        </section>
        <section id="term-condition" >
        	<span><a href="../term_condition/" style="color:#FFF;">Terms &amp; Conditions</a></span>
            <span><a href="../term_condition/" style="color:#FFF;">Privacy Policy</a></span>
        </section>
    </footer>
</div>

  <!-- jQuery -->
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="../js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
</body>
</html>
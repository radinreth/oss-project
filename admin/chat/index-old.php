<?php 
include '../../class/class.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator | dashboard</title>
<link rel="stylesheet" href="../css/easy-responsive-tabs.css" />
<link rel="stylesheet" href="../css/style.css" />
<script type="text/javascript" language="javascript" src="../js/jquery-1.6.3.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/easyResponsiveTabs.js"></script>
<script language="javascript" type="text/javascript">
 $(document).ready(function() {
	$("#current-account").click(function(){
		
		if ($("#account-menu").css( "display") == 'none' ) {
			$("#account-menu").css( "display", "block" );
		}else{
			$("#account-menu").css( "display", "none" );
		}
	});
 });
</script>
</head>

<body>
	<div id="content-all">
    	<?php include('../includes/header.php');?>
        
        <div id="account-menu" style="width: 182px; height:75px; background: url(../images/account-click.png) no-repeat; position: fixed; right: 60px;top:42px; display:none">
            <div class="log-action" style="position:absolute; top: 17px; right: 60px;">
            	<ul class="log-action-menu">
                	<li>
                    	<span>Swich account</span>
                    </li>
                    <li>
                    	<span>Sign out</span>
                    </li>
                </ul>
            </div>
            <img src="../images/avatar-log.png" style="position:absolute; top: 17px; right:10px;" />
        </div>
        <div id="content-body">
        	<div id="main-body">
            	<!--vertical Tabs-->
                <div id="verticalTab">
                    <ul class="resp-tabs-list">
                        <li>
                        	<img src="../images/avatar.png" />
                        	<span class="v-name" style="position: absolute; left:47px; top: 10px;">John Savage</span>
                            <span class="v-geo" style="position: absolute; left:47px; top: 25px;">Phnom Penh, Cambodia</span>
                        </li>
                        <li>
                        	<img src="../images/avatar.png" />
                        	<span class="v-name" style="position: absolute; left:47px; top: 10px;">John Savage</span>
                            <span class="v-geo" style="position: absolute; left:47px; top: 25px;">Phnom Penh, Cambodia</span>
                        </li>
                        <li>
                        	<img src="../images/avatar.png" />
                        	<span class="v-name" style="position: absolute; left:47px; top: 10px;">John Savage</span>
                            <span class="v-geo" style="position: absolute; left:47px; top: 25px;">Phnom Penh, Cambodia</span>
                        </li>
                        <li>
                        	<img src="../images/avatar.png" />
                        	<span class="v-name" style="position: absolute; left:47px; top: 10px;">John Savage</span>
                            <span class="v-geo" style="position: absolute; left:47px; top: 25px;">Phnom Penh, Cambodia</span>
                        </li>
                        <li>
                        	<img src="../images/avatar.png" />
                        	<span class="v-name" style="position: absolute; left:47px; top: 10px;">John Savage</span>
                            <span class="v-geo" style="position: absolute; left:47px; top: 25px;">Phnom Penh, Cambodia</span>
                        </li>
                    </ul>
                    <div class="resp-tabs-container">
                    
                        <div class="box-wrapper" style="position:relative;">
                        	<div style="position:fixed;height: 30px;border-bottom:1px solid #888; width:549px; background:white">
                            	<ul class="chat-menu fr">
                                	<li>
                                    	<img src="../images/history-chat.png" />
                                    </li>
                                    <li>
                                    	<img src="../images/switch.png" />
                                    </li>
                                </ul>
                            </div>
                            <p style="margin-top: 40px;margin-bottom: 56px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor orci quam, sit amet facilisis lorem molestie non. Aenean aliquet tortor eget consectetur scelerisque. Sed adipiscing dui a semper mollis. Vivamus quis erat quis magna vestibulum consequat nec vitae est. Quisquella nunc semper in. Nulla vestibulum scelerisque tincidunt. Aliquam id dui a lectus dictum convallis. Vestibulum euismod justo mollis, accumsan mauris laoreet, tristique magna. Maecenas imperdiet mauris massa, sit amet egestas dui venenatis id. Quisque consectetur elit quis turpis placerat, in sodales elit placerat. Proin felis neque, elementum facilisis varius quis, venenatis sed dolor. </p>
						   <div style="position:fixed;height: 56px;width:564px; border-top:1px; background:url(../images/box-chat-bg.png) repeat-x; bottom:72px;border-radius: 3px;left:513px;">
                            	<input type="text" style="height: 23px; width:537px; margin:14px 10px;" />
                           </div>
                        </div>
                        
                        <div class="box-wrapper" style="position:relative;">
                        	<div style="position:fixed;height: 30px;border-bottom:1px solid #888; width:549px; background:white">
                            	<ul class="chat-menu fr">
                                	<li>
                                    	<img src="../images/history-chat.png" />
                                    </li>
                                    <li>
                                    	<img src="../images/switch.png" />
                                    </li>
                                </ul>
                            </div>
                            <p style="margin-top: 40px;margin-bottom: 56px;"> Morbi varius at nulla vitae luctus. Curabitur molestie magna justo, in aliquet justo euismod ac. Curabitur accumsan gravida risus, a fringilla nunc semper in. Nulla vestibulum scelerisque tincidunt. Aliquam id dui a lectus dictum convallis. Vestibulum euismod justo mollis, accumsan mauris laoreet, tristique magna. Maecenas imperdiet mauris massa, sit amet egestas dui venenatis id. Quisque consectetur elit quis turpis placerat, in sodales elit placerat. Proin felis neque, elementum facilisis varius quis, venenatis sed dolor. </p>
						   <div style="position:fixed;height: 56px;width:564px; border-top:1px; background:url(../images/box-chat-bg.png) repeat-x; bottom:72px;border-radius: 3px;left:513px;">
                            	<input type="text" style="height: 23px; width:537px; margin:14px 10px;" />
                           </div>
                        </div>
                        
                        <div class="box-wrapper" style="position:relative;">
                        	<div style="position:fixed;height: 30px;border-bottom:1px solid #888; width:549px; background:white">
                            	<ul class="chat-menu fr">
                                	<li>
                                    	<img src="../images/history-chat.png" />
                                    </li>
                                    <li>
                                    	<img src="../images/switch.png" />
                                    </li>
                                </ul>
                            </div>
                            <p style="margin-top: 40px;margin-bottom: 56px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor orci quam, sit amet facilsectetur elit quis turpis placerat, in sodales elit placerat. Proin felis neque, elementum facilisis varius quis, venenatis sed dolor. </p>
						   <div style="position:fixed;height: 56px;width:564px; border-top:1px; background:url(../images/box-chat-bg.png) repeat-x; bottom:72px;border-radius: 3px;left:513px;">
                            	<input type="text" style="height: 23px; width:537px; margin:14px 10px;" />
                           </div>
                        </div>
                        
                        <div class="box-wrapper" style="position:relative;">
                        	<div style="position:fixed;height: 30px;border-bottom:1px solid #888; width:549px; background:white">
                            	<ul class="chat-menu fr">
                                	<li>
                                    	<img src="../images/history-chat.png" />
                                    </li>
                                    <li>
                                    	<img src="../images/switch.png" />
                                    </li>
                                </ul>
                            </div>
                            <p style="margin-top: 40px;margin-bottom: 56px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor orci quam, sit amet facilisis lorlla nunc semper in. Nulla vestibulum scelerisque tincidunt. Aliquam id dui a lectus dictum convallis. Vestibulum euismod justo mollis, accumsan mauris laoreet, tristique magna. Maecenas imperdiet mauris massa, sit amet egestas dui venenatis id. Quisque consectetur elit quis turpis placerat, in sodales elit placerat. Proin felis neque, elementum facilisis varius quis, venenatis sed dolor. </p>
						   <div style="position:fixed;height: 56px;width:564px; border-top:1px; background:url(../images/box-chat-bg.png) repeat-x; bottom:72px;border-radius: 3px;left:513px;">
                            	<input type="text" style="height: 23px; width:537px; margin:14px 10px;" />
                           </div>
                        </div>
                        
                        
                       <div class="box-wrapper" style="position:relative;">
                        <div style="position:fixed;height: 30px;border-bottom:1px solid #888; width:549px; background:white">
                            <ul class="chat-menu fr">
                                <li>
                                    <img src="../images/history-chat.png" />
                                </li>
                                <li>
                                    <img src="../images/switch.png" />
                                </li>
                            </ul>
                        </div>
                        <p style="margin-top: 40px;margin-bottom: 56px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor orci quam, sit amet facilisis lorem molestie non. Aenean aliquet tortor eget consectetur scelerisque. Sed adipiscing dui a semper mollis. Vivamus quis erat quis magna vestibulum consequat nec vitae est. Quisque nibh libero, dapibus et dignissim et, interdum egestas velit. Cras porttitor volutpat dui, in vehicula lorem euismod adipiscing. Suspendisse malesuada dolor in lectus imperdiet, id mattis ipsum suscipit. Curabitur aliquet mi vitae erat vulputate condimentum. Nam odio felis, malesuada at eleifend quis, imperdiet a sem. Vivamus a porttitor ipsum.

Vivamus gravida tristique urna at eleifend. Aliquam in ipsum quam. Fusce a viverra turpis. Nullam nec mi hendrerit, auctor neque quis, egestas neque. In vehicula sagittis nisl non fringilla. Praesent malesuada pellentesque ultricies. In accumsan accumsan magna in mollis. Sed porttitor malesuada sapien sed luctus. Maecenas vel sem fringilla, volutpat lectus ac, tincidunt neque. Morbi non condimentum lacus. Nullam vehicula lacinia vestibulum. Nam laoreet commodo nisi eu commodo. Fusce adipiscing nisl et sem posuere, sit amet consequat orci pulvinar. Quisque fringilla et dolor vitae lacinia. Pellentesque dictum, enim pulvinar pharetra facilisis, urna elit blandit ante, et adipiscing purus ante eget nunc.

Sed dolor libero, consectetur at quam eu, malesuada lacinia nulla. Praesent semper tempus semper. Sed id ornare nibh. Sed tempor egestas congue. Mauris et tempor nisl. Fusce sed felis laoreet, accumsan sem at, posuere massa. Morbi varius at nulla vitae luctus. Curabitur molestie magna justo, in aliquet justo euismod ac. Curabitur accumsan gravida risus, a fringilla nunc semper in. Nulla vestibulum scelerisque tincidunt. Aliquam id dui a lectus dictum convallis. Vestibulum euismod justo mollis, accumsan mauris laoreet, tristique magna. Maecenas imperdiet mauris massa, sit amet egestas dui venenatis id. Quisque consectetur elit quis turpis placerat, in sodales elit placerat. Proin felis neque, elementum facilisis varius quis, venenatis sed dolor. </p>
                       <div style="position:fixed;height: 56px;width:564px; border-top:1px; background:url(../images/box-chat-bg.png) repeat-x; bottom:72px;border-radius: 3px;left:513px;">
                            <input type="text" style="height: 23px; width:537px; margin:14px 10px;" />
                       </div>
                       
                        </div>
                    </div>
                </div>
                <div class="cls"></div>
            </div>
            <div class="cls"></div>
        </div><!--content-body-->
    </div><!--content-all-->
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
</html>
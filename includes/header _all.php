<?php	
	
	function active($title){
		$active='';
		$clactive=' class="v_active"';
		$page_title=PAGE_TITLE;
		if($page_title==$title){
			$active=$clactive;
		}else{
			$active=$active;
		}
		return $active;
	}
?>
<div id="v_header">
	<div id="v_left">
		<div id="v_logo"><img src="images/commons/v_logo.png"></div>
		<div id="v_text">Thu, 04-July-2013 23:25</div>
	</div>
	<div id="v_header_menu">
			<ul id="v_menu">
				<li><a href=""<?php echo active(''); ?>><img src="images/commons/v_home.png">Home</a></li>
				<li><a href="about"<?php echo active('about'); ?>><img src="images/commons/v_about.png">About</a></li>
				<li><a href="contact"<?php echo active('contact'); ?>><img src="images/commons/v_contact.png">Contact</a></li>
				<li><a href="price"<?php echo active('price'); ?>><img src="images/commons/v_price.png">Price</a></li>
				<li><a href="service"<?php echo active('services'); ?>><img src="images/commons/v_services.png">Services</a></li>
			</ul>
	</div>
	<div id="v_header_right">
		<!-- <span class="v_button v_login">Login</span>
		<span class="v_button v_signup">signup</span> -->
		<form action="javascript:;" method="post">
			<input type="submit" class="v_button v_login" value="login" onclick="window.location.href='../login';">
			<input type="submit" value="signup"  onclick="window.location.href='../sign_up';" class="v_button v_signup">					
		</form>
	</div>
</div>
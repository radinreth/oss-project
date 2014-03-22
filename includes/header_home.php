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
		<div id="v_text">
		<script language="javascript">
		var now = new Date();
		document.write(now.toGMTString());
		</script>
        </div>
	</div>
	<div id="v_header_menu">
			<ul id="v_menu">
				<li><a href=""<?php echo active(''); ?>><img src="images/commons/v_home.png">Home</a></li>
                <li><a href="benefits"<?php echo active('benefits'); ?>><img src="images/commons/v_services.png">Benefit</a></li>
				<li><a href="price"<?php echo active('price'); ?>><img src="images/commons/v_price.png">Price</a></li>
				<li><a href="about"<?php echo active('about'); ?>><img src="images/commons/v_about.png">About</a></li>
				<li><a href="contact"<?php echo active('contact'); ?>><img src="images/commons/v_contact.png">Contact</a></li>
			</ul>
	</div>
    <a href="log_in" style="z-index:9999;">
	<div id="v_header_right">
		<!-- <span class="v_button v_login">Login</span>
		<span class="v_button v_signup">signup</span> -->
		
			<span class="v_button v_login">Log In</span>
								
		
	</div>
    </a>
</div>
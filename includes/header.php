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
		<div id="v_logo"><img src="../images/commons/v_logo.png"></div>
		<div id="v_text">
        <script language="javascript">
		var now = new Date();
		document.write(now.toLocaleDateString());
		</script>
        </div>
	</div>
	<div id="v_header_menu">
			<ul id="v_menu">
				<li><a href="../"<?php echo active(''); ?>><img src="../images/commons/ico/home.png">Home</a></li>
                <li>&nbsp;<a href="../benefits"<?php echo active('benefits'); ?>><img src="../images/commons/v_services.png">Benefit</a></li>
				<li>&nbsp;<a href="../price"<?php echo active('price'); ?>><img src="../images/commons/v_price.png">Price</a></li>
				<li>&nbsp;<a href="../about"<?php echo active('about'); ?>><img src="../images/commons/v_about.png">About</a></li>
				<li>&nbsp;<a href="../contact"<?php echo active('contact'); ?>><img src="../images/commons/v_contact.png">Contact</a></li>
                <li>&nbsp;&nbsp;&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../log_in/"><span class="v_button v_login">Log In</span></a></li>
			</ul>
        
				
   
	</div>
    
</div>
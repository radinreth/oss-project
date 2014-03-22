
<?php
	define('PAGE_TITLE','about');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>OSS : About</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />


</head>
<body>
<!--facebook like page-->
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=175328832674698";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--facebook like page-->
	<div class="v_wrap">
		<?php include('../includes/header.php');?>
	</div>

	<div class="v_wrap">
		<div id="v_wrap_title">
			<div class="v_title">About us</div>
			<div class="v_slogan">{short description about gochat and our mission}</div>
		</div>
	</div>

	<div class="v_wrap">
		<div id="v_wrap_content">
			<div class="v_content">
				<div class="v_content_title">who we are</div>
				<div class="v_content_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</div>
			</div>
			<div class="v_content">
				<div class="v_content_title">who we do</div>
				<div class="v_content_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</div>
			</div>
            
			<div class="v_content">
				<div class="v_content_title">Mission</div>
				<div class="v_content_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</div>
			</div>
            <div class="v_content">
            <div class="v_content_title">Gochat on Facebook</div>
           <!-- facebook like page-->
            <div class="fb-like-box" data-href="https://www.facebook.com/pages/Gochat-Cambodia/648503505209890?ref=hl" data-width="610" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
            <!-- facebook like page-->
            </div>
			<div id="v_company_moto">company motto  --  “  Lorem ipsum dolor sit amet  “ </div>
			<div id="v_wrap_certificate">
				<div class="v_certificate"><img src="../images/about/v_trust_certificate.png"></div>
				<div class="v_certificate"><img src="../images/about/v_authorize.net.png"></div>
				<div class="v_certificate"><img src="../images/about/v_bussiness.png"></div>

			</div>
		</div>
	</div>

	<div class="v_wrap">
		<?php include('../includes/s_footer.php');?>
	</div>
</body>
</html>
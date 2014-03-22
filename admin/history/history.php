<html>
<head>

	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#filter-content" ).tabs({
      event: "mouseover"
    });
  });
  </script>

</head>
<body>
	<div id="bg-header" class="wrap">
		<header class="header">
			<div id="logo"><img src="../images/commons/logo.png"></div>
			<nav id="header-menu">
				<ul>
					<a href="../chat"><li><img src="../images/commons/chat-menu.png"><span>Chat</span></li></a>
					<a href="../history"><li  class="active"><img src="../images/commons/history-menu.png"><span>History</span></li></a>
					<a href="../user"><li><img src="../images/commons/users-menu.png"><span>Users</span></li></a>
					<a href="../report"><li><img src="../images/commons/report-menu.png"><span>Report</span></li></a>
				</ul>
			</nav>
			<div id="header-right">
				<div id="search">
					<form>
						<input type="text" value="search" class="textbox-search"> 
						<input type="submit" value='' class="button-search">
					</form>
				</div>
				<div id="setting"><img src="../images/commons/setting.png"></div>
				<div id="users"><a href="#">radin reth</a></div>
			</div>
		</header>
	</div>
	<div class="wrap"><div id="line"></div></div>
	<div id="wrap-content" class="wrap">
		<div id="content">
			<div id="wrap-filter">
				<div id="filter-text">Filters chat by </div>
				
					<ul id="filter-menu">
						<a href=""><li>Date</li></a>
						<a href=""><li>Date</li></a>
						<a href=""><li>Date</li></a>
						<a href=""><li>Date</li></a>
					</ul>			
			</div>
			<div id="filter-content">
				<div class="filter-wrap-content">
					<div class="filter-title">Counter A and JRuby</div><div class="filter-time">1/11/2014 10:53 PM</div>
				</div>	
				<div class="wrap-chat-details">
					<div class="chat-details">
						<div class="chat-time">1/11/2014 10:53 PM</div>
						<div class="chat-des">
							<div class="chat-users">Counter A</div>
							<div class="chat-text">Hello , How can I help you?</div>

						</div>						
					</div>
					<div class="chat-details">
						<div class="chat-time">&nbsp;</div>
						<div class="chat-des">
							<div class="chat-users">Counter A</div>
							<div class="chat-text">Hello , How can I help you?</div>

						</div>						
					</div>

				</div>
				<div class="filter-wrap-content">
					<div class="filter-title">Counter A and JRuby</div><div class="filter-time">1/11/2014 10:53 PM</div>
				</div>	

				<!-- <ul>
				    <li><a href="#tabs-1"><div class="filter-title">Counter A and JRuby</div><div class="filter-time">1/11/2014 10:53 PM</div></a></li>
				    <li><a href="#tabs-2"><div class="filter-title">Counter A and JRuby</div><div class="filter-time">1/11/2014 10:53 PM</div></a></li>
				    <li><a href="#tabs-3">Aenean lacinia</a></li>
				</ul>
				  <div id="tabs-1">
				    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
				  </div>
				  <div id="tabs-2">
				    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
				  </div>
				  <div id="tabs-3">
				    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
				    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
				  </div>
 -->
			</div>

		</div>

	</div>
</body>
</html>
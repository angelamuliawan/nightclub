<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Night Club</title>
		<meta charset="utf-8">
		<!-- include all CSS -->
		<link rel="stylesheet" href="/nightclub/assets/css/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="/nightclub/assets/css/layout.css" type="text/css" media="all">
		<link rel="stylesheet" href="/nightclub/assets/css/style.css" type="text/css" media="all">
		
		<!-- include all JS -->
		<script src="/nightclub/assets/js/jquery-1.6.js" ></script>
		<script src="/nightclub/assets/js/cufon-yui.js"></script>
		<script src="/nightclub/assets/js/cufon-replace.js"></script>
		<script src="/nightclub/assets/js/NewsGoth_BT_400.font.js"></script>
		<script src="/nightclub/assets/js/NewsGoth_BT_700.font.js"></script>
		<script src="/nightclub/assets/js/jcarousellite.js"></script>
		<script src="/nightclub/assets/js/jquery.easing.1.3.js"></script>
		<script src="/nightclub/assets/js/jquery.mousewheel.js"></script>
		<script src="/nightclub/assets/js/atooltip.jquery.js"></script>
	</head>

	<body id="page1">
		<div class="bg1">
			<div class="main">
				<!--header -->
				<header>
					<nav>
						<ul id="menu">
							<li class="active"><a href="/nightclub/home">Home</a></li>
							<li><a href="/nightclub/gallery">Gallery</a></li>
							<li><a href="/nightclub/events">Events</a></li>
							<li><a href="/nightclub/career">Career</a></li>
							<li><a href="/nightclub/contacts">Contacts</a></li>
						</ul>
					</nav>
					<h1><a href="index.html" id="logo">nightclub feel the rhythm</a></h1>
				</header>
				
				<!--content -->
				<div class="box">
					<?php echo isset($pageContent) ? $pageContent : '' ; ?>
				</div>
				
				<!--footer -->
				<footer>
						<div class="line1">
							<div class="line2 wrapper">
								<div class="icons">
									<h4>Connect With Us</h4>
									<ul id="icons">
										<li><a href="#" class="normaltip"><img src="/nightclub/assets/images/icon1.jpg" alt=""></a></li>
										<li><a href="#" class="normaltip"><img src="/nightclub/assets/images/icon2.jpg" alt=""></a></li>
										<li><a href="#" class="normaltip"><img src="/nightclub/assets/images/icon3.jpg" alt=""></a></li>
										<li><a href="#" class="normaltip"><img src="/nightclub/assets/images/icon4.jpg" alt=""></a></li>
										<li><a href="#" class="normaltip"><img src="/nightclub/assets/images/icon5.jpg" alt=""></a></li>
									</ul>
								<!-- {%FOOTER_LINK} -->
								</div>
								<div class="info">
									<h4>About Us</h4>
									<ul>
										<li><a href="#">Club Info</a></li>
										<li><a href="#">Music</a></li>
										<li><a href="#">DJ Sets</a></li>
										<li><a href="#">News</a></li>
									</ul>
								</div>
								<div class="info">
									<h4>Join In</h4>
									<ul>
										<li><a href="#">Sign In</a></li>
										<li><a href="#">Forums</a></li>
										<li><a href="#">Promotions</a></li>
									</ul>
								</div>
								<div class="phone">
									<h4>Order Tickets</h4>
									<p>Free Phone<span>8-800-123-NIGHT</span></p>
								</div>
							</div>
					  Copyright &copy; <a href="#">Mira Night Club &copy; 2014</a></div>
				</footer>
				<!--footer end-->
			</div>
		</div>
	</body>
</html>

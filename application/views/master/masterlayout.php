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
		<script type="text/javascript" src="/nightclub/assets/js/pirobox/jquery1.2.6.js"></script>
		<script src="/nightclub/assets/js/cufon-yui.js"></script>
		<script src="/nightclub/assets/js/cufon-replace.js"></script>
		<script src="/nightclub/assets/js/NewsGoth_BT_400.font.js"></script>
		<script src="/nightclub/assets/js/NewsGoth_BT_700.font.js"></script>
		<script src="/nightclub/assets/js/jcarousellite.js"></script>
		<script src="/nightclub/assets/js/jquery.easing.1.3.js"></script>
		<script src="/nightclub/assets/js/jquery.mousewheel.js"></script>
		<script src="/nightclub/assets/js/atooltip.jquery.js"></script>

		<script type="text/javascript">
			var mainDomain= "http://localhost:2812/nightclub";
			var serverTime = '<?=date('H:i:s');?>';
		</script>
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
							<?php if($this->session->userdata('userid') != NULL) {?>
							<li><a href="/nightclub/login/checkLogout">Logout</a></li>
							<?php } ?>
						</ul>
					</nav>
					<!--<h1><a href="index.html" id="logo">nightclub feel the rhythm</a></h1>-->
					<img src="/nightclub/assets/images/logobaru.png" style="margin-top:10px;"/> </header> 
					<!--content -->
				</header>
				
				<!--content -->
				<div class="box" style="margin-top:-40px;">
					<?php echo isset($pageContent) ? $pageContent : '' ; ?>
				</div>
				
				<!--footer -->
				<footer>
					  <strong>Copyright &copy; <a href="#">Infinity Production - UI template helped by TemplateMonster.com &copy; 2014</a></div></strong>
				</footer>
				<!--footer end-->
			</div>
		</div>
	</body>
</html>

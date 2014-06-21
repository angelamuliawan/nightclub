
    <!--content -->
    <article id="content">
        <div class="wrapper pad_bot1">
			<section class="col1">
				<h2 id="welcome">Admin Login!</h2>
				<?php if($this->session->userdata('userid') == NULL) { ?>
				<form id="ContactForm" action="#">
				<div style="margin-left:auto; margin-right:auto;">
					<div class="wrapper"> <span>Username:</span>
						<input type="text" class="input" id="name" placeholder="Input Your Name"style="width:100%;"/>
					</div>
					<div class="wrapper"> <span>Password:</span>
						<input type="password" class="input"  id="password" placeholder="Input Your Password"style="width:100%;"/>
					</div>
					<input type="button" class="button" value="Login" id="Login" style="margin-top:10px;"/>
					<label style="color:red" id="lblError"></label>
				</div>
				</form>
				<?php } else { ?>
				<h4>you're already loggedin</h4>
				<a href="/nightclub/home">Home</a>
				<?php } ?>
			</section>
        </div>
    </article>
    <!--content end-->
	
	<script type="text/javascript">
		$(document).ready(function () {
			$("ul#menu").hide();
			Cufon.now();
			$('.box').hide().fadeIn();
			 $("#lblError").text("");
		$("#Login").click(function(data){	
			if($("#name").val() == '') $("#lblError").text("Username must be filled");
			else if($("#password").val() == '') $("#lblError").text("Password must be filled");
			else
			{
				$("#lblError").text("");
				$.post(mainDomain+'/login/checkLogin', {usernameLogin:$("#name").val(), passwordLogin: $("#password").val()},function(data){
					if(data==1) {
						window.location.href = mainDomain+'/home';
					}
					else $("#lblError").text("invalid username or password");
				});
			}
	});

		$('li.active').removeClass('active');
		$("a[href='/nightclub/home']").parent().addClass('active');
	})
	</script>
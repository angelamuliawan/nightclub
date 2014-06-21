	<!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Contact Form</h2>
			<form id="ContactForm" action="#">
				<div>
					<div class="wrapper"> <span>Name:</span>
						<input type="text" class="input" id="name" placeholder="Input Your Name"/>
					</div>
					<div class="wrapper"> <span>Email:</span>
						<input type="text" class="input"  id="email" placeholder="Input Your Email"/>
					</div>
					<div class="wrapper"> <span>Subject:</span>
						<input type="text" class="input"  id="subject" placeholder="Input Your Subject"/>
					</div>
					<div class="textarea_box"> <span>Message:</span>
						<textarea name="textarea" cols="1" rows="1" id="message" placeholder="Input Your Message"></textarea>
					</div>
					<input type="button" class="button" value="Send" id="btnSend"/>
					<label style="color:red" id="lblError"></label>
				</div>
			</form>
        </div>
		
        <div class="wrapper">
			<div class="col1">
				<h2>Contact Form</h2>
					<p class="color1 pad_bot1">8901 Marmora, Glasgow, D04 89GR</p>
					<p class="address">Freephone:<br>
					  Telephone:<br>
					  FAX:<br>
					  E-mail:
					</p>
					<p>+1 800 559 6580<br>
					+1 959 603 6035<br>
					+1 504 889 9898<br>
					<a href="#" class="link2">mail@demolink.org</a>
				</p>
			</div>
        </div>
    </article>
    <!--content end-->

    <script type="text/javascript">
	$(document).ready(function () {
		$("#lblError").text("");
		$('li.active').removeClass('active');
		$("a[href='/nightclub/contacts']").parent().addClass('active');

		$("#btnSend").click(function(){
			var name = $("#name").val();
			var email = $("#email").val();
			var subject = $("#subject").val();
			var message = $("#message").val();

			if(name == '') $("#lblError").empty().text("Name must be filled");
			else if(email == '') $("#lblError").empty().text("email must be filled");
			else if(subject == '') $("#lblError").empty().text("subject must be filled");
			else if(message == '') $("#lblError").empty().text("message must be filled");
			else{
				$.ajax({
				  type: 'POST',
				  url: mainDomain + '/contacts/insertContactUs',	
				  data:{name:name, email:email, subject:subject, message:message},
				  success: function(data)
				  {
				  	var data= JSON.parse(data);
				  	if(data == 1) 
			  		{
			  			alert("Data successfuly save");
			  			window.location.href = mainDomain +'/home';
			  		}
			  		else $("#lblError").empty().text("sorry we're unable to save your data");
				  },
				 async:true
			});
			}
		});
	});
	</script>

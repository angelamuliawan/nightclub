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
					<p class="color1 pad_bot1">Jl bunga lily 5, persangrahan,bintaro, jakarta selatan, Jakarta, Indonesia 12330</p>
					<p class="address">Handphone:<br>
					  email:<br>
					  pin BB:<br>
					  twitter:
					</p>
					<p>0813-7696-2266<br>
					 infinity.eproduction@yahoo.com <br>
					 26C9CF54 <br>
					@infinity_prod
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

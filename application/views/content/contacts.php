	<!--content -->
	<script>
	function loadContactUs(){
		
	}
	</script>

    <article id="content">
        <div class="wrapper">
        	<?php if($this->session->userdata('userid') == NULL) {?>
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
			<?php } else { ?>
				<table border="1" style="width:100%;border: 1px solid #eeeeee;">
				<thead>
					<tr>
					<th style="width:15%;">Name</th>
					<th style="width:15%;">Email</th>
					<th style="width:15%;">Subject</th>
					<th style="width:45%;">Message</th>
					<th style="width:10%;">Action</th>
					</tr>
				</thead>
				<tbody id="tblContactUs">
					<td style="width:15%;">aa</td>
					<td style="width:15%;">aa@aa.com</td>
					<td style="width:15%;">aa s</td>
					<td style="width:45%;">aa m</td>
					<td style="width:10%;"><a href="#">Delete</a></td>
				</tbody>
				</table>

				<script>
					loadContactUs();
				</script>
			<?php } ?>
        </div>
		
        <div class="wrapper">
			<div class="col1">
				<h2>Contact Us</h2>
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

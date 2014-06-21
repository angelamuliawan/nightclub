	<!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Contact Form</h2>
			<form id="ContactForm" action="#">
				<div>
					<div class="wrapper"> <span>Name:</span>
						<input type="text" class="input" >
					</div>
					<div class="wrapper"> <span>Email:</span>
						<input type="text" class="input" >
					</div>
					<div class="wrapper"> <span>Subject:</span>
						<input type="text" class="input" >
					</div>
					<div class="textarea_box"> <span>Message:</span>
						<textarea name="textarea" cols="1" rows="1"></textarea>
					</div>
					<a href="#" class="button">send</a> <a href="#" class="button">clear</a>
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
			<div class="col2 pad_left1">
				<h2>Miscellaneous Info</h2>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque.</p>
			</div>
        </div>
    </article>
    <!--content end-->

    <script type="text/javascript">
	$(document).ready(function () {

		$('li.active').removeClass('active');
		$("a[href='/nightclub/contacts']").parent().addClass('active');

	});
	</script>

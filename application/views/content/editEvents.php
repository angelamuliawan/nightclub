
	<?php 
		if($this->session->userdata('userid') == NULL) 
			redirect('home');
	?>
	
	<!-- jQuery -->
	<script type="text/javascript" src="/nightclub/assets/js/jquery.min.js"></script>
	
	<!-- required plugins -->
	<script type="text/javascript" src="/nightclub/assets/js/calendar/date.js"></script>
	<!--[if lt IE 7]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]-->
	
	<!-- jquery.datePicker.js -->
	<script type="text/javascript" src="/nightclub/assets/js/calendar/jquery.datePicker.js"></script>
	
	<!-- datePicker required styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/nightclub/assets/js/calendar/datePicker.css">
	
	<!-- page specific styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/nightclub/assets/js/calendar/demo.css">
	
	 <!-- page specific scripts -->
	<script type="text/javascript" charset="utf-8">
		$(function()
		{
			$('.date-pick').datePicker({autoFocusNextInput: true});
		});
	</script>
	
	<script type="text/javascript" src="/nightclub/assets/js/ajaxfileupload/ajaxfileupload.js"></script>
	
	<!-- event id -->
	<input type="hidden" id="hdnEventID" value="<?php echo $param; ?>" />
	
    <!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Edit Event</h2>
			<form class="form" action="#">
				<div>
					<div class="wrapper"> <span>Image:</span>
						<img src="/nightclub/assets/images/gallery/nophotoavailable.jpg" id="srcImage" style="height: 170px; width: 150px; margin-bottom: 10px;" />
						<input type="hidden" name="photo" id="originalPhotoName" value="" />
					</div>
					<br>
					<div class="wrapper"> <span>Title:</span>
						<input type="text" class="input"  id="txtTitle" placeholder="Input title"/>
					</div>
					<br>
					<div class="wrapper"> <span>Date:</span>
						<input type="text" disabled class="input date-pick"  id="txtDate" placeholder="Input Date"/>
					</div>
					<br>
					<div class="wrapper"> <span>Time:</span>
						<input type="text" class="input"  id="txtTime" placeholder="Input Time"/>
					</div>
					<br>
					<div class="wrapper"> <span>Description:</span>
						<textarea name="textarea" cols="1" rows="1" id="txtDescription" placeholder="Input Description"></textarea>
					</div>
					<br>
					<div class="wrapper"> <span>Place:</span>
						<input type="text" class="input"  id="txtPlace" placeholder="Input Place"/>
					</div>
					
					<input type="button" class="button" value="Update Event" id="btnUpdateEvent"/>
					<label style="color:red" id="lblError"></label>
				</div>
			</form>
        </div>
    </article>
    <!--content end-->
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('li.active').removeClass('active');
			$("a[href='/nightclub/events']").parent().addClass('active');
			var eventid = $("#hdnEventID").val();
			$.ajax({
				type: 'POST',
				url: mainDomain + '/editEvents/getEventByID',	
				data: { eventid :  eventid},
				success: function(data)
				{
					var data = JSON.parse(data);
					$("#srcImage").attr('src', '/nightclub/assets/images/event/'+data[0]['ImageURL']+'');
					$("#txtTitle").val(data[0]['Title']);
					$("#txtDate").val(data[0]['Date']);
					$("#txtTime").val(data[0]['Time']);
					$("#txtDescription").val(data[0]['Description']);
					$("#txtPlace").val(data[0]['Place']);
				},
				async:true
			});
			
			$("#btnUpdateEvent").click(function(){
				
				var title = $("#txtTitle").val();
				var date = $("#txtDate").val();
				var time = $("#txtTime").val();
				var description = $("#txtDescription").val();
				var place = $("#txtPlace").val();
				//var imageURL = $("#originalPhotoName").val();
				
				var param = {
					title : title,
					date : date,
					time : time,
					description : description,
					place : place,
					eventid : eventid
				};
				$.ajax({
					type: 'POST',
					url: mainDomain + '/editEvents/updateEvent',	
					data: param,
					success: function(data)
					{
						alert("Event successfully updated.");
						location.href = "../../events";
					},
					async:true
				});
			});	
			
		});
	</script>
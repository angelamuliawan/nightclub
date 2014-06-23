
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
	<link rel="stylesheet" type="text/css" media="screen" href="/nightclub/assets/css/calendar/datePicker.css">
	
	<!-- page specific styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/nightclub/assets/css/calendar/demo.css">
	
	 <!-- page specific scripts -->
	<script type="text/javascript" charset="utf-8">
		$(function()
		{
			$('.date-pick').datePicker({autoFocusNextInput: true});
		});
	</script>
	
	<script type="text/javascript" src="/nightclub/assets/js/ajaxfileupload/ajaxfileupload.js"></script>
	
    <!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Add New Events</h2>
			<form class="form" action="#">
				<div>
					<div class="wrapper"> <span>Image:</span>
						<img src="/nightclub/assets/images/gallery/nophotoavailable.jpg" id="userimage" style="height: 170px; width: 150px; margin-bottom: 10px;" />
						<input type="hidden" name="photo" id="originalPhotoName" value="" />
					</div>
					<br>
					<div class="wrapper">
						<div id="fine-uploader-basic" style="margin-left:120px; background-color:white; width:80px;">Browse</div>
					</div>
					<br>
					<div class="wrapper"> <span>Title:</span>
						<input type="text" class="input"  id="txtTitle" placeholder="Input title"/>
					</div>
					<br>
					<div class="wrapper"> <span>Date:</span>
						<input type="text" disabled class="input date-pick" id="txtDate"  placeholder="Input Date"/>
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
					
					<input type="button" class="button" value="Add Event" id="btnUploadEvent"/>
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
			
			$("#btnUploadEvent").click(function(){
				
				var title = $("#txtTitle").val();
				var date = $("#txtDate").val();
				var time = $("#txtTime").val();
				var description = $("#txtDescription").val();
				var place = $("#txtPlace").val();
				var imageURL = $("#originalPhotoName").val();
				
				var param = {
					title : title,
					date : date,
					time : time,
					description : description,
					place : place,
					imageURL : imageURL
				};
				$.ajax({
					type: 'POST',
					url: mainDomain + '/addEvents/insertEvent',	
					data: param,
					success: function(data)
					{
						alert("Event successfully added.");
						location.href = "events";
					},
					async:true
				});
			});
			
			//Initialize Photo Uploader
			new qq.FileUploaderBasic({
				button: $("#fine-uploader-basic")[0],
				action: '/nightclub/addEvents/douploadimage',
				debug: false,
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'png'],
				sizeLimit: 2048000,
				forceMultipart:true,
				onUpload : '',
				onComplete:function(id, fileName, data){
					if(data.status == '1'){
						$("#userimage").attr('src','/nightclub/assets/images/event/'+data.name);  
					}
					$("#originalPhotoName").val(data.name);
				}
			});
			
		});
	</script>
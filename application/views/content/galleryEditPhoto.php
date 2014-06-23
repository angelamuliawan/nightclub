
	<?php 
		if($this->session->userdata('userid') == NULL) 
			redirect('home');
	?>

	<!-- image id -->
	<input type="hidden" id="hdnImageID" value="<?php echo $param; ?>" />

    <!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Edit Images</h2>
			<form class="form" action="#">
				<div>
					<div class="wrapper"> <span>Image:</span>
						<img id="srcImage" src="" style="width:300px; height:200px;" />
					</div>
					<br><br>
					<div class="wrapper"> <span>Image Description:</span>
						<input type="text" class="input"  id="txtImageDescription" placeholder="Input Image Description"/>
					</div>
					<input type="button" class="button" value="Update Image" id="btnUpdateImage"/>
					<label style="color:red" id="lblError"></label>
				</div>
			</form>
        </div>
    </article>
    <!--content end-->
	
	
	<link href="/nightclub/assets/css/pirobox/pirobox.css" media="screen" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/nightclub/assets/js/pirobox/piroBox.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('li.active').removeClass('active');
			$("a[href='/nightclub/gallery']").parent().addClass('active');
			
			var imageid = $("#hdnImageID").val();
			$.ajax({
				type: 'POST',
				url: mainDomain + '/galleryEditPhoto/getImageByID',	
				data: { imageid : imageid },
				success: function(data)
				{
					//console.log(data);
					var data = JSON.parse(data);
					$("#srcImage").attr('src', '/nightclub/assets/images/gallery/'+data[0]['PhotoURL']+'');
					$("#txtImageDescription").val(data[0]['PhotoDescription']);
				},
				async:false
			});

			
			$("#btnUpdateImage").click(function(){
				var imagedescription = $("#txtImageDescription").val();
				var param = {
					imageid : imageid,
					imagedescription : imagedescription
				};
				$.ajax({
					type: 'POST',
					url: mainDomain + '/galleryEditPhoto/updateImage',	
					data: param,
					success: function(data)
					{
						alert("Image successfully updated.");
						location.href = "../../Gallery";
					},
					async:true
				});
			});
			
			
		});
	</script>
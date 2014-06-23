
	<?php 
		if($this->session->userdata('userid') == NULL) 
			redirect('home');
	?>
	
	<input type="hidden" id="hdnAlbumID" value="<?php echo $param; ?>" />
	<script type="text/javascript" src="/nightclub/assets/js/ajaxfileupload/ajaxfileupload.js"></script>

    <!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Add New Images</h2>
			<form class="form" action="#">
				<div>
					<div class="wrapper"> <span>Image:</span>
						<img src="/nightclub/assets/images/gallery/nophotoavailable.jpg" id="userimage" style="height: 170px; width: 150px; margin-bottom: 10px;" />
						<input type="hidden" name="photo" id="originalPhotoName" value="" />
					</div>
					<br><br>
					<div class="wrapper">
						<div id="fine-uploader-basic" style="margin-left:120px; background-color:white; width:80px;">Browse</div>
					</div>
					<br><br>
					<div class="wrapper"> <span>Image Description:</span>
						<input type="text" class="input"  id="txtImageDescription" placeholder="Input Image Description"/>
					</div>
					<input type="button" class="button" value="Upload photo" id="btnUploadImage"/>
					<label style="color:red" id="lblError"></label>
				</div>
			</form>
        </div>
    </article>
    <!--content end-->
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('li.active').removeClass('active');
			$("a[href='/nightclub/gallery']").parent().addClass('active');
			
			$("#btnUploadImage").click(function(){
				var imagedescription = $("#txtImageDescription").val();
				var imagename = $("#originalPhotoName").val();
				var albumid = $("#hdnAlbumID").val();
				
				var param = {
					albumid : albumid,
					imagename : imagename,
					imagedescription : imagedescription
				};
				$.ajax({
					type: 'POST',
					url: mainDomain + '/galleryAddPhoto/insertNewImage',	
					data: param,
					success: function(data)
					{
						alert("Image successfully uploaded.");
						location.href = "../../galleryphoto/index/" + albumid;
					},
					async:true
				});
			});
			
			//Initialize Photo Uploader
			new qq.FileUploaderBasic({
				button: $("#fine-uploader-basic")[0],
				action: '/nightclub/galleryAddPhoto/douploadimage',
				debug: false,
				allowedExtensions: ['jpeg', 'jpg', 'gif', 'png'],
				sizeLimit: 2048000,
				forceMultipart:true,
				onUpload : '',
				onComplete:function(id, fileName, data){
					if(data.status == '1'){
						$("#userimage").attr('src','/nightclub/assets/images/gallery/'+data.name);  
					}
					$("#originalPhotoName").val(data.name);
				}
			});
			
		});
	</script>
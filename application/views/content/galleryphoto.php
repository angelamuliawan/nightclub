
	<input type="hidden" id="hdnIsLoggedIn" value="<?php if($this->session->userdata('userid') != NULL) echo "loggedin";?>" />

    <!--content -->
    <article id="content">
        <div class="wrapper gallery_in">
			<h2>Images</h2>
			<?php if($this->session->userdata('userid') != NULL) { ?>
				<a class="btnAddImage" href="#">Add new image</a><br/><br/>
			<?php
			}
			?>
			<dl class="folio">
				<dd id="photoContent">
				</dd>
			</dl>
        </div>
    </article>
    <!--content end-->
	
	
	<!-- albumid -->
	<input type="hidden" id="hdnAlbumID" value="<?php echo $param; ?>" />
	
	<link href="/nightclub/assets/css/pirobox/pirobox.css" media="screen" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/nightclub/assets/js/pirobox/piroBox.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('li.active').removeClass('active');
			$("a[href='/nightclub/gallery']").parent().addClass('active');

			Cufon.now();
			
			var albumid = $("#hdnAlbumID").val();
			var isLoggedIn = $("#hdnIsLoggedIn").val();
			var control = '';
			
			$.ajax({
				type: 'POST',
				url: mainDomain + '/galleryphoto/getImage',	
				data: { albumid : albumid },
				success: function(data)
				{
					//console.log(data);
					var data = JSON.parse(data);
					if(!data.length){
						$('#photoContent').append('<h4>Sorry, this album didn\'t contains any photos yet.</h4>');
					}else{
						for(var i = 0; i<data.length; i++)
						{
							if(isLoggedIn){
								control = '<a class="btnEditImage" data-id="'+data[i]['PhotoID']+'" href="#">Edit</a> | <a class="btnDeleteImage" data-id="'+data[i]['PhotoID']+'"  href="#">Delete</a><br/>';
							}
							$('#photoContent').append('<div class="single_box">'+
								'<div class="single_box">'+
									'<span class="single">'+
										'<a href="/nightclub/assets/images/gallery/'+data[i]['PhotoURL']+'" title="'+data[i]['PhotoDescription']+'">'+
										'<img src="/nightclub/assets/images/gallery/'+data[i]['PhotoURL']+'" width="200" height="139" /></a>'+
									'</span>'+
									'<span style="float:right;">'+
										control +
									'</span>'+
								'</div>'+
							'</div>');
						}
					}	
				},
				async:false
			});
			
			$('.thumbs').piroBox({
					border: 10,
					borderColor : '#222', 
					mySpeed: 700,  
					bg_alpha: 0.3,
					cap_op_start : 0.4,
					cap_op_end: 0.8,
					pathLoader : '#000 url("/nightclub/assets/images/pirobox/ajax-loader.gif") center center no-repeat;', 
					gallery : '.gallery_in li a', 
					gallery_li : '.gallery_in li', 
					next_class : '.next_in',
					previous_class : '.previous_in'
			});	
			
			$('.thumbs').piroBox({
					border: 1, 
					mySpeed: 700,
					borderColor : '#444',  
					bg_alpha: 0.5,
					cap_op_start : 0.4,
					cap_op_end: 0.8,
					pathLoader : '#000 url("/nightclub/assets/images/pirobox/ajax-loader.gif") center center no-repeat;', 
					gallery : '.gallery li a', 
					gallery_li : '.gallery li',
					single : '.single  a',
					next_class : '.next',
					previous_class : '.previous'
			});
			
			$(".btnAddImage").click(function(e){
				e.preventDefault();
				location.href = "../../galleryAddPhoto/index/" + albumid;
			});
			
			$(".btnEditImage").click(function(e){
				e.preventDefault();
				var imageid = $(this).attr('data-id');
				location.href = "../../galleryEditPhoto/index/" + imageid;
			});
			
			$(".btnDeleteImage").click(function(){
				var imageid = $(this).attr('data-id');
				var conf = confirm("Delete this image ?");
				if(conf){
					$.ajax({
						type: 'POST',
						url: mainDomain + '/gallery/deleteImage',	
						data: {imageid : imageid},
						success: function(data)
						{
							alert("Image successfully deleted.");
							location.reload();
						},
						async:true
					});
				}
			});
			
			
		});
	</script>
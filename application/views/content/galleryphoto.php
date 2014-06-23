
	<input type="hidden" id="hdnIsLoggedIn" value="<?php if($this->session->userdata('userid') != NULL) echo "notloggedin";?>" />

    <!--content -->
    <article id="content">
        <div class="wrapper gallery_in">
			<h2>Images</h2>
			<dl class="folio">
				<dd id="photoContent">
				</dd>
			</dl>
        </div>
    </article>
    <!--content end-->
	
	<!-- jQuery Popup Overlay -->
	<script src="/nightclub/assets/js/popup/jquery-1.7.2.min.js"></script>
	<script src="/nightclub/assets/js/popup/jquery.popupoverlay.js"></script>
	<div style="display:none;">
		<button class="popupEditImage_open">Callback events</button>
		<button class="popupCreateImage_open">Callback events</button>
	</div>
	
	<!-- Popup Edit album -->
	<div id="popupEditImage" class="well" style="height:300px; width:500px; margin-left:auto; margin-right:auto; display:none;">
		<h2 style="text-align:center;">Edit Image</h2>
		<div class="wrapper pad_bot1">
			<section class="col1">
				<input type="hidden" id="hdnImageID" value="" />
				<form class="form" action="#" style="margin-left:60px;">
					<div style="width:400px; height:200px; margin-left:auto; margin-right:auto;">
						<div class="wrapper"> <span>Image Description:</span>
							<input type="text" class="input"  id="txtImageDescription" placeholder="Input album description"/>
						</div>
						<input type="button" class="button" value="Update Albums" id="btnUpdateAlbums" style="margin-top:20px; margin-right:20px;"/>
					</div>
					<label style="color:red" id="lblError"></label>
				</form>
			</section>
        </div>
	</div>
	
	<!-- Popup create album -->
	<div id="popupCreateImage" class="well" style="height:300px; width:500px; margin-left:auto; margin-right:auto; display:none;">
		<h2 style="text-align:center;">Create Album</h2>
		<div class="wrapper pad_bot1">
			<section class="col1">
				<form class="form" action="#" style="margin-left:60px;">
					<div style="width:400px; height:200px; margin-left:auto; margin-right:auto;">
						<div class="wrapper"><span>Album Name:</span>
							<input type="text" class="input" id="txtNewAlbumName" placeholder="Input album Name"/>
						</div>
						<div class="wrapper"> <span>Album Description:</span>
							<input type="text" class="input"  id="txtNewAlbumDescription" placeholder="Input album description"/>
						</div>
						<input type="button" class="button" value="Create Albums" id="btnCreateAlbum" style="margin-top:20px; margin-right:20px;"/>
					</div>
					<label style="color:red" id="lblError"></label>
				</form>
			</section>
        </div>
	</div>
	
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
								control = '<span style="float:right; margin-right:50px;"><a class="btnEditAlbum" data-id="'+data[i]['PhotoID']+'" href="#">Edit</a> | <a class="btnDeleteAlbum" data-id="'+data[i]['PhotoID']+'" href="#">Delete</a></span>';
							}
							$('#photoContent').append('<div class="single_box">'+
								'<div class="single_box">'+
									'<span class="single">'+
										'<a href="/nightclub/assets/images/gallery/'+data[i]['PhotoURL']+'" title="'+data[i]['PhotoDescription']+'">'+
										'<img src="/nightclub/assets/images/gallery/'+data[i]['PhotoURL']+'" width="200" height="139" /></a>'+
									'</span>'+
									'<span style="float:right;">'+
										'<a class="btnEditImage" data-id="'+data[i]['PhotoID']+'" href="#">Edit</a> | <a class="btnDeleteImage" data-id="'+data[i]['PhotoID']+'"  href="#">Delete</a><br/>'+
									'</span>'+
								'</div>'+
							'</div>');
						}
					}	
				},
				async:false
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
		});
	</script>
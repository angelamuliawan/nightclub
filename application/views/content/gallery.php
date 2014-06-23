
	<input type="hidden" id="hdnIsLoggedIn" value="<?php if($this->session->userdata('userid') != NULL) echo "notloggedin";?>" />

    <!--content -->
    <article id="content">
        <div class="wrapper gallery_in">
			<h2>Albums</h2>
			<?php if($this->session->userdata('userid') != NULL) ?>
				<a class="btnAddAlbum" href="#">Create new album</a><br/><br/>
			<?php?>
			<div class="wrapper galleryContent">
			</div>
        </div>
    </article>
    <!--content end-->
	
	<!-- jQuery Popup Overlay -->
	<script src="/nightclub/assets/js/popup/jquery-1.7.2.min.js"></script>
	<script src="/nightclub/assets/js/popup/jquery.popupoverlay.js"></script>
	<div style="display:none;">
		<button class="fall_open">Callback events</button>
		<button class="popupCreateAlbum_open">Callback events</button>
	</div>
	
	<!-- Popup Edit album -->
	<div id="fall" class="well" style="height:300px; width:500px; margin-left:auto; margin-right:auto; display:none;">
		<h2 style="text-align:center;">Edit Albums</h2>
		<div class="wrapper pad_bot1">
			<section class="col1">
				<input type="hidden" id="hdnAlbumID" value="" />
				<form class="form" action="#" style="margin-left:60px;">
					<div style="width:400px; height:200px; margin-left:auto; margin-right:auto;">
						<div class="wrapper"><span>Album Name:</span>
							<input type="text" class="input" id="txtAlbumName" placeholder="Input album Name"/>
						</div>
						<div class="wrapper"> <span>Album Description:</span>
							<input type="text" class="input"  id="txtAlbumDescription" placeholder="Input album description"/>
						</div>
						<input type="button" class="button" value="Update Albums" id="btnUpdateAlbums" style="margin-top:20px; margin-right:20px;"/>
					</div>
					<label style="color:red" id="lblError"></label>
				</form>
			</section>
        </div>
	</div>
	
	<!-- Popup create album -->
	<div id="popupCreateAlbum" class="well" style="height:300px; width:500px; margin-left:auto; margin-right:auto; display:none;">
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
	
	<link href="/nightclub/assets/css/pirobox/pirobox.css" media="screen" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/nightclub/assets/js/pirobox/piroBox.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('li.active').removeClass('active');
			$("a[href='/nightclub/gallery']").parent().addClass('active');

			Cufon.now();
			$.ajax({
				type: 'POST',
				url: mainDomain + '/gallery/getAlbums',	
				data:{},
				success: function(data)
				{
					//console.log(data);
					var data = JSON.parse(data);
					if(!data.length){
						$('#photoContent').append('<h4>Sorry, no album available.</h4>');
					}else{
						var isLoggedIn = $("#hdnIsLoggedIn").val();
						var control = '';
						for(var i = 0; i < data.length; i++)
						{
							$.ajax({
								type: 'POST',
								url: mainDomain + '/gallery/getImageInsideAlbum',	
								data: { albumid : data[i]['AlbumID'] },
								success: function(jsonimage)
								{
									if(isLoggedIn){
										control = '<span style="float:right; margin-right:50px;"><a class="btnEditAlbum" data-id="'+data[i]['AlbumID']+'" href="#">Edit</a> | <a class="btnDeleteAlbum" data-id="'+data[i]['AlbumID']+'" href="#">Delete</a></span>';
									}
									var dataimage = JSON.parse(jsonimage);
									if(dataimage == 0){
										if((i+1) % 3 == 0)
										{
											$('.galleryContent').append('<div class="cols" id="'+data[i]['AlbumID']+'">'+
												'<input type="hidden" class="iAlbumName" value="'+data[i]['AlbumName']+'" />' +
												'<input type="hidden" class="iAlbumDescription" value="'+data[i]['AlbumDescription']+'" />' +
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/nophotoavailable.jpg" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+ control +
													'<br>'+
													data[i]['AlbumDescription']+
												'</p>'+
											'</div>');
										}
										else
										{
											$('.galleryContent').append('<div class="cols marg_right1" id="'+data[i]['AlbumID']+'">'+
												'<input type="hidden" class="iAlbumName" value="'+data[i]['AlbumName']+'" />' +
												'<input type="hidden" class="iAlbumDescription" value="'+data[i]['AlbumDescription']+'" />' +
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/nophotoavailable.jpg" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+ control +
													'<br>'+
													data[i]['AlbumDescription']+
												'</p>'+
											'</div>');	
										}
									}else{
										if((i+1) % 3 == 0)
										{
											$('.galleryContent').append('<div class="cols" id="'+data[i]['AlbumID']+'">'+
												'<input type="hidden" class="iAlbumName" value="'+data[i]['AlbumName']+'" />' +
												'<input type="hidden" class="iAlbumDescription" value="'+data[i]['AlbumDescription']+'" />' +
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/'+dataimage[0]['PhotoURL']+'" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+ control +
													'<br>'+
													data[i]['AlbumDescription']+
												'</p>'+
											'</div>');
										}
										else
										{
											$('.galleryContent').append('<div class="cols marg_right1" id="'+data[i]['AlbumID']+'">'+
												'<input type="hidden" class="iAlbumName" value="'+data[i]['AlbumName']+'" />' +
												'<input type="hidden" class="iAlbumDescription" value="'+data[i]['AlbumDescription']+'" />' +
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/'+dataimage[0]['PhotoURL']+'" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+ control +
													'<br>'+
													data[i]['AlbumDescription']+
												'</p>'+
											'</div>');	
										}
									}
									
								},
								async:false
							});
						}
					}
				},
				async:false
			});
			
			$('#fall, #popupCreateAlbum').popup({
				opacity: 0.9,
				transition: 'all 0.7s'
			});
			
			
			$(".btnAddAlbum").click(function(e){
				e.preventDefault();
				$(".popupCreateAlbum_open").click();
			});
			
			$(".btnEditAlbum").click(function(e){
				e.preventDefault();
				var albumid = $(this).attr('data-id');
				var albumname = $(this).closest("div").find("input.iAlbumName").val();
				var albumdescription = $(this).closest("div").find("input.iAlbumDescription").val();
				
				$("#hdnAlbumID").val(albumid);
				$("#txtAlbumName").val(albumname);
				$("#txtAlbumDescription").val(albumdescription);
		
				$(".fall_open").click();
			});
			
			$("#btnCreateAlbum").click(function(){
				var albumname = $("#txtNewAlbumName").val();
				var albumdescription = $("#txtNewAlbumDescription").val();
				
				var param = {
					albumname : albumname,
					albumdescription : albumdescription
				}
				
				$.ajax({
					type: 'POST',
					url: mainDomain + '/gallery/createAlbums',	
					data: param,
					success: function(data)
					{
						alert("Albums successfully created.");
						location.href = "gallery";
					}
				});
			});
			
			$("#btnUpdateAlbums").click(function(){
				var albumid = $("#hdnAlbumID").val();
				var albumname = $("#txtAlbumName").val();
				var albumdescription = $("#txtAlbumDescription").val();
				
				var param = {
					albumid : albumid,
					albumname : albumname,
					albumdescription : albumdescription
				}
				
				$.ajax({
					type: 'POST',
					url: mainDomain + '/gallery/updateAlbums',	
					data: param,
					success: function(data)
					{
						alert("Albums successfully updated.");
						location.href = "gallery";
					}
				});
			});
			
			$(".btnDeleteAlbum").click(function(){
				
				var albumid = $(this).attr('data-id');
				var conf = confirm("Delete this album ?");
				if(conf){
					$.ajax({
						type: 'POST',
						url: mainDomain + '/gallery/deleteAlbums',	
						data: {albumid : albumid},
						success: function(data)
						{
							alert("Albums successfully deleted.");
							location.href = "gallery";
						},
						async:true
					});
				}
			});
		});
	</script>
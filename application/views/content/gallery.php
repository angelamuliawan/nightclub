
    <!--content -->
    <article id="content">
        <div class="wrapper gallery_in">
			<h2>Albums</h2>
			<div class="wrapper galleryContent">
			</div>
        </div>
    </article>
    <!--content end-->
	
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
						for(var i = 0; i < data.length; i++)
						{
							$.ajax({
								type: 'POST',
								url: mainDomain + '/gallery/getImageInsideAlbum',	
								data: { albumid : data[i]['AlbumID'] },
								success: function(jsonimage)
								{
									var dataimage = JSON.parse(jsonimage);
									if(dataimage == 0){
										if((i+1) % 3 == 0)
										{
											$('.galleryContent').append('<div class="cols" id="'+data[i]['AlbumID']+'">'+
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/nophotoavailable.jpg" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+
													'<br>'+
													data[i]['AlbumDescription']+
												'</p>'+
											'</div>');
										}
										else
										{
											$('.galleryContent').append('<div class="cols marg_right1" id="'+data[i]['AlbumID']+'">'+
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/nophotoavailable.jpg" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+
													'<br>'+
													data[i]['AlbumDescription']+
												'</p>'+
											'</div>');	
										}
									}else{
										if((i+1) % 3 == 0)
										{
											$('.galleryContent').append('<div class="cols" id="'+data[i]['AlbumID']+'">'+
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/'+dataimage[0]['PhotoURL']+'" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+
													'<br>'+
													data[i]['AlbumDescription']+
												'</p>'+
											'</div>');
										}
										else
										{
											$('.galleryContent').append('<div class="cols marg_right1" id="'+data[i]['AlbumID']+'">'+
												'<figure class="pad_bot1">'+
													'<a href="/nightclub/galleryphoto/index/'+data[i]['AlbumID']+'"><img src="/nightclub/assets/images/gallery/'+dataimage[0]['PhotoURL']+'" width="210" height="159" alt=""></a>'+
												'</figure>'+
												'<p class="pad_bot2">'+
													'<span class="color2">'+
														data[i]['Date']+
													'</span> '+
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
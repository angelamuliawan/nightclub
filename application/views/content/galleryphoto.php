
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
							$('#photoContent').append('<div class="single_box">'+
								'<span class="single">'+
									'<a href="/nightclub/assets/images/'+data[i]['PhotoURL']+'" title="'+data[i]['PhotoDescription']+'">'+
									'<img src="/nightclub/assets/images/'+data[i]['PhotoURL']+'" width="200" height="139" /></a>'+
								'</span>'+
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
		});
	</script>
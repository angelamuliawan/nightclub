
    <!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Club Events</h2>
			<div class="wrapper eventContent">
				<!--<div class="cols marg_right1">
					<figure class="pad_bot1">
						<img src="/nightclub/assets/images/page4_img1.jpg" alt="">
					</figure>
					<p class="pad_bot2">
						<span class="color2">
							Lilly Watson
						</span> 
						<span class="color1">
							Singer
						</span>
						<br>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore.
					</p>
				</div>-->
			</div>
        </div>
    </article>
    <!--content end-->
	
	<script type="text/javascript">Cufon.now();</script>
	<script type="text/javascript">
	$(document).ready(function () {

		$('li.active').removeClass('active');
		$("a[href='/nightclub/events']").parent().addClass('active');

	});

	$.ajax({
		  type: 'POST',
		  url: mainDomain + '/events/getEvents',	
		  data:{},
		  success: function(data)
		  {
		  	//console.log(data);
		  	var data= JSON.parse(data);
		  	for(var i =0; i<data.length; i++)
		  	{
		  		if((i+1) % 3 == 0)
		  		{
		  		$('.eventContent').append('<div class="cols" id="'+data[i]['eventid']+'">'+
		  		'<h4>'+data[i]['title']+'</h4>'+
					'<figure class="pad_bot1">'+
						'<img src="/nightclub/assets/images/event/'+data[i]['ImageURL']+'" alt="">'+
					'</figure>'+
					'<p class="pad_bot2">'+
						'<span class="color2">'+
							data[i]['Date']+ ', '+data[i]['Time']+
						'</span> '+
						'<br>'+
						data[i]['Description']+
					'</p>'+
				'</div>');
		  		}
		  		else
		  		{
				$('.eventContent').append('<div class="cols marg_right1" id="'+data[i]['eventid']+'">'+
		  		'<h4>'+data[i]['title']+'</h4>'+
					'<figure class="pad_bot1">'+
						'<img src="/nightclub/assets/images/event/'+data[i]['ImageURL']+'" alt="">'+
					'</figure>'+
					'<p class="pad_bot2">'+
						'<span class="color2">'+
							data[i]['Date']+ ', '+data[i]['Time']+
						'</span> '+
						'<br>'+
						data[i]['Description']+
					'</p>'+
				'</div>');	
		  		}
		  	}
		  },
		 async:true
	});

	</script>
<style>
	.upcomevent{
		min-height: 130px;
	}
</style>
    <!--content -->
    <article id="content">
        <div class="wrapper pad_bot1">
			<section class="col1">
				<h2 id="welcom">Hello!</h2>
				<p class="color1">this is infinity production</p>
				<p class="pad_bot1">Part of Jakartalive-entertainment group event & Party organizer dedicated in nightlife entertaiment-Dj Label</p>
			</section>
			
			<section class="col1 pad_left1">
            <h2>Upcoming Events</h2>
            <div id="gallery1">
            </div>
        </div>
    </article>
    <!--content end-->
	
	<script type="text/javascript">
		$(document).ready(function () {
			$.ajax({
				  type: 'POST',
				  url: mainDomain + '/home/getUpcomingEvents',	
				  data:{},
				  success: function(data)
				  {
				  	//console.log(data);
				  	var data= JSON.parse(data);
				  	var day, month;
				  	for(var i = 0; i<data.length; i++)
				  	{
				  		day = data[i]['Date1'].split(' ');
				  		$("#gallery1").append(
							'<ul class="upcomevent">'+
								'<li>'+
									'<span class="dropcap_1">'+day[0]+'<span>'+day[1]+'</span></span>'+
									'<p><span class="color1">'+data[i]['title']+'</span><br>'+
									data[i]['Description']+'<br>'+
								'</li>'+
							'</ul>');
				  	}
				  },
				 async:true
			});
			Cufon.now();
		$('li.active').removeClass('active');
		$("a[href='/nightclub/home']").parent().addClass('active');
	})
	</script>
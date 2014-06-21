
    <!--content -->
    <article id="content">
        <div class="wrapper pad_bot1">
			<section class="col1">
				<h2 id="welcom">Hello!</h2>
				<p class="color1">Night Club is one of free website templates created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also XHTML &amp; CSS valid.</p>
				<p class="pad_bot1">This Night Club Template goes with two packages – with PSD source files and without them. PSD source files are available for free for the registered members of Templates.com. The basic package (without PSD source) is available for anyone without registration.</p>
			</section>
			
			<section class="col1 pad_left1">
            <h2>Upcoming Events</h2>
            <div id="gallery1">
				<!--<ul>
					<li> 
						<span class="dropcap_1">30<span>august</span></span>
						<p><span class="color1">Lorem ipsum dolor sit amet</span><br>
						adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
						<a href="#" class="link1">View Details</a></p>
					</li>
				</ul>-->
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
							'<ul>'+
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
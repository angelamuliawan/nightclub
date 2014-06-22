
    <!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Club Events</h2>
			<?php
	    	if($this->session->userdata('userid') != NULL) {
	    	?>
			<a href="#" id="btnAddNewEvent">Add New Event</a>
			<?php }
    		?>
			 <input type="hidden" value="<?= $this->session->userdata('userid') ?>" id="staffid"/>
			<div class="wrapper eventContent">
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
		  		$('.eventContent').append('<div class="cols eventss" id="'+data[i]['eventid']+'">'+
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
				$('.eventContent').append('<div class="cols marg_right1 eventss" id="'+data[i]['eventid']+'">'+
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
		  		if($("#staffid").val() != "") $('.eventss:last').append('<a style="cursor:pointer;" class="btnEdit">Edit</a> &nbsp; <a class="btnDelete" href="'+mainDomain+'/events/deleteEvent/'+data[i]['eventid']+'" style="cursor:pointer;">Delete</a>');
		  	}
		  },
		 async:true
	});

	</script>
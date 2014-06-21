
    <!--content -->
    <article id="content">
        <div class="wrapper careercontent">
        </div>
    </article>

	<script type="text/javascript">Cufon.now();</script>
	<script type="text/javascript">
	$(document).ready(function () {

		$('li.active').removeClass('active');
		$("a[href='/nightclub/career']").parent().addClass('active');

		$.ajax({
			  type: 'POST',
			  url: mainDomain + '/career/getCareer',	
			  data:{},
			  success: function(data)
			  {

			  	//console.log(data);
			  	var data= JSON.parse(data);
			  	for(var i =0; i<data.length; i++)
			  	{
			  		$('.careercontent').append(
			  		'<h2><strong>Urgently Needed.</strong> '+data[i]['CareerPosition']+'</h2>'+
					'<div class="wrapper">'+
						'<p class="color1 pad_bot1">'+data[i]['Requirement']+'</p>'+
						'<p class="pad_bot1">'+data[i]['Contact']+'</p>'+
					'</div>');
			  	}
			  },
			 async:true
		});

	});
	</script>
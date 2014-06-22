
    <!--content -->
    <article id="content">
    	<a href="">Add New Career</a>
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
			  		'<h2 class="title"><strong>Urgently Needed.</strong> '+data[i]['CareerPosition']+'</h2>'+
					'<div class="wrapper">'+
						'<p class="color1 pad_bot1 requirement">'+data[i]['Requirement']+'</p>'+
						'<p class="pad_bot1 contact">'+data[i]['Contact']+'</p>'+

			  		'<a style="cursor:pointer;" class="btnEdit">Edit</a> &nbsp; <a class="btnDelete" style="cursor:pointer;">Delete</a>'+
					'</div>');
			  	}
			  },
			 async:true
		});
		
		$('.btnEdit').click(function(){
			alert('asdf');
		});
	});
	</script>
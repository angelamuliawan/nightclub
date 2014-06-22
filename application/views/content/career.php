
    <!--content -->
    <article id="content">
    	<a href="#" id="btnAddNewCareer">Add New Career</a>
        <div class="wrapper careercontent">
        </div>
     <div class="wrapper">
	<!--<form id="CareerForm" action="#" style="display:none;">
	<h2>Career Form</h2>
		<div>
			<div class="wrapper"> <span>Title:</span>
				<input type="text" class="input" id="title" placeholder="Input Your Title"/>
			</div>
			<div class="textarea_box"> <span>Requirement:</span>
				<textarea name="textarea" cols="1" rows="1" id="requirement" placeholder="Input Requirement of Job"></textarea>
			</div>
			<div class="textarea_box"> <span>Message:</span>
				<textarea name="textarea" cols="1" rows="1" id="jobcontactus" placeholder="Input Contact"></textarea>
			</div>
			<input type="button" class="button" value="Send" id="btnSend"/>
			<label style="color:red" id="lblError"></label>
		</div>
	</form>-->
	</div>
    </article>

	<!-- jQuery Popup Overlay -->
	<script src="/nightclub/assets/js/popup/jquery-1.7.2.min.js"></script>
	<script src="/nightclub/assets/js/popup/jquery.popupoverlay.js"></script>
	<div style="display:none;">
		<button class="popupCreateCareer_open">Callback events</button>
	</div>
	
	<!-- Popup Edit OR CREATE career -->
	<div id="popupCreateCareer" class="well" style="height:600px; width:500px; margin-left:auto; margin-right:auto; display:none;">
		<h2 style="text-align:center;">Manage Career</h2>
		<div class="wrapper pad_bot1">
			<section class="col1">
				<input type="hidden" id="hdnCareerID" value="" />
				<form class="form" action="#" style="margin-left:60px;">
					<div style="width:400px; height:200px; margin-left:auto; margin-right:auto;">
					<div class="wrapper"> <span style="margin-left:10px;">Job Position:</span>
						<input type="text" class="input" id="title" placeholder="Input Your Title"/>
					</div>
					<div class="textarea_box" style="min-height:60px;"> <span style="margin-left:10px;">Requirement:</span>
						<textarea style="height:80px;" name="textarea" cols="1" rows="1" id="requirement" placeholder="Input Requirement of Job"></textarea>
					</div>
					<div class="textarea_box"  style="min-height:40px;"> <span style="margin-left:10px;">Contact:</span>
						<textarea style="height:40px;" name="textarea" cols="1" rows="1" id="jobcontactus" placeholder="Input Contact"></textarea>
					</div>
					<input type="button" class="button" value="Save" id="btnSend"/>
					<label style="color:red" id="lblError"></label>
				</form>
			</section>
        </div>
	</div>

	<script type="text/javascript">Cufon.now();</script>
	<script type="text/javascript">
	$(document).ready(function () {

		$('li.active').removeClass('active');
		$("a[href='/nightclub/career']").parent().addClass('active');

		
		$("#btnAddNewCareer").click(function(e){
			e.preventDefault();
			$('#hdnCareerID').val("");
			$('#title').val("");
			$('#requirement').val("");
			$('#jobcontactus').val("");
			$(".popupCreateCareer_open").click();
		});
		
		$('#popupCreateCareer').popup({
			opacity: 0.9,
			transition: 'all 0.7s'
		});
		

		$.ajax({
			  type: 'POST',
			  url: mainDomain + '/career/getCareer',	
			  data:{},
			  success: function(data)
			  {
			  	var data= JSON.parse(data);

				var require = [];			  	
			  	for(var i =0; i<data.length; i++)
			  	{
			  		var require = data[i]['Requirement'].replace(/<br>/g, '<br>   ');
			  		var contact = data[i]['Contact'].replace(/<br>/g, '<br>   ');
			  		$('.careercontent').append(
					'<div class="wrapper">'+
			  		'<h2 class="title"><strong>Urgently Needed.</strong> '+data[i]['CareerPosition']+'</h2>'+
						'<p class="color1 pad_bot1 requirement">'+ '   '+require+'</p>'+
						'<p class="pad_bot1 contact">'+ '   '+contact+'</p>'+
						'<input type="hidden" id="txtcareerid" value="'+data[i]['CareerID']+'" />'+
			  		'<a style="cursor:pointer;" class="btnEdit">Edit</a> &nbsp; <a class="btnDelete" href="'+mainDomain+'/career/deleteCareer/'+data[i]['CareerID']+'" style="cursor:pointer;">Delete</a>'+
					'</div>');
			  	}
			  },
			 async:false
		});
		
		$('.btnEdit').click(function(e){
			var title = $(this).parent('.wrapper').children('.title').text().replace('Urgently Needed.','');
			var contact = $(this).parent('.wrapper').children('.contact').text().replace(/   /g, '\n');
			var requirement =  $(this).parent('.wrapper').children('.requirement').text().replace(/   /g, '\n');
			var careerid =  $(this).parent('.wrapper').children('#txtcareerid').val();
			
			$('#title').val(title);
			$('#requirement').val($.trim(requirement));
			$('#jobcontactus').val($.trim(contact));
			$('#hdnCareerID').val(careerid);

			e.preventDefault();
			$(".popupCreateCareer_open").click();

	});
		$('#btnSend').click(function(){
				var title = $("#title").val();
				var requirement = $("#requirement").val().replace(/\n/g, '<br>');
				var jobcontactus = $("#jobcontactus").val().replace(/\n/g, '<br>');
				var careerid = $('#hdnCareerID').val();
				
				var param = {
					title : title,
					requirement : requirement,
					jobcontactus : jobcontactus,
					careerid : careerid
				}
				$.ajax({
					type: 'POST',
					url: mainDomain + '/career/saveCareer',	
					data: param,
					success: function(data)
					{
						if(data == 1)
						{
						alert("Career successfully save.");
						location.href = "career";
						}
						else alert("sorry we're unable to save, try again.")
					}
				});
		});
	});
	</script>
﻿/* __________________________________________________________________
		Name: piroBox v.1.0
		Date: November 2008
		Use: just  another gallery.
		Autor: Diego Valobra (http://www.pirolab.it),(http://www.diegovalobra.com)
		Version: 1.0
		Licence: CC-BY-SA http://creativecommons.org/licenses/by-sa/2.5/it/
_______________________________________________________________________________*/



/*_____________________ APPEND HTML FOR THE GALLERY _____________________*/

$(document).ready(function(){
$('body').append('<!-- :::::::: PIROBOX :::::::::: --><div class="pre"></div><div class="bg_thumbs" title="close"></div><div class="box_next"><a href="#" class="next" title="next image">next</a></div><div class="box_previous"><a href="#" class="previous" title="previous image">prev</a></div><div id="gallery" class="thumbs"><div class="img_box"><div class="box_next_in"><a href="#" class="next_in" title="next image">next</a></div><div class="box_previous_in"><a href="#" class="previous_in" title="previous image">prev</a></div><span class="thumbs_close" title="close"></span><div class="caption"><p title="caption"></p></div></div></div><!-- :::::::: END PIROBOX :::::::::: -->');	
});



(function($) {

	$.fn.piroBox = function(opt) {
  
		//set this options in your html page, it's easyer for you	 

		opt = jQuery.extend({
			border: '10', 
			borderColor : '#ffffff',
			mySpeed: 700,
			close_speed : 500,
			bg_alpha: 0.5,
			cap_op_start : 0.6,
			cap_op_end: 0.8,
			pathLoader : null, 
			gallery : null, 
			gallery_li : null,
			single : null,
			next_class : null,
			previous_class : null,
			gloabal : true
		}, opt);


return this.each(function() {
		
		/*___________________	START PIROBOX	    ________________________*/
	
			var div_load = '<div class="loader" title="close" style="background:'+opt.pathLoader+'"></div>';
			var next_out = $('.box_next').width();
			//alert(next_out)
			var idPiro = $(this).attr('id');			
			var b_size = (opt.border)+2;

			
			
				if ( $.browser.msie ) {
					opt.mySpeed = opt.mySpeed/1.2;
					$('head').append('<!--[if lte IE 6]><style type="text/css">@media screen{* html{overflow-y: hidden;}* html body{height: 100%;overflow: auto;}}</style><![endif]-->');
					//alert('ie')
				} else {
					(opt.mySpeed);
					//alert('ff')
				}

			$('.bg_thumbs, .thumbs, .thumbs_close ').hide();
			$('.caption').css({'opacity':'0','visibility':'hidden'});
			var caption = $('.caption').height();

			$('.img_box').hover(function(){
				$('.caption').stop().fadeTo(500,(opt.cap_op_end));
				},
				function(){
				$('.caption').stop().fadeTo(500,(opt.cap_op_start));
										 
				});
			
			$(window).resize(function(){
				var new_w_bg = $(window).height();
				$('.bg_thumbs').css({'visibility':'visible','height':+ new_w_bg+30 +'px'});				  
			});	
			
			var w_bg = $(window).height();
	
				 
			$('.bg_thumbs').css({'visibility':'hidden','height':+ w_bg+30 +'px'});
	
		
		/*___________________	LAUNCH GALLERY     ________________________*/
		
			$(opt.gallery + ',' + opt.single).bind('click',function() {	
				$(this).parent('li').parent('ul').prepend('<li  class="begin"></li>');
				$(this).parent('li').parent('ul').append('<li  class="end"></li>');
				$('.pre').append(div_load).hide();
				$('.img_box').prepend('<div class="caption"><p title="caption"></p></div>');
			
			$(opt.next_class+','+opt.previous_class).css({'visibility':'hidden'});
				
			$('.img_box').css('border-color',(opt.borderColor));
			//alert(opt.borderColor)		
			//alert($.image)	
			
		/*___________________SINGLE, NEXT AND PREVIOUS PREPARE    ________________________*/				
				//alert(caption)
				$(opt.next_class+','+opt.previous_class).css({'visibility':'visible'});
				//$((opt.previous_class)).show().css({'visibility':'hidden','opacity':0});
						
					if($(this).parent().next('li').is('.end') || $(this).parent('span').is('.single')){
		
						$((opt.next_class)).css('right','-'+next_out-30+'px');
						$(this).parent().next('li').removeClass('start');
								
					} else {
								
						$((opt.next_class)).css('visibility','visible').animate({
						right : '0px'																	  
						},1500);
						$(this).parent().next('li').addClass('start');
							
					}
					
					if($(this).parent().prev('li').is('.begin') || $(this).parent('span').is('.single')){
								//alert('begin')
								
						$((opt.previous_class)).css('left','-'+next_out-30+'px');
								
								
					} else {
								
						$((opt.previous_class)).css('visibility','visible').animate({
						left : '0px'																	  
						},1500);
						$(this).parent().prev('li').addClass('back');
							
					}
	
				$('.img_box img').remove('img');
					$(window).resize(function(){
												  
						var new_w_bg = $(window).height();
						$('.bg_thumbs').css({'visibility':'visible','height':+ new_w_bg+30 +'px'});
				  
					});
					var w_bg = $(window).height();
					
				

				$('.pre').css('visibility','visible').show().append(div_load);
						
				var pathImg = $(this).attr('href');
				var titleImg = $(this).attr('title');
				var myImg = new Image(); 
		
					$(myImg).load(function() {
		
						var imgH = myImg.height;
						var imgW = myImg.width;	
						var w_H = $(window).height();
						var w_W = $(window).width();
		
						$('#' + idPiro + ' .img_box').append(this);
							if(imgH+100 > w_H || imgW+100 > w_W){
								var new_img_W = imgW;
								var new_img_H = imgH;
								var _x = (imgW + 100)/w_W;
								var _y = (imgH + 100)/w_H;

								if ( _y > _x ){
								new_img_W = Math.round(imgW * (0.9/_y));
								new_img_H = Math.round(imgH * (0.9/_y));
								} else {
								new_img_W = Math.round(imgW * (0.9/_x));
								new_img_H = Math.round(imgH * (0.9/_x));
								}
								imgH += new_img_H;
								imgW += new_img_W;

								$('.thumbs').show();
								$('.bg_thumbs').show().css({'opacity':'0','visibility':'visible','height':+ w_bg +'px'}).fadeTo(300,(opt.bg_alpha));
								$('.img_box img').css('visibility','hidden').hide();
								$('.img_box').css({'visibility':'visible'}).animate({
									borderWidth : (opt.border),
									height : (new_img_H) + 'px' ,
									width : (new_img_W) + 'px' , 
									marginLeft : '-' +((new_img_W)/2  + b_size ) +'px',
									marginTop : '-' +((new_img_H)/2 + b_size) +'px'
									},1200);

		
								$('.img_box').queue(function(){
									$(myImg).height(new_img_H).width(new_img_W).css('opacity',0);
									$('.img_box img').css('visibility','visible').show().fadeTo(300,1);
									$('.img_box ').addClass('unloader');
									$('.loader').remove(div_load);
									$('.thumbs_close').show().css({'opacity':'0','visibility':'visible'}).fadeTo(300,1);
								$('.img_box').dequeue()
											 
									if(titleImg == ""){							
										$('.caption').hide();
										$('.thumbs_close').fadeTo(200,1);										
									}else{	
												
									$('.caption').css({'visibility':'visible','width':+ new_img_W-8+'px'}).show().fadeTo(400,(opt.cap_op_start));
									$('.caption p').html(titleImg);
									$('.thumbs_close').fadeTo(200,1);

			
									}
		
								});
										
							} else {
										
								$('.thumbs').show();
								$('.bg_thumbs').show().css({'opacity':'0','visibility':'visible','height':+ w_bg +'px'}).fadeTo(300,(opt.bg_alpha));
								$('.img_box img').css('visibility','hidden').hide();
								$('.img_box').css({'visibility':'visible'}).animate({
									borderWidth : (opt.border),
									height : (imgH) + 'px' ,
									width : (imgW) + 'px' , 
									marginLeft : '-' +((imgW)/2  + b_size) +'px',
									marginTop : '-' +((imgH)/2 + b_size) +'px'
								},1200);
								//alert(b_size)
								$('.img_box').queue(function(){
																	 
									$(myImg).height(imgH).width(imgW).css('opacity',0);

									$('.img_box img').css('visibility','visible').show().fadeTo(300,1);
									$('.img_box ').addClass('unloader');
									$('.loader').remove(div_load);
									$('.thumbs_close').show().css({'opacity':'0','visibility':'visible'}).fadeTo(300,1);
								$('.img_box').dequeue()
										 
									if(titleImg == ""){							
										$('.caption').hide();
										$('.thumbs_close').fadeTo(200,1);
									}else{
											
										$('.caption').css({'visibility':'visible','width':+ imgW-8+'px'}).show().fadeTo(400,(opt.cap_op_start));
										$('.caption p').html(titleImg);
										$('.thumbs_close').fadeTo(200,1);

		//alert(caption)
									}
		
								});

							}

					});

		


				$(myImg).attr('src', pathImg);
				return false;

			});
		/*___________________	NEXT    ________________________*/





			$((opt.next_class)).bind('click',function() {	
		
				$('.thumbs_close').css({'opacity':'0'});
				$('.img_box img').remove('img');
				$('.pre').css('visibility','visible').show();
				$('.caption').css({'opacity':'0','visibility':'hidden'}).show();
				$('.pre').append(div_load);	
						
				var pathImg = $('.start>a').attr('href');
								
				var titleImg = $('.start>a').attr('title');
				
				//var myId = $('.start>a').attr('id');
				
				$('.start').next('li').addClass('start');
		
				$('.start').queue(function(){
					$(this).prev('li').removeAttr('class');
					$((opt.gallery_li)).removeClass('back');
					$('.start').prev('li').prev('li').addClass('back');
					$((opt.previous_class)).animate({left: '0px'},300);
				$('.start').dequeue();
				});
		
					$((opt.next_class)).animate({right: '-'+next_out+'px'},400);
						
				var myImg = new Image(); 
		
				$(myImg).load(function() {
		
					var imgH = myImg.height;
					var imgW = myImg.width;	
					var w_H = $(window).height();
					var w_W = $(window).width();		
		
		
						$('#' + idPiro + ' .img_box').append(this);
							if(imgH+100 > w_H || imgW+100 > w_W){
								var new_img_W = imgW;
								var new_img_H = imgH;
								var _x = (imgW + 100)/w_W;
								var _y = (imgH + 100)/w_H;

								if ( _y > _x ){
								new_img_W = Math.round(imgW * (0.9/_y));
								new_img_H = Math.round(imgH * (0.9/_y));
								} else {
								new_img_W = Math.round(imgW * (0.9/_x));
								new_img_H = Math.round(imgH * (0.9/_x));
								}
								imgH += new_img_H;
								imgW += new_img_W;
							$('.thumbs').show();
							$('.img_box img').css('visibility','hidden').hide();
								$('.img_box').css({'visibility':'visible'}).animate({
									borderWidth : (opt.border),
									height : (new_img_H) + 'px' ,
									width : (new_img_W) + 'px' , 
									marginLeft : '-' +((new_img_W)/2 + b_size) +'px',
									marginTop : '-' +((new_img_H)/2 + b_size) +'px'
								},(opt.mySpeed));
									  
							$('.img_box').queue(function(){
								$(myImg).height(new_img_H).width(new_img_W).css('opacity',0);
								$('.img_box img').css('visibility','visible').show().fadeTo(200,1)
								$('.img_box ').addClass('unloader');
								if($('.start ').is('li.end')){
									$((opt.next_class)).animate({right: '-'+next_out+'px'},400);
									$('.end').removeClass('start');
									//alert('end');
								}else{						
								$((opt.next_class)).animate({right: '0px'},400);
								}
								$('.loader').remove(div_load);
							$('.img_box').dequeue()
		
		
									if(titleImg == ""){							
										$('.caption').hide();
										$('.thumbs_close').fadeTo(200,1);
									}else{
											
										$('.caption').css({'visibility':'visible','width':+ new_img_W-8+'px'}).show().fadeTo(400,(opt.cap_op_start));
										$('.caption p').html(titleImg);
										$('.thumbs_close').fadeTo(200,1);

		//alert(caption)
									}										
								
							});
		
						} else {
		
							$('.thumbs').show();
							$('.img_box img').css('visibility','hidden').hide();
								$('.img_box').css({'visibility':'visible'}).animate({
									top : '50%',															  
									borderWidth : (opt.border),
									height : (imgH) + 'px' ,
									width : (imgW) + 'px' , 
									marginLeft : '-' +((imgW)/2  + b_size) +'px',
									marginTop : '-' +((imgH)/2 + b_size) +'px'
								},(opt.mySpeed));
										 
							$('.img_box').queue(function(){
								$(myImg).height(imgH).width(imgW).css('opacity',0);
								
								$('.img_box img').css('visibility','visible').show().fadeTo(200,1);
								$('.img_box ').addClass('unloader');
																	 
								$('.loader').remove(div_load);
								if($('.start ').is('li.end')){
									$((opt.next_class)).animate({right: '-'+next_out+'px'},400);
									//alert('end')
									$('.end').removeClass('start');
								}else{						
								$((opt.next_class)).animate({right: '0px'},400);
								}
							$('.img_box').dequeue()
		
									if(titleImg == ""){							
										$('.caption').hide();
										$('.thumbs_close').fadeTo(200,1);
									}else{
											
										$('.caption').css({'visibility':'visible','width':+ imgW-8+'px'}).show().fadeTo(400,(opt.cap_op_start));
										$('.caption p').html(titleImg);
										$('.thumbs_close').fadeTo(200,1);

		//alert(caption)
									}
		
							});
		
						}
		
					});
		
					$(myImg).attr('src', pathImg);
					
					return false;
		
			});
			 
		/*___________________	PREVIOUS   ________________________*/
		
		
			$((opt.previous_class)).bind('click',function() {
		
		
				$('.thumbs_close').css({'opacity':'0'});
				$('.img_box img').remove('img');
				$('.pre').css('visibility','visible').show();
				$('.caption').css({'opacity':'0','visibility':'hidden'}).show();
				$('.pre').append(div_load);	
						
				var pathImg = $('.back>a').attr('href');
								
				var titleImg = $('.back>a').attr('title');
				
				//var myId = $('.back>a').attr('id');
		
		
				$((opt.gallery_li)).removeClass('start');
					$((opt.gallery_li)).queue(function(){
						$('.back').next('li').addClass('start');
					$((opt.gallery_li)).dequeue();
					});
					//$('.start').prev('li').addClass('back');
					$('.back').queue(function(){
						$((opt.gallery_li)).removeClass('back');
						$('.start').prev('li').prev('li').addClass('back');
						$((opt.next_class)).animate({right: '0px'},300);
					$('.back').dequeue();
					});
				
		
					$((opt.previous_class)).animate({left: '-'+next_out+'px'},400);		

					
					var myImg = new Image(); 
		
					$(myImg).load(function() {
		
						var imgH = myImg.height;
						var imgW = myImg.width;	
						var w_H = $(window).height();
						var w_W = $(window).width();		
		
		
						$('#' + idPiro + ' .img_box').append(this);
							if(imgH+100 > w_H || imgW+100 > w_W){
								var new_img_W = imgW;
								var new_img_H = imgH;
								var _x = (imgW + 100)/w_W;
								var _y = (imgH + 100)/w_H;

								if ( _y > _x ){
								new_img_W = Math.round(imgW * (0.9/_y));
								new_img_H = Math.round(imgH * (0.9/_y));
								} else {
								new_img_W = Math.round(imgW * (0.9/_x));
								new_img_H = Math.round(imgH * (0.9/_x));
								}
								imgH += new_img_H;
								imgW += new_img_W;
								$('.thumbs').show();
								$('.img_box img').css('visibility','hidden').hide();
								$('.img_box').css({'visibility':'visible'}).animate({
									borderWidth : (opt.border),
									height : (new_img_H) + 'px' ,
									width : (new_img_W) + 'px' , 
									marginLeft : '-' +((new_img_W)/2  + b_size) +'px',
									marginTop : '-' +((new_img_H)/2 + b_size) +'px'
								},(opt.mySpeed));
															  
								$('.img_box').queue(function(){
									$(myImg).height(new_img_H).width(new_img_W).css('opacity',0);
									$('.img_box img').css('visibility','visible').show().fadeTo(200,1)
									$('.img_box ').addClass('unloader');
									$('.loader').remove(div_load);
								if($('.back').is('li.begin')){
									$((opt.previous_class)).animate({left: '-'+next_out+'px'},400);
									$('.begin').removeClass('back');
									$((opt.gallery_li)).removeClass('start');
									$((opt.gallery_li)).queue(function(){						  
										$('.begin').next('li').next('li').addClass('start');
									$((opt.gallery_li)).dequeue()
									});
									//alert('begin')
								} else{	
								$((opt.previous_class)).animate({left: '0px'},400);
								}							
								$('.img_box').dequeue()
		
		
									if(titleImg == ""){							
										$('.caption').hide();
										$('.thumbs_close').fadeTo(200,1);
									}else{
											
										$('.caption').css({'visibility':'visible','width':+ new_img_W-8+'px'}).show().fadeTo(400,(opt.cap_op_start));
										$('.caption p').html(titleImg);
										$('.thumbs_close').fadeTo(200,1);

		//alert(caption)
									}
								
								});
		
						} else {
		
							$('.thumbs').show();
							$('.img_box img').css('visibility','hidden').hide();
							$('.img_box').css({'visibility':'visible'}).animate({
								top : '50%',															  
								borderWidth : (opt.border),
								height : (imgH) + 'px' ,
								width : (imgW) + 'px' , 
								marginLeft : '-' +((imgW)/2  + b_size) +'px',
								marginTop : '-' +((imgH)/2 + b_size) +'px'
							},(opt.mySpeed));
															 
							$('.img_box').queue(function(){
								$(myImg).height(imgH).width(imgW).css('opacity',0);					
								$('.img_box img').css('visibility','visible').show().fadeTo(200,1);
								$('.img_box ').addClass('unloader');														 
								$('.loader').remove(div_load);
								if($('.back').is('li.begin')){
									$((opt.previous_class)).animate({left: '-'+next_out+'px'},400);
									$('.begin').removeClass('back');
									$((opt.gallery_li)).removeClass('start');
									$((opt.gallery_li)).queue(function(){						  
										$('.begin').next('li').next('li').addClass('start');
									$((opt.gallery_li)).dequeue()
									});
									//alert('begin')
								} else{	
								$((opt.previous_class)).animate({left: '0px'},400);
								}									
							$('.img_box').dequeue()
		
		
									if(titleImg == ""){							
										$('.caption').hide();
										$('.thumbs_close').fadeTo(200,1);
									}else{
											
										$('.caption').css({'visibility':'visible','width':+ imgW-8+'px'}).show().fadeTo(400,(opt.cap_op_start));
										$('.caption p').html(titleImg);
										$('.thumbs_close').fadeTo(200,1);

		//alert(caption)
									}
								
							});
								
						}
		
				});
		
				$(myImg).attr('src', pathImg);
				return false;
		
			});				
		/*___________________	CLOSE IMAGE    ________________________*/

			$('.bg_thumbs, .thumbs_close').bind('click',function(){
				$('.pre').hide();
				$('.caption').remove();				
				$('li.begin').remove();
				$('li.end').remove();
				$((opt.next_class)).animate({
				right :'-'+next_out+'px'
				},900);
				$((opt.previous_class)).animate({
				left :'-'+next_out+'px'
				},900);
				$((opt.gallery_li)).removeClass('start');
				$((opt.gallery_li)).removeClass('back');
				$('.loader').fadeTo(300,0);
				$('.loader').queue(function(){

					$('.bg_thumbs').fadeTo(500,0);
					$('.img_box img').remove();
					$('.img_box ').queue(function(){
					$('.img_box').css({'borderWidth' : '0','top':'50%','height' : '50px' ,'width' : '50px' , 'marginLeft' : '-25px','marginTop' : '-18px','visibility':'hidden'}).removeClass('unloader');
						$('.bg_thumbs,.thumbs_close').hide().css('visibility','hidden');
						$('.thumbs').hide();
					$('.img_box').dequeue();
					});
				$('.loader').dequeue().remove(div_load);
				});
		

				$('.img_box img, .thumbs_close').fadeTo(400,0);
				$('.img_box img').queue(function(){
					$('.img_box').animate({
					borderWidth : '0',
					top:'50%',
					height : '50px' ,
					width : '50px' , 
					marginLeft : '-25px',
					marginTop : '-18px'
					},(opt.close_speed));     
					$('.img_box img').remove();
					$('.img_box').removeClass('unloader');
					$('.bg_thumbs').fadeTo(500,0);
						$('.img_box ').queue(function(){
							$('.bg_thumbs,.thumbs_close').hide().css('visibility','hidden');
							$('.thumbs').css('display','none');	
						$('.img_box').css('visibility','hidden').dequeue()
				
						});
				$('.img_box img').dequeue();				 
				});


			});
		
		});

	}   

})(jQuery);

    <!--content -->
    <article id="content">
        <div class="wrapper">
			<h2>Rnb Party Gallery</h2>
			<dl class="folio">
				<dt> <img src="images/gallery_big_img1.jpg" alt="" id="img1"> <img src="images/gallery_big_img2.jpg" alt="" id="img2"> <img src="images/gallery_big_img3.jpg" alt=""  class="active" id="img3"> <img src="images/gallery_big_img4.jpg" alt="" id="img4"> <img src="images/gallery_big_img5.jpg" alt="" id="img5"> <img src="images/gallery_big_img6.jpg" alt="" id="img6"> <img src="images/gallery_big_img7.jpg" alt="" id="img7"> <img src="images/gallery_big_img8.jpg" alt="" id="img8"> <img src="images/gallery_big_img9.jpg" alt="" id="img9"> </dt>
				<dd>
					<ul class="marg_right1">
						<li><a href="#img1"><img src="images/gallery_img1.jpg" alt="" width="260" height="171"></a></li>
						<li><a href="#img2"><img src="images/gallery_img2.jpg" alt="" width="260" height="171"></a></li>
						<li><a href="#img3"><img src="images/gallery_img3.jpg" alt="" width="260" height="171"></a></li>
					</ul>
					<ul class="marg_right1">
						<li><a href="#img4"><img src="images/gallery_img4.jpg" alt="" width="260" height="171"></a></li>
						<li><a href="#img5"><img src="images/gallery_img5.jpg" alt="" width="260" height="171"></a></li>
						<li><a href="#img6"><img src="images/gallery_img6.jpg" alt="" width="260" height="171"></a></li>
					</ul>
					<ul>
						<li><a href="#img7"><img src="images/gallery_img7.jpg" alt="" width="260" height="171"></a></li>
						<li><a href="#img8"><img src="images/gallery_img8.jpg" alt="" width="260" height="171"></a></li>
						<li><a href="#img9"><img src="images/gallery_img9.jpg" alt="" width="260" height="171"></a></li>
					</ul>
				</dd>
			</dl>
        </div>
    </article>
    <!--content end-->
	  
	<script type="text/javascript">
	$(document).ready(function () {
		Cufon.now();
		var Img = '#' + $(".folio .active").attr('id')
		$(".folio dt img").css({
			opacity: '0'
		});
		$(".folio dt img.active").css({
			opacity: '1'
		});
		$(".folio ul li a").click(function () {
			var ImgId = $(this).attr("href");
			if (ImgId != Img) {
				$(".folio dt .active").animate({
					opacity: "0"
				}, 600, function () {
					$(this).removeClass('active');
				})
				$(ImgId).animate({
					opacity: "1"
				}, 600).addClass('active');
			}
			Img = ImgId;
			return false;
		})
	});
	</script>

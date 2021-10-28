<!-- Header - set the background image for the header in the line below -->
  	<div style="margin-top: 50px">
		<ul id="demo1">
			<li><a href="#slide1"><img src="img/baner/01.jpg" alt=""></a></li>
			<li><a href="#slide2"><img src="img/baner/02.jpg"  alt=""></a></li>
			<li><a href="#slide3"><img src="img/baner/03.jpg" alt=""></a></li>
		</ul>
	</div>
	<div class="bgRepeatedNOBorder"></div>
	<script>
			$(function() {
				var demo1 = $("#demo1").slippry({
					// transition: 'fade',
					// useCSS: true,
					// speed: 1000,
					// pause: 3000,
					// auto: true,
					// preload: 'visible',
					// autoHover: false
					pager:false
				});

				$('.stop').click(function () {
					demo1.stopAuto();
				});

				$('.start').click(function () {
					demo1.startAuto();
				});

				$('.prev').click(function () {
					demo1.goToPrevSlide();
					return false;
				});
				$('.next').click(function () {
					demo1.goToNextSlide();
					return false;
				});
				$('.reset').click(function () {
					demo1.destroySlider();
					return false;
				});
				$('.reload').click(function () {
					demo1.reloadSlider();
					return false;
				});
				$('.init').click(function () {
					demo1 = $("#demo1").slippry();
					return false;
				});
			});
		</script>
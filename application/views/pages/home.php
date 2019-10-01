	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/image_slider/styles.css">
	<script type="text/javascript" src="<?php echo base_url();?>js/image_slider/jquery.glide.min.js"></script>


    <div class="slider">
		<ul class="slides">
	        <li class="slide">
				<figure>
					<figcaption>Designed by <a href="http://dribbble.com/shots/1362980-Witches">Adam Record</a></figcaption>
					<img src="<?php echo base_url();?>images/image_slider/witches.png" alt="dribbble witches">
				</figure>
	        </li>
	        <li class="slide">
				<figure>
					<figcaption>Designed by <a href="http://dribbble.com/shots/1360304-Searing-Mountain">Martin Sorensen</a></figcaption>
					<img src="<?php echo base_url();?>images/image_slider/searing-mountain.png" alt="searing mountain illustration">
				</figure>
	        </li>
	        <li class="slide">
				<figure>
					<figcaption>Designed by <a href="http://dribbble.com/shots/1359635-Taipei-101">nos</a></figcaption>
					<img src="<?php echo base_url();?>images/image_slider/taipei-fireworks.png" alt="taipei fireworks">
				</figure>
	        </li>
	        <li class="slide">
				<figure>
					<figcaption>Designed by <a href="http://dribbble.com/shots/1364323-Mockup-Phone">Ruslan Siiz</a></figcaption>
					<img src="<?php echo base_url();?>images/image_slider/iphone-mockup.png" alt="coffee cup iphone newspaper">
				</figure>
	        </li>
	        <li class="slide">
				<figure>
					<figcaption>Designed by <a href="http://dribbble.com/shots/1364642-Super-Squirrel">Alex Grigoras</a></figcaption>
					<img src="<?php echo base_url();?>images/image_slider/super-squirrel.png" alt="flying super squirrel">
				</figure>
	        </li>
      	</ul>
    </div><!-- @end .slider -->
  	
</div>
<script>
	document.getElementById("home").className="active";

	$(function(){
		$('.slider').glide({
			autoplay: 3000,
			hoverpause: false, // set to false for nonstop rotate
			arrowRightText: '&rarr;',
			arrowLeftText: '&larr;'
		});
	});
</script> 




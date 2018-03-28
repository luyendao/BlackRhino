<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php

		// Only works with a video post object
		$video_object = get_field('featured_video_embed'); 
		$video_bg = get_field('featured_video_background');
		preg_match('/src="(.+?)"/', $video_object, $matches);
		$src = $matches[1]; // URL
		$video_id = getVimeoVideoIdFromUrl($src);	


?>

<section class="video">

	<div class="vimeo-player widescreen flex-video" id="vimeo-embed">
		<div id="overlay-bg" style="background-image:url(<?php echo $video_bg; ?>);">
			<div class="overlay">
				<svg id="button-play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.5 38.5" width="120" height="120"><style>.a{fill:#FFF;}</style><path d="M19.3 38.5C8.6 38.5 0 29.9 0 19.3 0 8.6 8.6 0 19.3 0c10.6 0 19.3 8.6 19.3 19.3C38.5 29.9 29.9 38.5 19.3 38.5zM19.3 0.8c-10.2 0-18.5 8.3-18.5 18.5 0 10.2 8.3 18.5 18.5 18.5 10.2 0 18.5-8.3 18.5-18.5C37.7 9.1 29.4 0.8 19.3 0.8z" class="a"/><path d="M14.7 28.8c-0.1 0-0.3 0-0.4-0.1 -0.3-0.1-0.4-0.4-0.4-0.7V10.5c0-0.3 0.2-0.6 0.4-0.7 0.3-0.1 0.6-0.1 0.8 0l13.7 8.7c0.2 0.2 0.4 0.4 0.4 0.7s-0.1 0.5-0.4 0.7l-13.7 8.7C15 28.7 14.8 28.8 14.7 28.8zM14.7 10.5l0 0v17.4l13.7-8.7L14.7 10.5z" class="a"/></svg>
			</div>
		</div>		
	</div>

</section>


	<script>

    var options = {
        id: <?php echo $video_id; ?>,
        loop: false,
        autoplay: false,
        allowfullscreen: true
    };

    var player = new Vimeo.Player('vimeo-embed', options);

    player.setVolume(25);

	// Dom Elements
	var videoEmbed = document.getElementById("vimeo-embed");
	var videoBg = document.getElementById("overlay-bg");
	var playButton = document.getElementById("button-play");
	//var pauseButton = document.getElementById("button-pause");

	// Event Listeners
	player.on('pause', function(data) {
	   $(playButton).velocity("fadeIn", { delay: 200, duration: 500 });
	   $(videoBg).velocity("fadeIn", { delay: 300, duration: 550 });
	   //$(videoEmbed).toggleClass('flex-video');
	});

	player.on('play', function(data) {
	   $(playButton).hide();
	   $(videoBg).velocity("fadeOut", { delay: 300, duration: 550 });
	   //$(videoEmbed).toggleClass('flex-video');
	});

	player.on('ended', function(data) {
	   $(playButton).velocity("fadeIn", { delay: 200, duration: 500 });
	   $(videoBg).velocity("fadeIn", { delay: 300, duration: 550 });
	});

	// Button click event listeners
	playButton.addEventListener("click", function() {
	 
		player.getPaused().then(function(paused) {
		    // paused = whether or not the player is paused
		    console.log(paused);
		    if (paused == true) {

		    	player.play();
		    }
		}).catch(function(error) {
		   console.log(error);
		});	  
	  //setTimeout(function(){  }, 150);
	  
	  $(playButton).velocity("fadeOut", { delay: 300, duration: 750 });
	});

	//pauseButton.addEventListener("click", function() {
	//  player.pause();
	//});


	</script>

<?php get_footer();

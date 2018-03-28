<?php
/**
 * The template for displaying all videos
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div id="single-post" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">

	<header class="embed-container">

	<?php 
	
		// Only works with a video post object
		$video_object = get_field('vimeo_embed'); // req field 
		preg_match('/src="(.+?)"/', $video_object, $matches);
		$src = $matches[1]; // URL
		$video_id = getVimeoVideoIdFromUrl($src);
		$video_bg = get_field('vimeo_background_image');

	if($video_id): ?>

	<a class="vimeo-player" id="vimeo-embed" href="#" data-src="<?php echo $src;?>?autoplay=1" id="<?php echo $video_id; ?>">
		<div id="overlay-bg" style="background-image:url(<?php echo $video_bg; ?>);">
			<div class="overlay">
				<svg id="button-play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.5 38.5" width="512" height="512"><style>.a{fill:#FFF;}</style><path d="M19.3 38.5C8.6 38.5 0 29.9 0 19.3 0 8.6 8.6 0 19.3 0c10.6 0 19.3 8.6 19.3 19.3C38.5 29.9 29.9 38.5 19.3 38.5zM19.3 0.8c-10.2 0-18.5 8.3-18.5 18.5 0 10.2 8.3 18.5 18.5 18.5 10.2 0 18.5-8.3 18.5-18.5C37.7 9.1 29.4 0.8 19.3 0.8z" class="a"/><path d="M14.7 28.8c-0.1 0-0.3 0-0.4-0.1 -0.3-0.1-0.4-0.4-0.4-0.7V10.5c0-0.3 0.2-0.6 0.4-0.7 0.3-0.1 0.6-0.1 0.8 0l13.7 8.7c0.2 0.2 0.4 0.4 0.4 0.7s-0.1 0.5-0.4 0.7l-13.7 8.7C15 28.7 14.8 28.8 14.7 28.8zM14.7 10.5l0 0v17.4l13.7-8.7L14.7 10.5z" class="a"/></svg>
			</div>
		</div>
	</a>	


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

		// Event Listeners
		/*player.on('pause', function(data) {
		   $(playButton).velocity("fadeIn", { delay: 200, duration: 500 });
		   $(videoBg).velocity("fadeIn", { delay: 300, duration: 550 });
		});
		*/

		player.on('play', function(data) {
		   $(playButton).hide();
		   $(videoBg).velocity("fadeOut", { delay: 300, duration: 550 });
		});

		// Button click event listeners
		playButton.addEventListener("click", function() {
		  player.play();
		  $(playButton).velocity("fadeOut", { delay: 300, duration: 750 });
		});

	</script>


	<?php endif; ?>

	</header>	
		

	<section class="summary">
		<h6><?php the_field('client_name'); ?></h6>	
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<strong><?php echo strtoupper(get_field('video_type')); ?></strong>
	
		<?php if(get_field('pull_quote')):
			echo '<h3 class="pull-quote">"' . get_field('pull_quote') . '"</h3>';
		endif; ?>

		<?php if(get_field('summary_column_2')): ?>
			<div class="summary-two-column">
				<div><?php the_field('summary'); ?></div>
				<div><?php the_field('summary_column_2'); ?></div>
			</div>
		<?php else: ?>
			<div class="summary-one-column">
				<?php the_field('summary'); ?>
			</div>
		 <?php endif; ?>

	</section>

	<?php
		if( have_rows('behind_the_scenes_stills') ): ?>

		<section class="behind-scenes">
		
			<ul class="grid-photos">
				<?php 
				    while ( have_rows('behind_the_scenes_stills') ) : the_row(); 
						$img_url = get_sub_field('image'); 
						$image = aq_resize( $img_url, 1000, 600, true ); 		    
				    ?>
				    <li>
				    	<img src="<?php echo $image; ?>" alt="" />
				    	<?php if (get_sub_field('caption')): ?>
					    	<p class="caption"><?php echo get_sub_field('caption'); ?></p>				    	
					    <?php endif; ?>

				    </li>
				    <?php endwhile; ?>
			</ul>	    

			
			
		</section>

	<?php endif; ?>


<?php if(get_field('behind_the_scenes_video')): ?>

	<header class="embed-container" id="behind-scenes-video">

	<?php 
	
		// Only works with a video post object
		$video_object = get_field('behind_the_scenes_video'); // req field 
		preg_match('/src="(.+?)"/', $video_object, $matches);
		$src = $matches[1]; // URL
		$video_id = getVimeoVideoIdFromUrl($src);		

		// Use specific image, or default to hero background image
		if (get_field('behind_the_scenes_video_preview_image')):
			$video_bg =get_field('behind_the_scenes_video_preview_image');
		else:
			$video_bg = get_field('vimeo_background_image');
		endif;
		

		if($video_id): ?>

			<a class="vimeo-player" id="vimeo-embed-behind-scenes" href="#" data-src="<?php echo $src;?>?autoplay=1" id="<?php echo $video_id; ?>" >
				<div id="overlay-bg-behind-scenes" style="background-image:url(<?php echo $video_bg; ?>);">
					<div class="overlay">
						<svg id="button-play-behind-scenes" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.5 38.5" width="512" height="512"><style>.a{fill:#FFF;}</style><path d="M19.3 38.5C8.6 38.5 0 29.9 0 19.3 0 8.6 8.6 0 19.3 0c10.6 0 19.3 8.6 19.3 19.3C38.5 29.9 29.9 38.5 19.3 38.5zM19.3 0.8c-10.2 0-18.5 8.3-18.5 18.5 0 10.2 8.3 18.5 18.5 18.5 10.2 0 18.5-8.3 18.5-18.5C37.7 9.1 29.4 0.8 19.3 0.8z" class="a"/><path d="M14.7 28.8c-0.1 0-0.3 0-0.4-0.1 -0.3-0.1-0.4-0.4-0.4-0.7V10.5c0-0.3 0.2-0.6 0.4-0.7 0.3-0.1 0.6-0.1 0.8 0l13.7 8.7c0.2 0.2 0.4 0.4 0.4 0.7s-0.1 0.5-0.4 0.7l-13.7 8.7C15 28.7 14.8 28.8 14.7 28.8zM14.7 10.5l0 0v17.4l13.7-8.7L14.7 10.5z" class="a"/></svg>
					</div>
				</div>
			</a>	

			<script>

			    var options = {
			        id: <?php echo $video_id; ?>,
			        loop: false,
			        autoplay: false,
			        allowfullscreen: true
			    };

			    var player2 = new Vimeo.Player('vimeo-embed-behind-scenes', options);

			    player2.setVolume(25);

				// Dom Elements
				var videoEmbed2 = document.getElementById("vimeo-embed-behind-scenes");
				var videoBg2 = document.getElementById("overlay-bg-behind-scenes");
				var playButton2 = document.getElementById("button-play-behind-scenes");

				// Event Listeners
				player2.on('pause', function(data) {
				   $(playButton2).velocity("fadeIn", { delay: 200, duration: 500 });
				   $(videoBg2).velocity("fadeIn", { delay: 300, duration: 550 });
				});

				player2.on('play', function(data) {
				   $(playButton2).hide();
				   $(videoBg2).velocity("fadeOut", { delay: 300, duration: 550 });
				});

				// Button click event listeners
				playButton2.addEventListener("click", function(e) {
				  e.preventDefault();
				  player2.play();
				  $(playButton2).velocity("fadeOut", { delay: 300, duration: 750 });
				});

			</script>


		<?php endif; ?>

	</header>	

	<div class="behind-scenes-video-caption">
		<?php echo get_field('behind_the_scenes_video_caption'); ?>
	</div>


<?php endif; ?>


	<section class="featured-work" id="featured-picks">

		<h4>Featured Picks</h4>

		<?php
		$this_post = get_the_ID();
		$args = array (
			'post__not_in' => array($this_post),
			'posts_per_page' => 4,
			'orderby' => 'rand',
			'post_type' => 'video',
			 'meta_query' => array(array('key' => '_thumbnail_id'))
		);

		$the_query = new WP_query($args);

			// The Loop
			if ( $the_query->have_posts() ):
				echo '<ul>';
				while ( $the_query->have_posts() ):
					$the_query->the_post();
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'medium' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 600, 400, true ); //resize & crop the image					
					?> 


					<li class="columns features large-3 medium-4 small-12">
		                <a href="<?php the_permalink(); ?>" style="background-image:url(<?php echo $img_url; ?>);">
		                <span><h3><p><?php echo get_field('client_name'); ?></p><?php the_title(); ?><br /> <small><?php echo strtoupper(get_field('video_type')); ?></small></h3></span>                    
		                </a>
				    </li>

				<?php
				endwhile;
				echo '</ul>';
				/* Restore original Post Data */
				wp_reset_postdata();
				
			endif;

		?>

		<script>
		$('.features').hover(function(e) {

		    // On hover
		    $(this).find('span').velocity({
		        backgroundColor: "#00000",
		        backgroundColorAlpha: 0.8
		    });

		     $(this).find('span > h3').velocity("fadeIn", { delay: 100, duration: 1500 });

		    // Off hover
		    }, function() {

		    // On hover
		    $(this).find('span').velocity({
		        backgroundColor: "#00000",
		        backgroundColorAlpha: 0,
		    });

		     $(this).find('span > h3').velocity("fadeOut", { delay: 200, duration: 800 });

		 });

		</script>


	</section>


	</article>
<?php endwhile;?>

</div>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_footer();

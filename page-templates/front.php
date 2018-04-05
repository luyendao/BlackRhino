<?php
/*
Template Name: Front
*/
get_header(); ?>


<section class="video">

<div class="child">
	<h1><?php echo get_field('video_tagline'); ?></h1>
</div>

<?php echo do_shortcode("[universal_video_player_and_bg settings_id='2']");?>
</section>



<?php get_footer();

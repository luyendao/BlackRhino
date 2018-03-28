<?php
/*
Template Name: Team
*/
get_header(); ?>

<div class="main-content">

<img src="<?php echo get_field('team_image');?>" />

<section class="team-summary">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <ul>
    	<li><?php echo get_field('team_blurb'); ?></li>
    	<li><?php echo get_field('team_blurb_column_2'); ?></li>
    </ul>
</section>


<section class="social-feed">
	<?php dynamic_sidebar( 'team-widgets' ); ?>	
</section>


</div>

<?php get_footer();

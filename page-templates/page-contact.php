<?php
/*
Template Name: Contact
*/
get_header(); ?>

<div class="main-content">

<img src="<?php echo get_field('contact_us_image');?>" />

<section class="summary">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <p><?php echo get_field('contact_us_blurb'); ?></p>
</section>

<section class="map">
<img src="http://maps.googleapis.com/maps/api/staticmap?center=1675+West+2nd+Avenue,+Vancouver,+BC,+Canada&zoom=13&scale=2&size=600x300&maptype=roadmap&key=AIzaSyC_OIm7EoksWAR4aGZmJjENuHp5yftAxes&format=gif&visual_refresh=true&markers=size:small%7Ccolor:0xb9001e%7Clabel:1%7C1675+West+2nd+Avenue,+Vancouver,+BC,+Canada" alt="Google Map of 1675 West 2nd Avenue, Vancouver, BC, Canada">


</section>

</div>

<?php get_footer();

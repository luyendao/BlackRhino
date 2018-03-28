<?php
/*
Template Name: Work
*/
get_header(); ?>


<section class="featured-work">

<?php 

$posts = get_field('featured_listing');

if( $posts ): ?>
    <ul>
    <?php 
    	$counter = 1;
    	foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

        <?php if ( $counter <= 2 ): ?>
        	<li class="columns large-6 medium-12-down features item-count-<?php echo $counter; ?>">
        <?php endif; ?>

    	<?php if ( $counter == 3 || $counter == 7 || $counter == 11 || $counter == 15): ?>
        	<li class="columns large-12 features item-count-<?php echo $counter; ?>">
        <?php endif; ?>

        <?php if ( 
        $counter == 4 || 
        $counter == 5 || 
        $counter == 6 || 
        $counter == 8 || 
        $counter == 9 || 
        $counter == 10 ||
        $counter == 12 ||
        $counter == 13 || 
        $counter == 14

        ): ?>
            <li class="columns large-4 features item-count-<?php echo $counter; ?>">
    
            <?php endif; ?>
             
            <?php
                // Grab our image URL, but for 'large' image preset not full
                $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                $post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
                $post_thumbnail_url = $post_thumbnail_src[0];
            ?>
    

                <a href="<?php the_permalink(); ?>" style="background-image:url(<?php echo $post_thumbnail_url; ?>);">
                <span><h3><p><?php echo get_field('client_name'); ?></p><?php the_title(); ?><br /> <small><?php echo strtoupper(get_field('video_type')); ?></small></h3></span>                    

                </a>

        </li>
    <?php $counter++; endforeach; ?>

    </ul>

    <?php wp_reset_postdata();?>

<?php endif; ?>

</section>

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




<?php get_footer();

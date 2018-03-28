<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


$header_logo = '


<svg id="logo" width="120px" height="37px" viewBox="5382 3959 300 134" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(5382.000000, 3959.000000)">
        <polygon id="Shape" fill="#000000" points="269.542834 40.1565074 293.760297 24.3410214 261.635091 87.2940692 240.630148 85.5642504"></polygon>
        <polygon id="Shape" fill="#000000" points="300 20.2635914 291.783361 87.6029654 265.959638 87.6647446"></polygon>
        <polygon id="Shape" fill="#000000" points="263.920923 42.1334432 235.070016 25.4530478 229.200988 39.8476112 235.749588 85.3789127"></polygon>
        <polygon id="Shape" fill="#000000" points="226.297364 37.1293245 239.518122 3.21252059 224.011532 16.6186161"></polygon>
        <polygon id="Shape" fill="#000000" points="208.813839 98.5378913 230.992586 85.3789127 217.64827 4.38632619 210.172982 0"></polygon>
        <polygon id="Shape" fill="#000000" points="57.8253707 133.443163 74.2586491 133.443163 81.3014827 124.670511 79.7570016 113.612026 52.3270181 124.794069"></polygon>
        <polygon id="Shape" fill="#000000" points="79.0156507 133.443163 85.0082372 125.597199 87.23229 133.443163"></polygon>
        <polygon id="Shape" fill="#000000" points="174.093904 133.443163 190.527183 133.443163 197.570016 124.670511 196.025535 113.612026 168.595552 124.794069"></polygon>
        <polygon id="Shape" fill="#000000" points="195.284185 133.443163 202.697694 123.805601 205.41598 133.443163"></polygon>
        <polygon id="Shape" fill="#000000" points="204.242175 98.8467875 195.345964 110.152389 174.526359 117.504119 160.070016 90.8772652 188.550247 8.15485997 206.21911 8.15485997"></polygon>
        <polygon id="Shape" fill="#000000" points="181.260297 13.529654 65.9802306 13.529654 96.0667216 98.9085667 124.238056 105.333608 152.100494 98.3525535"></polygon>
        <polygon id="Shape" fill="#000000" points="57.0840198 118.18369 78.7067545 110.461285 89.8270181 97.8583196 59.4934102 8.15485997 12.9736409 48.6202636"></polygon>
        <polygon id="Shape" fill="#000000" points="21.931631 69.130972 10.4406919 51.276771 0 68.883855"></polygon>
    </g>
</svg>
	<svg id="logo-text" width="300px" height="30px" viewBox="162 231 347 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs></defs>
    <g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(162.000000, 231.000000)" font-size="32">
        <text id="BLACK-RHINO" font-family="Whitney" font-weight="bold" fill="#212121">
            <tspan x="0" y="30">BLACK RHINO</tspan>
        </text>
        <text id="CREATIVE" font-family="Whitney" font-weight="normal" fill="#212121">
            <tspan x="205" y="30">CREATIVE</tspan>
        </text>
    </g>
</svg>
';

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/manifest.json">
		<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#ffffff">
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header" role="banner">
	
		<div class="title-bar" data-responsive-toggle="site-navigation">
			<button class="menu-icon" type="button" id="hamburger"></button>
			<div class="title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $header_logo; ?></a>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
			<div class="top-bar-left">
				<ul class="menu">
					<li class="home">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php echo $header_logo; ?>
					</a>
					</li>
				</ul>
			</div>

			<div class="top-bar-right" id="menu-mobile">
				<?php foundationpress_top_bar_r(); ?>
				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
	</header>

	<script>

		var hamburger = document.getElementById("hamburger");
		var mobileMenu = document.getElementById("menu-mobile");

		hamburger.addEventListener("click", function() {
			  
			  if ($(mobileMenu).css('display') == 'block') {
			  	$(mobileMenu).velocity("slideUp", { delay: 250, duration: 250 });
			  } 
			  if ($(mobileMenu).css('display') == 'none') {
			  	$(mobileMenu).velocity("slideDown", { delay: 250, duration: 250 });
			  }


			});



	</script>


	<section class="container">
		<?php do_action( 'foundationpress_after_header' );

<?php
/**
 * The template for displaying albums custom post type
 * 
 * Template Name: Albums Layout
 * Template Post Type: apphoto_album
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package apPhotography
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-album-page-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			
		endwhile; // End of the loop.
		?>
		<!-- go to shop button-->
		<a href="<?php echo get_permalink( get_page_by_path( 'shop-2' ) ); ?>" class="albumToShopBtn">
		Shop  &#8594; </a>
		<!-- below goes to woocommmerce shop  -->
		<!-- <a href="<?php //echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="albumToShopBtn">Shop  &#8594; </a> -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();

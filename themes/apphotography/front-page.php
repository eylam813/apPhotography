<?php
/**
 * The template for displaying the front-page
 *
 * This page shows the feature image as the full background and has the text on top of the image.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apPhotography
 */

get_header(); 

	?>
	<div class="ap-content-area page front-page">
        <div class="bg-holder" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
            <main>
            <?php 
                if ( have_posts() ) : 
                    while ( have_posts() ) : the_post();
                        ?> <h1> <?php the_title(); ?> </h1> <?php
                        // the_title( '&lt;h1>', '&lt;/h1>' );
                        the_content();
                    endwhile;
                    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endif; 
                wp_reset_query()
            ?>

            
            </main><!-- #main -->
        </div>
        <?php get_footer(); ?>
	</div><!-- #primary -->
	</div>
<?php


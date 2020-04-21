<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apPhotography
 */

?>


</div><!-- #page -->
	<footer id="colophon" class="site-footer">
		
		<?php
			// loading the menu
			if ( has_nav_menu( 'menu-2' ) ) {
				$args = array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
					'container'		 => 'ul',
					'container_class' => 'menu',
				);
				wp_nav_menu($args);
			}
						?>
				<div class="site-info">
			Alex Pino &copy;<script>
                document.write(new Date().getFullYear());
            </script>

		</div>
		<!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</div><!-- #ap-content -->
</section><!-- #ap-content-wrapper -->

</body>
</html>

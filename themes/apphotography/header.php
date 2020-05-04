<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apPhotography
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body class="grid-x" <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- <div id="menu-hamburger">Menu</div> -->

<div id="ap-wrapper" class="grid-x cell">
	<div id="ap-wrapper-inner">
	<!-- <div id="ap-wrapper-inner" class="large-2 medium-2 small-12"> -->


	<header>
	
		<!-- responsive header nav -->
		<div class="title-bar" data-responsive-toggle="site-navigation" data-hide-for="medium">
					
					<!-- container for the logo - mobile/tablet only -->
					<div class="title-bar-title">
						<?php
						// if there's no custom logo load the title text
						if (!has_custom_logo()) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php
						else :
							// else if there is a custom logo load the logo
							the_custom_logo();
						endif;
						?>
					</div>
					
				</div>
				
				<!-- responsive header nav -->
				<div class="title-bar" data-responsive-toggle="site-navigation" data-hide-for="large">
					<!-- menu button -->
					<button class="menu-mobile" type="button" data-toggle="site-navigation"> menu</button>
					
				</div>
				
</nav>
		<div id="logo">
			<?php
			the_custom_logo();
			?>
		</div><!-- .logo -->
		<section>
				<nav id="site-navigation" class="main-navigation">
					<?php
					if ( has_nav_menu( 'menu-1' ) ) {
						$args = array(
							'menu' => 'Primary Menu', 
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							// 'menu_class'     => 'vertical menu'
							'container_id' => 'cssmenu', 
							'walker' => new AP_Walker_Nav_Menu()
						);
						wp_nav_menu($args);
					}
					?>
				</nav><!-- #site-navigation -->
			
			<!-- Social Media Links -->
			<?php if (get_theme_mod('apphotography_facebook_url') || get_theme_mod('apphotography_twitter_url')) { ?>
				<div class="social-media">
					<?php if (get_theme_mod('apphotography_facebook_url')) { ?>

						<!-- dynamic social media links -->
						<!-- dynamic facebook link -->
						<a href="<?php echo get_theme_mod('apphotography_facebook_url'); ?>"><?php echo esc_html__('', 'apphotography'); ?> <img src="<?php echo get_template_directory_uri() . '/assets/img/facebook.svg'; ?>" title="<?php echo esc_html__('', 'apphotography'); ?>" height="50" width="50"> </a>
						<?php } ?>
						<?php if (get_theme_mod('apphotography_twitter_url')) { ?>
						<!-- dynamic twitter link -->
						<a href="<?php echo get_theme_mod('apphotography_twitter_url'); ?>"><?php echo esc_html__('', 'apphotography'); ?> <img src="<?php echo get_template_directory_uri() . '/assets/img/twitter.svg'; ?>" title="<?php echo esc_html__('', 'apphotography'); ?>" height="50" width="50"> </a>
						<?php } ?>
						<?php if (get_theme_mod('apphotography_instagram_url')) { ?>
						<!-- dynamic instagram link -->
						<a href="<?php echo get_theme_mod('apphotography_instagram_url'); ?>"><?php echo esc_html__('', 'apphotography'); ?> <img src="<?php echo get_template_directory_uri() . '/assets/img/instagram.svg'; ?>" title="<?php echo esc_html__('', 'apphotography'); ?>" height="50" width="50"> </a>

					<?php } ?>
				</div> <!--social media-->
			<?php } ?>
			</section>
		<!-- </section> -->
	</header><!-- #masthead -->

	</div> <!--#ap-wrapper -->
</div> <!--#ap-wrapper-inner -->

<section id="ap-content-wrapper" class="cell">

	<div id="ap-content" class="grid-x">


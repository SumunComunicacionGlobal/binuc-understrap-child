<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if( is_active_sidebar( 'prefooter-home' ) && ( is_front_page() || is_singular( 'caso-de-exito' ) ) ) { ?>

	<div class="wrapper">
	
		<div class="container">
		
			<?php dynamic_sidebar( 'prefooter-home' ); ?>

		</div>

	</div>

<?php } ?>

<?php get_template_part( 'sidebar-templates/sidebar', 'prefooter' ); ?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper invert-dark-mode" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<nav id="legal-nav" class="p-0 navbar navbar-expand-md" aria-labelledby="legal-nav-label">

			<p id="legal-nav-label" class="screen-reader-text">
				<?php esc_html_e( 'Legal Navigation', 'understrap' ); ?>
			</p>

			<?php wp_nav_menu( array(
				'theme_location'		  => 'legal',
				'container_class' => 'navbar-light w-100',
				'container_id'    => 'navbarLegal',
				'menu_class'      => 'navbar-nav mx-auto flex-wrap w-100',
				'fallback_cb'     => '',
				'menu_id'         => 'legal-menu',
				'depth'           => 1,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			) ); ?>

		</nav>

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>


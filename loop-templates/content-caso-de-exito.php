<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$current_post = false;
$numero = '';
if ( isset( $args['current_post'] )) {
	$current_post = $args['current_post'];
} elseif( is_archive() ) {
	global $wp_query;
	$current_post = $wp_query->current_post;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$posts_per_page = get_query_var('posts_per_page');
	$current_post = $current_post + ($paged-1) * $posts_per_page;
}

if ( $current_post !== false ) {
	$numero = str_pad( $current_post + 1, 2, '0', STR_PAD_LEFT) . '.';
}

$post_type = get_post_type();
$pto = get_post_type_object( $post_type );
?>

<article <?php post_class( 'border-bottom alignfull stretch-linked-block' ); ?> id="post-<?php the_ID(); ?>">

	<div class="container">

		<div class="row">

			<div class="col-md-2 py-2">

				<?php echo '<p class="display-1">' . $numero . '</p>'; ?>

			</div>

			<?php if ( $current_post == 0 ) : ?>

				<div class="col-md-6 py-2 position-static">

					<header class="entry-header">

						<?php
						the_title(
							sprintf( '<h2 class="entry-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
							'</a></h2>'
						);
						?>

					</header><!-- .entry-header -->


						<div class="entry-content">

							<?php
							the_excerpt();
							understrap_link_pages();
							?>

						</div><!-- .entry-content -->

					<footer class="entry-footer">

						<?php understrap_entry_footer(); ?>

					</footer><!-- .entry-footer -->

				</div>

				<div class="col-md-4">

					<div class="wp-post-image-wrapper">

						<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'h-100' ) ); ?>

					</div>

				</div>
			
			<?php else: ?>

				<div class="col-md-6 col-xl-7 py-1 position-static">

					<header class="entry-header">

						<?php
						the_title(
							sprintf( '<h2 class="entry-title"><a class="stretched-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
							'</a></h2>'
						);
						?>

					</header><!-- .entry-header -->

					<footer class="entry-footer">

						<?php understrap_entry_footer(); ?>

					</footer><!-- .entry-footer -->

				</div>

				<div class="col-md-4 col-xl-3 py-1 align-self-center">

						<a class="btn btn-outline-dark" href="<?php the_permalink(); ?>"><?php printf( __( 'Ver %s', 'understrap' ), $pto->labels->singular_name ); ?></a>

				</div>

			<?php endif; ?>

		</div>

	</div>

</article><!-- #post-## -->

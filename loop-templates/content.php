<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$h_tag = 'h2';

if ( isset($args['current_post']) ) {
	$current_post = $args['current_post'];
} else {
	global $wp_query;
	$current_post = $wp_query->current_post;
}

if ( isset($args['h_tag']) ) {
	$h_tag = $args['h_tag'];
}

$block_class = '';

if ( $current_post % 2 == 0 ) {
	$block_class = 'has-media-on-the-right';
}

?>

<article <?php post_class( 'hfeed-post stretch-linked-block' ); ?> id="post-<?php the_ID(); ?>">

	<div class="wp-block-media-text <?php echo $block_class; ?> is-stacked-on-mobile is-image-fill is-style-media-text-card">

		<div class="wp-block-media-text__content">

			<?php if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

			<header class="entry-header">

				<?php
				the_title(
					sprintf( '<%s class="h2 entry-title"><a class="stretched-link" href="%s" rel="bookmark">', $h_tag, esc_url( get_permalink() ) ),
					'</a></'.$h_tag.'>'
				);
				?>

			</header><!-- .entry-header -->


			<div class="entry-content">

				<?php
				the_excerpt();
				understrap_link_pages();
				?>

			</div>

			<footer class="entry-footer">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->


		</div>

		<figure class="wp-block-media-text__media" style="background-image:url(<?php echo get_the_post_thumbnail_url( null, 'medium_large' ) ; ?>);">

			<?php the_post_thumbnail( 'medium_large' ); ?>

		</figure>

	</div>

</article><!-- #post-## -->

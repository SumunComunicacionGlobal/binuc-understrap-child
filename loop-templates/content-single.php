<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $post;
$extracto = $post->post_excerpt;

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( $extracto ) : ?>

		<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-image-fill is-style-media-text-card">

			<div class="wp-block-media-text__content">

				<?php the_excerpt(); ?>

			</div>

			<figure class="wp-block-media-text__media" style="background-image:url(<?php echo get_the_post_thumbnail_url( null, 'medium_large' ) ; ?>);">

				<?php the_post_thumbnail( 'medium_large' ); ?>

			</figure>

		</div>

	<?php endif; ?>

	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->


</article><!-- #post-## -->

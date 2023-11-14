<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_type = 'caso-de-exito';

$args = array(
	'post_type'			=> $post_type,
	'posts_per_page'	=> 3
);

$q = new WP_Query($args);

if ( $q->have_posts() ) { ?>

	<div class="casos-de-exito">

		<?php while ( $q->have_posts() ) { $q->the_post();

			get_template_part( 'loop-templates/content', $post_type, array( 'current_post' => $q->current_post ) );

		} ?>

	</div>

<?php }

wp_reset_postdata();

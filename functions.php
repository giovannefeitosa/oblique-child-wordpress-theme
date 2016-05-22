<?php

if ( ! function_exists( 'oblique_child_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and categories.
 */
function oblique_child_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'oblique' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$cat = get_the_category_list( ' / ' );

	if ( !is_singular()) {
		echo '<span class="posted-on">' . $posted_on . '</span><span class="cat-link">' . $cat . '</span>';
	} elseif (!get_theme_mod('meta_singles')) {
		echo '<span class="posted-on">' . $posted_on . '</span>';
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'oblique' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links">' . __( '%1$s', 'oblique' ) . '</span>', $categories_list );
			}
		}		
	}
}
endif;



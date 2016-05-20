<?php
/**
 * The template for displaying search results pages.
 *
 * @package Oblique
 */

$header_last_date = null;

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'oblique' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			
            <div class="grid-layout">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        $current_post_date = get_post_time( 'Y-m-d' );

                        if($current_post_date !== $header_last_date) {
                            echo '</div>';
                            $header_last_date = $current_post_date;
                            get_template_part( 'contentheader', get_post_format() );
                            echo '<div class="grid-layout">';
                        }

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'content', 'search' );
                    ?>

                <?php endwhile; ?>
            </div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

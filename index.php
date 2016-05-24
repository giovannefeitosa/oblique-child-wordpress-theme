<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
$header_last_date = null;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
        <?php get_template_part('home-header'); ?>
        
		<?php if (have_posts()) : ?>

			<?php /* Start the Loop */ ?>
			<div id="ob-grid">
			    <div class="grid-layout">
                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                            $current_post_date = get_post_time('Y-m-d');

                            if ($current_post_date !== $header_last_date) {
                                echo '</div>';
                                $header_last_date = $current_post_date;
                                get_template_part('contentheader', get_post_format());
                                echo '<div class="grid-layout">';
                            }

                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('content', get_post_format());
                        ?>

                    <?php endwhile; ?>
                </div>
			</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part('content', 'none'); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

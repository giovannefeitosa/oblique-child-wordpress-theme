<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Oblique
 */

$header_last_date = null;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="svg-container svg-block page-header-svg">
				<?php oblique_svg_1(); ?>
			</div>
			<header class="page-header">			
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="svg-container svg-block page-header-svg">
				<?php echo oblique_svg_3(); ?>
			</div>				

			<div id="ob-grid">
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

                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        ?>

                    <?php endwhile; ?>
                </div>
			</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Capablity
 */

get_header(); ?>

	<div id="primary" class="content-area">
            <?php
            while ( have_posts() ) : the_post();
            ?>
            <div class="service-category-theme" style="background-color: <?php the_field('category_color') ?>">
                <div class="service-category-container">
                    <?php the_post_thumbnail('capability-service-category-icon');
                    ?>
                    <div class="service-category-title">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </div>
                </div>
            </div>
		<main id="main" class="site-main" role="main">

		<?php

			get_template_part( 'template-parts/content-service_categories', get_post_format() );

			
		endwhile; // End of the loop.
                get_sidebar();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

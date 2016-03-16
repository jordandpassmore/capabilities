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
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            ?>
            <div class="service-theme" style="background-color: <?php the_field('category_color') ?>">
                <div class="service-container" style="background:url(<?php echo $image[0];?>); background-size:cover; background-position: center;">
                    <div class="service-title">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </div>
                </div>
            </div>
		<main id="main" class="site-main" role="main">

		<?php

			get_template_part( 'template-parts/content-service', get_post_format() );

			
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

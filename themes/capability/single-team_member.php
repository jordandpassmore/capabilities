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
		<main id="main" class="site-main" role="main">
                    
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() ); ?>
                        <div class="team-member-details">
                                <h3>Team Member Details</h3>
                                <p><strong>Email Address: </strong><?php the_field('email_address'); ?></p>
                                <p><strong>Phone Number: </strong><?php the_field('phone_number'); ?></p>
                                <p><strong>Extension: </strong><?php the_field('extension'); ?></p>
                                <p><strong>Service Since: </strong><?php the_field('service_since'); ?></p>
                        </div>
                        <div class="social-media">
                                <h3>Social Media</h3>
                                <p><strong>Linked In: </strong><?php the_field('linkedin'); ?></p>
                                <p><strong>Twitter: </strong><?php the_field('twitter'); ?></p>
                                <p><strong>Instagram: </strong><?php the_field('instagram'); ?></p>
                        </div>
                <?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

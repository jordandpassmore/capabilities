<?php
/**
 * The template for displaying single team members.
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

			get_template_part( 'template-parts/content-team_members', get_post_format() );

		endwhile; // End of the loop.
                get_sidebar();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

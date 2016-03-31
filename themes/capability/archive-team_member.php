<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Capablity
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header team-member-index-page-heading">
                            <h1 class="page-title reverse-text">Meet Our Team</h1>
                                
			</header><!-- .page-header -->
                        <div class="team-member-select-box">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

                                    <div class="team-member-index-item">
                                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                        <?php if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('capability-team-member-index');
                                        } else {
                                            $placeholder_image = wp_get_attachment_image('1741', 'capability-team-member-index');
                                            echo $placeholder_image;
                                        } ?>
                                        <div class="team-member-overlay"></div>
                                        <?php the_title( '<h1 class="team-member-name">', '</h1>' ) ?></a>
                                    </div>

			<?php endwhile; ?>
                        </div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

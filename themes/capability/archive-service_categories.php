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
            <div class="service-page-theme">
                <div class="service-page-container">
                    <?php
                    $placeholder_image = wp_get_attachment_image('1785', 'capability-page-header-image');
                    echo $placeholder_image;
                    ?>
                    <!--img src="http://www.capabilitiesinc.biz/CMS/wp-content/uploads/2016/03/paints.jpg" alt="Main in front of paints" /-->
                    <div class="service-page-title">
                        <h1 class="entry-title">Our Services</h1>
                    </div>
                </div>
            </div>
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-service_categories', get_post_format() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

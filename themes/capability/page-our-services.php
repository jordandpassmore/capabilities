<?php
/**
 * The template for displaying the services page.
 *
 * @package Capablity
 */
get_header(); ?>

	<div id="primary" class="content-area">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="service-page-theme">
                <div class="service-page-container">
                    <?php the_post_thumbnail('capability-page-header-image');
                    ?>
                    <div class="service-page-title">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </div>
                </div>
            </div>
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <div class="entry-content">
                                    <?php
                                            the_content();

                                            wp_link_pages( array(
                                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'capability' ),
                                                    'after'  => '</div>',
                                            ) );
                                    ?>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                                    <?php
                                            edit_post_link(
                                                    sprintf(
                                                            /* translators: %s: Name of current post */
                                                            esc_html__( 'Edit %s', 'capability' ),
                                                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                                    ),
                                                    '<span class="edit-link">',
                                                    '</span>'
                                            );
                                    ?>
                            </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->
                    <?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
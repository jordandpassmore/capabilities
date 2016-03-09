<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Capablity
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
            <div class="service-description">
                <h2>Description of Service</h2>
                <?php
			the_content();			
		?>
            </div>
            <div class="service-look-like">
                <h2>What does the Service Look Like?</h2>
                <?php the_field("service_look_like") ?>
            </div>
            <div class="service-benefits">
                <h2>Benefits</h2>
                <?php the_field("service_benefits") ?>
            </div>
		
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

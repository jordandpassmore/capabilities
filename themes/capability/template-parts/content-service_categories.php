<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Capablity
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header axt">
		<?php
			if ( is_single() ) {
				
			} else {
				
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php capability_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
            <?php
            if ( is_single() ) {
                the_content( sprintf(
                        /* translators: %s: Name of current post. */
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'capability' ), array( 'span' => array( 'class' => array() ) ) ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            } else {
            ?>
            <div class="service-category-listing">
                <div class="service-category-icon">
                    <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
                    <?php the_post_thumbnail('capability-small-icon'); ?></a>
                </div>
                <div class="service-category-excerpt">
                    <?php the_excerpt() ?>
                    <a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">See all <?php the_title() ?></a>
                </div>
            </div>
            <?php } ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php capability_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php
/**
 * Template part for displaying a Team Member
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Capablity
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header axt">
		<?php
			if ( is_single() ) { ?>
                            <div class="team-member-page-heading">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('capability-team-member-single');
                            } else {
                                $placeholder_image = wp_get_attachment_image('1741', 'full');
                                echo $placeholder_image;
                            }
                            the_title( '<h1 class="team-member-name">', '</h1>' ) ?>
                            </div>
                            <?php
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php capability_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
            <div class="team-member-contact">
                <ul class="contact-list">
                    <li><i class="fa fa-calendar"></i>Service since <?php the_field('service_since') ?></li>
                    <li><a href="mailto: <?php the_field('email_address') ?>"><i class="fa fa-envelope"></i>Send a message</a></li>
                    <li><i class="fa fa-phone"></i><?php the_field('phone_number') ?> Ext: <?php the_field('extension') ?></li>
                </ul>
                <ul class="social-list">
                    <?php if (get_field('linkedin')) { ?><li><a href="<?php the_field('linkedin') ?>"><i class="fa fa-icon-large fa-linkedin"></i></a></li><?php } ?>
                    <?php if (get_field('twitter'))  { ?><li><a href="<?php the_field('twitter') ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
                    <?php if (get_field('instagram')) { ?><li><a href="<?php the_field('instagram') ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                </ul>
                
            </div>
            <?php
            $is_manager = get_field(type_of_team_member);
            if ($is_manager == "Manager") {?>
            <div class="manager-section">
                <h4>What I look for in a team:</h4>
                <p><?php the_field(i_look_for); ?></p>
                <h4>If you are interviewing with me, you should know:</h4>
                <p><?php the_field(if_interviewing); ?></p>
            </div>
            <?php } ?>
            <div class="q-and-a">
                <?php 
                $all_fields = get_field_objects();
                foreach ($all_fields as $afield) {
                    $two_letters = substr($afield['name'], 0, 2);
                    if ($two_letters == "tq" && $afield['value']) { ?>
                    <h4><?php echo $afield['label'] ?></h4>
                    <p><?php echo $afield['value'] ?></p>
                    <?php }
                }
                ?>
            </div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php capability_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php
/**
 * Single Post Template
 *
 * @package Marpogi_Rapper
 */

get_header();
?>

<section class="section" style="padding-top: 120px;">
    <div class="section-container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="section-header">
                <span class="section-label"><?php echo get_the_date(); ?></span>
                <h2 class="section-title"><?php the_title(); ?></h2>
                <div class="section-line"></div>
            </div>

            <div class="entry-content" style="max-width: 800px; margin: 0 auto;">
                <?php the_content(); ?>
            </div>

            <div style="max-width: 800px; margin: 3rem auto 0; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.05);">
                <?php
                the_post_navigation( array(
                    'prev_text' => '<span style="color: var(--accent); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px;">Previous</span><br>%title',
                    'next_text' => '<span style="color: var(--accent); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px;">Next</span><br>%title',
                ) );
                ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>

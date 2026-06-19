<?php
/**
 * Index Template (Blog / Posts)
 *
 * @package Marpogi_Rapper
 */

get_header();
?>

<section class="section" style="padding-top: 120px;">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label">Latest</span>
            <h2 class="section-title">Blog</h2>
            <div class="section-line"></div>
        </div>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="post-card fade-in" style="background: var(--bg-card); padding: 2rem; margin-bottom: 2rem; border: 1px solid rgba(255,255,255,0.05);">
                    <h3 style="margin-bottom: 0.5rem;">
                        <a href="<?php the_permalink(); ?>" style="color: var(--text-primary);"><?php the_title(); ?></a>
                    </h3>
                    <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 1rem;">
                        <?php echo get_the_date(); ?>
                    </p>
                    <div style="color: var(--text-secondary);">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <div style="text-align: center; margin-top: 2rem;">
                <?php the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '&laquo; Prev',
                    'next_text' => 'Next &raquo;',
                ) ); ?>
            </div>
        <?php else : ?>
            <p style="text-align: center; color: var(--text-muted);">No posts yet. Stay tuned.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

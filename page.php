<?php
/**
 * Page Template
 *
 * @package Marpogi_Rapper
 */

get_header();
?>

<section class="section" style="padding-top: 120px;">
    <div class="section-container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="section-header">
                <h2 class="section-title"><?php the_title(); ?></h2>
                <div class="section-line"></div>
            </div>

            <div class="entry-content" style="max-width: 800px; margin: 0 auto;">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>

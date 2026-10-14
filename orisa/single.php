<?php
defined('ABSPATH') || exit;
// Запись: тело — классический редактор, обложка — миниатюра. Разметка — этап 5 (blog-details).
get_header();
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
        <div class="container pt-150 pb-100">
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
endif;
get_footer();

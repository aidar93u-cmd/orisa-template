<?php
defined('ABSPATH') || exit;
// Правый блок архива 1:1 (archive-2.html:813-893): «Свежее» + 5 мини-карточек.
$orisa_flash = new WP_Query([
    'posts_per_page'      => 5,
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
]);
?>
<div class="col-lg-4 ps-lg-5">
    <div class="sidebar_right">
        <span class="neutral-500 fw-600 fz-font-md text-uppercase">Свежее</span>
        <?php if ($orisa_flash->have_posts()) : ?>
        <div class="blog-card-3-wrap">
            <!-- beautify ignore:start -->
            <?php while ($orisa_flash->have_posts()) : $orisa_flash->the_post(); ?>
            <article class="blog-card-3">
                <div class="blog-card-3__thumb hover-effect-1">
                    <a href="<?php the_permalink(); ?>" class="blog-card-3__img-link">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail', ['class' => 'blog-card-3__img', 'alt' => get_the_title()]); ?>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="blog-card-3__content">
                    <h6 class="blog-card-3__title">
                        <a href="<?php the_permalink(); ?>" class="blog-card-3__title-link"><?php the_title(); ?></a>
                    </h6>
                    <ul class="blog-card-3__meta ps-3">
                        <li class="blog-card-3__meta-date"> <?php echo esc_html(get_the_date()); ?></li>
                    </ul>
                </div>
            </article>
            <?php endwhile; ?>
            <!-- beautify ignore:end -->
        </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>

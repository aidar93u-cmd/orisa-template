<?php
defined('ABSPATH') || exit;
// Карточка записи .blog-card 1:1 (archive-2.html:601+, blog-details.html:713+).
$cats = get_the_category();
$cat_slug = !empty($cats) ? $cats[0]->slug : '';
?>
<div class="blog-card col-lg-6 col-md-6 col-12 mb-30" data-category="<?php echo esc_attr($cat_slug); ?>">
    <div class="blog-card__thumb hover-effect-1">
        <a href="<?php the_permalink(); ?>" class="blog-card__img-link">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', ['class' => 'blog-card__img22']); ?>
            <?php endif; ?>
        </a>
    </div>
    <div class="blog-card__content">
        <h2 class=" h6 blog-card__title">
            <a href="<?php the_permalink(); ?>" class="blog-card__title-link"><?php the_title(); ?></a>
        </h2>
        <p class="blog-card__meta">
            <span class="blog-card__meta-text"><?php esc_html_e('Автор: ', 'orisa'); ?></span>
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="blog-card__author"><?php the_author(); ?></a>
            <span class="blog-card__meta-text"> – <?php echo esc_html(get_the_date()); ?></span>
        </p>
    </div>
</div>

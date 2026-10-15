<?php
defined('ABSPATH') || exit;
// Архивы таксономий/дат: та же разметка, что home.php (archive-2.html).
get_header();
$cats = get_categories(['hide_empty' => true]);
?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-xxl-8 col-xl-7 col-12">
            <h1 class="fz-ds-1 lh-1 fw-500 mb-lg-0 mb-4"><?php the_archive_title(); ?></h1>
        </div>
        <div class="col-xxl-4 col-xl-5 col-12 ms-auto text-lg-end">
            <?php if (!empty($cats) && !is_wp_error($cats)) : ?>
                <div class="filter-portfolio d-flex flex-wrap align-items-center justify-content-lg-end gap-2">
                    <?php foreach ($cats as $cat) : ?>
                        <a href="<?php echo esc_url(get_category_link($cat)); ?>" class="at-btn filter-btn btn-sm" data-filter="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row pt-80">
        <div class="col-lg-8 pb-lg-0 pb-80">
            <div class="row">
                <!-- beautify ignore:start -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/blog-card'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- beautify ignore:end -->
            </div>
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</div>
<?php get_template_part('template-parts/blog-newsletter'); ?>
<?php
get_footer();

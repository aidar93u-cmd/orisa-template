<?php
defined('ABSPATH') || exit;
get_header();
?>
<div class="container pt-150 pb-100">
    <h1>
        <?php
        printf(
            /* translators: %s: search query. */
            esc_html__('Результаты поиска: %s', 'orisa'),
            '<span>' . esc_html(get_search_query()) . '</span>'
        );
        ?>
    </h1>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e('Ничего не найдено.', 'orisa'); ?></p>
    <?php endif; ?>
</div>
<?php
get_footer();

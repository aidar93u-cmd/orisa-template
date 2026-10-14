<?php
defined('ABSPATH') || exit;
// Архив записей: разметка списка — этап 5 (archive-2). Каркас с нативным циклом.
get_header();
?>
<div class="container pt-150 pb-100">
    <h1><?php echo orisa_text(function_exists('get_field') ? (string) get_field('blog_archive_title', 'option') : ''); ?></h1>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php endif; ?>
</div>
<?php
get_footer();

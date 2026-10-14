<?php
defined('ABSPATH') || exit;
// Архивы таксономий/дат: разметка — этап 5. Каркас с нативным циклом.
get_header();
?>
<div class="container pt-150 pb-100">
    <h1><?php the_archive_title(); ?></h1>
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

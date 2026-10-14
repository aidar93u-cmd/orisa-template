<?php
defined('ABSPATH') || exit;
orisa_flag_script('matter'); // декор matter/throwable как в оригинале 404.html
get_header();
?>
<div class="container pt-150">
    <h1><?php echo orisa_text(function_exists('get_field') ? (string) get_field('not_found_title', 'option') : ''); ?></h1>
    <?php $t404 = function_exists('get_field') ? (string) get_field('not_found_text', 'option') : ''; ?>
    <?php if ($t404 !== '') : ?><p><?php echo esc_html($t404); ?></p><?php endif; ?>
    <p><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('На главную', 'orisa'); ?></a></p>
</div>
<?php
get_footer();

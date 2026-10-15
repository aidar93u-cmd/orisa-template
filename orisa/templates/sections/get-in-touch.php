<?php
defined('ABSPATH') || exit;

/**
 * Связаться: контакты + форма (база: about-2.html 1131-1299: .sec-4-about).
 * Контакты и соцсети — из настроек сайта, форма — шорткод CF7.
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$side_text = get_sub_field('side_text');
$form_shortcode = get_sub_field('form_shortcode');
$opt_phone = function_exists('get_field') ? (string) get_field('phone', 'option') : '';
$opt_phone_href = function_exists('get_field') ? (string) get_field('phone_href', 'option') : '';
$opt_address = function_exists('get_field') ? (string) get_field('address', 'option') : '';
$opt_emails = function_exists('get_field') ? get_field('emails', 'option') : '';
$opt_email = '';
if (is_array($opt_emails)) {
    foreach ($opt_emails as $orisa_em) {
        if (is_array($orisa_em) && !empty($orisa_em['email'])) {
            $opt_email = (string) $orisa_em['email'];
            break;
        }
    }
}
$orisa_git_soc = [
    ['soc_whatsapp', 'WhatsApp', 'whatsapp'],
    ['soc_telegram', 'Telegram', 'telegram'],
    ['soc_max', 'MAX', 'max'],
    ['soc_vk', 'ВКонтакте', 'vk'],
];
?>
<div class="sec-4-about bg-neutral-0 pt-120 pb-120"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row g-4 align-items-end mb-50">
            <div class="col-lg-6">
                <?php if ($badge !== '' && $badge !== null) : ?>
                    <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                        <span class="text-uppercase">
                            <span class="text-1"><?php echo esc_html($badge); ?></span>
                            <span class="text-2"><?php echo esc_html($badge); ?></span>
                        </span>
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                        </i>
                    </span>
                <?php endif; ?>
                <?php if ($title !== '' && $title !== null) : ?>
                    <h2 class="h1 alt-section-title fz-ds-1 lh-1 fw-500 mb-30 reveal-text mb-0"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
            <?php if ($side_text !== '' && $side_text !== null) : ?>
                <div class="col-xxl-4 col-lg-6 col-md-8 ms-lg-auto text-lg-end">
                    <p class="fz-font-lg pt-lg-4 mb-0"><?php echo nl2br(esc_html($side_text)); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xxl-4 col-lg-5">
                <div class="row g-4">
                    <div class="col-lg-12 col-md-6">
                        <div class="d-flex gap-4">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                    <path d="M20 40V20H0L20 0L40 20V40H20Z" fill="currentColor" />
                                    <path d="M0 20L20 40H0V20Z" fill="currentColor" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="h6 fw-600">Контакты</h3>
                                <div class="d-flex flex-wrap gap-md-5 gap-4">
                                    <span class="fz-font-md neutral-500">
                                        <?php if ($opt_address !== '') : ?>
                                            <?php echo nl2br(esc_html($opt_address)); ?>
                                            <br class="d-block">
                                        <?php endif; ?>
                                        <?php if ($opt_phone !== '') : ?>
                                            Телефон: <span class="neutral-900"><a href="<?php echo esc_attr($opt_phone_href !== '' ? $opt_phone_href : 'tel:' . preg_replace('/[^+\d]/', '', $opt_phone)); ?>"><?php echo esc_html($opt_phone); ?></a></span>
                                            <br class="d-block">
                                        <?php endif; ?>
                                        <?php if ($opt_email !== '') : ?>
                                            Почта: <span class="neutral-900"><a href="<?php echo esc_attr('mailto:' . $opt_email); ?>"><?php echo esc_html($opt_email); ?></a></span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-6 col-lg-8 mx-auto">
                        <ul class="at-social-list list-unstyled d-flex flex-wrap gap-md-4 gap-3 pt-50">
                            <?php foreach ($orisa_git_soc as $orisa_s) : ?>
                                <?php $orisa_url = function_exists('get_field') ? (string) get_field($orisa_s[0], 'option') : ''; ?>
                                <?php if ($orisa_url !== '') : ?>
                                    <li>
                                        <a href="<?php echo esc_url($orisa_url); ?>" target="_blank" rel="noopener" class="at-social__link d-flex align-items-center gap-2" aria-label="<?php echo esc_attr($orisa_s[1]); ?>">
                                            <?php echo orisa_soc_icon($orisa_s[2]); ?>
                                            <span class="fw-500"><?php echo esc_html($orisa_s[1]); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4"></div>
                </div>
            </div>
            <?php if ($form_shortcode !== '' && $form_shortcode !== null) : ?>
                <div class="col-xxl-8 col-lg-7 ms-auto pt-lg-0 pt-30">
                    <?php echo do_shortcode($form_shortcode); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

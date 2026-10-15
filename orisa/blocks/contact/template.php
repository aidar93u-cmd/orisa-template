<?php
defined('ABSPATH') || exit;

/**
 * Контакты (база: contact-2.html, .sec-1-contact; page-hero и moving-gallery
 * сюда не входят — это отдельные блоки page-hero и logo-marquee):
 * 1. Разметка 1:1 с оригиналом: классы-обёртки, вложенность — дословно.
 * 2. Пустые поля не выводят свои теги (if вокруг каждого).
 * 3. Телефон/почта/адрес: пустое поле офиса — из настроек «Контакты» (Options);
 *    без строк офисов — одна карточка целиком из Options. Соцсети — ссылки
 *    из Options. Форма — do_shortcode() поля «Форма CF7» внутри оригинальной
 *    обёртки .sec-4-about-form (div, не form: CF7 выводит собственный <form>).
 * 4. Весь вывод экранирован: esc_html для текста, esc_url/esc_attr для ссылок,
 *    картинки — через orisa_img(ID).
 */
$badge          = get_sub_field('badge');
$title          = get_sub_field('title');
$note           = get_sub_field('note');
$offices        = get_sub_field('offices');
$avatars        = get_sub_field('avatars');
$form_title     = get_sub_field('form_title');
$form_shortcode = get_sub_field('form_shortcode');
$socials_title  = get_sub_field('socials_title');

$opt_phone      = function_exists('get_field') ? (string) get_field('phone', 'option') : '';
$opt_phone_href = function_exists('get_field') ? (string) get_field('phone_href', 'option') : '';
$opt_address    = function_exists('get_field') ? (string) get_field('address', 'option') : '';
$opt_email      = '';
if (function_exists('get_field')) {
    $opt_emails = get_field('emails', 'option');
    if (is_array($opt_emails)) {
        foreach ($opt_emails as $opt_row) {
            if (is_array($opt_row) && !empty($opt_row['email'])) {
                $opt_email = (string) $opt_row['email'];
                break;
            }
        }
    }
}
if (!is_array($offices) || !$offices) {
    $offices = [['title' => '', 'address' => '', 'phone' => '', 'email' => '']];
}

$orisa_socials = [];
if (function_exists('get_field')) {
    foreach ([
        ['key' => 'soc_whatsapp', 'name' => 'WhatsApp'],
        ['key' => 'soc_telegram', 'name' => 'Telegram'],
        ['key' => 'soc_max', 'name' => 'MAX'],
        ['key' => 'soc_2gis', 'name' => '2ГИС'],
        ['key' => 'soc_yandex', 'name' => 'Яндекс Карты'],
    ] as $orisa_soc) {
        $orisa_soc_url = (string) get_field($orisa_soc['key'], 'option');
        if ($orisa_soc_url === '') {
            continue;
        }
        $orisa_socials[] = ['name' => $orisa_soc['name'], 'url' => $orisa_soc_url];
    }
}
// ponytail: VK из Options не выводим — в настройках помечен «только подвал».
?>
<div class="sec-1-contact overflow-hidden pt-120"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xxl-6 col-lg-7">
                <div class="at-about-title-wrap mb-30">
                    <?php if ($badge !== '') : ?>
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
                    <?php if ($title !== '') : ?>
                        <h2 class="at-section-title reveal-text mb-lg-0 mb-4"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                    <div class="at-about-content d-flex flex-md-row flex-column justify-content-between gap-4 pt-40">
                        <?php $orisa_office_i = 0; ?>
                        <?php foreach ($offices as $orisa_office) : ?>
                            <?php
                            if (!is_array($orisa_office)) {
                                continue;
                            }
                            $orisa_office_title = isset($orisa_office['title']) ? (string) $orisa_office['title'] : '';
                            $orisa_row_address  = isset($orisa_office['address']) ? (string) $orisa_office['address'] : '';
                            $orisa_row_phone    = isset($orisa_office['phone']) ? (string) $orisa_office['phone'] : '';
                            $orisa_row_email    = isset($orisa_office['email']) ? (string) $orisa_office['email'] : '';
                            $orisa_office_address = $orisa_row_address !== '' ? $orisa_row_address : $opt_address;
                            $orisa_office_email   = $orisa_row_email !== '' ? $orisa_row_email : $opt_email;
                            if ($orisa_row_phone !== '') {
                                $orisa_office_phone      = $orisa_row_phone;
                                $orisa_office_phone_href = 'tel:' . preg_replace('/[^+0-9]/', '', $orisa_row_phone);
                            } else {
                                $orisa_office_phone      = $opt_phone;
                                $orisa_office_phone_href = $opt_phone_href !== '' ? $opt_phone_href : 'tel:' . preg_replace('/[^+0-9]/', '', $opt_phone);
                            }
                            if ($orisa_office_title === '' && $orisa_office_address === '' && $orisa_office_phone === '' && $orisa_office_email === '') {
                                continue;
                            }
                            $orisa_office_i++;
                            ?>
                            <div class="d-flex gap-4 w-lg-50">
                                <div class="icon">
                                    <?php if ($orisa_office_i % 2 === 0) : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <path d="M20 20V10L30 0H40V10L30 20H20Z" fill="currentColor" />
                                            <path d="M20 30V20H10L20 10L10 0H0V20H10L0 30V40H10L20 30Z" fill="currentColor" />
                                            <path d="M20 30L30 40H40V20H30L20 30Z" fill="currentColor" />
                                        </svg>
                                    <?php else : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <path d="M20 40V20H0L20 0L40 20V40H20Z" fill="currentColor" />
                                            <path d="M0 20L20 40H0V20Z" fill="currentColor" />
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <?php if ($orisa_office_title !== '') : ?>
                                        <h3 class="h6 fw-600"><?php echo esc_html($orisa_office_title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($orisa_office_address !== '' || $orisa_office_phone !== '' || $orisa_office_email !== '') : ?>
                                        <span class="fz-font-md neutral-500">
                                            <?php if ($orisa_office_address !== '') : ?>
                                                <?php echo implode('<br class="d-block">' . "\n", array_map('esc_html', preg_split('/\r\n|\r|\n/', $orisa_office_address))); ?>
                                            <?php endif; ?>
                                            <?php if ($orisa_office_phone !== '') : ?>
                                                <?php if ($orisa_office_address !== '') : ?><br class="d-block"><?php endif; ?>
                                                Phone: <span class="neutral-900"><a href="<?php echo esc_attr($orisa_office_phone_href); ?>"><?php echo esc_html($orisa_office_phone); ?></a></span>
                                            <?php endif; ?>
                                            <?php if ($orisa_office_email !== '') : ?>
                                                <?php if ($orisa_office_address !== '' || $orisa_office_phone !== '') : ?><br class="d-block"><?php endif; ?>
                                                Email: <span class="neutral-900"><a href="<?php echo esc_url('mailto:' . $orisa_office_email); ?>"><?php echo esc_html($orisa_office_email); ?></a></span>
                                            <?php endif; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php if ($note !== '' || (is_array($avatars) && $avatars)) : ?>
                <div class="col-xxl-4 col-lg-5 col-md-8 ms-xxl-auto position-relative">
                    <div class="scroll-rotate d-md-inline-block d-none">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M53.5715 0H46.4286V41.3778L17.17 12.1193L12.1193 17.17L41.3778 46.4286H0V53.5715H41.3778L12.1193 82.83L17.17 87.8805L46.4286 58.622V100H53.5715V58.622L82.83 87.8805L87.8805 82.83L58.622 53.5715H100V46.4286H58.622L87.8805 17.17L82.83 12.1193L53.5715 41.3778V0Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                    <?php if (is_array($avatars) && $avatars) : ?>
                        <div class="sec-2-home-5__avatars-row d-flex gap-2 py-3">
                            <?php $orisa_av_i = 0; ?>
                            <?php foreach ($avatars as $orisa_av) : ?>
                                <?php
                                $orisa_av_id  = (is_array($orisa_av) && isset($orisa_av['image'])) ? (int) $orisa_av['image'] : 0;
                                $orisa_av_img = orisa_img($orisa_av_id, 'full', ['class' => 'img-cover', 'alt' => 'orisa']);
                                if ($orisa_av_img === '') {
                                    continue;
                                }
                                $orisa_av_i++;
                                ?>
                                <div class="sec-2-home-5__avatar-sm at-offcanvas-gallery-img<?php echo $orisa_av_i > 4 ? ' d-none d-md-block' : ''; ?>">
                                    <?php echo $orisa_av_img; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($note !== '') : ?>
                        <h4 class="h6 mb-4 fz-font-lg"><?php echo nl2br(esc_html($note)); ?></h4>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($form_shortcode !== '' || $orisa_socials) : ?>
            <div class="row g-5 pt-120 align-items-end">
                <?php if ($form_shortcode !== '') : ?>
                    <div class="col-xxl-6 col-lg-7">
                        <?php if ($form_title !== '') : ?>
                            <h4><?php echo esc_html($form_title); ?></h4>
                        <?php endif; ?>
                        <div class="sec-4-about-form">
                            <?php echo do_shortcode($form_shortcode); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($orisa_socials) : ?>
                    <div class="col-xxl-4 col-lg-5 ms-auto pb-40">
                        <?php if ($socials_title !== '') : ?>
                            <h5 class="h6 fw-600 mb-3"><?php echo esc_html($socials_title); ?></h5>
                        <?php endif; ?>
                        <div class="alt-footer-social-item white-mode w-50">
                            <ul>
                                <?php foreach ($orisa_socials as $orisa_soc_item) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($orisa_soc_item['url']); ?>">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="icon-social">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                                    </svg>
                                                </div>
                                                <?php echo esc_html($orisa_soc_item['name']); ?>
                                            </div>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none">
                                                    <path d="M7.60201e-05 6.26559L0 2.03894e-05L1.49997 -4.58971e-07L1.50004 4.87322L9.12873 4.87329L6.16652 2.12355L7.22714 1.139L12 5.56948L7.22713 10L6.16652 9.01545L9.12876 6.26566L7.60201e-05 6.26559Z" fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

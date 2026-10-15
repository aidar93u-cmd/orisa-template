<?php
defined('ABSPATH') || exit;

/**
 * Финал FAQ (база: faqs.html 476-515: .sec-4-faqs).
 * Заголовок, текст, почта и телефон ссылками. Декор-SVG статичный.
 */
$title = get_sub_field('title');
$text = get_sub_field('text');
$email = get_sub_field('email');
$phone = get_sub_field('phone');
$phone_href = get_sub_field('phone_href');
if (!is_string($email)) {
    $email = '';
}
if (!is_string($phone)) {
    $phone = '';
}
if (!is_string($phone_href) || $phone_href === '') {
    $phone_href = $phone !== '' ? 'tel:' . preg_replace('/[^+\d]/', '', $phone) : '';
}
?>
<?php if (($title !== '' && $title !== null) || ($text !== '' && $text !== null) || $email !== '' || $phone !== '') : ?>
    <div class="sec-4-faqs pb-80 pt-80 bg-neutral-50 fix"<?php echo orisa_anchor(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="p-relative d-inline-block mb-40">
                        <div class="at-about-svg-wrap start-50 translate-middle d-none d-lg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="91" viewBox="0 0 57 91" fill="none">
                                <path opacity="0.1" d="M0 0L56.4024 33.572V90.336L0 56.46V0Z" fill="#515151" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="113" height="68" viewBox="0 0 113 68" fill="none">
                                <path opacity="0.3" d="M0 33.876L56.4024 0L112.805 33.876V34.1294L56.4024 68.0054L0 34.1294V33.876Z" fill="#515151" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="91" viewBox="0 0 57 91" fill="none">
                                <path opacity="0.2" d="M56.4009 0L8.7738e-05 33.5367V90.2413L56.4009 56.4008V0Z" fill="#515151" />
                            </svg>
                        </div>
                    </div>
                    <?php if ($title !== '' && $title !== null) : ?>
                        <h4><?php echo esc_html($title); ?></h4>
                    <?php endif; ?>
                    <?php if ($text !== '' && $text !== null) : ?>
                        <p class="fz-font-lg neutral-900"><?php echo nl2br(esc_html($text)); ?></p>
                    <?php endif; ?>
                    <?php if ($email !== '') : ?>
                        <h5 class="mt-40">
                            <a href="<?php echo esc_attr('mailto:' . $email); ?>"><?php echo esc_html($email); ?></a>
                        </h5>
                    <?php endif; ?>
                    <?php if ($phone !== '') : ?>
                        <h6>
                            <a href="<?php echo esc_attr($phone_href); ?>"><?php echo esc_html($phone); ?></a>
                        </h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

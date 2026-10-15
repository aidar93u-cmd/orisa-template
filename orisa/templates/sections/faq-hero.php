<?php
defined('ABSPATH') || exit;

/**
 * Шапка FAQ (база: faqs.html 2-45: .sec-1-faqs).
 * Поиск привязан к WP (home_url + name="s").
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$search_ph = get_sub_field('search_placeholder');
$search_btn = get_sub_field('search_button');
if ($search_ph === '' || $search_ph === null) {
    $search_ph = 'Ваш вопрос...';
}
if ($search_btn === '' || $search_btn === null) {
    $search_btn = 'Найти ответ';
}
?>
<div class="sec-1-faqs overflow-hidden pt-150 pb-120 bg-neutral-50"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row g-4 align-items-end">
            <div class="col-xxl-5 col-lg-6 pt-lg-0 pt-100">
                <?php if ($badge !== '' && $badge !== null) : ?>
                    <span class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0">
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
                    <h4 class="section-title d-flex fw-600"><?php echo esc_html($title); ?></h4>
                <?php endif; ?>
                <?php if ($subtitle !== '' && $subtitle !== null) : ?>
                    <p class="neutral-600 fz-font-xl"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-xxl-5 col-lg-6 ms-auto">
                <div class="input-subscribe p-relative changeless">
                    <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                        <input placeholder="<?php echo esc_attr($search_ph); ?>" type="text" name="s" class="bg-neutral-0">
                        <button type="submit" class="at-btn p-absolute end-0 top-50 bg-neutral-900 rounded-3 translate-middle-y me-4">
                            <i class="icon-arrow-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M8.33333 1L13 5.66667M13 5.66667L8.33333 10.3333M13 5.66667H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M8.33333 1L13 5.66667M13 5.66667L8.33333 10.3333M13 5.66667H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                            <span>
                                <span class="text-1"><?php echo esc_html($search_btn); ?></span>
                                <span class="text-2"><?php echo esc_html($search_btn); ?></span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

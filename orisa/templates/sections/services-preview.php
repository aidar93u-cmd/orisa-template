<?php
defined('ABSPATH') || exit;

/**
 * Услуги превью — Главная (index.html, строки 737-919:
 * div#services.at-service-area > .container > .row > col-12 subtitle-wrap
 * + col-xxl-4 service-content/sales-wrap (6 hover-image) + col-xxl-7
 * service-list-wrap (6 service-item + service-btn), div сбалансированы:
 * sales-wrap закрыт вместе с col-4, list-wrap вместе с col-7, row/container/
 * area закрыты подряд в конце).
 * Разметка 1:1: классы at-service-*, at-panel-pin*, image-container,
 * hover-image, service-item, anim-zoomin, at-btn text-1/text-2, odometer
 * с data-count — дословно (на них завязаны main.js и pin-анимация).
 * id="services" оригинала заменён orisa_anchor() (якорь из настроек блока).
 * Номера [01]-[06] — автосчётчик (как в faq/services-list). Пустые поля
 * гасят свои теги; обёртки pin-анимации сохраняются.
 */
$subtitle = (string) get_sub_field('subtitle');
$title = (string) get_sub_field('title');
$text = (string) get_sub_field('text');
$button = get_sub_field('button');
$button_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$button_label = is_array($button) && isset($button['title']) && $button['title'] !== '' ? $button['title'] : $button_url;
$button_target = is_array($button) && !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '" rel="noopener"' : '';

$orisa_services = [];
if (have_rows('services')) {
    while (have_rows('services')) {
        the_row();
        $orisa_img_id = (int) get_sub_field('image');
        $orisa_service_title = (string) get_sub_field('title');
        $orisa_link = get_sub_field('link');
        $orisa_url = is_array($orisa_link) && !empty($orisa_link['url']) ? $orisa_link['url'] : '';
        if ($orisa_img_id <= 0 && $orisa_service_title === '' && $orisa_url === '') {
            continue;
        }
        $orisa_services[] = [
            'image'  => $orisa_img_id,
            'title'  => $orisa_service_title,
            'url'    => $orisa_url,
            'target' => is_array($orisa_link) && !empty($orisa_link['target']) ? $orisa_link['target'] : '',
        ];
    }
}
?>
<?php if ($subtitle !== '' || $title !== '' || $text !== '' || $orisa_services || $button_url !== '') : ?>
    <div class="at-service-area at-panel-pin-area pt-120 pb-120"<?php echo orisa_anchor(); ?>>
        <div class="container">
            <div class="row">
                <?php if ($subtitle !== '' || $title !== '') : ?>
                    <div class="col-12">
                        <div class="at-service-subtitle-wrap at-about-border d-flex justify-content-between gap-3 mb-50">
                            <?php if ($subtitle !== '') : ?>
                                <span class="at-btn common-black text-uppercase bg-transparent mb-10 rounded-0 p-0">
                                    <span class="text-uppercase">
                                        <span class="text-1"><?php echo esc_html($subtitle); ?></span>
                                        <span class="text-2"><?php echo esc_html($subtitle); ?></span>
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
                                <span class="fs-font-md fw-500 text-decoration-underline"><?php echo esc_html($title); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-xxl-4 col-lg-4 col-xl-4 mb-40">
                    <div class="at-service-content mr-60 mt-20">
                        <div class="at-service-sales-wrap at-panel-pin fix p-relative">
                            <?php if ($orisa_services) : ?>
                                <div class="at-service-img-wrapper image-container">
                                    <?php foreach ($orisa_services as $orisa_service) : ?>
                                        <?php if ($orisa_service['image'] <= 0) {
                                            continue;
                                        } ?>
                                        <div class="hover-image">
                                            <?php echo orisa_img($orisa_service['image'], 'full', ['class' => 'thumb', 'loading' => 'lazy', 'alt' => $orisa_service['title']]); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <h4 class="h5 fw-600 mb-0 mt-10"><span class="odometer" data-count="500"></span>+</h4>
                            <?php if ($text !== '') : ?>
                                <span class="fz-font-lg neutral-500 fw-500"><?php echo esc_html($text); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if ($orisa_services || $button_url !== '') : ?>
                    <div class="col-xxl-7 ms-auto col-lg-8 col-xl-8 mb-40">
                        <div class="at-service-list-wrap">
                            <?php $orisa_service_i = 0; ?>
                            <?php foreach ($orisa_services as $orisa_service) : ?>
                                <?php
                                $orisa_service_i++;
                                $orisa_service_num = sprintf('[%02d]', $orisa_service_i);
                                ?>
                                <?php if ($orisa_service['url'] !== '') : ?>
                                    <a href="<?php echo esc_url($orisa_service['url']); ?>"<?php echo $orisa_service['target'] !== '' ? ' target="' . esc_attr($orisa_service['target']) . '" rel="noopener"' : ''; ?>>
                                <?php endif; ?>
                                <div class="at-service-item service-item">
                                    <div class="count">
                                        <span class="number"><?php echo esc_html($orisa_service_num); ?></span>
                                    </div>
                                    <div class="content">
                                        <?php if ($orisa_service['title'] !== '') : ?>
                                            <h1 class="title"><?php echo esc_html($orisa_service['title']); ?></h1>
                                        <?php endif; ?>
                                        <p class="text">Оценка ситуации, подготовка документов и представительство в арбитражном суде. Работаем под ключ.</p>
                                    </div>
                                    <?php if ($orisa_service['image'] > 0) : ?>
                                        <div class="thumb anim-zoomin">
                                            <?php echo orisa_img($orisa_service['image'], 'full', ['loading' => 'lazy', 'alt' => $orisa_service['title']]); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($orisa_service['url'] !== '') : ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if ($button_url !== '') : ?>
                                <div class="at-service-btn pt-30">
                                    <a class="at-btn" href="<?php echo esc_url($button_url); ?>"<?php echo $button_target; ?>>
                                        <span>
                                            <span class="text-1"><?php echo esc_html($button_label); ?></span>
                                            <span class="text-2"><?php echo esc_html($button_label); ?></span>
                                        </span>
                                        <i>
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                            </svg>
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                            </svg>
                                        </i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

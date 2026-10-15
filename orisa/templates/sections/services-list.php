<?php
defined('ABSPATH') || exit;

/**
 * Услуги (база: services-4.html, строки 614-943: .svc4-index аккордеон + .svc4-engage процесс/контакты).
 * Разметка 1:1: классы svc4-*, data-svc4-*, data-bs-* — дословно (на них завязаны main.css, Bootstrap и services-4.js).
 * Первый элемент аккордеона открыт (show + aria-expanded="true"), остальные закрыты.
 * ID аккордеона уникальны: orisa_block_uid() (якорь блока или счётчик), как в faq.
 * Миниатюра, большой кадр и data-preview — один Image ID (URL через orisa_img_url()).
 * Состав услуги — строки textarea → <li>. Номера 01/02 — автосчётчик.
 * Подписи «Typical span» / «Best when» и aria-label — декор оригинала (как «Search» в page-hero).
 * Пустые поля не выводят свои теги, кроме обёрток Bootstrap-аккордеона.
 */
orisa_flag_script('services-4');

$index_badge = (string) get_sub_field('index_badge');
$index_title = (string) get_sub_field('index_title');
$index_hint = (string) get_sub_field('index_hint');
$process_badge = (string) get_sub_field('process_badge');
$process_title = (string) get_sub_field('process_title');
$process_subtitle = (string) get_sub_field('process_subtitle');
$contact_phone = (string) get_sub_field('contact_phone');
$contact_email = (string) get_sub_field('contact_email');
$contact_address = (string) get_sub_field('contact_address');

$orisa_services = [];
if (have_rows('services')) {
    while (have_rows('services')) {
        the_row();
        $orisa_services[] = [
            'image'        => (int) get_sub_field('image'),
            'title'        => (string) get_sub_field('title'),
            'tag'          => (string) get_sub_field('tag'),
            'description'  => (string) get_sub_field('description'),
            'deliverables' => (string) get_sub_field('deliverables'),
            'link'         => get_sub_field('link'),
            'span'         => (string) get_sub_field('span'),
            'best_when'    => (string) get_sub_field('best_when'),
        ];
    }
}

$orisa_steps = [];
if (have_rows('steps')) {
    while (have_rows('steps')) {
        the_row();
        $orisa_steps[] = [
            'image' => (int) get_sub_field('image'),
            'title' => (string) get_sub_field('title'),
            'text'  => (string) get_sub_field('text'),
            'time'  => (string) get_sub_field('time'),
            'note'  => (string) get_sub_field('note'),
        ];
    }
}

$orisa_float_url = '';
foreach ($orisa_services as $orisa_svc) {
    $orisa_u = orisa_img_url($orisa_svc['image']);
    if ($orisa_u !== '') {
        $orisa_float_url = $orisa_u;
        break;
    }
}

$accordion_id = 'svc4Accordion-' . orisa_block_uid('services-list');
$phone_tel = $contact_phone !== '' ? 'tel:+' . preg_replace('/[^0-9]/', '', $contact_phone) : '';
?>
<?php if ($index_badge !== '' || $index_title !== '' || $index_hint !== '' || $orisa_services) : ?>
    <section class="svc4-index pt-100 pb-100" aria-label="Service index" data-svc4-index<?php echo orisa_anchor(); ?>>
        <div class="container">
            <div class="svc4-index__head at_fade_anim" data-fade-from="bottom" data-delay=".05">
                <div>
                    <?php if ($index_badge !== '') : ?>
                        <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1"><?php echo esc_html($index_badge); ?></span>
                                <span class="text-2"><?php echo esc_html($index_badge); ?></span>
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
                    <?php if ($index_title !== '') : ?>
                        <h2 class="section-title h2 fw-600 reveal-text mb-0"><?php echo esc_html($index_title); ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($index_hint !== '') : ?>
                    <p class="svc4-index__hint mb-0"><?php echo esc_html($index_hint); ?></p>
                <?php endif; ?>
            </div>

            <?php if ($orisa_float_url !== '') : ?>
                <div class="svc4-float" data-svc4-float aria-hidden="true">
                    <img src="<?php echo esc_url($orisa_float_url); ?>" alt="" data-svc4-float-img width="320" height="400">
                </div>
            <?php endif; ?>

            <?php if ($orisa_services) : ?>
                <div class="accordion svc4-list" id="<?php echo esc_attr($accordion_id); ?>">
                    <?php $orisa_svc_i = 0; ?>
                    <?php foreach ($orisa_services as $orisa_svc) : ?>
                        <?php
                        $orisa_svc_i++;
                        $orisa_svc_open = ($orisa_svc_i === 1);
                        $orisa_svc_collapse = $accordion_id . '-' . $orisa_svc_i;
                        $orisa_svc_num = sprintf('%02d', $orisa_svc_i);
                        $orisa_svc_preview = orisa_img_url($orisa_svc['image']);
                        $orisa_lines = preg_split('/\r\n|\r|\n/', $orisa_svc['deliverables']);
                        if (!is_array($orisa_lines)) {
                            $orisa_lines = [];
                        }
                        $orisa_points = [];
                        foreach ($orisa_lines as $orisa_line) {
                            $orisa_line = trim((string) $orisa_line);
                            if ($orisa_line !== '') {
                                $orisa_points[] = $orisa_line;
                            }
                        }
                        ?>
                        <div class="svc4-item" data-svc4-item<?php echo $orisa_svc_preview !== '' ? ' data-preview="' . esc_url($orisa_svc_preview) . '"' : ''; ?>>
                            <h3 class="svc4-item__header">
                                <button class="svc4-item__btn<?php echo $orisa_svc_open ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($orisa_svc_collapse); ?>" aria-expanded="<?php echo $orisa_svc_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($orisa_svc_collapse); ?>">
                                    <?php if ($orisa_svc['image']) : ?>
                                        <span class="svc4-item__thumb">
                                            <?php echo orisa_img($orisa_svc['image'], 'thumbnail', ['width' => 72, 'height' => 72, 'loading' => 'lazy', 'alt' => $orisa_svc['title']]); ?>
                                        </span>
                                    <?php endif; ?>
                                    <span class="svc4-item__num"><?php echo esc_html($orisa_svc_num); ?></span>
                                    <?php if ($orisa_svc['title'] !== '') : ?>
                                        <span class="svc4-item__name"><?php echo esc_html($orisa_svc['title']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($orisa_svc['tag'] !== '') : ?>
                                        <span class="svc4-item__tag"><?php echo esc_html($orisa_svc['tag']); ?></span>
                                    <?php endif; ?>
                                    <span class="svc4-item__icon" aria-hidden="true"></span>
                                </button>
                            </h3>
                            <div id="<?php echo esc_attr($orisa_svc_collapse); ?>" class="collapse<?php echo $orisa_svc_open ? ' show' : ''; ?>" data-bs-parent="#<?php echo esc_attr($accordion_id); ?>">
                                <div class="svc4-item__body">
                                    <?php if ($orisa_svc['image']) : ?>
                                        <div class="svc4-item__visual">
                                            <?php echo orisa_img($orisa_svc['image'], 'large', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'width' => 640, 'height' => 480, 'alt' => $orisa_svc['title']]); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($orisa_svc['description'] !== '' || $orisa_points || $orisa_svc['link']) : ?>
                                        <div class="svc4-item__copy">
                                            <?php if ($orisa_svc['description'] !== '') : ?>
                                                <p><?php echo esc_html($orisa_svc['description']); ?></p>
                                            <?php endif; ?>
                                            <?php if ($orisa_points) : ?>
                                                <ul class="svc4-item__deliverables">
                                                    <?php foreach ($orisa_points as $orisa_point) : ?>
                                                        <li><?php echo esc_html($orisa_point); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                            <?php echo orisa_link($orisa_svc['link'], 'svc4-item__link'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($orisa_svc['span'] !== '' || $orisa_svc['best_when'] !== '') : ?>
                                        <div class="svc4-item__aside">
                                            <?php if ($orisa_svc['span'] !== '') : ?>
                                                <p class="svc4-item__aside-label">Typical span</p>
                                                <p class="svc4-item__aside-value"><?php echo esc_html($orisa_svc['span']); ?></p>
                                            <?php endif; ?>
                                            <?php if ($orisa_svc['best_when'] !== '') : ?>
                                                <p class="svc4-item__aside-label">Best when</p>
                                                <p class="svc4-item__aside-value"><?php echo esc_html($orisa_svc['best_when']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ($process_badge !== '' || $process_title !== '' || $process_subtitle !== '' || $orisa_steps || $contact_phone !== '' || $contact_email !== '' || $contact_address !== '') : ?>
    <section class="svc4-engage pt-100 pb-100 bg-neutral-50 p-relative overflow-hidden" aria-label="How we engage" data-svc4-engage>
        <div class="container p-relative z-1">
            <div class="row align-items-end g-4 mb-50">
                <div class="col-lg-5">
                    <?php if ($process_badge !== '') : ?>
                        <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0 at_fade_anim" data-fade-from="bottom" data-delay=".05">
                            <span class="text-uppercase">
                                <span class="text-1"><?php echo esc_html($process_badge); ?></span>
                                <span class="text-2"><?php echo esc_html($process_badge); ?></span>
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
                    <?php if ($process_title !== '') : ?>
                        <h2 class="section-title h2 fw-600 reveal-text mb-0"><?php echo esc_html($process_title); ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($process_subtitle !== '') : ?>
                    <div class="col-lg-5 ms-lg-auto">
                        <p class="h6 fw-500 mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".1"><?php echo esc_html($process_subtitle); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($orisa_steps) : ?>
                <div class="svc4-process">
                    <?php $orisa_step_i = 0; ?>
                    <?php foreach ($orisa_steps as $orisa_step) : ?>
                        <?php
                        $orisa_step_i++;
                        $orisa_step_num = sprintf('%02d', $orisa_step_i);
                        ?>
                        <article class="svc4-process__row" data-svc4-step>
                            <?php if ($orisa_step['image']) : ?>
                                <div class="svc4-process__media">
                                    <?php echo orisa_img($orisa_step['image'], 'medium', ['class' => 'anim-zoomin', 'loading' => 'lazy', 'width' => 280, 'height' => 200, 'alt' => $orisa_step['title']]); ?>
                                </div>
                            <?php endif; ?>
                            <div class="svc4-process__body">
                                <span class="svc4-process__num"><?php echo esc_html($orisa_step_num); ?></span>
                                <?php if ($orisa_step['title'] !== '') : ?>
                                    <h3 class="svc4-process__name"><?php echo esc_html($orisa_step['title']); ?></h3>
                                <?php endif; ?>
                                <?php if ($orisa_step['text'] !== '') : ?>
                                    <p class="svc4-process__text"><?php echo esc_html($orisa_step['text']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if ($orisa_step['time'] !== '' || $orisa_step['note'] !== '') : ?>
                                <div class="svc4-process__meta">
                                    <?php if ($orisa_step['time'] !== '') : ?>
                                        <span class="svc4-process__time"><?php echo esc_html($orisa_step['time']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($orisa_step['note'] !== '') : ?>
                                        <span class="svc4-process__note"><?php echo esc_html($orisa_step['note']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($contact_phone !== '' || $contact_email !== '' || $contact_address !== '') : ?>
                <div class="svc4-engage__contact row g-4 mt-60 align-items-center at_fade_anim" data-fade-from="bottom" data-delay=".1">
                    <?php if ($contact_phone !== '') : ?>
                        <div class="col-md-4">
                            <a class="svc4-engage__phone" href="<?php echo esc_attr($phone_tel); ?>"><?php echo esc_html($contact_phone); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if ($contact_email !== '') : ?>
                        <div class="col-md-4">
                            <a class="svc4-engage__mail" href="<?php echo esc_url('mailto:' . $contact_email); ?>"><?php echo esc_html($contact_email); ?></a>
                        </div>
                    <?php endif; ?>
                    <?php if ($contact_address !== '') : ?>
                        <div class="col-md-4">
                            <p class="svc4-engage__address mb-0"><?php echo esc_html($contact_address); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

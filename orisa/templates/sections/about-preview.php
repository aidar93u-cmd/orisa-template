<?php
defined('ABSPATH') || exit;

/**
 * Превью «О компании» (база: строки 482–618, .at-about-area).
 * Разметка 1:1 с оригиналом: классы, data-speed, вложенность — дословно.
 * Пустые поля не выводят свои теги. Картинки через orisa_img(ID).
 */
$badge   = get_sub_field('badge');
$title   = get_sub_field('title');
$text    = get_sub_field('text');
$button  = get_sub_field('button');
$avatars = get_sub_field('avatars');
$process = get_sub_field('process_images');
// ponytail: заголовки/тексты process-карточек и счётчик захардкожены (вопрос динамики только про картинки).
$orisa_ap_cards = [
    [
        'title' => 'Юристы по банкротству',
        'text'  => 'Более восьми лет мы законно списываем долги и защищаем клиентов: анализируем ситуацию, готовим документы и представляем интересы в арбитражном суде.',
    ],
    [
        'title' => 'Опыт и результат',
        'text'  => 'Мы оцениваем риски для имущества, взаимодействуем с кредиторами и ведём дело до решения суда об освобождении от обязательств.',
    ],
];
$orisa_ap_process = [];
if (is_array($process)) {
    foreach ($process as $orisa_ap_row) {
        $orisa_ap_id = (is_array($orisa_ap_row) && isset($orisa_ap_row['image'])) ? (int) $orisa_ap_row['image'] : 0;
        if ($orisa_ap_id > 0) {
            $orisa_ap_process[] = $orisa_ap_id;
        }
    }
}
$orisa_ap_site = get_bloginfo('name');
?>
<div class="at-about-area pt-100"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row align-items-end">
            <div class="col-xxl-10">
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
                    <?php if ($title !== '' || (is_array($button) && ! empty($button['url']))) : ?>
                        <h3 class="at-section-title mb-0">
                            <?php if ($title !== '') : ?>
                                <span> <?php echo esc_html($title); ?></span>
                            <?php endif; ?>
                            <?php if (is_array($button) && ! empty($button['url'])) : ?>
                                <span class="at-about-btn-transform ml-20">
                                    <a class="at-btn" href="<?php echo esc_url($button['url']); ?>"<?php echo ! empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
                                        <span>
                                            <span class="text-1"><?php echo esc_html($button['title'] !== '' ? $button['title'] : 'СВЯЗАТЬСЯ'); ?></span>
                                            <span class="text-2"><?php echo esc_html($button['title'] !== '' ? $button['title'] : 'СВЯЗАТЬСЯ'); ?></span>
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
                                </span>
                            <?php endif; ?>
                        </h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="at-about-border mt-20 pt-55 ">
            <div class="row">
                <div class="col-xxl-2 col-lg-3 col-md-7 mb-md-5">
                    <div class="at-about-subtitle-wrap mb-30">
                        <?php if ($text !== '') : ?>
                            <span class="at-about-subtitle">
                                <svg class="fill-primary mb-10" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M40 20V0H20H0V20V40H20L40 20ZM40 20H20V40L0 20L20 0L40 20Z" fill="#F0460E" />
                                </svg>
                                <br class="d-block">
                                <?php echo nl2br(esc_html($text)); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <?php if (is_array($avatars) && $avatars) : ?>
                        <div class="d-flex align-items-center">
                            <div class="block-author d-flex align-items-center position-relative">
                                <?php $orisa_ap_i = 0; ?>
                                <?php foreach ($avatars as $orisa_ap_av) : ?>
                                    <?php
                                    $orisa_ap_av_id  = (is_array($orisa_ap_av) && isset($orisa_ap_av['image'])) ? (int) $orisa_ap_av['image'] : 0;
                                    $orisa_ap_av_img = orisa_img($orisa_ap_av_id, 'full', ['alt' => $orisa_ap_site]);
                                    if ($orisa_ap_av_img === '') {
                                        continue;
                                    }
                                    $orisa_ap_zi = min(2 + $orisa_ap_i, 5);
                                    $orisa_ap_i++;
                                    ?>
                                    <div class="avatar overflow-hidden z-index-<?php echo esc_attr((string) $orisa_ap_zi); ?>">
                                        <a href="#team">
                                            <?php echo $orisa_ap_av_img; ?>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="fz-font-md fw-600 text-nowrap"><span class="odometer" data-count="8"></span>+</div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-1 col-md-3 col-5 align-self-end ms-auto">
                    <div class="at-about-svg-wrap move-up">
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
                <div class="col-lg-8 ms-auto">
                    <div class="at-about-thumb-wrap ml-75">
                        <?php if ($orisa_ap_process) : ?>
                            <div class="row gx-80">
                                <?php foreach ($orisa_ap_process as $orisa_ap_k => $orisa_ap_pid) : ?>
                                    <?php $orisa_ap_card = $orisa_ap_cards[$orisa_ap_k % 2]; ?>
                                    <div class="col-lg-6 col-md-6">
                                        <?php if ($orisa_ap_k % 2 === 0) : ?>
                                            <div class="at-about-item anim-zoomin-wrap mb-40">
                                                <div class="mb-35">
                                                    <div class="at-about-thumb fix anim-zoomin">
                                                        <?php echo orisa_img($orisa_ap_pid, 'full', ['data-speed' => '.8', 'alt' => $orisa_ap_site]); ?>
                                                    </div>
                                                </div>
                                                <div class="at-about-content">
                                                    <h3 class="at-about-title mb-10 at-char-animation"><?php echo esc_html($orisa_ap_card['title']); ?></h3>
                                                    <p class="at-about-dec at_fade_anim"><?php echo esc_html($orisa_ap_card['text']); ?></p>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="at-about-item mb-40 d-flex flex-column gap-4">
                                                <div class="at-about-content order-2 order-md-1">
                                                    <h3 class="at-about-title mb-10 at-char-animation"><?php echo esc_html($orisa_ap_card['title']); ?></h3>
                                                    <p class="at-about-dec at_fade_anim"><?php echo esc_html($orisa_ap_card['text']); ?></p>
                                                </div>
                                                <div class="anim-zoomin-wrap order-1 order-md-2">
                                                    <div class="at-about-thumb fix anim-zoomin">
                                                        <?php echo orisa_img($orisa_ap_pid, 'full', ['data-speed' => '.8', 'alt' => $orisa_ap_site]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

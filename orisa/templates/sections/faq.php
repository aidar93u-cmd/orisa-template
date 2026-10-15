<?php
defined('ABSPATH') || exit;

/**
 * ЭТАЛОННЫЙ БЛОК (этап 3). Правила образца:
 * 1. Разметка 1:1 с оригиналом (faqs.html, .sec-3-faqs > .scroll-section > .wrapper > .item):
 *    классы-обёртки, data-bs-*, вложенность — дословно (на них завязаны main.js и Bootstrap).
 * 2. Пустые поля не выводят свои теги (if вокруг каждого), кроме обёрток Bootstrap-аккордеона.
 * 3. ID аккордеона уникальны на страницу: orisa_block_uid() (якорь блока или счётчик).
 *    Первый вопрос открыт (класс show + aria-expanded="true"), остальные закрыты — как в оригинале.
 * 4. Весь вывод экранирован: esc_html для текста, wp_kses_post для WYSIWYG, esc_attr для ID.
 * 5. Вариант «alt» (index.html 1914-2018, .alt-faq-area > .alt-faq-title-wrap +
 *    .at-faq > .accordion.pt-80): каркас аккордеона тот же (at-faq-item +
 *    Bootstrap collapse, общий repeater items), своя только обёртка: слева
 *    картинка (orisa_img), заголовок, текст и тройная кнопка (один Link на
 *    три якоря, как в оригинале), справа — .at-faq.ml-115 с плашкой и
 *    .at-section-title. id="faq" оригинала — через «Настройки блока».
 */
$variant = get_sub_field('variant');
if ($variant !== 'alt') {
    $variant = 'standard';
}
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$accordion_id = 'accordion-' . orisa_block_uid($variant === 'alt' ? 'faq-alt' : 'faq');
$side_image_id = (int) get_sub_field('side_image');
$side_title = get_sub_field('side_title');
$side_text = get_sub_field('side_text');
$side_button = get_sub_field('side_button');
$side_btn_url = is_array($side_button) && !empty($side_button['url']) ? $side_button['url'] : '';
$side_btn_title = is_array($side_button) && isset($side_button['title']) && $side_button['title'] !== '' ? $side_button['title'] : 'Задать вопрос';
$side_btn_target = is_array($side_button) && !empty($side_button['target']) ? $side_button['target'] : '';
$side_btn_extra = $side_btn_target !== '' ? ' target="' . esc_attr($side_btn_target) . '" rel="noopener"' : '';
$side_img_html = orisa_img($side_image_id, 'full', ['class' => 'w-100', 'data-speed' => '.8', 'alt' => is_string($side_title) ? $side_title : '']);
?>
<?php if ($variant === 'alt') : ?>
<div class="alt-faq-area pt-145 pb-80"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="alt-faq-title-wrap mb-40">
                    <?php if ($side_img_html !== '') : ?>
                        <div class="rounded-4 overflow-hidden anim-zoomin">
                            <?php echo $side_img_html; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($side_title !== '') : ?>
                        <h3 class="h6 fw-600 mb-15 pt-50"><?php echo esc_html($side_title); ?></h3>
                    <?php endif; ?>
                    <?php if ($side_text !== '') : ?>
                        <p class="at-faq-dec mb-35"><?php echo esc_html($side_text); ?></p>
                    <?php endif; ?>
                    <?php if ($side_btn_url !== '') : ?>
                        <div class="at-btn-group at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                            <a class="at-btn-circle" href="<?php echo esc_url($side_btn_url); ?>"<?php echo $side_btn_extra; ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                </svg>
                            </a>
                            <a class="at-btn z-index-1" href="<?php echo esc_url($side_btn_url); ?>"<?php echo $side_btn_extra; ?>><?php echo esc_html($side_btn_title); ?></a>
                            <a class="at-btn-circle" href="<?php echo esc_url($side_btn_url); ?>"<?php echo $side_btn_extra; ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="at-faq ml-115">
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
                        <h3 class="at-section-title fw-600 reveal-text"><?php echo esc_html($title); ?></h3>
                    <?php endif; ?>
                    <?php if (have_rows('items')) : ?>
                        <div class="accordion pt-80" id="<?php echo esc_attr($accordion_id); ?>">
                            <?php $orisa_faq_i = 0; ?>
                            <?php while (have_rows('items')) : the_row(); ?>
                                <?php
                                $q = get_sub_field('question');
                                $a = get_sub_field('answer');
                                if ($q === '' && $a === '') {
                                    continue;
                                }
                                $orisa_faq_i++;
                                $orisa_faq_open = ($orisa_faq_i === 1);
                                $orisa_faq_collapse = $accordion_id . '-' . $orisa_faq_i;
                                ?>
                                <div class="at-faq-item scroll-move-up rounded-4">
                                    <div class="at-faq-header d-flex gap-2">
                                        <div class="box-number">
                                            <span class="at-faq-number"><?php echo esc_html((string) $orisa_faq_i); ?></span>
                                        </div>
                                        <button class="at-faq-button<?php echo $orisa_faq_open ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($orisa_faq_collapse); ?>" aria-expanded="<?php echo $orisa_faq_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($orisa_faq_collapse); ?>"><?php echo esc_html($q); ?></button>
                                    </div>
                                    <div id="<?php echo esc_attr($orisa_faq_collapse); ?>" class="at-faq-collapse collapse<?php echo $orisa_faq_open ? ' show' : ''; ?>" data-bs-parent="#<?php echo esc_attr($accordion_id); ?>">
                                        <div class="at-faq-body">
                                            <?php echo wp_kses_post($a); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
<div class="sec-3-faqs p-relative z-n1 pb-100"<?php echo orisa_anchor(); ?>>
    <div class="scroll-section">
        <div class="wrapper">
            <div class="item bg-neutral-0 d-block">
                <div class="pt-100 border-top-100">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-4 h-100">
                                <?php if ($badge !== '') : ?>
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
                                <?php if ($title !== '') : ?>
                                    <h3 class="reveal-text"><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>
                                <?php if ($subtitle !== '') : ?>
                                    <h4 class="h6 fw-500 mb-0 fz-font-lg"><?php echo esc_html($subtitle); ?></h4>
                                <?php endif; ?>
                                <div class="section-title-pin"></div>
                            </div>
                            <div class="col-lg-7 offset-lg-1 p-relative">
                                <?php if (have_rows('items')) : ?>
                                    <div class="accordion p-relative z-index-3" id="<?php echo esc_attr($accordion_id); ?>">
                                        <?php $orisa_faq_i = 0; ?>
                                        <?php while (have_rows('items')) : the_row(); ?>
                                            <?php
                                            $q = get_sub_field('question');
                                            $a = get_sub_field('answer');
                                            if ($q === '' && $a === '') {
                                                continue;
                                            }
                                            $orisa_faq_i++;
                                            $orisa_faq_open = ($orisa_faq_i === 1);
                                            $orisa_faq_collapse = $accordion_id . '-' . $orisa_faq_i;
                                            ?>
                                            <div class="at-faq-item bg-neutral-0 border-100 rounded-4">
                                                <div class="at-faq-header d-flex gap-2">
                                                    <div class="box-number">
                                                        <span class="at-faq-number"><?php echo esc_html((string) $orisa_faq_i); ?></span>
                                                    </div>
                                                    <button class="at-faq-button<?php echo $orisa_faq_open ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($orisa_faq_collapse); ?>" aria-expanded="<?php echo $orisa_faq_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($orisa_faq_collapse); ?>"><?php echo esc_html($q); ?></button>
                                                </div>
                                                <div id="<?php echo esc_attr($orisa_faq_collapse); ?>" class="at-faq-collapse collapse<?php echo $orisa_faq_open ? ' show' : ''; ?>" data-bs-parent="#<?php echo esc_attr($accordion_id); ?>">
                                                    <div class="at-faq-body">
                                                        <?php echo wp_kses_post($a); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<?php endif; ?>

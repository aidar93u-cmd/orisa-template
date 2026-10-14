<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 5 (строки 594–634, .sec-1-home-5).
 * Разметка 1:1 с оригиналом: классы, data-* анимаций, вложенность — дословно.
 * Пустые поля не выводят свои теги. Картинки через orisa_img(ID).
 * Мёртвая ссылка на портфолио заменена полем «Кнопка» (Link).
 */
$badge      = get_sub_field('badge');
$intro      = get_sub_field('intro');
$photo_small = get_sub_field('photo_small');
$photo_main  = get_sub_field('photo_main');
$bg_title   = get_sub_field('bg_title');
$title      = get_sub_field('title');
$subtitle   = get_sub_field('subtitle');
$button     = get_sub_field('button');
?>
<div class="sec-1-home-5 bg-cover mt-30 pb-lg-0 pb-4"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 mx-lg-auto col-md-6 pb-100 z-index-2">
                <?php if ($badge !== '') : ?>
                    <span class="category-tag mb-20"><span class="dot"></span><?php echo esc_html($badge); ?></span>
                <?php endif; ?>
                <?php if ($intro !== '') : ?>
                    <p class="fz-18 neutral-900 fw-600 mb-40"><?php echo esc_html($intro); ?></p>
                <?php endif; ?>
                <?php echo orisa_img($photo_small, 'full', ['alt' => 'orisa']); ?>
            </div>
            <div class="col-lg-4 mx-lg-auto d-none d-lg-block z-index-1">
                <div class="p-relative at_fade_anim" data-delay=".5" data-fade-from="bottom" data-ease="bounce">
                    <?php echo orisa_img($photo_main, 'full', ['class' => 'd-none d-lg-block', 'alt' => 'orisa']); ?>
                    <?php if ($bg_title !== '') : ?>
                        <div class="p-absolute bottom-0 start-50 translate-middle-x z-n1 d-lg-none d-xxl-block">
                            <h1 class="fz-290 fw-600 text-nowrap lh-1"><?php echo esc_html($bg_title); ?></h1>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mx-lg-auto z-index-2">
                <div class="icon mb-30">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path d="M19.3621 35.41C20.3107 28.6345 20.785 25.2468 23.0159 23.0158C25.2469 20.7848 28.6347 20.3105 35.4102 19.362L37.9991 18.9995L35.4102 18.6371C28.6347 17.6885 25.2469 17.2142 23.0159 14.9832C20.785 12.7522 20.3107 9.36449 19.3621 2.58901L18.9996 -4.5973e-05L18.6372 2.58898C17.6886 9.36447 17.2143 12.7522 14.9833 14.9832C12.7524 17.2142 9.36462 17.6885 2.58913 18.637L0 18.9995L2.58912 19.362C9.36461 20.3106 12.7524 20.7848 14.9833 23.0158C17.2143 25.2468 17.6886 28.6345 18.6372 35.41L18.9996 37.9991L19.3621 35.41Z" fill="currentColor" />
                    </svg>
                </div>
                <?php if ($title !== '') : ?>
                    <h2 class="h4"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if ($subtitle !== '') : ?>
                    <p class="fz-18 neutral-900 fw-600"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
                <?php if (is_array($button) && ! empty($button['url'])) : ?>
                    <div class="at-btn-group at-btn-group-transparent at_fade_anim" data-delay=".5" data-fade-from="bottom" data-ease="bounce">
                        <a class="at-btn-circle" href="<?php echo esc_url($button['url']); ?>"<?php echo ! empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                            </svg>
                        </a>
                        <a class="at-btn z-index-1" href="<?php echo esc_url($button['url']); ?>"<?php echo ! empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>><?php echo esc_html($button['title'] !== '' ? $button['title'] : 'View All Projects'); ?></a>
                        <a class="at-btn-circle" href="<?php echo esc_url($button['url']); ?>"<?php echo ! empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

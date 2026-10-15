<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 14 (index-14.html, строки 588-670).
 * Разметка 1:1 с оригиналом (.sec-1-home-14: top/sub/hero-overlay, теги):
 * классы-обёртки, data-* анимаций, вложенность — дословно (на них завязаны main.js).
 * Пустые поля не выводят свои теги, кроме корневых обёрток.
 * Весь вывод экранирован: esc_html для текста, wp_kses_post для WYSIWYG,
 * esc_url/esc_attr для ссылки, картинка через orisa_img(ID).
 */
$tagline = get_sub_field('tagline');
$since = get_sub_field('since');
$title = get_sub_field('title');
$copy = get_sub_field('copy');
$cta = get_sub_field('cta_button');
$cta_url = is_array($cta) && !empty($cta['url']) ? $cta['url'] : '';
$cta_title = is_array($cta) && !empty($cta['title']) ? $cta['title'] : 'Book a Session';
$cta_target = is_array($cta) && !empty($cta['target']) ? $cta['target'] : '';
$hero_image = get_sub_field('hero_image');
$hero_caption = get_sub_field('hero_caption');
$hero_credit = get_sub_field('hero_credit');
$hero_title = get_sub_field('hero_title');
$hero_sub = get_sub_field('hero_sub');
$scroll_label = get_sub_field('scroll_label');
?>
<section class="sec-1-home-14" aria-label="Photography hero"<?php echo orisa_anchor(); ?>>
    <div class="sec-1-home-14__inner">

        <!-- Top row -->
        <?php if ($tagline !== '' || $since !== '') : ?>
            <div class="sec-1-home-14__top">
                <?php if ($tagline !== '') : ?>
                    <p class="sec-1-home-14__tagline mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".1">
                        <?php echo esc_html($tagline); ?>
                    </p>
                <?php endif; ?>
                <?php if ($since !== '') : ?>
                    <p class="sec-1-home-14__counter mb-0 at_fade_anim text-scramble" data-fade-from="bottom" data-delay=".2">
                        <?php echo esc_html($since); ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Headline -->
        <?php if ($title !== '') : ?>
            <h1 class="sec-1-home-14__headline reveal-text at_fade_anim" data-fade-from="top" data-delay=".3">
                <?php echo wp_kses_post($title); ?>
            </h1>
        <?php endif; ?>

        <!-- Sub row: copy + CTAs -->
        <?php if ($copy !== '' || $cta_url !== '') : ?>
            <div class="sec-1-home-14__sub">
                <?php if ($copy !== '') : ?>
                    <p class="sec-1-home-14__copy mb-0 at_fade_anim" data-fade-from="bottom" data-delay=".2">
                        <?php echo wp_kses_post($copy); ?>
                    </p>
                <?php endif; ?>
                <?php if ($cta_url !== '') : ?>
                    <div class="sec-1-home-14__cta at_fade_anim" data-fade-from="bottom" data-delay=".3">
                        <a class="sec-1-home-14__btn-link" href="<?php echo esc_url($cta_url); ?>"<?php echo $cta_target !== '' ? ' target="' . esc_attr($cta_target) . '" rel="noopener"' : ''; ?>>
                            <span><?php echo esc_html($cta_title); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 17L17 7M9 7h8v8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Hero image card -->
        <?php if ($hero_image || $hero_caption !== '' || $hero_credit !== '' || $hero_title !== '' || $hero_sub !== '') : ?>
            <figure class="sec-1-home-14__hero anim-zoomin-wrap">
                <?php echo orisa_img($hero_image, 'full', ['class' => 'sec-1-home-14__hero-img anim-zoomin', 'data-speed' => '.8', 'loading' => 'eager', 'decoding' => 'async']); ?>

                <?php if ($hero_caption !== '' || $hero_credit !== '' || $hero_title !== '' || $hero_sub !== '' || $scroll_label !== '') : ?>
                    <div class="sec-1-home-14__hero-overlay">
                        <?php if ($hero_caption !== '' || $hero_credit !== '') : ?>
                            <div class="sec-1-home-14__hero-top">
                                <?php if ($hero_caption !== '') : ?>
                                    <p class="sec-1-home-14__hero-caption mb-0 text-white"><?php echo esc_html($hero_caption); ?></p>
                                <?php endif; ?>
                                <?php if ($hero_credit !== '') : ?>
                                    <p class="sec-1-home-14__hero-credit mb-0 text-white"><?php echo esc_html($hero_credit); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($hero_title !== '' || $hero_sub !== '' || $scroll_label !== '') : ?>
                            <div class="sec-1-home-14__hero-bottom">
                                <?php if ($hero_title !== '' || $hero_sub !== '') : ?>
                                    <div class="sec-1-home-14__hero-meta">
                                        <?php if ($hero_title !== '') : ?>
                                            <p class="sec-1-home-14__hero-title mb-0 text-white"><?php echo esc_html($hero_title); ?></p>
                                        <?php endif; ?>
                                        <?php if ($hero_sub !== '') : ?>
                                            <p class="sec-1-home-14__hero-sub mb-0 text-white"><?php echo esc_html($hero_sub); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="sec-1-home-14__hero-scroll" aria-hidden="true">
                                    <?php if ($scroll_label !== '') : ?>
                                        <span class="sec-1-home-14__hero-scroll-label text-white text-scramble"><?php echo esc_html($scroll_label); ?></span>
                                    <?php endif; ?>
                                    <span class="sec-1-home-14__hero-scroll-arrow text-white">&darr;</span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </figure>
        <?php endif; ?>

        <!-- Tags row -->
        <?php if (have_rows('tags')) : ?>
            <ul class="sec-1-home-14__tags list-unstyled mb-0">
                <?php $orisa_h14_tag_i = 0; ?>
                <?php while (have_rows('tags')) : the_row(); ?>
                    <?php
                    $tag_num = get_sub_field('tag_num');
                    $tag_name = get_sub_field('tag_name');
                    if ($tag_num === '' && $tag_name === '') {
                        continue;
                    }
                    $orisa_h14_tag_i++;
                    ?>
                    <li class="sec-1-home-14__tag at_fade_anim" data-fade-from="bottom" data-delay="<?php echo esc_attr(number_format(0.1 * $orisa_h14_tag_i, 1, '.', '')); ?>">
                        <?php if ($tag_num !== '') : ?>
                            <span class="sec-1-home-14__tag-num"><?php echo esc_html($tag_num); ?></span>
                        <?php endif; ?>
                        <?php if ($tag_name !== '') : ?>
                            <span class="sec-1-home-14__tag-name"><?php echo esc_html($tag_name); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

    </div>
</section>

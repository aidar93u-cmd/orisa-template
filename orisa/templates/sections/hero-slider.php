<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 13 (index-13.html, строки 575-739).
 * Разметка 1:1 (.sec-1-home-13: классы, swiper-обёртки, вложенность — дословно,
 * на них завязан слайдер). Пустые поля гасят свои теги; слайды и превью идут
 * из одного повторителя, поэтому их количество всегда совпадает. Фон без
 * картинки — div без data-background (приём из hero-home-4). Стрелки слайдера
 * и оверлеи — чистая декорация, захардкожены.
 */
$brand = get_sub_field('brand_title');
$since = get_sub_field('since_link');
$since_url = is_array($since) && !empty($since['url']) ? $since['url'] : '';
$since_title = is_array($since) && !empty($since['title']) ? $since['title'] : '';
$slides = get_sub_field('slides');
if (!is_array($slides)) {
    $slides = [];
}
$slides = array_values(array_filter($slides, static function ($s) {
    if (!is_array($s)) {
        return false;
    }
    foreach (['tagline', 'headline', 'bg_image', 'service_icon', 'service_num', 'service_name'] as $k) {
        if (!empty($s[$k])) {
            return true;
        }
    }
    return false;
}));
?>
<section class="sec-1-home-13 pt-160" aria-label="Orisa Architecture Hero"<?php echo orisa_anchor(); ?>>
    <div class="sec-1-home-13__inner">

        <!-- Top row: brand title + since -->
        <div class="sec-1-home-13__top">
            <?php if ($brand) : ?>
                <h1 class="sec-1-home-13__brand mb-0 text-scale-anim"><?php echo wp_kses_post($brand); ?></h1>
            <?php endif; ?>
            <?php if ($since_url !== '' && $since_title !== '') : ?>
                <a class="sec-1-home-13__since text-scramble" href="<?php echo esc_url($since_url); ?>"><?php echo esc_html($since_title); ?></a>
            <?php endif; ?>
        </div>

        <?php if ($slides !== []) : ?>
            <!-- Hero card with main slider + thumbs slider -->
            <div class="sec-1-home-13__card">

                <!-- Main slider: bg + content per slide -->
                <div class="swiper sec-1-home-13__main">
                    <div class="swiper-wrapper">

                        <?php foreach ($slides as $s) : ?>
                            <?php
                            $tagline = isset($s['tagline']) ? $s['tagline'] : '';
                            $headline = isset($s['headline']) ? $s['headline'] : '';
                            $bg_url = orisa_img_url(isset($s['bg_image']) ? $s['bg_image'] : 0, 'full');
                            ?>
                            <div class="swiper-slide sec-1-home-13__slide">
                                <div class="sec-1-home-13__bg"<?php echo $bg_url !== '' ? ' data-background="' . esc_url($bg_url) . '"' : ''; ?> aria-hidden="true"></div>
                                <div class="sec-1-home-13__overlay" aria-hidden="true"></div>
                                <div class="sec-1-home-13__content">
                                    <?php if ($tagline !== '') : ?>
                                        <div class="sec-1-home-13__tagline">
                                            <span class="text-white"><?php echo esc_html($tagline); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($headline !== '') : ?>
                                        <h2 class="sec-1-home-13__headline mb-0">
                                            <span class="text-white"><?php echo esc_html($headline); ?></span>
                                        </h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <!-- Vertical nav buttons -->
                <div class="sec-1-home-13__nav swiper-button-wrapper">
                    <button type="button" class="swiper-btn-prev" aria-label="Previous slide">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                            <path d="M11.3481 7.47314L5.25879 13.2856L11.3481 19.0981" stroke="currentColor" stroke-width="1.66071" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21.3124 13.2856H5.53564" stroke="currentColor" stroke-width="1.66071" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button type="button" class="swiper-btn-next" aria-label="Next slide">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                            <path d="M15.2234 7.47314L21.3126 13.2856L15.2234 19.0981" stroke="currentColor" stroke-width="1.66071" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.259 13.2856H21.0358" stroke="currentColor" stroke-width="1.66071" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>

                <!-- Thumbs slider: clickable service cards -->
                <div class="swiper sec-1-home-13__thumbs">
                    <div class="swiper-wrapper">

                        <?php foreach ($slides as $s) : ?>
                            <?php
                            $service_num = isset($s['service_num']) ? $s['service_num'] : '';
                            $service_name = isset($s['service_name']) ? $s['service_name'] : '';
                            ?>
                            <button type="button" class="swiper-slide sec-1-home-13__service"<?php echo $service_name !== '' ? ' aria-label="View ' . esc_attr($service_name) . '"' : ''; ?>>
                                <span class="sec-1-home-13__service-img">
                                    <?php echo orisa_img(isset($s['service_icon']) ? $s['service_icon'] : 0, 'full', ['loading' => 'lazy', 'decoding' => 'async']); ?>
                                </span>
                                <span class="sec-1-home-13__service-meta">
                                    <?php if ($service_num !== '') : ?>
                                        <span class="sec-1-home-13__service-num"><?php echo esc_html($service_num); ?></span>
                                    <?php endif; ?>
                                    <?php if ($service_name !== '') : ?>
                                        <span class="sec-1-home-13__service-name"><?php echo esc_html($service_name); ?></span>
                                    <?php endif; ?>
                                </span>
                            </button>
                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
        <?php endif; ?>
    </div>
</section>

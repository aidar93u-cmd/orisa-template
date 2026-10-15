<?php
defined('ABSPATH') || exit;

/**
 * Бегущая строка. База — index.html 621-734:
 * .at-brand-area > .carouselTicker.carouselTicker-right > ul.carouselTicker__list.scroll-move-right
 * > li.carouselTicker__item > .brand-item > img (22 li, div сбалансированы: ul закрыт в 733,
 * тикер в 734, секция в 735).
 * Тот же механизм в index-3.html (sec-2-home-3: текст + звезда) и about-2.html (sec-4-about,
 * .moving-gallery: фото): .carouselTicker > ul.carouselTicker__list > li, запуск — main.js §46
 * carauselScroll (.carouselTicker-left → prev, .carouselTicker-right → next).
 * Variant меняет только обёртки-модификаторы и содержимое li. Пустые элементы пропускаются,
 * картинки — через orisa_img(ID), ссылка оборачивает картинку в <a>.
 */
$orisa_marquee_variant = get_sub_field('variant');
if ($orisa_marquee_variant !== 'lenta' && $orisa_marquee_variant !== 'galereya') {
    $orisa_marquee_variant = 'brendy';
}
?>
<?php if ($orisa_marquee_variant === 'lenta') : ?>
    <?php if (have_rows('items')) : ?>
        <div class="sec-2-home-3"<?php echo orisa_anchor(); ?>>
            <div class="bg-neutral-900 py-5 changeless carouselTicker carouselTicker-right">
                <ul class="d-flex align-items-center justify-content-center gap-4 carouselTicker__list scroll-move-left">
                    <?php while (have_rows('items')) : the_row(); ?>
                        <?php
                        $orisa_marquee_text = get_sub_field('text');
                        if (!is_string($orisa_marquee_text) || $orisa_marquee_text === '') {
                            continue;
                        }
                        ?>
                        <li class="d-flex align-items-center gap-4">
                            <h1 class="h5 neutral-0 mb-0 text-nowrap"><?php echo esc_html($orisa_marquee_text); ?></h1>
                            <svg class="scroll-rotate" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <path d="M20 0C20.3015 10.9184 29.0816 19.6985 40 20C29.0816 20.3015 20.3015 29.0816 20 40C19.6985 29.0816 10.9184 20.3015 0 20C10.9184 19.6985 19.6985 10.9184 20 0Z" fill="#FEFEFE" />
                            </svg>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php elseif ($orisa_marquee_variant === 'galereya') : ?>
    <?php if (have_rows('items')) : ?>
        <div class="sec-4-about pt-120"<?php echo orisa_anchor(); ?>>
            <div class="moving-gallery at_fade_anim carouselTicker carouselTicker-left" data-delay=".5" data-fade-from="bottom" data-ease="bounce">
                <ul class="wrapper-gallery carouselTicker__list scroll-move-left">
                    <?php while (have_rows('items')) : the_row(); ?>
                        <?php
                        $orisa_marquee_img = orisa_img(get_sub_field('image'), 'full', ['alt' => 'orisa']);
                        if ($orisa_marquee_img === '') {
                            continue;
                        }
                        $orisa_marquee_link = get_sub_field('link');
                        $orisa_marquee_url = (is_array($orisa_marquee_link) && !empty($orisa_marquee_link['url'])) ? $orisa_marquee_link['url'] : '';
                        $orisa_marquee_target = (is_array($orisa_marquee_link) && !empty($orisa_marquee_link['target'])) ? ' target="' . esc_attr($orisa_marquee_link['target']) . '" rel="noopener"' : '';
                        ?>
                        <li>
                            <?php if ($orisa_marquee_url !== '') : ?>
                                <a href="<?php echo esc_url($orisa_marquee_url); ?>"<?php echo $orisa_marquee_target; ?>><?php echo $orisa_marquee_img; ?></a>
                            <?php else : ?>
                                <?php echo $orisa_marquee_img; ?>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php else : ?>
    <?php if (have_rows('items')) : ?>
        <div class="at-brand-area at_fade_anim container-2200"<?php echo orisa_anchor(); ?>>
            <div class="carouselTicker carouselTicker-right position-relative z-1">
                <ul class="carouselTicker__list scroll-move-right">
                    <?php while (have_rows('items')) : the_row(); ?>
                        <?php
                        $orisa_marquee_img = orisa_img(get_sub_field('image'), 'full', ['alt' => 'logo-brand']);
                        if ($orisa_marquee_img === '') {
                            continue;
                        }
                        $orisa_marquee_link = get_sub_field('link');
                        $orisa_marquee_url = (is_array($orisa_marquee_link) && !empty($orisa_marquee_link['url'])) ? $orisa_marquee_link['url'] : '';
                        $orisa_marquee_target = (is_array($orisa_marquee_link) && !empty($orisa_marquee_link['target'])) ? ' target="' . esc_attr($orisa_marquee_link['target']) . '" rel="noopener"' : '';
                        ?>
                        <li class="carouselTicker__item">
                            <div class="brand-item dark-mode-invert">
                                <?php if ($orisa_marquee_url !== '') : ?>
                                    <a href="<?php echo esc_url($orisa_marquee_url); ?>"<?php echo $orisa_marquee_target; ?>><?php echo $orisa_marquee_img; ?></a>
                                <?php else : ?>
                                    <?php echo $orisa_marquee_img; ?>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

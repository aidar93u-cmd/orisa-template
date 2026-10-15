<?php
defined('ABSPATH') || exit;

/**
 * Первый экран — Главная 7 (index-7.html, строки 575-709).
 * Разметка 1:1. Динамика: плашка-повторитель, фото VR, координаты,
 * теги-ссылки (Link), заголовок, подзаголовок, кнопка (Link),
 * аватары-повторитель, две строки соцдоказательства.
 * Тумблер matter_fx ставит флаг скрипта matter.js.
 */
$coords = get_sub_field('coords');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$hero_image = get_sub_field('hero_image');
$cta = get_sub_field('cta_button');
$cta_url = is_array($cta) && !empty($cta['url']) ? $cta['url'] : '';
$cta_title = is_array($cta) && !empty($cta['title']) ? $cta['title'] : '';
$proof_first = get_sub_field('proof_first');
$proof_second = get_sub_field('proof_second');
$has_avatars = have_rows('avatars');
if (get_sub_field('matter_fx')) {
    orisa_flag_script('matter');
}
?>
<!--Home 7 Section 1 (Hero - Advancing Startup Innovation)-->
<div class="sec-1-home-7 p-relative z-index-1 overflow-hidden"<?php echo orisa_anchor(); ?>>
    <!-- Split background: vermilion (left) + maroon (right) -->
    <div class="sec-1-home-7__bg d-flex">
        <div class="sec-1-home-7__bg-left"></div>
        <div class="sec-1-home-7__bg-right"></div>
    </div>

    <!-- Decorative 8-point asterisk sitting on the split -->
    <div class="sec-1-home-7__star d-none d-lg-flex">
        <img class="at-scroll-rotate" data-rotate-duration="18" data-rotate-sensitivity="0.18" data-rotate-boost="12" src="<?php echo esc_url(ORISA_URI . '/assets/imgs/pages/home-7/star-asterisk.svg'); ?>" alt="decorative star" />
    </div>

    <div class="sec-1-home-7__img-wrap">
        <div class="anim-zoomin">
            <?php echo orisa_img($hero_image, 'full', ['class' => 'sec-1-home-7__img']); ?>
        </div>
    </div>

    <div class="container-fluid p-relative">
        <div class="row g-0 align-items-stretch">
            <!-- LEFT: Hero image + overlays -->
            <div class="col-lg-6 p-relative sec-1-home-7__left">
                <!-- Coordinates pinned below the header -->
                <?php if ($coords) : ?>
                    <div class="sec-1-home-7__coords d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="17" viewBox="0 0 27 20" fill="none">
                            <path d="M13.3203 20C5.9637 20 0 15.5228 0 10C0 4.47715 5.9637 0 13.3203 0C20.6769 0 26.6406 4.47715 26.6406 10C26.6406 15.5228 20.6769 20 13.3203 20ZM10.27 17.6674C8.98779 15.6259 8.20174 13.3742 8.02857 11H2.7465C3.27413 14.1765 6.28238 16.7747 10.27 17.6674ZM10.6971 11C10.8975 13.4388 11.8255 15.7297 13.3203 17.752C14.8151 15.7297 15.7431 13.4388 15.9435 11H10.6971ZM23.8941 11H18.6121C18.4389 13.3742 17.6529 15.6259 16.3707 17.6674C20.3582 16.7747 23.3665 14.1765 23.8941 11ZM2.7465 9H8.02857C8.20174 6.62577 8.98779 4.37407 10.27 2.33256C6.28238 3.22533 3.27413 5.8235 2.7465 9ZM10.6971 9H15.9435C15.7431 6.56122 14.8151 4.27025 13.3203 2.24799C11.8255 4.27025 10.8975 6.56122 10.6971 9ZM16.3707 2.33256C17.6529 4.37407 18.4389 6.62577 18.6121 9H23.8941C23.3665 5.8235 20.3582 3.22533 16.3707 2.33256Z" fill="currentColor" />
                        </svg>
                        <span class="fw-500 text-uppercase text-scramble" data-scramble-text="<?php echo esc_attr($coords); ?>"><?php echo esc_html($coords); ?></span>
                    </div>
                <?php endif; ?>

                <!-- Tag chips pinned above the image bottom -->
                <?php if (have_rows('tags')) : ?>
                    <div class="sec-1-home-7__tags d-flex flex-wrap gap-2">
                        <?php $orisa_h7_tag_i = 0; ?>
                        <?php while (have_rows('tags')) : the_row(); ?>
                            <?php $tag_link = get_sub_field('link'); ?>
                            <?php if (!is_array($tag_link) || empty($tag_link['url'])) { continue; } ?>
                            <?php $orisa_h7_tag_i++; ?>
                            <?php $tag_title = !empty($tag_link['title']) ? $tag_link['title'] : $tag_link['url']; ?>
                            <a href="<?php echo esc_url($tag_link['url']); ?>" class="sec-1-home-7__tag at_fade_anim" data-start="100%" data-delay="<?php echo esc_attr(number_format(0.1 * $orisa_h7_tag_i, 1, '.', '')); ?>">
                                <span><?php echo esc_html($tag_title); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="10" viewBox="0 0 9 10" fill="none">
                                    <path d="M5.62494 9.99994L0.562517 10L0.5625 8.75003L4.49994 8.74996L4.5 2.39273L2.27828 4.86124L1.48278 3.97739L5.0625 0L8.64225 3.97739L7.84676 4.86124L5.625 2.3927L5.62494 9.99994Z" fill="currentColor" />
                                </svg>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- RIGHT: Copy + CTA -->
            <div class="col-lg-6 sec-1-home-7__right">
                <div class="sec-1-home-7__content">
                    <!-- [BUILD] [GROW] [SCALE] [BOOST] -->
                    <?php if (have_rows('brackets')) : ?>
                        <ul class="sec-1-home-7__brackets list-unstyled d-flex flex-wrap gap-4 mb-30">
                            <?php $orisa_h7_br_i = 0; ?>
                            <?php while (have_rows('brackets')) : the_row(); ?>
                                <?php $bracket = get_sub_field('text'); ?>
                                <?php if (!$bracket) { continue; } ?>
                                <?php $orisa_h7_br_i++; ?>
                                <li class="at_fade_anim" data-start="100%" data-delay="<?php echo esc_attr(number_format(0.1 * $orisa_h7_br_i, 1, '.', '')); ?>"><?php echo esc_html($bracket); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <!-- Headline with diagonal arrow -->
                    <div class="sec-1-home-7__headline-wrap p-relative">
                        <?php if ($title) : ?>
                            <h1 class="sec-1-home-7__headline text-white text-uppercase fw-700 mb-30 at_fade_anim" data-start="100%" data-delay="0.3">
                                <?php echo esc_html($title); ?>
                            </h1>
                        <?php endif; ?>
                        <span class="sec-1-home-7__headline-arrow-cover d-none d-md-inline-block">
                            <span class="sec-1-home-7__headline-arrow at_fade_anim" data-start="100%" data-delay="0.6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="53" viewBox="0 0 69 53" fill="none">
                                    <path d="M40.2 0L67.72 25.4267L69 26.7141L67.72 27.6797L40.2 53.1064L38.6 51.4971L64.2 27.6797H-59V25.4267H64.2L38.6 1.60928L40.2 0Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                    </div>

                    <!-- Description -->
                    <?php if ($subtitle) : ?>
                        <p class="sec-1-home-7__desc text-white mb-40 at_fade_anim" data-start="100%" data-delay="0.5">
                            <?php echo esc_html($subtitle); ?>
                        </p>
                    <?php endif; ?>

                    <!-- Primary CTA + icon bubble -->
                    <?php if ($cta_url !== '' && $cta_title !== '') : ?>
                        <div class="sec-1-home-7__cta d-flex align-items-center flex-wrap gap-2 mb-60">
                            <a href="<?php echo esc_url($cta_url); ?>" class="sec-1-home-7__cta-btn at_fade_anim" data-start="100%" data-delay="0.3">
                                <span><?php echo esc_html($cta_title); ?></span>
                            </a>
                            <a href="<?php echo esc_url($cta_url); ?>" class="sec-1-home-7__cta-arrow" aria-label="<?php echo esc_attr($cta_title); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 11 11" fill="none">
                                    <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>

                    <!-- Social proof: avatar stack + copy -->
                    <?php if ($has_avatars || $proof_first || $proof_second) : ?>
                        <div class="sec-1-home-7__proof d-flex align-items-center flex-wrap gap-3">
                            <?php if ($has_avatars) : ?>
                                <div class="sec-1-home-7__avatars">
                                    <?php $orisa_h7_av_i = 0; ?>
                                    <?php while (have_rows('avatars')) : the_row(); ?>
                                        <?php $avatar = get_sub_field('avatar'); ?>
                                        <?php if (!$avatar) { continue; } ?>
                                        <?php $orisa_h7_av_i++; ?>
                                        <span class="sec-1-home-7__avatar at_fade_anim" data-start="100%" data-delay="<?php echo esc_attr(number_format(0.1 * $orisa_h7_av_i, 1, '.', '')); ?>">
                                            <?php echo orisa_img($avatar); ?>
                                        </span>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($proof_first || $proof_second) : ?>
                                <p class="sec-1-home-7__proof-text text-white fw-700 mb-0 at_fade_anim" data-start="100%" data-delay="0.6">
                                    <?php echo esc_html((string) $proof_first); ?><?php if ($proof_first && $proof_second) : ?> <br class="d-none d-xl-inline" /><?php endif; ?><?php echo esc_html((string) $proof_second); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

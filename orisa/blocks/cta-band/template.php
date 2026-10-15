<?php
defined('ABSPATH') || exit;

/**
 * Призыв к действию (services-details-4.html, SD4 — CTA, строки 730-751).
 * Разметка 1:1 (.sd4-cta, .sd4-cta__band: классы, data-*, вложенность, SVG — дословно).
 * Динамика: заголовок, текст, кнопка (Link), фон (Image ID → data-background, приём из hero-home-4).
 * Пустые поля гасят свои теги; обёртки section/container/band остаются (стили + data-хуки JS).
 * .sd4-next здесь нет: это межстраничная навигация, она принадлежит блоку service-details (см. BLOCKS.md).
 */
$title = get_sub_field('title');
$text = get_sub_field('text');
$button = get_sub_field('button');
$bg_url = orisa_img_url(get_sub_field('background'), 'full');
?>
<section class="sd4-cta pt-40 pb-120" data-sd4-cta<?php echo orisa_anchor(); ?>>
    <div class="container">
        <div class="sd4-cta__band" data-sd4-cta-band<?php echo $bg_url !== '' ? ' data-background="' . esc_url($bg_url) . '"' : ''; ?>>
            <div>
                <p class="sd4-label mb-15">[04] Engage</p>
                <?php if ($title !== '') : ?>
                    <h2 class="sd4-cta__title text-scale-anim-2 mb-0"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
            <div class="sd4-cta__side">
                <?php if ($text !== '') : ?>
                    <p><?php echo esc_html($text); ?></p>
                <?php endif; ?>
                <?php if (is_array($button) && !empty($button['url'])) : ?>
                    <a class="at-btn rounded-0" href="<?php echo esc_url($button['url']); ?>"<?php echo !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '" rel="noopener"' : ''; ?>>
                        <span><span class="text-1"><?php echo esc_html(isset($button['title']) ? $button['title'] : ''); ?></span><span class="text-2"><?php echo esc_html(isset($button['title']) ? $button['title'] : ''); ?></span></span>
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                                <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                            </svg>
                        </i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

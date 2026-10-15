<?php
defined('ABSPATH') || exit;

/**
 * Тарифы (база: pricing-3.html, строки 566-665 сетка + 667-824 отзывы).
 * Разметка 1:1 с оригиналом: классы, data-атрибуты слайдера
 * (data-pricing3-testimonial, data-slide, data-prev, data-next) — дословно
 * (на них завязан assets/js/pricing-3.js).
 * Пустые поля не выводят свои теги; обёртки слайдера выводятся всегда.
 * Первый отзыв активен (is-active без hidden), остальные скрыты — как в оригинале.
 * Весь вывод экранирован: esc_html для текста, esc_url для ссылок, orisa_img для фото.
 */
orisa_flag_script('pricing-3');
?>
<!-- Pricing 3 / Section 1 — Minimal plan grid -->
<section class="pricing-3-plans pt-150 pb-80" aria-label="Pricing plans"<?php echo orisa_anchor(); ?>>
    <div class="container">
        <header class="pricing-3-label">
            <span class="pricing-3-label__left">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none" aria-hidden="true">
                    <path d="M5 0L6.18 3.82L10 5L6.18 6.18L5 10L3.82 6.18L0 5L3.82 3.82L5 0Z" fill="currentColor" />
                </svg>
                (04)
            </span>
            <span class="pricing-3-label__center">(Pricing)</span>
            <span class="pricing-3-label__right">© 2026</span>
        </header>

        <?php if (have_rows('plans')) : ?>
            <div class="pricing-3-grid">
                <?php while (have_rows('plans')) : the_row(); ?>
                    <?php
                    $plan_name = get_sub_field('name');
                    $plan_desc = get_sub_field('desc');
                    $plan_price = get_sub_field('price');
                    $plan_currency = get_sub_field('currency');
                    $plan_period = get_sub_field('period');
                    $plan_button = get_sub_field('button');
                    $plan_featured = (bool) get_sub_field('featured');
                    $has_features = have_rows('features');
                    if ($plan_name === '' && $plan_price === '' && !$has_features) {
                        continue;
                    }
                    $btn_url = is_array($plan_button) && !empty($plan_button['url']) ? $plan_button['url'] : '';
                    $btn_title = is_array($plan_button) && isset($plan_button['title']) && $plan_button['title'] !== '' ? $plan_button['title'] : 'Start this plan';
                    $btn_target = is_array($plan_button) && !empty($plan_button['target']) ? $plan_button['target'] : '';
                    ?>
                    <article class="pricing-3-card<?php echo $plan_featured ? ' pricing-3-card--dark' : ''; ?>">
                        <?php if ($plan_name !== '') : ?>
                            <h2 class="pricing-3-card__name"><?php echo esc_html($plan_name); ?></h2>
                        <?php endif; ?>
                        <?php if ($plan_desc !== '') : ?>
                            <p class="pricing-3-card__desc"><?php echo esc_html($plan_desc); ?></p>
                        <?php endif; ?>
                        <?php if ($plan_price !== '') : ?>
                            <div class="pricing-3-card__price">
                                <?php if ($plan_currency !== '') : ?>
                                    <span class="pricing-3-card__currency"><?php echo esc_html($plan_currency); ?></span>
                                <?php endif; ?>
                                <span class="pricing-3-card__value"><?php echo esc_html($plan_price); ?></span>
                                <?php if ($plan_period !== '') : ?>
                                    <span class="pricing-3-card__period"><?php echo esc_html($plan_period); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($btn_url !== '') : ?>
                            <a class="pricing-3-card__cta" href="<?php echo esc_url($btn_url); ?>"<?php echo $btn_target !== '' ? ' target="' . esc_attr($btn_target) . '" rel="noopener"' : ''; ?>>
                                <span class="pricing-3-card__cta-text"><?php echo esc_html($btn_title); ?></span>
                                <span class="pricing-3-card__cta-line" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path d="M2 10L10 2M10 2H4M10 2V8" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        <?php endif; ?>
                        <?php if ($has_features) : ?>
                            <h3 class="pricing-3-card__included">What you get</h3>
                            <ul class="pricing-3-card__features">
                                <?php while (have_rows('features')) : the_row(); ?>
                                    <?php $feature = get_sub_field('item'); ?>
                                    <?php if ($feature === '') {
                                        continue;
                                    } ?>
                                    <li><?php echo esc_html($feature); ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Pricing 3 / Section 2 — Testimonial -->
<section class="pricing-3-testimonial pt-40 pb-120" aria-label="Client testimonials" data-pricing3-testimonial>
    <div class="container">
        <header class="pricing-3-label">
            <span class="pricing-3-label__left">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none" aria-hidden="true">
                    <path d="M5 0L6.18 3.82L10 5L6.18 6.18L5 10L3.82 6.18L0 5L3.82 3.82L5 0Z" fill="currentColor" />
                </svg>
                (05)
            </span>
            <span class="pricing-3-label__center">(Testimonial)</span>
            <span class="pricing-3-label__right">© 2026</span>
        </header>

        <?php if (have_rows('testimonials')) : ?>
            <div class="pricing-3-testimonial__viewport">
                <?php $orisa_pricing_i = 0; ?>
                <?php while (have_rows('testimonials')) : the_row(); ?>
                    <?php
                    $t_photo = get_sub_field('photo');
                    $t_quote = get_sub_field('quote');
                    $t_avatar = get_sub_field('avatar');
                    $t_name = get_sub_field('name');
                    $t_role = get_sub_field('role');
                    $has_stats = have_rows('stats');
                    if ($t_quote === '' && $t_name === '' && !$t_photo) {
                        continue;
                    }
                    $orisa_pricing_i++;
                    $orisa_pricing_active = ($orisa_pricing_i === 1);
                    ?>
                    <article class="pricing-3-t-slide<?php echo $orisa_pricing_active ? ' is-active' : ''; ?>" data-slide<?php echo $orisa_pricing_active ? '' : ' hidden'; ?>>
                        <?php if ($t_photo) : ?>
                            <div class="pricing-3-t-slide__media">
                                <?php echo orisa_img($t_photo, 'full', ['alt' => 'Client portrait', 'loading' => 'lazy']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($t_quote !== '') : ?>
                            <blockquote class="pricing-3-t-slide__quote">
                                <p><?php echo esc_html($t_quote); ?></p>
                            </blockquote>
                        <?php endif; ?>
                        <div class="pricing-3-t-slide__foot">
                            <div class="pricing-3-t-slide__nav" role="group" aria-label="Testimonial navigation">
                                <button type="button" class="pricing-3-nav-btn" data-prev aria-label="Previous testimonial">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                                        <path d="M8.5 3L4.5 7L8.5 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button type="button" class="pricing-3-nav-btn" data-next aria-label="Next testimonial">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                                        <path d="M5.5 3L9.5 7L5.5 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <?php if ($t_name !== '' || $t_role !== '' || $t_avatar) : ?>
                                <div class="pricing-3-t-slide__author">
                                    <?php echo orisa_img($t_avatar, 'thumbnail', ['class' => 'pricing-3-t-slide__avatar', 'alt' => '', 'loading' => 'lazy']); ?>
                                    <div>
                                        <?php if ($t_name !== '') : ?>
                                            <p class="pricing-3-t-slide__name"><?php echo esc_html($t_name); ?></p>
                                        <?php endif; ?>
                                        <?php if ($t_role !== '') : ?>
                                            <p class="pricing-3-t-slide__role"><?php echo esc_html($t_role); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($has_stats) : ?>
                                <div class="pricing-3-t-slide__stats">
                                    <?php while (have_rows('stats')) : the_row(); ?>
                                        <?php
                                        $stat_value = get_sub_field('value');
                                        $stat_label = get_sub_field('label');
                                        $stat_note = get_sub_field('note');
                                        if ($stat_value === '' && $stat_label === '' && $stat_note === '') {
                                            continue;
                                        }
                                        ?>
                                        <div class="pricing-3-stat">
                                            <?php if ($stat_value !== '') : ?>
                                                <span class="pricing-3-stat__value"><?php echo esc_html($stat_value); ?></span>
                                            <?php endif; ?>
                                            <div>
                                                <?php if ($stat_label !== '') : ?>
                                                    <p class="pricing-3-stat__label"><?php echo esc_html($stat_label); ?></p>
                                                <?php endif; ?>
                                                <?php if ($stat_note !== '') : ?>
                                                    <p class="pricing-3-stat__note"><?php echo esc_html($stat_note); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

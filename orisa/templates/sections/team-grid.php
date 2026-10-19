<?php
defined('ABSPATH') || exit;

/**
 * Команда сеткой (база: index.html, строки 1593-1738: #team.sec-8-home-7).
 * Разметка 1:1 с оригиналом: классы-обёртки, data-* анимаций, вложенность — дословно.
 * Пустые поля не выводят свои теги; картинки через orisa_img(); весь вывод экранирован.
 * Левая колонка — eyebrow + заголовок + описание + CTA; правая — сетка из 2 колонок,
 * вторая со сдвигом (sec-8-home-7__col--offset), деление пополам с сохранением порядка.
 * Карточка — ссылка целиком, если задана; иначе div. Бейдж-стрелка — статичный декор.
 */
$eyebrow = get_sub_field('eyebrow');
$title = get_sub_field('title');
$desc = get_sub_field('desc');
$button = get_sub_field('button');
$btn_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$btn_title = is_array($button) && isset($button['title']) ? $button['title'] : '';

// Сотрудники — всегда посты команды (CPT team), ручного ввода нет.
$orisa_tg_members = function_exists('orisa_team_posts') ? orisa_team_posts(8) : [];
$orisa_tg_half = (int) ceil(count($orisa_tg_members) / 2);
$orisa_tg_col1 = array_slice($orisa_tg_members, 0, $orisa_tg_half);
$orisa_tg_col2 = array_slice($orisa_tg_members, $orisa_tg_half);
?>
<div class="sec-8-home-7 p-relative bg-neutral-0"<?php echo orisa_anchor(); ?>>
    <div class="container-2200 px-lg-5 px-3">
        <div class="row g-0 align-items-start">
            <div class="col-xl-5 col-lg-5 col-12 sec-8-home-7__lead">
                <?php if ($eyebrow) : ?>
                    <span class="sec-8-home-7__eyebrow d-inline-flex align-items-center gap-2 mb-4 text-uppercase">
                        <span class="text-scramble" data-scramble-text="<?php echo esc_attr($eyebrow); ?>"><?php echo esc_html($eyebrow); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                            <path d="M11.0037 3.41421L2.39712 12.0208L0.98291 10.6066L9.5895 2H2.00373V0H13.0037V11H11.0037V3.41421Z" fill="currentColor" />
                        </svg>
                    </span>
                <?php endif; ?>
                <?php if ($title) : ?>
                    <h2 class="sec-8-home-7__heading mb-40 reveal-text"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if ($desc) : ?>
                    <p class="sec-8-home-7__desc mb-40 reveal-text"><?php echo esc_html($desc); ?></p>
                <?php endif; ?>
                <?php if ($btn_url !== '') : ?>
                    <div class="sec-4-home-7__cta d-inline-flex align-items-stretch mb-60 at_fade_anim">
                        <a href="<?php echo esc_url($btn_url); ?>" class="at-btn sec-4-home-7__cta-btn text-capitalize">
                            <span>
                                <span class="text-1"><?php echo esc_html($btn_title); ?></span>
                                <span class="text-2"><?php echo esc_html($btn_title); ?></span>
                            </span>
                        </a>
                        <a href="<?php echo esc_url($btn_url); ?>" class="sec-4-home-7__cta-circle d-inline-flex align-items-center justify-content-center text-white" aria-label="<?php echo esc_attr($btn_title !== '' ? $btn_title : get_bloginfo('name')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M7 17L17 7M17 7H9M17 7V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($orisa_tg_members !== []) : ?>
                <div class="col-xl-7 col-lg-7 col-12 mt-5 mt-lg-0">
                    <div class="sec-8-home-7__grid">
                        <div class="sec-8-home-7__col">
                            <?php foreach ($orisa_tg_col1 as $orisa_tg_m) : ?>
                                <?php
                                $orisa_tg_tag = $orisa_tg_m['url'] !== '' ? 'a' : 'div';
                                $orisa_tg_alt = $orisa_tg_m['name'] ? $orisa_tg_m['name'] : get_bloginfo('name');
                                $orisa_tg_label = trim(($orisa_tg_m['name'] ? $orisa_tg_m['name'] : '') . ($orisa_tg_m['role'] ? ' — ' . $orisa_tg_m['role'] : ''));
                                ?>
                                <<?php echo $orisa_tg_tag; ?><?php echo $orisa_tg_m['url'] !== '' ? ' href="' . esc_url($orisa_tg_m['url']) . '"' : ''; ?> class="sec-8-home-7__card"<?php echo ($orisa_tg_tag === 'a' && $orisa_tg_label !== '') ? ' aria-label="' . esc_attr($orisa_tg_label) . '"' : ''; ?>>
                                    <?php if ($orisa_tg_m['photo']) : ?>
                                        <div class="sec-8-home-7__photo">
                                            <div class="fix anim-zoomin">
                                                <?php echo orisa_img($orisa_tg_m['photo'], 'full', ['alt' => $orisa_tg_alt]); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <span class="sec-8-home-7__badge<?php echo $orisa_tg_m['dark'] ? ' sec-8-home-7__badge--dark' : ''; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                            <path d="M12.57 3.905L2.74 13.74 1.26 12.26 11.095 2.43 2.29 2.43V0.33L14.42 0.33V12.46H12.32L12.57 3.905Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <?php if ($orisa_tg_m['name'] || $orisa_tg_m['role']) : ?>
                                        <div class="sec-8-home-7__info">
                                            <?php if ($orisa_tg_m['name']) : ?>
                                                <h3 class="sec-8-home-7__name mb-0 at_fade_anim"><?php echo esc_html($orisa_tg_m['name']); ?></h3>
                                            <?php endif; ?>
                                            <?php if ($orisa_tg_m['role']) : ?>
                                                <p class="sec-8-home-7__role mb-0 at_fade_anim" data-delay="0.1"><?php echo esc_html($orisa_tg_m['role']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </<?php echo $orisa_tg_tag; ?>>
                            <?php endforeach; ?>
                        </div>
                        <div class="sec-8-home-7__col sec-8-home-7__col--offset">
                            <?php foreach ($orisa_tg_col2 as $orisa_tg_m) : ?>
                                <?php
                                $orisa_tg_tag = $orisa_tg_m['url'] !== '' ? 'a' : 'div';
                                $orisa_tg_alt = $orisa_tg_m['name'] ? $orisa_tg_m['name'] : get_bloginfo('name');
                                $orisa_tg_label = trim(($orisa_tg_m['name'] ? $orisa_tg_m['name'] : '') . ($orisa_tg_m['role'] ? ' — ' . $orisa_tg_m['role'] : ''));
                                ?>
                                <<?php echo $orisa_tg_tag; ?><?php echo $orisa_tg_m['url'] !== '' ? ' href="' . esc_url($orisa_tg_m['url']) . '"' : ''; ?> class="sec-8-home-7__card"<?php echo ($orisa_tg_tag === 'a' && $orisa_tg_label !== '') ? ' aria-label="' . esc_attr($orisa_tg_label) . '"' : ''; ?>>
                                    <?php if ($orisa_tg_m['photo']) : ?>
                                        <div class="sec-8-home-7__photo">
                                            <div class="fix anim-zoomin">
                                                <?php echo orisa_img($orisa_tg_m['photo'], 'full', ['alt' => $orisa_tg_alt]); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <span class="sec-8-home-7__badge<?php echo $orisa_tg_m['dark'] ? ' sec-8-home-7__badge--dark' : ''; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                            <path d="M12.57 3.905L2.74 13.74 1.26 12.26 11.095 2.43 2.29 2.43V0.33L14.42 0.33V12.46H12.32L12.57 3.905Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <?php if ($orisa_tg_m['name'] || $orisa_tg_m['role']) : ?>
                                        <div class="sec-8-home-7__info">
                                            <?php if ($orisa_tg_m['name']) : ?>
                                                <h3 class="sec-8-home-7__name mb-0 at_fade_anim"><?php echo esc_html($orisa_tg_m['name']); ?></h3>
                                            <?php endif; ?>
                                            <?php if ($orisa_tg_m['role']) : ?>
                                                <p class="sec-8-home-7__role mb-0 at_fade_anim" data-delay="0.1"><?php echo esc_html($orisa_tg_m['role']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </<?php echo $orisa_tg_tag; ?>>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

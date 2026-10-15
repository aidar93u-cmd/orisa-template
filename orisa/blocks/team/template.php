<?php
defined('ABSPATH') || exit;

/**
 * Команда (база: team.html, строки 583-748: .at-banner-thumb + .home-3-section-9).
 * Шапка .sec-1-services (строки 567-582) не дублируется — её покрывает блок page-hero.
 * Разметка 1:1 с оригиналом: классы-обёртки, data-* анимаций, вложенность — дословно.
 * Пустые поля не выводят свои теги; картинки через orisa_img(); весь вывод экранирован.
 * Stagger-класс pt-md-5 у нечётных карточек — как в оригинале (1-я и 3-я).
 */
$badge = get_sub_field('badge');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$button = get_sub_field('button');
$banner = get_sub_field('banner');
$btn_url = is_array($button) && !empty($button['url']) ? $button['url'] : '';
$btn_title = is_array($button) && isset($button['title']) ? $button['title'] : '';
?>
<?php if ($banner) : ?>
    <div class="at-banner-thumb overflow-hidden scale-up-img">
        <?php echo orisa_img($banner, 'full', ['class' => 'img-cover scale-up', 'data-speed' => '.4', 'alt' => get_bloginfo('name')]); ?>
    </div>
<?php endif; ?>
<div class="home-3-section-9 p-relative"<?php echo orisa_anchor(); ?>>
    <div class="position-absolute w-100 h-100 d-grid top-0 md:grid-cols-7 gap-0 z-n1 opacity-10">
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 border-r border-dark/01 md:border-none">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            <div class="absolute top-[20%] left-0 right-0 h-[30%] bg-gradient-to-b from-white/5 to-transparent pointer-events-none"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
        <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
            <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
        </div>
    </div>
    <div class="pt-120 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <?php if ($badge) : ?>
                        <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1"><?php echo esc_html($badge); ?></span>
                                <span class="text-2"><?php echo esc_html($badge); ?></span>
                            </span>
                            <i>
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor"></path>
                                </svg>
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor"></path>
                                </svg>
                            </i>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="col-lg-5 h-100">
                    <?php if ($title) : ?>
                        <h1 class="section-title fw-500 fz-ds-1 lh-1 reveal-text"><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>
                </div>
                <div class="col-lg-5 ms-auto">
                    <?php if ($subtitle) : ?>
                        <p class="fz-font-3xl mb-4"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>
                    <?php if ($btn_url !== '') : ?>
                        <div class="at-btn-group at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                            <a class="at-btn-circle" href="<?php echo esc_url($btn_url); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                </svg>
                            </a>
                            <?php if ($btn_title !== '') : ?>
                                <a class="at-btn z-index-1" href="<?php echo esc_url($btn_url); ?>"><?php echo esc_html($btn_title); ?></a>
                            <?php endif; ?>
                            <a class="at-btn-circle" href="<?php echo esc_url($btn_url); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                    <path d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z" fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (have_rows('members')) : ?>
                <div class="row pt-80 g-4">
                    <?php $orisa_team_i = 0; ?>
                    <?php while (have_rows('members')) : the_row(); ?>
                        <?php
                        $m_photo = get_sub_field('photo');
                        $m_name = get_sub_field('name');
                        $m_role = get_sub_field('role');
                        $m_link = get_sub_field('link');
                        $m_url = is_array($m_link) && !empty($m_link['url']) ? $m_link['url'] : '';
                        if (empty($m_photo) && !$m_name && !$m_role && !$m_url) {
                            continue;
                        }
                        $orisa_team_i++;
                        $orisa_team_col = ($orisa_team_i % 2 === 1) ? 'col-lg-3 col-md-6 pt-md-5 changeless' : 'col-lg-3 col-md-6 changeless';
                        $m_alt = $m_name ? $m_name : get_bloginfo('name');
                        ?>
                        <div class="<?php echo esc_attr($orisa_team_col); ?>">
                            <div class="team-card">
                                <?php if ($m_photo) : ?>
                                    <div class="team-card-image">
                                        <div class="anim-zoomin">
                                            <?php echo orisa_img($m_photo, 'full', ['class' => 'img-cover', 'alt' => $m_alt]); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($m_url !== '') : ?>
                                    <a href="<?php echo esc_url($m_url); ?>" class="team-card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                            <path d="M7.85986 2.43872L1.7123 8.58629L0.702148 7.57614L6.84971 1.42857H1.43131V0H9.28843V7.85714H7.85986V2.43872Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <div class="team-card-content">
                                    <?php if ($m_name) : ?>
                                        <?php if ($m_url !== '') : ?>
                                            <a href="<?php echo esc_url($m_url); ?>" class="team-card-name">
                                                <h2 class="h6 fz-font-2xl"><?php echo esc_html($m_name); ?></h2>
                                            </a>
                                        <?php else : ?>
                                            <span class="team-card-name">
                                                <h2 class="h6 fz-font-2xl"><?php echo esc_html($m_name); ?></h2>
                                            </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if ($m_role) : ?>
                                        <p class="team-card-position fz-font-sm m-0 common-white"><?php echo esc_html($m_role); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 order-5">
                    <div class="d-flex flex-wrap align-items-center justify-content-lg-between justify-content-center pb-50 pt-50 gap-md-4 gap-2 at_fade_anim" data-fade-from="bottom" data-duration="2">
                        <p class="neutral-900 mb-0">[ Conversion-focused ]</p>
                        <p class="neutral-900 mb-0">[ Data-driven ]</p>
                        <p class="neutral-900 mb-0">[ Built for scale ]</p>
                        <p class="neutral-900 mb-0">[ User-centric ]</p>
                        <p class="neutral-900 mb-0">[Future-proof]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

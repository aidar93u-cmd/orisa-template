<?php
defined('ABSPATH') || exit;
?>
    <!-- at-offcanvus-area-start -->
    <div class="at-offcanvas-area">
        <div class="at-offcanvas">
            <div class="at-offcanvas-top d-flex align-items-center justify-content-between">
                <div class="at-offcanvas-logo">
                    <a href="index.html">
                        <?php echo orisa_img(function_exists('get_field') ? get_field('logo_light', 'option') : 0, 'full', ['data-width' => '30', 'alt' => get_bloginfo('name')]); ?>
                        <p class="h6 fw-700 fz-24 mb-0"><?php echo orisa_text(function_exists('get_field') ? get_field('site_name_text', 'option') : ''); ?></p>
                    </a>
                </div>
                <div class="at-offcanvas-close-btn">
                    <button class="close-btn">
                        <svg width="37" height="38" viewBox="0 0 37 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.19141 9.80762L27.5762 28.1924" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.19141 28.1924L27.5762 9.80761" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="at-offcanvas-content d-none d-xl-block">
                <h3 class="at-offcanvas-title"><?php echo orisa_text(function_exists('get_field') ? get_field('offcanvas_title', 'option') : ''); ?></h3>
                <?php $off_text = function_exists('get_field') ? get_field('offcanvas_text', 'option') : ''; ?>
                <?php if ($off_text) : ?><p class="fz-font-lg"><?php echo esc_html($off_text); ?></p><?php endif; ?>
            </div>
            <div class="at-offcanvas-menu d-xl-none pb-50">
                <nav></nav>
            </div>
            <div class="at-offcanvas-gallery d-none d-xl-block">
                <?php if (function_exists('have_rows') && have_rows('offcanvas_gallery', 'option')) : ?>
                <div class="sec-2-home-5__avatars-row d-flex gap-2">
                    <?php while (have_rows('offcanvas_gallery', 'option')) : the_row(); ?>
                    <div class="sec-2-home-5__avatar-sm at-offcanvas-gallery-img">
                        <?php echo orisa_img(get_sub_field('image'), 'full', ['class' => 'img-cover', 'alt' => get_bloginfo('name')]); ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="at-offcanvas-contact">
                <?php $off_ct = function_exists('get_field') ? get_field('offcanvas_contact_title', 'option') : ''; ?>
                <?php if ($off_ct) : ?><h4 class="h5 at-offcanvas-title sm"><?php echo esc_html($off_ct); ?></h4><?php endif; ?>
                <ul>
                    <?php $ph = function_exists('get_field') ? get_field('phone', 'option') : ''; $ph_h = function_exists('get_field') ? get_field('phone_href', 'option') : ''; ?>
                    <?php if ($ph) : ?><li><a class="fz-font-lg" href="<?php echo esc_attr($ph_h ? $ph_h : 'tel:' . preg_replace('/[^+0-9]/', '', $ph)); ?>"><?php echo esc_html($ph); ?></a></li><?php endif; ?>
                    <?php $wa = function_exists('get_field') ? get_field('whatsapp_url', 'option') : ''; ?>
                    <?php if ($wa) : ?><li><a class="fz-font-lg" href="<?php echo esc_url($wa); ?>" target="_blank">WhatsApp · Telegram · MAX</a></li><?php endif; ?>
                    <?php $addr = function_exists('get_field') ? get_field('address', 'option') : ''; ?>
                    <?php if ($addr) : ?><li>
                        <a class="fz-font-lg" href="#">
                            <?php echo nl2br(esc_html($addr)); ?>
                        </a>
                    </li><?php endif; ?>
                </ul>
            </div>
            <div class="at-offcanvas-social">
                <h3 class="at-offcanvas-title sm"><?php esc_html_e('Мы в соцсетях', 'orisa'); ?></h3>
                <ul class="at-offcanvas-social__grid">
                    <li>
                        <?php $u_soc_whatsapp = function_exists('get_field') ? get_field('soc_whatsapp', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_whatsapp ? esc_url($u_soc_whatsapp) : '#'; ?>" class="at-offcanvas-social__link" aria-label="WhatsApp">
                            <?php echo orisa_soc_icon('whatsapp'); ?>
                            <span>WhatsApp</span>
                        </a>
                    </li>
                    <li>
                        <?php $u_soc_telegram = function_exists('get_field') ? get_field('soc_telegram', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_telegram ? esc_url($u_soc_telegram) : '#'; ?>" class="at-offcanvas-social__link" aria-label="Telegram">
                            <?php echo orisa_soc_icon('telegram'); ?>
                            <span>Telegram</span>
                        </a>
                    </li>
                    <li>
                        <?php $u_soc_max = function_exists('get_field') ? get_field('soc_max', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_max ? esc_url($u_soc_max) : '#'; ?>" class="at-offcanvas-social__link" aria-label="MAX">
                            <?php echo orisa_soc_icon('max'); ?>
                            <span>MAX</span>
                        </a>
                    </li>
                    <li>
                        <?php $u_soc_2gis = function_exists('get_field') ? get_field('soc_2gis', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_2gis ? esc_url($u_soc_2gis) : '#'; ?>" class="at-offcanvas-social__link" aria-label="2ГИС">
                            <?php echo orisa_soc_icon('doublegis'); ?>
                            <span>2ГИС</span>
                        </a>
                    </li>
                    <li>
                        <?php $u_soc_yandex = function_exists('get_field') ? get_field('soc_yandex', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_yandex ? esc_url($u_soc_yandex) : '#'; ?>" class="at-offcanvas-social__link" aria-label="Яндекс Карты">
                            <?php echo orisa_soc_icon('yandex'); ?>
                            <span>Яндекс Карты</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- at-offcanvus-area-end -->

    <!-- offcanvas 2 start -->
    <div class="at-offcanvas-2-area">
        <div class="offcanvas-bg"></div>
        <div class="at-offcanvas-2-wrapper offcanvas-menu">
            <div class="at-offcanvas-2-left">
                <div class="at-header-logo d-flex justify-content-between align-items-center mb-50">
                    <a href="index.html">
                        <?php echo orisa_img(function_exists('get_field') ? get_field('logo_light', 'option') : 0, 'full', ['class' => 'dark-mode-invert', 'data-width' => '30', 'alt' => get_bloginfo('name')]); ?>
                        <p class="h6 fw-700 fz-24 mb-0"><?php echo orisa_text(function_exists('get_field') ? get_field('site_name_text', 'option') : ''); ?></p>
                    </a>
                    <span class="hamburger-close-btn">
                        <svg width="37" height="38" viewBox="0 0 37 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.19141 9.80762L27.5762 28.1924" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9.19141 28.1924L27.5762 9.80761" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="at-offcanvas-menu counter-row">
                    <nav></nav>
                </div>
                <div class="at-offcanvas-social">
                    <ul class="at-offcanvas-social__grid">
                        <li>
                            <?php $u_soc_whatsapp = function_exists('get_field') ? get_field('soc_whatsapp', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_whatsapp ? esc_url($u_soc_whatsapp) : '#'; ?>" class="at-offcanvas-social__link" aria-label="WhatsApp">
                            <?php echo orisa_soc_icon('whatsapp'); ?>
                                <span>WhatsApp</span>
                            </a>
                        </li>
                        <li>
                            <?php $u_soc_telegram = function_exists('get_field') ? get_field('soc_telegram', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_telegram ? esc_url($u_soc_telegram) : '#'; ?>" class="at-offcanvas-social__link" aria-label="Telegram">
                            <?php echo orisa_soc_icon('telegram'); ?>
                                <span>Telegram</span>
                            </a>
                        </li>
                        <li>
                            <?php $u_soc_max = function_exists('get_field') ? get_field('soc_max', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_max ? esc_url($u_soc_max) : '#'; ?>" class="at-offcanvas-social__link" aria-label="MAX">
                            <?php echo orisa_soc_icon('max'); ?>
                                <span>MAX</span>
                            </a>
                        </li>
                        <li>
                            <?php $u_soc_2gis = function_exists('get_field') ? get_field('soc_2gis', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_2gis ? esc_url($u_soc_2gis) : '#'; ?>" class="at-offcanvas-social__link" aria-label="2ГИС">
                            <?php echo orisa_soc_icon('doublegis'); ?>
                                <span>2ГИС</span>
                            </a>
                        </li>
                        <li>
                            <?php $u_soc_yandex = function_exists('get_field') ? get_field('soc_yandex', 'option') : ''; ?>
                        <a href="<?php echo $u_soc_yandex ? esc_url($u_soc_yandex) : '#'; ?>" class="at-offcanvas-social__link" aria-label="Яндекс Карты">
                            <?php echo orisa_soc_icon('yandex'); ?>
                                <span>Яндекс Карты</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <span class="hamburger-close-btn hamburger-mobile-close-btn d-md-none">Закрыть</span>
            </div>
        </div>
    </div>
    <!-- offcanvas 2 end -->
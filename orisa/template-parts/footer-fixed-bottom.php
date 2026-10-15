<?php
defined('ABSPATH') || exit;
?>
            <!-- Footer placeholder to maintain scroll height -->
            <div class="footer-placeholder"></div>
        </div>
        <!-- Footer 2 -->
        <footer class="footer-fixed-bottom bg-neutral-950 changeless">
            <div class="at-footer-area mp-footer-style mp-footer-style-2 pt-120 pb-0">
                <div class="container">
                    <!-- Top section: Logo + Contact | Nav | Follow Us + Social -->
                    <div class="row g-5 pb-md-5 pb-2">
                        <div class="col-lg-4">
                            <div class="d-flex flex-wrap align-items-start gap-5">
                                <div class="at-header-logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php echo orisa_img(function_exists('get_field') ? get_field('logo_dark', 'option') : 0, 'full', ['data-width' => '30', 'alt' => get_bloginfo('name')]); ?>
                                        <p class="h6 fw-700 text-white mb-0 fz-24"><?php echo orisa_text(function_exists('get_field') ? get_field('site_name_text', 'option') : ''); ?></p>
                                    </a>
                                </div>
                                <div class="d-flex flex-column gap-3">
                                    <?php $ph2 = function_exists('get_field') ? get_field('phone_secondary', 'option') : ''; ?>
                                     <?php if ($ph2) : ?><p class="h6 text-white mb-2 fw-medium"><?php echo esc_html($ph2); ?></p><?php endif; ?>
                                    <p class="h6 text-white mb-2">
                                        <?php $em = function_exists('get_field') ? get_field('emails', 'option') : ''; $em0 = (is_array($em) && isset($em[0]['email'])) ? $em[0]['email'] : ''; ?>
                                         <?php if ($em0) : ?><a href="<?php echo esc_attr('mailto:' . $em0); ?>" class="text-white text-decoration-none"><?php echo esc_html($em0); ?></a><?php endif; ?>
                                    </p>
                                    <?php $fa = function_exists('get_field') ? get_field('footer_address', 'option') : ''; ?>
                                    <?php if ($fa) : ?><p class="h6 text-white mb-0">
                                        <?php echo nl2br(esc_html($fa)); ?>
                                    </p><?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mx-auto">
                            <div class="at-footer-widget alt-footer-link-item-wrap row">
                                <div class="alt-footer-link-item col-6">
                                    <?php if (function_exists('have_rows') && have_rows('footer_menu_1', 'option')) : ?>
                                    <ul>
                                        <?php while (have_rows('footer_menu_1', 'option')) : the_row(); ?>
                                            <?php $l1 = get_sub_field('link'); ?>
                                            <?php if (is_array($l1) && !empty($l1['url'])) : ?>
                                                <li class="mb-15"><a href="<?php echo esc_url($l1['url']); ?>"><?php echo esc_html($l1['title'] !== '' ? $l1['title'] : $l1['url']); ?></a></li>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php endif; ?>
                                <div class="alt-footer-link-item col-6">
                                    <?php if (function_exists('have_rows') && have_rows('footer_menu_2', 'option')) : ?>
                                    <ul>
                                        <?php while (have_rows('footer_menu_2', 'option')) : the_row(); ?>
                                            <?php $l2 = get_sub_field('link'); ?>
                                            <?php if (is_array($l2) && !empty($l2['url'])) : ?>
                                                <li class="mb-15"><a href="<?php echo esc_url($l2['url']); ?>"><?php echo esc_html($l2['title'] !== '' ? $l2['title'] : $l2['url']); ?></a></li>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 flex-column justify-content-lg-end d-none d-md-flex">
                            <p class="footer-2-follow-label text-white opacity-50 text-uppercase small mb-3">Follow Us</p>
                            <div class="at-footer-widget at-footer-link">
                                <?php if (function_exists('have_rows') && have_rows('footer2_socials', 'option')) : ?>
                                <div class="at-hero-social">
                                    <?php while (have_rows('footer2_socials', 'option')) : the_row(); ?>
                                        <?php $sl = get_sub_field('link'); $sn = get_sub_field('name'); ?>
                                        <?php if (is_array($sl) && !empty($sl['url'])) : ?>
                                    <a href="<?php echo esc_url($sl['url']); ?>">
                                        <?php echo esc_html($sn !== '' ? $sn : ($sl['title'] !== '' ? $sl['title'] : $sl['url'])); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="10" viewBox="0 0 9 10" fill="none">
                                            <path d="M5.62494 9.99994L0.562517 10L0.5625 8.75003L4.49994 8.74996L4.5 2.39273L2.27828 4.86124L1.48278 3.97739L5.0625 0L8.64225 3.97739L7.84676 4.86124L5.625 2.3927L5.62494 9.99994Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="footer-2-border pt-40 pb-40">
                        <!-- Bottom section: Copyright | Let's Connect + Hours | Service tags -->
                        <div class="row align-items-end g-4">
                            <div class="col-lg-10 col-md-8">
                                <span class="at-footer-copyright"><?php echo orisa_copyright(function_exists('get_field') ? (string) get_field('copyright', 'option') : ''); ?></span>
                                <div class="at-title-anim overflow-hidden">
                                    <?php $ct = function_exists('get_field') ? get_field('footer2_connect_title', 'option') : ''; ?>
                                     <?php if ($ct) : ?><h2 class="footer-2-connect-title text-white mb-0 at-title-text text-scale-anim"><?php echo esc_html($ct); ?></h2><?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 text-end">
                                <div class="d-flex flex-wrap align-items-end gap-4 gap-md-5 mb-3">
                                    <div class="footer-2-hours text-white">
                                        <?php $hd = function_exists('get_field') ? get_field('footer2_hours_days', 'option') : ''; ?>
                                         <?php if ($hd) : ?><span class="d-block fz-font-md opacity-50"><?php echo esc_html($hd); ?></span><?php endif; ?>
                                        <?php $ht = function_exists('get_field') ? get_field('footer2_hours_time', 'option') : ''; ?>
                                         <?php if ($ht) : ?><h3 class="h5 fw-400 common-white"><?php echo esc_html($ht); ?></h3><?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row d-none d-md-block">
                            <div class="col-12">
                                <ul class="d-flex flex-wrap gap-lg-4 gap-2 ps-3 pt-4 pb-2">
                                    <?php if (function_exists('have_rows') && have_rows('footer_tags', 'option')) : ?>
                                    <?php while (have_rows('footer_tags', 'option')) : the_row(); ?>
                                        <?php $tg = get_sub_field('link'); ?>
                                        <?php if (is_array($tg) && !empty($tg['url'])) : ?>
                                            <?php $tgt = $tg['title'] !== '' ? $tg['title'] : $tg['url']; ?>
                                    <li>
                                        <div class="at-btn at-btn-border-white border-0 ps-2 pe-2 py-0 common-white opacity-50 bg-transparent rounded-0">
                                            <span>
                                                <span class="text-1"><?php echo esc_html($tgt); ?></span>
                                                <span class="text-2"><?php echo esc_html($tgt); ?></span>
                                            </span>
                                            <i>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                                </svg>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                                </svg>
                                            </i>
                                        </div>
                                    </li>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
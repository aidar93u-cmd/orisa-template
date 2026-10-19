<?php
defined('ABSPATH') || exit;
?>
            <!-- Footer placeholder to maintain scroll height -->
            <div class="footer-placeholder"></div>
        <!-- Footer 2 -->
        <footer class="footer-fixed-bottom bg-neutral-950 changeless">
            <div class="at-footer-area mp-footer-style mp-footer-style-2 pt-120 pb-0">
                <div class="container">
                    <!-- Top section: Logo + Contact + Hours | Nav -->
                    <div class="row g-5 pb-md-5 pb-2">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column align-items-start gap-4">
                                <div class="at-header-logo at-header-logo--wide">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                        <?php echo orisa_img(function_exists('get_field') ? get_field('logo_dark', 'option') : 0, 'full', ['alt' => get_bloginfo('name')]); ?>
                                    </a>
                                </div>
                                <div class="d-flex flex-column gap-3">
                                    <?php $ph = function_exists('get_field') ? get_field('phone', 'option') : ''; ?>
                                     <?php if ($ph) : ?><p class="h6 text-white mb-2 fw-medium"><?php echo esc_html($ph); ?></p><?php endif; ?>
                                    <p class="h6 text-white mb-2">
                                        <?php $em0 = function_exists('orisa_first_email') ? orisa_first_email() : ''; ?>
                                         <?php if ($em0) : ?><a href="<?php echo esc_attr('mailto:' . $em0); ?>" class="text-white text-decoration-none"><?php echo esc_html($em0); ?></a><?php endif; ?>
                                    </p>
                                    <?php $fa = function_exists('get_field') ? get_field('address', 'option') : ''; ?>
                                    <?php if ($fa) : ?><p class="h6 text-white mb-0">
                                        <?php echo nl2br(esc_html($fa)); ?>
                                    </p><?php endif; ?>
                                    <div class="footer-2-hours text-white">
                                        <?php $hd = function_exists('get_field') ? get_field('footer2_hours_days', 'option') : ''; if (!$hd) $hd = 'Пн — Сб'; ?>
                                        <span class="d-block fz-font-md opacity-50"><?php echo esc_html($hd); ?></span>
                                        <?php $ht = function_exists('get_field') ? get_field('footer2_hours_time', 'option') : ''; if (!$ht) $ht = '9:00 — 18:00'; ?>
                                        <h3 class="h5 fw-400 common-white mb-0"><?php echo esc_html($ht); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mx-auto">
                            <div class="at-footer-widget alt-footer-link-item-wrap row">
                                <div class="alt-footer-link-item col-6">
                                    <?php if (has_nav_menu('orisa-footer-1')) : ?>
                                        <?php wp_nav_menu(['theme_location' => 'orisa-footer-1', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>', 'walker' => new Orisa_Plain_Walker('mb-15'), 'fallback_cb' => false]); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="alt-footer-link-item col-6">
                                    <?php if (has_nav_menu('orisa-footer-2')) : ?>
                                        <?php wp_nav_menu(['theme_location' => 'orisa-footer-2', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>', 'walker' => new Orisa_Plain_Walker('mb-15'), 'fallback_cb' => false]); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="footer-2-border pt-40 pb-40">
                        <!-- Bottom section: Title | Social icons + Copyright -->
                        <div class="row align-items-end g-4">
                            <div class="col-lg-9 col-md-8">
                                <div class="at-title-anim overflow-hidden">
                                     <h2 class="footer-2-connect-title text-white mb-0 at-title-text text-scale-anim">ЗАКРОЙДОЛГИ.РФ</h2>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 text-end">
                                <div class="at-footer-widget at-footer-link">
                                    <?php $f2_socials = function_exists('orisa_socials') ? orisa_socials() : []; ?>
                                    <?php if ($f2_socials) : ?>
                                    <div class="at-hero-social at-hero-social--icons justify-content-md-end">
                                        <?php foreach ($f2_socials as $f2_soc) : ?>
                                        <a href="<?php echo esc_url($f2_soc['url']); ?>" aria-label="<?php echo esc_attr($f2_soc['label']); ?>" title="<?php echo esc_attr($f2_soc['label']); ?>">
                                            <?php echo orisa_soc_icon($f2_soc['slug'], 18); ?>
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <span class="at-footer-copyright d-block mt-3"><?php echo orisa_copyright(function_exists('get_field') ? (string) get_field('copyright', 'option') : ''); ?></span>

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
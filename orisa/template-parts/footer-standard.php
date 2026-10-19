<?php
defined('ABSPATH') || exit;

if (is_page() && function_exists('get_field') && get_field('hide_footer')) {
    get_footer('empty');
    return;
}
$footer_style = function_exists('get_field') && is_page() ? (string) get_field('footer_style') : 'standard';
?>
            </main>
            <!-- Footer -->
            <footer class="container-2200">
                <!-- footer area start -->
                <div id="contacts" class="at-footer-area mp-footer-style pt-60 bg-neutral-950 rounded-5 mx-lg-3 mx-2 changeless">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-xxl-4 col-lg-6">
                                <div class="d-flex flex-wrap align-items-start gap-4">
                                    <?php echo orisa_img(function_exists('get_field') ? get_field('logo_dark', 'option') : 0, 'full', ['class' => 'mt-5', 'data-width' => '50', 'alt' => get_bloginfo('name')]); ?>
                                    <div>
                                        <?php $ft = function_exists('get_field') ? get_field('footer_title', 'option') : ''; ?>
                                        <?php if ($ft) : ?><h3 class="h4 text-white reveal-text"><?php echo esc_html($ft); ?></h3><?php endif; ?>
                                        <?php $fa = function_exists('get_field') ? get_field('address', 'option') : ''; ?>
                                        <?php if ($fa) : ?><p class="mb-0">
                                            <?php echo nl2br(esc_html($fa)); ?>
                                        </p><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-5 col-md-8 ms-lg-auto text-lg-end">
                                <div class="at-footer-title-wrap">
                                    <?php $ph = function_exists('get_field') ? get_field('phone', 'option') : ''; ?>
                                        <?php if ($ph) : ?><h5 class="h4 text-white text-decoration-underline text-wrap"><a href="<?php echo esc_attr(orisa_phone_href($ph)); ?>" class="text-white text-decoration-underline"><?php echo esc_html($ph); ?></a></h5><?php endif; ?>
                                    <div class="at-footer-widget at-footer-link pt-50">
                                        <?php $std_socials = function_exists('orisa_socials') ? orisa_socials() : []; ?>
                                        <?php if ($std_socials) : ?>
                                        <div class="at-hero-social justify-content-lg-end">
                                            <?php foreach ($std_socials as $std_soc) : ?>
                                            <a href="<?php echo esc_url($std_soc['url']); ?>">
                                            <?php echo esc_html($std_soc['label']); ?>
                                                <?php echo orisa_soc_icon($std_soc['slug']); ?>
                                            </a>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="at-about pt-100 pb-60 p-relative">
                            <div class="row align-items-end g-5">
                                <div class="col-xxl-3 col-lg-4 col-md-6">
                                    <div class="at-footer-widget alt-footer-link-item-wrap row">
                                        <span class="d-block fz-font-label neutral-0 opacity-50 text-uppercase mb-3">Меню</span>
                                        <?php if (has_nav_menu('orisa-footer-1')) : ?>
                                        <div class="alt-footer-link-item col-6">
                                            <?php wp_nav_menu(['theme_location' => 'orisa-footer-1', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>', 'walker' => new Orisa_Plain_Walker('mb-15'), 'fallback_cb' => false]); ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (has_nav_menu('orisa-footer-2')) : ?>
                                        <div class="alt-footer-link-item col-6">
                                            <?php wp_nav_menu(['theme_location' => 'orisa-footer-2', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>', 'walker' => new Orisa_Plain_Walker('mb-15'), 'fallback_cb' => false]); ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xxl-9 col-lg-8 col-12 text-lg-end">
                                    <h1 class="fz-150 common-white mb-0 text-scale-anim"><?php echo orisa_text(function_exists('get_field') ? get_field('site_name_text', 'option') : ''); ?><sup class="fz-80 fw-400">®</sup></h1>
                                </div>
                            </div>
                        </div>
                        <div class="at-footer-copyright-area at-about-border pt-40 pb-40">
                            <div class="row align-items-center g-3">
                                <div class="col-lg-2">
                                    <div class="at-footer-copyright-wrap text">
                                        <span class="at-footer-copyright"><?php echo orisa_copyright(function_exists('get_field') ? (string) get_field('copyright', 'option') : ''); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <ul class="d-flex flex-wrap gap-lg-4 gap-3 ps-3">
                                        <?php if (function_exists('have_rows') && have_rows('footer_tags', 'option')) : ?>
                                            <?php while (have_rows('footer_tags', 'option')) : the_row(); ?>
                                                <?php $tag = get_sub_field('link'); ?>
                                                <?php if (is_array($tag) && !empty($tag['url'])) : ?>
                                                    <?php $tag_title = $tag['title'] !== '' ? $tag['title'] : $tag['url']; ?>
                                                    <li>
                                                        <div class="at-btn border-0 ps-2 pe-2 py-0 common-white opacity-50 bg-transparent rounded-0">
                                                            <span>
                                                                <span class="text-1"><?php echo esc_html($tag_title); ?></span>
                                                                <span class="text-2"><?php echo esc_html($tag_title); ?></span>
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
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="col-lg-2">
                                    <div class="at-footer-copyright-wrap text-lg-end">
                                        <span class="at-footer-copyright"><?php echo orisa_copyright(function_exists('get_field') ? (string) get_field('copyright', 'option') : ''); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-neutral-0 pt-10"></div>
                <!-- footer area end -->
            </footer>
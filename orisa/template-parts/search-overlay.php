<?php
defined('ABSPATH') || exit;
$search_placeholder = function_exists('get_field') ? (string) get_field('search_placeholder', 'option') : '';
$popular_title = function_exists('get_field') ? (string) get_field('search_popular_title', 'option') : '';
$logo = function_exists('get_field') ? get_field('logo_light', 'option') : 0;
$site_name = function_exists('get_field') ? (string) get_field('site_name_text', 'option') : '';
?>
    <!--search-form-start -->
    <div class="at-search-body-overlay"></div>
    <div class="at-search-form-toggle">
        <div class="container">
            <div class="row mb-60">
                <div class="col-lg-12">
                    <div class="at-search-top d-flex justify-content-between align-items-center">
                        <div class="at-header-logo at-search-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php echo orisa_img($logo, 'full', ['data-width' => '30', 'alt' => $site_name]); ?>
                                <p class="h6 fw-700 fz-24 mb-0"><?php echo orisa_text($site_name); ?></p>
                            </a>
                        </div>
                        <button class="at-search-close">
                            <i class="fa-light fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="at-search-form">
                        <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                            <div class="at-search-form-input">
                                <input type="text" name="s" placeholder="<?php echo esc_attr($search_placeholder); ?>" required>
                                <span class="at-search-focus-border"></span>
                                <button class="at-search-form-btn at-btn" type="submit">
                                    <span>
                                        <span class="text-1"><?php esc_html_e('Найти', 'orisa'); ?></span>
                                        <span class="text-2"><?php esc_html_e('Найти', 'orisa'); ?></span>
                                    </span>
                                    <i class="icon-arrow-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                            <path d="M8.33333 1L13 5.66667M13 5.66667L8.33333 10.3333M13 5.66667H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                            <path d="M8.33333 1L13 5.66667M13 5.66667L8.33333 10.3333M13 5.66667H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="at-categories">
                        <h3 class="at-categories-title"><?php echo orisa_text($popular_title); ?></h3>
                        <ul class="at-categories-list">
                            <?php if (function_exists('have_rows') && have_rows('search_popular', 'option')) : ?>
                                <?php while (have_rows('search_popular', 'option')) : the_row(); ?>
                                    <?php $plink = get_sub_field('link'); ?>
                                    <?php if (is_array($plink) && !empty($plink['url'])) : ?>
                                        <li><a href="<?php echo esc_url($plink['url']); ?>" class="at-categories-item"><?php echo esc_html($plink['title'] !== '' ? $plink['title'] : $plink['url']); ?></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form-end -->

<?php
defined('ABSPATH') || exit;
?><!doctype html>
<html <?php language_attributes(); ?> data-bs-theme="light">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class('at-magic-cursor'); ?>>
<?php wp_body_open(); ?>
<?php
if (is_page() && function_exists('get_field') && get_field('hide_header')) {
    return;
}
$header_style = function_exists('get_field') && is_page() ? (string) get_field('header_style') : 'default';
$header_area_class = 'at-header-area at-header-spacing header-transparent';
get_template_part('template-parts/search-overlay');
?>
    <header>
        <!-- header 1 area start -->
        <div class="<?php echo esc_attr($header_area_class); ?>">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-6">
                        <div class="at-header-logo changeless">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php
                                $logo = function_exists('get_field') ? get_field('logo_dark', 'option') : 0;
                                echo orisa_img($logo, 'full', ['data-width' => '30', 'alt' => get_bloginfo('name')]);
                                ?>
                                <p class="h6 fw-700 fz-24 text-white mb-0"><?php echo orisa_text(function_exists('get_field') ? get_field('site_name_text', 'option') : ''); ?></p>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 mx-auto d-none d-xl-flex justify-content-center">
                        <div class="at-main-menu <?php echo esc_attr(function_exists('get_field') ? (string) get_field('menu_style', 'option') : 'menu-light d-inline-flex justify-content-center style-1'); ?>">
                            <nav class="at-mobile-menu-active">
                                <?php if (has_nav_menu('orisa-header')) : ?>
                                    <?php wp_nav_menu(['theme_location' => 'orisa-header', 'container' => false, 'items_wrap' => '<ul>%3$s</ul>', 'walker' => new Orisa_Plain_Walker(), 'fallback_cb' => false]); ?>
                                <?php elseif (function_exists('have_rows') && have_rows('menu_items', 'option')) : ?>
                                <ul>
                                        <?php while (have_rows('menu_items', 'option')) : the_row(); ?>
                                            <?php $link = get_sub_field('link'); ?>
                                            <?php if (is_array($link) && !empty($link['url'])) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title'] !== '' ? $link['title'] : $link['url']); ?></a>
                                                    <?php if (have_rows('children')) : ?>
                                                        <ul>
                                                            <?php while (have_rows('children')) : the_row(); ?>
                                                                <?php $sub = get_sub_field('link'); ?>
                                                                <?php if (is_array($sub) && !empty($sub['url'])) : ?>
                                                                    <li><a href="<?php echo esc_url($sub['url']); ?>"><?php echo esc_html($sub['title'] !== '' ? $sub['title'] : $sub['url']); ?></a></li>
                                                                <?php endif; ?>
                                                            <?php endwhile; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                </ul>
                                <?php endif; ?>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-6">
                        <div class="at-header-right gap-3 d-flex justify-content-end align-items-center">
                            <button class="at-header-search-btn at-search-click">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.7508 18.5233L13.5538 13.392M13.5538 13.392C14.9604 12.0032 15.7506 10.1196 15.7506 8.15551C15.7506 6.19144 14.9604 4.30782 13.5538 2.91902C12.1472 1.53022 10.2395 0.75 8.25028 0.75C6.26108 0.75 4.35336 1.53022 2.94678 2.91902C1.54021 4.30782 0.75 6.19144 0.75 8.15551C0.75 10.1196 1.54021 12.0032 2.94678 13.392C4.35336 14.7808 6.26108 15.561 8.25028 15.561C10.2395 15.561 12.1472 14.7808 13.5538 13.392Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <button class="at-menu-bar at-header-sidebar-btn text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M1 2C1 1.73478 1.10536 1.48043 1.29289 1.29289C1.48043 1.10536 1.73478 1 2 1H6C6.26522 1 6.51957 1.10536 6.70711 1.29289C6.89464 1.48043 7 1.73478 7 2V6C7 6.26522 6.89464 6.51957 6.70711 6.70711C6.51957 6.89464 6.26522 7 6 7H2C1.73478 7 1.48043 6.89464 1.29289 6.70711C1.10536 6.51957 1 6.26522 1 6V2ZM11 2C11 1.73478 11.1054 1.48043 11.2929 1.29289C11.4804 1.10536 11.7348 1 12 1H16C16.2652 1 16.5196 1.10536 16.7071 1.29289C16.8946 1.48043 17 1.73478 17 2V6C17 6.26522 16.8946 6.51957 16.7071 6.70711C16.5196 6.89464 16.2652 7 16 7H12C11.7348 7 11.4804 6.89464 11.2929 6.70711C11.1054 6.51957 11 6.26522 11 6V2ZM1 12C1 11.7348 1.10536 11.4804 1.29289 11.2929C1.48043 11.1054 1.73478 11 2 11H6C6.26522 11 6.51957 11.1054 6.70711 11.2929C6.89464 11.4804 7 11.7348 7 12V16C7 16.2652 6.89464 16.5196 6.70711 16.7071C6.51957 16.8946 6.26522 17 6 17H2C1.73478 17 1.48043 16.8946 1.29289 16.7071C1.10536 16.5196 1 16.2652 1 16V12ZM11 12C11 11.7348 11.1054 11.4804 11.2929 11.2929C11.4804 11.1054 11.7348 11 12 11H16C16.2652 11 16.5196 11.1054 16.7071 11.2929C16.8946 11.4804 17 11.7348 17 12V16C17 16.2652 16.8946 16.5196 16.7071 16.7071C16.5196 16.8946 16.2652 17 16 17H12C11.7348 17 11.4804 16.8946 11.2929 16.7071C11.1054 16.5196 11 16.2652 11 16V12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- sticky-menu-area -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M4 5C4 4.73478 4.10536 4.48043 4.29289 4.29289C4.48043 4.10536 4.73478 4 5 4H9C9.26522 4 9.51957 4.10536 9.70711 4.29289C9.89464 4.48043 10 4.73478 10 5V9C10 9.26522 9.89464 9.51957 9.70711 9.70711C9.51957 9.89464 9.26522 10 9 10H5C4.73478 10 4.48043 9.89464 4.29289 9.70711C4.10536 9.51957 4 9.26522 4 9V5ZM14 5C14 4.73478 14.1054 4.48043 14.2929 4.29289C14.4804 4.10536 14.7348 4 15 4H19C19.2652 4 19.5196 4.10536 19.7071 4.29289C19.8946 4.48043 20 4.73478 20 5V9C20 9.26522 19.8946 9.51957 19.7071 9.70711C19.5196 9.89464 19.2652 10 19 10H15C14.7348 10 14.4804 9.89464 14.2929 9.70711C14.1054 9.51957 14 9.26522 14 9V5ZM4 15C4 14.7348 4.10536 14.4804 4.29289 14.2929C4.48043 14.1054 4.73478 14 5 14H9C9.26522 14 9.51957 14.1054 9.70711 14.2929C9.89464 14.4804 10 14.7348 10 15V19C10 19.2652 9.89464 19.5196 9.70711 19.7071C9.51957 19.8946 9.26522 20 9 20H5C4.73478 20 4.48043 19.8946 4.29289 19.7071C4.10536 19.5196 4 19.2652 4 19V15ZM14 15C14 14.7348 14.1054 14.4804 14.2929 14.2929C14.4804 14.1054 14.7348 14 15 14H19C19.2652 14 19.5196 14.1054 19.7071 14.2929C19.8946 14.4804 20 14.7348 20 15V19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H15C14.7348 20 14.4804 19.8946 14.2929 19.7071C14.1054 19.5196 14 19.2652 14 19V15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </button>
        <!-- sticky-menu-end -->
    </header>
<?php
get_template_part('template-parts/offcanvas');
if (function_exists('get_field') && get_field('cursor_enabled', 'option')) :
    ?>
    <!-- Begin magic cursor -->
    <div id="magic-cursor" class="cursor-black-bg">
        <div id="ball"></div>
    </div>
    <!-- End magic cursor -->
<?php endif; ?>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main class="bg-neutral-0">

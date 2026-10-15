<?php
defined('ABSPATH') || exit;
// Полоса подписки home-3-section-12 (archive-2.html:898-939). Форма — CF7 из опций блога.
?>
                 <!--Home 3 Section 12-->
                 <div class="home-3-section-12 pb-100">
                     <div class="container">
                         <div class="box-newsletter bg-neutral-50 pt-80 pb-100 px-md-5 px-4">
                             <div class="row g-4">
                                 <div class="col-lg-2">
                                     <div class="ripple-image ripples rounded-3 overflow-hidden d-inline-flex">
                                         <img class="img-cover" src="<?php echo esc_url(get_template_directory_uri() . '/assets/imgs/pages/img-74.webp'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                     </div>
                                 </div>
                                 <div class="col-lg-5">
                                     <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                                         <span class="text-uppercase">
                                             <span class="text-1">newsletter</span>
                                             <span class="text-2">newsletter</span>
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
                                     <h2>Stay ahead</h2>
                                     <p class="fz-font-xl mb-0">Get practical insights, trends, and strategies we use to help brands grow—delivered monthly, no spam.</p>
                                 </div>
                                 <div class="col-lg-4 ms-auto align-self-end">
                                     <?php $nl = function_exists('get_field') ? (string) get_field('newsletter_shortcode', 'option') : ''; ?>
                                     <?php if ($nl !== '') : ?>
                                         <?php echo do_shortcode($nl); ?>
                                     <?php endif; ?>
                                     <p class="mb-0 pt-20">By clicking the button, you are <br> agreeing with our <a href="#" class="neutral-900">Term & Conditions</a></p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

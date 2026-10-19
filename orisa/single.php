<?php
defined('ABSPATH') || exit;
// Статья 1:1 (blog-details.html: sec-1 hero+контент, sec-2 похожие).
// Тело статьи — классический редактор (the_content внутри .content).
get_header();
if (have_posts()) :
    while (have_posts()) :
        the_post();
        $post_url = rawurlencode(get_permalink());
        $post_title = rawurlencode(get_the_title());
        ?>
                <div class="sec-1-blog-details overflow-hidden pt-150 pb-100">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8 mx-auto">
                                <div class="nav-menu d-flex align-items-center gap-2 pb-2">
                                    <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" class="nav-menu__item neutral-900">Блог</a>
                                    <span class="nav-menu__item-separator">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11" fill="none">
                                            <path d="M0.666992 0.666672L5.33366 5.33334L0.666992 10" stroke="#585959" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="nav-menu__item neutral-500"><?php the_title(); ?></span>
                                </div>
                                <h2 class="fw-600 lh-1 mb-0"><?php the_title(); ?></h2>
                                <div class="d-flex flex-column flex-md-row align-items-md-end gap-2 justify-content-between pt-30">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="size-56 rounded-circle overflow-hidden">
                                            <?php echo get_avatar(get_the_author_meta('ID'), 112, '', get_the_author(), ['class' => 'img-cover']); ?>
                                        </div>
                                        <div>
                                            <h3 class="h6 mb-0"><?php the_author(); ?></h3>
                                            <span class="nav-menu__item fz-font-sm neutral-500"><?php echo esc_html(get_the_date()); ?></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-4">
                                        <span class="nav-menu__item fz-font-label fw-600 neutral-500">Поделиться статьёй</span>
                                        <ul class="at-social-list list-unstyled d-flex flex-wrap align-items-end gap-md-4 gap-3">
                                            <li>
                                                <a href="https://twitter.com/intent/tweet?url=<?php echo esc_attr($post_url); ?>&text=<?php echo esc_attr($post_title); ?>" class="at-social__link d-flex align-items-center gap-2" aria-label="Twitter" target="_blank" rel="noopener">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 15" fill="none" aria-hidden="true">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H5.25L8.98421 5.21053L13.5 0H15.5L9.8895 6.47368L16 15H10.75L7.01579 9.7895L2.5 15H0.5L6.11053 8.52632L0 0ZM11.5204 13.5L2.92043 1.5H4.47957L13.0796 13.5H11.5204Z" fill="currentColor"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($post_url); ?>" class="at-social__link d-flex align-items-center gap-2" aria-label="Facebook" target="_blank" rel="noopener">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                                                        <path d="M12.4024 18V11.0344H14.7347L15.0838 8.3265H12.4024V6.59765C12.4024 5.81364 12.62 5.27934 13.7443 5.27934L15.1783 5.27867V2.85676C14.9302 2.82382 14.0791 2.75006 13.0888 2.75006C11.0213 2.75006 9.606 4.01198 9.606 6.32952V8.3265H7.2677V11.0344H9.606V18H1C0.44772 18 0 17.5523 0 17V1C0 0.44772 0.44772 0 1 0H17C17.5523 0 18 0.44772 18 1V17C18 17.5523 17.5523 18 17 18H12.4024Z" fill="currentColor"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://t.me/share/url?url=<?php echo esc_attr($post_url); ?>&text=<?php echo esc_attr($post_title); ?>" class="at-social__link d-flex align-items-center gap-2" aria-label="Telegram" target="_blank" rel="noopener">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                                                        <path d="M9.92475 0C10.9376 0.00167406 11.4509 0.00703828 11.8945 0.0202418L12.0692 0.025948C12.2709 0.0331213 12.47 0.0421215 12.7101 0.0533719C13.6678 0.0976265 14.3211 0.249129 14.8949 0.471887C15.4881 0.700648 15.9892 1.00966 16.4894 1.50993C16.9889 2.0102 17.298 2.51271 17.5275 3.10448C17.7494 3.67751 17.901 4.33153 17.946 5.28931C17.9567 5.52933 17.9653 5.72841 17.9725 5.93024L17.9781 6.10492C17.9913 6.5484 17.9973 7.06177 17.9992 8.07471L17.9999 8.74577C18 8.82777 18 8.91237 18 8.99967L17.9999 9.25357L17.9994 9.92472C17.9977 10.9376 17.9923 11.451 17.9791 11.8944L17.9734 12.0691C17.9662 12.271 17.9572 12.4701 17.946 12.7101C17.9017 13.6679 17.7494 14.3211 17.5275 14.8949C17.2987 15.4882 16.9889 15.9892 16.4894 16.4895C15.9892 16.989 15.4859 17.298 14.8949 17.5275C14.3211 17.7495 13.6678 17.901 12.7101 17.946C12.47 17.9567 12.2709 17.9654 12.0692 17.9725L11.8945 17.9781C11.4509 17.9914 10.9376 17.9973 9.92475 17.9993L9.25359 18C9.1716 18 9.087 18 8.99969 18H8.7458L8.07464 17.9994C7.06175 17.9977 6.54839 17.9924 6.1049 17.9791L5.93022 17.9734C5.72839 17.9662 5.5293 17.9572 5.2893 17.946C4.33151 17.9018 3.67899 17.7495 3.10448 17.5275C2.51195 17.2988 2.01018 16.989 1.50992 16.4895C1.00965 15.9892 0.701394 15.4859 0.471886 14.8949C0.249129 14.3211 0.0983735 13.6679 0.053372 12.7101C0.0426796 12.4701 0.0339582 12.271 0.026893 12.0691L0.0212318 11.8944C0.00806435 11.451 0.00206123 10.9376 0.000117163 9.92472L0 8.07471C0.00167406 7.06177 0.00702925 6.5484 0.0202327 6.10492L0.0259479 5.93024C0.0331212 5.72841 0.0421216 5.52933 0.053372 5.28931C0.0976175 4.33078 0.249129 3.67825 0.471886 3.10448C0.700638 2.51196 1.00965 2.0102 1.50992 1.50993C2.01018 1.00966 2.51271 0.701396 3.10448 0.471887C3.67825 0.249129 4.33077 0.0983735 5.2893 0.0533719C5.5293 0.0426885 5.72839 0.0339673 5.93022 0.026902L6.1049 0.0212407C6.54839 0.00806417 7.06175 0.00206102 8.07464 0.000116949L9.92475 0Z" fill="currentColor"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 py-5">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <div class="content">
                                    <?php if (function_exists('have_rows') && have_rows('post_blocks')) : ?>
                                        <?php get_template_part('template-parts/post-blocks'); ?>
                                    <?php else : ?>
                                        <?php the_content(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <div class="border-top-100 py-5">
                                    <div class="d-flex flex-wrap align-items-center justify-content-center gap-2">
                                        <?php $orisa_tags = get_the_tags(); ?>
                                        <?php if (!empty($orisa_tags)) : ?>
                                            <?php foreach ($orisa_tags as $orisa_tag) : ?>
                                                <a href="<?php echo esc_url(get_tag_link($orisa_tag)); ?>" class="at-btn filter-btn btn-sm"><?php echo esc_html($orisa_tag->name); ?></a>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 me-auto d-flex flex-column gap-2">
                                        <?php $orisa_prev = get_previous_post(); ?>
                                        <?php if ($orisa_prev) : ?>
                                            <a href="<?php echo esc_url(get_permalink($orisa_prev)); ?>" aria-label="Previous">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                                                    <path d="M3.19036 5.64852H13.3333V7.31518H3.19036L7.66033 11.7851L6.48183 12.9636L0 6.48185L6.48183 0L7.66033 1.17851L3.19036 5.64852Z" fill="currentColor" />
                                                </svg>
                                                <span class="text-uppercase">Назад</span>
                                            </a>
                                            <h3 class="h6 fw-600">
                                                <a href="<?php echo esc_url(get_permalink($orisa_prev)); ?>"><?php echo esc_html(get_the_title($orisa_prev)); ?></a>
                                            </h3>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-5 ms-auto d-flex flex-column gap-2 text-end">
                                        <?php $orisa_next = get_next_post(); ?>
                                        <?php if ($orisa_next) : ?>
                                            <a href="<?php echo esc_url(get_permalink($orisa_next)); ?>" aria-label="Next">
                                                <span class="text-uppercase">Далее</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                    <path d="M12.5 6.5L17.2143 11L12.5 15.5" stroke="currentColor" stroke-width="1.28571" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M16.9999 11H4.78564" stroke="currentColor" stroke-width="1.28571" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                            <h3 class="h6 fw-600">
                                                <a href="<?php echo esc_url(get_permalink($orisa_next)); ?>"><?php echo esc_html(get_the_title($orisa_next)); ?></a>
                                            </h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $orisa_related = new WP_Query([
                    'posts_per_page'      => 4,
                    'post__not_in'        => [get_the_ID()],
                    'category__in'        => wp_get_post_categories(get_the_ID()),
                    'ignore_sticky_posts' => true,
                    'no_found_rows'       => true,
                ]);
                ?>
                <?php if ($orisa_related->have_posts()) : ?>
                <div class="sec-2-blog-details overflow-hidden pt-100 pb-100 bg-neutral-50">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-2">
                                <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                                    <span class="text-uppercase">
                                                <span class="text-1">Похожие статьи</span>
                                                <span class="text-2">Похожие статьи</span>
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
                            </div>
                        </div>
                        <div class="row pt-20">
                            <!-- beautify ignore:start -->
                            <?php while ($orisa_related->have_posts()) : $orisa_related->the_post(); ?>
                                <div class="blog-card col-lg-3 col-md-6 col-12 mb-30" data-category="<?php $rc = get_the_category(); echo esc_attr(!empty($rc) ? $rc[0]->slug : ''); ?>">
                                    <div class="blog-card__thumb hover-effect-1">
                                        <a href="<?php the_permalink(); ?>" class="blog-card__img-link">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium', ['class' => 'blog-card__img22']); ?>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="blog-card__content">
                                        <h2 class=" h6 blog-card__title">
                                            <a href="<?php the_permalink(); ?>" class="blog-card__title-link"><?php the_title(); ?></a>
                                        </h2>
                                        <p class="blog-card__meta">
                                            <span class="blog-card__meta-text"><?php esc_html_e('By ', 'orisa'); ?></span>
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="blog-card__author"><?php the_author(); ?></a>
                                            <span class="blog-card__meta-text"> – <?php echo esc_html(get_the_date()); ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <!-- beautify ignore:end -->
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
        <?php
    endwhile;
endif;
get_footer();

<?php
defined('ABSPATH') || exit;

/**
 * Темы FAQ карточками (база: faqs.html 47-125: .sec-2-faqs).
 * Номер [01] проставляется автоматически по порядку карточек.
 */
$title = get_sub_field('title');

$orisa_cards = [];
if (function_exists('have_rows') && have_rows('cards')) {
    while (have_rows('cards')) {
        the_row();
        $c_title = get_sub_field('title');
        $c_text = get_sub_field('text');
        $c_img = get_sub_field('image');
        $c_link = get_sub_field('link');
        $c_url = is_array($c_link) && !empty($c_link['url']) ? $c_link['url'] : '';
        if (($c_title === '' || $c_title === null) && ($c_text === '' || $c_text === null) && empty($c_img)) {
            continue;
        }
        $orisa_cards[] = ['title' => (string) $c_title, 'text' => (string) $c_text, 'image' => (int) $c_img, 'url' => (string) $c_url];
    }
}
?>
<?php if (($title !== '' && $title !== null) || $orisa_cards !== []) : ?>
    <div class="sec-2-faqs at-item-anime-area pt-100 pb-120"<?php echo orisa_anchor(); ?>>
        <div class="container">
            <?php if ($title !== '' && $title !== null) : ?>
                <div class="row">
                    <div class="col-12">
                        <h3><?php echo esc_html($title); ?></h3>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($orisa_cards !== []) : ?>
                <div class="row g-3 pt-100">
                    <?php $orisa_n = 0; ?>
                    <?php foreach ($orisa_cards as $orisa_c) : $orisa_n++; ?>
                        <div class="col-xxl-3 col-md-6">
                            <div class="at-service-card hover-up border-100 no-before rounded-2 overflow-hidden p-relative bg-neutral-0 z-index-3">
                                <?php if ($orisa_c['url'] !== '') : ?>
                                    <a href="<?php echo esc_url($orisa_c['url']); ?>" class="p-absolute top-0 left-0 w-100 h-100" aria-label="<?php echo esc_attr($orisa_c['title']); ?>"></a>
                                <?php endif; ?>
                                <div class="at-service-card-content m-xxl-5 m-4">
                                    <div class="at-service-card-number">
                                        <span class="h6 fw-600 neutral-300 d-block">[<?php echo esc_html(sprintf('%02d', $orisa_n)); ?>]</span>
                                    </div>
                                    <?php if ($orisa_c['title'] !== '') : ?>
                                        <h4 class="mt-3 fw-600"><?php if ($orisa_c['url'] !== '') : ?><a href="<?php echo esc_url($orisa_c['url']); ?>"><?php echo esc_html($orisa_c['title']); ?></a><?php else : ?><?php echo esc_html($orisa_c['title']); ?><?php endif; ?></h4>
                                    <?php endif; ?>
                                    <?php if ($orisa_c['text'] !== '') : ?>
                                        <div class="at-service-card-description">
                                            <p class="mb-0 neutral-900"><?php echo esc_html($orisa_c['text']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($orisa_c['image'] > 0) : ?>
                                        <div class="at-service-card-img rounded-2 fix mt-4 hover-effect-1">
                                            <?php echo orisa_img($orisa_c['image'], 'full', ['class' => 'img-cover rounded-2', 'alt' => $orisa_c['title'], 'loading' => 'lazy']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php
defined('ABSPATH') || exit;
// Тело статьи из flexible-блоков post_blocks (lead / text / images / columns).
// Разметка 1:1 с blog-details.html. Пустые поля свои теги не выводят.
if (!function_exists('have_rows') || !have_rows('post_blocks')) {
    return;
}
while (have_rows('post_blocks')) :
    the_row();
    $orisa_layout = get_row_layout();
    if ($orisa_layout === 'post_lead') :
        $orisa_lead = get_sub_field('text');
        if (is_string($orisa_lead) && $orisa_lead !== '') :
            ?>
            <h3 class="h6 fz-font-2xl fw-400 mb-60"><?php echo nl2br(esc_html($orisa_lead)); ?></h3>
        <?php endif; ?>
    <?php elseif ($orisa_layout === 'post_text') :
        $orisa_ptext = get_sub_field('text');
        if (is_string($orisa_ptext) && trim($orisa_ptext) !== '') :
            ?>
            <div class="post-block-text mb-60"><?php echo wp_kses_post($orisa_ptext); ?></div>
        <?php endif; ?>
    <?php elseif ($orisa_layout === 'post_images') :
        $orisa_pimgs = get_sub_field('images');
        if (is_array($orisa_pimgs) && $orisa_pimgs !== []) :
            $orisa_pimgs = array_values(array_filter($orisa_pimgs, function ($r) {
                return is_array($r) && !empty($r['image']);
            }));
            if (count($orisa_pimgs) >= 2) :
                ?>
                <div class="row mb-60 g-3">
                    <?php foreach (array_slice($orisa_pimgs, 0, 2) as $orisa_pi) : ?>
                        <div class="col-md-6">
                            <?php echo orisa_img((int) $orisa_pi['image'], 'full', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else :
                $orisa_pi = $orisa_pimgs[0];
                ?>
                <figure class="mt-60 mb-60">
                    <?php echo orisa_img((int) $orisa_pi['image'], 'full', ['alt' => get_the_title()]); ?>
                    <?php if (!empty($orisa_pi['caption'])) : ?>
                        <figcaption class="text-center neutral-700 fst-italic mt-2"><?php echo esc_html($orisa_pi['caption']); ?></figcaption>
                    <?php endif; ?>
                </figure>
            <?php endif; ?>
        <?php endif; ?>
    <?php elseif ($orisa_layout === 'post_columns') :
        $orisa_pcols = get_sub_field('cols');
        if (is_array($orisa_pcols) && $orisa_pcols !== []) :
            ?>
            <div class="row mb-60">
                <?php foreach (array_slice($orisa_pcols, 0, 2) as $orisa_pc) : ?>
                    <?php if (!is_array($orisa_pc) || (empty($orisa_pc['heading']) && empty($orisa_pc['text']))) continue; ?>
                    <div class="col-md-6">
                        <?php if (!empty($orisa_pc['heading'])) : ?>
                            <h3 class="h6 fw-600"><?php echo esc_html($orisa_pc['heading']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($orisa_pc['text'])) : ?>
                            <p class="fz-font-lg neutral-900"><?php echo nl2br(esc_html($orisa_pc['text'])); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endwhile; ?>

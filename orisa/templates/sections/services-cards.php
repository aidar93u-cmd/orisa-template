<?php
defined('ABSPATH') || exit;

/**
 * Услуги-3 (база: services-3.html, строки 602-684: .sec-2-services сетка .at-service-card).
 * Разметка 1:1: классы at-service-card/card-1..3, content-позиции, data-background/img-cover — дословно.
 * Вариант оформления карточки задан её порядком (1-4 как в оригинале, дальше по кругу) — поля варианта нет.
 * Третья карточка выводит одно Изображение дважды (верх/низ), как два img оригинала.
 * Иконка (image ID) заменяет inline-SVG оригинала; пустые поля не выводят свои теги.
 * Заголовок блока в оригинале отсутствует: задан — выводится выше сетки, пуст — сетка 1:1.
 * Весь вывод экранирован: esc_html для текста, esc_url для ссылок/фонов, esc_attr для классов/aria.
 */
$orisa_title = (string) get_sub_field('title');

$orisa_cards = [];
if (have_rows('cards')) {
    while (have_rows('cards')) {
        the_row();
        $orisa_l = get_sub_field('link');
        $orisa_cards[] = [
            'image' => (int) get_sub_field('image'),
            'icon'  => (int) get_sub_field('icon'),
            'title' => (string) get_sub_field('title'),
            'text'  => (string) get_sub_field('text'),
            'url'   => (is_array($orisa_l) && !empty($orisa_l['url'])) ? (string) $orisa_l['url'] : '',
        ];
    }
}

$orisa_box = [
    'at-service-card card-1 rounded-4 overflow-hidden p-relative bg-cover',
    'at-service-card card-2 rounded-4 overflow-hidden p-relative bg-neutral-50',
    'at-service-card card-3 rounded-4 overflow-hidden p-relative',
    'at-service-card card-2 rounded-4 overflow-hidden p-relative bg-neutral-50',
];
$orisa_content = [
    'at-service-card-content text-white p-absolute bottom-0 start-0 end-0 m-xxl-5 m-4',
    'at-service-card-content p-absolute top-0 left-0 m-xxl-5 m-4',
    'at-service-card-content text-white p-absolute top-50 left-0 mx-xxl-5 mx-4 translate-middle-y',
    'at-service-card-content p-absolute top-50 left-0 mx-xxl-5 mx-4 translate-middle-y',
];
?>
<?php if ($orisa_title !== '' || $orisa_cards) : ?>
    <div class="sec-2-services overflow-hidden pt-120 pb-120"<?php echo orisa_anchor(); ?>>
        <div class="container">
            <?php if ($orisa_title !== '') : ?>
                <div class="row">
                    <div class="col-12 mb-4">
                        <h2 class="section-title reveal-text mb-0"><?php echo esc_html($orisa_title); ?></h2>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($orisa_cards) : ?>
                <div class="row g-3">
                    <?php $orisa_i = 0; ?>
                    <?php foreach ($orisa_cards as $orisa_c) : ?>
                        <?php
                        $orisa_v = $orisa_i % 4;
                        $orisa_i++;
                        $orisa_dark = ($orisa_v === 0 || $orisa_v === 2);
                        $orisa_aria = $orisa_c['title'] !== '' ? ' aria-label="' . esc_attr($orisa_c['title']) . '"' : '';
                        $orisa_bg = ($orisa_v === 0) ? orisa_img_url($orisa_c['image'], 'full') : '';
                        $orisa_img_html = $orisa_c['image'] ? orisa_img($orisa_c['image'], 'full', ['class' => 'img-cover', 'loading' => 'lazy', 'alt' => $orisa_c['title']]) : '';
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="<?php echo esc_attr($orisa_box[$orisa_v]); ?>"<?php echo $orisa_bg !== '' ? ' data-background="' . esc_url($orisa_bg) . '"' : ''; ?>>
                                <?php if ($orisa_v === 0) : ?>
                                    <?php if ($orisa_c['url'] !== '') : ?>
                                        <a href="<?php echo esc_url($orisa_c['url']); ?>" class="p-absolute top-0 left-0 w-100 h-100"<?php echo $orisa_aria; ?>></a>
                                    <?php endif; ?>
                                <?php elseif ($orisa_v === 2) : ?>
                                    <?php if ($orisa_img_html !== '' || $orisa_c['url'] !== '') : ?>
                                        <?php if ($orisa_c['url'] !== '') : ?><a href="<?php echo esc_url($orisa_c['url']); ?>" class="p-absolute top-0 left-0"<?php echo $orisa_aria; ?>><?php else : ?><span class="p-absolute top-0 left-0"><?php endif; ?>
                                            <?php echo $orisa_img_html; ?>
                                        <?php if ($orisa_c['url'] !== '') : ?></a><?php else : ?></span><?php endif; ?>
                                    <?php endif; ?>
                                    <?php if ($orisa_img_html !== '' || $orisa_c['url'] !== '') : ?>
                                        <?php if ($orisa_c['url'] !== '') : ?><a href="<?php echo esc_url($orisa_c['url']); ?>" class="p-absolute bottom-0 start-0 end-0"<?php echo $orisa_aria; ?>><?php else : ?><span class="p-absolute bottom-0 start-0 end-0"><?php endif; ?>
                                            <?php echo $orisa_img_html; ?>
                                        <?php if ($orisa_c['url'] !== '') : ?></a><?php else : ?></span><?php endif; ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if ($orisa_img_html !== '' || $orisa_c['url'] !== '') : ?>
                                        <?php if ($orisa_c['url'] !== '') : ?><a href="<?php echo esc_url($orisa_c['url']); ?>" class="p-absolute bottom-0 start-0 end-0"<?php echo $orisa_aria; ?>><?php else : ?><span class="p-absolute bottom-0 start-0 end-0"><?php endif; ?>
                                            <?php echo $orisa_img_html; ?>
                                        <?php if ($orisa_c['url'] !== '') : ?></a><?php else : ?></span><?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="<?php echo esc_attr($orisa_content[$orisa_v]); ?>">
                                    <?php if ($orisa_c['icon']) : ?>
                                        <div class="at-service-card-icon">
                                            <?php echo orisa_img($orisa_c['icon'], 'thumbnail', ['loading' => 'lazy', 'alt' => $orisa_c['title']]); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($orisa_c['title'] !== '') : ?>
                                        <h3 class="h6<?php echo $orisa_dark ? ' text-white' : ''; ?> mt-3"><?php if ($orisa_c['url'] !== '') : ?><a href="<?php echo esc_url($orisa_c['url']); ?>"><?php echo esc_html($orisa_c['title']); ?></a><?php else : ?><?php echo esc_html($orisa_c['title']); ?><?php endif; ?></h3>
                                    <?php endif; ?>
                                    <?php if ($orisa_c['text'] !== '') : ?>
                                        <div class="at-service-card-description">
                                            <p class="<?php echo $orisa_dark ? 'text-white ' : ''; ?>mb-0"><?php echo esc_html($orisa_c['text']); ?></p>
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

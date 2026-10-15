# PAGES.md — сборка 27 страниц (этап 5)

Легенда: блоки — слаги `orisa/blocks/*`; `[ДОБОР]` — секция оригинала без блока (собрать нечем,
добор отдельными блоками после аудита заказчика). Настройки страницы: header_style / footer_style /
hide_*. Шаблон: page.php (Flexible), front-page.php, home/archive/single/search/404.php.

## Главные (front-page.php)

- `index` → vr, logo-marquee, [ДОБОР: sec-4-home-5], [ДОБОР: sec-6-home-1], [ДОБОР: at-sec7], [ДОБОР: at-sec8], posts-preview. header: transparent; footer: standard.
- `index-3` → review, logo-marquee, [ДОБОР: section-fix ×2, home-3-section-10, pt-120 подборки]. header: default; footer: fixed-bottom (в оригинале `<footer>` без класса — отрисуется fixed-bottom; сверить визуально).
- `index-4` → brand, [ДОБОР: sec-3/4/5-home-4 + 3 контейнера]. header: default; footer: standard.
- `index-5` → photos, portfolio-grid, [ДОБОР: sec-4-home-5 + 5 контейнеров]. header: default; footer: standard.
- `index-7` → vr (matter_fx вкл), [ДОБОР: about-me-slider, sec-7/9-home-7, контейнеры]. header: header-7→default; footer: footer-7 (фолбэк fixed-bottom + комментарий).
- `index-9` → brands, stats, portfolio-grid, [ДОБОР: sec-5/6/7-home-9, row, контейнеры], logo-marquee. footer: footer-9 (фолбэк).
- `index-13` → slider, stats-wide, [ДОБОР: sec-3/4/5/6-home-13], testimonials, [ДОБОР: sec-8 + mg-gallery]. footer: footer-13 (фолбэк).
- `index-14` → counter, [ДОБОР: sec-2/3/4(masonry+tabs)/5/6/8/9-home-14], testimonials. footer: footer-14 (фолбэк).

## Внутренние (page.php)

- `about-1` → page-hero, media-text, [ДОБОР: at-item-anime, section-fix, pt-120], logo-marquee, contact(только форма? — нет: about-1 содержит sec-4-about-form → contact без инфо? Отдельно: форма выведена блоком contact). footer: fixed-bottom.
- `about-2` → page-hero, media-text ×?, [ДОБОР], logo-marquee (moving-gallery). footer: fixed-bottom.
- `services-cards` → page-hero, media-text, services-cards, [ДОБОР: swiper-лента→logo-marquee]. footer: fixed-bottom.
- `services-4` → services-list (svc4 целиком), [ДОБОР: контейнеры/swiper]. footer: fixed-bottom.
- `services-details` → service-base. footer: fixed-bottom.
- `services-details-4` → service-details. footer: fixed-bottom.
- `portfolio-2/3` → page-hero, portfolio-grid, [ДОБОР: sec-7-about]. footer: fixed-bottom.
- `portfolio-details-4` → portfolio-details. `case-gallery` → case-gallery. footer: fixed-bottom.
- `pricing-3` → page-hero?, pricing. `pricing-4` → pricing, faq (pricing-4-faq__grid). footer: fixed-bottom.
- `team` → page-hero, team. footer: fixed-bottom.
- `faqs` → page-hero, faq, [ДОБОР: scroll-section sec-3, sec-4]. footer: fixed-bottom.
- `contact-2` → page-hero, contact, logo-marquee. footer: fixed-bottom.
- `coming-soon` → coming-soon (hide_header/hide_footer — сверить с оригиналом: шапка/подвал есть → не скрывать).
- `404` → шаблон 404.php (без блоков).

## Блог (нативно)

- `archive-2` → home.php (записи, рубрики, пагинация). `blog-details` → single.php (редактор + миниатюра).
- Поиск → search.php. Рубрики/теги — штатно.

## Чеклист по блокам (п.4 чекпоинта 5.4)

- [ ] слаг = имя папки (проверено поиском `get_template_part` + glob загрузчика — все 29 совпадают);
- [ ] весь видимый текст в ACF (проверено grep `ЗАКРОЙДОЛГИ|Orisa` в blocks/ — только alt-фолбэки get_bloginfo);
- [ ] нет зашитых `assets/...` у контента (grep `src="assets/` по blocks/ — 0);
- [ ] всё экранировано (см. скан ниже);
- [ ] пустые поля не ломают (if-обёртки; проверено чтением каждого template);
- [ ] классы 1:1 (скелетные сверки faq/hero-3; остальные — выборочно при QA);
- [ ] `enabled`/`anchor` работают (цикл page.php + orisa_anchor/orisa_block_enabled);
- [ ] `php -l` чисто (все файлы, каждый этап).

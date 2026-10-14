# CLEANUP.md — базовые цифры и журнал чистки (этап 0–1)

Метод подсчёта: PowerShell `Get-ChildItem -Recurse -File` (все файлы, без `.git`).
Правила CSS = число вхождений `{` в файле (`Select-String -Pattern '\{'`, `.Count`).

## 0. Baseline (до любых правок, коммит `baseline`)

- Всего: **1499 файлов, 207.2 МБ** (включая `graphify-out/` ~8 МБ и `REPORT.md`; сам шаблон ~1497 файлов).
- HTML: 27 в корне + 61 в `oldpages/` = 88 (состав сверен со списком из PROMPT 0.1 — совпадает полностью).
- CSS: 19 файлов (см. размеры ниже), `main.css`: 1 040 КБ / 43 787 строк / **8766 `{`**.
- JS: 67 файлов (см. размеры ниже), `main.js`: 138 КБ / 3 255 строк / 58 модулей (оглавление в шапке файла).
- Шрифты: 210 файлов, 17.9 МБ. Картинки: `imgs/` 778 (110.1 МБ), `images/` 230 (33.3 МБ), `gif/` 3 (11.6 МБ).

### Размеры CSS (КБ)
main.css 1040; vendors/font-awesome-pro.css 455; bootstrap.min.css 227 (корень) / vendors/bootstrap.min.css 227;
vendors/swiper-bundle.min.css 18; venobox.min.css 15; swiper.min.css 14; leaflet.css 14;
vendors/spacing.css 11; vendors/magnific-popup.css 7; nice-select.css 4; vendors/odometer.css 4;
agina-icons.css 3; vendors/nice-select.css 3; meanmenu.css 3; sticky-cards.css 2;
leaflet-gesture-handling.css 1; vendors/carouselTicker.css 1.

### Размеры JS (КБ)
three.js 1744; vendors/swiper-bundle.min.js 259; vendors/plugin.js 175; swiper.min.js 152; leaflet.js 144;
main.js 138; jquery.min.js 85 (корень) / vendors/jquery-3.7.1.min.js 85; matter.js 79;
bootstrap.bundle.min.js 79; gsap.min.js 69; vendors/bootstrap.min.js 59; vendors/jquery.elevatezoom.js 57;
gsap-custom-animations.js 41; gsap-scroll-trigger.min.js 40; leaflet-gesture-handling.js 35;
isotope.pkgd.min.js 35 (корень) / vendors/isotope.pkgd.min.js 35; barba.min.js 31;
vendors/jquery.magnific-popup.min.js 20; vendors/ripple-2.js 16; venobox.min.js 16;
vendors/image-hover-effects.js 16; vendors/parallax.js 16; gsap-split-text.min.js 15;
gsap-scroll-smoother.js 12; slideshow-vista.js 12; slideshow-horizontal.js 11; meanmenu.js 11;
slideshow-stack.js 11; slideshow-cinema.js 10; slideshow-split.js 10; throwable.js 10;
slideshow-curtain.js 9; gsap-custom-easc.min.js 9; horizontal-scroll-gallery.js 9; vanilla-tilt.min.js 9;
services-details-2.js 8; slideshow-zstack.js 8; at-cursor.js 8; services-4.js 7; window-shape-animation.js 7;
webgl.js 6; magiccursor.js 6; services-details-3.js 6; vendors/jquery.carouselTicker.min.js 6;
imagesloaded-pkgd.js 5 (корень) / vendors/imagesloaded-pkgd.js 5; cursor-trail.js 5;
services-details-4.js 5; sticky-cards.js 5; team-2.js 5; hover-effect.umd.js 5; about-4.js 5;
vendors/jquery.appear.js 4; gsap-scroll-to-plugin.min.js 4; jquery.nice-select.min.js 3;
vendors/nice-select.js 3; preloader.js 3; services-details-5.js 3; tj-img-distortion.js 3;
services-5.js 1; pricing-3.js 1; pricing-5.js 1 (2 КБ по ls — округление); img-revel/index.js 1;
vendors/color-modes.js 2.

## 1. Этап 1а — удаление (журнал ниже)

Карта ссылок: скрипт `C:\Temp\opencode\linkmap.py` (не в репозитории): 27 HTML (`src|href|poster|content|srcset|data-*`,
`url()`), `url()` из всех CSS (с нормализацией `../` → `assets/`), строковые пути `assets|oldpages` из всех JS.
Сопоставление с URL-декодированием и нижним регистром. По ходу найдены и исправлены 2 бага подсчёта
(CSS-относительные пути, `srcset`) — проверялось позитивным контролем (`favicon-dark.svg` найден).

### Удалено целиком
- `oldpages/` — 61 файл, 7.5 МБ.
- `graphify-out/` — 99 файлов, 8.6 МБ (диагностический артефакт, не шаблон; в git не трекался).
- `README.md` шаблона (3 КБ).

### Удалено по карте ссылок (0 ссылок с 27 страниц/CSS/JS): 664 файла, 114.9 МБ
- CSS (9): `css/{agina-icons,bootstrap.min,leaflet,leaflet-gesture-handling,meanmenu,nice-select,sticky-cards,swiper.min,venobox}*.css`.
- JS (40): agina-стек (`three.js`, `gsap*`×7, `meanmenu`, `swiper.min`, `magiccursor`, `venobox.min`,
  `hover-effect.umd`, `webgl`, `preloader`, `window-shape-animation`, `vanilla-tilt.min`, `tj-img-distortion`,
  `img-revel/index.js`, `jquery.min`, `bootstrap.bundle`, `isotope.pkgd.min`(корень — байт-дубль vendors),
  `imagesloaded-pkgd.js`(корень), `jquery.nice-select.min`(байт-дубль)), `leaflet*.js`×2, `barba.min.js`,
  `sticky-cards.js`, `slideshow-*.js`×7, `horizontal-scroll-gallery.js`, `cursor-trail.js`, `about-4.js`,
  `team-2.js`, `services-5.js`, `services-details-2/3/5.js`, `pricing-5.js`.
- Видео: `assets/videos/h1-hero*.mp4` (9.9 МБ).
- Картинки: весь `assets/images/` (~225 файлов — ноль ссылок; включая `gpt-image*`, `error.webp`),
  `assets/gif/*` (3), `assets/hero1.jpg`, `assets/images/hero1.jpg`, `assets/imgs/pages/{img-*.webp,home-6,home-8,home-10,home-11,home-12,home-15,product,slideshow,…}`,
  `assets/imgs/icons/logo-*.svg,brand-7..9.webp,check.svg,cross-out.webp,badge-1.svg` и др. (полный список —
  `git show --stat`), всего ~600 файлов.
- Оставлено из `assets/imgs/`: `template/` (логотипы, hero, аватары, brand-logos), `icons/star-2.svg,title-arrow.svg`,
  `zakroydolgi/{hero,icons,users}` (79 ссылок — используется), `video/` (live-bg.mov, video-1.mp4).

### Шрифты: 210 → 70 файлов (17.9 → ~3.9 МБ)
- Удалены: все `*@h2n5xr` (4), `demo.html`, `stylesheet.css`, все `.eot` (52), все `.ttf` с woff2/woff-парой (82),
  целиком Bebas-italic семейства без `@font-face` (BookItalic, ExpandedLightIt, ExpandedThin, Italic,
  SemiExp*Italic, Thin, ThinItalic — 44 файла).
- Переписан `src` в `@font-face`: `main.css` (−123 url-сегмента + 39 пустых `src:;`), `font-awesome-pro.css`
  (−19 сегментов; удалены 4 пустых `@font-face`: thin-100/duotone-900/v4compatibility — файлов не было).
- Проверка: `fontverify.py` — 0 висячих `url()`, все `@font-face` с ≥1 src, баланс `{}`/`}`.
- Реально используемые гарнитуры: Cera Pro (Regular/Medium/Bold/Black + italics, `.woff`), Bebas Neue Pro
  (Regular/Book/Light/Middle/Bold + Expanded/SemiExp ширины, `.woff2+.woff`), FA 6 Pro light-300/solid-900
  (+regular-400/brands-400 — файлы оставлены, используются ли — см. сомнительное; в HTML только `fa-xmark`,
  в `main.js` — `fa-plus/fa-solid`).

### Сомнительное — оставлено
- `vendors/jquery.elevatezoom.js` (57 КБ): подключён на всех 27, но ни `main.js`, ни другие JS его не вызывают,
  товарных страниц больше нет. Файл есть, тег есть. Кандидат на удаление в 1в/этапе 2 (исключить из enqueue).
- `vendors/color-modes.js` + тумблер `.dark-light-switcher input#switch` (есть на всех 27 — **рабочий
  переключатель найден**, вопреки допущению «только светлая»). НЕ удалён, сообщается по правилу.
  Файлы/теги на месте; решение — вопрос №1 к заказчику.
- `at-cursor.js` — на всех 27, оставлен (тумблер будет в Options на этапе 2).
- FA `regular-400/brands-400` (4 файла, ~100 КБ): в HTML/JS прямых классов не видно; оставлены до 1б
  (там чистятся `@font-face`).

### Битые ссылки на удалённые страницы (не правились, по правилу; заменятся полями ACF)
- 2009 ссылок `*.html` на 61 удалённую страницу (меню, футеры, карточки, пагинации): каждая home-демо
  ~26 ссылок; лидеры: `team-details.html` 108, `portfolio-1.html`/`contact-1.html` 83,
  `portfolio-details-1.html` 70, `pricing.html`/`archive-1.html` 58–59, `product-*` 26–48.
- Плюс `services.html` (6 ссылок в index-13/14): такой страницы **не было и до чистки** — битая ссылка оригинала.

### Итог 1а
- Было: 1499 файлов / 207.2 МБ. Стало: **536 файлов / 68.0 МБ** (−963 файла, −139 МБ).
- `assets/`: 1309 → 505 файлов. Шрифты 210 → 70. Видео: только `assets/imgs/video/` (2 файла).
- Отклонение от PROMPT 1а.3: `color-modes.js` и переключатель НЕ удалены (переключатель существует).

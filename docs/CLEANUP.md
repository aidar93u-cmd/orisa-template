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

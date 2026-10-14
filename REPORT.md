# REPORT.md — Диагностика HTML-шаблона Orisa перед переносом в WordPress + ACF

Дата: 2026-10-15. Только диагностика: в проекте ничего не менялось.
Метод: статический анализ 88 HTML-файлов, `assets/css`, `assets/js` (grep по классам/путям,
сравнение md5-дубликатов, хеширование header/footer-блоков). Где уверенности нет — помечено «не уверен».

## Краткое резюме

- Шаблон **Orisa v5.0.0 (AliThemes)**, `assets/css/main.css:1-7` — статическая вёрстка без сборщика.
- На диске **88 страниц**: 27 в корне + 61 в `oldpages/` (README.md говорит «87» — расхождение, см. п.1).
- 86 страниц сидят на одном стеке (9 CSS + 18–21 JS); 1 страница (`oldpages/index-agina-landing.html`)
  использует **другой стек** — похоже на остаток другого шаблона (Agina).
- Шапка и подвал **байт-в-байт одинаковы на 43–52 страницах** — готовые кандидаты в `header.php`/`footer.php`.
- Dark/light-пары (`index-10` vs `index-10-dark` и т.д.) различаются **двумя строками** (`<html lang … data-bs-theme>`).
  Отдельные тёмные шаблоны в WP не нужны.
- Главный жир: `assets/imgs/pages/` — 640 файлов, 97.6 МБ; `assets/css/main.css` — 1 040 КБ / 43 787 строк;
  `font-awesome-pro.css` — 455 КБ при горсти используемых иконок.
- Формы везде `action="#"` — бэкенда нет. Инлайн-стилей 18 шт, инлайн-`<script>`/`<style>` — 0.
- Контент в основном русскоязычный, но `lang="ru"` стоит только в `index.html`, у остальных `lang="en"`.

---

## 1. Структура проекта

```
orisa-template/  ~207 МБ, 1497 файлов
├── *.html                    27 страниц + README.md (3 КБ)
├── oldpages/                 61 страница (legacy-демо)
├── REPORT.md                 этот файл
├── graphify-out/             граф проекта (не часть шаблона, ~8 МБ)
└── assets/                   1309 файлов, ~188.5 МБ
    ├── css/                  18 файлов, 2.0 МБ (main.css 1 040 КБ + корневые копии библиотек)
    │   └── vendors/          8 файлов (рабочий стек: bootstrap, swiper-bundle, FA-pro, …)
    ├── js/                   67 файлов, 3.6 МБ (main.js 138 КБ + постраничные + корневые копии)
    │   ├── vendors/          16 файлов (рабочий стек)
    │   └── img-revel/        index.js (1 КБ)
    ├── fonts/                210 файлов, 17.9 МБ (Bebas Neue Pro, Cera Pro, остатки FA)
    ├── images/               230 файлов, 33.3 МБ (сомнительная папка, см. п.4)
    ├── imgs/                 778 файлов, 110.1 МБ
    │   ├── pages/            640 файлов, 97.6 МБ (контент страниц)
    │   ├── template/         74 файла, 2.4 МБ (логотипы, hero)
    │   ├── zakroydolgi/      34 файла, 8.1 МБ (имя не из шаблона — 79 ссылок, используется)
    │   ├── icons/            28 файлов, 0.1 МБ
    │   └── video/            2 файла, 1.9 МБ (video-1.mp4, live-bg.mov — используются)
    ├── gif/                  3 файла, 11.6 МБ
    └── videos/               2 файла, 9.9 МБ (h1-hero.mp4, h1-hero-2.mp4 — ссылок в HTML не найдено)
```

HTML-страницы (88; README.md:28-40 заявляет 87 — **не уверен** какая лишняя, нужен diff с оригиналом):

| Группа | Корень (27) | oldpages/ (61) |
|---|---|---|
| Home | index, index-3/4/5/7/9/13/14 | index-2/6/8/10/11/12/15 + dark-пары к 2–15, index-dark, index-agina-landing |
| About | about-1, about-2 | about-3/4/5 |
| Pricing | pricing-3, pricing-4 | pricing, pricing-2/5 |
| Services | services-3/4, services-details, services-details-4 | services-1/2/5, services-details-2/3/5 |
| Team | team | team-2, team-details |
| Portfolio | portfolio-2/3, portfolio-details-4/6 | portfolio-1/4/5/6, cinema/split/stack/curtain/zstack/vista/horizontal/gallery, details-1/2/3/5 |
| Shop | — | product-archive/details/cart/checkout |
| News | archive-2, blog-details | archive-1/3/4 |
| Contact | contact-2 | contact-1 |
| Прочее | 404, coming-soon, faqs | — |

Сборщик/препроцессор: **нет**. В корне нет `package.json`, `gulpfile.js`, `webpack/vite`-конфигов,
`composer.json`, PHP-файлов. `download_missing.sh` из README.md:28-40 **на диске отсутствует** —
README устарел (описывает также `assets/images/*`, `assets/videos/*`, которых в такой структуре нет;
реально есть `assets/imgs/*`, `assets/images/*` и `assets/videos/*` одновременно).

Подключённые библиотеки (все локальные, CDN для библиотек нет; внешние URL — только соцсети,
`wa.me/79275558811`, youtube, `w3.org/svg`):

| Библиотека | Версия | Файлы | Откуда версия |
|---|---|---|---|
| Bootstrap CSS+JS | **5.3.8** | `assets/css/vendors/bootstrap.min.css`, `assets/js/vendors/bootstrap.min.js` | заголовок файлов |
| jQuery | **3.7.1** | `assets/js/vendors/jquery-3.7.1.min.js` | имя файла |
| Isotope | **3.0.6** | `assets/js/vendors/isotope.pkgd.min.js` (+байт-идентичная копия `assets/js/isotope.pkgd.min.js`) | заголовок файла |
| Swiper | не уверен | `assets/js/vendors/swiper-bundle.min.js` + `assets/css/vendors/swiper-bundle.min.css` | в первых строках версии нет; смотреть `Swiper.version` в рантайме |
| GSAP + ScrollTrigger/SplitText/Smoother | не уверен (только agina-страница) | `assets/js/gsap*.js` | заголовки минифицированы без версии |
| Three.js 1 744 КБ | не уверен (только agina-страница) | `assets/js/three.js` | не проверял `THREE.REVISION` |
| Leaflet | не уверен, **похоже мёртв** | `assets/js/leaflet.js`, `assets/css/leaflet*.css` — 0 ссылок из HTML | см. п.4 |
| Barba.js | не уверен, **похоже мёртв** | `assets/js/barba.min.js` — 0 ссылок | см. п.4 |
| FA Pro CSS 455 КБ | FA 6 Pro | `assets/css/vendors/font-awesome-pro.css` | `@font-face`-семейства внутри |
| Прочее (vendors/) | — | carouselTicker, magnific-popup, odometer, appear, elevatezoom, nice-select, parallax, ripple-2, imagesloaded, image-hover-effects, plugin.js (175 КБ, состав не разбирал — **не уверен** что внутри), color-modes.js (Bootstrap dark-mode) | по именам файлов |

Стандартный набор страницы (86 из 88): 9 CSS (`index.html:2-10`:
carouselTicker, bootstrap, swiper-bundle, nice-select, font-awesome-pro, magnific-popup, odometer,
spacing, main.css) + 18 базовых JS (`index.html`, конец файла: color-modes, jquery-3.7.1, plugin,
bootstrap, swiper-bundle, carouselTicker, magnific-popup, odometer, appear, elevatezoom, nice-select,
parallax, ripple-2, imagesloaded, isotope, image-hover-effects, at-cursor, main.js) + 0–3
постраничных скрипта. Исключения: `oldpages/index-15.html` (+sticky-cards.css, sticky-cards.js,
matter.js, throwable.js), `oldpages/index-agina-landing.html` (свой стек из 7 CSS + 24 JS, см. п.4).

---

## 2. Страницы и общие элементы

Формат ниже: `файл | строки <main> | блоки 1-го уровня внутри <main> (строка:класс)`.
Классы `sec-*` — именованные секции; `container` — типовые контентные блоки без своих стилей.

### 2.1. Корневые страницы (27)

- `404.html` | main 581–725 | `container@584` (hero 583: `.sec-1-404`), `container@648` (`.sec-2-404`)
- `about-1.html` | main 581–1529 | container(hero), `.at-item-anime-area@627`, container×3, декор@941, `.pt-120@965`, container@1103, `.section-fix@1274`, `.carouselTicker@1440` (бренды)
- `about-2.html` | main 581–1318 | container×4, `.moving-gallery.carouselTicker@1066`, container×2
- `archive-2.html` | main 581–956 | container@584 (список), container@915
- `blog-details.html` | main 581–798 | container@584 (`.sec-1-blog-details`), container@708 (`.sec-2-blog-details`)
- `coming-soon.html` | main 581–698 | container@584, `.at-banner-thumb@615`, container@621 (форма + countdown `data-countdown`, JS `assets/js/main.js:≈гл.34`)
- `contact-2.html` | main 581–843 | container@584 (`.sec-1-contact`), `.moving-gallery@816`
- `faqs.html` | main 581–1096 | container@584 (`.sec-1-faqs`), container@628 (`.sec-2-faqs`), `.scroll-section@708` (`.sec-3-faqs`), container@1057 (`.sec-4-faqs`)
- `index.html` | main 358–2194 | `.sec-1-home-7@363` (hero), container@380, `.carouselTicker@637`, container@755, `.sec-4-home-5@938`, `.sec-6-home-1@1129`, `.at-sec7-area@1448`, `.at-sec8-area@1577`, container×2, `.carouselTicker@1858`, container, декор@2038, container@2084. Главная собрана из секций демо home-7/5/1.
- `index-3.html` | main 587–2082 | декор, container(hero `.sec-1-home-3@614`? — в spike: `container pt-xxl-0 pt-110@614`; явный `.sec-1-home-3@589` виден в sec-div списке, строка 589), `.carouselTicker@730`, container×2, `.section-fix@969`, `.pt-120@1209`, container, декор, container×2, декор, `.pt-120@1590`, `.home-3-section-10@1728`, `.section-fix@1875`, container@2041
- `index-4.html` | main 613–1762 | `.sec-1-home-4@616`, container@779, `.sec-3-home-4@924`, `.sec-4-home-4@1065`, `.sec-5-home-4@1265`, container×3
- `index-5.html` | main 582–1669 | декор@586, `.sec-1-home-5@610`, `.sec-2-home-5.portfolio-area@654`, container@852, `.sec-4-home-5@987`, container×5
- `index-7.html` | main 587–1668 | `.sec-1-home-7@592-602`, container×2, `.swiper.about-me-slider-active@837`, container×3, container-fluid×2, container, container-2200×2, `.sec-7-home-7@1280`, container, `.sec-9-home-7__row@1413/1465`, container×2. Доп. JS: `matter.js` + `throwable.js` (интерактив hero).
- `index-9.html` | main 587–1469 | `.sec-1-home-9@592-646`, `.sec-2-home-9@686`, `.row@726`, `.sec-4-home-9.filter-portfolio@794`, `.sec-5-home-9@987`, `.sec-6-home-9@1052` (header 1051/footer 1149 внутри), `.sec-7-home-9@1180`, container×3, `.moving-gallery@1454`
- `index-13.html` | main 588–1700 | `.sec-1-home-13@595-601`, `.sec-2-home-13@761`, `.sec-3-home-13@892-919` (+`.at-btn-group@903`), `.sec-4-home-13@1053-1073` (+glow), `.sec-5-home-13@1108-1193` (карточки, header 1106 + 5× card-head), `.sec-6-home-13@1220-1248` (timeline), `.sec-7-home-13@1368` (swiper-слайдер цитат 1368 + контент 1383 + 3× quote-foot 1409/1442/1475), `.sec-8-home-13@1516-1548` (+at-service-btn), `.mg-gallery-area@1624`; footer `.footer-13` (строка 1703)
- `index-14.html` | main 601–1872 | sec-1..sec-9-home-14 по порядку (604, 688, 778, 914, 1149, 1297, 1386, 1564, 1721); внутри: tabs 952, masonry 980, slider-swiper 1420, ticker 1599, roster 1643, gallery 1758; footer `.footer-14` (1875)
- `portfolio-2.html` | main 581–844 | container×3 (`.sec-1-portfolio-2@583`, `.sec-7-about@762`)
- `portfolio-3.html` | main 581–895 | container×3
- `portfolio-details-4.html` | main 581–843 | `.row@585`, `.sec-1-portfolio@596`, `.border-bottom-100@610`, `.sec-2-portfolio@617`, `.row@761`, `.sec-4-portfolio@779`, container@818
- `portfolio-details-6.html` | main 581–897 | container@585, `.sec-1-portfolio@617`, row×2 + `.swiper-wrapper@671`, row, `.text-center@726`, row×2, `.sec-6-portfolio@796`, text-center, row
- `pricing-3.html` | main 581–842 | `.pricing-3-grid@596`, `.pricing-3-testimonial__viewport@697`. Доп. JS `assets/js/pricing-3.js` (1 КБ)
- `pricing-4.html` | main 581–823 | `.pricing-4-hero@586`, `-steps@598`, `-board@636`, `-project@690`, `-faq__grid@728`
- `services-3.html` | main 581–1027 | `.bg-neutral-50@584` (`.sec-1-services@583`), container@619, декор@703, container×3 (`.sec-2-about@702`, `.sec-7-about@945`), `.swiper@914`, container@946
- `services-4.html` | main 581–1095 | container@585, `.svc4-index__head@633`, `.svc4-float@654`, `.accordion@658`, `.row@865`, `.svc4-process@888`, `.svc4-engage__contact@947`, container@963, `.swiper@982`, container@1014. Доп. JS `assets/js/services-4.js` (7 КБ)
- `services-details.html` | main 581–1022 | container@584, `.swiper@641`, `.section-fix@674`, container@785, декор@887, container×2
- `services-details-4.html` | main 578–776 | `.sd4-hero__meta@582`, `__row@592`, `__gallery@612`, `.sd4-practice__head@629`+`grid@633`, container@661, `.sd4-flow__wrap@665`, `.sd4-deliver__grid@706`, `.sd4-cta__band@748`, `.sd4-next@768`. Доп. JS `assets/js/services-details-4.js` (5 КБ)
- `team.html` | main 581–972 | container@584 (`.sec-1-services`), `.at-banner-thumb@599`, декор@605, `.pt-120@629`, container×2

### 2.2. oldpages/ (61) — кратко по семействам

Структуры внутри семейств совпадают полностью; dark-пары отличаются только `<html>`-тегом
(проверено: `index-10.html` vs `index-10-dark.html` — diff 2 строки: `lang` + `data-bs-theme`):

- home-варианты 2/3/4/5/6/7/8/10/11/12/13/14/15 (±dark): свои `sec-N-home-M` / именованные блоки
  (`home-2-section-11/12`, `at-hero-area-home-6-bg`, `h8-*`, модалка `modal-dialog@647` в index-11,
  `footer-8/10/11/12__form` с `action="#"`). index-13/14-dark идентичны корневым index-13/14.
- `index-dark.html`: hero `at-hero-bg@587` + `sec-6-home`, `at-sec7/8/9`, тикеры.
- `index-agina-landing.html`: чужой стек (см. п.1), блоки `h3-hero-section@221`, `window-shape-img@315`,
  `scroll-slider@587/1110`, `tj_btn_text@1382`. Форма `action="index.html"` — единственная не-`#`.
- about-3/4/5: about-3 — типовые контейнеры + `mg-gallery-area`; about-4 — 11 именованных блоков
  `about-4-hero/proof/beliefs/craft/space/cta` + `about-4-float` (+JS `about-4.js`); about-5 —
  `about-5-hero/chapters/people/nodes/cta` (горизонтальный track 632).
- portfolio-cinema/curtain/horizontal/split/stack/vista/zstack: `<main>` 577–610 — контент почти
  целиком собирается JS-слайдшоу (`slideshow-*.js`, по 1 файлу на страницу); статической разметки
  секций почти нет. portfolio-gallery: `hsg-intro/hsg-bg/hsg-track` + `horizontal-scroll-gallery.js`.
- portfolio-details-1/2/3/5, pricing/2/5, services-1/2/5, services-details-2/3/5, team-2/team-details,
  product-*: именованные BEM-блоки (`sd2-hero/modules/pipeline/stack/cta/next`, `sd3-hero/out/runway/tracks`,
  `sd5-hero/marquee/map/offers/process`, `team2-hero/roster/disc/cta`, `svc5-hero/map/process/engage/cta`,
  `pricing-2-plans/custom/table/cta`, `pricing-5-card`, `checkout-billing__form`, `product-*`),
  у каждого свой JS-файл 1–8 КБ (см. п.1, refmap).
- contact-1, archive-1/3/4: типовые контейнеры (как корень).

### 2.3. Повторяется на всех/многих страницах → кандидаты в глобальное

| Элемент | Строки (index.html) | Охват | Кандидат |
|---|---|---|---|
| `<header>`: логотип (`at-header-logo`, `assets/imgs/template/logo/favicon-dark.svg`), меню 16 пунктов (`at-mobile-menu-active`, 111), кнопка поиска (`at-search-click`, 127), бургер (`at-menu-bar`, 148) | 95–173 | header-блок байт-идентичен на **43 стр.** (md5 `7a47…`; пары light/dark делят хеш) | `header.php` + меню WP (`wp_nav_menu`) |
| Оверлей поиска: `at-search-body-overlay@33`, форма `at-search-form@53` | 33–58 | класс есть везде, где есть шапка (проверено наличие на всех 88 — `offcanvas` 88/88; search-разметка идёт в том же чанке) | часть header; обработчик в `main.js` («12. Search Js») |
| Offcanvas ×2: `at-offcanvas-area@174`, `at-offcanvas-2-area@282` (контакты, соцсети, галерея `sec-2-home-5__avatar-sm`) | 174–349 | 88/88 | `header.php`/отдельный template-part; телефоны/соцсети (`wa.me/79275558811` захардкожен) → Options Page |
| Footer: `.footer-fixed-bottom` (строка 730 в 404.html) у контентных; именные `.footer-7/9/13/14`, `.container-2200` у демо | 2196 (index) | footer-блок идентичен на **52 стр.** (md5 `ac…`) | `footer.php`; формы `footer-*__form action="#"` → CF7/Fluent + Options |
| `.at-hero-social` | 2218 (index) | 58/88 | template-part «соцпанель» (Options: ссылки) |
| Кнопка наверх `#back_to_top` | 2380–2381 | везде с футером | часть footer |
| `#magic-cursor` | 352 (index) | наличие вне index не проверял — **не уверен** | декор, за gating `prefers-reduced-motion` в WP |
| Cookie-баннер | — | **нет**: слово `cookie` встречается только на 6 стр. (тексты политик: index-13/14 и их dark, index-12±dark) | нужен новый (GDPR) — решение в п.7 |
| Корзина `cartmini` | — | разметки `.cartmini__area` **нет ни на одной странице** (JS-обработчики в `main.js` висят вхолостую) | не переносить обработчики cartmini |

---

## 3. Инвентарь секций

CSS-столбец: `main.css` + файл-исключение. «0 в CSS» = проверено `Select-String` по всем CSS (0 вхождений).
JS-столбец: `assets/js/main.js` (гл.1–58 из шапки файла) + постраничный файл, если есть.
Повторяемость: по хешам блоков и именам классов (выборка; полный построчный diff не делался — **не уверен** в 100% идентичности одноимённых секций на разных home-демо).

| # | Секция (классы) | HTML-файлы | CSS | JS | Страницы | Повтор/вариации | Динамика для редактора | RU-название | Слаг |
|---|---|---|---|---|---|---|---|---|---|
| S01 | `.at-header-area`, `at-mobile-menu-active` (header 95–173 index) | все 88 | main.css | main.js гл.8,11,25 | все | одинакова на 43; варианты: `.header-7/14`, `menu-light`, transparent | лого, пункты меню, кнопка поиска, бургер | Шапка | `header` (global, не блок) |
| S02 | `.footer-fixed-bottom`, `.footer-7/9/13/14`, `.container-2200`, `footer-*__form` | все 88 | main.css (`footer-13` 87 вхожд.) | main.js гл.9 (год) | все | одинаков на 52; варианты по демо | колонки, соцсети, форма подписки, копирайт/год | Подвал | `footer` (global) |
| S03 | `.at-offcanvas(-2)-area` | все 88 | main.css | main.js гл.10 | все | одинаков (идёт с шапкой) | контакты, соцсети, картинки галереи | Мобильное меню | `offcanvas` (global) |
| S04 | `.at-search-*` (оверлей 33–58) | все 88 (в чанке шапки) | main.css | main.js гл.12 | все | одинаков | плейсхолдер, URL поиска WP | Поиск | `search-overlay` (global) |
| S05 | Hero home: `.sec-1-home-7/9/13/14`, `.sec-1-home-4/5`, `at-hero-*`, `home-2-*`, `h8-*` | index*.html | main.css (напр. `sec-1-home-13` 69) | main.js гл.16,39,48–50; page-JS | home | вариации (9+ героев) → **один блок с вариацией** | заголовок, подзаголовок, CTA, медиа/видео (`hero-10/11.webm`, `live-bg.mov`), бейджи | Первый экран | `hero` + `variant` |
| S06 | Лента логотипов `.carouselTicker` (+`moving-gallery`, `at-brand-scroll`, `sec-2-home-15` россыпь `at-brand-item` ×15) | ~все home, about-1, product-archive/details | vendors/carouselTicker.css + main.css | main.js гл.46 | многие | одинаковый паттерн | логотипы (повторитель), направление, скорость | Бегущая строка | `logo-marquee` |
| S07 | Портфолио-сетка `.filter-portfolio` (sec-4-home-9), `portfolio-area`, `alt-portfolio-area` | home, portfolio-*, services-1 | main.css | main.js гл.19,55 `initPortfolioFilter` | многие | вариации сетка/фильтр | карточки (картинка, теги, ссылка), фильтры | Портфолио | `portfolio-grid` |
| S08 | Портфолио-слайдшоу: cinema/curtain/horizontal/split/stack/vista/zstack/gallery | 8 стр. oldpages | main.css (`hsg-track` есть) | `slideshow-*.js` (8–12 КБ каждый), `horizontal-scroll-gallery.js` | по 1 | 7 вариантов → **один блок, variant**; разметки почти нет — контент из JS/картинок | набор изображений, режим слайдоу, подписи | Слайдшоу | `portfolio-slideshow` |
| S09 | Кейс: `portfolio-details-*`, `sec-*-portfolio`, `mg-gallery-area` | 6+2 стр. | main.css | main.js гл.13 (hover) | portfolio-details | 6 вариаций → **один блок** | галерея, описание, мета, next-кейс | Кейс | `portfolio-details` |
| S10 | Услуги список: `svc4-*`, `sec-*-services`, `sec-*-home-3/4` pills | services-* | main.css (`svc4-` 81) | services-4.js | services | вариации | пункты-аккордеон, иконки, ссылки | Услуги | `services-list` |
| S11 | Услуги детально: `sd2/sd3/sd4/sd5-*` (hero/overview/modules/pipeline/stack/cta/next) | services-details* | main.css (`sd2-` 185, `sd4-` 107) | sd-файлы 3–8 КБ | по 1 | 5 вариаций → **один блок** | hero, модули (повт.), шаги, CTA, next | Услуга детально | `service-details` |
| S12 | Тарифы: `pricing-3-grid`, `pricing-4-hero/steps/board/project/faq`, `pricing-2-plans/table`, `pricing-5-card`, `home-2-section-12` | pricing* | main.css | pricing-3.js/5.js, main.js гл.52 (toggle) | pricing | 5 вариаций → **один блок + toggle** | тарифы (повт.), цены, переключатель мес/год, FAQ | Тарифы | `pricing` |
| S13 | Команда: `sec-*-team`, `team2-hero/roster/disc`, `sec-2-home-5__avatar-sm` карточки | team, team-2, team-details, about-5-people | main.css (`team2-` 101) | team-2.js, about-4.js-аналог | team | вариации сетка/ростер | фото, имя, роль, соцсети (повт.) | Команда | `team` |
| S14 | Отзывы: `.testimonial-cart-wrap` ×5–6, `slider-testimonial*`, `sec-7-home-13__media-slider` | index, index-13/14 | main.css (`testimonial-cart` 15) | main.js гл.44–47 (swiper) | home | повтор | цитата, автор, аватар, слайдер | Отзывы | `testimonials` |
| S15 | FAQ: `.sec-*-faqs`, `.accordion` (Bootstrap), `scroll-section` | faqs, pricing-4-faq | **0 в CSS** (только Bootstrap) | bootstrap collapse | faqs, pricing-4 | одинаковый паттерн | вопросы/ответы (повт.) | Вопросы-ответы | `faq` |
| S16 | Блог: архив (`archive-*`), детали (`sec-*-blog-details`) | archive-*, blog-details | **0 в CSS** | main.js гл.41 (sticky sidebar) | news | повтор | посты (WP Query!), сайдбар, пагинация → нативные типы WP | Блог | `blog` (WP-native) |
| S17 | Контакты: `.sec-1-contact`, `.sec-4-about-form` (форма!) | contact-1/2 | **0 в CSS** (`sec-1-contact`) | main.js (валидации не видел — **не уверен**) | contact | форма `sec-4-about-form` reused на about-1/2, contact-2, index-7/15, services-1 → **глобальный блок формы** | поля, получатель, карта | Контакты | `contact` |
| S18 | Магазин: `product-archive/details`, `.cart-list` (7 вхожд. в product-cart), `.checkout-billing__form` | 4 product-стр. | main.css (`cart-list` 9, `checkout-billing` 27) | main.js гл.57 `initShopCart` (guard `if(!$cartList.length)return`) | shop | уникальны | товары/корзина → **WooCommerce, не ACF** (решение п.7) | Магазин | `shop` (Woo) |
| S19 | 404: `.sec-1/2-404` | 404.html (581–725) | **0 в CSS** | matter+throwable (декор) | 1 | — | заголовок, картинка, поиск, CTA | 404 | `not-found` |
| S20 | Coming soon: баннер + `data-countdown` + форма | coming-soon.html (581–698) | **0 в CSS** (проверить `coming` — **не проверено**) | main.js гл.34 | 1 | — | дата, тексты, соцсети | Скоро | `coming-soon` |
| S21 | CTA-полосы: `sd*-cta__panel`, `svc5-cta`, `pricing-2-cta__panel` | services-details, pricing-2, svc5 | main.css | — | многие | один паттерн → переиспользовать | заголовок, кнопка, фон | Призыв к действию | `cta-band` |
| S22 | Заголовок внутр. страницы: `container pt-150 + sec-1-*` | все внутр. | **0 в CSS** | — | все внутр. | одинаковый паттерн | заголовок, крошки, отступы | Шапка страницы | `page-hero` |
| S23 | Соцпанель `.at-hero-social` | 58/88 | main.css (1 строка? — замер кривой, **не уверен** в объёме) | — | многие | одинакова | ссылки (Options) | Соцсети | `hero-social` |
| S24 | Футер-форма `footer-*__form`, `sec-*-form` | home-8/10/11/12/13/15, index-7 | main.css | — | home | паттерн один | поля, endpoint | Подписка | часть `footer`/блок `subscribe` |

Секции-дубли под объединение (итого вместо ~40 шаблонов ≈ 20 блоков):
hero (9 героев→1), footers (5+→1), portfolio-details (6→1), services-details (5→1),
pricing (5→1), slideshow (7→1), page-hero/inner-hero (все внутр.→1), CTA (все→1), формы (3 вида→1–2).

---

## 4. Мёртвый код (задача 1 — облегчение)

Уверенность: В=высокая (проверен grep по 88 HTML + `main.js`), С=средняя, Н=низкая. Риск = риск поломки при удалении.

### 4.1. JS/CSS без ссылок (В — проверено картой ссылок по всем страницам)

| Находка | Размер | Уверенность / риск | Комментарий |
|---|---|---|---|
| `assets/js/leaflet.js` (144 КБ) + `assets/css/leaflet.css` (14 КБ) + `leaflet-gesture-handling.js` (35 КБ) + `.css` (1 КБ) | ~194 КБ | В / низкий | 0 ссылок из HTML, `main.js` не упоминает. Карт на страницах нет (контакты без карты). Удалять. |
| `assets/js/barba.min.js` (31 КБ) | 31 КБ | В / низкий | 0 ссылок, `main.js` не упоминает. Page-transition отсутствует. Удалять. |
| `assets/js/jquery.nice-select.min.js` (3 КБ) | 3 КБ | В / низкий | Байт-идентичен `vendors/nice-select.js` (md5 совпал), нигде не подключён. Удалять. |
| `assets/js/isotope.pkgd.min.js` (35 КБ, корень) | 35 КБ | В / низкий | Байт-идентичен vendors-копии; подключена только vendors-копия. Удалять. |
| `assets/js/imagesloaded-pkgd.js` vs `vendors/imagesloaded-pkgd.js` (5.6 vs 5.5 КБ) | 5.6 КБ | В / низкий | Подключена vendors-копия; корневая отличается на 100 байт (версии?) — сверить, удалить одну. |
| `assets/css/bootstrap.min.css` (корень, 233 КБ) vs `vendors/bootstrap.min.css` (232 КБ) | 233 КБ | В / низкий | Корневая подключена **только** agina-страницей. При удалении agina — удалить. |
| Весь agina-стек (~30 файлов: `css/{bootstrap,agina-icons,swiper,venobox,nice-select,meanmenu}.min.css`, `js/{gsap*,three,meanmenu,swiper.min,magiccursor,venobox,hover-effect,webgl,preloader,window-shape-animation,vanilla-tilt,tj-img-distortion,img-revel/index,imagesloaded,isotope,jquery.min,bootstrap.bundle}.js`) | ~2.8 МБ (three.js 1.7 МБ — самый тяжёлый файл проекта) | В / низкий **если** страница не нужна | Все 30 используются только `oldpages/index-agina-landing.html`. Решение в п.7. |
| `assets/css/sticky-cards.css` (2 КБ) + `assets/js/sticky-cards.js` (5 КБ) | 7 КБ | В / низкий | Только `oldpages/index-15*.html`. При переносе — грузить условно или удалить со страницей. |
| `assets/js/slideshow-*.js` (7 шт.), `horizontal-scroll-gallery.js`, `cursor-trail.js`, `about-4.js`, `team-2.js`, `services-*.js`, `pricing-*.js` | 1–12 КБ каждый | В / низкий | По 1–2 страницам каждый — не мёртвые, но грузить **условно** (сейчас каждый грузится только на своей — уже ок). |
| `matter.js` + `throwable.js` (79+10 КБ) | 89 КБ | В / низкий | Только 6 стр.: 404, coming-soon, index-7±dark, index-15±dark. Оставить, грузить условно. |
| `at-cursor.js` (8 КБ) на 87 стр. + `#magic-cursor` | 8 КБ | С / низкий | Кастомный курсор — спорная польза; elm наличия вне index не проверял. Кандидат на выключение в WP (настройка). |
| Ветки `main.js`: cartmini-обработчики (`.cartmini__area` нет в HTML), `initPortfolioFilter`/`initProductDetails` (селекторов в HTML не видно — **не уверен**, имена функций в HTML и не должны быть) | — | С (cartmini) / Н (остальное) | cartmini-ветки не стреляют (селекторы пустые); `initShopCart` корректно guarded (`if (!$cartList.length) return`, main.js гл.57). Не трогать без рантайм-проверки. |

### 4.2. Картинки/видео/шрифты

| Находка | Уверенность / риск | Комментарий |
|---|---|---|
| `assets/videos/h1-hero*.mp4` (9.9 МБ) — ссылок `h1-hero` в HTML нет; видео в шаблоне лежат в `assets/imgs/video/` (`live-bg.mov`, `video-1.mp4` — используются: index-2, home-10) | С / низкий | Похоже на дубли другой версии. Проверить поиском `h1-hero` по всему проекту (сделано для HTML; CSS/JS не проверены — **не уверен**). |
| `assets/images/` — до ~185 файлов без совпадений по имени (`gpt-image*` — 0 ссылок везде: **точно мёртвые**; `error.webp`, `about-gallery-*` — 0 в HTML) | С для gpt-*/error; Н для остальных (имена с пробелами/скобками в HTML url-кодированы — мой поиск мог пропустить) / средний | `assets/images/` не похожа на папку шаблона (AI-картинки, фото). Подозрение: примесь другого проекта. Нужен визуальный аудит + точный поиск по url-encoded именам. |
| `assets/imgs/*.webp img-01…08` — 0 ссылок | Н / средний | Могли пропустить из-за кодирования; либо превью неиспользуемых демо. Не удалять без проверки. |
| `zakroydolgi/` (34 файла, 8.1 МБ) | Используется (79 ссылок) — **не мёртвое** | Имя не из шаблона (рус.). При переносе переименовать в `content/` с редиректами не нужно (локальные относительные пути) — но имя лучше нормализовать. |
| `agina-icons.eot/svg/ttf/woff@h2n5xr` (4 файла, `assets/fonts/`) | В / нулевой | Мусор даунлоадера (суффикс query-строки). Удалять. |
| `fa-thin-100`, `fa-duotone-900`, `fa-v4compatibility` — файлов нет, классы `fa-thin/fa-duotone` в HTML: 0 (проверены корень и oldpages) | В / нулевой (ничего не делать) | 404 только если браузер запросит; раз классы не используются — не запрашивает. README прав. Можно вычистить `@font-face`-блоки из FA-css (экономия копеечная, риск низкий). |
| `font-awesome-pro.css` 455 КБ при ~горсти иконок (соцсети) | С / средний | Замена на subset/free-solid + SVG соцсетей — отдельная задача; в рамках «минимум» — оставить. |
| `*.eot` (52 шт.) | С / низкий | EOT нужен только IE≤11. Весь стек (Bootstrap 5.3, Swiper) IE не поддерживает — EOT можно сносить. |

### 4.3. CSS-правила

- `main.css` 1 040 КБ / 43 787 строк; `!important` — 281 шт. (много, но трогать опасно).
- Классы-заглушки без правил: `sec-1/2-404`, `sec-*-faqs`, `sec-*-blog-details`, `sec-1-contact`,
  `sec-1-archive` — **0 вхождений во всех CSS** (проверено). Безвредны; в WP станут обёртками блоков —
  не удалять из HTML при переносе, просто знать.
- Полный unused-CSS аудит (PurgeCSS по 88 страницам) не делался — **не уверен** в доле мёртвых правил;
  оценка «на глаз» для таких шаблонов 20–40%, но подтверждать надо инструментом.

### 4.4. Вывод: стоит ли чистка и минимальный безопасный вариант

Стоит, но точечно. Безопасный минимум (≈3.2 МБ, ~0 доработок, риск ~нулевой):
1. Удалить leaflet×4, barba, jquery.nice-select.min, isotope-дубль, `*@h2n5xr` (4), `assets/videos/h1-hero*.mp4`
   (после проверки CSS/JS-ссылок) — **≈230 КБ + 9.9 МБ видео**.
2. Решение по `oldpages/index-agina-landing.html`: если страница не переносится — минус весь agina-стек
   (**≈2.8 МБ**, включая three.js 1.7 МБ) + корневые дубли bootstrap/swiper/meanmenu-css.
3. EOT-шрифты — минус ~2–3 МБ (посчитать точно: 52 файла).
4. Условная загрузка уже частично есть (постраничные JS); добавить для matter/throwable/sticky — уже так.
5. Дальше ( PurgeCSS, FA-subset, WebP-ревизия `assets/images/`) — только после решения по scope (п.7, вопросы 1–3).

---

## 5. Технические риски для переноса в WP

1. **Конфликты стилей.** `main.css` — 43 КБ строк с глобальными селекторами (`*` сброс: 1 совпадение по
   шаблону `^\s*\*`; element-селекторы `body/h1/a/img` — не считал, **не уверен** в объёме). Стратегия:
   неймспейс темы (префикс `orisa-` уже есть: `at-*`, `sec-*`) + Bootstrap 5.3.8 из шаблона вместо
   бандла WP; `!important` (281) будет перебивать кастомайзер — учесть.
2. **jQuery-зависимость.** `main.js` (3 255 строк, 58 модулей) — jQuery-плагины
   (magnific-popup, odometer, appear, elevateZoom, nice-select, carouselTicker). В WP jQuery есть,
   но грузить свою 3.7.1 vs `wp_enqueue_script('jquery')` (migrate!) — тестировать; elevateZoom стар
   и может конфликтовать — проверить на shop-страницах.
3. **JS завязан на разметку/порядок.** Инициализации по классам (`section-fix`, `at-panel-pin`,
   `scroll-section`, `filter-portfolio`, `.swiper.*-active`, `data-countdown`). Flexible Content обязан
   сохранять эти классы/структуру в PHP-шаблонах блоков 1:1, иначе молча не заведётся (guard-ов вроде
   `if (!$cartList.length) return` мало — **проверен только initShopCart**).
4. **Инлайн.** Стилей `style="` — 18 шт (product-details 6, agina 4, остальное по 1–2), инлайн-`<script>`
   и `<style>` — 0. Риск низкий; 6 инлайнов product-details перенести в поля/стили блока.
5. **Захардкоженное.** `wa.me/79275558811` в offcanvas (все страницы), `assets/...` относительные пути
   (ок для темы: заменить на `get_template_directory_uri()`), youtube-ссылки (`watch?v=SjJhuZQlkbA`,
   `VCPGMjCW0is`) — в поля. Формы `action="#"` — все нефункциональны: подписки/CTA/контакт/checkout
   проектировать заново (CF7/Fluent/Woo).
6. **Слайдеры/анимации.** Swiper (bundle) — testimonials, `about-me-slider`, sec-7-home-13, portfolio-details;
   инициализация в main.js гл.44–47 (`customSwiper`, `slider-testimonial`) — **точные селекторы не выписывал**,
   смотреть гл.44–47 при переносе. Анимации появления: `at_fade_anim` + `data-delay`/`data-fade-from`
   (GSAP в рабочем стеке **нет** — движок анимаций, вероятно, `vendors/plugin.js` 175 КБ, состав
   **не разбирал — не уверен**). Pin/zoom-секции (`section-fix`, `at-panel-pin`, `anim-zoomin`,
   `text-scramble`, `reveal-text`) — самые хрупкие, тестировать первыми.
7. **Темизация.** `data-bs-theme="light|dark"` на `<html>` + `color-modes.js` + ~200 CSS-переменных
   `--at-*` (цвета `--at-common-*/--at-neutral-*`, шрифты `--at-ff-body:'Cera Pro'/--at-ff-heading:'Bebas Neue Pro'`,
   размеры `--at-fz-*`, `--at-fz-ds-1:124px`). Кандидаты в кастомайзер/Options: палитра, шрифты,
   контакты/соцсети/телефоны, логотипы light/dark (`favicon-dark.svg`), тексты CTA, вкл/выкл курсора и прелоадера.
8. **Шрифты.** Cera Pro (36 файлов) + Bebas Neue Pro (160 файлов! — куча начертаний/ширин) локально;
   проверить лицензию перед выкладом (**не уверен** в правах — free/куплены?). 160 файлов Bebas —
   кандидат на урезание до 2–4 начертаний.
9. **Язык/SEO.** Контент русский, а `lang="en"` везде кроме `index.html` (`lang="ru"`); в WP выставить `ru_RU`,
   hreflang не нужен (одноязычие — подтвердить в п.7).
10. **Меню.** 16 пунктов в шапке index — в WP-меню (3 уровня? вложенность не проверял — **не уверен**).

---

## 6. Предложение по архитектуре темы (только предложение)

```
orisa-theme/
├── style.css                 (шапка темы; сам CSS — из assets/css, main.css последним)
├── functions.php             (enqueue: 9 CSS + 18 JS условно; поддержка: title-tag, thumbnails, html5, custom-logo; menus: primary/mobile/footer; theme_mod палитра→CSS-vars)
├── header.php / footer.php   (S01/S02: лого, wp_nav_menu, поиск-оверлей S04, offcanvas S03, соцпанель, back-to-top)
├── front-page.php / home.php / page.php / single.php / archive.php / 404.php / search.php
├── searchform.php
├── template-parts/
│   ├── global/               (offcanvas.php, search-overlay.php, hero-social.php, back-to-top.php, page-hero.php)
│   └── blocks/               (см. ниже: каждый блок = папка)
│       └── hero/
│           ├── block.json        (name `orisa/hero`, variant enum, supports)
│           ├── template.php      (разметка 1:1 с HTML, классы sec-*/at-* сохранены)
│           ├── fields.php        (ACF-группа: variant, заголовок, CTA-повторитель, медиа)
│           ├── style.css         (вырезка из main.css по селекторам блока + critical)
│           └── script.js         (вырезка инициализации; общий рантайм отдельно)
├── inc/
│   ├── acf.php               (register_block_type × N, Options Page: Контакты/Соцсети/Палитра/Шрифты/Скрипты)
│   ├── assets.php            (wp_enqueue + `wp_script_add_data`/defer; условная загрузка: swiper/isotope/matter/slideshow только при наличии блока — has_block())
│   ├── ajax.php              (поиск-оверлей, фильтры портфолио, корзина-минимум если без Woo)
│   └── cleanup.php           (отключение cartmini-веток не нужно — их нет в разметке; dequeue лишнего)
├── assets/                   (облегчённые: vendors/{bootstrap,jquery,swiper,…}, fonts/{cera,bebas-subset}, imgs/ → uploads-контент отдельно)
└── languages/orisa-ru_RU.po
```

Цикл Flexible Content: страница `page.php` → `have_rows('page_sections')` → `get_row_layout()` возвращает
слаг (`hero`, `pricing`, …) → `get_template_part("template-parts/blocks/$layout/template")`.
Внутри блока — `get_sub_field()` + repeater-ряды; классы-обёртки из оригинала сохраняются дословно
(иначе ломается `main.js`). Условные ассеты: в `assets.php` маппинг `слаг → [css/js]` через `has_block()`
или флаг, выставленный в цикле. Глобальное (S01–S04, S22–S24): `header/footer.php` + Options Page
(телефоны, `wa.me`, соцсети, лого light/dark, форма подписки, `data-bs-theme` по умолчанию + тумблер).
Магазин (S18): не ACF — WooCommerce + кастомные шаблоны (`woocommerce/`), `initShopCart` заменить
нативными хуками (решение — вопрос №3). Блог (S16): нативные `home/archive/single` + Gutenberg/ACF
только для extra-полей.

---

## 7. Вопросы (по важности)

1. Scope: переносим только 27 корневых страниц или все 88 (включая `oldpages/`)? От этого зависит, жить ли agina-стеку (~2.8 МБ) и 30+ legacy-демо.
2. `oldpages/index-agina-landing.html` (чужой стек, three.js/GSAP) — переносим или удаляем вместе со стеком?
3. Магазин (4 product-страницы): WooCommerce или статичные ACF-страницы без корзины? (Формы/корзина сейчас мертвы — `action="#"`.)
4. Формы (подписки в футерах, `sec-4-about-form`, checkout): какой плагин — CF7 / Fluent Forms / кастомный AJAX?
5. Блог: нужны ли архив/пагинация/сайдбар как в шаблоне, или упростить? Рубрики/теги заводить?
6. Тёмная тема: сохранять переключатель `data-bs-theme` (color-modes.js) или только светлая?
7. Кастомный курсор (`at-cursor.js`, `#magic-cursor`) и прелоадер: оставляем? (a11y: предпочтения движения.)
8. Лицензии шрифтов Cera Pro / Bebas Neue Pro / FA Pro: есть ли права на веб-использование? Урезать Bebas до 2–4 начертаний?
9. `assets/images/` (AI-картинки, ~185 файлов без ссылок) и `h1-hero*.mp4` — удаляем? А `zakroydolgi/` переименовываем?
10. Меню: сколько уровней вложенности нужно в шапке (в index — 16 пунктов 1-го уровня)?
11. Поиск-оверлей: обычный WP-поиск или AJAX-лайв?
12. Видео-фон/модалки (youtube `SjJhuZQlkbA`, `VCPGMjCW0is`, video-1.mp4): self-host или YouTube?
13. Портфолио-фильтры и слайдшоу: оставить все 7 режимов slideshow или выбрать 1–2?
14. Мультиязычность: только RU (`ru_RU`, `lang` поправить) или заложить WPML/Polylang?
15. Хостинг/качество: PHP-версия, нужен ли build-пайплайн (npm) для темы или голый PHP+ACF PRO?

---

*Проверено построчно, без угадываний там, где стоят ссылки на файлы и строки. Всё помеченное «не уверен» — фронт работ этапа реализации.*

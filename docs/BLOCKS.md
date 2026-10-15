# BLOCKS.md — карта блоков (этап 4.1, на утверждении)

Источник: REPORT.md п.3 + перепроверка по 27 страницам (`sec-`-группы, `main.js` гл.1–58 после чистки 1в).
Правило слияния (PROMPT п.2.4): в один блок — только если разметка отличается лишь модификаторами
классов; иначе разные блоки. Все слияния ниже — с причиной. Эталон: `blocks/faq/`.

Легенда JS: MXX = глава main.js (после чистки 1в); BS = Bootstrap; SW = Swiper; CF7 = Contact Form 7.

| Слаг | Русское название | Секции оригинала | Страницы (27) | Варианты и почему допустимо | JS / плагины | Тип |
|---|---|---|---|---|---|---|
| `hero-proof` | Герой с отзывом | `.sec-1-home-3` + декор | index-3 | без вариантов | M16,39,48–50 | блок |
| `hero-brand` | Герой с брендом | `.sec-1-home-4` | index-4 | без вариантов | M16,39 | блок |
| `hero-photos` | Герой с фото | `.sec-1-home-5` | index-5 | без вариантов | M16 | блок |
| `hero-vr` | Герой VR | `.sec-1-home-7__*` | index, index-7 | без вариантов; тумблер «интерактив matter» (только index-7) | M16 + matter/throwable условно | блок |
| `hero-brands` | Герой с брендами | `.sec-1-home-9__row*` | index-9 | без вариантов | M16 + divider (M59) | блок |
| `hero-slider` | Герой-слайдер | `.sec-1-home-13__*` | index-13 | без вариантов | M16 | блок |
| `hero-counter` | Герой со счётчиком | `.sec-1-home-14__*` | index-14 | без вариантов | M16 + tabs/masonry (M57b) | блок |
| `page-hero` | Шапка внутренней страницы | `container + .sec-1-{404,blog-details,contact,faqs,services,portfolio…}` | все внутр. | variant: набор классов шапки по типу страницы (структура одна: container + заголовок + крошки) | — | блок |
| `logo-marquee` | Бегущая строка | `.carouselTicker`, `.moving-gallery`, `.at-brand-scroll`, `at-brand-item` ряды | почти все home, about-1, product→(нет) | variant: лента/галерея/бренды — один механизм тикера, differs модификаторами | M46 + carouselTicker | блок |
| `portfolio-grid` | Портфолио | `.sec-4-home-9.filter-portfolio`, `.sec-2-home-5.portfolio-area`, сетки portfolio-2/3 | index-9, index-5, portfolio-2/3 | variant: с фильтром / сетка (каркас filter+grid один, фильтр скрывается полем) | M55 initPortfolioFilter + isotope | блок |
| `portfolio-details` | Кейс | `sec-*-portfolio`, `.swiper-wrapper` (details-6), rows (details-4) | portfolio-details-4/6 | variant: rows / slider — СПОРНО (структуры разные; предлагаю 2 лэйаута в одном блоке через variant, т.к. поля одни: галерея+описание+мета+next; записано в DECISIONS при создании) | SW (M47 customSwiper), M13 hover | блок |
| `testimonials` | Отзывы | `.testimonial-cart-wrap`, `slider-testimonial*`, `sec-7-home-13__media-slider` | index, index-13/14 | variant: слайдер/цитата (обёртка одна) | SW (M44,45,47) | блок |
| `faq` | Вопросы и ответы | `.sec-*-faqs` + `.accordion` | faqs, pricing-4 | Эталон (готов). pricing-4-faq — тот же паттерн | BS collapse | блок |
| `team` | Команда | карточки team (`sec-2-home-5__avatar-sm` паттерн + team-страница) | team | без вариантов (team-2 удалён в 1а) | — | блок |
| `pricing` | Тарифы | `.pricing-3-grid` + `-testimonial`, `pricing-4-hero/steps/board/project/faq` | pricing-3/4 | variant: сетка-3 / конструктор-4 (поля: тарифы-повторитель + toggle мес/год) | pricing-3.js условно, M52-логика в шаблоне | блок |
| `services-list` | Услуги | `sec-*-services`, `svc4-index/accordion/process/engage` | services-cards/4 | variant: pills / accordion+process (поля: услуги-повторитель) | services-4.js условно | блок |
| `service-details` | Услуга детально | `section-fix`, `sd4-hero/practice/flow/deliver/cta/next`, swiper | services-details, services-details-4 | variant: base / sd4 (поля: hero, модули-повт., шаги, CTA, next) | services-details-4.js условно, SW | блок |
| `stats` | Цифры | `.sec-2-home-9__stats`, stats home-13/14 | index-9/13/14 | без вариантов (повторитель цифра+подпись) | odometer (M43) | блок |
| `steps` | Шаги / процесс | `sec-6-home-13 timeline`, `svc4-process`, `pricing-4-steps` | index-13, services-4, pricing-4 | variant: timeline / process / steps (один повторитель шагов) | — | блок |
| `cta-band` | Призыв к действию | `sd4-cta__band`, `at-service-btn`, footer-CTA | services-details-4, index-13/14 | без вариантов | — | блок |
| `contact` | Контакты и форма | `sec-1-contact`→(в page-hero), `.sec-4-about-form` + CF7 select | contact-2 (+форма reused: about-1/2, index-7/15→нет, services-1→нет: осталась только contact-2 и about-1/2) | без вариантов; поле «Форма CF7» (select/шорткод) | CF7 | блок |
| `posts-preview` | Последние статьи | `blog-card` сетки на home (index at-sec13) | index (+др. home) | без вариантов (WP_Query, 3–4 шт.) | — | блок |
| `media-text` | Текст с картинкой | контейнеры about-1/2, services-cards, team (`.sec-2-about`, `at-banner-thumb`…) | about-1/2, services-cards, team | variant: картинка слева/справа (модификаторы порядка) | M20–23 (scale/img anim) | блок |
| `coming-soon` | Скоро | баннер + `data-countdown` + форма (coming-soon 581–698) | coming-soon | без вариантов (поле даты строго под M34) | M34 + matter условно | блок |
| `subscribe` | Подписка | `footer-*__form`, `sec-*-form` | (внутри footer.php — глобально) | — | CF7 | global (часть footer) |

Не блоки (покрыто каркасом этапа 2): header/footer/offcanvas/search/back-to-top/hero-social (global +
Options); блог-архив/статья/поиск (нативные home/archive/single/search, этап 5); 404 (шаблон + Options,
matter-флаг ставит сам шаблон); магазин (удалён); слайдшоу-портфолио (удалены в 1а).

Флаги условных скриптов ставят блоки: `hero-vr` (matter), `pricing` (pricing-3), `services-list`
(services-4), `service-details` (services-details-4), `coming-soon` (matter). Остальное — общий набор.

Открытое к созданию: точные `variant`-списки сверю с разметкой при создании каждого блока; спорные
слияния (`portfolio-details`, `pricing`, `service-details`) — с записью в `docs/DECISIONS.md`.

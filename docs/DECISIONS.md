# DECISIONS.md — решения по блокам (почему так, а не иначе)

## Партия 1
- `hero-home-7`: `data-delay` у чипов формулой 0.1×n вместо ручных значений оригинала (стаггер тот же).
- `hero-home-7`: текст соцдоказательства разбит на 2 поля, `<br class="d-none d-xl-inline">` в шаблоне (wp_kses_post срезал бы class).
- `page-hero`: построен по 404-варианту; каркасы blog/contact/faqs отличаются (правая колонка, крошки) — варианты доберём позже.
- `page-hero`: форма поиска привязана к WP (`home_url`, `name="s"`); плейсхолдеры «Search» — статика.

## Партия 2
- `hero-home-9`: `data-start="100% "` нормализован без хвостового пробела (парсинг JS не чувствителен).
- `logo-marquee`: тройная группировка логотипов about-1 упрощена до 1 li; канон «Ленты» — index-3.
- `portfolio-grid`: БЕЗ variant (сетки index-9 и portfolio-2 несовместимы); portfolio-2 требует отдельного блока.
- `hero-home-13`: слайды и превью-услуги — один повторитель (защита от рассинхрона main/thumbs).

## Партия 3
- `portfolio-details`: БЕЗ variant, только details-4 (каркасы details-4/6 несовместимы: rows vs swiper, разные шапки/цитаты/next); details-6 — отдельным блоком позже. Галерея берёт первые 6 фото (в оригинале ровно 6).
- `testimonials`: variant quotes/cards; ряд-бейдж с `tel:+79275558811` опущен (демо-CTA, телефон — из настроек); `id="testimonials"` заменён `orisa_anchor()` (якоря задаются в PAGES.md при сборке).
- `team`: нижний ряд тегов — декор без поля; соцсети карточки сведены к одному link (в оригинале одна ссылка).
- `pricing`: переключателя мес/год В ОРИГИНАЛЕ НЕТ (проверено grep по html и pricing-3.js) — вопреки карте BLOCKS.md; построен pricing-3; pricing-4 — отдельным блоком позже.
- `services-list`: БЕЗ variant, только services-4 (s3 — другая структура без collapse); services-3 — отдельным блоком позже. Фиксированный `id="svc4-engage"` заменён `orisa_anchor()` (в CSS/JS не используется — проверено).

## Партия 4
- `service-details`: БЕЗ variant, только SD4 (base несовместим: swiper/swiperless, section-fix vs sd4-flow); services-details.html — отдельным блоком позже.
- `stats`: только index-9 (index-13 — другой каркас с head/префиксами); декор-линия через URI темы (прецедент hero-home-9).
- `steps`: только index-13 timeline; svc4/pricing-4 шаги несовместимы.
- `cta-band`: только sd4-cta; `sd4-next` исключён (межстраничная навигация — вотчина service-details).
- `contact`: обёртка формы — div (CF7 рендерит свой form); кнопка — raw button (тег [submit] не держит спаны); соцсети — generic-стрелка (сети из Options, западные глифы не маппятся); VK исключён (в Options «только подвал»).
- CF7-шаблон зафиксирован в docs/CF7-FORMS.md.

## Партия 5
- `coming-soon`: формы в оригинале нет (только поиск в шапке) — поле CF7 выводится после ряда только если заполнено; throwable-логотипы сцены — декор через ORISA_URI (прецедент hero-home-7).
- `posts-preview`: карточки из WP_Query; `data-category="@@category"` опущен (плейсхолдер сборщика); `id="blog"` — через orisa_anchor().
- `media-text`: построен по services-3 process-card; about-1 journey (block-journey + journey-list) несовместим — отдельным блоком позже.
- `services-3`: только сетка sec-2-services; вариант раскладки карточки — по позиции (1–4 по кругу, в оригинале 4 раскладки без выбора); третья карточка делит один Image ID на верх+низ.
- `portfolio-details-6`: sec-4 (цифры) и sec-6 (FAQ) оставлены статикой — ДОЛГ: вынести в поля/повторители в партии 6.
- `services-details-base`: home-3-section-12 и футер из диапазона исключены (чужие блоки).

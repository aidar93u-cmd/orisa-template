# QA-CHECKLIST.md — ручная проверка заказчиком в браузере (этап 5.6)

Без локального WP и скриншотов со стороны разработки — только статическая проверка.
WP Playground (по желанию): заказчик поднимает сам, zip ACF Pro — от заказчика.

## Глобальное
- [ ] Шапка: лого, меню из Options (2 уровня), поиск-оверлей (открыть/закрыть, submit ведёт на ?s=), бургер → offcanvas, sticky-кнопка МЕНЮ.
- [ ] Offcanvas ×2: контакты, соцсети, галерея, закрытие; `wa.me` и телефоны из Options.
- [ ] Подвал fixed-bottom (19 стр.) и container-2200 (index/4/5): колонки, соцсети, теги, копирайт с текущим годом, форма подписки (CF7).
- [ ] Кнопка наверх; кастомный курсор (тумблер Options вкл/выкл).
- [ ] Тёмной темы нет (тумблер удалён), `data-bs-theme="light"` везде.

## Анимации и хрупкое (тестировать первыми)
- [ ] Pin/zoom: `section-fix`, `at-panel-pin`, `anim-zoomin`, `text-scramble`, `reveal-text`, `at_fade_anim`.
- [ ] Слайдеры: testimonials (оба variant), about-me (index-7), case-gallery, sec-7-home-13.
- [ ] Фильтры: portfolio-grid (Isotope), архив блога (data-filter ↔ data-category).
- [ ] Счётчики odometer (stats, stats-wide, review); countdown на coming-soon (формат даты!).
- [ ] Matter/throwable декор: 404, coming-soon, index-7 (флаг matter_fx).
- [ ] Тикеры logo-marquee (все 3 variant), hover-превью карточек (M13).

## Формы и блог
- [ ] CF7: contact (sec-4-about-form), coming-soon, newsletter (архив) — отправка, письма, валидация.
- [ ] Блог: архив (сетка/фильтры/пагинация/newsletter), статья (шаринг, теги, prev/next, related ×4), поиск.
- [ ] 404 и coming-soon тексты из Options.

## Мобильная версия и a11y
- [ ] 360px и 768px: меню-бургер, offcanvas, слайдеры, таблицы тарифов, формы.
- [ ] `prefers-reduced-motion`:.pin/tilt/cursor не мешают; alt у картинок из медиатеки.
- [ ] Консоль браузера без ошибок на всех 27 собранных страницах.

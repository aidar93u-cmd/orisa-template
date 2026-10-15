# LOCAL.md — локальный запуск (WordPress Playground)

## Запуск

```powershell
cd "C:\Users\aidar\Desktop\New folder\orisa-template"
npx --yes @wp-playground/cli@latest server --port=9400 --blueprint=./playground/blueprint.json --mount-dir-before-install "C:\Users\aidar\Desktop\New folder\orisa-template\orisa" /wordpress/wp-content/themes/orisa
```

- Сайт: http://127.0.0.1:9400/ — тема `orisa` примонтирована живьём (правки файлов видны сразу).
- Админка: http://127.0.0.1:9400/wp-admin/ — `admin` / `password`.
- Блюпринт (`playground/blueprint.json`): PHP 8.3, WP latest, WP_DEBUG в лог,
  установка ACF free, активация темы, русский язык, базовые опции.
- Остановка: убить процессы node.

## Что уже засеяно (одноразовый сид, файлы сида удалены)

- Страницы «Главная» (front) и «Блог» (posts); 3 демо-записи с миниатюрами.
- Главная: hero (vr), marquee (6 логотипов), posts-preview — контент из index.html.
- Все Options: контакты, меню (8), соцсети, футер, offcanvas, блог, 404.
- Медиатека: ~21 файл (логотипы SVG, hero, аватары, бренды).

## Важно

- Стоит ACF **free** (из wp.org). Flexible Content и Options Page — Pro: заказчик поставил
  Pro вручную в админке этого инстанса. При перезапуске сервера с нуля Pro слетит —
  для воспроизводимости нужен zip ACF Pro (положить рядом, дописать installTheme/installPlugin в блюпринт).
- Данные живут в инстансе Playground: перезапуск = чистая копия + автопрогон блюпринта
  (без сида контента — сид был одноразовым; постоянный импорт — этап 6 `inc/import.php`).
- Переводы RU для ядра/плагинов могут не докачаться ( warning в логе) — косметика.

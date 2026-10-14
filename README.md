# Orisa — HTML-шаблон (локальная копия)

Скачано с: https://orisa-html-demo.pages.dev/

## Структура

```
orisa-template/
├── *.html                 # 87 страниц (все пункты меню)
├── assets/
│   ├── css/               # стили: main.css, sticky-cards.css
│   │   └── vendors/       # CSS-библиотеки: bootstrap, swiper,
│   │                      #   font-awesome-pro, magnific-popup,
│   │                      #   nice-select, odometer, carouselTicker, spacing
│   ├── js/                # скрипты страниц: main.js, at-cursor.js,
│   │   │                  #   slideshow-*.js, sticky-cards.js, matter.js и др.
│   │   └── vendors/       # JS-библиотеки: jquery 3.7.1, bootstrap, swiper,
│   │                      #   isotope, magnific-popup, odometer, parallax и др.
│   ├── fonts/             # шрифты Font Awesome Pro (woff2 + ttf)
│   └── imgs/              # изображения
│       ├── pages/         #   контент страниц (+ home-6..15/, product/, slideshow/)
│       ├── template/      #   logo, avatar, brand-logos, hero
│       ├── icons/         #   иконки (badge, brand, logo, check)
│       └── video/         #   видео (video-1.mp4, live-bg.mov)
└── download_missing.sh    # скрипт докачки недостающих ассетов
```

## Страницы (87)

- **Home (30):** index, index-2 … index-15 + index-dark, index-2-dark … index-15-dark
- **About (5):** about-1 … about-5
- **Pricing (5):** pricing, pricing-2 … pricing-5
- **Services (10):** services-1 … services-5, services-details … services-details-5
- **Team (3):** team, team-2, team-details
- **Portfolio (20):** portfolio-cinema/split/stack/curtain/zstack/vista/horizontal/gallery,
  portfolio-1 … portfolio-6, portfolio-details-1 … portfolio-details-6
- **Shop (4):** product-archive, product-details, product-cart, product-checkout
- **News (5):** archive-1 … archive-4, blog-details
- **Contact (2):** contact-1, contact-2
- **Прочее (4):** coming-soon, faqs, 404

## Проверка

- Все 87 страниц отдают 200 на локальном сервере.
- 722 уникальных ссылки на ассеты (HTML + CSS url() + прочие атрибуты) — все 200.
- Консоль браузера чистая (проверено на index, portfolio-cinema, index-13-dark).
- Известная особенность: 6 файлов шрифтов (`fa-duotone-900`, `fa-thin-100`,
  `fa-v4compatibility` в .ttf/.woff2) отдают 404 **и на оригинальном сайте**
  (классы `fa-thin`/`fa-duotone` в шаблоне нигде не используются).

## Локальный запуск

```bash
cd orisa-template
python -m http.server 8931 --bind 127.0.0.1
# открыть http://127.0.0.1:8931/index.html
```

## Докачка ассетов

```bash
bash download_missing.sh   # соберёт ссылки из HTML/CSS и скачает недостающее
```

Примечание: если DNS не резолвит `orisa-html-demo.pages.dev`, скрипт использует
`--resolve` с IP Cloudflare (172.66.47.12 / 172.66.44.244).

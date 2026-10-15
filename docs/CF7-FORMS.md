# CF7-FORMS.md — готовые шаблоны форм для Contact Form 7 (этап 4.3)

`wpcf7_autop_or_not` отключён в `orisa/inc/cf7.php`. Шорткод формы вставляется
в поле «Форма CF7» блока `contact` (вкладка «Письмо» настраивается отдельно).

## Форма обратной связи (блок contact, `.sec-4-about-form`)

Вкладка «Форма»:

```
<div class="sec-4-about-form__field">[text* your-name class:sec-4-about-form__input placeholder "Your name *"]</div>

<div class="sec-4-about-form__field">[email* your-email class:sec-4-about-form__input placeholder "Your email *"]</div>

<div class="sec-4-about-form__field">[tel* your-phone class:sec-4-about-form__input placeholder "Your phone *"]</div>

<div class="sec-4-about-form__field">[textarea* your-message 40x5 class:sec-4-about-form__input class:sec-4-about-form__textarea placeholder "Your message *"]</div>

<div class="sec-4-about-form__actions"><button type="submit" class="sec-4-about-form__btn at-btn"><span><span class="text-1 text-capitalize">Send Message</span><span class="text-2 text-capitalize">Send Message</span></span><i><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" /></svg><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" /></svg></i></button></div>

<p class="sec-4-about-form__disclaimer">By submitting, you agree to our <a href="#" class="sec-4-about-form__link">Terms</a> and <a href="#" class="sec-4-about-form__link">Privacy Policy</a>.</p>
```

Вкладка «Письмо», получатель и тело: `[your-name] [your-email] [your-phone] [your-message]`.

Отклонения от оригинала (зафиксированы строителем блока): кнопка — raw `<button type="submit">`
(тег `[submit]` рендерит `<input>` без двойных спанов ховер-анимации); у полей нет `aria-label`
(CF7 не поддерживает произвольные атрибуты, смысл несёт `placeholder`); Terms/Privacy — `#`;
обёртка блока — `div`, т.к. CF7 рендерит свой `<form>` (иначе вложенность).

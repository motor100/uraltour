<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('robots')
  <link rel="shortcut icon" href="{{ asset('/img/favicon.svg') }}" type="image/x-icon">
  @if(Route::is('home'))
    <title>Урал Тур</title>
  @else
    <title>@yield('title', 'Урал Тур' )</title>
  @endif
  @yield('style')
  @vite(['resources/sass/main.scss'])
</head>

<body>

  <header class="header">
    <div class="container">
      <div class="grid-container">
        <div class="logo">
          <a href="/">
            <img src="/img/logo.png" alt="">
          </a>
        </div>
        <ul class="top-menu hidden-mobile">
          <li class="menu-item">
            <a href="/">Главная</a>
          </li>
          <li class="menu-item">
            <a href="/catalog">Каталог</a>
          </li>
          <li class="menu-item">
            <a href="/testimonials">Отзывы</a>
          </li>
          <li class="menu-item">
            <a href="/contacts">Контакты</a>
          </li>
        </ul>
        <a href="tel:+79123080608" class="phone-btn hidden-mobile">+7 (912) 308-06-08</a>
      </div>
    </div>
  </header>

  <div class="content-wrapper">
    @yield('content')
  </div>

  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="grid-container">
          <div class="logo-wrapper">
            <div class="logo">
              <img src="/img/logo.png" alt="">
            </div>
            <div class="underlogo-text">Клуб путешественников.<br>Организованные туры по России.<br>Экскурсии для взрослых и школьников.</div>
          </div>
          <div class="club">
            <div class="bottom-menu">
              <div class="menu-title">О компании</div>
              <div class="menu-item">
                <a href="/contacts">Контакты</a>
              </div>
              <div class="menu-item">
                <a href="/documents">Документы</a>
              </div>
              <div class="menu-item">
                <a href="/testimonials">Отзывы</a>
              </div>
              <div class="menu-item">
                <a href="/testimonials#write-btn">Оставить отзыв</a>
              </div>
            </div>
          </div>
          <div class="booking">
            <div class="bottom-menu">
              <div class="menu-title">Бронирование</div>
              <div class="menu-item">
                <a href="/booking">Забронировать</a>
              </div>
            </div>
          </div>
          <div class="help">
            <div class="bottom-menu">
              <div class="menu-title">Помощь</div>
              <div class="menu-item">
                <a href="/privacy-policy">Политика конфиденциальности</a>
              </div>
              <div class="menu-item">
                <a href="/agreement">Согласие на обработку персональных данных</a>
              </div>
            </div>
          </div>
        </div>
        <div class="socials">
          <a href="https://vk.com/kpuraltur" class="socials-link" target="_blank">
            <img src="/img/vk.svg" class="socials-image" alt="">
          </a>
          <a href="https://ok.ru/group/53374070947988" class="socials-link" target="_blank">
            <img src="/img/ok.svg" class="socials-image" alt="">
          </a>
          <a href="https://t.me/+79123080608" class="socials-link" target="_blank">
            <img src="/img/tg.svg" class="socials-image" alt="">
          </a>
          <a href="https://wa.me/79123080608" class="socials-link" target="_blank">
            <img src="/img/ws.svg" class="socials-image" alt="">
          </a>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="info">
          <div class="copyright">© УРАЛ ТУР <span id="current-year"></span></div>
          <div class="about-company">ИП Красняк Л.Н. ИНН 741807167621</div>
        </div>
        <div class="developers">
          <div class="developer">
            <a href="https://mybutton.ru" target="_blank">Разработчик Студия Button</a>
          </div>
          <div class="developer">
            <a href="https://nhfuture.ru/" target="_blank">Дизайн Andrewwebnh</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="burger-menu-wrapper">
    <div class="burger-menu">
      <span class="span"></span>
    </div>
  </div>

  <div class="mobile-menu">
    <div class="logo">
      <img src="/img/logo.png" alt="">
    </div>
    <ul class="menu">
      <li class="menu-item">
        <a href="/">Главная</a>
      </li>
      <li class="menu-item">
        <a href="/catalog">Каталог</a>
      </li>
      <li class="menu-item">
        <a href="/testimonials">Отзывы</a>
      </li>
      <li class="menu-item">
        <a href="/contacts">Контакты</a>
      </li>
    </ul>
    <a href="tel:+79123080608" class="phone-btn">+7 (912) 308-06-08</a>
    <div class="underlogo-text">Клуб путешественников.<br>Организованные туры по России.<br>Экскурсии для взрослых и школьников. </div>
    <div class="socials">
      <a href="https://vk.com/kpuraltur" class="socials-link" target="_blank">
        <img src="/img/vk.svg" class="socials-image" alt="">
      </a>
      <a href="https://ok.ru/group/53374070947988" class="socials-link" target="_blank">
        <img src="/img/ok.svg" class="socials-image" alt="">
      </a>
      <a href="https://t.me/+79123080608" class="socials-link" target="_blank">
        <img src="/img/tg.svg" class="socials-image" alt="">
      </a>
      <a href="https://wa.me/79123080608" class="socials-link" target="_blank">
        <img src="/img/ws.svg" class="socials-image" alt="">
      </a>
    </div>
  </div>

  <div class="filter-menu">
    <div class="filter-menu-close">
      <div class="close"></div>
    </div>
    <div class="title-wrapper">
      <div class="title">Фильтры</div>
      <a href="{{ url()->current() }}" class="clear-btn">Очистить</a>
    </div>
    <div class="horizontal-line"></div>
    <div class="filter">
      <div class="checkbox-group">
        <div class="checkbox-group__title">Вид тура</div>
          <label class="checkbox-label">
            <span class="custom-checkbox-text">Вид 1</span>
            <input type="checkbox" name="checkbox" class="checkbox">
            <span class="custom-checkbox"></span>
          </label>
          <label class="checkbox-label">
            <span class="custom-checkbox-text">Вид 2</span>
            <input type="checkbox" name="checkbox" class="checkbox">
            <span class="custom-checkbox"></span>
          </label>
          <label class="checkbox-label">
            <span class="custom-checkbox-text">Вид 3</span>
            <input type="checkbox" name="checkbox" class="checkbox">
            <span class="custom-checkbox"></span>
          </label>
          <label class="checkbox-label">
            <span class="custom-checkbox-text">Вид 4</span>
            <input type="checkbox" name="checkbox" class="checkbox">
            <span class="custom-checkbox"></span>
          </label>
      </div>
      <div class="checkbox-group">
        <div class="checkbox-group__title">Город</div>
        <label class="checkbox-label">
          <span class="custom-checkbox-text">Москва</span>
          <input type="checkbox" name="checkbox" class="checkbox">
          <span class="custom-checkbox"></span>
        </label>
        <label class="checkbox-label">
          <span class="custom-checkbox-text">Екатеринбург</span>
          <input type="checkbox" name="checkbox" class="checkbox">
          <span class="custom-checkbox"></span>
        </label>
        <label class="checkbox-label">
          <span class="custom-checkbox-text">Санкт-Петербург</span>
          <input type="checkbox" name="checkbox" class="checkbox">
          <span class="custom-checkbox"></span>
        </label>
        <label class="checkbox-label">
          <span class="custom-checkbox-text">Казань</span>
          <input type="checkbox" name="checkbox" class="checkbox">
          <span class="custom-checkbox"></span>
        </label>
      </div>
      <button class="submit-btn primary-btn">Применить</button>
    </div>
  </div>

  <div id="callback-modal" class="modal-window callback-modal">
    <div class="modal-wrapper">
      <div class="modal-area">
        <div class="modal-close">
          <div class="close"></div>
        </div>
        <div class="modal-title">Оставьте заявку и мы с вами свяжемся</div>
        <form id="callback-modal-form" class="form">
          <div class="grid-container">
            <div class="form-group">
              <label for="name-callback-modal" class="label">Имя <span class="accentcolor">*</span></label>
              <input type="text" name="name" id="name-callback-modal" class="input-field js-required-name" required minlength="3" maxlength="20" placeholder="Имя">
            </div>
            <div class="form-group">
              <label for="phone-callback-modal" class="label">Телефон <span class="accentcolor">*</span></label>
              <input type="text" name="phone" id="phone-callback-modal" class="input-field js-required-phone js-input-phone-mask" required size="18" placeholder="+7 (000) 000 00 00">
            </div>
            @csrf
            <button type="button" id="callback-modal-submit-btn" class="modal-submit-btn">
              <img src="/img/search-icon.png" class="modal-submit-btn__image" alt="">
              <span class="modal-submit-btn__text">Отправить</span>
            </button>
          </div>
          <div class="agreement-text">
            <input type="checkbox" name="checkbox-read" class="custom-checkbox js-required-checkbox" id="checkbox-read-callback-modal" checked required onchange="document.getElementById('callback-submit-btn').disabled = !this.checked;">
            <label for="checkbox-read-callback-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Ознакомлен с <a href="/privacy-policy" class="privacy-policy-link" target="_blank">политикой конфиденциальности</a></span>
          </div>
          <div class="agreement-text">
            <input type="checkbox" name="checkbox-agree" class="custom-checkbox js-required-checkbox" id="checkbox-agree-callback-modal" checked required onchange="document.getElementById('callback-submit-btn').disabled = !this.checked;">
            <label for="checkbox-agree-callback-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Согласен на <a href="/agreement" class="agreement-link" target="_blank">обработку персональных данных</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="testimonial-modal" class="modal-window testimonial-modal">
    <div class="modal-wrapper">
      <div class="modal-area">
        <div class="modal-close">
          <div class="close"></div>
        </div>
        <div class="modal-title">Оставьте отзыв</div>
        <form id="testimonial-modal-form" class="form" enctype="multipart/form-data" method="post">
          <div class="flex-container">
            <div class="form-group">
              <label for="name-testimonial-modal" class="label">Имя <span class="accentcolor">*</span></label>
              <input type="text" name="name" id="name-testimonial-modal" class="input-field js-required-name" required minlength="3" maxlength="20" placeholder="Имя">
            </div>
            <div class="form-group">
              <div class="label">Оценка</div>
              <div class="stars">
                <div class="star">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M16 0.25L20.6723 10.9009L31.75 12.2819L23.56 20.2456L25.734 31.75L16 26.0209L6.26596 31.75L8.44 20.2456L0.25 12.2819L11.3277 10.9009L16 0.25Z"/>
                  </svg>
                </div>
                <div class="star">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M16 0.25L20.6723 10.9009L31.75 12.2819L23.56 20.2456L25.734 31.75L16 26.0209L6.26596 31.75L8.44 20.2456L0.25 12.2819L11.3277 10.9009L16 0.25Z"/>
                  </svg>
                </div>
                <div class="star">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M16 0.25L20.6723 10.9009L31.75 12.2819L23.56 20.2456L25.734 31.75L16 26.0209L6.26596 31.75L8.44 20.2456L0.25 12.2819L11.3277 10.9009L16 0.25Z"/>
                  </svg>
                </div>
                <div class="star">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M16 0.25L20.6723 10.9009L31.75 12.2819L23.56 20.2456L25.734 31.75L16 26.0209L6.26596 31.75L8.44 20.2456L0.25 12.2819L11.3277 10.9009L16 0.25Z"/>
                  </svg>
                </div>
                <div class="star">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="star-path" d="M16 0.25L20.6723 10.9009L31.75 12.2819L23.56 20.2456L25.734 31.75L16 26.0209L6.26596 31.75L8.44 20.2456L0.25 12.2819L11.3277 10.9009L16 0.25Z"/>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="text-testimonial-modal" class="label">Отзыв <span class="accentcolor">*</span></label>
            <textarea name="text" id="text-testimonial-modal" class="input-field textarea js-required-text" required minlength="3" maxlength="1000" placeholder="Отзыв"></textarea>
          </div>
          <div class="form-group input-file-flex-container">
            <input type="file" name="input-gallery-file[]" id="input-gallery-file" class="inputfile" accept="image/jpeg,image/png" multiple>
            <label for="input-gallery-file" class="custom-inputfile-label">
              <img src="/img/paperclip.jpg" class="paperclip" alt="">
            </label>
            <div class="attach-photo gallery-file-text">Прикрепить фото (не более 3)</div>
          </div>
          <input type="hidden" id="product-id" name="product-id" value="{{ isset($product) ? $product->id : 0 }}">
          <input type="hidden" id="input-rating" name="rating" value="0">
          <input type="hidden" id="recaptcha" name="recaptcha" value="">
          @csrf

          <button type="button" id="testimonial-modal-submit-btn" class="modal-submit-btn primary-btn">Отправить</button>
          <div class="agreement-text">
            <input type="checkbox" name="checkbox-read" class="custom-checkbox js-required-checkbox" id="checkbox-read-testimonial-modal" checked required onchange="document.getElementById('testimonial-modal-submit-btn').disabled = !this.checked;">
            <label for="checkbox-read-testimonial-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Ознакомлен с <a href="/privacy-policy" class="privacy-policy-link" target="_blank">политикой конфиденциальности</a></span>
          </div>
          <div class="agreement-text">
            <input type="checkbox" name="checkbox-agree" class="custom-checkbox js-required-checkbox" id="checkbox-agree-testimonial-modal" checked required onchange="document.getElementById('testimonial-modal-submit-btn').disabled = !this.checked;">
            <label for="checkbox-agree-testimonial-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Согласен на <a href="/agreement" class="agreement-link" target="_blank">обработку персональных данных</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="cookie_note" class="we-use-cookie">
    <div class="we-use-cookie-wrapper">
      <div class="we-use-cookie-text">Мы <a href="/privacy-policy">используем cookie</a> (файлы с данными о прошлых посещениях сайта) для персонализации сервисов и удобства пользователей</div>
      <button id="cookie_accept" class="we-use-cookie-close">ОК</button>
    </div>
  </div>

  @if(Auth::check())
    <div class="top-line-is-login">
      <div class="container-fluid">
        <div class="text-wrapper">
          <div class="top-line__text dashboard">
            <a href="/login">Панель управления</a>
          </div>
          <div class="top-line__text logout">
            <form class="form" action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="logout-btn" type="submit">Выйти</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endif

  @yield('script')
  @vite(['resources/js/main.js'])

  <script src="https://www.google.com/recaptcha/api.js?render={{ config('google.client_key') }}"></script>
  <script>
    function updateCaptcha() {
      grecaptcha.execute("{{ config('google.client_key') }}", {action: 'ajaxaddtestimonial'}).then(function(token) {
        if (token) {
          document.getElementById('recaptcha').value = token;
        }
      });
    }

    grecaptcha.ready(function() {
      updateCaptcha();
      setInterval(updateCaptcha, 110000)
    });
  </script>

  <script>
    (function() {
      'use strict';

      var loadedMetrica = false;
      var metricaId = 99915628;
      var timerId;

      if ( navigator.userAgent.indexOf( 'YandexMetrika' ) > -1 ) {
        loadMetrica();
      } else {
        window.addEventListener( 'scroll', loadMetrica, {passive: true} );

        window.addEventListener( 'touchstart', loadMetrica );

        document.addEventListener( 'mouseenter', loadMetrica );

        document.addEventListener( 'click', loadMetrica );

        document.addEventListener( 'DOMContentLoaded', loadFallback );
      }

      function loadFallback() {
        timerId = setTimeout( loadMetrica, 3000 );
      }

      function loadMetrica( e ) {

        if ( loadedMetrica ) {
          return;
        }

        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(99915628, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:false
        });

        loadedMetrica = true;

        clearTimeout( timerId );

        window.removeEventListener( 'scroll', loadMetrica );
        window.removeEventListener( 'touchstart', loadMetrica );
        document.removeEventListener( 'mouseenter', loadMetrica );
        document.removeEventListener( 'click', loadMetrica );
        document.removeEventListener( 'DOMContentLoaded', loadFallback );
      }
    })()
  </script>

</body>
</html>

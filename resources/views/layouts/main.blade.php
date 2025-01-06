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
  <!-- @ yield('style') -->
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
        <ul class="top-menu">
          <li class="menu-item">
            <a href="/">Главная</a>
          </li>
          <li class="menu-item">
            <a href="/tours">Туры</a>
          </li>
          <li class="menu-item">
            <a href="/testimonials">Отзывы</a>
          </li>
          <li class="menu-item">
            <a href="/contacts">Контакты</a>
          </li>
        </ul>
        <a href="tel:+79123080608" class="phone-btn">+7 (912) 308-06-08</a>
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
              <div class="menu-title">Клуб</div>
              <div class="menu-item">
                <a href="/contacts">Контакты</a>
              </div>
              <div class="menu-item">
                <a href="/documents">Документы</a>
              </div>
              <div class="menu-item">
                <a href="/testimonials">Отзывы</a>
              </div>
              <div class="menu-item">Оставить отзыв</div>
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
          <a href="#" class="socials-link">
            <img src="/img/vk.png" class="socials-image" alt="">
          </a>
          <a href="#" class="socials-link">
            <img src="/img/ok.png" class="socials-image" alt="">
          </a>
          <a href="#" class="socials-link">
            <img src="/img/tg.png" class="socials-image" alt="">
          </a>
          <a href="#" class="socials-link">
            <img src="/img/ws.png" class="socials-image" alt="">
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

    <div class="lk-login header-btn">
      <div class="lk-login__image header-btn__image">
        <svg width="21" height="30" viewBox="0 0 21 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18.8127 23.9071C18.8127 26.2363 16.7525 28.1262 14.2099 28.1262H6.5391C3.99831 28.1262 1.93806 26.2363 1.93806 23.9071V21.0938C1.93806 19.0999 3.44963 17.4413 5.4758 17.0002C6.86006 18.0975 8.54735 18.7502 10.3745 18.7502C12.2034 18.7502 13.8907 18.0975 15.2732 17.0002C17.3012 17.4413 18.8127 19.0999 18.8127 21.0938V23.9071ZM3.81183 9.37422C3.81183 5.2322 6.75068 1.87556 10.3745 1.87556C14.0001 1.87556 16.9372 5.2322 16.9372 9.37422C16.9372 13.518 14.0001 16.8747 10.3745 16.8747C6.75068 16.8747 3.81183 13.518 3.81183 9.37422ZM16.8923 15.3308C18.0901 13.7063 18.8127 11.6335 18.8127 9.37422C18.8127 4.19939 15.0347 0 10.3745 0C5.71428 0 1.93806 4.19939 1.93806 9.37422C1.93806 11.6335 2.65888 13.7063 3.85845 15.3308C1.65475 16.0929 0.0625 18.1621 0.0625 20.6258V24.3751C0.0625 27.4807 2.58178 30 5.68739 30H15.0634C18.169 30 20.6883 27.4807 20.6883 24.3751V20.6258C20.6883 18.1621 19.0942 16.0929 16.8923 15.3308Z" fill="#868686"/>
        </svg>
      </div>
      <div class="lk-login__text header-btn__text">Войти</div>
      <a href="/lk" class="full-link"></a>
    </div>

    <ul class="menu">
      <li class="menu-item {{ Route::is('company') ? 'active' : '' }}">
        <a href="/company">КОМПАНИЯ</a>
      </li>
      <li class="menu-item {{ Route::is('services') ? 'active' : '' }}">
        <a href="/services">УСЛУГИ</a>
      </li>
      <li class="menu-item {{ Route::is('payment') ? 'active' : '' }}">
        <a href="/payment">ОПЛАТА</a>
      </li>
      <li class="menu-item {{ Route::is('delivery') ? 'active' : '' }}">
        <a href="/delivery">ДОСТАВКА</a>
      </li>
      <li class="menu-item {{ Route::is('warranty') ? 'active' : '' }}">
        <a href="/warranty">ГАРАНТИЯ</a>
      </li>
      <li class="menu-item {{ Route::is('calculators') ? 'active' : '' }}">
        <a href="/calculators">КАЛЬКУЛЯТОРЫ</a>
      </li>
      <li class="menu-item">
        <a href="/contacts {{ Route::is('contacts') ? 'active' : '' }}">КОНТАКТЫ</a>
      </li>
    </ul>

    <div class="secondary-btn callback-btn js-callback-btn">Оставить заявку</div>

    <div class="info">
      <div class="phone">+7 (982) 292-88-79</div>
      <div class="phone">8 (800) 234-08-12</div>
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
              <input type="text" name="name" id="name-callback-modal" class="input-field js-name-callback-modal" required minlength="3" maxlength="20" placeholder="Имя">
            </div>
            <div class="form-group">
              <label for="phone-callback-modal" class="label">Телефон <span class="accentcolor">*</span></label>
              <input type="text" name="phone" id="phone-callback-modal" class="input-field js-input-phone-mask" required size="18" placeholder="+7 (000) 000 00 00">
            </div>
            <button type="button" id="callback-submit-btn" class="modal-submit-btn">
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
        <form id="testimonial-modal-form" class="form">
          <div class="grid-container">
            <div class="form-group">
              <label for="name-testimonial-modal" class="label">Имя <span class="accentcolor">*</span></label>
              <input type="text" name="name" id="name-testimonial-modal" class="input-field js-name-testimonial-modal" required minlength="3" maxlength="20" placeholder="Имя">
            </div>
            <div class="form-group">
              <div class="label">Оценка</div>
              <img src="/img/temp-rating.png" class="rating" alt="">
            </div>
          </div>
          <div class="form-group">
            <label for="text-testimonial-modal" class="label">Отзыв <span class="accentcolor">*</span></label>
            <textarea type="text" name="name" id="text-testimonial-modal" class="input-field textarea js-text-testimonial-modal" required minlength="3" maxlength="200" placeholder="Отзыв"></textarea>
          </div>
          <div class="form-group">
            <img src="/img/paperclip.jpg" class="paperclip" alt="">
            <span class="attach-photo">Прикрепить фото</span>
          </div>

          <button type="button" id="testimonial-submit-btn" class="modal-submit-btn">Отправить</button>
          <div class="agreement-text">
            <input type="checkbox" name="checkbox-read" class="custom-checkbox js-required-checkbox" id="checkbox-read-testimonial-modal" checked required onchange="document.getElementById('testimonial-submit-btn').disabled = !this.checked;">
            <label for="checkbox-read-testimonial-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Ознакомлен с <a href="/privacy-policy" class="privacy-policy-link" target="_blank">политикой конфиденциальности</a></span>
          </div>
          <div class="agreement-text">
            <input type="checkbox" name="checkbox-agree" class="custom-checkbox js-required-checkbox" id="checkbox-agree-testimonial-modal" checked required onchange="document.getElementById('testimonial-submit-btn').disabled = !this.checked;">
            <label for="checkbox-agree-testimonial-modal" class="custom-checkbox-label"></label>
            <span class="checkbox-text">Согласен на <a href="/agreement" class="agreement-link" target="_blank">обработку персональных данных</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="cookie_note" class="we-use-cookie">
    <div class="we-use-cookie-wrapper">
      <div class="we-use-cookie-text">Этот сайт использует cookie-файлы и другие технологии для улучшения его работы. Продолжая работу с сайтом, вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</div>
      <button id="cookie_accept" class="we-use-cookie-close">Понятно</button>
    </div>
  </div>

  <div class="fixed-bottom-menu">
    <div class="menu-wrapper">
      <div class="menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-house.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Главная</div>
        <a href="/" class="full-link"></a>
      </div>
      <div class="menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-rectangle.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Каталог</div>
        <a href="/catalog" class="full-link"></a>
      </div>
      <div class="menu-item cart-menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-cart.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Корзина</div>
        <div id="mobile-cart-counter" class="badge-counter {{ isset($cart_count) ? 'active' : '' }}">{{ isset($cart_count) ? $cart_count : '' }}</div>
        <a href="/cart" class="full-link"></a>
      </div>
      <div class="menu-item cart-menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-heart.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Избранное</div>
        <div id="mobile-favourites-counter" class="badge-counter {{ isset($favourites_count) ? 'active' : '' }}">{{ isset($favourites_count) ? $favourites_count : '' }}</div>
        <a href="/favourites" class="full-link"></a>
      </div>
      <div class="menu-item cart-menu-item">
        <div class="menu-item__image">
          <!-- <img src="/img/fixed-bottom-menu-chart.svg" alt=""> -->
        </div>
        <div class="menu-item__title">Сравнение</div>
        <div id="mobile-comparison-counter" class="badge-counter {{ isset($comparison_count) ? 'active' : '' }}">{{ isset($comparison_count) ? $comparison_count : '' }}</div>
        <a href="/comparison" class="full-link"></a>
      </div>
    </div>
  </div>

  @if(Auth::check())
    @if (Auth::user()->isAdmin())
      <div class="top-line-is-login">
        <div class="container-fluid">
          <div class="text-wrapper">
            <div class="top-line__text dashboard">
              <a href="/admin">Панель управления</a>
            </div>
            <div class="top-line__text logout">
              <form class="form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="logout-btn" type="submit">Выйти</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endif

  @yield('script')
  @vite(['resources/js/main.js'])

</body>
</html>

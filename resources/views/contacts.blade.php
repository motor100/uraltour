@section('title', 'Контакты')

@extends('layouts.main')

@section('content')

<div class="search-section">
  <div class="container">
    @include('search')
  </div>
</div>

<div class="breadcrumbs">
  <div class="container">
    <div class="parent">
      <img src="/img/breadcrumbs-home.png" class="home-icon" alt="">
      <a href="{{ route('home') }}">Главная</a>
    </div>
    <div class="separator">/</div>
    <div class="active">Контакты</div>
  </div>
</div>

<div class="contacts-page">

  <div class="info-section section">
    <div class="container">
      <div class="section-title">Контактная информация</div>
      <div class="section-subtitle primary-title">Отдел бронирования</div>
      <div class="grid-container">
        <div class="phone-image">
          <img src="/img/circle-phone.png" alt="">
        </div>
        <div class="phone-text">+7 (912) 308-06-08</div>
      </div>
    </div>
  </div>

  <div class="advantages-section section">
    <div class="container">
      <div class="section-title">Преимущества брони тура онлайн</div>
      <div class="advantages">
        <div class="advantages-item">
          <div class="advantages-item__image">
            <img src="/img/advantages-star.png" alt="">
          </div>
          <div class="advantages-item__title">Не выходя из дома</div>
          <div class="advantages-item__text">Вам не нужно ехать в офис агентства</div>
        </div>
        <div class="advantages-item">
          <div class="advantages-item__image">
            <img src="/img/advantages-smile.png" alt="">
          </div>
          <div class="advantages-item__title">Удобно</div>
          <div class="advantages-item__text">Забронировать тур можно в любое время суток</div>
        </div>
        <div class="advantages-item">
          <div class="advantages-item__image">
            <img src="/img/advantages-target.png" alt="">
          </div>
          <div class="advantages-item__title">Объективность</div>
          <div class="advantages-item__text">Вы видите все варианты туров и можете выбрать тот, который соответствует вашим требованиям</div>
        </div>
      </div>
    </div>
  </div>

  <div class="write-section section">
    <div class="container">
      <div class="section-title">Напишите нам</div>
      <div class="grid-container">
          <a href="https://vk.com/kpuraltur" class="socials-link" target="_blank">
            <img src="/img/circle-vk.png" class="socials-image" alt="">
          </a>
          <a href="https://ok.ru/group/53374070947988" class="socials-link" target="_blank">
            <img src="/img/circle-ok.png" class="socials-image" alt="">
          </a>
          <a href="https://t.me/+79123080608" class="socials-link" target="_blank">
            <img src="/img/circle-tg.png" class="socials-image" alt="">
          </a>
          <a href="https://wa.me/79123080608" class="socials-link" target="_blank">
            <img src="/img/circle-ws.png" class="socials-image" alt="">
          </a>
      </div>
    </div>
  </div>

  <div class="address-section section">
    <div class="container">
      <div class="section-title">Адрес нашего офиса</div>
      <div class="flex-container">
        <div class="address-wrapper">
          <div class="city primary-title">Миасс</div>
          <div class="phone">Отдел бронирования: <strong class="orange-color">+7 (912) 308-06-08</strong></div>
          <div class="email">Email: <strong class="orange-color">info@mail.ru</strong></div>
          <div class="address">Миасс, пр. Макеева, 24</div>
          <div class="working-time">Режим работы: с 10:00 до 19:00</div>
        </div>
        <div class="map">
          <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A51ce0fdf89710633e643f496ffebb3db403aa88ca6f055ab2d157db830815ab2&amp;width=100%25&amp;height=250&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
      </div>
    </div>
  </div>

  <div class="text-section">
    <div class="container">
      <p class="text">Услуги по реализации туристского бронирования на сайте www.xxxx.ru (бронирования тура онлайн) оказывает и сопровождает: Общество с ограниченной ответственностью «xxxxxx», ИНН xxxxxxxxxx, адрес регистрации xxxxxx, г. Миасс,.</p>
      <p class="text">Ознакомиться с <a href="/privacy-policy">политикой конфиденциальности</a> и <a href="/agreement">согласием на обработку персональных данных</a> вы можете по ссылке.</p>
    </div>
  </div>

</div>

@endsection
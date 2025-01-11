@section('title', $product->title)

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
    <div class="parent">
      <a href="/catalog/{{ $category->slug }}">{{ $category->title }}</a>
    </div>
    <div class="separator">/</div>
    <div class="active">{{ $product->title }}</div>
  </div>
</div>

<div class="product-page">
  <div class="container">
    <div class="back" onclick="history.back();">
      <img src="/img/left-arrow.png" class="back-image" alt="">
      <span class="back-text">Назад</span>
    </div>
    <div class="content-grid-container">
      <div class="product-gallery">
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
      </div>
      <div class="product-image">
        <img src="/img/test-image-big.jpg" alt="">
      </div>
      <div class="product-content">
        <div class="product-title primary-title">23.12 - Баден-Баден дневное купание</div>
        <div class="product-rating">
          <div class="rating-text">Рейтинг</div>
          <img src="/img/temp-rating.png" alt="">
          <span class="testimonials-count">12 отзывов</span>
        </div>
        <div class="product-price">
          <span class="product-price__value">1800</span>
          <span class="product-price__currency">P</span>
        </div>
        <div class="product-description-title">Описание</div>
        <div class="product-description">
          БАДЕН - БАДЕН «Лесная сказка»! 💦 👙 👍 🌲<br>
          купание 3 часа (+15 мин)<br>
          📆 23 декабря (пн)<br>
          💰 1800 руб. - пенсионеры,<br>
          2400 руб. - дети до 12 лет и льготники (инв.),<br>
          2600 руб. - взрослые<br>

          ✅ В стоимость входит:<br>
          🔸 проезд на туристическом автобусе;<br>
          🔸купание в двух термальных бассейнах<br>
          🔸БАНИ НАРОДОВ МИРА!<br>
          🔸внутренний бассейн с джакузи;<br>
          🔸шезлонги;<br>
          🔸Комплекс саун, хамам,<br>
          🔸соляная комната;<br>
          🔸сопровождение, транспортная страховка.<br>
        </div>
        <div class="product-buttons">
          <button class="booking-tour-btn product-primary-btn primary-btn js-callback-modal-btn">Заказать тур</button>
          <button class="write-btn secondary-btn js-callback-modal-btn">Написать нам</button>
        </div>
      </div>
    </div>
    <div class="product-plan product-description-item">
      <div class="product-subtitle">Программа тура</div>
      <div class="product-text">
        10.00 Выезд из Челябинска пр. Ленина 69  памятник  Горькому<br>
        11:00 - 14:00 - посещение комплекса термальных бассейнов Баден-Баден Лесная сказка (3 часа). Выезд в Челябинск.<br>
        14.30 -Отправление в Челябинск<br>
        15.30- Прибытие в город Челябинск. время ориентировочное и может изменяться в зависимости от подготовленности группы, дорожных, погодных условий. (компания оставляет за собой право незначительно изменять порядок прохождения программы<br> 
        с сохранением ее содержания в целом)
      </div>
      <div class="product-note orange-color">* время ориентировочное и может изменяться в зависимости от подготовленности группы и погодных условий.</div>
    </div>
    <div class="product-include product-description-item">
      <div class="product-subtitle">В стоимость тура включено:</div>
      <div class="product-text">
        проезд на микроавтобусе / автобусе (туда и обратно), посещение комплекса термальных бассейнов по тарифу "3 часа"<br>
        При наборе группы менее 19 человек будет подан микроавтобус туристического класса.
      </div>
    </div>
    <div class="product-recommend product-description-item">
      <div class="product-subtitle">Рекомендации</div>
      <div class="product-text">
        Рекомендуем взять с собой:<br> 
        паспорт или документ, удостоверяющий личность;<br> 
        свидетельство о рождении детей;<br>
        для льготной категории - удостоверение;<br>
        удобную сумку или рюкзак;<br>
        горячий чай в термосе или другие напитки, воду, сок и т.п.<br>
        На санитарной остановке будет возможность перекуса (чай,кофе)<br>
        подушечку под голову в автобус;<br>
        наличные деньги. Мелочь для посещения санитарных зон, в некоторых местах посещение платное;<br>
        влажные салфетки, туалетная бумага;<br>
        заряженный телефон, (если есть)- зарядное устройство;<br>
        Для посещения комплекса:<br>  
        Купальные принадлежности. Сланцы. Полотенца. Шампунь, гель для душа, мочалку;
      </div>
    </div>
    <div class="product-payment product-description-item">
      <div class="product-subtitle">Оплата тура</div>
      <div class="product-text">
        Однодневные туры оплачиваются в течении трех суток - 100%.<br>
        Многодневные туры - предоплата 30%-50% в течении трех суток<br>
        За 14 дней до отправления оплачивается полностью.
      </div>
    </div>
    <div class="product-photos product-description-item">
      <div class="product-subtitle">Фото тура</div>
      <div class="product-photos-grid-container">
        <div class="product-photos-item">
          <img src="/img/temp-product-photo.jpg" alt="">
        </div>
        <div class="product-photos-item">
          <img src="/img/temp-product-photo.jpg" alt="">
        </div>
        <div class="product-photos-item">
          <img src="/img/temp-product-photo.jpg" alt="">
        </div>
        <div class="product-photos-item">
          <img src="/img/temp-product-photo.jpg" alt="">
        </div>
        <div class="product-photos-item">
          <img src="/img/temp-product-photo.jpg" alt="">
        </div>
      </div>
    </div>
    @if(count($testimonials) > 0)
      <div class="product-testimonials product-description-item">
        <div class="product-subtitle">Отзывы клиентов о туре</div>
        <div class="testimonials">
          @foreach($testimonials as $testimonial)
            @include('testimonial-card')            
          @endforeach
        </div>
        <div class="testimonials-buttons product-buttons">
          <button class="load-more-btn primary-btn product-primary-btn">Загрузить еще</button>
          <button class="write-btn secondary-btn js-testimonial-modal-btn">Написать отзыв</button>
        </div>
      </div>
    @endif
  </div>

  @include('callback-section')

</div>

@endsection
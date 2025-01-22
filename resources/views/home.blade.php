@section('title', 'Home')

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/swiper-bundle.min.css') }}">
@endsection

@section('content')

<div class="home-page">
  <div class="main-section section">
    <div class="container">
      <div class="main-title">Урал Тур</div>
      <div class="main-subtitle">Клуб путешественников</div>
      @include('search')
      <div class="selection hidden-mobile">
        <div class="flex-container">
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-tree.png" class="label-image" alt="">
              <span class="label-text">Новогодние туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection2.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
        </div>
      </div>
      <div class="hand-swipe-right hidden-desktop">
        <img src="/img/hand-swipe-right.png" alt="">
      </div>
    </div>
    <div class="selection slider-wrapper hidden-desktop">
      <div class="selection-slider swiper">
        <div class="swiper-wrapper">
          <div class="selection-item swiper-slide">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-tree.png" class="label-image" alt="">
              <span class="label-text">Новогодние туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
          <div class="selection-item swiper-slide">
            <div class="selection-item__image">
              <img src="/img/temp-selection2.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
          <div class="selection-item swiper-slide">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
          <div class="selection-item swiper-slide">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
            <a href="#" class="full-link"></a>
          </div>
        </div>
      </div>
    </div>
    <div class="main-section-bg">
      <img src="/img/main-section-bg.png" alt="">
    </div>
  </div>

  <div class="category-section section">
    <div class="container">
      <div class="section-title">Каталог</div>
      <div class="categories">
        @foreach($categories as $category)
          <div class="categories-item">
            <div class="categories-item__image">
              <img src="{{ Storage::url($category->image) }}" alt="">
            </div>
            <div class="categories-item__title">{{ $category->title }}</div>
            <div class="categories-item__quantity">{{ $category->products->count() }} туров</div>
            <div class="linear-gradient"></div>
            <a href="/catalog/{{ $category->slug }}" class="full-link"></a>
          </div>
        @endforeach      
        <div class="categories-top-right">
          <img src="/img/categories-top-right.png" alt="">
        </div>
        <div class="categories-bottom-left">
          <img src="/img/categories-bottom-left.png" alt="">
        </div>
      </div>
    </div>
  </div>

  <div class="testimonials-section section">
    <div class="container">
      <div class="section-title">Читайте отзывы<br> наших клиентов</div>
      <div class="testimonials hidden-mobile">
        @foreach($testimonials as $testimonial)
          @include('testimonial-card')
        @endforeach
      </div>
    </div>
    <div class="container">
      <div class="hand-swipe-right hidden-desktop">
        <img src="/img/hand-swipe-right.png" alt="">
      </div>
    </div>  
    <div class="slider-wrapper">
      <div class="testimonials-slider swiper hidden-desktop">
        <div class="swiper-wrapper">
          @foreach($testimonials as $testimonial)
            <div class="swiper-slide">
              @include('testimonial-card')
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="container">
      <div class="see-all">
        <a href="/testimonials" class="see-all-link">смотреть все отзывы</a>
      </div>
    </div>    
  </div>

  @include('booking-section')

  <div class="faq-section section">
    <div class="container">
      <div class="grid-container">
        <div class="title">
          <div class="section-title">Отвечаем<br>на вопросы</div>
        </div>      
        <div class="questions">
          <div class="questions-item active">
            <div class="questions-item__title">Вопрос 1</div>
            <div class="questions-item__content">Сервис понравился Сервис компании АЛЕАН понравился. Изначально выбрали другой отель, но потом выбор пал на другой отель, компания сделала нам возврат денежных средств в полном объеме. За что огромное спасибо. Сервис понравился</div>
            <div class="circle">
              <div class="arrow"></div>
            </div>
          </div>
          <div class="questions-item">
            <div class="questions-item__title">Вопрос 2</div>
            <div class="questions-item__content">Нейросеть генератор текста — уникальное решение для создания качественного контента без усилий. Наша платформа UltraText.ru использует передовые технологии искусственного интеллекта для генерации материала любой сложности. С нами каждая ваша идея воплотится в жизни быстро и легко, обеспечивая высокую точность и уникальность.</div>
            <div class="circle">
              <div class="arrow"></div>
            </div>
          </div>
          <div class="questions-item">
            <div class="questions-item__title">Вопрос 3</div>
            <div class="questions-item__content">Иначе говоря, вы получаете незаменимого помощника, который всегда под рукой. Искусственный интеллект для текста способен анализировать и понимать поставленную задачу, что позволяет ему генерировать уникальный, качественный контент. В частности, это отличное решение для предпринимателей, блогеров и маркетологов, стремящихся увеличить свой охват и улучшить контент.</div>
            <div class="circle">
              <div class="arrow"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="description-section">
    <div class="container">
      <div class="grid-container">
        <div class="description-item">
          <div class="section-title">Немного о нас</div>
          <div class="description-subtitle">УралТур</div>
          <p class="description-text">Организованные туры по России. Экскурсии для взрослых и школьников. Тур выходного дня, автобусные туры. Выезд из Миасса, Чебаркуля, Златоуста. Путевки в санатории Урала и Башкирии. Речные круизы.</p>
          <p class="description-text">Организованные туры по России. Экскурсии для взрослых и школьников. Тур выходного дня, автобусные туры. Выезд из Миасса, Чебаркуля, Златоуста. Путевки в санатории Урала и Башкирии. Речные круизы.</p>
        </div>
        <div class="description-item">
          <div class="description-gallery">
            <div class="description-gallery-item">
              <img src="/img/temp-description-gallery1.jpg" alt="">
            </div>
            <div class="description-gallery-item">
              <img src="/img/temp-description-gallery2.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="description-item start4">
          <div class="description-gallery">
            <div class="description-gallery-item">
              <img src="/img/temp-description-gallery3.jpg" alt="">
            </div>
            <div class="description-gallery-item">
              <img src="/img/temp-description-gallery4.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="description-item">
          <div class="description-subtitle">Еще информация</div>
          <p class="description-text">Организованные туры по России. Экскурсии для взрослых и школьников. Тур выходного дня, автобусные туры. Выезд из Миасса, Чебаркуля, Златоуста. Путевки в санатории Урала и Башкирии. Речные круизы.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="advantages-section section">
    <div class="container">
      <div class="section-title">Преимущества</div>
      <div class="advantages">
        <div class="advantages-item">
          <div class="advantages-item__image">
            <img src="/img/advantages-star.png" alt="">
          </div>
          <div class="advantages-item__title">20 лет на рынке туризма</div>
          <div class="advantages-item__text">Более 300 разнообразных туров по России и странам СНГ</div>
        </div>
        <div class="advantages-item">
          <div class="advantages-item__image">
            <img src="/img/advantages-smile.png" alt="">
          </div>
          <div class="advantages-item__title">400 тыс довольных туристов</div>
          <div class="advantages-item__text">Знаем как организовать идеальное путешествие. На связи со своими клиентами, даже во время отдыха</div>
        </div>
        <div class="advantages-item">
          <div class="advantages-item__image">
            <img src="/img/advantages-card.png" alt="">
          </div>
          <div class="advantages-item__title">Безопасные условия оплаты</div>
          <div class="advantages-item__text">Оплата без комиссии посредникам Беспроцентная рассрочка</div>
        </div>
      </div>
    </div>
  </div>

  @include('callback-section')

</div>

@endsection

@section('script')
<script src="{{ asset('/js/swiper-bundle.min.js') }}"></script>
@endsection
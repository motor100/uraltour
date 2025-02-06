@section('title', $product->title)

@extends('layouts.main')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/photoswipe.css') }}">
@endsection

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
      <a href="/catalog/{{ $product->category->slug }}">{{ $product->category->title }}</a>
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
      @if(count($product->gallery) > 0)
        <div class="product-gallery">
          @foreach($product->gallery as $gallery)
            <figure class="product-gallery-item">
              <a href="{{ Storage::url($gallery->image) }}" data-pswp-width="600" data-pswp-height="600" target="_blank">
                <img src="{{ Storage::url($gallery->image) }}" alt="">
              </a>
            </figure>
          @endforeach
        </div>
      @endif
      <div class="product-image">
        <img src="{{ Storage::url($product->image) }}" alt="">
      </div>
      <div class="product-content">
        <div class="product-title primary-title">{{ $product->title }}</div>
        <div class="product-rating">
          <div class="rating-text">Рейтинг</div>
          <div class="stars">
            <div class="star active">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
              </svg>
            </div>
            <div class="star active">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
              </svg>
            </div>
            <div class="star active">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
              </svg>
            </div>
            <div class="star active">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
              </svg>
            </div>
            <div class="star">
              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="star-path" d="M6 0L7.77994 4.05749L12 4.58359L8.88 7.61736L9.7082 12L6 9.81749L2.2918 12L3.12 7.61736L0 4.58359L4.22006 4.05749L6 0Z"/>
              </svg>
            </div>
          </div>
          <span class="testimonials-count">12 отзывов</span>
        </div>
        @if($product->start_date)
          <div class="product-start-date">{{ $product->start_date->format('d.m.Y') }}</div>
        @endif
        
        <div class="product-price">
          <span class="product-price__value">{{ number_format($product->price, 0, '', ' ') }}</span>
          <span class="product-price__currency">P</span>
        </div>
        <div class="product-buttons">
          <a href="tel:+79123080608" class="booking-tour-btn product-primary-btn primary-btn">Позвонить</a>
          <button class="write-btn secondary-btn js-callback-modal-btn">Написать нам</button>
        </div>
      </div>
    </div>

    @if($product->description)
      <div class="product-description product-description-item">
        <div class="product-subtitle">Описание</div>
        <div class="product-text">{!! nl2br($product->description->text_html) !!}</div>
      </div>
    @endif
    
    <div class="product-plan product-description-item">
      <div class="product-subtitle">Программа</div>
      <div class="product-text">
        10.00 Выезд из Челябинска пр. Ленина 69  памятник  Горькому<br>
        11:00 - 14:00 - посещение комплекса термальных бассейнов Баден-Баден Лесная сказка (3 часа). Выезд в Челябинск.<br>
        14.30 -Отправление в Челябинск<br>
        15.30- Прибытие в город Челябинск. время ориентировочное и может изменяться в зависимости от подготовленности группы, дорожных, погодных условий. (компания оставляет за собой право незначительно изменять порядок прохождения программы<br> 
        с сохранением ее содержания в целом)
      </div>
      <div class="product-note orange-color">* время ориентировочное и может изменяться в зависимости от подготовленности группы и погодных условий.</div>
    </div>

    <!-- 
    <div class="product-include product-description-item">
      <div class="product-subtitle">В стоимость включено</div>
      <div class="product-text">
        проезд на микроавтобусе / автобусе (туда и обратно), посещение комплекса термальных бассейнов по тарифу "3 часа"<br>
        При наборе группы менее 19 человек будет подан микроавтобус туристического класса.
      </div>
    </div>
     -->

    @if($product->description->recommendation)
      <div class="product-recommendation product-description-item">
        <div class="product-subtitle">Рекомендации</div>
        <div class="product-text">{!! $product->description->recommendation->text_html !!}</div>
      </div>
    @endif
    
    @if($product->description->payment)
    <div class="product-payment product-description-item">
      <div class="product-subtitle">Оплата</div>
      <div class="product-text">{!! $product->description->payment->text_html !!}</div>
    </div>
    @endif

    <div class="product-photos product-description-item">
      <div class="product-subtitle">Фото</div>
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
    
    <div class="product-testimonials product-description-item">
      <div class="product-subtitle">Отзывы клиентов</div>
      <button class="write-btn secondary-btn js-testimonial-modal-btn">Написать отзыв</button>
      @if(count($testimonials) > 0)
        <div class="testimonials">
          @foreach($testimonials as $testimonial)
            @include('testimonial-card')            
          @endforeach
        </div>

        <div class="pagination-links">
          {{ $testimonials->onEachSide(1)->links() }}
        </div>
      @endif
      <!-- <div class="testimonials-buttons product-buttons">
        <button class="load-more-btn primary-btn product-primary-btn">Загрузить еще</button>
        <button class="write-btn secondary-btn js-testimonial-modal-btn">Написать отзыв</button>
      </div> -->
    </div>
    
  </div>

  @include('callback-section')

</div>

@endsection

@section('script')
  <script type="module" src="{{ asset('/js/photoswipe-lightbox.esm.min.js') }}"></script>
  <script type="module">
    import PhotoSwipeLightbox from '/js/photoswipe-lightbox.esm.min.js';
    // Photoswipe
    const lightbox = new PhotoSwipeLightbox({
      gallery: '.product-gallery',
      children: 'a',
      pswpModule: () => import('/js/photoswipe.esm.js'),
      loop: true
    });
    lightbox.init();
  </script>
@endsection
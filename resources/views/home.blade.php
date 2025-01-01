@section('title', 'Home')

@extends('layouts.main')

@section('content')

<div class="home-page">
  <div class="main-section section">
    <div class="container">
      <div class="main-title">Урал Тур</div>
      <div class="main-subtitle">Клуб путешественников</div>
      <div class="search-wrapper">
        <form class="search-form" action="/search" method="get">
          <div class="grid-container">
            <input type="text" name="search_query" class="search-input" placeholder="Найти тур">
            <button class="search-submit-btn">
              <img src="/img/search-icon.png" class="search-submit-btn__image" alt="">
              <span class="search-submit-btn__text">Найти тур</span>
            </button>
           </div>
          <img src="/img/search-lens.png" class="search-lens" alt="">
        </form>
        
      </div>
      <div class="selection">
        <div class="grid-container">
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label label-blue">
              <img src="/img/selection-label-tree.png" class="label-image" alt="">
              <span class="label-text">Новогодние туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-blue-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
          </div>
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection2.jpg" alt="">
            </div>
            <div class="label label-orange">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
          </div>
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label label-orange">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
          </div>
          <div class="selection-item">
            <div class="selection-item__image">
              <img src="/img/temp-selection1.jpg" alt="">
            </div>
            <div class="label label-orange">
              <img src="/img/selection-label-fire.png" class="label-image" alt="">
              <span class="label-text">Горячие туры</span>
            </div>
            <div class="label-element">
              <img src="/img/selection-orange-element.png" alt="">
            </div>
            <div class="selection-item__title">Название</div>
            <div class="selection-item__description">Краткое описание</div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="main-section-bg">
      <img src="/img/main-section-bg.png" alt="">
    </div>
  </div>
</div>

<div class="category-section section">
  <div class="container">
    <div class="section-title">Категории туров</div>
    <div class="categories">
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">Национальные маршруты</div>
        <div class="categories-item__quantity">56 туров</div>
        <div class="linear-gradient"></div>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">Поездки по России</div>
        <div class="categories-item__quantity">12 туров</div>
        <div class="linear-gradient"></div>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">Ближнее зарубежье</div>
        <div class="categories-item__quantity">109 туров</div>
        <div class="linear-gradient"></div>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">Тур выходного дня</div>
        <div class="categories-item__quantity">4 туров</div>
        <div class="linear-gradient"></div>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">Детские</div>
        <div class="categories-item__quantity">2 туров</div>
        <div class="linear-gradient"></div>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">По странам</div>
        <div class="categories-item__quantity">1 туров</div>
        <div class="linear-gradient"></div>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">По городам</div>
        <div class="categories-item__quantity">134 туров</div>
        <div class="linear-gradient"></div>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
        </div>
        <div class="categories-item__title">По городам</div>
        <div class="categories-item__quantity">37 туров</div>
        <div class="linear-gradient"></div>
      </div>
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
    <div class="testimonials">
      <div class="testimonials-item">
        <div class="testimonials-item__title">Морозов Алексей</div>
        <div class="testimonials-item__rating">
          <img src="/img/temp-rating.png" alt="">
        </div>
        <div class="testimonials-item__date">12.12.24</div>
        <div class="testimonials-item__text">Сервис компании АЛЕАН понравился. Изначально выбрали другой отель, но потом выбор пал на другой отель, компания сделала нам возврат денежных средств...</div>
      </div>
      <div class="testimonials-item">
        <div class="testimonials-item__title">Морозов Алексей</div>
        <div class="testimonials-item__rating">
          <img src="/img/temp-rating.png" alt="">
        </div>
        <div class="testimonials-item__date">12.12.24</div>
        <div class="testimonials-item__text">Сервис компании АЛЕАН понравился. Изначально выбрали другой отель, но потом выбор пал на другой отель, компания сделала нам возврат денежных средств...</div>
      </div>
      <div class="testimonials-item">
        <div class="testimonials-item__title">Морозов Алексей</div>
        <div class="testimonials-item__rating">
          <img src="/img/temp-rating.png" alt="">
        </div>
        <div class="testimonials-item__date">12.12.24</div>
        <div class="testimonials-item__text">Сервис компании АЛЕАН понравился. Изначально выбрали другой отель, но потом выбор пал на другой отель, компания сделала нам возврат денежных средств...</div>
      </div>
      <div class="testimonials-item">
        <div class="testimonials-item__title">Морозов Алексей</div>
        <div class="testimonials-item__rating">
          <img src="/img/temp-rating.png" alt="">
        </div>
        <div class="testimonials-item__date">12.12.24</div>
        <div class="testimonials-item__text">Сервис компании АЛЕАН понравился. Изначально выбрали другой отель, но потом выбор пал на другой отель, компания сделала нам возврат денежных средств...</div>
      </div>
      <div class="testimonials-item">
        <div class="testimonials-item__title">Морозов Алексей</div>
        <div class="testimonials-item__rating">
          <img src="/img/temp-rating.png" alt="">
        </div>
        <div class="testimonials-item__date">12.12.24</div>
        <div class="testimonials-item__text">Сервис компании АЛЕАН понравился. Изначально выбрали другой отель, но потом выбор пал на другой отель, компания сделала нам возврат денежных средств...</div>
      </div>
      <div class="testimonials-item">
        <div class="testimonials-item__title">Морозов Алексей</div>
        <div class="testimonials-item__rating">
          <img src="/img/temp-rating.png" alt="">
        </div>
        <div class="testimonials-item__date">12.12.24</div>
        <div class="testimonials-item__text">Сервис компании АЛЕАН понравился. Изначально выбрали другой отель, но потом выбор пал на другой отель, компания сделала нам возврат денежных средств...</div>
      </div>
    </div>
    <div class="see-all">
      <a href="#" class="see-all-link">смотреть все отзывы</a>
    </div>
  </div>
</div>

<div class="container">
  <p>Товары</p>
  <div class="products">
    <div class="products-item"></div>
    <div class="products-item"></div>
    <div class="products-item"></div>
    <div class="products-item"></div>
  </div>
</div>



@endsection
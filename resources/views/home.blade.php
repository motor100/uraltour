@section('title', 'Home')

@extends('layouts.main')

@section('content')

<div class="home-page">
  <div class="main-section">
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
          <div class="selection-item"></div>
          <div class="selection-item"></div>
          <div class="selection-item"></div>
          <div class="selection-item"></div>
        </div>
      </div>
    </div>
    <div class="main-section-bg">
      <img src="/img/main-section-bg.png" alt="">
    </div>
  </div>
</div>

<div class="category-section">
  <div class="container">
    <div class="section-title">Категории туров</div>
    <div class="categories">
      <div class="categories-item">
        <!-- <div class="grid-container"> -->
          <div class="categories-item__title">Национальные маршруты</div>
          <div class="categories-item__quantity">56 туров</div>
        <!-- </div> -->
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
        </div>
        <!-- <a href="/catalog/nacionalnye-marshruty">Национальные маршруты</a> -->
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
        </div>
        <a href="/catalog/poezdki-po-rossii">Поездки по России</a>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
        </div>
        <a href="/catalog/tury-vyhodnogo-dnya">Туры выходного дня</a>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
        </div>
        <a href="/catalog/nacionalnye-marshruty">Национальные маршруты</a>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
        </div>
        <a href="/catalog/poezdki-po-rossii">Поездки по России</a>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
        </div>
        <a href="/catalog/tury-vyhodnogo-dnya">Туры выходного дня</a>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
        </div>
        <a href="/catalog/poezdki-po-rossii">Поездки по России</a>
      </div>
      <div class="categories-item">
        <div class="categories-item__image">
          <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
        </div>
        <a href="/catalog/tury-vyhodnogo-dnya">Туры выходного дня</a>
      </div>
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
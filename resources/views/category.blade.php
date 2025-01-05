@section('title', $category->title)

@extends('layouts.main')

@section('content')

@include('search-section')

<div class="breadcrumbs">
  <div class="container">
    <div class="parent">
      <img src="/img/breadcrumbs-home.png" class="home-icon" alt="">
      <a href="{{ route('home') }}">Главная</a>
    </div>
    <div class="separator">/</div>
    <div class="active">{{ $category->title }}</div>
  </div>
</div>

<div class="category-page">
  <div class="container">
    <div class="page-title">{{ $category->title }}</div>

    <div class="sort">
      <select name="" id="">
        <option value="">По популярности</option>
        <option value="">По цене</option>
      </select>
    </div>

    <div class="content-wrapper">
      <div class="content-grid-container">
        <div class="filter">
          <p>111</p>
        </div>
        <div class="content">

          <div class="big-product">
            <div class="big-product__image">
              <img src="/img/temp-big-product.jpg" alt="">
            </div>
            <div class="big-product__content">
              <div class="grid-container">
                <div class="left">
                  <div class="big-product__title">15.12 - гора Малый УВАЛ (1007м.) Новинка!</div>
                  <div class="big-product__description">Вершина Малый УВАЛ находится в южной части хребта Сука, но представляет отдельную большую гору, разделенную Макаровым долом...</div>
                  <div class="big-product__rating">
                    <img src="/img/temp-rating.png" alt="">
                  </div>
                </div>
                <div class="right">
                  <div class="content">
                    <div class="big-product__price">
                      <span class="value">3750</span>
                      <span class="currency"> Р</span>
                    </div>
                    <div class="date">
                      <div class="date-text">Дата тура</div>
                      <div class="date-value">3.01.2025</div>
                    </div>
                    
                  </div>
                  <a href="#" class="big-product__btn">Смотреть тур</a>
                </div>
              </div>
            </div>
          </div>

          @if(count($products) > 0)
          <div class="products">
            @foreach($products as $product)
              @include('product-card')
            @endforeach
          </div>
          @else
            <div class="category-is-empty ccf-is-empty">
              <div class="category-is-empty-image ccf-is-empty-image">
                <img src="/img/category-is-empty-bell.svg" alt="">
              </div>
              <div class="category-is-empty-text ccf-is-empty-text">В этой категории нет товаров</div>
              <button class="primary-btn btn-305 ccf-is-empty-btn" onclick="history.back();">ВЕРНУТЬСЯ НАЗАД</button>
            </div>
          @endif

          <div class="pagination-links">
            {{ $products->onEachSide(1)->links() }}
          </div>
        </div>
      </div>
    </div>
    
  </div>

</div>
@endsection
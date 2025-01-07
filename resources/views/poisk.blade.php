@section('title', $search_query)

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
    <div class="active">{{ $search_query }}</div>
  </div>
</div>

<div class="category-page">
  <div class="container">
    <div class="page-title">{{ $search_query }}</div>
<!-- 
    <div class="sort">
      <select name="" id="">
        <option value="">По популярности</option>
        <option value="">По цене</option>
      </select>
    </div>
 -->
    <div class="content-wrapper">
      <div class="content-grid-container">
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
        </div>
        <div class="content">

          @if(count($products) > 0)
          <div class="products">
            @foreach($products as $product)
              @include('product-card')
            @endforeach
          </div>
          @else
            <p>Не найдено</p>
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
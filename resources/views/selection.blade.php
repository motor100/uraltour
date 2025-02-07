@section('title', $selection->title)

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
    <div class="active">{{ $selection->title }}</div>
  </div>
</div>

<div class="selection-page category-page">
  <div class="container">
    <div class="page-title">{{ $selection->title }}</div>
  </div>

  @if(count($selection->products) > 0)
    <div class="products-section">
      <div class="container">

        <div id="filter-menu-btn" class="filter-menu-btn hidden-desktop">Фильтры</div>

        <div class="sort">
          <span class="sort-text">Сортировка</span>
          <a href="{{ url()->current() }}?sort=desc" class="expensive-first first {{ request()->sort == 'desc' ? 'active' : '' }}" data-sort="desc">сначала дорогие</a>
          <a href="{{ url()->current() }}?sort=asc" class="cheap-first first {{ request()->sort == 'asc' ? 'active' : '' }}" data-sort="asc">сначала дешевые</a>
        </div>

        <div class="grid-container">
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
          <div class="content">

            <div class="products">
              @foreach($selection->products as $product)
                @include('product-card')
              @endforeach
            </div>

          </div>
        </div>
        
      </div>
    </div>
  @endif

</div>
@endsection
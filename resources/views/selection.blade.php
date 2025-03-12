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
    <div class="active">{{ mb_strtolower($selection->title) }}</div>
  </div>
</div>

<div class="selection-page category-page sp-page">
  <div class="container">
    <div class="page-title">{{ $selection->title }}</div>
  </div>

  <div class="products-section">
    <div class="container">
      @if(count($selection->products) > 0)
        <div id="filter-menu-btn" class="filter-menu-btn hidden-desktop">Фильтры</div>

        <div class="sort">
          <span class="sort-text">Сортировка</span>
          <a href="{{ url()->current() }}?sort=desc" class="expensive-first first {{ request()->sort == 'desc' ? 'active' : '' }}" data-sort="desc">сначала дорогие</a>
          <a href="{{ url()->current() }}?sort=asc" class="cheap-first first {{ request()->sort == 'asc' ? 'active' : '' }}" data-sort="asc">сначала дешевые</a>
        </div>

        <div class="products sp-products">
          @foreach($selection->products as $product)
            @include('product-card')
          @endforeach
        </div>

        <div class="selection-description">{{ $selection->description }}</div>
      @else
        <p class="no-product">Товаров не найдено</p>
      @endif
    </div>
  </div>

</div>
@endsection
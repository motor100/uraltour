@section('title', 'Поиск')

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
      <span>Поиск</span>
    </div>
  </div>
</div>

<div class="poisk-page category-page sp-page">
  <div class="container">
    <div class="page-title">Результаты поиска</div>

    <div class="content-wrapper">
      <div class="search-query">{{ $search_query }}</div>

      <div class="sort">
        <span class="sort-text">Сортировка</span>
        <a href="{{ url()->query('/poisk', ['search_query' => $search_query, 'sort' => 'desc']) }}" class="expensive-first first {{ request()->sort == 'desc' ? 'active' : '' }}" data-sort="desc">сначала дорогие</a>
        <a href="{{ url()->query('/poisk', ['search_query' => $search_query, 'sort' => 'asc']) }}" class="cheap-first first {{ request()->sort == 'asc' ? 'active' : '' }}" data-sort="asc">сначала дешевые</a>
      </div>

      @if(count($products) > 0)
        <div class="products sp-products">
          @foreach($products as $product)
            @include('product-card')
          @endforeach
        </div>
      @else
        <p class="no-product">Товаров не найдено</p>
      @endif
      
      <div class="pagination-links">
        {{ $products->onEachSide(1)->links() }}
      </div>

    </div>
  </div>
</div>

@endsection
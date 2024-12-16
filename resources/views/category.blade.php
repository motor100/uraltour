@section('title', $category->title)

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="active">{{ $category->title }}</div>
</div>

<div class="category">

  <div class="page-title">{{ $category->title }}</div>

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
@endsection
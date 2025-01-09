@section('title', 'Каталог')

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
    <div class="active">Каталог</div>
  </div>
</div>

<div class="catalog-page">

  <div class="category-section section">
    <div class="container">
      <div class="page-title">Каталог</div>
      <div class="categories">
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">Национальные маршруты</div>
          <div class="categories-item__quantity">56 туров</div>
          <div class="linear-gradient"></div>
          <a href="/catalog/nacionalnye-marshruty" class="full-link"></a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">Поездки по России</div>
          <div class="categories-item__quantity">12 туров</div>
          <div class="linear-gradient"></div>
          <a href="/catalog/poezdki-po-rossii" class="full-link"></a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">Тур выходного дня</div>
          <div class="categories-item__quantity">4 туров</div>
          <div class="linear-gradient"></div>
          <a href="/catalog/tury-vyhodnogo-dnya" class="full-link"></a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">Ближнее зарубежье</div>
          <div class="categories-item__quantity">109 туров</div>
          <div class="linear-gradient"></div>
          <a href="#" class="full-link"></a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">Детские</div>
          <div class="categories-item__quantity">2 туров</div>
          <div class="linear-gradient"></div>
          <a href="#" class="full-link"></a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category3.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">По странам</div>
          <div class="categories-item__quantity">1 туров</div>
          <div class="linear-gradient"></div>
          <a href="#" class="full-link"></a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category1.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">По городам</div>
          <div class="categories-item__quantity">134 туров</div>
          <div class="linear-gradient"></div>
          <a href="#" class="full-link"></a>
        </div>
        <div class="categories-item">
          <div class="categories-item__image">
            <img src="{{ Storage::url('uploads/categories/category2.jpg') }}" alt="">
          </div>
          <div class="categories-item__title">По городам</div>
          <div class="categories-item__quantity">37 туров</div>
          <div class="linear-gradient"></div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
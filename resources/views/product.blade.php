@section('title', $product->title)

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
    <div class="parent">
      <a href="/catalog/{{ $category->slug }}">{{ $category->title }}</a>
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
    <div class="grid-container">
      <div class="product-gallery">
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
        <div class="product-gallery-item">
          <img src="/img/test-image-small.jpg" alt="">
        </div>
      </div>
      <div class="product-image">
        <img src="/img/test-image-big.jpg" alt="">
      </div>
      <div class="product-content">
        <div class="product-title">23.12 - Баден-Баден дневное купание</div>
        <div class="product-price">
          <span class="product-price__value">1800</span>
          <span class="product-price__currency">&nbsp;P</span>
        </div>
        <div class="description-title">Описание</div>
        <div class="description">
        БАДЕН - БАДЕН «Лесная сказка»! 💦 👙 👍 🌲<br>
        купание 3 часа (+15 мин)<br>
        📆 23 декабря (пн)<br>
        💰 1800 руб. - пенсионеры,<br>
        2400 руб. - дети до 12 лет и льготники (инв.),<br>
        2600 руб. - взрослые<br>

        ✅ В стоимость входит:<br>
        🔸 проезд на туристическом автобусе;<br>
        🔸купание в двух термальных бассейнах<br>
        🔸БАНИ НАРОДОВ МИРА!<br>
        🔸внутренний бассейн с джакузи;<br>
        🔸шезлонги;<br>
        🔸Комплекс саун, хамам,<br>
        🔸соляная комната;<br>
        🔸сопровождение, транспортная страховка.<br>
        </div>
      </div>
    </div>
  </div>


  

</div>

@endsection
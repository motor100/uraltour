@section('title', '404')

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
    <div class="active">404</div>
  </div>
</div>

<div class="page404">
  <div class="container">
    <div class="page404-text">УПС.... Что-то пошло не так или такой страницы не существует(</div>
    <a href="/catalog" class="page404-btn primary-btn">В каталог</a>
  </div>
</div>

@endsection  
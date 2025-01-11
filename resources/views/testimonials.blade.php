@section('title', 'Отзывы')

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
    <div class="active">Отзывы</div>
  </div>
</div>

<div class="testimonials-page">
  <div class="container">
    <div class="page-title">Читайте отзывы наших клиентов</div>
    
      @if(count($testimonials) > 0)
        <div class="testimonials">
          @foreach($testimonials as $testimonial)
            @include('testimonial-card')            
          @endforeach
        </div>
      @else
        <div class="testimonials-is-empty">
          <div class="testimonials-is-empty-text">Отзывов нет</div>
          <button class="primary-btn" onclick="history.back();">ВЕРНУТЬСЯ НАЗАД</button>
        </div>
      @endif

    <div class="pagination-links">
      {{ $testimonials->onEachSide(1)->links() }}
    </div>

    <button class="write-btn secondary-btn">Написать отзыв</button>
  </div>
</div>

@endsection
@section('title', $product->title)

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="parent">
    <a href="{{ $category->slug }}">{{ $category->title }}</a>
  </div>
  <div class="arrow">></div>
  <div class="active">{{ $product->title }}</div>
</div>

<div class="product">



  

</div>
@endsection
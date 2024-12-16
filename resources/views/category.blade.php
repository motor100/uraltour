@section('title', 'Каталог')

@extends('layouts.main')

@section('content')

<div class="breadcrumbs">
  <div class="parent">
    <a href="{{ route('home') }}">Главная</a>
  </div>
  <div class="arrow">></div>
  <div class="parent">
    <a href="{{-- route('catalog') --}}">Каталог</a>
  </div>
  <div class="arrow">></div>
  @if(isset($parent))
    <div class="parent">
      <a href="/category/{{-- $ parent[0]->slug --}}">{{-- $ parent[0]->title --}}</a>
    </div>
    <div class="arrow">></div>
    @if(count($parent) > 1)
      <div class="parent">
        <a href="/category/{{-- $ parent[0]->slug --}}/{{-- $ parent[1]->slug --}}">{{-- $ parent[1]->title --}}</a>
      </div>
      <div class="arrow">></div>
    @endif
  @endif
  <div class="active">{{-- $ categories[0]->title --}}</div>
</div>

<div class="category">

  <div class="products">
   
  </div>


  <div class="pagination-links">
    {{-- $ products->onEachSide(1)->links() --}}
  </div>

</div>
@endsection
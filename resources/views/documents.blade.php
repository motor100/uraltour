@section('title', 'Документы')

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
    <div class="active">Документы</div>
  </div>
</div>

<div class="documents-page">
  <div class="container">
    <div class="page-title">Документы</div>
    @foreach($documents as $document)
      <a href="{{ Storage::url($document->file) }}" class="document" target="_blank">{{ $document->title }}</a>
    @endforeach
  </div>
</div>

@endsection
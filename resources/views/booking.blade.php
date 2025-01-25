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
    <div class="active">Бронирование</div>
  </div>
</div>

<div class="booking-page">
  <div class="container">
    <div class="page-title">Бронирование</div>
    
    @if(session()->get('status'))
      <div class="alert alert-success">
        {{ session()->get('status') }}
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form class="booking-form" action="" method="post">
      <div class="flex-container">
        <div class="form-group">
          <label for="" class="label">Имя<span class="required-star">*</span></label>
          <input type="text" name="name" class="input-field" placeholder="Введите имя">
        </div>
        <div class="form-group">
          <label for="" class="label">Фамилия<span class="required-star">*</span></label>
          <input type="text" name="surname" class="input-field" placeholder="Введите фамилию">
        </div>
        <div class="form-group">
          <label for="" class="label">Отчество<span class="required-star">*</span></label>
          <input type="text" name="patronymic" class="input-field" placeholder="Введите отчество">
        </div>
      </div>
      <div class="flex-container">
        <div class="form-group">
          <label for="" class="label">Дата рождения<span class="required-star">*</span></label>
          <input type="text" name="birthdate" class="input-field" placeholder="дд.мм.гггг">
        </div>
        <div class="form-group">
          <label for="" class="label">Серия паспорта<span class="required-star">*</span></label>
          <input type="text" name="pass-series" class="input-field" placeholder="_ _ _ _">
        </div>
        <div class="form-group">
          <label for="" class="label">Номер паспорта<span class="required-star">*</span></label>
          <input type="text" name="pass-nmber" class="input-field" placeholder="_ _ _ _ _ _">
        </div>
      </div>
      <div class="flex-container">
        <div class="form-group form-group-address">
          <label for="" class="label">Адрес<span class="required-star">*</span></label>
          <input type="text" name="address" class="input-field" placeholder="Введите адрес по прописке">
        </div>
        <div class="form-group form-group-phone">
          <label for="" class="label">Номер телефона<span class="required-star">*</span></label>
          <input type="text" name="phone" class="input-field" placeholder="+7 (000) 000 00 00">
        </div>
      </div>
    </form>

  </div>
</div>

@endsection
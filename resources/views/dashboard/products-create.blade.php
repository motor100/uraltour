@extends('dashboard.layout')

@section('title', 'Добавить товар')

@section('style')
  <link rel="stylesheet" href="{{ asset('/adminpanel/css/air-datepicker.css') }}">
@endsection

@section('dashboardcontent')

<div class="dashboard-content">
    
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form id="save-data-form" class="form" action="{{ route('dashboard.products-store') }}" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="title">Название*</label>
      <input type="text" class="form-control" name="title" id="title" minlength="2" maxlength="250" required value="{{ old('title') }}">
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Описание</div>
      @if(old('text_json'))
        <div id="to-editorjs" style="display: none;">{{ old('text_json') }}</div>
      @endif
      <div id="editorjs"></div>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Рекомендация</div>
      <select name="recommendation" class="form-select mt-1">
        <option value="" selected="selected"></option>
        @foreach($recommendations as $rc)
          <option value="{{ $rc->id }}">{{ $rc->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Оплата</div>
      <select name="payment" class="form-select mt-1">
        <option value="" selected="selected"></option>
        @foreach($payments as $pm)
          <option value="{{ $pm->id }}">{{ $pm->title }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group mb-3">
      <div class="label-text mb-1">Категории*</div>
    </div>

    <div id="app1">
      <add-category-component :categories='@json($categories)'></add-category-component>
    </div>

    <div class="form-group mb-3">
      <input type="checkbox" id="regular" name="regular" class="form-check-input">
      <label class="form-check-label" for="regular">Регулярный</label>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Изображение*</div>
      <input type="file" name="input-main-file" id="input-main-file" class="inputfile" accept="image/jpeg,image/png">
      <label for="input-main-file" class="custom-inputfile-label">Выберите файл</label>
      <span class="namefile main-file-text">Файл не выбран</span>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Галерея (не более 4)</div>
      <input type="file" name="input-gallery-file[]" id="input-gallery-file" class="inputfile" accept="image/jpeg,image/png" multiple>
      <label for="input-gallery-file" class="custom-inputfile-label">Выберите файлы</label>
      <span class="namefile gallery-file-text">Файлы не выбраны</span>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Фото (не более 6)</div>
      <input type="file" name="input-photo-file[]" id="input-photo-file" class="inputfile" accept="image/jpeg,image/png" multiple>
      <label for="input-photo-file" class="custom-inputfile-label">Выберите файлы</label>
      <span class="namefile photo-file-text">Файлы не выбраны</span>
    </div>
    <div class="form-group mb-3">
      <label for="start_date">Дата*</label>
      <input type="text" class="form-control datepicker" name="start_date"min="0" step="1" minlength="8" maxlength="15" required value="{{ old('start_date') }}">
    </div>
    <div class="form-group mb-5">
      <label for="price">Стоимость*</label>
      <input type="number" class="form-control input-price input-number" name="price" min="0" max="500000" step="1" required value="{{ old('price') }}">
    </div>

    <input type="hidden" name="text_json" id="save-data-input" value="">

    @csrf
    <button type="submit" class="btn btn-primary">Добавить</button>
  </form>

</div>

<script>
  const menuItem = 0;
</script>

@endsection

@section('script')
  @vite(['resources/js/app.js'])
  <script src="{{ asset('/adminpanel/js/air-datepicker.js') }}"></script>
@endsection
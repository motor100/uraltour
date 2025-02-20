@extends('dashboard.layout')

@section('title', 'Редактировать товар')

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

  <form class="form" id="save-data-form" action="{{ route('dashboard.products-update', $product->id) }}" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="title" class="label-text">Название</label>
      <input type="text" class="form-control" name="title" id="title" maxlength="200" required value="{{ $product->title }}">
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Описание</div>
      @if(isset($to_editorjs))
        <div id="to-editorjs" style="display: none;">{{ $to_editorjs }}</div>
      @endif
      <div id="editorjs"></div>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Рекомендация</div>
      <select name="recommendation" class="form-select mt-1">
        <option value="" selected="selected"></option>
        @foreach($recommendations as $rc)
          @if($product->description->recommendation)
            @if($rc->id == $product->description->recommendation->id)
              <option value="{{ $rc->id }}" selected>{{ $rc->title }}</option>
            @else
              <option value="{{ $rc->id }}">{{ $rc->title }}</option>
            @endif
          @else
            <option value="{{ $rc->id }}">{{ $rc->title }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Оплата</div>
      <select name="payment" class="form-select mt-1">
        <option value="" selected="selected"></option>
        @foreach($payments as $pm)
          @if($product->description->payment)
            @if($pm->id == $product->description->payment->id)
              <option value="{{ $pm->id }}" selected>{{ $pm->title }}</option>
            @else
              <option value="{{ $pm->id }}">{{ $pm->title }}</option>
            @endif
          @else
            <option value="{{ $pm->id }}">{{ $pm->title }}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="form-group mb-3">
      <div class="label-text mb-1">Категории</div>
    </div>

    <div id="app2">
      <list-category-component :categories='@json($product->categories)'></list-category-component>
      <add-category-component :categories='@json($categories)'></add-category-component>
    </div>

    <div class="form-group mb-3">
      <input type="checkbox" id="regular" name="regular" class="form-check-input" {{ $product->regular ? 'checked' : '' }}>
      <label class="form-check-label" for="regular">Регулярный</label>
    </div>
    <div class="form-group">
      @if($product->image)
        <div class="image-preview">
          <img src="{{ Storage::url($product->image) }}" alt="">
        </div>
      @endif
    </div>
    <div class="form-group mb-3">
      <div class="label-text">Изображение</div>
      <input type="file" name="input-main-file" id="input-main-file" class="inputfile" accept="image/jpeg,image/png">
      <label for="input-main-file" class="custom-inputfile-label">Выберите файл</label>
      <span class="namefile main-file-text">Файл не выбран</span>
    </div>
    <div class="form-group">
      <div class="image-preview gallery-image-preview">
        @if($product->gallery->count() > 0)
          @foreach($product->gallery as $gl)
            <img src="{{ Storage::url($gl->image) }}" alt="">
          @endforeach
          <div class="gallery-delete">Удалить галерею</div>
        @endif
      </div>
    </div>
    <div class="form-group mb-3">
      <div class="label-text">Галерея (не более 4)</div>
      <input type="file" name="input-gallery-file[]" id="input-gallery-file" class="inputfile" accept="image/jpeg,image/png" multiple value="">
      <label for="input-gallery-file" class="custom-inputfile-label">Выберите файлы</label>
      <span class="namefile gallery-file-text">Файлы не выбраны</span>
    </div>
    <div class="form-group">
      <div class="image-preview photo-image-preview">
        @if($product->photos->count() > 0)
          @foreach($product->photos as $gl)
            <img src="{{ Storage::url($gl->image) }}" alt="">
          @endforeach
          <div class="photo-delete">Удалить фото</div>
        @endif
      </div>
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Фото (не более 6)</div>
      <input type="file" name="input-photo-file[]" id="input-photo-file" class="inputfile" accept="image/jpeg,image/png" multiple>
      <label for="input-photo-file" class="custom-inputfile-label">Выберите файлы</label>
      <span class="namefile photo-file-text">Файлы не выбраны</span>
    </div>
    <div class="form-group mb-3">
      <label for="start_date">Дата</label>
      <input type="text" class="form-control datepicker" name="start_date" min="0" step="1" value="{{ $product->start_date ? $product->start_date->format('d.m.Y') : '' }}">
    </div>
    <div class="form-group mb-5">
      <label for="price" class="label-text">Стоимость</label>
      <input type="number" class="form-control input-number" name="price" min="1" max="500000" step="1" required value="{{ $product->price }}">
    </div>

    <input type="hidden" name="delete_gallery" value="">
    <input type="hidden" name="delete_photo" value="">
    <input type="hidden" name="text_json" id="save-data-input" value="">

    @csrf
    <button type="submit" class="btn btn-primary">Обновить</button>
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
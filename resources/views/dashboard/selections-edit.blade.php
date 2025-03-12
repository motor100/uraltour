@extends('dashboard.layout')

@section('title', 'Редактировать подборку')

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

  <form class="form" id="save-data-form" action="{{ route('dashboard.selections-update', $selection->id) }}" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Название*</label>
      <input type="text" class="form-control" name="title" id="title" minlength="5" maxlength="100" required value="{{ $selection->title }}">
    </div>
    <div class="form-group mb-3">
      <label for="title" class="form-label">Краткое описание*</label>
      <input type="text" name="excerpt" id="excerpt" class="form-control" minlength="5" maxlength="100" required value="{{ $selection->excerpt }}">
    </div>

    <div class="form-group mb-3">
      <div class="label-text">Полное описание*</div>
      @if(isset($to_editorjs))
        <div id="to-editorjs" style="display: none;">{{ $to_editorjs }}</div>
      @endif
      <div id="editorjs"></div>
    </div>

    <div class="form-group">
      @if($selection->image)
        <div class="image-preview">
          <img src="{{ Storage::url($selection->image) }}" alt="">
        </div>
      @endif
    </div>
    <div class="form-group mb-3">
      <div class="label-text">Изображение</div>
      <input type="file" name="input-main-file" id="input-main-file" class="inputfile" accept="image/jpeg,image/png">
      <label for="input-main-file" class="custom-inputfile-label">Выберите файл</label>
      <span class="namefile main-file-text">Файл не выбран</span>
    </div>
    <div class="form-group mb-3">
      <div class="label-text">Товары</div>
    </div>

    <div id="app">
      <add-product-component :ps='@json($selection->products)'></add-product-component>
    </div>

    <div class="height100"></div>

    <input type="hidden" name="text_json" id="save-data-input" value="">

    @csrf
    <button type="submit" class="btn btn-primary">Обновить</button>
  </form>

  <div class="height100"></div>

</div>

<script>
  const menuItem = 5;
</script>

@endsection

@section('script')
  @vite(['resources/js/app.js', 'resources/js/editor.js'])
@endsection
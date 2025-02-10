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

  <form class="form" action="{{ route('dashboard.selections-update', $selection->id) }}" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="title" class="label-text">Название</label>
      <input type="text" class="form-control" name="title" id="title"minlength="10" maxlength="100" required value="{{ $selection->title }}">
    </div>
    <div class="form-group mb-3">
      <label for="title" class="label-text">Краткое описание</label>
      <input type="text" name="excerpt" id="excerpt" class="form-control" minlength="10" maxlength="100" required value="{{ $selection->excerpt }}">
    </div>
    <div class="form-group mb-3">
      <div class="label-text mb-1">Полное описание</div>
      <textarea name="description" id="description" class="form-control" rows="3" minlength="10" maxlength="1000" required>{{ $selection->description }}</textarea>
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

    @if(count($selection->products) > 0)
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="number-column">№</th>
            <th>Название</th>
            <th class="button-column"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($selection->products as $product)
            <tr>
              <th>{{ $loop->index + 1 }}</th>
              <td>
                <input type="text" name="products[{{ $product->id }}]" class="input-product" readonly value="{{ $product->title }}">
              </td>
              <td class="button-group">
                <form class="form" action="{{ route('dashboard.selection-product-destroy', $product->id) }}" method="get">
                  <input type="hidden" name="selection_id" value="{{ $selection->id }}">
                  @csrf
                  <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

    <div id="app">
      <add-product-component></add-product-component>
    </div>

    <div class="height100"></div>

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
  @vite(['resources/js/app.js'])
@endsection
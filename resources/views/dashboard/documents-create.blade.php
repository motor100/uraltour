@extends('dashboard.layout')

@section('title', 'Добавить документ')

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

  <form id="save-data-form" class="form" action="{{ route('dashboard.documents-store') }}" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Название*</label>
      <input type="text" class="form-control" name="title" id="title" minlength="2" maxlength="250" required value="{{ old('title') }}">
    </div>
    <div class="form-group mb-5">
      <div class="label-text">Документ*</div>
      <input type="file" name="input-main-file" id="input-main-file" class="inputfile" accept="application/pdf">
      <label for="input-main-file" class="custom-inputfile-label">Выберите файл</label>
      <span class="namefile main-file-text">Файл не выбран</span>
    </div>

    @csrf
    <button type="submit" class="btn btn-primary">Добавить</button>
  </form>

</div>

<script>
  const menuItem = 6;
</script>

@endsection
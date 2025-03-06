@extends('dashboard.layout')

@section('title', 'Добавить оплату')

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

  <form id="save-data-form" class="form" action="{{ route('dashboard.payments-store') }}" method="post">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Название</label>
      <input type="text" class="form-control" name="title" id="title" minlength="2" maxlength="250" required value="{{ old('title') }}">
    </div>
    <div class="form-group mb-3">
      <div class="label-text">Описание</div>
      <div id="editorjs"></div>
    </div>

    <input type="hidden" name="text_json" id="save-data-input" value="">

    @csrf
    <button type="submit" class="btn btn-primary">Добавить</button>
  </form>

</div>

<script>
  const menuItem = 3;
</script>

@endsection

@section('script')
  @vite(['resources/js/editor.js'])
@endsection
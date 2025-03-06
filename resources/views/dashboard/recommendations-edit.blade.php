@extends('dashboard.layout')

@section('title', 'Добавить рекомендацию')

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

  <form id="save-data-form" class="form" action="{{ route('dashboard.recommendations-update', $recommendation->id) }}" method="post">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Название</label>
      <input type="text" class="form-control" name="title" id="title" minlength="2" maxlength="250" required value="{{ $recommendation->title }}">
    </div>
    <div class="form-group mb-3">
      <div class="label-text">Описание</div>
      @if(isset($to_editorjs))
        <div id="to-editorjs" style="display: none;">{{ $to_editorjs }}</div>
      @endif
      <div id="editorjs"></div>
    </div>

    <input type="hidden" name="text_json" id="save-data-input" value="">

    @csrf
    <button type="submit" class="btn btn-primary">Обновить</button>
  </form>

</div>

<script>
  const menuItem = 2;
</script>

@endsection

@section('script')
  @vite(['resources/js/editor.js'])
@endsection
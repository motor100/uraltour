@extends('dashboard.layout')

@section('title', 'Рекомендации')

@section('dashboardcontent')

<div class="dashboard-content">

  <form class="form mb-5" action="{{ route('dashboard.recommendations') }}" method="get">
    <div class="form-group mb-3">
      <label for="search_query">Поиск</label>
      <input type="text" class="form-control input-number" name="search_query" id="search_query" maxlength="200" required>
    </div>
    <button type="submit" class="btn btn-primary">Найти</button>
  </form>

  <a href="{{ route('dashboard.recommendations-create') }}" class="btn btn-success mb-3">Добавить</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($recommendations as $rc)
        <tr>
          <th>{{ $loop->index + 1 }}</th>
          <td>{{ $rc->title }}</td>
          <td class="button-group">
            <a href="{{ route('dashboard.recommendations-show', $rc->id) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('dashboard.recommendations-edit', $rc->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{ route('dashboard.recommendations-destroy', $rc->id) }}" method="get">
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

</div>

<script>
  const menuItem = 2;
</script>

@endsection
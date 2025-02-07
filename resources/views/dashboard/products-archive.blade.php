@extends('dashboard.layout')

@section('title', 'Архив товаров')

@section('dashboardcontent')

<div class="dashboard-content">

  <form class="form mb-5" action="{{ route('dashboard.products-archive') }}" method="get">
    <div class="form-group mb-3">
      <label for="search_query">Поиск</label>
      <input type="text" class="form-control input-number" name="search_query" id="search_query" maxlength="200" required>
    </div>
    <button type="submit" class="btn btn-primary">Найти</button>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <th>{{ $loop->index + 1 }}</th>
          <td>{{ $product->title }}</td>
          <td class="button-group">
            <a href="{{ route('dashboard.products-archive-show', $product->id) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="#" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="{{ route('dashboard.products-archive-restore', $product->id) }}" method="get">
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

  {{ $products->links() }}

</div>

<script>
  const menuItem = 4;
</script>

@endsection
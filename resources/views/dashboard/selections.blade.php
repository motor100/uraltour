@extends('dashboard.layout')

@section('title', 'Подборки')

@section('dashboardcontent')

<div class="dashboard-content">

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($selections as $selection)
        <tr>
          <th>{{ $loop->index + 1 }}</th>
          <td>{{ $selection->title }}</td>
          <td class="button-group">
            <a href="/selections/{{ $selection->slug }}" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('dashboard.selections-edit', $selection->id) }}" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="#" method="get">
              @csrf
              <button type="button" class="btn btn-danger">
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
  const menuItem = 5;
</script>

@endsection
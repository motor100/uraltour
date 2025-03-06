@extends('dashboard.layout')

@section('title', 'Пользователи')

@section('dashboardcontent')

<div class="dashboard-content users">

  @if(session()->get('status'))
    <div class="alert alert-success">
      {{ session()->get('status') }}
    </div>
  @endif

  <a href="{{ route('users-create') }}" class="btn btn-success mb-3">Добавить</a>
  <div class="table-wrapper mb-3">
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="number-column hidden-mobile">№</th>
          <th class="name-column">Имя</th>
          <th class="role-column">Роль</th>
          <th class="button-column"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $value)
          <tr>
            <td class="hidden-mobile">{{ $value->id }}</td>
            <td>
              <a href="{{ route('users-show', $value->id) }}" class="title-link">{{ $value->name }}</a>
            </td>
            <td>{{ $value->roles[0]->name_cyr }}</td>
            <td class="button-group">
              <a href="{{ route('users-show', $value->id) }}" class="btn btn-success">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('users-edit', $value->id) }}" class="btn btn-primary">
                <i class="fas fa-pen"></i>
              </a>
              <button type="button" class="btn btn-danger del-btn" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-route="{{ route('users-destroy', $value->id) }}">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@include('dashboard.modal')

<script>
  const menuItem = 7;
</script>

@endsection

@section('script')
  <script src="{{ asset('/adminpanel/js/bootstrap.min.js') }}"></script>
@endsection
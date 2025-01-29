@extends('dashboard.layout')

@section('title', 'Профиль')

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

  @if(session()->get('status'))
    <div class="alert alert-success">
      {{ session()->get('status') }}
    </div>
  @endif

  <form class="form mb-5" action="{{ route('profile.update') }}" method="post">
    <div class="form-group mb-3">
      <label for="name" class="form-label">Имя</label>
      <input type="text" class="form-control" name="name" id="name" minlength="3" maxlength="20" required value="{{ $user->name }}">
    </div>
    <div class="form-group mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email" minlength="3" maxlength="40" required value="{{ $user->email }}">
    </div>

    @csrf
    @method('patch')
    <button type="submit" class="btn btn-primary">Обновить</button>
  </form>

  <form class="form mb-5" action="{{ route('password.update') }}" method="post">
    <div class="form-group mb-3">
      <label for="password" class="form-label">Текущий пароль</label>
      <input type="password" class="form-control" name="current_password" id="current_password"  maxlength="20" autocomplete="off">
    </div>
    <div class="form-group mb-3">
      <label for="password" class="form-label">Пароль</label>
      <input type="password" class="form-control" name="password" id="password" minlength="8" maxlength="20" autocomplete="off">
    </div>
    <div class="form-group mb-3">
      <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" minlength="8" maxlength="20" autocomplete="off">
    </div>

    @csrf
    @method('put')
    <button type="submit" class="btn btn-primary">Обновить</button>
  </form>

  <form class="form" action="{{ route('profile.destroy') }}">
    <button type="button" class="btn btn-danger del-btn" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-route="{{ route('users-destroy', $user->id) }}">Удалить профиль</button>
  </form>

</div>

@include('dashboard.modal')

<script>
  const menuItem = 8;
</script>

@endsection

@section('script')
  <script src="{{ asset('/adminpanel/js/bootstrap.min.js') }}"></script>
@endsection
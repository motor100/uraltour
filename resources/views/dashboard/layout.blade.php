<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex, nofollow">
  <link rel="shortcut icon" href="{{ asset('/img/favicon.svg') }}" type="image/x-icon">
  @yield('style')
  <link rel="stylesheet" href="{{ asset('/adminpanel/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/adminpanel/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/adminpanel/css/template.css') }}">
  @vite(['resources/sass/dashboard.scss'])
</head>
<body>
  <div class="wrapper">

    <aside class="aside">

      <div class="aside-header">
        <div class="logo">
          <a href="{{ route('home') }}">{{ config('app.name') }}</a>
        </div>
      </div>

      <div class="aside-content">
        <div class="aside-nav">

          <div class="nav-item">
            <a href="/dashboard/products" class="item-link">
              <i class="nav-icon fas fa-car-side"></i>
              <span>Товары</span>
            </a>
          </div>
          <div class="nav-item">
            <a href="/dashboard/testimonials" class="item-link">
              <i class="nav-icon fas fa-bell"></i>
              <span>Отзывы</span>
            </a>
          </div>
          <div class="nav-item">
            <a href="/dashboard/recommendations" class="item-link">
              <i class="nav-icon fas fa-check-square"></i>
              <span>Рекомендации</span>
            </a>
          </div>
          <div class="nav-item">
            <a href="/dashboard/payments" class="item-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <span>Оплата</span>
            </a>
          </div>
          
          <div class="nav-item">
            <a href="/dashboard/products-archive" class="item-link">
              <i class="nav-icon fas fa-archive"></i>
              <span>Архив</span>
            </a>
          </div>
          
          <div class="nav-item">
            <a href="/dashboard/selections" class="item-link">
              <i class="nav-icon fas fa-list"></i>
              <span>Подборки</span>
            </a>
          </div>

          <div class="nav-item">
            <a href="/dashboard/documents" class="item-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <span>Документы</span>
            </a>
          </div>

          @role('administrator')
            <div class="nav-item">
              <a href="/dashboard/users" class="item-link">
                <i class="nav-icon nav-icon fas fa-user"></i>
                <span>Пользователи</span>
              </a>
            </div>
          @endrole
          
        </div>
      </div>
      
    </aside>

    <div class="content-wrapper">
      <div class="content-header navbar-expand display-flex justify-content-spacebetween">

        <div class="header-nav display-flex flexdirection-row alignitems-center">
          <div class="nav-item">
            <div class="burger">
              <a href="#" class="header-item display-block">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="nav-item hidden-mobile">
            <a href="{{ route('dashboard') }}" class="header-item display-block">Главная</a>
          </div>
        </div>

        <div class="header-nav display-flex flexdirection-row alignitems-center">

          <div class="nav-item">
            <a href="{{ route('dashboard.testimonials') }}" class="header-item">
              <i class="far fa-comments"></i>
              @if(isset($testimonials_count))
                @if($testimonials_count > 0)
                  <span id="testimonials-counter" class="tp-badge tp-badge-warning">{{ $testimonials_count }}</span>
                @endif
              @endif
            </a>
          </div>

          <div class="nav-item">
            <a href="{{ route('dashboard') }}" class="header-item display-block pos-relative">
              <i class="far fa-bell"></i>

              @if(isset($notifications_count))
                @if($notifications_count > 0)
                  <span id="notifications-counter" class="tp-badge tp-badge-warning">{{ $notifications_count }}</span>
                @endif
              @endif

            </a>
          </div>
          <div class="nav-item">
            <div class="user display-flex header-item">
              <div class="user-image">
                <i class="far fa-user"></i>
              </div>
              <div class="user-name">{{ Auth::user()->name }}</div>
            </div>
          </div>
        </div>

      </div>

      <div class="content">

        <div class="content-title">@yield('title')</div>

        @yield('dashboardcontent')

      </div>

    </div>

    <div class="user-menu">
      <div class="menu-item">
        <a href="{{ route('profile.edit') }}" class="item-link">Профиль</a>
      </div>
      <div class="menu-item">
        <form action="{{ route('logout') }}" class="form" method="POST">
          @csrf
          <button class="logout-btn">Выйти</button>
        </form>
      </div>
    </div>

    <div id="sidebar-overlay" class="sidebar-overlay"></div>

  </div>

  @yield('script')
  <script src="{{ asset('/adminpanel/js/template.js') }}"></script>
  @vite(['resources/js/dashboard.js'])
</body>
</html>
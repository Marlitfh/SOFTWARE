<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
  {!! Html::style('melody/css/new_additions.css') !!}
  {!! Html::style('melody/css/style.css') !!}
  {!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
  @yield('styles')
  <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ url('/') }}">{!! Html::image('melody/images/logo_stj.png') !!}</a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">{!! Html::image('melody/images/logo-mini.svg') !!}</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          @yield('create')
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              {!! Html::image('melody/images/faces/face5.jpg') !!}
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off text-primary"></i> {{ __('Cerrar sesion') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
            </div>
          </li>
          @yield('options')
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      @yield('preference')
      @include('layouts._nav')
      <div class="main-panel">
        @yield('content')
        <footer class="footer p-1">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023</span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
  {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
  {!! Html::script('melody/js/off-canvas.js') !!}
  {!! Html::script('melody/js/hoverable-collapse.js') !!}
  {!! Html::script('melody/js/misc.js') !!}
  {!! Html::script('melody/js/settings.js') !!}
  {!! Html::script('melody/js/todolist.js') !!}
  {!! Html::script('melody/js/dashboard.js') !!}
  {!! Html::script('melody/js/data-table.js') !!}
  {!! Html::script('melody/js/dropify.js') !!}
  {!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
  {!! Html::script('melody/js/chart.js') !!}
  @yield('scripts')
</body>
</html>
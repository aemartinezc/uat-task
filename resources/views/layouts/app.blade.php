{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
<div class="container">
<a class="navbar-brand" href="{{ url('/') }}">
{{ config('app.name', 'Laravel') }}
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Left Side Of Navbar -->
<ul class="navbar-nav mr-auto">

</ul>

<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
<!-- Authentication Links -->
@guest
<li class="nav-item">
<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
@if (Route::has('register'))
<li class="nav-item">
<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
@endif
@else
<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
{{ Auth::user()->name }} <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>
@endguest
</ul>
</div>
</div>
</nav>

<main class="py-4">
@yield('content')
</main>
</div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administrador de Proyectos | @yield('title')</title>
  <!-- Prevent the demo from appearing in search engines -->
  <meta name="robots" content="noindex">
  <!-- App CSS -->
  <link type="text/css" href="/assets/css/app.css" rel="stylesheet">
  <link type="text/css" href="/assets/css/app.rtl.css" rel="stylesheet">
  <!-- Simplebar -->
  <link type="text/css" href="/assets/vendor/simplebar.css" rel="stylesheet">
</head>

<body>
  <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>
    <div class="mdk-drawer-layout__content">
      <!-- header-layout -->
      <div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
        <!-- header -->
        <div class="mdk-header js-mdk-header bg-primary" data-fixed>
          <div class="mdk-header__content">

            <nav class="navbar navbar-expand-md bg-primary navbar-dark d-flex-none">
              <button class="btn btn-link text-white pl-0" type="button" data-toggle="sidebar">
                <i class="material-icons align-middle md-36">short_text</i>
              </button>
              <div class="page-title m-0"></div>

              <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ml-auto align-items-center">
                  <li class="nav-item nav-divider">
                      <li class="nav-item">
                          <a href="#" class="nav-link dropdown-toggle dropdown-clear-caret" data-toggle="sidebar" data-target="#user-drawer">
                              Hola, {{@Auth::user()->name}}
                              <img src="https://pbs.twimg.com/profile_images/928893978266697728/3enwe0fO_400x400.jpg" class="img-fluid rounded-circle ml-1" width="35"
                              alt="">
                          </a>
                        </li>
                  </ul>
                </div>
              </nav>
          </div>
        </div>
        <!-- content -->
        <div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
        <!-- main content -->
          <div class="container-fluid">
            @yield('main')
          </div>
        </div>
      </div>
  </div>
      <!-- // END drawer-layout__content -->

      <!-- drawer -->
      <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
          <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
            <nav class="drawer  drawer--dark">
              <div class="drawer-spacer">
                <div class="media align-items-center">
                  <a href="index.html" class="drawer-brand-circle mr-2">A</a>
                  <div class="media-body">
                    <a href="index.html" class="h5 m-0 text-link">Administrador de Proyectos</a>
                  </div>
                </div>
              </div>
              <!-- HEADING -->
              <div class="py-2 drawer-heading">
                Configuración
              </div>
              <ul class="drawer-menu" id="pagesMenu" data-children=".drawer-submenu">
                <li class="drawer-menu-item">
                  <a href="#">
                    <i class="material-icons">account_circle</i>
                    <span class="drawer-menu-text">Usuarios</span>
                  </a>
                </li>
                <li class="drawer-menu-item">
                  <a href="#">
                    <i class="material-icons">lock</i>
                    <span class="drawer-menu-text">Roles y Permisos</span>
                  </a>
                </li>
                <li class="drawer-menu-item">
                  <a href="#">
                    <i class="material-icons">list</i>
                    <span class="drawer-menu-text">Hitos</span>
                  </a>
                </li>
                <li class="drawer-menu-item">
                  <a href="#">
                    <i class="material-icons">list</i>
                    <span class="drawer-menu-text">Grupos</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!-- // END drawer -->
    <!-- drawer -->
    <div class="mdk-drawer js-mdk-drawer" id="user-drawer" data-position="right" data-align="end">
      <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
          <nav class="drawer drawer--light">
            <div class="drawer-spacer drawer-spacer-border">
              <div class="media align-items-center">
                <img src="https://pbs.twimg.com/profile_images/928893978266697728/3enwe0fO_400x400.jpg" class="img-fluid rounded-circle mr-2" width="35" alt="">
                <div class="media-body">
                  <a href="#" class="h5 m-0">{{@Auth::user()->name}}</a>
                  <div>{{@Auth::user()->email}}</div>
                </div>
              </div>
            </div>
            <!-- MENU -->
            <ul class="drawer-menu" id="userMenu" data-children=".drawer-submenu">
              <li class="drawer-menu-item">
                <a href="profile.html">
                  <i class="material-icons">account_circle</i>
                  <span class="drawer-menu-text"> Mi Perfil</span>
                </a>
              </li>
              <li class="drawer-menu-item">
                <a href="login.html">
                  <i class="material-icons">exit_to_app</i>
                  <span class="drawer-menu-text"> Salir</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- // END drawer -->
  </div>
  <!-- // END drawer-layout -->
  <!-- jQuery -->
  <script src="/assets/vendor/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/assets/vendor/popper.js"></script>
  <script src="/assets/vendor/bootstrap.min.js"></script>
  <!-- Simplebar -->
  <!-- Used for adding a custom scrollbar to the drawer -->
  <script src="/assets/vendor/simplebar.js"></script>
  <!-- Vendor -->
  <script src="/assets/vendor/Chart.min.js"></script>
  <script src="/assets/vendor/moment.min.js"></script>
  <!-- APP -->
  <script src="/assets/js/color_variables.js"></script>
  <script src="/assets/js/app.js"></script>
  <script src="/assets/vendor/dom-factory.js"></script>
  <!-- DOM Factory -->
  <script src="/assets/vendor/material-design-kit.js"></script>
  @yield('script')
  <!-- MDK -->
  <script>
  (function() {
    'use strict';
    // Self Initialize DOM Factory Components
    domFactory.handler.autoInit()


    // Connect button(s) to drawer(s)
    var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

    sidebarToggle.forEach(function(toggle) {
      toggle.addEventListener('click', function(e) {
        var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
        var drawer = document.querySelector(selector)
        if (drawer) {
          if (selector == '#default-drawer') {
            $('.container-fluid').toggleClass('container--max');
          }
          drawer.mdkDrawer.toggle();
        }
      })
    })
  })()
  </script>
</body>
</html>

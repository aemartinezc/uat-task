<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administrador de Proyectos | Iniciar Sesión</title>


  <!-- Prevent the demo from appearing in search engines -->
  <meta name="robots" content="noindex">

  <!-- App CSS -->
  <link type="text/css" href="/assets/css/app.css" rel="stylesheet">
  <link type="text/css" href="/assets/css/app.rtl.css" rel="stylesheet">

  <!-- Simplebar -->
  <link type="text/css" href="/assets/vendor/simplebar.css" rel="stylesheet">
</head>

<body>
  <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
    <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable" style="overflow-y: auto;" data-simplebar data-simplebar-force-enabled="true">

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container h-vh d-flex justify-content-center align-items-center flex-column">
          <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="index.html" class="drawer-brand-circle mr-2">A</a>
            <h2 class="ml-2 text-bg mb-0"><strong>Administrador de Proyectos</strong></h2>
          </div>
          <div class="row w-100 justify-content-center">
            <div class="card card-login mb-3">
              <div class="card-body">
                <form action="index.html" method="get">
                  <div class="form-group">
                    <label>Correo electrónico</label>

                    <div class="input-group input-group--inline">
                      <div class="input-group-addon">
                        <i class="material-icons">account_circle</i>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <br>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      </div>
                      <div class="form-group">
                        <div class="d-flex">
                          <label>Contraseña</label>
                        </div>
                        <div class="input-group input-group--inline">
                          <div class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                          </div>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror                                    </div>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <script>
          (function() {
            'use strict';

            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit();
          });
          </script>
        </body>

        </html>

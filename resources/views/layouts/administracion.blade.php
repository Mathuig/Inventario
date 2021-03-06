<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}" ></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" ></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" ></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/administracion') }}">
                    {{ config('app.name2', 'Administración') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">


                      <p style='margin-left: 4em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre ><span class="caret" >Usuarios</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can ('users.show') <a class="dropdown-item" href="/users"><span>Usuarios del sistema</span></a> @endcan
                                @can ('roles.show') <a class="dropdown-item" href="/roles"><span>Roles</span></a> @endcan
                                @can ('userhosts.show') <a class="dropdown-item" href="/users_host"><span>Usuarios de host</span></a> @endcan
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left: 4em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Modelos/Marcas</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can ('marcas.show') <a class="dropdown-item" href="/modelos"><span>Modelos</span></a> @endcan
                                @can ('marcas.show') <a class="dropdown-item" href="/marcas"><span>Marcas</span></a> @endcan
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left: 4em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Organizacion</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can ('clients.show') <a class="dropdown-item" href="/clientes"><span>Clientes</span></a> @endcan
                                @can ('departaments.show') <a class="dropdown-item" href="/departaments"><span>Departamentos</span></a> @endcan
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left: 4em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Historial</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can ('historials.show') <a class="dropdown-item" href="/historial"><span>Consultar</span></a> @endcan
                            </div>
                        </li>
                      </ul><p style='margin-left: 4em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Entregas</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can ('entregas.show') <a class="dropdown-item" href="/fichas_entrega"><span>Consultar fichas</span></a> @endcan
                                @can ('entregas.show') <a class="dropdown-item" href="/entregas"><span>Consultar entregas</span></a> @endcan
                                @can ('entregas.create') <a class="dropdown-item" href="/form_entregas"><span>Generar entrega</span></a> @endcan
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left:4em'></p>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/"><span>Equipamiento</span></a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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

<footer class="page-footer font-small blue pt-4">
  <div class="footer-copyright text-center py-3">
    © 2020 - Version: 1.5
    </div>
</footer>
</html>

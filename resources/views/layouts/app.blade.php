<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Authorization</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .dropdown-menu{
        background-color:#343131;
    }
    a.dropdown-item:hover{
      background-color: #343131;
    }
    li.nav-item>a.nav-link.disabled{
        pointer-events: none;
        cursor: default;
    }
</style>
</head>
<body>
    <div>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background:#2f2d31;">
          <a class="navbar-brand" href="/"><span style="color:#3CB371">F</span>
          <span style="color:#66CDAA">A</span>
          <span style="color:#FF7F50">L</span>
          <span style="color:#FF8C00">L</span>
          <span style="color:#FFFF00">D</span>
          <span style="color:#FFDEAD">A</span>
          <span style="color:#FFFFFF">N</span>
          <span style="color:#7FFF00">G</span>
          <span style="color:#ADD8E6">E</span>
          <span style="color:#A0522D">R</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      @guest
    @if (Route::has('login'))
    @endif
    @else
      <li class="nav-item">
        <a class="nav-link" href="/page/add">Add new</a>
      </li>
      @endguest
    </ul>
    <ul class="navbar-nav mr-right" style="margin-right: 10px;">
      @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link disabled" disabled="disabled" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" style="margin-top:6px; text-align: center;">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span style="color:white;">{{ __('Logout') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>
  </div>
</nav>



        <div style="margin-top:70px;">
            @yield('content')
        </div>
        </div>
    
</body>
</html>

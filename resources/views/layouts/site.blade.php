<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Awesome places</title>

    <link rel="stylesheet" href="{{asset('css/jumbotron.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<!-- styles -->
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
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
ul.pagination{
	padding-left:50%;
	width: 20%;
}
ul.cent{
	vertical-align: center;
text-align: center;
align-items: center;
}
ul.cent>li.float-left{
display: inline; /* Отображать как строчный элемент */
margin-right: 5px; /* Отступ слева */
background: 
padding: 0 4px; /* Поля вокруг текста */
padding-top: 4px;
vertical-align: center;
text-align: center;
align-items: center;
}
ul.cent>li.float-left:hover , label.cur:hover , input:hover{
	cursor: pointer;
}
input[type=radio]{
  /* Hide original inputs */
  visibility: hidden;
  position: absolute;
}
input[type=radio] + label:before{
  height:12px;
  width:12px;
  margin-right: 2px;
  content: " ";
  display:inline-block;
  vertical-align: baseline;
  border:1px solid #777;
}
input[type=radio]:checked + label:before{
  background:#343a40;
}

/* CUSTOM RADIO AND CHECKBOX STYLES */
input[type=radio] + label:before{
  border-radius:50%;
}
input[type=radio] + label#id_filter:after{
  display:inline-block;
}
input[type=radio] + label#is_desk:after{
  display:inline-block;
}
</style>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
</head>
<body>
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
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
    @guest
    @if (Route::has('login'))
    @endif
    @elseif(Auth::user()->rank =='admin')

      <li class="nav-item">
        <a class="nav-link" href="/page/add">Add new</a>
      </li>
      @endguest
      </ul>
    
    <ul class="navbar-nav mr-right" style="margin-right: 10px;">
      @guest
                          @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><!-- <i class="far fa-user"></i> Log in  --><i class="fas fa-user-alt"></i> log in</a>
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

@if(count($errors)>0)

  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
  </div>

@endif

<!-- Підключаємо page.blade.php -->
@yield('content')

<footer class="container">
  <p>&copy; Falldanger 2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>

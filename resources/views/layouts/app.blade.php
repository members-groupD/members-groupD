<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Q&A</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/answer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/question.css') }}" rel="stylesheet">
    <link href="{{ asset('css/question_create.css') }}" rel="stylesheet">
    <link href="{{ asset('css/question_edit.css') }}" rel="stylesheet">

    
    <!-- bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<header class="header">
    <div>
        <a class="navbar-brand" href="{{ url('/') }}">
            <span>Q</span><span>&</span><span>A</span>
        </a>
    </div>
    <div class="accountbox">
        <ul class="headerbox">
        <!-- Authentication Links -->
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                    <ul class="count">
                        <li><a href="{{ url('/show')}}">{{ Auth::user()->name }}</li>
                        <li class=""><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
            
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form></li>
                    </ul>
                    </li>
                </ul>
            </li>
        @endguest
        </ul>
    </div>
    
</header>
 @yield('content')
    <!-- Scripts -->
<footer>
    <p>&copy;2020 Q&A</p>
</footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

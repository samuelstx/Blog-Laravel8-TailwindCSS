<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Aprende conmigo</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    @yield('style')
</head>
<body class="bg-teal-900 flex flex-col h-screen">
<header class="w-full">
    <nav class="w-full bg-teal-600 p-1 text-white flex justify-center">
        <div class="w-full flex justify-between px-4">
            @guest
                <ul class="flex justify-between" style="width:130px">
                    <li>
                        <a class="hover:text-blue-200" href="{{ route('home') }}">
                            INICIO
                        </a>
                    </li>
                    <li>
                        <a class="hover:text-blue-200" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </li>
                    <li>
                        <a class="hover:text-blue-200" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i>
                        </a>
                    </li>
                </ul>
            @else
                <ul class="flex justify-between" style="width:140px">
                    <li class="mx-3">
                        <a class="hover:text-blue-200" href="{{ route('home') }}">
                            INICIO
                        </a>
                    </li>
                    <li class="mx-3">{{ Auth::user()->name }}</li>
                    @if( Auth::user()->isAdmin() or Auth::user()->isStaff() )
                        <li class="mx-3">
                            <a class="hover:text-blue-200" href="{{ route('posts.store') }}" title="Admin">
                                <i class="fas fa-user-shield"></i>
                            </a>
                        </li>
                    @endif
                    @if( Auth::user()->isAdmin() or Auth::user()->isStaff() )
                        <li class="mx-3">
                            <a class="hover:text-blue-200" href="{{ route('posts.store') }}" title="Admin">
                                <i class="fas fa-user-shield"></i>
                            </a>
                        </li>
                    @endif
                    <li class="mx-3">
                        <a class="hover:text-blue-200" href="{{ route('logout') }}" title="logout" class="no-underline hover:underline" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            @endguest
            <ul class="flex justify-between" style="width:99px">
                <li>
                    <a class="hover:text-blue-200" href="http://">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a class="hover:text-blue-200" href="http://">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a class="hover:text-blue-200" href="http://">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="text-center py-8 text-4xl font-bold text-white">
        <img id="logo" class="mx-auto" src="{{asset('img/samuel_soto_blanca.png')}}">
    </div>
</header>
<main class="flex-grow w-11/12 mx-auto mb-5 scrollbar overflow-auto">
    @yield('content')
</main>
<footer>
    <div class="max-w-full bg-teal-600 p-4"></div>
    <div class="max-w-full text-center bg-gray-700 text-white p-4">
        <div class="text-lg font-bold">Por <a class="hover:underline" href="https://github.com/samuelstx" target="_blank">Samuel Soto</a></div>
        <div class="text-lg">Laravel 8 - Blade con TailwindCSS</div>
    </div>
</footer>
</body>
</html>

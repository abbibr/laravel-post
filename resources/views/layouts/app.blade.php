<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body class="bg-gray-300">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="/posts" class="p-3">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li>
                    <a href="#" class="p-3">{{ auth()->user()->name }}</a>
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
            @endguest
        </ul>
    </nav>

    @yield('content')
</body>
</html>
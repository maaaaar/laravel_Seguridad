<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>


    <!-- para que vaya bootsrap -->
    <link rel="stylesheet" href="{{ asset( 'css/bootstrap.min.css')}}">
    <script src="{{ asset("js/jquery-3.4.1.min.js")}}"></script>
    <script src="{{ asset("js/popper.min.js")}}"></script>
    <script src="{{ asset("js/bootstrap.min.js")}}"></script>

    <!-- CSS MIAS -->
    <link rel="stylesheet" href="{{ asset ('css/miCss.css')}}">


</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <a class="navbar-brand" href="{{url('/')}}">SEGURIDAD</a>
        <div class="collapse navbar-collapse" id="collapseNavId">

            {{-- parte izquierda del menu --}}
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @yield('menu')
            </ul>

            {{-- parte derecha del menu --}}
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                {{-- el auth mira si el usuario esta chequeado --}}
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->nombre }}
                        </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
                    </div>
                    </li>
                @else
                <li class="nav-item">
                <a href="{{url('/login')}}" class="nav-link">LOGIN</a>
                </li>
                @endif

            </ul>
        </div>
    </nav>
</body>

<div class="container">
    @yield('principal')
</div>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GestyTrainner</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #carouselExampleIndicators{
                margin-top: 5.53rem;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark fixed-top">
            <div class="navbar-collapse">
                <a class="nav-link navbar-brand float-left text-white" href="{{route('welcome')}}">
                    <img class="img-responsive" src="/img/3.png" alt="logo1">
                    GestyTrainner
                </a>
                @if (Route::has('login'))
                    @auth
                    <ul class="navbar ml-auto list-unstyled">
                        <li class="nav-item">
                        <a class="nav-link float-right text-white" href="{{route('user.edit', auth()->user())}}">
                        
                          @auth
                              {{auth()->user()->name}}
                          @endauth
                        </a>

                        
                        <a class="fa fa-user fa-lg float-right text-white mt-2" href="{{route('user.edit', auth()->user())}}"></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link float-right text-white" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                        </ul>
                        @else
                        <ul class="navbar ml-auto list-unstyled">
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="{{ route('register') }}">Registrate</a>
                        </li>
                        </ul>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="/img/banner1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="/img/banner2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="/img/banner3.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    GestyTrainner
                </div>
                <h2>
                    @auth
                        Hola {{auth()->user()->name}}!
                    @endauth
                </h2>
                <div class="links">
                    @auth
                        <a href="{{route('blog.index')}}">Inicio</a>
                        <a href="{{route('categories')}}">Categoías</a>
                        <a href="{{route('contact')}}">Contacto</a>
                        @if(auth()->user()->rol->key == 'admin')
                            <a href="{{route('inicio')}}">Administrador</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>

<style>
  body {
    overflow-x: hidden;
  }

  #sidebar-wrapper {
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
  }

  #sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
  }

  #sidebar-wrapper .list-group {
    width: 15rem;
  }

  #page-content-wrapper {
    min-width: 100vw;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
  }

  @media (min-width: 768px) {
    #sidebar-wrapper {
      margin-left: 0;
    }

    #page-content-wrapper {
      min-width: 0;
      width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
      margin-left: -15rem;
    }

    .active{
      list-style:none;
    }

    a{
      text-decoration:none !important;
    }
  }
</style>

<div class="d-flex" id="wrapper">

    <div class="bg-dark border-right-dark" id="sidebar-wrapper">
      <div class="sidebar-heading text-white">
        <a href="{{route('welcome')}}">
          <img class="img-responsive" src="/img/logo1.png" alt="logo1">
          GestyTrainner
        </a>
      </div>
      <div class="list-group list-group-flush">

        <a href="{{route('inicio-calendario')}}" class="list-group-item list-group-item-action bg-dark text-white"><i class="fa fa-calendar-alt mr-2"></i>Calendario</a>
        <a href="{{route('inicio')}}" class="list-group-item list-group-item-action bg-dark text-white"><i class="fa fa-home mr-2"></i>Inicio</a>

                <li class="active">
                    <a href="#claseSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item bg-dark text-white"><i class="fa fa-cogs mr-2"></i>Clases</a>
                    <ul class="collapse list-unstyled" id="claseSubmenu">
                        <li>
                            <a href="{{route('clase.index')}}" class="list-group-item list-group-item-action bg-dark text-primary">Listar</a>
                        </li>
                        <li>
                            <a href="{{route('clase.create')}}" class="list-group-item list-group-item-action bg-dark text-primary">Nueva clase</a>
                        </li>
                    </ul>
                    
                      <a href="#categorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle  list-group-item bg-dark text-white"><i class="fa fa-clipboard-list mr-2"></i>Categorías</a>
                      <ul class="collapse list-unstyled" id="categorySubmenu">
                          <li>
                              <a href="{{route('category.index')}}" class="list-group-item list-group-item-action bg-dark text-primary">Listar</a>
                          </li>
                          <li>
                              <a href="{{route('category.create')}}" class="list-group-item list-group-item-action bg-dark text-primary">Crear categoría</a>
                          </li>
                      </ul>

                      <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle  list-group-item bg-dark text-white"><i class="fa fa-users mr-2"></i>Usuarios</a>
                      <ul class="collapse list-unstyled" id="userSubmenu">
                          <li>
                              <a href="{{route('user.index')}}" class="list-group-item list-group-item-action bg-dark text-primary">Listar</a>
                          </li>
                          <li>
                              <a href="{{route('user.create')}}" class="list-group-item list-group-item-action bg-dark text-primary">Crear usuario</a>
                          </li>
                      </ul>
                      <a href="{{route('contact.index')}}" class="list-group-item list-group-item-action bg-dark text-white"><i class="fa fa-address-book mr-2"></i>Contactos</a>
                </li>
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="fa fa-user nav-link text-white mt-1" href="{{route('user.edit', auth()->user())}}"></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-white" href="{{route('user.edit', auth()->user())}}">
              @auth
                  {{auth()->user()->name}}
              @endauth
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </li>
          </ul>
        </div>
      </nav>

       <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

       <!-- Menu Toggle Script -->
      <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      </script>
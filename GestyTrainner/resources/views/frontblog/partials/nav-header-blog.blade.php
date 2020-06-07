  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ route('welcome') }}">GestyTrainner</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('blog.index') }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">Sobre mí</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories') }}">Categorías</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('list-mis-clases') }}">Mis clases</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" href="{{route('blog.edit', auth()->user())}}">
                <i class="fa fa-user fa-lg"></i>
              @auth
                  {{auth()->user()->name}}
              @endauth
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
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
    </div>
  </nav>
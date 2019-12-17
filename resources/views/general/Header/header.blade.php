<header role="banner">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-9 social">
              <a href="https://twitter.com/FilmFreeway?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @TwitterDev</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              <a href="#"><span class="fa fa-facebook"></span></a>
              <a href="#"><span class="fa fa-instagram"></span></a>
              @if(Auth::check())
              <a href="/cuenta"><span class="container">{{Auth::user()->name}}</span></a>
                  @if(Auth::user()->id==1)
                    <a href="/administrar"><span class="container">Administrar</span></a>   
                  @endif
              @else
              <a href="/registro"><span class="container">Regístrate</span></a>
              <a href="/recordar"><span class="container">Recuperar contraseña</span></a>
              @endif
            </div>
            <div class="col-3 search-top" style="margin-bottom:10px;">
                @if(!Auth::check())
                  @include('usuario.login.login')
                @else
                  <a href="/cuenta"><img src="../images/perfiles/{{ Auth::user()->imagen }}" style="border-radius: 50%;" height="40" width="40"></a>

                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="container" style="color:white">{{ __('Cerrar sesion') }}</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                @endif
            </div>
          </div>
        </div>
      </div>

      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="ml5">
            <a href="/"><span class="text-wrapper">
              <span class="line line1"></span>
              <span class="letters letters-left">Videoclub</span>
              <span class="letters ampersand">&amp;</span>
              <span class="letters letters-right">Wanikoko</span>
              <span class="line line2"></span>
            </span></a>
          </h1>
          </div>
        </div>
      </div>
      
      <nav class="navbar navbar-expand-md  navbar-light bg-light">         
          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
              </li>
              <li class="nav-item dropdown">
                <span class="nav-link dropdown-toggle" href="category.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</span>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="/categoria/1">Terror</a>
                  <a class="dropdown-item" href="/categoria/2">Comedia</a>
                  <a class="dropdown-item" href="/categoria/3">Acción</a>
                  <a class="dropdown-item" href="/categoria/4">Drama</a>
                  <a class="dropdown-item" href="/categoria/5">Animación</a>
                </div>

              </li>

              <li class="nav-item">
                <a class="nav-link" href="/trailers">Trailers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contacto">Contacto</a>
              </li>
            </ul>
        </div>
      </nav>
  </header>
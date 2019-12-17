
<footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3>Hola
            @if(Auth::check())
            {{Auth::user()->name}}
            @endif
            !</h3>
                <iframe width="410" height="325" src="https://www.youtube.com/embed/NdZao4CHINU? rel=0&autoplay=1&mute=1&loop=1&controls=0&showinfo=0&playlist=qGylk5WKMwk,bXRCkR_iFuk,T9DFXvsU32o" frameborder="0" allowfullscreen></iframe>
            <p>Esperamos que estés a gusto en nuestro sitio web, para cualquier duda no dudes en contactar con nosotros</p>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="row">
              <div class="col-md-7">
                <h3>Últimas novedades</h3>
                <div class="post-entry-sidebar">
                  <ul>
                    @include('pelicula.LastPosts.lastposts')
                  </ul>
                </div>
              </div>
              <div class="col-md-1"></div>
              
              <div class="col-md-4">

                <div class="mb-5">
                  <h3>Enlaces rápidos</h3>
                  <ul class="list-unstyled">
                    <li><a href="cuenta.php"></a></li>
                    <li><a href='includes/logout.php'></a></li>
                    <li><a href="#"></a></li>
                    @if(Auth::check())
                    <li><a href="/cuenta">{{Auth::user()->name}}</a></li>
                      @if(Auth::user()->id==1)
                      <li><a href="/administrar">Administrar</a></li>   
                      @endif
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesion') }}
                     </a></li>
                    @else
                    <li><a href="/registro">Regístrate</a></li>
                    <li><a href="/recordar">R.Password</a></li>
                    @endif
                    <li><a href="trailers.php">Trailers</a></li>
                    <li><a href="../contacto">Contacto</a></li>
                  </ul>
                </div>
                
                <div class="mb-5">
                  <h3>Social</h3>
                  <ul class="list-unstyled footer-social">
                    <li><a href="https://twitter.com/FilmFreeway?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @TwitterDev</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></li>
                    <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                    <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados por Carlos Robles</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
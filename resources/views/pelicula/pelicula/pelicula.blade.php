<?php use App\Http\Controllers\CommentController; ?>
<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>

	@include('general.Header.header')

    <section class="site-section py-lg">
      <div class="container">       
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4">{{ $pelicula->titulo }}</h1> 
            <div class="post-meta">
                        <span class="category">{{ $pelicula->cat->nombre }}</span>
                        @if(Auth::check() && Auth::user()->id==1)
                          <a href="/editar/{{$pelicula->id}}" class="category">Editar</a><br><br>
                          <form action="{{ route('eliminar') }}" method="post">
                          @csrf
                              <input name="id" type="hidden" value="{{$pelicula->id}}"></input>
                              <input type="submit" class="category" value="Eliminar Pelicula"></input>
                          </form><br>
                        @endif
                        <span class="mr-2">{{ $pelicula->fecha }}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"> {{ CommentController::getNumberComents($pelicula->id) }}</span></span>
                      </div>
            <div class="post-content-body">
	              <p>{{ $pelicula->descripcion }}</p>
	            <div class="row mb-5">
	              <div class="col-md-12 mb-4 element-animate">
	                <img src="../images/peliculas/{{ $pelicula->imagen }}" alt="Image placeholder" class="img-fluid">
	              </div>
	            </div>
			      </div>
            @if(isset($pelicula->trailer))
              @include('pelicula.trailers.trailer')
            @endif
            
            @if(Auth::check())
              @include('chat.chat')
            @endif
          </div>
          <div class="col-md-12 col-lg-4 sidebar">

            <!-- CartaUsuarioHome -->

            @include('usuario.tarjetas.cartaUsuarioHome')
    
            <!-- End CartaUsuarioHome -->

            <!-- Cines -->

            @include('pelicula.cines.cines')
    
            <!-- END Cines -->

            <a class="twitter-timeline" data-height="880" href="https://twitter.com/FilmFreeway?ref_src={{ $pelicula->titulo }}%5Etfw">Tweets by FilmFreeway</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

          </div>
        
          <!-- MUESTRA LOS COMENTARIOS --> 
          @if(CommentController::getNumberComents($pelicula->id)>0)
            @include('pelicula.comentarios.comentarios')
          @endif

          <!-- CREAR COMENTARIOS --> 
          @include('pelicula.comentarios.crearComentario')

      </div>
    </section>
    
    <!-- END section -->
    @include('general.Footer.footer')
    <!-- END footer -->
    
    <!-- loader -->
    @include('general.Links.scripts')
  </body>
</html>
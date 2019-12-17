<!doctype html>
<html lang="en">

  @include('general.Head.head')

  <body>
    <!-- Header -->
    @include('general.Header.header')
    <!-- End header -->

    <!-- Banner -->
    @include('general.Publicidad.aside')
    <!-- End banner -->

    <section class="site-section pt-5">
       
      <!-- Banner -->
      @include('general.Banner.banner')
      <!-- End banner -->

      <div class="col-md-6">
      @if(isset($searchCategory))
          <h2 class="mb-4">Categoria - {{ $searchCategory }}</h2>
      @else
          <h2 class="mb-4">Cartelera</h2>
      @endif
      </div>

      <!-- Peliculas -->

      @include('pelicula.pelicula.peliculas')

      <!-- End Peliculas -->

    </section>

    <section class="site-section py-sm">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="mb-4">Crítica reciente</h2>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row">

              <!-- Critica -->

              @include('general.Critica.critica')

              <!-- End Critica -->

            </div>       

          </div> 

          <div class="col-md-12 col-lg-4 sidebar">

            <!-- CartaUsuarioHome -->

            @include('usuario.tarjetas.cartaUsuarioHome')
    
            <!-- End CartaUsuarioHome -->


            <!-- CategoriasSideBar -->
            @include('general.Categorias.categoriasSideBar')

            <!-- End CategoriasSideBar -->

          </div>
          
      </div>
    </section> 


    <!-- END footer -->
    @include('general.Footer.footer')
    <!-- loader -->


    @include('general.Links.scripts')

  </body>
</html>
<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>

  @include('general.Header.header')

    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1>Contacto</h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            
          <form action="{{ route('contacto') }}" class="p-5 bg-light" method="post">
             @csrf 
             <span class="category">{{ $error ?? 'Hola' }}</span><br><br>
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Mensaje</label>
                      <textarea name="texto" class="form-control" minlength="10" cols="30" rows="8" required></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Enviar mensaje" class="btn btn-primary">
                    </div>
                  </div>
                </form>   
          </div>

          <!-- END main-content -->

          @include('usuario.admin.cartaAdmin')

          <!-- END sidebar -->

        </div>
      </div>
    </section>

    @include('general.Footer.footer')
    
    <!-- loader -->
    @include('general.Links.scripts')
  </body>
</html>
<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>
  	<!-- Header -->
    @include('general.Header.header')
    <!-- End header -->

    <div class="comment-form-wrap col-md-2 col-lg-12">
      <form action="{{ route('agregar') }}" class="p-5 bg-light" method="post" enctype="multipart/form-data">
        @csrf 
        <h3 class="mb-5">Agrega una película</h3>
        <span class="category">{{ $error ?? 'Hola' }}</span><br><br>

        <div class="form-group">
          <label for="message">Titulo</label><br>
          <input name="titulo" type="text" class="form-control" required></input>
        </div>

        <div class="form-group">
          <label for="message">Descripción</label><br>
          <textarea name="descripcion" cols="100" rows="10" class="form-control" required></textarea>
        </div>

        <div class="form-group">
          <label for="message">Categoría</label><br>
          <select name="categoria">
            <option value="1">Terror</option>
            <option value="2">Comedia</option>
            <option value="3">Accion</option>
            <option value="4">Drama</option>
            <option value="5">Animacion</option>
          </select>
        </div>

        <div class="form-group">
          <label for="message">Posición en la web</label><br>
          <select name="posicion">
            <option value="general">General</option>
            <option value="banner">Banner</option>
          </select>
        </div>

        <div class="form-group">
          <label for="message">Enlace de trailer - YouTube (Opcional)</label><br>
          <input name="trailer" type="text" class="form-control"></input>
        </div>

        <div class="form-group">
          <label for="message">Imágen de cartelera</label><br>
          <input type="file" name="fileToUpload" id="fileToUpload" required>
        </div>

        <div class="form-group">
          <input type="submit" value="Agregar película" name="submit">
        </div>
      </form>
    </div>

    <!-- END footer -->
    @include('general.Footer.footer')
    <!-- loader -->

  	@include('general.Links.scripts')
  </body>
</html>



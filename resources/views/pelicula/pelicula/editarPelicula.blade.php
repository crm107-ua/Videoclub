<?php use App\Http\Controllers\CategoryController;?>
<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>
    <!-- Header -->
    @include('general.Header.header')
    <!-- End header -->
    
    <div class="comment-form-wrap col-md-2 col-lg-12">
      <form action="{{ route('editar') }}" class="p-5 bg-light" method="post" enctype="multipart/form-data">
        @csrf 
        <h3 class="mb-5">Editar película: {{$pelicula->titulo}} | ID: {{$pelicula->id}} </h3>
        <span class="category">{{ $error ?? 'Hola' }}</span><br><br>
        <div class="form-group">
          <label for="message">Titulo</label><br>
          <input name="titulo" type="text" class="form-control" value="{{$pelicula->titulo}}" required></input>
        </div>

        <div class="form-group">
          <label for="message">Descripción</label><br>
          <textarea name="descripcion" cols="100" rows="10" class="form-control" required>{{$pelicula->descripcion}}</textarea>
        </div>

        <div class="form-group">
          <label for="message">Categoría de la película: {{ CategoryController::getCategoryName($pelicula->cat_id) }}</label><br>
          <select name="categoria">
            <option value="1">Terror</option>
            <option value="2">Comedia</option>
            <option value="3">Accion</option>
            <option value="4">Drama</option>
            <option value="5">Animacion</option>
          </select>
        </div>

        <div class="form-group">
          <label for="message">Posición actual en la web: {{$pelicula->posicion}}</label><br>
          <select name="posicion">
            <option value="general">General</option>
            <option value="banner">Banner</option>
          </select>
        </div>

        <div class="form-group">
          <label for="message">Enlace de trailer - YouTube (Opcional)</label><br>
          <input name="trailer" type="text" value="{{$pelicula->trailer}}" class="form-control"></input>
        </div>

        <div class="form-group" hidden>
          <input name="id" type="text" value="{{$pelicula->id}}" class="form-control"></input>
        </div>

        <div class="form-group">
          <input type="submit" value="Editar película" name="submit">
        </div>
      </form>
    </div>

    <!-- END footer -->
    @include('general.Footer.footer')
    <!-- loader -->

    @include('general.Links.scripts')
  </body>
 </html>

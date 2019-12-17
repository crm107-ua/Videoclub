<?php use App\Http\Controllers\CategoryController;?>
<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>
    <!-- Header -->
    @include('general.Header.header')
    <!-- End header -->
    <a style="width:200px; margin:20px;" class="btn btn-success" href="/agregar" role="button">Agregar</a>
    <div class="comment-form-wrap col-md-2 col-lg-12">
        <table class="table" style="margin-right:40px;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Categoria</th>
                    <th>Cartelera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($films as $pelicula)
                <tr>
                    <th>{{$pelicula->id}}</th>
                    <th>{{$pelicula->titulo}}</th>
                    <th>{{$pelicula->descripcion}}</th>
                    <th>{{$pelicula->fecha}}</th>
                    <th>{{ CategoryController::getCategoryName($pelicula->cat_id) }}</th>
                    <th><img src='../images/peliculas/{{ $pelicula->imagen }}' alt="Smiley face" height="152" width="102"></th>
                    <th>
                        <a style="width:100px;" class="btn btn-primary" href="/editar/{{$pelicula->id}}" role="button">Editar</a><br><br>
                        <a style="width:100px;" class="btn btn-warning" href="/pelicula/{{$pelicula->id}}" role="button">Ver</a><br><br>
                        <form action="{{ route('eliminar') }}" method="post">
                          @csrf
                              <input name="id" type="hidden" value="{{$pelicula->id}}"></input>
                              <input type="submit" style="width:100px; background-color:red; color:white;"  class="btn btn-outline-danger" value="Eliminar"></input>
                        </form>
                    </th>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    <br><br>

    <!-- END footer -->
    @include('general.Footer.footer')
    <!-- loader -->

    @include('general.Links.scripts')
  </body>
 </html>

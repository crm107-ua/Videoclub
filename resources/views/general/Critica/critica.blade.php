<?php use App\Http\Controllers\FilmController; use App\Http\Controllers\UserController; use App\Http\Controllers\CommentController;?>
@foreach ($comentariosCritica as $comentario)
  <div class="col-md-6">
    <a href="../pelicula/{{ FilmController::getFilm($comentario->id_pelicula)->id }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
      <img src="../images/peliculas/{{ FilmController::getFilm($comentario->id_pelicula)->imagen }}" alt="Image placeholder" height="500px">
      <div class="blog-content-body">
        <div class="post-meta">
          <span class="category">{{ UserController::getUser($comentario->id_usuario)->name }}</span>
          <span class="mr-2">{{ FilmController::getFilm($comentario->id_pelicula)->fecha }}</span> &bullet;
          <span class="ml-2"><span class="fa fa-comments"></span> {{ CommentController::getNumberComents($comentario->id_pelicula) }}</span>
        </div>
        <h2 style="text-align:center">{{$comentario->texto}}</h2>
      </div>
    </a>
  </div>
@endforeach

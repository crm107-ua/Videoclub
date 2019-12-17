<?php use App\Http\Controllers\FilmController; use App\Http\Controllers\CommentController;?>

@foreach (FilmController::getLastFilms() as $pelicula)
<li>
	<a href="/pelicula/{{  $pelicula->id  }}">
	<img src="../images/peliculas/{{  $pelicula->imagen }}" alt="Image placeholder" class="mr-4">
		<div class="text">
			<h4>{{  $pelicula->titulo }}</h4>
			<div class="post-meta">
				<span class="mr-2">{{ $pelicula->fecha }}</span> &bullet;
				<span class="ml-2"><span class="fa fa-comments"></span> {{ CommentController::getNumberComents($pelicula->id) }}</span>
			</div>
		</div>
	</a>
</li>
@endforeach 
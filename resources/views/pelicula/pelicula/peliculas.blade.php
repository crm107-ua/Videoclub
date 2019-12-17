<?php use App\Http\Controllers\FilmController; use App\Http\Controllers\CategoryController; use App\Http\Controllers\CommentController; ?>
<div class="row">
	@foreach ($films as $pelicula)
	<div class="col-md-6 col-lg-4">
		<a href="../pelicula/{{ $pelicula->id }}" class="a-block d-flex align-items-center height-md" style="background-image: url('../images/peliculas/{{ $pelicula->imagen }}'); ">
			<div class="text">
				<div class="post-meta">
					<span class="category">{{ CategoryController::getCategoryName($pelicula->cat_id) }}</span>
					<span class="mr-2">{{ $pelicula->fecha }}</span> &bullet;
					<span class="ml-2"><span class="fa fa-comments"> {{ CommentController::getNumberComents($pelicula->id) }}</span></span>
				</div>
				<h3>{{ $pelicula->titulo }}</h3>
			</div>
		</a>
	</div>
	@endforeach
</div>

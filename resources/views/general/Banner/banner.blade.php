<?php use App\Http\Controllers\FilmController; use App\Http\Controllers\CategoryController; use App\Http\Controllers\CommentController;?>
<div class="container">
  <div class="row">
 	<div class="col-md-12">
 		<div class="owl-carousel owl-theme home-slider">
 			@foreach ($bannerFilms as $pelicula)
 			<div>
 				<a href="../pelicula/{{ $pelicula->id }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('../images/peliculas/{{ $pelicula->imagen }}');">
 					<div class="text half-to-full">
 						<div class="post-meta">
 							<span class="category">{{ CategoryController::getCategoryName($pelicula->cat_id) }}</span>
 							<span class="mr-2">{{ $pelicula->fecha }}</span> &bullet;
 							<span class="ml-2"><span class="fa fa-comments"> {{ CommentController::getNumberComents($pelicula->id) }}</span></span>
 						</div>
 						<h3>{{ $pelicula->titulo }}</h3>
 						<p>{{ $pelicula->descripcion }}</p>
 					</div>
 				</a>
 			</div>
 			@endforeach
 	    </div>
 	</div>
 </div>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sala de chat</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		.list-group{
			overflow-y: scroll;
			height: 200px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" id="app">
			<div class="offset-4 col-4 offset-sm-1 col-sm-10">
				<li class="list-group-item active">Sala de chat desde {{ $pelicula->titulo }}<br>
				<span class="badge  badge-pill badge-danger">@{{ numberOfUsers }}</span> Usuarios Conectados</li>
				<div class="badge badge-pill badge-primary">@{{ typing }}</div>
				<ul class="list-group" v-chat-scroll>
				  <message
				  v-for="value,index in chat.message"
				  :key=value.index
				  :color= chat.color[index]
				  :user = chat.user[index]
				  :time = chat.time[index]
				  >
				  	@{{ value }}
				  </message>
				</ul>
				  <input type="text" class="form-control" placeholder="Escribe aquí tu mensaje" v-model='message' @keyup.enter='send'>
				  <br>
				  <a href='' class="btn btn-warning btn-sm" @click.prevent='deleteSession'>Eliminar historial</a>
				  <a href='' class="btn btn-primary btn-sm" @click.prevent='send'>Intro para enviar</a>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/app1.js') }}"></script>

</body>
</html>
<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>
  @include('general.Header.header')<br><br><br>
    <div class="container">
  	  <div class="bio text-center">
          @if(Auth::user()->imagen)
            <img src="../images/perfiles/{{ Auth::user()->imagen }}" style="border-radius: 50%;" height="105" width="120">
          @endif
        <div class="bio-body">
          <p>Si tienes problemas de inicio de sesión aquí puedes restablecer tu datos</p>
          <span class="category">{{ $resultado ?? 'Hola' }}</span><br><br>
          <form action="{{ route('name') }}" class="p-5 bg-light" method="post">
          @csrf
            <p>Cambiar nombre</p>
            <div class="form-group">
              <input name="nombre" type="text" class="form-control" placeholder="{{ Auth::user()->first_name }}"></input>
            </div>
            <div class="form-group">
              <input name="id" type="hidden" value="{{Auth::user()->id}}"></input>
            </div>
            <div class="form-group">
              <input type="submit" value="Restablecer nombre" class="btn btn-primary">
            </div>
          </form>
          <form action="{{ route('email') }}" class="p-5 bg-light" method="post">
          @csrf
            <p>Cambiar email</p>
            <div class="form-group">
              <input name="email" type="email" class="form-control" placeholder="{{ Auth::user()->email }}"></input>
            </div>
            <div class="form-group">
              <input name="id" type="hidden" value="{{Auth::user()->id}}"></input>
            </div>
            <div class="form-group">
              <input type="submit" value="Restablecer email" class="btn btn-primary">
            </div>
          </form>
          <form action="{{ route('password') }}" class="p-5 bg-light" method="post">
          @csrf
            <p>Cambiar contraseña</p>
            <div class="form-group">
              <input name="password" type="password" class="form-control"></input>
            </div>
            <div class="form-group">
              <input name="id" type="hidden" value="{{Auth::user()->id}}"></input>
            </div>
            <div class="form-group">
              <input type="submit" value="Restablecer contraseña" class="btn btn-primary">
            </div>
          </form>
          <br>
          <span class="category">API TOKEN: {{ Auth::user()->api_token }}</span><br>
          <br>
          <p>Peticiones a la API</p>
          @if(Auth::user()->rol==1)
          <a class="category" href="http://127.0.0.1:8000/api/usuarios?api_token={{Auth::user()->api_token}}">Petición de usuarios</a><br>
          @endif
          <a class="category" href="http://127.0.0.1:8000/api/peliculas?api_token={{Auth::user()->api_token}}">Petición de peliculas</a><br><br>
          <p>Redes sociales</p>
          <p class="social">
            <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
            <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
          </p>
          <p>{{Auth::user()->full_name}}</p>
        </div>
      </div>
    </div>
    </div><br><br>
  	<!-- END footer -->
    @include('general.Footer.footer')
    <!-- loader -->
    @include('general.Links.scripts')
  </body>
 </html>



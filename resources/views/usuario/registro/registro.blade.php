<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>
  	<!-- Header -->
    @include('general.Header.header')
    <!-- End header -->

    <div class="comment-form-wrap col-md-2 col-lg-12">
      <form action="{{ route('registro') }}" class="p-5 bg-light" method="post" enctype="multipart/form-data">
      @csrf 
        <h3 class="mb-5">Formulario de registro</h3>
        <span class="category">{{ $error ?? 'Hola' }}</span><br><br>
        <div class="form-group">
          <label for="name">Nombre</label><br>
          <input name="name" type="text" class="form-control" value="{{ old('name') }}" required></input>
        </div>

        <div class="form-group">
          <label for="message">Email</label><br>
          <input name="email" type="email" class="form-control" value="{{ old('email') }}" required></input>
        </div>

        <div class="form-group">
          <label for="message">Contraseña</label><br>
          <input name="password" type="password" class="form-control" value="{{ old('password') }}" required></input>
        </div>

        <div class="form-group">
          <label for="message">Imágen de perfil</label><br>
          <input type="file" name="fileToUpload" id="fileToUpload" required>
        </div>

        <div class="form-group">
          <input type="submit" value="Regístrate" name="submit">
        </div>
      </form>
    </div>

  	<!-- END footer -->
    @include('general.Footer.footer')
    <!-- loader -->

    @include('general.Links.scripts')
  </body>
</html>



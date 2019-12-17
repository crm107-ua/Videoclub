<!doctype html>
<html lang="en">
@include('general.Head.head')
  <body>
    <!-- Header -->
    @include('general.Header.header')
    <!-- End header -->
    <div class="container">
      <div class="bio text-center">
        <div class="bio-body">
        <form action="{{ route('recordar') }}" class="p-5 bg-light" method="post">
            @csrf 
            <p>Introduce tu email</p>
            <span class="category">{{ $error ?? 'Hola' }}</span><br><br>
            <div class="form-group">
              <input name="email" type="email" class="form-control"></input>
            </div>
            <div class="form-group">
              <input type="submit" value="Restablecer contraseña" class="btn btn-primary">
            </div>
          </form>
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



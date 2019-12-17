@if(Auth::check())
<div class="sidebar-box">
  <div class="bio text-center">
    <img src="../images/perfiles/{{ Auth::user()->imagen }}" style="border-radius: 50%;" height="105" width="120">
    <div class="bio-body">
    <h2>{{ Auth::user()->name }}</h2>
    @if(Auth::user()->id==1)
    <p>Siendo administrador puedes agregar cualquier película y eliminar comentarios inadecuados</p>
    <p><a href="/agregar" class="btn btn-primary btn-sm">Añadir película</a></p>
    @else
    <p>Comenta en la pelicula que quieras</p>
    <p><a href="/cuenta" class="btn btn-primary btn-sm">Mi perfil</a></p>
    @endif
    </div>
  </div>
</div>
@endif
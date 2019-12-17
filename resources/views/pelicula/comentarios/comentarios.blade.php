<?php use App\Http\Controllers\CommentController; use App\Http\Controllers\UserController;?>
<div class="pt-5">
  <h3 class="mb-5">{{CommentController::getNumberComents($pelicula->id)}} Comments</h3>
  <ul class="comment-list">
    @foreach ( CommentController::getComments($pelicula->id) as $comentario )
    <li class="comment">
      <div class="vcard">
        <img src="../images/perfiles/{{UserController::getUser($comentario->id_usuario)->imagen}}" style="border-radius: 50%;" height="50" width="50">
      </div>
      <div class="comment-body">
        <h4>{{UserController::getUser($comentario->id_usuario)->name}}</h4>
        <div class="meta">{{$comentario->fecha}}</div>
        @if(Auth::check())
            @if(Auth::user()->id==1)
            <form action="{{ route('eliminarComentario') }}" method="post">
            @csrf
                <input name="id" type="hidden" value="{{$comentario->id}}"></input>
                <input name="pelicula" type="hidden" value="{{$pelicula->id}}"></input>
                <input type="submit" class="category" style="text-align:center; width:230px;" value="Eliminar como administrador"></input>
            </form>
            @elseif(Auth::user()->id==$comentario->id_usuario)
            <form action="{{ route('eliminarComentario') }}" method="post">
            @csrf
                <input name="id" type="hidden" value="{{$comentario->id}}"></input>
                <input name="pelicula" type="hidden" value="{{$pelicula->id}}"></input>
                <input type="submit" class="category" style="text-align:center; width:230px;" value="Eliminar"></input>
            </form>
            @endif
        @endif
        <p style="width:800px;"> {{$comentario->texto}}</p>
      </div>
    </li>
    @endforeach
    
</div>

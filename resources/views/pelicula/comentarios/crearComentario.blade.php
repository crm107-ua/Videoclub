@if(Auth::check())
  <div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Déjanos tu opinión sobre la película</h3>
    <form action="{{ route('comentar') }}" class="p-5 bg-light" method="post">
      @csrf 
      <div class="form-group">
        <label for="message">Comentario</label><br>
        <input name="pelicula" value="{{$pelicula->id}}" type="hidden"></input>
        <textarea name="comentario" cols="100" minlength="10" rows="10" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Comentar" class="btn btn-primary">
      </div>
    </form>
  </div>
@endif
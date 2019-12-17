<div class="sidebar-box">
  <div class="sidebar-box">
      <h3 class="heading">Categorias y comentarios</h3>
        <ul class="categories">
        @foreach($categorias as $categoria)
           <li><a href="../categoria/{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
        @endforeach
        </ul>
  </div>
</div>
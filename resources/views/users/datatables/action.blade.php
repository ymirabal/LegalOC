<div class="d-flex">
  {{-- <a href="{{route('user.show',$id)}}" class="btn btn-sm btn-outline-primary" title="Ver">Ver</a> --}}
  <a href="{{route('user.edit',$id)}}" class="btn btn-sm btn-outline-primary" title="Editar">Editar</a>
  <form action="{{route('user.destroy',$id)}}" method="POST">
      @csrf
    @method("delete") 
    <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">Eliminar</button>
  </form>
</div>

 
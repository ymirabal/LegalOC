<div class="d-flex">
    {{-- <a href="{{route('law.disciplinaryActions.show',$id)}}" class="btn btn-sm btn-outline-primary mx-1" title="Ver">Ver</a>    --}}
    <a href="{{route('law.disciplinaryActions.edit',$id)}}" class="btn btn-sm btn-outline-primary mx-1" title="Editar">Editar</a>
    <form action="{{route('law.disciplinaryActions.destroy',$id)}}" method="POST">
        @csrf
    @method("delete") 
    <button type="submit" class="btn btn-outline-danger btn-sm mx-1"  title="Eliminar">Borrar</button>
    </form>
</div>


<div class="dropdown">
    <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
        <a class="dropdown-item" href="{{route('appeals.index',['id'=>$id,'type'=>2])}}">Apelación</a>
        <a class="dropdown-item" href="{{route('revisions.index',['id'=>$id,'type'=>2])}}">Proceso de revisión</a>
    </div>
</div>
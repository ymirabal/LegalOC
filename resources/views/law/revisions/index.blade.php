@extends('layouts.app')
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Revisiones</h3>
                            </div>
                            <div class="col-4 text-right">
                                 @if ($type==1)
                                    <a class="btn btn-sm btn-primary" href="{{route('law.responsibilities.index')}}">Volver</a>
                                @else
                                    <a class="btn btn-sm btn-primary" href="{{route('law.disciplinaryActions.index')}}">Volver</a>
                                @endif
                                <a href="{{route('revisions.create',['id'=>$id,'type'=>$type])}}" class="btn btn-sm btn-primary">Nueva revisión</a>
                            </div>
                        </div>
                    </div>                        
                    <div class="col-12">
                    </div>

                    <div>
                        <table class="table align-items-center table-flush" id="revisions" style="width:100%">
                            <thead class="thead-light">
                                <th>ID</th>
                                <th>Fecha de presentación</th>                                                  
                                <th>Decisión</th>
                                <th>Observaciones</th>                                
                                <th class="text-center">Opciones</th>
                            </thead>
                            <tbody>
                                @foreach ($revisions as $revision)
                                    <tr>
                                        <td>{{$revision->id}}</td>
                                        <td>{{$revision->date}}</td>                                       
                                        <td>{{$revision->result}}</td>
                                        <td>{{$revision->observ}}</td>
                                        <td width="10px;">
                                            <div class="d-flex">
                                                <a href="{{route('revisions.edit',$revision)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                            {{-- </td>
                                            <td width="10px;"> --}}
                                                <form action="{{route('revisions.destroy',$revision)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>            
                                    </tr> 
                                @endforeach            
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div> 
    
@endsection
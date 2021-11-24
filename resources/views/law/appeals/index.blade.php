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
                                <h3 class="mb-0">Apelaciones</h3>
                            </div>
                            <div class="col-4 text-right">
                                 @if ($type==1)
                                    <a class="btn btn-sm btn-primary" href="{{route('law.responsibilities.index')}}">Volver</a>
                                @elseif($type==2)
                                    <a class="btn btn-sm btn-primary" href="{{route('law.disciplinaryActions.index')}}">Volver</a>
                                @endif
                                <a href="{{route('appeals.create',['id'=>$id,'type'=>$type])}}" class="btn btn-sm btn-primary">Nueva apelación</a>
                            </div>
                        </div>
                    </div>                        
                    <div class="col-12">
                    </div>

                    <div>
                        <table class="table align-items-center table-flush" id="appeals" style="width:100%">
                            <thead class="thead-light">
                                <th>ID</th>
                                <th>Fecha de presentación</th>
                                <th>Tipo de apelación</th>                    
                                <th>Decisión</th>
                                <th>Observaciones</th>                                
                                <th class="text-center">Opciones</th>
                            </thead>
                            <tbody>
                                @foreach ($appeals as $appeal)
                                    <tr>
                                        <td>{{$appeal->id}}</td>
                                        <td>{{$appeal->date}}</td>
                                        <td>{{$appeal->type}}</td>
                                        <td>{{$appeal->result}}</td>
                                        <td>{{$appeal->observ}}</td>
                                        <td width="10px;">
                                            <div class="d-flex">
                                                <a href="{{route('appeals.edit',$appeal)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                            {{-- </td>
                                            <td width="10px;"> --}}
                                                <form action="{{route('appeals.destroy',$appeal)}}" method="post">
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
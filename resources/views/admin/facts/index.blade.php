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
                                    <h3 class="mb-0">Hechos cometidos</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('admin.facts.create')}}" class="btn btn-sm btn-primary">Nuevo hecho</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="facts" style="width:100%">
                                <thead class="thead-light">
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Tipo</th>
                                    <th colspan="2"></th>
                                </thead>
                                <tbody>
                                    @foreach ($facts as $fact)
                                    <tr>
                                        <td>{{$fact->id}}</td>
                                        <td>{{$fact->description}}</td>
                                        <td>{{$fact->type}}</td>
                                        <td width="10px;">
                                            <div class="d-flex">
                                                <a href="{{route('admin.facts.edit',$fact)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                       
                                                <form action="{{route('admin.facts.destroy',$fact)}}" method="post">
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
   
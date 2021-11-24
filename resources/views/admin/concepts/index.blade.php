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
                                    <h3 class="mb-0">Conceptos</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('admin.concepts.create')}}" class="btn btn-sm btn-primary">Nuevo concepto</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="concepts" style="width:100%">
                                <thead class="thead-light">
                                    <th>No.</th>
                                    <th>Descripción</th>
                                    <th colspan="2"></th>
                                </thead>
                                <tbody>
                                    @foreach ($concepts as $concept)
                                        <tr>
                                            <td>{{$concept->id}}</td>
                                            <td>{{$concept->description}}</td>
                                            <td width="10px;">
                                                <div class="d-flex">
                                                    <a href="{{route('admin.concepts.edit',$concept)}}" class="btn btn-outline-primary btn-sm">Editar</a>                                            
                                                    <form action="{{route('admin.concepts.destroy',$concept)}}" method="post">
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
   
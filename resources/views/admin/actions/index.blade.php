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
                                    <h3 class="mb-0">Medidas disciplinarias</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('admin.actions.create')}}" class="btn btn-sm btn-primary">Nueva Medida</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="actions" style="width:100%">
                                <thead class="thead-light">
                                    <th>No.</th>
                                    <th>Descripción</th>
                                    <th colspan="2"></th>
                                </thead>
                                <tbody>
                                    @foreach ($actions as $action)
                                        <tr>
                                            <td>{{$action->id}}</td>
                                            <td>{{$action->description}}</td>
                                            <td width="10px;">
                                                <div class="d-flex">
                                                    <a href="{{route('admin.actions.edit',$action)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                                {{-- </td>
                                                <td width="10px;"> --}}
                                                    <form action="{{route('admin.actions.destroy',$action)}}" method="post">
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
   
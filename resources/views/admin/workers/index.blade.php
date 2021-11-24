@extends('layouts.app') 
    @section('css')
        <link type="text/css" href="{{ asset('argon') }}/vendor/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    @endsection  
    @section('content')

        @include('layouts.headers.cards')
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Trabajadores</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('admin.workers.create')}}" class="btn btn-sm btn-primary">Nuevo trabajador</a>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-12">
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="workers" style="width:100%">
                                <thead class="thead-light">
                                    <th>No.</th>
                                    <th>Nombre(s) y Apellidos</th>
                                    <th>Cargo</th>
                                    <th>Unidad</th>
                                    <th>Area</th>
                                    <th width="10px;" class="text-center">Opciones</th>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($workers as $worker)
                                    <tr>
                                        <td>{{$worker->id}}</td>
                                        <td>{{$worker->fullname}}</td>
                                        <td>{{$worker->job}}</td>
                                        <td>{{$worker->entity_id}}</td>
                                        <td>{{$worker->area_id}}</td>
                                        
                                        <td width="10px;">
                                            <div class="d-flex">
                                                <a href="{{route('admin.workers.edit',$worker)}}" class="btn btn-outline-primary btn-sm">Editar</a>                                        
                                                <form action="{{route('admin.workers.destroy',$worker)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                                </form>
                                            </div>
                                            
                                        </td>                
                                    </tr> 
                                        
                                    @endforeach --}}
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
    @section('js')
        <script src="{{ asset('argon') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>
        
        <script>

            $(function() {
                var token = '{{ csrf_token() }}';
                $('#workers').DataTable({
                    responsive:true,
                    autoWidth:false,
                    processing: true,
                    serverSide: true,
                    "ajax": {
                        "url":"{{route('admin.workers.datatableWorker')}}",
                        "type":"post",
                        data: {
                            '_token': token
                        } 
                    },
                    "language":{
                        "processing": "Procesando...",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ningún dato disponible en esta tabla",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "search": "Buscar:",
                        "infoThousands": ",",
                        "loadingRecords": "Cargando...",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": ">",
                            "previous": "<"
                        },
                        "aria": {
                            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                   
                    },
                   
                   
                    columns: [
                        {
                            data: 'id'                            
                        },
                        {
                            data: 'fullname'                        
                        },
                        {
                            data: 'job'                            
                        },
                        {
                            data: 'entity'                            
                        },
                        {
                            data: 'area'                            
                        },
                        {
                            data: 'actions',                      
                            orderable: false,
                            searchable: false
                        }
                       
                    ]
                });
            });
        </script>
        
    @endsection
   
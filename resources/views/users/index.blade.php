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
                                <h3 class="mb-0">Usuarios</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Nuevo Usuario</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                                            </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="users" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nombre(s) y apellidos</th>
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col" width="10px;" class="text-center">Opciones</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                    
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
                $('#users').DataTable({
                    responsive:true,
                    autoWidth:false,
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
                    processing: true,
                    serverSide: true,
                    "ajax": "{{route('users.datatableUser')}}",
                    columns: [{
                            data: 'id'                            
                        },
                        {
                            data: 'name'                        
                        },
                        {
                            data: 'email'                            
                        },
                        {
                            data: 'roles[0].name'                            
                        },
                        {
                            data: 'created_at'                            
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
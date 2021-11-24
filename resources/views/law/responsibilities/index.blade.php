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
                                    <h3 class="mb-0">Responsabilidad material</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('law.responsibilities.create')}}" class="btn btn-sm btn-primary">Nueva responsabilidad</a>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-12">
                        </div>

                        <div>
                            <table class="table align-items-center table-flush" id="responsibilities" style="width:100%">
                                <thead class="thead-light">
                                    <th>ID</th>
                                    <th>Unidad</th>
                                    <th>No.E.F</th>                    
                                    <th>Nombre y Apellidos</th>
                                    <th>Hecho Cometido</th>
                                    <th>Cuantía de Afectación</th>
                                    <th>Tipo de responsabilidad exigida</th>
                                    <th>Monto a Indemnizar</th>
                                    <th>Fecha Notificación</th>
                                    {{-- <th>Fecha de presentación</th>
                                    <th>Resultado</th>
                                    <th>Fecha de presentación</th>
                                    <th>Resultado</th> --}}
                                    <th>Convenio de pago</th>
                                    {{-- <th>Fecha de presentación</th>
                                    <th>Resultado</th> --}}
                                    <th>Observaciones</th>
                                    <th>Acción legal</th>
                                    <th class="text-center">Opciones</th>
                                </thead>
                                <tbody> 
                                    @foreach ($responsibilities as $responsibility)                                   
                                        <tr>
                                            <td>{{$responsibility->id}}</td>
                                            <td>{{$responsibility->entity_name}}</td>
                                            <td>{{$responsibility->noEF}}</td>
                                            <td>{{$responsibility->fullname}}</td>
                                            <td>{{$responsibility->fact_desc}}</td>
                                            <td>{{$responsibility->amount_affect}}</td>
                                            <td>{{$responsibility->type}}</td>
                                            <td>{{$responsibility->amount}}</td>
                                            <td>{{$responsibility->date_notify}}</td>
                                            <td>{{$responsibility->agreement}}</td>
                                            <td>{{$responsibility->observ}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{route('appeals.index',['id'=>$responsibility->id,'type'=>1])}}">Apelación</a>
                                                        <a class="dropdown-item" href="{{route('revisions.index',['id'=>$responsibility->id,'type'=>1])}}">Proceso de revisión</a>     
                                                                                                                                                                                   
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="10px;">
                                                <div class="d-flex">
                                                    <a href="{{route('law.responsibilities.edit',$responsibility)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                                {{-- </td>
                                                <td width="10px;"> --}}
                                                    <form action="{{route('law.responsibilities.destroy',$responsibility)}}" method="post">
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
    @section('js')
        <script src="{{ asset('argon') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>
        
        <script>
           //  var token = '{{ csrf_token() }}';
        //    $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
            
            $('#responsibilities').DataTable({
                responsive:true,
                autoWidth:false,
                // processing: true,
                // serverSide: true,
                // "ajax":{
                //     "url":"{{route('datatable.responsibilities')}}",
                //     "type":"post",
                //     dataType: "JSON",
                //    /* headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                //     beforeSend: function (xhr) {
                //         xhr.setRequestHeader ("Accept", "application/json");
                //     }, */
                // },
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
                "columns":[
                    {data:"id",visible:false},
                    {data:"entity_name"},
                    {data:"noEF"},
                    {data:"fullname"},
                    {data:"fact_desc"},
                    {data:"amount_affect"},
                    {data:"type"},
                    {data:"amount"},
                    {data:"date_notify"},
                    {data:"agreement"},
                    {data:"observ"},
                    { data: 'action1', orderable:false,searchable:false},
                    { data: 'action', orderable:false,searchable:false}
                    // { data: 'show', orderable:false,searchable:false}, 
                    // { data: 'edit', orderable:false,searchable:false},
                    // { data: 'delete', orderable:false,searchable:false}, 


                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: [-1,-2]},
                //  { responsivePriority: 2, targets: -2 }
                ]

            });
        </script>
    @endsection
   
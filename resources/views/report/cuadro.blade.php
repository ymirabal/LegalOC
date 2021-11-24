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
                                    <h3 class="mb-0">Medidas Disciplinarias Aplicadas a Cuadros (Decreto Ley 13)</h3>
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
                                    <th>Nombre y apellidos</th>
                                    {{-- <th>Cargo</th> --}}
                                    <th>Hecho Cometido</th>
                                    {{-- <th>Tipificación del hecho</th> --}}
                                    <th>Medida Aplicada</th>
                                    <th>Fecha de Notificación</th>
                                    <th>Fecha de Ejecución</th>
                                    <th>Período de rehabilitación</th>
                                    <th>Observaciones</th>
                                </thead>
                                <tbody> 
                                    @foreach ($dactions as $daction)
                                    <tr>
                                        <td>{{$daction->id}}</td>
                                        <td>{{$daction->entity_name}}</td>
                                        <td>{{$daction->noEF}}</td>
                                        <td>{{$daction->fullname}}</td>
                                        <td>{{$daction->fact_desc}}</td>
                                        <td>{{$daction->action_desc}}</td>
                                        <td>{{$daction->date_notify}}</td>
                                        <td>{{$daction->date_ejecution}}</td>
                                        <td>{{$daction->time_rehab}}</td>
                                        <td>{{$daction->observ}}</td>
                                        
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
          /*  $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });*/
            $('#responsibilities').DataTable({
                responsive:true,
                autoWidth:false,
              /*  processing: true,
                serverSide: true,
                "ajax":{
                    "url":"{{route('report.cuadro')}}",
                    "type":"post",
                    dataType: "JSON",
                },*/
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
                    {data:"action_desc"},
                    {data:"date_notify"},
                    {data:"date_ejecution"},
                    {data:"time_rehab"},
                    {data:"observ"},
                    // { data: 'action1', orderable:false,searchable:false},
                    // { data: 'action', orderable:false,searchable:false}
                    // { data: 'show', orderable:false,searchable:false}, 
                    // { data: 'edit', orderable:false,searchable:false},
                    // { data: 'delete', orderable:false,searchable:false}, 


                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },
                    // { responsivePriority: 2, targets: [-1,-2]},
                //  { responsivePriority: 2, targets: -2 }
                ]

            });
        </script>
    @endsection
   
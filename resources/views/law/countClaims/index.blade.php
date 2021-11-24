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
                                    <h3 class="mb-0">Reclamaciones de Cuentas por Cobrar</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('law.countClaims.create')}}" class="btn btn-sm btn-primary">Nueva reclamación</a>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-12">
                        </div>

                        <div>
                            <table class="table align-items-center table-flush" id="countClaims" style="width:100%">
                                <thead class="thead-light">
                                    <th>ID</th>                   
                                    <th>Reclamado</th>
                                    <th>Importe</th>
                                    <th>Importe inicial reclamado</th>
                                    <th>Fecha de presentación</th>
                                    <th>Fecha de respuesta</th>
                                    <th>Fecha de la contestación</th>
                                    <th>Aprobada</th>
                                    <th>Fecha de conciliación</th>
                                    <th>Importe Pagado</th>
                                    <th>No.Estado de Cuenta</th>
                                    <th>Fecha Estado de Cuenta</th>
                                    <th>Observaciones</th>  
                                    <th>Gestor</th>                  
                                    <th class="text-center">Opciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($countClaims as $countClaim)
                                    <tr>
                                        <td>{{$countClaim->id}}</td>                   
                                        <td>{{$countClaim->name}}</td>
                                        <td>{{$countClaim->amount}}</td>
                                        <td>{{$countClaim->amount_ini}}</td>
                                        <td>{{$countClaim->date_ini}}</td>
                                        <td>{{$countClaim->date_top}}</td>
                                        <td>{{$countClaim->date_answer}}</td>
                                        <td>{{$countClaim->approved}}</td>
                                        <td>{{$countClaim->date_concil}}</td>
                                        <td>{{$countClaim->amountpaid}}</td>
                                        <td>{{$countClaim->no_ec}}</td>
                                        <td>{{$countClaim->date_ec}}</td>
                                        <td>{{$countClaim->observ}}</td>  
                                        <td>{{$countClaim->fullname}}</td>                  
                                        <td width="10px;">
                                            <div class="d-flex">
                                                <a href="{{route('law.countClaims.edit',$countClaim)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                            {{-- </td>
                                            <td width="10px;"> --}}
                                                <form action="{{route('law.countClaims.destroy',$countClaim)}}" method="post">
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
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            
            $('#countClaims').DataTable({
                responsive:true,
                autoWidth:false,
                // processing: true,
                // serverSide: true,
                // "ajax":{
                //     "url":"{{route('datatable.countClaims')}}",
                //     "type":"post",
                //     dataType: "JSON",
                //    // data : {"_token":"{{ csrf_token() }}"} ,
                //     // headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                //     // beforeSend: function (xhr) {
                //     //     xhr.setRequestHeader ("Accept", "application/json");
                //     // },
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
                    {data:'id',
                        visible:false
                    },               
                    {data:'name'},
                    {data:'amount'},
                    {data:'amount_ini'},
                    {data:'date_ini'},
                    {data:'date_top'},
                    {data:'date_answer'},
                    {data:'approved'},
                    {data:'date_concil'},
                    {data:'amountpaid'},
                    {data:'no_ec'},
                    {data:'date_ec'},               
                    {data:'observ'},
                    {data:'fullname'},
                    { data: 'action', orderable:false,searchable:false}
                    // { data: 'show', orderable:false,searchable:false},
                    // { data: 'edit', orderable:false,searchable:false},
                    // { data: 'delete', orderable:false,searchable:false} 
                    
                
                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: [-1]},
                //  { responsivePriority: 2, targets: -2 }
                ]
            });
        </script>
    @endsection
   
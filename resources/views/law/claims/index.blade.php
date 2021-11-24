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
                                    <h3 class="mb-0">Reclamaciones Ordinarias</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{route('law.claims.create')}}" class="btn btn-sm btn-primary">Nueva reclamación</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                        </div>

                        <div>
                            <table class="table align-items-center table-flush" id="claims" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>No.</th>
                                        <th>Reclamante</th>
                                        <th>Reclamado</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Concepto</th>
                                        <th>Claúsula incumplida</th>
                                        <th>Producto</th>
                                        <th>Pretensión</th>
                                        <th>Importe Afectación</th>
                                        <th>Fecha presentación</th>
                                        <th>Fecha tope</th>
                                        <th>Fecha contestación</th>
                                        <th>Penalización</th>
                                        <th>Aceptada</th>                    
                                        <th>Fecha conciliación</th>
                                        <th>Importe pagado</th>
                                        <th>No.EC </th>
                                        <th>Fecha EC</th>
                                        <th>Fecha Presentación</th>
                                        <th>Fecha Radicación</th>
                                        <th>Fallo del Tribunal</th>
                                        <th>Observaciones</th>
                                        <th>Gestor</th>
                                        <th class="text-center">Opciones</th >
                                        {{-- <th></th>
                                        <th></th> --}}
                                    </tr>                    
                                </thead>
                                <tbody>
                                    @foreach ($claims as $claim)
                                    <tr>
                                        <td>{{$claim->id}}</td>
                                        <td>{{$claim->id}}</td>
                                        <td>{{$claim->entityC_name}}</td>
                                        <td>{{$claim->entityR_name}}</td>
                                        <td>{{$claim->type}}</td>
                                        <td>{{$claim->status}}</td>
                                        <td>{{$claim->concept_desc}}</td>
                                        <td>{{$claim->clause}}</td>
                                        <td>{{$claim->product_desc}}</td>
                                        <td>{{$claim->pretension_desc}}</td>
                                        <td>{{$claim->amount}}</td>
                                        <td>{{$claim->date_ini}}</td>
                                        <td>{{$claim->date_top}}</td>
                                        <td>{{$claim->date_answer}}</td>
                                        <td>{{$claim->penalty}}</td>
                                        <td>{{$claim->approved}}</td>                    
                                        <td>{{$claim->date_concil}}</td>
                                        <td>{{$claim->amountpaid}}</td>
                                        <td>{{$claim->no_state}}</td>
                                        <td>{{$claim->date_ec}}</td>
                                        <td>{{$claim->date_tpp}}</td>
                                        <td>{{$claim->date_rad}}</td>
                                        <td>{{$claim->decision}}</td>
                                        <td>{{$claim->observ}}</td>
                                        <td>{{$claim->fullname}}</td>
                                        <td width="10px;">
                                            <div class="d-flex">
                                                <a href="{{route('law.claims.edit',$claim)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                            {{-- </td>
                                            <td width="10px;"> --}}
                                                <form action="{{route('law.claims.destroy',$claim)}}" method="post">
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
            $('#claims').DataTable({
                responsive:true,
                autoWidth:false,
               // processing: true,
                //serverSide: true,
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
                // "ajax":{
                //     "url":"{{route('datatable.claims')}}",
                //     "type":"post",
                //     dataType: "JSON",
                //     // headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                //     // beforeSend: function (xhr) {
                //     //     xhr.setRequestHeader ("Accept", "application/json");
                //     // },
                // },
                "columns":[
                    {data:'id',
                        visible:false
                    },
                    {data:'number',
                        visible:false
                    },
                    {data:'entityC_name'},
                    {data:'entityR_name'},
                    {data:'type'},
                    {data:'status'},
                    {data:'concept_desc'},
                    {data:'clause'},
                    {data:'product_desc'},
                    {data:'pretension_desc'},
                    {data:'amount'},
                    {data:'date_ini'},
                    {data:'date_top'},
                    {data:'date_answer'},
                    {data:'penalty'},
                    {data:'approved'},
                    {data:'date_concil'},
                    {data:'amountpaid'},
                    {data:'no_state'},
                    {data:'date_ec'},
                    {data:'date_tpp'},
                    {data:'date_rad'},
                    {data:'decision'},
                    {data:'observ'},
                    {data:'fullname'},    
                    { data: 'action', orderable:false,searchable:false} 
                
                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: [-1]},
                
                ]
            });
        

        </script>
    @endsection
   
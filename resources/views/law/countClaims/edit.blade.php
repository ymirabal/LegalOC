@extends('layouts.app')
    @section('content')
        @include('layouts.headers.cards')
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                      <div class="card">
                        <div class="card-header">
                          <div class="row align-items-center">
                            <div class="col-8">
                              <h3 class="mb-0">Editar medida</h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="{{ route('law.countClaims.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          {!! Form::model($countClaim,['route'=>['law.countClaims.update',$countClaim],'method'=>'put']) !!}
                          <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('entity_id','Reclamado', ['class'=>'form-control-label'])!!}
                                    {!!Form::select('entity_id',$entities,null, ['class'=>'form-control'])!!}
            
                                    @error('entity_id')
                                        <span class="text-danger">{{$message}}</span>                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('amount','Importe de la afectación',['class'=>'form-control-label'])!!}
                                    {!!Form::text('amount',null, ['class'=>'form-control'])!!}
            
                                    @error('amount')
                                        <span class="text-danger">{{$message}}</span>                        
                                    @enderror
                                </div>                
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('amount_ini','Importe inicial reclamado',['class'=>'form-control-label'])!!}
                                    {!!Form::text('amount_ini',null, ['class'=>'form-control'])!!}
            
                                    @error('amount_ini')
                                        <span class="text-danger">{{$message}}</span>                        
                                    @enderror
                                </div>                
                            </div>
                        </div>           
                        <div class="row">   
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('date_ini', 'Fecha de presentación',['class'=>'form-control-label']) !!}
                                    {!! Form::date('date_ini', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            
                                    @error('date_ini')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>                
                            </div>            
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('date_top', 'Fecha tope del reclamado',['class'=>'form-control-label']) !!}
                                    {!! Form::date('date_top', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            
                                    @error('date_top')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                                            
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('date_answer', 'Fecha de contestación',['class'=>'form-control-label']) !!}
                                    {!! Form::date('date_answer', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            
                                    @error('date_answer')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>                               
                            </div>   
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('date_concil', 'Fecha de conciliacion',['class'=>'form-control-label']) !!}
                                    {!! Form::date('date_concil', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            
                                    @error('date_concil')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>                               
                            </div>              
                        </div>           
                      
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('amountpaid', 'Importe Pagado',['class'=>'form-control-label']) !!}
                                    {!! Form::text('amountpaid', null,['class'=>'form-control']) !!}
            
                                    @error('amountpaid')
                                        <span class="text-danger">{{$message}}</span>                        
                                    @enderror
                                </div>                
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('no_ec', 'No. del Estado de Cuenta',['class'=>'form-control-label']) !!}
                                    {!! Form::text('no_ec',null,['class'=>'form-control']) !!}
            
                                    @error('no_ec')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                                            
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('date_ec', 'Fecha del Estado de Cuentas',['class'=>'form-control-label']) !!}
                                    {!! Form::date('date_ec', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            
                                    @error('date_ec')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                                            
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('worker_id', 'Gestor',['class'=>'form-control-label']) !!}
                                    {!! Form::select('worker_id',$workers,null,['class'=>'form-control']) !!}
            
                                    @error('worker_id')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                                            
                            </div>
                        </div>                          
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('observ', 'Observaciones',['class'=>'form-control-label']) !!}
                                    {!! Form::textarea('observ',null, ['class'=>'form-control', 'rows' => 4]) !!}
            
                                    @error('observ')
                                        <span class="text-danger">{{$message}}</span>
                                        
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-success']) !!}
                            </div>
                          </div>
                        </div>                      

                          {!! Form::close() !!}
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  @include('layouts.footers.auth')
            </div>        
     @endsection

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
                              <h3 class="mb-0">Nueva Responsabilidad Material</h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="{{ route('law.responsibilities.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                        {!! Form::open(['route'=>'law.responsibilities.store']) !!}
                            
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('entity_id', 'Unidad', ['class'=>'form-control-label']) !!}
                                        {!! Form::select('entity_id',$entities ,null, ['class'=>'form-control']) !!}
                
                                        @error('entity_id')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('area_id', 'Dirección o Area', ['class'=>'form-control-label']) !!}
                                        {!! Form::select('area_id',$areas ,null, ['class'=>'form-control']) !!}
                
                                        @error('area_id')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        {!! Form::label('worker_id', 'Trabajador', ['class'=>'form-control-label']) !!}
                                        {!! Form::select('worker_id', $workers,null, ['class'=>'form-control']) !!}
                
                                        @error('worker_id')
                                            <span class="text-danger">{{$message}}</span>                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        {!! Form::label('noEF', 'No.E.F', ['class'=>'form-control-label']) !!}
                                        {!! Form::text('noEF', null, ['class'=>'form-control']) !!}
                
                                        @error('noEF')
                                            <span class="text-danger">{{$message}}</span>                            
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('fact_id', 'Hecho Cometido', ['class'=>'form-control-label']) !!}
                                        {!! Form::select('fact_id',$facts ,null, ['class'=>'form-control']) !!}
                
                                        @error('fact_id')
                                            <span class="text-danger">{{$message}}</span>                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('amount_affect', 'Cuantía de afectación a la empresa', ['class'=>'form-control-label']) !!}
                                        {!! Form::text('amount_affect', null, ['class'=>'form-control']) !!}
                                        @error('amount_affect')
                                            <span class="text-danger">{{$message}}</span>                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('type', 'Tipo de responsabilidad exigida', ['class'=>'form-control-label']) !!}
                                        {!! Form::select('type',$types,null, ['class'=>'form-control']) !!}
                
                                        @error('type')
                                            <span class="text-danger">{{$message}}</span>                            
                                        @enderror
                
                                    </div>                  
                                    
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('amount', 'Monto a indemnizar', ['class'=>'form-control-label']) !!}
                                        {!! Form::text('amount',null, ['class'=>'form-control']) !!}
                
                                        @error('amount')
                                            <span class="text-danger">{{$message}}</span>                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('date_notify', 'Fecha de Notificación', ['class'=>'form-control-label']) !!}
                                        {!! Form::date('date_notify', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                
                                        @error('date_notify')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        {!! Form::label('observ', 'Observaciones', ['class'=>'form-control-label']) !!}
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
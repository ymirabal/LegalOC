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
                              <h3 class="mb-0">Nuevo trabajador</h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="{{ route('admin.workers.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          {!! Form::open(['route'=>'admin.workers.store']) !!}
                          <div class="form-group">
                            {!! Form::label('fullname', 'Nombre y apellidos',['class'=>'form-control-label']) !!}
                            {!! Form::text('fullname', null, ['class'=>'form-control']) !!}

                            @error('fullname')
                                <span class="text-danger small">{{$message}}</span>                            
                            @enderror
                          </div>

                        
                        <div class="form-group">
                            {!! Form::label('job', 'Cargo',['class'=>'form-control-label']) !!}
                            {!! Form::text('job', null, ['class'=>'form-control']) !!}

                            @error('job')
                                <span class="text-danger small">{{$message}}</span>                            
                            @enderror
                        </div>

            
                            <div class="form-group">
                                {!! Form::label('entity_id', 'Unidad',['class'=>'form-control-label']) !!}
                                {!! Form::select('entity_id',$entities ,null, ['class'=>'form-control']) !!}

                                @error('entity_id')
                                    <span class="text-danger small">{{$message}}</span>
                                    
                                @enderror
                            </div>
                        
                      
                            <div class="form-group">
                                {!! Form::label('area_id', 'Dirección o Area',['class'=>'form-control-label']) !!}
                                {!! Form::select('area_id',$areas ,null, ['class'=>'form-control']) !!}

                                @error('area')
                                    <span class="text-danger small">{{$message}}</span>
                                    
                                @enderror
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
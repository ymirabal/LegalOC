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
                              <h3 class="mb-0">Editar entidad</h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="{{ route('admin.entities.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          {!! Form::model($entity,['route'=>['admin.entities.update',$entity],'method'=>'put']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre',['class'=>'form-control-label']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}

                                @error('name')
                                    <span class="text-danger small">{{$message}}</span>
                                    
                                @enderror
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                              
                              {!! Form::checkbox('external', $external, null ,['class'=>'custom-control-input']) !!}
                              {!! Form::label('external', 'Externa',['class'=>'custom-control-label']) !!}
                              {{-- <input class="custom-control-input" id="external" type="checkbox" value="1" name="external">
                              <label class="custom-control-label" for="external">Externa</label> --}}
                            </div>                            
                            

                            {{-- <div class="form-group">
                              
                                {!! Form::checkbox('external', $external, null ,['class'=>'custom-control-input']) !!}
                                {!! Form::label('external', 'Externa',['class'=>'custom-control-label']) !!}
                            </div>                  --}}
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
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              {!! Form::submit('Actualizar medida', ['class'=>'btn btn-primary']) !!}

              {!! Form::close() !!}
              
           


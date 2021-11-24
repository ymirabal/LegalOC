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
                              <h3 class="mb-0">Cambiar contraseña</h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          {!! Form::model($user,['route'=>['user.changepass',$user],'method'=>'put']) !!}                          
                            {{-- <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4"> --}}
                              
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    {!! Form::label('oldpassword','Contraseña',['class'=>'form-control-label']) !!}
                                    {!! Form::password('oldpassword', ['class'=>'form-control']) !!}                                  
                                    
                                    @error('password')
                                        <span class="text-danger small">{{$message}}</span>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    {!! Form::label('password','Nueva Contraseña',['class'=>'form-control-label']) !!}
                                    {!! Form::password('password', ['class'=>'form-control']) !!}                                  
                                    
                                    @error('password')
                                        <span class="text-danger small">{{$message}}</span>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                      {!! Form::label('password_confirmation','Confirmar Contraseña',['class'=>'form-control-label']) !!}
                                      {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                      
                                      @error('password_confirmation')
                                        <span class="text-danger small">{{$message}}</span>
                                    @enderror
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-success']) !!}
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr class="my-4" />                  
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                  @include('layouts.footers.auth')
            </div>
        
     @endsection
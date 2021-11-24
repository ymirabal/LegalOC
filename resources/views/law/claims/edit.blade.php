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
                              <a href="{{ route('law.claims.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          {!! Form::model($claim,['route'=>['law.claims.update',$claim],'method'=>'put']) !!}
                            <div class="row">
                              <div class="col-6">
                                  <div class="form-group">
                                      {!! Form::label('entityC_id','Reclamante',['class'=>'form-control-label'])!!}
                                      {!!Form::select('entityC_id',$entities,null, ['class'=>'form-control'])!!}
              
                                      @error('entityC_id')
                                          <span class="text-danger">{{$message}}</span>                        
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-6">
                                  <div class="form-group">
                                      {!! Form::label('entityR_id','Reclamado',['class'=>'form-control-label'])!!}
                                      {!!Form::select('entityR_id',$entities,null, ['class'=>'form-control'])!!}
              
                                      @error('entityR_id')
                                          <span class="text-danger">{{$message}}</span>                        
                                      @enderror
                                  </div>                
                              </div>
                            </div>                        
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('concept_id','Concepto de la reclamación',['class'=>'form-control-label'])!!}
                                        {!!Form::select('concept_id',$concepts,null, ['class'=>'form-control'])!!}
                
                                        @error('concept_id')
                                            <span class="text-danger">{{$message}}</span>                        
                                        @enderror
                                    </div>                    
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('clause', 'Cláusula incumplida',['class'=>'form-control-label']) !!}
                                        {!! Form::text('clause', null, ['class'=>'form-control']) !!}
                        
                                        @error('clause')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('product_id', 'Descripción del producto',['class'=>'form-control-label']) !!}
                                        {!! Form::select('product_id',$products, null, ['class'=>'form-control']) !!}
                        
                                        @error('pretension_id')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>                
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('pretension_id', 'Pretensión de la reclamación',['class'=>'form-control-label']) !!}
                                        {!! Form::select('pretension_id',$pretensions, null, ['class'=>'form-control']) !!}
                        
                                        @error('pretension_id')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>                
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('amount', 'Importe de la afectación',['class'=>'form-control-label']) !!}
                                        {!! Form::text('amount', null, ['class'=>'form-control']) !!}
                        
                                        @error('amount')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>                
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('date_ini', 'Fecha de presentación',['class'=>'form-control-label']) !!}
                                        {!! Form::date('date_ini', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                
                                        @error('date_ini')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>                
                                </div>            
                            </div>
                            <div class="row">               
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('date_top', 'Fecha tope del reclamado',['class'=>'form-control-label']) !!}
                                        {!! Form::date('date_top', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                
                                        @error('date_top')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>
                                                
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('date_answer', 'Fecha de la contestación',['class'=>'form-control-label']) !!}
                                        {!! Form::date('date_answer', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                
                                        @error('date_answer')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>                               
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('penalty', 'Penalización',['class'=>'form-control-label']) !!}
                                        {!! Form::text('penalty', null, ['class'=>'form-control']) !!}
                        
                                        @error('penalty')
                                            <span class="text-danger">{{$message}}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('worker_id', 'Gestor',['class'=>'form-control-label']) !!}
                                        {!! Form::select('worker_id',$workers,null, ['class'=>'form-control']) !!}
                
                                        @error('worker_id')
                                            <span class="text-danger">{{$message}}</span>
                
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                  <p class="form-control-label">Tipo de reclamación</p>
                                  <div class="custom-control custom-radio custom-control-inline pr-3">
                                    <input type="radio" id="recibida" name="type" class="custom-control-input" value="recibida">
                                    <label class="custom-control-label" for="recibida">Recibida</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="efectuada" name="type" class="custom-control-input" value="efectuada">
                                    <label class="custom-control-label" for="efectuada">Efectuada</label>
                                  </div>
                                  @error('type')
                                      <span class="text-danger">{{$message}}</span>
          
                                  @enderror
                                    
                                    {{-- <div class="form-group">
                                        <p class="font-weight-bold">Tipo de reclamación</p>
                
                                        <label class="pr-3">
                                            {!! Form::radio('type','recibida',true) !!}
                                            Recibida
                                        </label>
                                        <label>
                                            {!! Form::radio('type','efectuada') !!}
                                            Efectuada
                                        </label>
                                        @error('type')
                                            <span class="text-danger">{{$message}}</span>
                
                                        @enderror
                                    </div> --}}
                                </div>
                            </div>
                            <h3>Pago</h3>
                            <hr>
                            <div class="row">
                              <div class="col-4">
                                  <div class="form-group">
                                      {!! Form::label('amountpaid', 'Importe Pagado',['class'=>'form-control-label']) !!}
                                      {!! Form::text('amountpaid', null,['class'=>'form-control']) !!}
              
                                      @error('amountpaid')
                                          <span class="text-danger">{{$message}}</span>                        
                                      @enderror
                                  </div>                
                              </div>
                              <div class="col-4">
                                  <div class="form-group">
                                      {!! Form::label('no_ec', 'No. del Estado de Cuenta',['class'=>'form-control-label']) !!}
                                      {!! Form::text('no_ec',null,['class'=>'form-control']) !!}
              
                                      @error('no_ec')
                                          <span class="text-danger">{{$message}}</span>
                                          
                                      @enderror
                                  </div>
                                              
                              </div>
                              <div class="col-4">
                                  <div class="form-group">
                                      {!! Form::label('date_ec', 'Fecha del Estado de Cuentas',['class'=>'form-control-label']) !!}
                                      {!! Form::date('date_ec', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
              
                                      @error('date_ec')
                                          <span class="text-danger">{{$message}}</span>
                                          
                                      @enderror
                                  </div>
                                              
                              </div>
                            </div>                        
                            <h3>Tribunal Provincial Popular</h3>
                            <hr>
                            <div class="row">
                              <div class="col-4">
                                  <div class="form-group">
                                      {!! Form::label('date_tpp', 'Fecha de presentación',['class'=>'form-control-label']) !!}
                                      {!! Form::date('date_tpp',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
              
                                      @error('date_tpp')
                                          <span class="text-danger">{{$message}}</span>                        
                                      @enderror
                                  </div>                
                              </div>
                              <div class="col-4">
                                  <div class="form-group">
                                      {!! Form::label('date_rad', 'Fecha de radicación',['class'=>'form-control-label']) !!}
                                      {!! Form::date('date_rad',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
              
                                      @error('date_rad')
                                          <span class="text-danger">{{$message}}</span>
                                          
                                      @enderror
                                  </div>
                                              
                              </div>
                              <div class="col-4">
                                  <div class="form-group">
                                      {!! Form::label('decision', 'Fallo del tribunal',['class'=>'form-control-label']) !!}
                                      {!! Form::text('decision', null,['class'=>'form-control']) !!}
              
                                      @error('decision')
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
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              {!! Form::submit('Actualizar medida', ['class'=>'btn btn-primary']) !!}

              {!! Form::close() !!}
              
           


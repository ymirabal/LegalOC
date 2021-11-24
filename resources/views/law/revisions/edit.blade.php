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
                            <h3 class="mb-0">Editar revisión</h3>
                        </div>
                        <div class="col-4 text-right">

                            @if ($revision->revisionable_type=='App\Models\Responsibility')
                                <a class="btn btn-sm btn-primary" href="{{route('revisions.index',['id'=>$revision->revisionable_id,'type'=>1])}}">Volver</a>
                            
                            @elseif ($revision->revisionable_type=='App\Models\DisciplinaryAction')
                                <a class="btn btn-sm btn-primary" href="{{route('revisions.index',['id'=>$revision->revisionable_id,'type'=>2])}}">Volver</a>                                
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::model($revision,['route'=>['revisions.update',$revision],'method'=>'put']) !!}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('date', 'Fecha de Presentación',['class'=>'form-control-label']) !!}
                                    {!! Form::date('date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}

                                    @error('date')
                                        <span class="text-danger">{{$message}}</span>                            
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <div class="row pb-4">                                              
                                       
                            <div class="col-4">
                                <label class="form-control-label">Decisión</label><br>                              

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="cl" name="result" class="custom-control-input" value="CL">
                                    <label class="custom-control-label" for="cl">CL</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sl" name="result" class="custom-control-input" value="SL">
                                    <label class="custom-control-label" for="sl">SL</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="clp" name="result" class="custom-control-input" value="CLP">
                                    <label class="custom-control-label" for="clp">CLP</label>
                                </div>                                 
                                {{-- <div class="form-group">
                                    <p class="font-weight-bold">Decisi&oacute;n</p>
                                    <label class="mr-3">
                                        {!! Form::radio('result','CL', true) !!}
                                        CL
                                    </label>
                                    <label class="mr-3">
                                        {!! Form::radio('result','SL', true) !!}
                                        SL
                                    </label>
                                    <label class="mr-3">
                                        {!! Form::radio('result','CLP', true) !!}
                                        CLP
                                    </label>
                                </div> --}}
                                @error('result')
                                    <span class="text-danger">{{$message}}</span>                                        
                                 @enderror
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
               
                    <hr class="my-4" />
                        {!! Form::close() !!}
                        
                </div>
                
            </div>
        
        </div>
    </div>
    
      @include('layouts.footers.auth')
</div>

@endsection  
            
            
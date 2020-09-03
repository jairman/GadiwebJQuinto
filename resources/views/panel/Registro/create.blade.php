@extends('layouts.panel')
@section('title', 'Crear Registro')

@section('page-header')
  User <small>new</small>
@stop

@section('content')
    <div class="card-header">
          <h4 style="text-align:center;">Registro de Vehículos</h4>
          
      </div>  
  <div class="row">
              <div class="col-sm-12">
                <div class="box" style="border:1px solid #d2d6de;">
                    {!! Form::open(['route'=>'panel.Registro.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}


                    <div class="box-body" style="margin:10px;">
                      <div class="form-group">
                        <label for="group_description">Seleccione Cliente :</label>
                        <select name="cliente"
                                class="form-control selectpicker"
                                data-live-search="true"
                                data-live-search-normalize="true"
                                data-style=""
                                data-style-base="form-control"
                                data-none-selected-text=""
                                required>
                                <option value=""></option>
                            @forelse($clientes as $cli)
                                <option value="{{$cli->id}}">{{$cli->cedula}}
                                  &nbsp;&nbsp;&nbsp;&nbsp;{{$cli->nombre}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="group_description">Seleccione Marca :</label>
                        <select name="marca"
                                value="0"
                                class="form-control selectpicker"
                                data-live-search="true"
                                data-live-search-normalize="true"
                                data-style=""
                                data-style-base="form-control"
                                data-none-selected-text=""
                                required>
                            <option value=""></option>
                            @forelse($marcas as $mar)
                              <option value="{{$mar->nombre}}">{{$mar->nombre}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="group_description">Ingrese Placa :</label>
                            <input class="form-control " style="text-transform:uppercase" type="text" name="placa"  required>
                      </div>
                      @include('panel.Registro.form')

                     
                    
                    </div>

                    <div class="box-footer" style="background-color:#f5f5f5;border-top:1px solid #d2d6de; text-align: center;">
                      <button type="submit" class="btn btn-primary" style="width:100px;">{{ trans('app.add_button') }}</button>
                      
                    </div>

                  {!! Form::close() !!}
                </div>
              </div>
            </div>
      

@stop

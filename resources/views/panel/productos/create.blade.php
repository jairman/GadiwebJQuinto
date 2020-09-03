@extends('layouts.panel')
@section('title', 'Crear Productos')

@section('page-header')
  User <small>new</small>
@stop

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="box" style="border:1px solid #d2d6de;">
        {!! Form::open(['route'=>'panel.productos.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}


        <div class="box-body" style="margin:10px;">
          @include('panel.productos.form')

         
         
        </div>

        <div class="box-footer" style="background-color:#f5f5f5;border-top:1px solid #d2d6de; text-align: center;">
      	  <button type="submit" class="btn btn-primary" style="width:100px;">{{ trans('app.add_button') }}</button>
          <a class="btn btn-danger " href="{{ route('panel.productos.index') }}" style="width:100px;"><i class="fa fa-btn fa-back"></i>{{ trans('app.cancel_button') }}</a>
      	</div>

      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop

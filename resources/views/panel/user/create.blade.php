@extends('layouts.panel')
@section('title', 'Crear Usuários')

@section('page-header')
  User <small>new</small>
@stop

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="box" style="border:1px solid #d2d6de;">
        {!! Form::open(['route'=>'panel.user.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}


        <div class="box-body" style="margin:10px;">
          @include('panel.user.form')

         
          <label for="remember">Seleccione Rol de Usuario</label>
          <div class="form-group box-body" style="margin:10px;">

             @foreach ($roles as $role)
                  {{ Form::checkbox('roles[]',  $role->id ) }}
                  {{ Form::label($role->name, ucfirst($role->name)) }}<br>

              @endforeach
              
          </div>
        </div>

        <div class="box-footer" style="background-color:#f5f5f5;border-top:1px solid #d2d6de;">
      	  <button type="submit" class="btn btn-info" style="width:100px;">{ trans('app.add_button') }}</button>
          <a class="btn btn-warning " href="{{ route('panel.user.index') }}" style="width:100px;"><i class="fa fa-btn fa-back"></i>{{ trans('app.cancel_button') }}</a>
      	</div>

      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop

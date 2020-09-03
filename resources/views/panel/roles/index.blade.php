@extends('layouts.panel')

@section('title', 'Roles y Permisos')
@section('css')

@endsection

@section('content')

<div class="card">
		<!-- /.card-header  Para poner titulos-->
	    <div class="card-header" style="text-align: center;">
	    	<h4 class=''>Roles y Permisos</h4>  
	    </div>	
	    <!-- Fin card-header  Para poner titulos-->
    <div class="card-body">

    	<!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">

		        <div class="col-lg-6">
		            <div class="card">
		              <div class="card-header border-0">
		                <div class="d-flex justify-content-between">
		                   	<div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de; text-align: center;">

                   				<button type="button" class="btn btn-lg btn-block btn-outline-primary"     data-toggle="modal" data-target=".bd-create-role"><i class="fa fa-plus"></i> Agregar nuevo Rol</button>
                			</div>
		                </div>
		              </div>
		              <div class="card-body">
		              <!-- Aca-->
		              	<div class="box-body table-responsive no-padding">
				          <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
				                <thead>
				                    <tr>
				                        <th>Nombre </th>
				                        <th>Permisos</th>
				                        <th>Acciones</th>
				                    </tr>
				                </thead>

				                <tfoot>
				                    <tr>
				                      <th></th>
				                      <th></th>
				                      <th></th>                                            
				                    </tr>
				                </tfoot>

				                <tbody>
				                   @foreach($roles as $role) 
				                      <tr>
				                          <td >{{ $role->name }}</td>
				                          <td >
				                              @forelse ($role->permissions as $permission)
				                                <small class="text-muted">{{ $permission->name }}</small>
				                              @empty
				                                <small class="text-muted">sin permisos</small>
				                              @endforelse

				                          </td>
				                          <td  class="Acciones">
				                         

							          	    <div class="btn-group" role="group" aria-label="Basic example">
							                  <button type="button" class="btn btn-info  btn-sm" data-toggle="modal" data-target=".bd-editar-role{{$role->id}}"><i class="fa fa-edit"></i></button>
							               
							                  <button type="button" class="btn btn-danger  btn-sm" data-toggle="modal" data-target=".bd-destroy-role{{$role->id}}"><i class="fa fa-trash"></i></button>
							                  
							            	</div>        

				                          </td>
				                      </tr>
				                  @endforeach
				                  </tbody>
				            </table>
				        </div>



		              <!-- Aca-->
		              </div>
		            </div>
		        </div>


		        <!-- /.col-md-6  Segunda Columna -->
		        <div class="col-lg-6">
		            <div class="card">
		              <div class="card-header border-0">
		                <div class="d-flex justify-content-between">
		                   	{!! Form::open(['route' => 'panel.roles.storepermission']) !!}
                      			@csrf
                    			
	                            <div class="input-group mb-6">
					                  <div class="input-group-prepend">
					                    <button type="submit" class="btn btn-primary">Agregar</button>
					                  </div>
					                  <!-- /btn-group -->
					                  <input type="text" class="form-control" name="name" placeholder="Ingrese Permiso" required>
					            </div>                      
                    		  	
                    		{!! Form::close() !!} 
		                </div>
		              </div>
		              <div class="card-body">
		                <!-- Aca-->
		                <div class="box-body table-responsive no-padding">
				          	<table id="tbl" class="table data-tables table-striped table-hover" 	cellspacing="0" width="100%">
				                <thead>
				                    <tr>
				                        <th>Nombre </th>
				                        <th>Guardado</th>
				                        <th>Acciones</th>
				                    </tr>
				                </thead>

				                <tfoot>
				                    <tr>
				                      <th></th>
				                      <th></th>
				                      <th></th>                                            
				                    </tr>
				                </tfoot>

				                <tbody>
				                   @foreach($permissions as $permission) 
				                      <tr>
				                          <td >{{ $permission->name }}</td>
				                          <td >{{ $permission->guard_name }}</td>
				                          <td >
				                               @if($permission->name == 'roles.roles')
				                                <button type="button" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i></button>
				                                @else
				                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-destroy-permission{{$permission->id}}"><i class="fa fa-trash"></i></button>
				                                @endif


				                          </td>
				                      </tr>
				                  @endforeach
				                  </tbody>
				            </table>
				       </div>
		              <!-- Aca-->             
		              </div>
		            </div>           
		        </div>
	           <!-- Termina /.col-md-6  Segunda Columna -->
	        </div>
	        <!-- /.row -->
	      </div>
	      <!-- /.container-fluid -->
	    </div>
	    <!-- /.content -->

	<!--Modal Create role-->
    <div class="modal fade bd-create-role" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Crear nuevo rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              <div class="modal-body">

                   {!! Form::open(['route' => 'panel.roles.store']) !!}
                    @csrf

                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Name:</strong>
                              <input type="text" placeholder="nombre rol" name="name" class="form-control">

                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Permission:</strong>
                              <br/>
                                  @foreach($permissions as $permission)
                                  
                                      <label>{{ Form::checkbox('permission[]', $permission->id, false, array('class' => 'name')) }} {{ $permission->name }}
                                      </label>
                                  <br>
                                  @endforeach
                          </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
            {!! Form::close() !!}



<!--Modal edit User Role-->
    @foreach($users as $user)
            <div class="modal fade bd-editar-user-role{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   
            {!! Form::model($user, ['method' => 'PUT','route' => ['panel.roles.assignrole', $user->id]]) !!}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong><br>
                        @foreach($roles as $role)
                        <label>
                        {{ Form::checkbox('roles[]', $role->id, null) }}
                        {{ $role->name }}
                        </label><br>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Ok</button>
                </div>

            </div>

            {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
    @endforeach

    <!--Modal Role destroy-->
    @foreach($roles as $role)
      <div class="modal fade bd-destroy-role{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Borrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['route' => ['panel.roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                  <div class="form-group">
                    <label>Borraras el permiso {{$role->name}}</label>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-danger">Borrar</button>
                    </div>                           
                {!! Form::close() !!}
              </div>
            </div>
          </div>
      </div>
     @endforeach 

<!--Modal Permission destroy-->
	@foreach($permissions as $permission)
	  <div class="modal fade bd-destroy-permission{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-sm">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title">Borrar</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	            {!! Form::open(['route' => ['panel.roles.destroypermission', $permission->id], 'method' => 'DELETE', 'onsubmit' => 'return validate_delete()']) !!}
	              <div class="form-group">
	                <label>Borraras el permiso {{$permission->name}}</label>
	              </div>
	                <div class="modal-footer">
	                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
	                  <button type="submit" class="btn btn-danger">Borrar</button>
	                </div>                           
	            {!! Form::close() !!}
	          </div>
	        </div>
	      </div>
  </div>
  @endforeach 

<!--Modal edit Role-->
	@foreach($roles as $role)
	  <div class="modal fade bd-editar-role{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Editar</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	         
	  {!! Form::model($role, ['method' => 'PUT','route' => ['panel.roles.update', $role->id]]) !!}
	  <div class="row">
	      <div class="col-xs-12 col-sm-12 col-md-12">
	          <div class="form-group">
	              <strong>Name:</strong>
	              <input placeholder="Name" class="form-control" name="name" type="text" value="{{ $role->name }}" disabled>
	              {{ Form::hidden('name', $role->name) }}

	          </div>
	      </div>
	      <div class="col-xs-12 col-sm-12 col-md-12">
	          <div class="form-group">
	              <strong>Permission:</strong>
	              <br/>
	              @foreach($permissions as $permission)
	              <label>
	                  @if($role->name != 'Admin')
	                      @if($permission->name == 'roles.roles')
	                      <input type="checkbox" name="permission[]" value="{{ $permission->id }}" disabled="">
	                      {{ $permission->name }}
	                      @else
	                      <input type="checkbox" name="permission[]" value="{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif>
	                      {{ $permission->name }}
	                      @endif
	                  @else
	                  <input type="checkbox" name="permission[]" value="{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif>
	                      {{ $permission->name }}
	                  @endif
	              </label>
	              <br/>
	              @endforeach
	          </div>
	      </div>
	      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
	          <button type="submit" class="btn btn-primary">Ok</button>
	      </div>
	  </div>
	  {!! Form::close() !!}

	        </div>
	      </div>
	    </div>
  	</div>
    @endforeach







	</div>
    <!-- /.card-body -->
</div>
@stop

@section('js')

@stop
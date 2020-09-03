@extends('layouts.panel')

@section('title', 'Categorías')
@section('css')

@endsection

@section('content')

<div class="card">
		<!-- /.card-header  Para poner titulos-->
	    <div class="card-header" style="text-align: center;">
	    	<h4>Categorías</h4>
	        
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
		                  <h3 class="card-title"></h3>
		                </div>
		              </div>
		              <div class="card-body">
		              <!-- Aca-->
		              <div class="row">
						  <div class="col-sm-12">
						    <div class="box" style="border:1px solid #d2d6de;">
						        {!! Form::open(['route'=>'panel.categoria.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}


						        <div class="box-body" style="margin:10px;">
						          @include('panel.categoria.form')

						         
						         
						        </div>

						        <div class="box-footer" style="background-color:#f5f5f5;border-top:1px solid #d2d6de; text-align: center;">
						      	  <button type="submit" class="btn btn-primary" style="width:100px;">{{ trans('app.add_button') }}</button>
						          
						      	</div>

						      {!! Form::close() !!}
						    </div>
						  </div>
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
		                  <h3 class="card-title"></h3>
		                </div>
		              </div>
		              <div class="card-body">
		              <!-- Aca-->
		              <div class="box-body table-responsive no-padding">
				          	<table id="tbl" class="table data-tables table-striped table-hover" 	cellspacing="0" width="100%">
				                <thead>
				                    <tr style="text-align: center;">
				                        <th>ID </th>
				                        <th>Categorías</th>
				                        <th class="no-sort">Acciones</th>
				                    </tr>
				                </thead>

				                <tfoot>
				                    <tr>
				                      <th></th>
				                      <th></th>
				                      <th class="actions"></th>
                                            
				                    </tr>
				                </tfoot>

				                <tbody>
				                   @foreach($categoria as $key=>$categ) 
				                   	@php $key++ @endphp
				                      <tr>
				                        <td >{{ $key }}</td>
				                        <td >{{ $categ->categoria }}</td>
				                        <td class="actions" style="text-align: right;">
				                              <ul class="list-inline btn-group" style="margin-bottom:0px;">
			                                  

			                                  	<li><button   title="{{ trans('app.edit_title') }}" class="btn btn-primary  btn-sm" data-toggle="modal" data-target=".bd-editar-categ{{$categ->id}}"><i class="fa fa-pencil-alt"></i></button></li>

			                                  	<li>
			                                      {!! Form::open([
			                                          'class'=>'delete',
			                                          'url'  => route('panel.categoria.destroy', $categ->id),
			                                          'method' => 'DELETE',
			                                          ])
			                                      !!}


												{!! Form::open(['method' => 'DELETE','route' => ['panel.categoria.destroy', $categ->id],'style'=>'display:inline']) !!}


			                                      <button style=" margin-left: 10px !important;" class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="fa fa-trash"></i></button>


			                                      {!! Form::close() !!}
			                                  	</li>
			                              	</ul> 


				                        </td>
				                      </tr>
				                  @endforeach
				                  </tbody>
				            </table>
				       </div>


				       <!--Modal edit Categoria-->
						@foreach($categoria as $categ)
						  <div class="modal fade bd-editar-categ{{$categ->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
						    <div class="modal-dialog modal-sm">
						      <div class="modal-content">
						        <div class="modal-header">
						          <h5 class="modal-title">Editar</h5>
						          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						            <span aria-hidden="true">&times;</span>
						          </button>
						        </div>
						        <div class="modal-body">
						         
								  {!! Form::model($categ, ['method' => 'PUT','route' => ['panel.categoria.update', $categ->id]]) !!}
								  <div class="row">
								      <div class="col-xs-12 col-sm-12 col-md-12">
								          <div class="form-group">
								              <strong>Categoría</strong>
								           
								              @include('panel.categoria.form')

								          </div>
								      </div>
								    
								      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
								          <button type="submit" class="btn btn-primary" >{{ trans('app.update_button') }}</button>
								      </div>
								  </div>
								  {!! Form::close() !!}

						        </div>
						      </div>
						    </div>
					  	</div>
					    @endforeach
					    <!--FIN Modal edit Categoria-->
				         


           
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
	</div>
    <!-- /.card-body -->
</div>
@stop

@section('js')
<script>
   (function($) {

      var table = $('.data-tables').DataTable({
        "columnDefs": [{
           "targets": 'no-sort',
           "orderable": false,
         }],
      });
      //replace bool column to checkbox
      renderBoolColumn('#tbl','bool');
    })(jQuery);  
</script>
@stop
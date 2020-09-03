@extends('layouts.panel')

@section('title', 'Marcas')
@section('css')
	<style>
  		table.table .actions {
    	  width: 100px;
    	  text-align: center;
 		 }
  	</style>
@endsection

@section('content')

<div class="card">
		<!-- /.card-header  Para poner titulos-->
	    <div class="card-header">

	        
	    </div>	
	    <!-- Fin card-header  Para poner titulos-->
    <div class="card-body">

    	<!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">

		        <div class="col-lg-8">
		            <div class="card">
		              <div class="card-header border-0">
		                <div class="d-flex justify-content-between" style="text-align: center;">
		                  <h3 class="card-title " >Marcas</h3>
		                </div>
		     
		              </div>
		              <div class="card-body">
		              <!-- Aca-->
					
		              	<div class=" box-body table-responsive no-padding">
						        <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" 	width="100%">
					                <thead>
					                    <tr style="text-align: center;">
					                        <th>Item</th>
					                        <th>Nombre</th>
					                       
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
					                        <th></th>
					                        <th></th>
					                       
					                   	                           
					                    </tr>
					                </tfoot>

					                <tbody>
					        			@foreach ($marca as $key=>$item)
					        				@php $key ++ @endphp
					          				<tr>
						                    
						                        <td style="text-align: center;">{{ $key }}</td> 
						                       
						                        <td style="text-align: left;">{{$item->nombre}}</td>   
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
		        <div class="col-lg-4">
		            <div class="card">
		            	<div class="card-header border-0">
		                <div class="d-flex justify-content-between">
		                  <h3 class="card-title" style="text-align: center;">Registro</h3>
		                </div>
		              </div>
		              <div class="card-body">
		                <!-- Aca-->
		                <div class="row">
						  <div class="col-sm-12">
						    <div class="box" style="border:1px solid #d2d6de;">
						        {!! Form::open(['route'=>'panel.Marca.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}


						        <div class="box-body" style="margin:10px;">
						          @include('panel.Marca.form')

						         
						         
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
          "lengthChange": false,
          "info":     false,
      });
      //replace bool column to checkbox
      renderBoolColumn('#tbl','bool');
    })(jQuery);  
</script>
@stop
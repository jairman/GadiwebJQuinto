@extends('layouts.panel')

@section('title', 'Roles y Permisos')
@section('css')
	<style>
  		table.table .actions {
    	  width: 100px;
    	  text-align: center;

 		 }
 	div.dataTables_wrapper div.dataTables_filter {
    text-align: left;

	}
	.dataTables_filter {
   float: left !important;
}
  	</style>
@endsection

@section('content')

<div class="card">
		<!-- /.card-header  Para poner titulos-->
	    <!--div class="card-header">

	        
	    </div-->	
	    <!-- Fin card-header  Para poner titulos-->
    <div class="card-body">

    	<!-- Main content -->
	    <div class="content">
	      <div class="container-fluid">
	        <div class="row">

		        <div class="col-lg-7">
		            <div class="card">
		              <div class="card-header border-0">
		                <div class="d-flex justify-content-between">
		                  <h3 class="card-title">Primera Columna</h3>
		                </div>
		              </div>
		              <div class="card-body">
		              <!-- Aca-->
		              	 <div class=" box-body table-responsive no-padding">
						        <table id="tbl" class="table data-tables1 table-striped table-hover" cellspacing="0" 	width="100%">
					                <thead>
					                    <tr style="text-align: center;">
					                        <th>Código</th>
					                        <th>Descripción</th>
					                        <th>Precio</th>     
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
					        			@foreach ($items as $item)
					        				
					          				<tr>
						                        <td style="text-align: center;">{{ $item->codigo }}</a></td>
						                        <td>{{ $item->descripcion }}</td> 
						                       
						                        <td style="text-align: right;">{{ number_format($item->precio) }}</td> 
				                      
						                       
					        				</tr>

					        			@endforeach

					        				<tr>
						                        <td ></a></td>
						                        <td>Sub Total</td>
						                        <td style="text-align: right;">{{ number_format($item->precio) }}</td> 
					        				</tr>
					        				<tr>
						                        <td ></a></td>
						                        <td>Descuento</td>
						                        <td style="text-align: right;">{{ number_format($item->precio) }}</td> 
					        				</tr>
					        				<tr>
						                        <td ></a></td>
						                        <td>Total</td>
						                        <td style="text-align: right;">{{ number_format($item->precio) }}</td> 
					        				</tr>
					                </tbody>
					            </table>
							</div>



		              <!-- Aca-->
		              </div>
		            </div>
		        </div>


		        <!-- /.col-md-6  Segunda Columna -->
		        <div class="col-lg-5">
		            <div class="card">
		            	<div class="card-header border-0">
		                <div class="d-flex justify-content-between">
		                  <h3 class="card-title">PRODUCTOS</h3>
		                </div>
		              </div>
		              <div class="card-body">
		                <!-- Aca-->
		                <div class=" box-body table-responsive no-padding">
						        <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" 	width="100%">
					                <thead>
					                    <tr style="text-align: center;">
					                        <th>Código</th>
					                        <th>Descripción</th>
					                       
					                        <th>Precio</th>
					                        <th></th>
					                       
					                        
					                      
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
					                        <th></th>
					                        <th></th>
					                        <th></th>
					                        <th></th>
					                       
					                       
					                      
					                        
					                    </tr>
					                </tfoot>

					                <tbody>
					        			@foreach ($items as $item)
					        				
					          				<tr>
						                        <td style="text-align: center;">{{ $item->codigo }}</a></td>
						                        <td>{{ $item->descripcion }}</td> 
						                       
						                        <td style="text-align: right;">{{ number_format($item->precio) }}</td> 
				                      			<td style="text-align: right;">
				                      				<a href="#" class="ir-evaluacion agregar"><i class="fa fa-cart-plus"  data-toggle="tooltip" data-placement="left" title="Agregar a Factura"></i></a>

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
          "scrollX": false, 
      });
      //replace bool column to checkbox
      renderBoolColumn('#tbl','bool');
      
    })(jQuery);  
</script>
@stop
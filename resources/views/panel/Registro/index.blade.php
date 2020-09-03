@extends('layouts.panel')

@section('title', 'Productos')
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
       
       <h3 style="text-align: center;">Cantidad de Vehículos Existentes Por Marca</h3>    

    </div>	
    <!-- Fin card-header  Para poner titulos-->
	    <div class="card-body">

	    	<div class=" box-body table-responsive no-padding">
		        <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" 	width="100%">
	                <thead>
	                    <tr style="text-align: center;">
	                        <th>Items</th>
	                        <th>Marcas</th>
	                        <th>Cantidad</th>
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
	        			@foreach ($registro as $key=>$item)
	        				@php $key ++ @endphp
	        				
	          				<tr>
		                        <td style="text-align: center;">{{ $key }}</a></td>
		                        <td style="text-align: center;">{{ ucfirst($item->marca) }}</td> 
		                        <td style="text-align: center;">{{ $item->quantity }}</td> 
	        				</tr>

	        			@endforeach
	                </tbody>
	            </table>
			</div>
		</div>
    <!-- /.card-body -->
</div>
@stop

@section('js')
	<!-- DataTables -->

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
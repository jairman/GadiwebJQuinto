@extends('layouts.panel')

@section('title', 'Usuários')
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
          <a class="btn  btn-outline-danger" href="{{ route('panel.user.create') }}" title="Agregar Usuario">
            <i class="fa fa-plus" style="vertical-align:middle" ></i>
          </a> 
           

    </div>	
    <!-- Fin card-header  Para poner titulos-->
	    <div class="card-body">

	    	<div class=" box-body table-responsive no-padding">
		        <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" 	width="100%">
	                <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Email</th>
	                        <th>Role</th>
	                        
	                        <th class="no-sort"></th>
	                    </tr>
	                </thead>

	                <tfoot>
	                    <tr>
	                        <th></th>
	                        <th></th>
	                        <th></th>
	                      
	                        <th class="actions"></th>
	                    </tr>
	                </tfoot>

	                <tbody>
	        			@foreach ($items as $item)

	          				<tr>
		                        <td>{{ $item->name }}</a></td>
		                        <td>{{ $item->email }}</td> 
		                        <td>{{ $item->roles()->pluck('name')->implode('__/__') }}</td>                       
		                        <td class="actions">
	                            
	                            	<ul class="list-inline btn-group" style="margin-bottom:0px;">
	                                  	<li><a href="{{ route('panel.user.edit', $item->id) }}" title="{{ trans('panel.edit_title') }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a></li>
	                                  	<li>
	                                      {!! Form::open([
	                                          'class'=>'delete',
	                                          'url'  => route('panel.user.destroy', $item->id),
	                                          'method' => 'DELETE',
	                                          ])
	                                      !!}

	                                      <button style=" margin-left: 10px !important;" class="btn btn-danger btn-sm" title="{{ trans('panel.delete_title') }}"><i class="fa fa-trash"></i></button>

	                                      {!! Form::close() !!}
	                                  	</li>
	                              	</ul>
	                          
	                          	</td>
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
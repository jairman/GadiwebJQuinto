@extends('layouts.panel')

@section('title', 'Manter Usuários')
@section('css')
<!-- DataTables -->
  <style>
      table.table .actions {
          width: 100px;
          text-align: center;
        }
  </style>
@endsection
@section('content')
<div class="row">
      <div class="col-xs-12">
      <div class="box" style="border:1px solid #d2d6de;" >
          <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">
          <a class="btn btn-info" href="{{ route('panel.user.create') }}" title="Add Item">
            <i class="fa fa-plus" style="vertical-align:middle" ></i>
          </a>
          </div>

          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class='bool text-center'>Active</th>
                        <th class="no-sort"></th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="actions"></th>
                    </tr>
                </tfoot>

                <tbody>
                            @foreach ($items as $item)

                                <tr>
                          <td><a href="{{ route('panel.user.edit', $item->id) }}">{{ $item->name }}</a></td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->email   }}</td>
                          
                          <td>{{ $item->active }}</td>





                          
                          <td class="actions">
                            @if ( auth()->user()->name === "tokin" )
                              <ul class="list-inline" style="margin-bottom:0px;">
                                  <li><a href="{{ route('panel.user.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                  <li>
                                      {!! Form::open([
                                          'class'=>'delete',
                                          'url'  => route('panel.user.destroy', $item->id),
                                          'method' => 'DELETE',
                                          ])
                                      !!}

                                      <button class="btn btn-danger btn-xs" title="{{ trans('app.delete_title') }}"><i class="fa fa-trash"></i></button>

                                      {!! Form::close() !!}
                                  </li>
                              </ul>
                            @elseif (auth()->user()->id === $item->id)
                            <ul class="list-inline" style="margin-bottom:0px;">
                              <li>
                                <a href="{{ url('admin\profileedit', auth()->id()) }}" title="Update Profile" class="btn btn-primary btn-xs"><i class="fa fa-user"></i></a></li>
                              </li>
                            </ul>
                            @else

                                <i class="fa fa-ban" title="Forbidden" style="color:red;">

                            @endif
                          </td>
                                  </tr>

                            @endforeach
                  </tbody>


            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
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
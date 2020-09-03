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
<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <a href="{{ route('panel.user.create') }}" class="btn btn-primary float-left" role="button">Adicionar
            Registro</a>
    </div>
    <div class="card-body">
        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="tbl" class="table data-tables table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr role="row">
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th style="width:175px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('panel.user.edit', $item->id)}}">
                                        <i class="fa fa-pencil-alt white"></i> Editar
                                    </a>
                                    /
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                        data-target="#deleteRatificationModal-{{$item->id}}">
                                        <i class="fa fa-trash white"></i> Apagar
                                    </a>
                                </td>
                            </tr>
                            <div class=" modal fade" id="deleteRatificationModal-{{$item->id}}" role="dialog"
                                aria-labelledby="ratificationMsg" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="ratificationMsg">
                                                Confirmar exclusão
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Quer mesmo deletar este registro?
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{ route('panel.user.destroy', $item->id ) }}">
                                                @method('DELETE') @csrf
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <input type="submit" name="submit" value="Delete"
                                                    class='btn btn-danger'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
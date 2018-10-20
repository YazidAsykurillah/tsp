@extends('layouts.app')

@section('page_title')
    Perangkat
@endsection

@section('page_header')
  <h1>
    <i class="fa fa-book"></i> Perangkat
    <small>Daftar Perangkat</small>
  </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-book"></i> Perangkat</a></li>
  </ol>
@endsection

@section('content')
  
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
             	<h3 class="box-title"> Daftar Perangkat</h3>
              <div class="box-tools">
              	<a href="{{ URL::to('item/create')}}" class="btn btn-primary btn-xs" title="Tambahkan perangkat baru">
                	<i class="fa fa-plus"></i>&nbsp;Tambah
              	</a>

              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
            	<div class="table-responsive">
                	<table class="table table-bordered" id="table-item">
                  		<thead>
		                    <tr>
		                     	<th style="width:5%;">#</th>
		                      <th style="width:10%;">Kode</th>
                          <th style="width:20%;">Nama</th>
                          <th>Deskripsi</th>
		                      <th style="width:10%;text-align:center;">Actions</th>
		                    </tr>
                  		</thead>
                      <thead id="searchColumn">
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                  		<tbody>

                  		</tbody>
                  		<tfoot>
                    		<tr>
                      		<th></th>
                      		<th></th>
                      		<th></th>
                      		<th></th>
                          <th></th>
                    		</tr>
                  		</tfoot>
              		</table>
            	</div>
          	</div><!-- /.box-body -->
          	<div class="box-footer clearfix">
            
          	</div>
        </div><!-- /.box -->
    </div>
 </div>


 <!--Modal Delete Item-->
  <div class="modal fade" id="modal-delete-item" tabindex="-1" role="dialog" aria-labelledby="modal-delete-itemLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      {!! Form::open(['url'=>'item/delete', 'method'=>'post']) !!}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-delete-itemLabel">Confirmation</h4>
        </div>
        <div class="modal-body">
          You are going to delete <b id="item-name-to-delete"></b>
          <br/>
          <p class="text text-danger">
            <i class="fa fa-info-circle"></i>&nbsp;This process can not be reverted
          </p>
          <input type="hidden" id="item_id" name="item_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!--ENDModal Delete Item-->

@endsection

@section('additional_scripts')
  <script type="text/javascript">
    var tableItem =  $('#table-item').DataTable({
      processing :true,
      serverSide : true,
      ajax : {
        "url" : '{!! route('datatables.getItems') !!}',
      },
      columns :[
        {data: 'rownum', name: 'rownum', searchable:false},
        { data: 'code', name: 'code' },
        { data: 'name', name: 'name' },
        { data: 'description', name: 'description' },
        { data: 'actions', name: 'actions', orderable:false, searchable:false, className:'dt-body-center' }
      ]
    });

    // Delete button handler
    tableItem.on('click', '.btn-delete-item', function(e){
      var id = $(this).attr('data-id');
      var code = $(this).attr('data-text');
      $('#item_id').val(id);
      $('#item-name-to-delete').text(code);
      $('#modal-delete-item').modal('show');
    });

    // Setup - add a text input to each header cell
    $('#searchColumn th').each(function() {
      if ($(this).index() != 0 && $(this).index() != 4) {
        $(this).html('<input class="form-control" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
      }
          
    });
    //Block search input and select
    $('#searchColumn input').keyup(function() {
      tableItem.columns($(this).data('id')).search(this.value).draw();
    });
    //ENDBlock search input and select
    
  </script>
  
@endsection

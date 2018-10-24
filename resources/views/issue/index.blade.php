@extends('layouts.app')

@section('page_title')
  Kerusakan / Kendala
@endsection

@section('page_header')
  <h1>
    <i class="fa fa-exclamation-triangle"></i> Kerusakan / Kendala
    <small>Daftar Kerusakan / Kendala</small>
  </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-exclamation-triangle"></i> Kerusakan / Kendala</a></li>
  </ol>
@endsection

@section('content')
  
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
             	<h3 class="box-title"> Daftar Kerusakan / Kendala</h3>
              <div class="box-tools">
              	<a href="{{ URL::to('issue/create')}}" class="btn btn-primary btn-xs" title="Laporkan Issue baru">
                	<i class="fa fa-plus"></i>&nbsp;Buat Baru
              	</a>

              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
            	<div class="table-responsive">
                	<table class="table table-bordered" id="table-issue">
                  		<thead>
		                    <tr>
		                     	<th style="width:5%;">#</th>
                          <th style="width:15%;">Kode</th>
		                      <th style="width:15%;">Perangkat</th>
                          <th style="width:15%;">Pelapor</th>
                          <th>Deskripsi</th>
                          <th>Status</th>
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


 <!--Modal Delete Issue-->
  <div class="modal fade" id="modal-delete-issue" tabindex="-1" role="dialog" aria-labelledby="modal-delete-issueLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      {!! Form::open(['url'=>'issue/delete', 'method'=>'post']) !!}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-delete-issueLabel">Confirmation</h4>
        </div>
        <div class="modal-body">
          You are going to delete <b id="issue-code-to-delete"></b>
          <br/>
          <p class="text text-danger">
            <i class="fa fa-info-circle"></i>&nbsp;This process can not be reverted
          </p>
          <input type="hidden" id="issue_id" name="issue_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!--ENDModal Delete Issue-->

@endsection

@section('additional_scripts')
  <script type="text/javascript">
    var tableIssue =  $('#table-issue').DataTable({
      processing :true,
      serverSide : true,
      ajax : {
        "url" : '{!! route('datatables.getIssues') !!}',
      },
      columns :[
        {data: 'rownum', name: 'rownum', searchable:false},
        { data: 'code', name: 'code' },
        { data: 'item_id', name: 'item_id' },
        { data: 'reporter_id', name: 'reporter_id'},
        { data: 'description', name: 'description' },
        { data: 'status', name: 'status'},
        { data: 'actions', name: 'actions', orderable:false, searchable:false, className:'dt-body-center' }
      ]
    });

    // Delete button handler
    tableIssue.on('click', '.btn-delete-issue', function(e){
      var id = $(this).attr('data-id');
      var code = $(this).attr('data-text');
      $('#issue_id').val(id);
      $('#issue-code-to-delete').text(code);
      $('#modal-delete-issue').modal('show');
    });

    // Setup - add a text input to each header cell
    $('#searchColumn th').each(function() {
      if ($(this).index() != 0 && $(this).index() != 7) {
        $(this).html('<input class="form-control" type="text" placeholder="Search" data-id="' + $(this).index() + '" />');
      }
          
    });
    //Block search input and select
    $('#searchColumn input').keyup(function() {
      tableIssue.columns($(this).data('id')).search(this.value).draw();
    });
    //ENDBlock search input and select
    
  </script>
  
@endsection

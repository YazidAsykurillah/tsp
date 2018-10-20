@extends('layouts.app')

@section('page_title')
    Dashboard
@endsection

@section('page_header')
  <h1>
    <i class="fa fa-dashboard"></i> Dashboard
    <small></small>
  </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="active"><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
@endsection

@section('content')
  
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
             	<h3 class="box-title"><i class="fa fa-exclamation-triangle"></i> Daftar Kerusakan</h3>
              	<a href="{{ URL::to('issue/create')}}" class="btn btn-primary pull-right" title="Create new issue">
                	<i class="fa fa-plus"></i>&nbsp;Create
              	</a>
            </div><!-- /.box-header -->
            <div class="box-body">
            	<div class="table-responsive">
                	<table class="table table-bordered" id="table-issue">
                  		<thead>
		                    <tr>
		                     	<th style="width:5%;">#</th>
		                      	<th>Perangkat</th>
                            <th>Pelapor</th>
                            <th>Keterangan</th>
		                      	<th>PIC</th>
		                      	<th>Status</th>
		                      	<th style="width:10%;text-align:center;">Actions</th>
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
@endsection

@section('additional_scripts')
  
  
@endsection

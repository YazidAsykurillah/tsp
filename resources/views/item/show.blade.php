@extends('layouts.app')

@section('page_title')
    Perangkat 
@endsection

@section('page_header')
  <h1>
    <i class="fa fa-book"></i> Perangkat
    <small>Detail Perangkat</small>
  </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ URL::to('item') }}"><i class="fa fa-book"></i> Perangkat</a></li>
    <li class="active">Detail</a></li>
  </ol>
@endsection

@section('content')
  
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
             	<h3 class="box-title">Detail Perangkat</h3>
              <div class="box-tools">
              	
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table class="table">
                <tr>
                  <td>Kode</td>
                  <td style="width:5%;">:</td>
                  <td>{{ $item->code }}</td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td style="width:5%;">:</td>
                  <td>{{ $item->name }}</td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td style="width:5%;">:</td>
                  <td>{{ $item->description }}</td>
                </tr>
              </table>
          	</div><!-- /.box-body -->
          	<div class="box-footer clearfix">
            
          	</div>
        </div><!-- /.box -->
    </div>
 </div>


@endsection

@section('additional_scripts')
  
  
@endsection

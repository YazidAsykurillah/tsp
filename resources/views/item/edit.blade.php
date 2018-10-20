@extends('layouts.app')

@section('page_title')
    Perangkat 
@endsection

@section('page_header')
  <h1>
    <i class="fa fa-book"></i> Perangkat
    <small>Edit Perangkat</small>
  </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ URL::to('item') }}"><i class="fa fa-book"></i> Perangkat</a></li>
    <li class="active">Edit</a></li>
  </ol>
@endsection

@section('content')
  
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
             	<h3 class="box-title">Edit Perangkat</h3>
              <div class="box-tools">
              	
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              {!! Form::model($item, ['route'=>['item.update', $item->id], 'class'=>'form-horizontal','id'=>'form-update-item', 'method'=>'put', 'files'=>true]) !!}
                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                  {!! Form::label('code', 'Kode', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                    {!! Form::text('code',null,['class'=>'form-control', 'placeholder'=>'code of the item', 'id'=>'code', 'disabled'=>true]) !!}
                    @if ($errors->has('code'))
                      <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {!! Form::label('name', 'Nama', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                    {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Name of the item', 'id'=>'name']) !!}
                    @if ($errors->has('name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  {!! Form::label('description', 'Deskripsi', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                    {!! Form::textarea('description',null,['class'=>'form-control', 'placeholder'=>'description of the item', 'id'=>'description']) !!}
                    @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  {!! Form::label('', '', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" id="btn-save-item"><i class="fa fa-save"></i> Save</button>
                    &nbsp;<a href="{{ url('item') }}" class="btn btn-default"> <i class="fa fa-undo"></i> Cancel</a>
                  </div>
                </div>
              {!! Form::close() !!}
          	</div><!-- /.box-body -->
          	<div class="box-footer clearfix">
            
          	</div>
        </div><!-- /.box -->
    </div>
 </div>


@endsection

@section('additional_scripts')
  <script type="text/javascript">
    $('#btn-save-item').prop('disabled', false);
    $('#form-update-item').on('submit', function(){
      $('#btn-save-item').prop('disabled', true);
    });
    
  </script>
  
@endsection

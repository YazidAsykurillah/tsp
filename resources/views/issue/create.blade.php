@extends('layouts.app')

@section('page_title')
  Laporkan Kerusakan / Kendala
@endsection

@section('page_header')
  <h1>
    <i class="fa fa-exclamation-triangle"></i> Kerusakan / Kendala
    <small>Buat Laporan Kerusakan / Kendala</small>
  </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ URL::to('issue') }}"><i class="fa fa-dashboard"></i> Kerusakan / Kendala</a></li>
    <li class="active"><i class="fa fa-exclamation-triangle"></i> Laporan Kerusakan / Kendala baru</a></li>
  </ol>
@endsection

@section('content')
  
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
             	<h3 class="box-title"> Laporan Kerusakan / Kendala Baru</h3>
              <div class="box-tools">
              	
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['route'=>'issue.store','role'=>'form','class'=>'form-horizontal','id'=>'form-create-issue','files'=>true]) !!}
                <div class="form-group{{ $errors->has('item_id') ? ' has-error' : '' }}">
                  {!! Form::label('item_id', 'Perangkat', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                    <select name="item_id" id="item_id" class="form-control">
                      @if(Request::old('item_id') != NULL)
                        <option value="{{Request::old('item_id')}}">
                          {{ \App\Item::find(Request::old('item_id'))->name }}
                        </option>
                      @endif
                    </select>
                    @if ($errors->has('item_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('item_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  {!! Form::label('description', 'Deskripsi', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                    {!! Form::textarea('description', null, ['id'=>'description', 'class'=>'form-control']) !!}
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
                    <button type="submit" class="btn btn-primary" id="btn-save-issue"><i class="fa fa-save"></i> Save</button>
                    &nbsp;<a href="{{ url('issue') }}" class="btn btn-default"> <i class="fa fa-undo"></i> Cancel</a>
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
    $('#btn-save-issue').prop('disabled', false);

    //Block item_id selection
    $('#item_id').select2({
      placeholder: 'Pilih Perangkat',
      ajax: {
        url: '{!! url('select2Item') !!}',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
                  return {
                      text: item.name,
                      id: item.id
                  }
              })
          };
        },
        cache: true
      },
      allowClear : true
    });
    //ENDBlock item_id selection

    $('#form-create-issue').on('submit',  function(){
      $('#btn-save-issue').prop('disabled', true);
    });

  </script>
@endsection

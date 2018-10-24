@extends('layouts.app')

@section('page_title')
  {{ $issue->code }}
@endsection

@section('page_header')
  <h1>
    <i class="fa fa-exclamation-triangle"></i> Kerusakan / Kendala
    <small>{{ $issue->code }}</small>
  </h1>
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ URL::to('issue') }}"><i class="fa fa-exclamation-triangle"></i> Kerusakan / Kendala</a></li>
    <li class="active"> {{$issue->code }} </li>
  </ol>
@endsection

@section('content')
  
<div class="row">
  <!--General Information-->
  <div class="col-md-7">
    <div class="box box-primary">
        <div class="box-header with-border">
         	<h3 class="box-title"><i class="fa fa-info-circle"></i> Detail </h3>
          <div class="box-tools"></div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table class="table">
            <tr>
              <td style="width:20%;">Tanggal Pelaporan</td>
              <td style="widt:5%;">:</td>
              <td>{{ $issue->created_at }}</td>
            </tr>
            <tr>
              <td style="width:20%;">Perangkat</td>
              <td style="widt:5%;">:</td>
              <td>{{ $issue->item->name }}</td>
            </tr>
            <tr>
              <td style="width:20%;">Pelapor</td>
              <td style="widt:5%;">:</td>
              <td>{{ $issue->reporter->name }}</td>
            </tr>
            <tr>
              <td style="width:20%;">Deskripsi</td>
              <td style="widt:5%;">:</td>
              <td>{{ $issue->description }}</td>
            </tr>
            <tr>
              <td style="width:20%;">Status</td>
              <td style="widt:5%;">:</td>
              <td>
                {{ $issue->status }}
              </td>
            </tr>
          </table>
      	</div><!-- /.box-body -->
      	<div class="box-footer clearfix">
        
      	</div>
    </div><!-- /.box -->
  </div>
  <!--END General Information-->

  <!--Repairment-->
  <div class="col-md-5">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-wrench"></i> Perbaikan</h3>
          <div class="box-tools"></div>
        </div><!-- /.box-header -->
        <div class="box-body">
          <!--Has repairment-->
          @if($issue->repairment)
            <table class="table">
              <tr>
                <td>Kode Perbaikan</td>
                <td style="width:5%;">:</td>
                <td>{{ $issue->repairment->code }}</td>
              </tr>
              <tr>
                <td>PIC</td>
                <td style="width:5%;">:</td>
                <td>{{ $issue->repairment->pic->name }}</td>
              </tr>
              <tr>
                <td>Status</td>
                <td style="width:5%;">:</td>
                <td>
                  @if($issue->repairment->is_completed == TRUE)
                    <p class="text-success">Selesai</p>
                  @else
                    <p class="text-info">Sedang dikerjakan</p>
                    <a href="#" id="btn-complete-repairment">
                      <i class="fa fa-flag"></i> Mark as Completed
                    </a>
                  @endif
                </td>
              </tr>
              <tr>
                <td>Aksi Perbaikan</td>
                <td style="width:5%;">:</td>
                <td>{{ $issue->repairment->action }}</td>
              </tr>
            </table>
          @else
            <p><text class="text-warning"><i class="fa fa-exclamation-triangle"></i> Belum ada perbaikan<text></p>
            <a href="#" id="btn-register-repairment" class="btn btn-primary">
              <i class="fa fa-sign-in"></i> Daftarkan Perbaikan
            </a>
          @endif
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
        
        </div>
    </div><!-- /.box -->
  </div>
  <!--END Repairment-->

 
</div>

<!--Modal Register Repairment-->
  <div class="modal fade" id="modal-register-repairment" tabindex="-1" role="dialog" aria-labelledby="modal-register-repairmentLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      {!! Form::open(['url'=>'issue/repairment/create', 'class'=>'form-horizontal','id'=>'form-set-pic','method'=>'post']) !!}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-register-repairmentLabel">Daftarkan Perbaikan</h4>
        </div>
        <div class="modal-body">
          <div class="form-group{{ $errors->has('pic_id') ? ' has-error' : '' }}">
            {!! Form::label('pic_id', 'PIC', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
              <select name="pic_id" id="pic_id" class="form-control" style="width:100%;" required>
                @if(Request::old('pic_id') != NULL)
                  <option value="{{Request::old('pic_id')}}">
                    {{ \App\Item::find(Request::old('pic_id'))->name }}
                  </option>
                @endif
              </select>
              @if ($errors->has('pic_id'))
                <span class="help-block">
                  <strong>{{ $errors->first('pic_id') }}</strong>
                </span>
              @endif
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="hidden" id="issue_id" name="issue_id" value="{{$issue->id }}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!--ENDModal Register Repairment-->

  <!--Modal Complete Repairment-->
  <div class="modal fade" id="modal-complete-repairment" tabindex="-1" role="dialog" aria-labelledby="modal-complete-repairmentLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      {!! Form::open(['url'=>'issue/repairment/complete', 'class'=>'form-horizontal','id'=>'form-complete-repairment','method'=>'post']) !!}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-complete-repairmentLabel">Selesaikan Perbaikan</h4>
        </div>
        <div class="modal-body">
          <div class="form-group{{ $errors->has('action') ? ' has-error' : '' }}">
            {!! Form::label('action', 'Aksi Perbaikan', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('action', null, ['id'=>'action', 'class'=>'form-control', 'required'=>true]) !!}
                @if(Request::old('action') != NULL)
                  <option value="{{Request::old('action')}}">
                    {{ \App\Item::find(Request::old('action'))->action }}
                  </option>
                @endif
              </select>
              @if ($errors->has('action'))
                <span class="help-block">
                  <strong>{{ $errors->first('action') }}</strong>
                </span>
              @endif
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="hidden" id="repairment_id" name="repairment_id" value="{{ $issue->repairment ? $issue->repairment->id : NULL}}">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!--ENDModal Complete Repairment-->

@endsection

@section('additional_scripts')
  <script type="text/javascript">

    //Register repairment handling
    $('#btn-register-repairment').on('click', function(event){
      event.preventDefault();
      $('#modal-register-repairment').modal('show');
    });

    //Complete repairment handling
    $('#btn-complete-repairment').on('click', function(event){
      event.preventDefault();
      $('#modal-complete-repairment').modal('show');
    });

    //Block pic_id selection
    $('#pic_id').select2({
      placeholder: 'Pilih PIC',
      ajax: {
        url: '{!! url('select2UserToSetPIC') !!}',
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
    //ENDBlock pic_id selection
  </script>
@endsection

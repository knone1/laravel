@extends('admin.includes.layout')

@section('title', 'Admin Panel')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- Your Page Content Here -->
<div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
                  <div class="col-md-10 col-md-offset-1">
              <h3 class="box-title">Site Setting</h3><br/>
              <small>
                  mark as check to enable feature of the site
              </small>
              <br/><br/>
          @if(Session::has('status'))
              <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                      <div class="alert alert-success alert-dismissable text-xs-center">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          {{ Session::get('status') }}
                      </div>
                  </div>
              </div>
          @endif
            <!-- /.box-header -->
            <!-- form start -->
    @foreach($values as  $value)
            <form method="POST" role="form" action="{{ route('admin_setting.update', ['id'=>$value->id]) }}" accept-charset="UTF-8">
                {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
                <input type="hidden" name="id" value="{{ $value->id }}">
        @if ($value->id == 1)
            <textarea class="form-control" rows="3" name="site_name" placeholder="Enter ...">{{ $value->setting_value }}</textarea>
        @elseif ($value->id == 4)
            <input type="text" class="form-control" id="text" placeholder="Enter.." value="{{ $value->setting_value or '0' }}" name="{{ $value->setting_name }}">
        @else 
                <div class="checkbox">
                    <label>
                      <input type="hidden" name="{{ $value->setting_name }}" value="0"/>
                      <input type="checkbox" name="{{ $value->setting_name }}" value="{{ $value->setting_value or '1' }}"/>
                      {{ $value->setting_name }}
                    </label>
                  </div>
        @endif 
    @endforeach
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          <!-- /.box -->
          </div>
          <!-- /.box -->
          </div>
          </div>
              <!-- /input-group -->
            </div>
        <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            
          </div>
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- Main content -->
    <!-- /.content -->
  </div>
@endsection

@section('js_assets')
@parent

@endsection

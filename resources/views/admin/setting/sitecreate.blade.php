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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Site Setting</h3>
          @if(Session::has('status'))
              <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-success alert-dismissable text-xs-center">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          {{ Session::get('status') }}
                      </div>
                  </div>
              </div>
          @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->

    @foreach($values as  $value)
            <form method="POST" role="form" action="{{ route('admin_setting.update', ['id'=>$value->id]) }}" accept-charset="UTF-8">
            <input name="_method" type="hidden" value="PUT">
                {{ csrf_field() }}                                                                            
              <div class="box-body">
                <div class="form-group">
                  <label for="text">{{ $value->setting_name }}</label>
                  <small>{{ $value->setting_desc }}</small>
                  <input type="text" class="form-control" id="text" placeholder="Enter.." value="{{ $value->setting_value }}" name="setting_value">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="id" value="{{ $value->id }}">
              </div>
            </form>

    @endforeach
          </div>
          <!-- /.box -->
              <!-- /input-group -->
            </div>

        <div class="col-md-6">
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

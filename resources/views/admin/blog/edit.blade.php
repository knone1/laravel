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
<div id="form-response"></div>
                <form method="POST" class="form-editor" id="form-editor" action="{{ route('blog.update', ['id'=>$posts->id]) }}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <h6 class="form-editor-heading">Blog Title</h6>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <input id="inputtitle" class="form-control" name="title" value="{{ Request::old('title') ? Request::old('title') : isset($posts) ? $posts->title : '' }}" name="title" required autofocus>

                        @if ($errors->has('title'))
                            <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <script src="{{ URL::asset('assets/ckeditor/ckeditor.js') }}"></script>
                    <textarea id="content" name="content"  class="ckeditor form-control" placeholder="Write your message.." value="{{ Request::old('content') ? Request::old('content') : isset($posts) ? $posts->content : '' }}">{{ Request::old('content') ? Request::old('content') : isset($posts) ? $posts->content : '' }}</textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'content',
                                {
                                })
                    </script>
                    <div class="container text-xs-center" style="padding: 20px 0;">
                        <button type="submit" class="btn btn-ml btn-primary text-xs-center">submit</button>
                        <input type="hidden" name="id" value="{{ $posts->id }}">
                    </div>
                </form>
          <!-- /.box -->
              <!-- /input-group -->
            </div>
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

    <script type="text/javascript">
                jQuery( document ).ready( function() {
                    $('#form-editor').on('submit', function(event){
                        event.preventDefault();
                        var _token = $('input[name=_token]').val();
                        var title = $('input[name=title]').val();
                        var content = $('textarea[name=content]').val();
                        var id = $('input[name=id]').val();
                        var _method = $('input[name=_method]').val();
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            dataType: 'json',
                            data: { _method: _method, _token: _token, title: title, content: content, id: id },
                            success: function( data ) {
                                $("#form-response").html('<div class="alert alert-success text-center">' + data.status + '</div>')
                                setTimeout(function () {
                                    $('#form-response').fadeOut();
                                }, 3000);
                                console.log('Submitted Data:\n' + data);
                            }
                    });
                        return false;
                    });
                });
            </script>

@endsection
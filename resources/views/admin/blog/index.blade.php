@extends('admin.includes.layout')

@section('title', 'Admin Panel')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="row">
        <div class="col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Visit</th>
                  <th style="width: 40px">Edit</th>
                  <th style="width: 40px">Remove</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->id }}.</td>
                  <td>{{ $post->title }}</td>
                  <td>
                    <span class="badge bg-red"><a href="{{ route('blog.edit', ['id'=>$post->id]) }}">visit</a></span>
                  </td>
                  <td><span class="badge bg-red"><a href="{{ route('blog.edit', ['id'=>$post->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></span></td>
                  <td>
                  <form id="form-{{$post->id}}" class="review-delete" method="POST" action="{{ route('blog.destroy', ['id'=>$post->id]) }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input name="_method" type="hidden" value="DELETE">
                    <button id="deletes" type="submit" class="btn btn-primary btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                    <input type="hidden" name="id" value="{{ $post->id }}">
                  </form>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-4">
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
    $(document).ready(function() {
    $('form.review-delete').on('click', function(event) {
        // disable behaviour default dari tombol submit
        event.preventDefault();
        // hapus data buku dengan ajax
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            dataType: 'json',
            data: {
                _method : 'DELETE',
                _token : $('input[name=_token]').val(),
                id : $('input[name=id]').val()
            },
            success: function( data ) {
                $('#form-'+data.id).closest('tr').fadeOut(300, function() {$(this).remove()});
                $("#form-response").html('<div class="alert alert-success text-center">' + data.status + '</div>')
                                setTimeout(function () {
                                    $('#form-response').fadeOut();
                                }, 3000);
            }
        });
        return false;
    });
    });
            </script>

@endsection
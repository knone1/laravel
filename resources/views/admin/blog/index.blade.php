@extends('layouts.app')

@section('title', 'Register')

@section('meta_tag')

@endsection

@section('content')

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">CSS3 Animation</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Tabs & Accordions</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">FontAwesome</a></li>
                    <li><a href="#">Slider</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Widgets</a></li>
                    <li><a href="#">Bootstrap Model</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Blog Setting <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li><a href="{{ route('blog.create') }}">Create Post</a></li>
                  <li><a href="{{ route('blog.index') }}">Posts list</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>New New 1</li>
                  <li>New New 2</li>
                  <li>New New 3</li>
                </ul>


                 <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>
     </div>
</div>
        </div>

        <div class="col-md-9" style="padding-left:270px;">
          <h5>Section title</h5>
                                    
<div id="form-response"></div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Index</th>
                  <th>Title</th>
                  <th>View</th>
                  <th>Remove</th>
                  <th>Edit</th>
                </tr>
              </thead>
    @foreach($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td><a  class="btn btn-primary btn-sm " href="" role="button">visit</a> </td>
                  <td>
  <form id="form-{{$post->id}}" class="review-delete" method="POST" action="{{ route('blog.destroy', ['id'=>$post->id]) }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="_method" type="hidden" value="DELETE">
     <button id="deletes" type="submit" class="btn btn-primary btn-sm" >x</button>
        <input type="hidden" name="id" value="{{ $post->id }}">
  </form>
                </td>
                  <td><a href="{{ route('blog.edit', ['id'=>$post->id]) }}">Edit</a> </td>
                </tr>
    @endforeach
            </table>

            <div class="text-xs-center">
              
              {{ $posts->links() }}

            </div>
            
          </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <b>Publish</b>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                            Publish<br/>
                            Publish<br/>
                        </p>
                        <a href="#" class="btn btn-primary text-xs-right">Trash</a>
                    </div>
                </div>

                    <form id="catForm" class="form-signin" method="POST" action="">
                    {{ csrf_field() }}
                    <div class="input-group {{ $errors->has('title') ? ' has-error' : '' }}"">
                    @if ($errors->has('title'))
                            <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                      <input id="catTitle" name="title" type="text" class="form-control" placeholder="name category..." value="title" required autofocus>
                      <span class="input-group-btn">
                        <button id="catBut" class="btn btn-secondary" type="submit">save</button>
                      </span>
                    </div>
                    </form>

                    <div class="card">
                    <div class="card-header">
                        <b>Category</b>
                    </div>
                    <div class="card-block">

                        <p class="card-text">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true"><b>Category</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"><b>Tags</b></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab" style="padding: 5px;">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        Blog Mu
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <p>Food truck fixie locavore, </p>
                            </div>
                        </div>
                        </p>
                        <a href="#" class="btn btn-primary text-xs-right">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
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
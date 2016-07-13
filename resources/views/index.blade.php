@extends('layouts.app')

@section('title', 'Register')

@section('meta_tag')

@endsection

@section('content')

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-7 offset-md-1">
		  <div class="col-md-12">
		  @foreach ($lists as $list)
		  <div class="col-md-6">
			  <div class="card">
			  <a href="">
				  <img  data-original="http://i.imgur.com/bsCPi0f.jpg" class="lazy" width="240" height="152">
				  </a>
				  <div class="card-block">
					  <h5 class="card-title">
					  <a href=""> {{ $list->title }}</a>
					  </h5>
					  <p class="card-text">
					  	{{ str_limit($list->content, $limit = 80, $end = ' ...') }}
					  </p>
					  <div class="col-md-6">
						  <small class="text-muted">
						  	{{ $list->created_at }}
						  </small>
					  </div>
					  <div class="col-md-6 text-xs-right">
						  <a href="#" ><i class="fa fa-twitter text-danger fa-lg" aria-hidden="true"></i></a>
						  <a href="#"><i class="fa fa-facebook-official text-fb fa-lg" aria-hidden="true"></i></a>
					  </div>
				  </div>
			  </div>
		  </div>
		  @endforeach
		</div>
      </div>
      <div class="col-md-3">
        <div class="card">
		  <div class="card-block card-inverse card-ios">
		    <h6 class="card-text">Latest Post</h6>
		  </div>
		  <div class="card-block">
		  @foreach ($recents as $recent)
		    <p class="card-text">
		    <img src="" width="30px" height="30px">&ensp;<span class="caret "></span>{{ $recent->title}}<br/>
		    <small class="text-muted">{{ $recent->created_at }}</small>
		    </p>
		    <hr/>
		   @endforeach
		  </div>
		</div>
        <div class="card">
		  <div class="card-block card-inverse card-ios">
		    <h6 class="card-text">Popular Post</h6>
		  </div>
		  <div class="card-block">
		    <p class="card-text">
		    <img src="" width="30px" height="30px">&ensp;<span class="caret "></span>Title of blog<br/>
		    <small class="text-muted">12/12/12 12:00</small>
		    </p>
		    <hr/>
		    <p class="card-text">
		    <img src="" width="30px" height="30px">&ensp;<span class="caret "></span>Title of blog<br/>
		    <small class="text-muted">12/12/12 12:00</small>
		    </p>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js_assets')
@parent

@endsection
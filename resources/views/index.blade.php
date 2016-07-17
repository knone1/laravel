@extends('layouts.app')

@section('title', 'Home Page')

@section('meta_tag')

@endsection

@section('content')
      	<div class="col-md-7 offset-md-1">
		  <div class="col-md-12">
		  @foreach ($lists as $list)
		  <div class="col-md-6">
			  <div class="card">
			  <a href="">
				  <img data-original="http://i.imgur.com/bsCPi0f.jpg" class="lazy" width="240" height="152">
				  </a>
				  <div class="card-block">
					  <h5 class="card-title">
					  <a href="{{ route('blog-post', ['title'=>$list->scopeTitle($list->title)]) }}"> {{ $list->title }}</a>
					  </h5>
					  <p class="card-text">
					  	{!! str_limit($list->content, $limit = 80, $end = ' ...') !!}
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
    @include('includes.sidebar')
@endsection


@section('js_assets')
@parent

@endsection
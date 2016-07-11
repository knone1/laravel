@extends('layouts.app')

@section('title', 'Register')

@section('meta_tag')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-5  offset-md-3" style="padding-top: 100px;">
            
                <div class="card">
                <div class="card-header">Login</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                    <div class="col-md-10 offset-md-1">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="inputPassword">Username</label>

                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>
                    <div class="col-md-10 offset-md-1">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="inputPassword" >Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 offset-md-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7  offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                            </div>
                        </div>

                            <div class="col-md-7  offset-md-1">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                    </form>
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
@extends('layouts.app')

@section('title', 'Register')

@section('meta_tag')

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4  offset-md-4" style="padding-top: 50px;">
            
                <div class="card">
                <div class="card-header">Sign up</div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
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
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="inputemail">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="col-md-10 offset-md-1">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="inputPassword">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>

                    <div class="col-md-10 offset-md-1">
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm">Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7  offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                            </div>
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
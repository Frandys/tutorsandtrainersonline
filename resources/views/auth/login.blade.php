@extends('layouts.dashboard')
@section('section')
    <section class="inner-page-title">
        <h2>Login</h2>
    </section>
    <section id="login" class="form-page">
        <div class="container">
            <div class="form-wrap">
            @include('message.message')
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>


                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class=" control-label">Password</label>


                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif

                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="button-wrap">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </section>

@stop

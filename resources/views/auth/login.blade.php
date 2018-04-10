@extends('layouts.app')

@section('content')
<div class="container">

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">

                <div class="sign-in-htm">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="label">E-Mail Address</label>
                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label">Password</label>
                            <input id="password" type="password" class="input" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked name="remember" {{ old('remember') ? 'checked' : '' }}>
                                   <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>


                        <div class="group">
                            <!--                                <button type="submit" class="btn btn-primary">
                                                                Login
                                                            </button>-->
                            <button type="submit" class="button">SIGN IN</button>
                        </div>

                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
                <!--			<div class="sign-up-htm">
                                                <div class="group">
                                                        <label for="user" class="label">Username</label>
                                                        <input id="user" type="text" class="input">
                                                </div>
                                                <div class="group">
                                                        <label for="pass" class="label">Password</label>
                                                        <input id="pass" type="password" class="input" data-type="password">
                                                </div>
                                                <div class="group">
                                                        <label for="pass" class="label">Repeat Password</label>
                                                        <input id="pass" type="password" class="input" data-type="password">
                                                </div>
                                                <div class="group">
                                                        <label for="pass" class="label">Email Address</label>
                                                        <input id="pass" type="text" class="input">
                                                </div>
                                                <div class="group">
                                                        <input type="submit" class="button" value="Sign Up">
                                                </div>
                                                <div class="hr"></div>
                                                <div class="foot-lnk">
                                                        <label for="tab-1">Already Member?</a>
                                                        
                                                </div>
                                        </div>-->
            </div>
        </div>
    </div>







    <!--    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
    
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                           
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
    
    -->                        
    <!--<div class="form-group">-->
    <!--                            <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
    
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>-->
    <!--
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>-->
    <!--</div>-->
    @endsection
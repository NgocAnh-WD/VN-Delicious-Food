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
                            <label for="email" class="label" >E-Mail Address</label>
                            <input id="email" type="email" placeholder="Your Email" class="input" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label" >Password</label>
                            <input id="password" type="password" placeholder="Your Password" class="input" name="password" required>

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
                            <button type="submit" class="button" style="text-align: center">SIGN IN</button>
                        </div>

                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
                
                
                
                <div class="sign-up-htm">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="label" >Name</label>
                            <input id="name" type="text" class="input" placeholder="Your Name" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="label" >E-Mail Address</label>

                            <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" placeholder="Your Email" required>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="label" >Password</label>
                            <input id="password" type="password" class="input" name="password" placeholder="Your Password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group">
                            <label for="password-confirm" class="label" >Confirm Password</label>
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <div class="group">
                            <label for="gender" class="label">Gender</label>

                            <select id="gender" class="input" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group">
                            <label for="birth" class="label">Birthday</label>
                            <input id="date" type="date" class="input" name="date" placeholder="Input number" required>
                        </div>

                        <div class="group">
                            <label for="phone" class="label">Phone</label>
                            <input id="phone" type="number" class="input" name="phone" placeholder="Your Phone" value="{{ old('phone') }}">
                        </div>

                        <div class="group">
                            <label for="address" class="label">Address</label>
                            <input id="address" type="text" class="input" name="address" placeholder="Your Address" required>
                        </div>

                        <div class="group">
                            <div class="label">is_Active</div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="is_active">  Active
                                </label>
                            </div>
                        </div>
                        
<!--                        <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>-->
                        
                        <div class="group">
                            <input type="submit" style="text-align: center" class="button" value="Sign Up">
                        </div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</label>
                        </div>
                    </form>
                </div>
        </div>
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
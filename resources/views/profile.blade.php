<html lang="en">
    <head>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/ace.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/ace-skins.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/ace-rtl.min.css')}}" />
    </head>
    <body>
        <div class="container">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        User Profile Page
                        <div class="space-4"></div>
                        <small>                 
                            @if(Session::has('update_profile'))
                            <p class="bg-danger">{{session('update_profile') }}</p>
                            @endif
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="hr dotted"></div>

                        <div>
                            <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype='multipart/form-data'>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <div id="user-profile-1" class="user-profile row">
                                    <div class="col-xs-12 col-sm-3 center">
                                        <div>
                                            <span class="profile-picture">
                                                <img src="{{ Auth::user()->avata_image }}" height="300" alt="" class="img-responsive img-rounded">
                                            </span>

                                            <div class="space-4"></div>

                                            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                <div class="inline position-relative">
                                                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                        <i class="ace-icon fa fa-circle light-green"></i>
                                                        &nbsp;
                                                        <span class="white">{{ Auth::user()->username }} </span>
                                                    </a>                                 
                                                </div>

                                            </div>
                                            <div class="space-4"></div>
                                            <div class="profile-info-row {{ $errors->has('avata_image') ? 'has-error' : '' }}">                                 
                                                <input type="file" id="photo_id" name="avata_image" class="form-control" value=" ">
                                                <span class="text-danger">{{ $errors->first('avata_image') }}</span>
                                            </div>
                                        </div>
                                        <div class="space-6"></div>

                                        <div class="hr hr12 dotted"></div>

                                        <div class="hr hr16 dotted"></div>
                                    </div>

                                    <div class="col-xs-12 col-sm-9">
                                        <div class="space-12"></div>
                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row {{ $errors->has('username') ? 'has-error' : '' }}">
                                                <div class="profile-info-name"> Username </div>
                                                <input type="text" id="username" name="name" class="form-control" placeholder="Enter user name" value="{{ Auth::user()->username }} ">
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('email') ? 'has-error' : '' }}">
                                                <div class="profile-info-name"> Email </div>
                                                <input type="text" id="email" name="email" class="form-control" value="{{ Auth::user()->email }} ">
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('password') ? 'has-error' : '' }}" >
                                                <div class="profile-info-name">Old password </div>
                                                <input type="password" id="old_password" name="old_password" class="form-control" value="">
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('password') ? 'has-error' : '' }}" >
                                                <div class="profile-info-name">New password </div>
                                                <input type="password" id="password" name="password" class="form-control" value="">
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('password') ? 'has-error' : '' }}" >
                                                <div class="profile-info-name">Password-confirm</div>
                                                <input type="password" id="repassword" name="repassword" class="form-control" value="">
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('address') ? 'has-error' : '' }}">
                                                <div class="profile-info-name"> Address </div>
                                                <input type="text" id="address" name="address" class="form-control" placeholder="" value="{{ Auth::user()->address }}">
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('date') ? 'has-error' : '' }}">
                                                <div class="profile-info-name"> DOB </div>
                                                <input id="date" type="date" class="form-control" name="date" placeholder="" value="{{ Auth::user()->date_of_birth }}">
                                                <span class="text-danger">{{ $errors->first('date') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('gender') ? 'has-error' : '' }}">
                                                <div class="profile-info-name"> Gender </div>
                                                <select id="gender" class="form-control" name="gender">
                                                    <option hidden="" value="{{Auth::user()->gender}}">{{Auth::user()->gender}}</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                            </div>

                                            <div class="profile-info-row {{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <div class="profile-info-name"> Phone </div>
                                                <input id="phone" type="number" class="form-control" name="phone" placeholder="Your Phone" value="{{ Auth::user()->phone }}">
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            </div>
                                        </div>

                                        <div class="space-20"></div>
                                        <div class="hr hr2 hr-double"></div>

                                        <div class="space-6"></div>

                                        <div class="left">
                                            <div class="row  col-md-7 form-group">
                                                <input type="submit" class="btn btn-success" value="Save" />
                                                <input type="hidden" value="{{ Session::token() }}" name="_token">
                                            </div>
                                            
                                            <div class="right">
                                                <a class="btn bnt-link" href="{{ url('/home') }}">
                                                    Back home
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@extends('layouts.index')
@section('container')
<div class="container">
    <div class="page-content">
        <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
            </div>

            <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                    <div class="ace-settings-item">
                        <div class="pull-left">
                            <select id="skin-colorpicker" class="hide">
                                <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                            </select>
                        </div>
                        <span>&nbsp; Choose Skin</span>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                        <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                        <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                        <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                        <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                        <label class="lbl" for="ace-settings-add-container">
                            Inside
                            <b>.container</b>
                        </label>
                    </div>
                </div><!-- /.pull-left -->

                <div class="pull-left width-50">
                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                        <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                        <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                    </div>

                    <div class="ace-settings-item">
                        <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                        <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                    </div>
                </div>
            </div>
        </div>

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
                                <div class="profile-contact-info">
                                    <div class="profile-contact-links align-left">
                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>

                                        </a>

                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-envelope bigger-120 pink"></i>

                                        </a>

                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-globe bigger-125 blue"></i>

                                        </a>
                                    </div>

                                    <div class="space-6"></div>            
                                </div>

                                <div class="hr hr12 dotted"></div>

                                <div class="clearfix">
                                    <div class="grid2">
                                        <span class="bigger-175 blue"></span>

                                        <br />

                                    </div>

                                    <div class="grid2">
                                        <span class="bigger-175 blue"></span>

                                        <br />

                                    </div>
                                </div>

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
                                        <input type="text" id="username" name="email" class="form-control" value="{{ Auth::user()->email }} ">
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>

                                    <div class="profile-info-row {{ $errors->has('password') ? 'has-error' : '' }}" >
                                        <div class="profile-info-name">Old password </div>
                                        <input type="password" id="password" name="password" class="form-control" value="">
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>

                                    <div class="profile-info-row {{ $errors->has('password') ? 'has-error' : '' }}" >
                                        <div class="profile-info-name">New password </div>
                                        <input type="password" id="password" name="password" class="form-control" value="">
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

                                <div class="center">
                                    <div class="row  col-md-7 form-group">
                                        <input type="submit" class="btn btn-success" value="Save" />
                                    </div>
                                   <div class="row  col-md-5 form-group">
                                        <input type="submit" class="btn btn-success" value="Cancle" />
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
@stop
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../images/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../images/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Food Store</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS     -->
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
        <!--  Material Dashboard CSS    -->
        <link href="{{asset('css/material-dashboard.css?v=1.2.0')}}" rel="stylesheet" />
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="../images/img/sidebar-1.jpg">         
                <div class="logo">
                    <a href="{{ url('/home') }}" class="simple-text">
                        Home
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('admin/products') }}">
                                <i class="material-icons">dashboard</i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/users') }}">
                                <i class="material-icons">person</i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ url('admin/categories') }}">
                                <i class="material-icons">content_paste</i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/images') }}">
                                <i class="material-icons">dashboard</i>
                                <p>Images</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/orders') }}">
                                <i class="material-icons">bubble_chart</i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/comments') }}">
                                <i class="material-icons">library_books</i>
                                <p>Comments</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/slides') }}">
                                <i class="material-icons text-gray">notifications</i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="active-pro">
                           <a href="{{ url('admin/slides') }}">
                                <i class="material-icons">location_on</i>
                                <p>Maps</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="slidebar-background" style="background-image: url(../images/img/sidebar-1.jpg) ">
                    
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"> Table List </a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">dashboard</i>
                                        <p class="hidden-lg hidden-md">Dashboard</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">notifications</i>
                                        <span class="notification">5</span>
                                        <p class="hidden-lg hidden-md">Notifications</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Mike John responded to your email</a>
                                        </li>
                                        <li>
                                            <a href="#">You have 5 new tasks</a>
                                        </li>
                                        <li>
                                            <a href="#">You're now friend with Andrew</a>
                                        </li>
                                        <li>
                                            <a href="#">Another Notification</a>
                                        </li>
                                        <li>
                                            <a href="#">Another One</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">person</i>
                                        <p class="hidden-lg hidden-md">Profile</p>
                                    </a>
                                </li>
                            </ul>
                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group  is-empty">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="material-input"></span>
                                </div>
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </div>
                </footer>
            </div>
        </div>
    </body>
    <!--   Core JS Files   -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/material.min.js')}}material.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="{{asset('js/chartist.min.js')}}"></script>
    <!--  Dynamic Elements plugin -->
    <script src="{{asset('js/arrive.min.js')}}"></script>
    <!--  PerfectScrollbar Library -->
    <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('js/arrive.min.js')}}bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="{{asset('js/material-dashboard.js?v=1.2.0')}}"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('js/demo.js')}}"></script>

</html>

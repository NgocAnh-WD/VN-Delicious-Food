
<html lang="en">
    <head>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
        <link rel="stylesheet" href="{{asset('css/ace-skins.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/ace-rtl.min.css')}}" />
        <link rel="shortcut icon" href="images/img/food.png">
    </head>
    <body>
        <div class="space-24"></div>
        <div class="container">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        View Your Orders
                        <div class="space-12"></div>  
                        <small>                 
                            @if(Session::has('deleted_order'))
                            {{session('deleted_order')}}
                            @endif
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="hr dotted"></div>

                        <div>

                            <div id="user-profile-1" class="user-profile row">
                                <div class="col-xs-12 col-sm-3 center">
                                    <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype='multipart/form-data'>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="PUT">
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
                                                    <div class="space-8"></div>

                                                    <div class="left">
                                                        <div class="row  col-md-7 form-group center">
                                                            <div class="foot-lnk">
                                                                <a class="btn btn-link" href="{{ url('/home') }}">
                                                                    Back home
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-4"></div>
                                        </div>
                                        <div class="space-6"></div>

                                        <div class="hr hr12 dotted"></div>
                                        <div class="hr hr16 dotted"></div>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="space-12"></div>
                                    <table class="table"> 
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Order_date</th>
                                                <th>Customer</th>
                                                <th>Shipped_date</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->order_date}}</td>
                                                <td><a href="{{url('vieworders/'. $order->id.'/edit') }}">{{$order->full_name ? $order->full_name : 'Unname'}}</a></td>
                                                <td>{{$order->shipped_date}}</td>
                                                <td>Đang chờ giao</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    <form class="delete" id="delete" action="{{ route('vieworders.destroy', $order->id)}}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                        <input type="submit" class="btn btn-danger" value="Hủy hóa đơn">
                                                    </form>
                                                    <span><small>                 
                                                            @if(Session::has('undeleted_order'))
                                                            {{session('undeleted_order')}}
                                                            @endif
                                                        </small></span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="space-6"></div>

                                    <div class="row">
                                        <div class="col-lg-6 col-sm-offset-5">
                                            {{ $orders->render() }}
                                        </div>

                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
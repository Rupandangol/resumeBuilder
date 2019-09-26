@include('Frontend.layouts.header')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b>V</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CV</b> Generator</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{URL::to('/Uploads/genderImage/usermale.jpg')}}" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">
                                {{ucfirst(Auth::guard('admin')->user()->username)}}
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{URL::to('/Uploads/genderImage/usermale.jpg')}}" class="img-circle"
                                     alt="User Image">

                                <p>
                                    {{Auth::guard('admin')->user()->username}}
                                    <small>Member
                                        since {{\Carbon\Carbon::parse(Auth::guard('admin')->user()->created_at)->diffForHumans()}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('logoutAdmin')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{URL::to('/Uploads/genderImage/usermale.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ucfirst(Auth::guard('admin')->user()->username)}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                {{--admin--}}
                @if(Auth::guard('admin')->user()->privileges==='Super Admin')
                    <li class="treeview {{$admin_active??''}}">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Admin</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{$admin_active1??''}}"><a
                                        href="{{route('addAdmin')}}"><i class="fa fa-circle-o"></i> Add Admin</a></li>
                            <li class="{{$admin_active2??''}}"><a href="{{route('manageAdmin')}}"><i class="fa fa-circle-o"></i> Manage
                                    Admin</a></li>
                        </ul>
                    </li>
                @endif
                {{--end of admin--}}
                {{--Dashboard--}}
                <li class="treeview {{$dash_active??''}}">
                    <a href="#">
                        <i class="fa fa-tachometer-alt fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu ">
                        <li class="{{$dash_active??''}}"><a href="{{route('admin-dashboard')}}"><i class="fa fa-circle-o"></i> Visualization</a></li>
                    </ul>
                </li>
                {{--Dashboard--}}

                {{--database--}}

                <li class="treeview {{$data_active??''}}">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Data Recorded</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=" {{$data_active2??''}}"><a href="{{route('fullData')}}"><i class="fa fa-circle-o"></i> Full Data</a></li>
                        <li class=" {{$data_active1??''}}"><a href="{{route('viewInfo')}}"><i class="fa fa-circle-o"></i> Updater</a></li>

                    </ul>
                </li>

                {{--end of database--}}

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>@yield('heading')</h1>
        </section>

        <!-- Main content -->
        <section style="overflow: scroll" class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
        <strong>Copyright &copy; 2019 <a href="https://talentconnects.com.np/index.php">Talent Connects</a>.</strong>
        All rights
        reserved.
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


@include('Frontend.layouts.footer')
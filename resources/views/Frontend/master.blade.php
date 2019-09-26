@include('Frontend.layouts.header')
<style type="text/css">
    .headSticky {
        position: fixed;
        top: 0;
        width: 100%;
    }

    .dropdown-lg-show {
        display: block !important;
    }

    .dropdown-lg-hide {
        display: none !important;
    }

    .dropdown1 span {
        margin-top: 50px !important;
    }

    .dropdown1 {
        position: relative;
        display: inline-block;
    }

    .dropdown1-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        z-index: 1;
    }

    .logo-nav {
        position: absolute;
        right: 10px;
        padding-top: 15px;
        color: white;
    }

    .custom-dropdown {
        padding-left: 5px;
        border-bottom: 1px solid lightgrey;
        min-width: 160px;
    }

    .custom-dropdown:hover {
        font-weight: bold;

    }

    @media (max-width: 1200px) {
        .dropdown-lg-show {
            display: none !important;
        }

        .dropdown-lg-hide {
            display: block !important;
        }
    }

    .nav-xs-logo-hide {
        display: block;
    }

    .nav-xs-logo {
        display: none;
    }

    @media (max-width: 768px) {
        .logo-nav {
            margin-top: -57px !important;
        }

        .nav-xs-logo-hide {
            display: none;
        }

        .nav-xs-logo {
            display: block;
        }

        .navbar-header {
            height: 40px;
        }
    }


</style>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header headSticky">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div style="position: relative;width: 100%;" class="navbar-header">
                    <a href="{{route('dashboard')}}" class="navbar-brand nav-xs-logo-hide"><b>CV</b> Generator</a>
                    <a href="{{route('dashboard')}}" class="navbar-brand nav-xs-logo"><b>CV</b></a>
                {{--<a href="{{route('flushSession')}}" class="btn btn-success">make new CV</a>--}}
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse pull-left" id="navbar-collapse">
                        @if($hide==='1')
                            <ul class="nav navbar-nav">
                                <li class="dropdown-lg-show {{$detail_active??''}}"><a
                                            href="{{route('page1')}}">Details<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="dropdown-lg-show {{$profile_active??''}}"><a
                                            href="{{route('page2')}}">Profile</a></li>
                                <li class="dropdown-lg-show {{$education_active??''}}"><a href="{{route('page4')}}">Education</a>
                                </li>
                                <li class="dropdown-lg-show {{$experience_active??''}}"><a href="{{route('page5')}}">Experience</a>
                                </li>
                                <li class="dropdown-lg-show {{$training_active??''}}"><a
                                            href="{{route('page8')}}">Training</a></li>
                                <li class="dropdown-lg-show {{$skill_active??''}}"><a
                                            href="{{route('page3')}}">Skill</a>
                                </li>
                                <li class="dropdown-lg-show {{$achievement_active??''}}"><a href="{{route('page9')}}">Achievement</a>
                                </li>
                                <li class="dropdown-lg-show {{$reference_active??''}}"><a href="{{route('page6')}}">Reference</a>
                                </li>
                                <li class="dropdown-lg-show {{$template_active??''}}"><a
                                            href="{{route('page7')}}">Template</a></li>

                                {{--<div class="dropdown">--}}
                                {{--<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example--}}
                                {{--<span class="caret"></span></button>--}}
                                {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">HTML</a></li>--}}
                                {{--<li><a href="#">CSS</a></li>--}}
                                {{--<li><a href="#">JavaScript</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                <li style="margin-left: 50px" class="dropdown1 dropdown-lg-hide" id="dropdown1">
                                    {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
                                    {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    <a> <i class="fa fa-list"></i>
                                    </a>
                                    {{--</a>--}}
                                    <div class="dropdown1-content" id="dropdown1-content"
                                         aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item custom-dropdown"
                                           href="{{route('page1')}}">Details</a><br>
                                        <a class="dropdown-item custom-dropdown"
                                           href="{{route('page2')}}">Profile</a><br>
                                        <a class="dropdown-item custom-dropdown" href="{{route('page4')}}">Education</a><br>
                                        <a class="dropdown-item custom-dropdown"
                                           href="{{route('page5')}}">Experience</a><br>
                                        <a class="dropdown-item custom-dropdown"
                                           href="{{route('page8')}}">Training</a><br>
                                        <a class="dropdown-item custom-dropdown" href="{{route('page3')}}">Skill</a><br>
                                        <a class="dropdown-item custom-dropdown"
                                           href="{{route('page9')}}">Achievement</a><br>
                                        <a class="dropdown-item custom-dropdown" href="{{route('page6')}}">Reference</a><br>
                                    </div>
                                </li>

                            </ul>
                        @endif
                        <a class="logo-nav" href="https://talentconnects.com.np/index.php">
                            <img style="height: 25px;" src="{{URL::to('/Uploads/logo/logo-07.png')}}" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Talent
                            <b>Connects</b></a>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>


            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div style="background-image: url('/Uploads/background/1.png');background-size: cover" class="content-wrapper">
        @yield('progressBar')
        <div class="container">
            <!-- Content Header (Page header) -->
            <div class="headTitle">
                @yield('contentHeader')
            </div>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

    {{--<footer   class="main-footer">--}}
    {{--<div class="container">--}}
    {{--<strong>Copyright &copy; 2019 <a href="">Talent Connect</a>.</strong> All rights--}}
    {{--reserved.--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
    {{--</footer>--}}
</div>
<div style="text-align: center;margin-top: 10px;margin-right: 10px">
    <strong>Copyright &copy; 2019 <a href="">Talent Connects</a>.</strong> All rights reserved
</div>
<script>
    var drop = document.getElementById('dropdown1');
    drop.onclick = function () {
        var dropcontent = document.getElementById('dropdown1-content');
        var checkdrop = dropcontent.style.display;
        if (checkdrop == '')
            dropcontent.style.display = 'block';
        else
            dropcontent.style.display = '';
    }
</script>
@include('Frontend.layouts.footer')
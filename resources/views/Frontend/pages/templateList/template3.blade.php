@extends('Frontend.master')


@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:100%;background-color:#3F51B5">100% Complete
        </div>
    </div>
@endsection

@section('my-header')
    <link rel="stylesheet" href="{{URL::to('css/templateCss.css')}}">
@endsection
@section('contentHeader')
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew">Generator</b></h2>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 style="color: white;">Template 2</h2>
                        <br>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="product-image">
                                    <img class="template-image" src="{{URL::to('/Uploads/resumeTemplate/2.7.png')}}"
                                         alt="...">
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                                <h3 style="color: white;" class="prod_title">Sample <b>2</b></h3>

                                <p style="color: white;">Land your dream job by using this creative resume template which will make your application stand out.</p>
                                <br>
                                <div>
                                    <div class="row">
                                        <a href="{{route('preview3')}}" class="btn btn-default btn-lg col-md-4">Preview
                                            Your
                                            CV</a>

                                        <a style="margin-left: 5px" href="{{route('downloadCv4')}}"
                                           class="btn btn-default btn-lg col-md-4">Download</a>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <a href="{{route('page7')}}" class="btn btn-default btn-lg">Try another
                                            Template</a>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <a href="{{route('createNew')}}" class="btn btn-default btn-lg">Create New
                                            Cv</a>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-default btn-lg dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-expanded="false">
                                                Form Edit <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('page1')}}">Personal Detail</a></li>
                                                <li><a href="{{route('page2')}}">Personal Profile</a></li>
                                                <li><a href="{{route('page4')}}">Education</a></li>
                                                <li><a href="{{route('page5')}}">Experience</a></li>
                                                <li><a href="{{route('page8')}}">Training</a></li>
                                                <li><a href="{{route('page3')}}">Skills</a></li>
                                                <li><a href="{{route('page9')}}">Achievement</a></li>
                                                <li><a href="{{route('page6')}}">Reference</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
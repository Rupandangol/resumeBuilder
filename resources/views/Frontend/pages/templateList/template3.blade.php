@extends('Frontend.master')


@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:100%;background-color:#3F51B5">
        </div>
    </div>
@endsection

@section('my-header')
    <link rel="stylesheet" href="{{URL::to('css/templateCss.css')}}">
@endsection
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Template 3</h2>
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

                                <h3 class="prod_title">Basic Template Design</h3>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, asperiores,
                                    autem
                                    consectetur cum debitis deleniti eaque excepturi facilis illo maiores maxime minima
                                    molestiae nisi nobis officiis omnis qui tempore voluptatibus?</p>
                                <br>

                                <div class="row">
                                    <a href="{{route('preview3')}}" class="btn btn-default btn-lg col-md-4">Preview Your
                                        CV</a>

                                    <a style="margin-left: 10px" href="{{route('downloadCv4')}}"
                                       class="btn btn-default btn-lg col-md-4">Download</a>

                                </div>

                                <br>
                                <a href="{{route('page7')}}" class="btn btn-default btn-lg ">Try another Template</a>&nbsp;&nbsp;&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn bg-default btn-lg dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        Form Edit <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('page1')}}">Personal Detail</a></li>
                                        <li><a href="{{route('page2')}}">Personal Profile</a></li>
                                        <li><a href="{{route('page3')}}">Skill</a></li>
                                        <li><a href="{{route('page4')}}">Education</a></li>
                                        <li><a href="{{route('page5')}}">Experience</a></li>
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
@endsection
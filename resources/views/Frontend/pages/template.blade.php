@extends('Frontend.master')
@section('my-header')
    <link rel="stylesheet" href="{{URL::to('css/templateCss.css')}}">
@endsection
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="container">
        {{--dropdown--}}

            <div class="btn-group pull-right">

                <div class="btn-group">
                    <button style="border-radius: 20px" type="button" class="btn bg-purple btn-flat dropdown-toggle" data-toggle="dropdown"
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
        <br><br>

        {{--end of dropdown--}}
        <div class="row">
            <div class="template_image col-md-4">
                <a href="{{route('template1View')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/1.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
            <div class="template_image col-md-4">
                <a href="{{route('template2View')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/2.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
            <div class="template_image col-md-4">
                <a href="{{route('template3View')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/4.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
        </div>
    </div>
@endsection
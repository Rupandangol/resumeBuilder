@extends('Frontend.master')


@section('progressBar')
    <div id="myProgressBar" class="progress" style="background-color: #2c3b41;position: sticky;top:50px; width: 100%;z-index: 20">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:87%;background-color:#3F51B5">6th Step Done
        </div>
    </div>
@endsection


@section('my-header')
    <link rel="stylesheet" href="{{URL::to('css/templateCss.css')}}">
@endsection
@section('contentHeader')
    <br><br><br><h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="container">
        {{--dropdown--}}

        <div class="btn-group pull-right">

            <div class="btn-group">
                <button style="border-radius: 20px" type="button" class="btn bg-purple btn-flat dropdown-toggle"
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
        <br><br>

        {{--end of dropdown--}}
        <div class="row">
            <div class="template_image col-md-4">
                <a style="cursor: pointer" class="myTemplate" data-href="{{route('template1View')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/1.8.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
            {{--<div class="template_image col-md-4">--}}
                {{--<a class="myTemplate"  data-href="{{route('template2View')}}"><img--}}
                            {{--id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/6.png')}}" alt=""></a>--}}
                {{--<p style="margin-left: 50px">Basic Template</p>--}}
            {{--</div>--}}
            <div class="template_image col-md-4">
                <a style="cursor: pointer" class="myTemplate"  data-href="{{route('template3View')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/2.7.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
        </div>
    </div>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $(".myTemplate").on('click',function (e) {
                e.preventDefault();
                $('#myInnerBar').css({'width': '100%'})
                var test=$(this).data('href');
                console.log(test);
                window.location.replace(test);
            })
        });
    </script>
@endsection
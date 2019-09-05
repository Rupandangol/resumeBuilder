@extends('Frontend.master')

@section('my-header')
    <style type="text/css">
        #talentLogoDash{
            width: 100%;
            max-width: 343px;
        }
    </style>
@endsection
@section('contentHeader')
    <br><br><br><br>
    <div style="background-color: white; text-align: center;" class="jumbotron">
        <img id="talentLogoDash" src="{{URL::to('/Uploads/logo/talentConnectsFull.jpeg')}}" alt=""><br><br>

        <hr class="my-4">
        <br><br>
        <h1 style="text-align: center" class="display-4">CV <b>Generator</b></h1>
        <p>
            Impressive Resumes Made Easy! Get hired with the professional Resume Builder that will make you stand out of
            the crowd! Start Now!.
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg " href="{{route('createNew')}}" role="button">Create Your <b>CV</b></a>
        </p>
    </div>

    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-10">--}}
            {{--<div id="carouselExampleFade" class="carousel slide " data-interval="3000" data-ride="carousel">--}}
                {{--<div class="carousel-inner">--}}
                    {{--<div class="carousel-item active">--}}
                        {{--<img style="max-height:450px;overflow-y:hidden" src="{{URL::to("/Uploads/carosel/2.1.png")}}"--}}
                             {{--class="d-block w-100" alt="...">--}}
                    {{--</div>--}}
                    {{--<div class="carousel-item">--}}
                        {{--<img style="max-height:450px;overflow-y:hidden" src="{{URL::to('/Uploads/carosel/4.png')}}"--}}
                             {{--class="d-block w-100" alt="...">--}}
                    {{--</div>--}}
                    {{--<div class="carousel-item">--}}
                        {{--<img style="max-height:450px;overflow-y:hidden" src="{{URL::to('/Uploads/carosel/1.1.png')}}"--}}
                             {{--class="d-block w-100" alt="...">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">--}}
                    {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Previous</span>--}}
                {{--</a>--}}
                {{--<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">--}}
                    {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Next</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
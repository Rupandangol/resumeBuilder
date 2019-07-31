@extends('Frontend.master')

@section('my-header')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
@endsection
@section('contentHeader')
    <br><br>  <div class="jumbotron">
        <h1 style="text-align: center" class="display-4">CV <b>Builder</b></h1>
        <hr class="my-4">
        <p>Impressive Resumes Made Easy! Get hired with the professional Resume Builder that will make you stand out of
            the crowd! Start Now!.
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{url('/cvForm')}}" role="button">Build <b>CV</b></a>
        </p>
    </div>


    <div id="carouselExampleFade" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="width:200px;height:450px" src="{{URL::to("/Uploads/carosel/1.png")}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="width:200px;height:450px" src="{{URL::to('/Uploads/carosel/2.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="width:200px;height:450px" src="{{URL::to('/Uploads/carosel/3.1.png')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection
{{--@section('my-footer')--}}
    {{----}}
{{--@endsection--}}
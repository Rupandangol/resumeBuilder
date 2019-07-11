@extends('Frontend.master')


@section('contentHeader')
    <div class="jumbotron">
        <h1 style="text-align: center" class="display-4">CV <b>Builder</b></h1>
        <hr class="my-4">
        <p>Impressive Resumes Made Easy! Get hired with the professional Resume Builder that will make you stand out of the crowd! Start Now!.
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{url('/cvForm')}}" role="button">Build <b>CV</b></a>
        </p>
    </div>
@endsection
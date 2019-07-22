@extends('Frontend.master')
@section('my-header')
    <link rel="stylesheet" href="{{URL::to('css/templateCss.css')}}">
@endsection
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="container">
        <form method="post" action="{{route('updateReference',$id)}}">
            <input type="hidden" value="{{$id}}">
            <button class="btn btn-primary" type="submit">Back</button>
        </form>
        <br><br>
        <div class="row">
            <div class="template_image col-md-4">
                <a href="{{url('/cvForm/personalProfile/skill/'.$id.'/education/experience/reference/template/template1')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/1.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
            <div class="template_image col-md-4">
                <a href="{{url('/cvForm/personalProfile/skill/'.$id.'/education/experience/reference/template/template2')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/2.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
            <div class="template_image col-md-4">
                <a href="{{url('/cvForm/personalProfile/skill/'.$id.'/education/experience/reference/template/template3')}}"><img
                            id="templateImage" src="{{URL::to('/Uploads/resumeTemplate/3.png')}}" alt=""></a>
                <p style="margin-left: 50px">Basic Template</p>
            </div>
        </div>
    </div>
@endsection
@extends('Frontend.master')
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
                        <h2>Template 1</h2>
                        <br>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="product-image">
                                <img src="{{URL::to('/Uploads/resumeTemplate/1.png')}}" alt="...">
                            </div>

                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                            <h3 class="prod_title">Basic Template Design</h3>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, asperiores, autem
                                consectetur cum debitis deleniti eaque excepturi facilis illo maiores maxime minima
                                molestiae nisi nobis officiis omnis qui tempore voluptatibus?</p>
                            <br>

                            <div class="row">
                                <a href="{{route('preview1')}}" class="btn btn-default btn-lg col-md-4" >Preview Your Cv</a>
                                {{--<form class="col-md-4" method="post"--}}
                                      {{--action="">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<input type="hidden" name="id" value="{{$id}}">--}}
                                    {{--<button type="submit" class="btn btn-default btn-lg">Preview Your Cv</button>--}}
                                {{--</form>--}}
                                <form method="post" class="col-md-4"
                                      action="">
                                    {{csrf_field()}}
                                    {{--<input type="hidden" name="id" value="{{$id}}">--}}
                                    <button type="submit" class="btn btn-default btn-lg">Download</button>
                                </form>


                            </div>
                            <br>
                            <a href="{{route('page7')}}" class="btn btn-default btn-lg ">Try another Template</a>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
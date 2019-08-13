@extends('Frontend.master')


@section('my-header')
    <link rel="stylesheet" href="{{URL::to('/lib/iCheck/all.css')}}">
@endsection


@section('progressBar')
    <div id="myProgressBar" class="progress" style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:0%;background-color:#3F51B5">
        </div>
    </div>
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection


@section('content')
    <div class="box box-info">
        @if($errors->has('fullName')||$errors->has('email')||$errors->has('mobileNo')||$errors->has('address')||$errors->has('dateOfBirth'))
            <div class="alert alert-danger">
                <p>Do not leave empty box</p>
            </div>
        @endif
        {{--personal details--}}
        <form id="myDetail" action="{{url('/cvForm')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="box-body">
                {{--@if($detail)--}}
                <div class="box-header with-border">
                    <h3 class="box-title">Personal Details</h3>
                </div>
                <br>
                @if($detail)
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="fullName" value="{{ucfirst($detail->fullName)}}" class="form-control"
                               placeholder="Full Name">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" value="{{$detail->email}}" class="form-control"
                               placeholder="Email">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="number" name="mobileNo" value="{{$detail->mobileNo}}" class="form-control"
                               placeholder="Mobile Number">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text" name="website" class="form-control" value="{{$detail->website}}"
                               placeholder="LinkedIn Profile (Optional)">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-image"></i></span>
                        <input type="file" name="image" class="form-control" placeholder="your Image">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <input type="text" name="address" value="{{$detail->address}}" class="form-control"
                               placeholder="Current Address">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-birthday-cake"> &nbsp;Date of Birth(A.D)</i></span>
                        <input type="date" name="dateOfBirth" class="form-control" value="{{$detail->dateOfBirth}}" placeholder="Date of Birth">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-image">&nbsp;&nbsp;Recent Picture</i></span>
                        <input type="file" name="image" class="form-control" placeholder="your Image">
                    </div>
                    <br>
                    <div class="form-group">
                        <div style="margin-left: 20px">
                            <label>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                     style="position: relative;"><input type="radio" name="gender" value="male"
                                                                        @if($detail->gender==='male') checked @endif
                                                                        class="flat-red"
                                                                        style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                            </label>
                            <label>
                                Male
                            </label>
                            <label>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                     style="position: relative;"><input type="radio" name="gender" value="female"
                                                                        @if($detail->gender==='female') checked @endif
                                                                        class="flat-red"
                                                                        style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                            </label>
                            <label>
                                Female
                            </label>
                            <label>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                     style="position: relative;"><input type="radio" name="gender" value="others"
                                                                        @if($detail->gender==='others') checked @endif
                                                                        class="flat-red"
                                                                        style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper"
                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                            </label>
                            <label>
                                Others
                            </label>

                        </div>
                    </div>

                @else
                    {{----}}
                    {{----}}
                    {{--for old data--}}
                    @if(old('fullName'))
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="fullName" value="{{ucfirst(old('fullName')??'')}}" class="form-control"
                                   placeholder="Full Name">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" value="{{old('email')??''}}" class="form-control"
                                   placeholder="Email">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="number" name="mobileNo" value="{{old('mobileNo')??''}}" class="form-control"
                                   placeholder="Mobile Number">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <input type="text" name="website" class="form-control" value="{{old('website')??''}}"
                                   placeholder="LinkedIn Profile (Optional)">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-image"></i></span>
                            <input type="file" name="image" class="form-control" placeholder="your Image">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                            <input type="text" name="address" value="{{old('address')??''}}" class="form-control"
                                   placeholder="Current Address">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-birthday-cake"> &nbsp;Date of Birth(A.D)</i></span>
                            <input type="date" name="dateOfBirth" class="form-control" value="{{old('dateOfBirth')??''}}">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-image">&nbsp;&nbsp;Recent Picture</i></span>
                            <input type="file" name="image" class="form-control" placeholder="your Image">
                        </div>
                        <br>
                        <div class="form-group">
                            <div style="margin-left: 20px">
                                <label>
                                    <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                         style="position: relative;"><input type="radio" name="gender" value="male"
                                                                            @if(old('gender')==='male') checked @endif
                                                                            class="flat-red"
                                                                            style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label>
                                    Male
                                </label>
                                <label>
                                    <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                         style="position: relative;"><input type="radio" name="gender" value="female"
                                                                            @if(old('gender')==='female') checked @endif
                                                                            class="flat-red"
                                                                            style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label>
                                    Female
                                </label>
                                <label>
                                    <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                         style="position: relative;"><input type="radio" name="gender" value="others"
                                                                            @if(old('gender')==='others') checked @endif
                                                                            class="flat-red"
                                                                            style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label>
                                    Others
                                </label>

                            </div>
                        </div>

                    @else
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="fullName" class="form-control" placeholder="Full Name">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="number" name="mobileNo" class="form-control" placeholder="Mobile Number">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <input type="text" name="website" class="form-control" placeholder="LinkedIn Profile (Optional)">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                            <input type="text" name="address" class="form-control" placeholder="Current Address">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-birthday-cake"> &nbsp;Date of Birth(A.D)</i></span>
                            <input type="date" name="dateOfBirth" class="form-control" placeholder="Date of Birth">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-image">&nbsp;&nbsp;Recent Picture</i></span>
                            <input type="file" name="image" class="form-control" placeholder="your Image">
                        </div>
                        <br>


                        <div class="form-group">
                            <div style="margin-left: 20px">
                                <label>
                                    <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                         style="position: relative;"><input type="radio" name="gender" value="male"
                                                                            class="flat-red" checked=""
                                                                            style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label>
                                    Male
                                </label>
                                <label>
                                    <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                         style="position: relative;"><input type="radio" name="gender" value="female"
                                                                            class="flat-red"
                                                                            style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label>
                                    Female
                                </label>
                                <label>
                                    <div class="iradio_flat-green" aria-checked="false" aria-disabled="false"
                                         style="position: relative;"><input type="radio" name="gender" value="others"
                                                                            class="flat-red"
                                                                            style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper"
                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </label>
                                <label>
                                    Others
                                </label>
                            </div>
                        </div>
                    @endif
                @endif
                {{--end of Personal details--}}
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Next</button>
            </div>
        </form>
        <!-- /input-group -->
    </div>
    <!-- /.box-body -->
@endsection

@section('my-footer')
    <script src="{{URL::to('/lib/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $("#myDetail").submit(function () {
                $('#myInnerBar').css({'width': '14.5%'})
            })


            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })
        })
    </script>


@endsection

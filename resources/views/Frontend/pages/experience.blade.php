@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:40%;background-color:#3F51B5"><strong>40%</strong>
        </div>
    </div>
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew"> Generator</b></h2>
@endsection

@section('my-header')
    <link rel="stylesheet" href="{{url('/css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('/css/tooltip.css')}}">
@endsection

@section('content')
    {{--<div class="box box-info">--}}

    {{--personal details--}}
    {{--<form id="myExp" action="{{route('page5')}}" method="post">--}}
    {{--{{csrf_field()}}--}}
    {{--<div class="box-body">--}}

    {{--<div class="box-header with-border">--}}
    {{--<h3 class="box-title">Experience</h3>--}}
    {{--<button type="button" class="btn btn-secondary pull-right" data-toggle="tooltip"--}}
    {{--data-placement="bottom"--}}
    {{--title="If you are Currently involved in some Organization then leave End Time box of that row">--}}
    {{--<i class="fa fa-info-circle fa-lg "></i>--}}
    {{--</button>--}}
    {{--</div>--}}

    {{--<div class="table-responsive-sm">--}}
    {{--<table class="table table-borderless table-hover">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<td>Job Title</td>--}}
    {{--<td>Company Name</td>--}}
    {{--<td>Location</td>--}}
    {{--<td>Start Time</td>--}}
    {{--<td>End Time</td>--}}
    {{--<td>Job Summary--}}
    {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
    {{--<div class="myTooltip"><i class="fa fa-info-circle"></i>--}}
    {{--<span class="mytooltiptext">Write brief Job Summary</span>--}}
    {{--</div>--}}

    {{--</td>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody id="appendExperienceHere">--}}


    {{--@forelse($experience as $value)--}}
    {{--<tr>--}}
    {{--<td><input class="expBlock form-control" type="text" value="{{$value->jobTitle}}"--}}
    {{--name="jobTitle[]">--}}
    {{--</td>--}}
    {{--<td><input class="expBlock form-control" type="text" value="{{$value->companyName}}"--}}
    {{--name="companyName[]"></td>--}}
    {{--<td><input class="expBlock form-control" type="text" value="{{$value->location}}"--}}
    {{--name="location[]">--}}
    {{--</td>--}}
    {{--<td><input class="expBlock" type="date" style="width: 135px;"--}}
    {{--value="{{$value->startTime}}" name="startTime[]"></td>--}}
    {{--<td><input class="expBlock myEndTime" type="date" style="width: 135px;"--}}
    {{--@if($value->current==='false')--}}
    {{--required--}}
    {{--@endif    value="{{$value->endTime}}" name="endTime[]"></td>--}}
    {{--<td>--}}
    {{--<textarea name="jobSummary[]" style="resize: none" class="form-control" id=""--}}
    {{--rows="4">{{$value->jobSummary}}</textarea>--}}

    {{--</td>--}}

    {{--<td>--}}
    {{--<button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i></button>--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="checkExp" type="checkbox"--}}
    {{--@if($value->current==='true')--}}
    {{--checked--}}
    {{--@endif> <b>Current</b>--}}
    {{--<input class="checkExpThis" name="current[]" value="{{$value->current}}"--}}
    {{--type="hidden">--}}
    {{--</td>--}}
    {{--</tr>--}}

    {{--@empty--}}
    {{--@forelse($oldExp as $key=>$value)--}}
    {{--<tr>--}}
    {{--<td><input class="expBlock form-control" type="text"--}}
    {{--value="{{old('jobTitle')[$key]??''}}"--}}
    {{--name="jobTitle[]">--}}
    {{--</td>--}}
    {{--<td><input class="expBlock form-control" type="text"--}}
    {{--value="{{old('companyName')[$key]??''}}"--}}
    {{--name="companyName[]"></td>--}}
    {{--<td><input class="expBlock form-control" type="text"--}}
    {{--value="{{old('location')[$key]??''}}"--}}
    {{--name="location[]">--}}
    {{--</td>--}}
    {{--<td><input class="expBlock" type="date" style="width: 135px;"--}}
    {{--value="{{old('startTime')[$key]??''}}" name="startTime[]"></td>--}}
    {{--<td><input class="expBlock myEndTime" type="date" style="width: 135px;"--}}
    {{--required value="{{old('endTime')[$key]??''}}" name="endTime[]"></td>--}}
    {{--<td>--}}
    {{--<textarea name="jobSummary[]" style="resize: none" class="form-control" id=""--}}
    {{--rows="4">{{old('jobSummary')[$key]??''}}</textarea>--}}

    {{--</td>--}}

    {{--<td>--}}
    {{--<button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i>--}}
    {{--</button>--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="checkExp" type="checkbox"--}}
    {{--@if(old('current')[$key]==='true')--}}
    {{--checked--}}
    {{--@endif> <b>Current</b>--}}
    {{--<input class="checkExpThis" name="current[]" value="{{old('current')[$key]}}"--}}
    {{--type="hidden">--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@empty--}}
    {{--<tr>--}}
    {{--<td><input class="expBlock form-control" type="text" name="jobTitle[]"></td>--}}
    {{--<td><input class="expBlock form-control" type="text" name="companyName[]"></td>--}}
    {{--<td><input class="expBlock form-control" type="text" name="location[]"></td>--}}
    {{--<td><input class="expBlock" type="date" style="width: 135px;" name="startTime[]">--}}
    {{--</td>--}}
    {{--<td><input class="expBlock myEndTime" type="date" style="width: 135px;"--}}
    {{--required name="endTime[]"></td>--}}
    {{--<td>--}}
    {{--<input class="expBlock" type="text" style="height: 80px;" name="jobSummary[]">--}}
    {{--<textarea class="form-control" name="jobSummary[]" style="resize: none" id=""--}}
    {{--rows="4"></textarea>--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i>--}}
    {{--</button>--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="checkExp" type="checkbox"> <b>Current</b>--}}
    {{--<input class="checkExpThis" name="current[]" value="false" type="hidden">--}}
    {{--</td>--}}
    {{--</tr>--}}

    {{--@endforelse--}}

    {{--@endforelse--}}


    {{--</tbody>--}}


    {{--</table>--}}
    {{--</div>--}}
    {{--<button id="addExp" type="button" class="btn btn-success btn-block">Add New Experience</button>--}}
    {{--<br>--}}
    {{--<a href="{{route('page4')}}" class="btn btn-primary ">Back</a>--}}
    {{--<button id="expButton" class="btn btn-primary pull-right" type="submit">Next</button>--}}
    {{--<a href="{{route('skipExp')}}" onclick="return confirm('Are you sure you want to skip?')"--}}
    {{--class="btn btn-primary pull-right">Skip</a>--}}

    {{--</div>--}}

    {{--</form>--}}
    {{--<!-- /input-group -->--}}
    {{--</div>--}}
    {{--<!-- /.box-body -->--}}
    <div class="box box-primary">

        @if($errors->has('jobTitle.*')||$errors->has('companyName.*')||$errors->has('location.*')||$errors->has('startTime.*')||$errors->has('endTime.*')||$errors->has('jobSummary.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif
        <div class="box-header with-border">
            <h3 class="box-title">Experience</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="myExp" method="post" action="{{route('page5')}}">
            {{csrf_field()}}
            <div class="box-body">
                <div class="myBody">


                    @forelse($experience as $value)
                        <div class="addedExp">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Job Title</label>
                                    <input type="text" name="jobTitle[]" value="{{$value->jobTitle}}"
                                           class="enterExperience form-control" id=""
                                           placeholder="Enter Job Title">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Company Name</label>
                                    <input type="text" name="companyName[]" value="{{$value->companyName}}"
                                           class="enterExperience form-control" id=""
                                           placeholder="Enter Company Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Location</label>
                                    <input type="text" name="location[]" value="{{$value->location}}"
                                           class="enterExperience form-control" id=""
                                           placeholder="Enter Location">
                                </div>
                            </div>
                            <div class="row child2">
                                <div class="form-group col-md-8">
                                    <label for="">Job Summary</label>
                                    <textarea style="resize: none" class="form-control ckeditor" name="jobSummary[]" id=""
                                              rows="5"
                                              placeholder="Detail About your Job..."> {{$value->jobSummary}}
                                         </textarea>
                                </div>
                                <div class="col-md-4 child2-1">
                                    <div class="row child2-2">
                                        <div class="form-group col-md-12">
                                            <label for="">Start Date</label>
                                            <input type="date" name="startTime[]" value="{{$value->startTime}}"
                                                   class="enterExperience form-control" id="">
                                        </div>
                                        <div class="form-group child2-3 col-md-12">
                                            <label for="">End Date</label>
                                            <input type="date" @if($value->current==='false') required
                                                   @endif name="endTime[]" value="{{$value->endTime}}"
                                                   class="enterExperience form-control child2-4"
                                                   id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div style="padding-left: 50px;padding-top: 10px" class="col-md-6">
                                    <input class="checkExp" @if($value->current==='true') checked
                                           @endif type="checkbox"> <b>Tick if you still have this job</b>
                                    <input class="checkExpThis" name="current[]" value="false" type="hidden">
                                </div>
                                <div style="text-align: right" class=" col-md-6">
                                    <button class="btn btn-danger removeExperience "><i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <hr style="border-color: #00BCD4">
                        </div>
                    @empty
                        <?php
                        $oldExp = old('jobTitle') ?? [];
                        ?>
                        @forelse($oldExp as $key=>$value)
                            <div class="addedExp">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Job Title</label>
                                        <input type="text" value="{{old('jobTitle')[$key]??''}}" name="jobTitle[]"
                                               class="enterExperience form-control" id=""
                                               placeholder="Enter Job Title">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Company Name</label>
                                        <input type="text" value="{{old('companyName')[$key]??''}}" name="companyName[]"
                                               class="enterExperience form-control" id=""
                                               placeholder="Enter Company Name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Location</label>
                                        <input type="text" value="{{old('location')[$key]??''}}" name="location[]"
                                               class="enterExperience form-control" id=""
                                               placeholder="Enter Location">
                                    </div>
                                </div>
                                <div class="row child2">
                                    <div class="form-group col-md-8">
                                        <label for="">Job Summary</label>
                                        <textarea style="resize: none" class="form-control ckeditor" name="jobSummary[]" id=""
                                                  rows="5"
                                                  placeholder="Detail About your Job..."> {{old('jobSummary')[$key]??''}} </textarea>
                                    </div>
                                    <div class="col-md-4 child2-1">
                                        <div class="row child2-2">
                                            <div class="form-group col-md-12">
                                                <label for="">Start Date</label>
                                                <input type="date" value="{{old('startTime')[$key]??''}}"
                                                       name="startTime[]" class="enterExperience form-control" id="">
                                            </div>
                                            <div class="form-group child2-3 col-md-12">
                                                <label for="">End Date</label>
                                                <input type="date" value="{{old('endTime')[$key]??''}}"
                                                       @if(old('current')[$key]==='false') required
                                                       @endif name="endTime[]"
                                                       class="enterExperience form-control child2-4"
                                                       id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="padding-left: 50px;padding-top: 10px" class="col-md-6">
                                        <input class="checkExp" @if(old('current')[$key]==='true') checked
                                               @endif type="checkbox"> <b>Tick if you still have this job</b>
                                        <input class="checkExpThis" name="current[]" value="false" type="hidden">
                                    </div>
                                    <div style="text-align: right" class=" col-md-6">
                                        <button class="btn btn-danger removeExperience "><i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @empty
                            <div class="addedExp">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Job Title</label>
                                        <input type="text" name="jobTitle[]" class="enterExperience form-control" id=""
                                               placeholder="Enter Job Title">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Company Name</label>
                                        <input type="text" name="companyName[]" class="enterExperience form-control"
                                               id=""
                                               placeholder="Enter Company Name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Location</label>
                                        <input type="text" name="location[]" class="enterExperience form-control" id=""
                                               placeholder="Enter Location">
                                    </div>
                                </div>
                                <div class="row child2">
                                    <div class="form-group col-md-8">
                                        <label for="">Job Summary</label>
                                        <textarea style="resize: none" class="form-control ckeditor" name="jobSummary[]" id=""
                                                  rows="5"
                                                  placeholder="Detail About your Job..."></textarea>
                                    </div>
                                    <div class="col-md-4 child2-1">
                                        <div class="row child2-2">
                                            <div class="form-group col-md-12">
                                                <label for="">Start Date</label>
                                                <input type="date" name="startTime[]"
                                                       class="enterExperience form-control" id="">
                                            </div>
                                            <div class="form-group child2-3 col-md-12">
                                                <label for="">End Date</label>
                                                <input type="date" required name="endTime[]"
                                                       class="enterExperience form-control child2-4"
                                                       id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="padding-left: 50px;padding-top: 10px" class="col-md-6">
                                        <input class="checkExp" type="checkbox"> <b>Tick if you still have this job</b>
                                        <input class="checkExpThis" name="current[]" value="false" type="hidden">
                                    </div>
                                    <div style="text-align: right" class=" col-md-6">
                                        <button class="btn btn-danger removeExperience "><i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @endforelse

                    @endforelse
                </div>
                <button id="addExperience" class="btn btn-success btn-sm form-control">Add New Experience</button>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{route('page4')}}" class="btn btn-primary ">Back</a>
                <button id="expButton" class="btn btn-primary pull-right" type="submit">Next</button>
                <a href="{{route('skipExp')}}" onclick="return confirm('Are you sure you want to skip?')"
                   class="btn btn-primary pull-right">Skip</a>
            </div>
        </form>
    </div>
@endsection
@section('my-footer')



    <script>
        $(function () {
            $('#addExperience').on('click', function (e) {
                e.preventDefault();
                var BlockCount=$('.myBody').find('.addedExp').length|50;
                var experienceBlock = "<div class=\"addedExp\">\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Job Title</label>\n" +
                    "                                        <input type=\"text\" name=\"jobTitle[]\" class=\"enterExperience form-control\" id=\"\"\n" +
                    "                                               placeholder=\"Enter Job Title\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Company Name</label>\n" +
                    "                                        <input type=\"text\" name=\"companyName[]\" class=\"enterExperience form-control\"\n" +
                    "                                               id=\"\"\n" +
                    "                                               placeholder=\"Enter Company Name\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Location</label>\n" +
                    "                                        <input type=\"text\" name=\"location[]\" class=\"enterExperience form-control\" id=\"\"\n" +
                    "                                               placeholder=\"Enter Location\">\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <div class=\"row child2\">\n" +
                    "                                    <div class=\"form-group col-md-8\">\n" +
                    "                                        <label for=\"\">Job Summary</label>\n" +
                    "                                        <textarea style=\"resize: none\" class=\"form-control ckeditor\" name=\"jobSummary[]\" id='ckeditor-"+BlockCount+"' rows=\"5\"\n" +
                    "                                                  placeholder=\"Detail About your Job...\"></textarea>\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"col-md-4 child2-1\">\n" +
                    "                                        <div class=\"row child2-2\">\n" +
                    "                                            <div class=\"form-group col-md-12\">\n" +
                    "                                                <label for=\"\">Start Date</label>\n" +
                    "                                                <input type=\"date\" name=\"startTime[]\"\n" +
                    "                                                       class=\"enterExperience form-control\" id=\"\">\n" +
                    "                                            </div>\n" +
                    "                                            <div class=\"form-group child2-3 col-md-12\">\n" +
                    "                                                <label for=\"\">End Date</label>\n" +
                    "                                                <input type=\"date\" required name=\"endTime[]\"\n" +
                    "                                                       class=\"enterExperience form-control child2-4\"\n" +
                    "                                                       id=\"\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div style=\"padding-left: 50px;padding-top: 10px\" class=\"col-md-6\">\n" +
                    "                                        <input class=\"checkExp\" type=\"checkbox\"> <b>Tick if you still have this job</b>\n" +
                    "                                        <input class=\"checkExpThis\" name=\"current[]\" value=\"false\" type=\"hidden\">\n" +
                    "                                    </div>\n" +
                    "                                    <div style=\"text-align: right\" class=\" col-md-6\">\n" +
                    "                                        <button class=\"btn btn-danger removeExperience \"><i class=\"fa fa-trash\"></i>\n" +
                    "                                        </button>\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <hr style=\"border-color: #00BCD4\">\n" +
                    "                            </div>";
                $('.myBody').append(experienceBlock);
                CKEDITOR.replace('ckeditor-'+BlockCount);
                removeExp();
                current();
                checkNumber();
                onEnterExp();
            });
            checkNumber();

            function removeExp() {
                $('.removeExperience').on('click', function (e) {
                    e.preventDefault();
                    $(this).parent().parent().parent().remove();
                    checkNumber();
                })
            }

            removeExp();

            function checkNumber() {

                var checkOneExp = $('.myBody').find('.addedExp').length;
                console.log(checkOneExp);
                if (checkOneExp < 2) {
                    $('.removeExperience').hide();
                } else {
                    $('.removeExperience').show();

                }
            }

            function current() {
                $('.checkExp').on('click', function () {
                    var test = $(this).is(':checked');

                    var test2 = $(this).parent().find('.checkExpThis');

                    var test3 = $(this).parent().parent().parent().find('.child2').find('.child2-1').find('.child2-2').find('.child2-3').find('.child2-4');
                    console.log(test3);
                    if (test === true) {
                        test2.val('true');
                        test3.removeAttr('required');
                    } else {
                        test2.val('false');
                        test3.prop('required', true);
                    }

                })
            }

            current();

            function onEnterExp() {
                $('.enterExperience').on('keypress', function (e) {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                    }
                })
            }
            onEnterExp();


        })
    </script>








    <script>
        {{--$(function () {--}}

        {{--$('#addExp').on('click', function (e) {--}}
        {{--e.preventDefault();--}}
        {{--var appendTrExperience = "<tr>\n" +--}}
        {{--"                                    <td><input class=\"expBlock form-control\" type=\"text\" name=\"jobTitle[]\"></td>\n" +--}}
        {{--"                                    <td><input class=\"expBlock form-control\" type=\"text\" name=\"companyName[]\"></td>\n" +--}}
        {{--"                                    <td><input class=\"expBlock form-control\" type=\"text\" name=\"location[]\"></td>\n" +--}}
        {{--"                                    <td><input class=\"expBlock\" type=\"date\" style=\"width: 135px;\" name=\"startTime[]\">\n" +--}}
        {{--"                                    </td>\n" +--}}
        {{--"                                    <td><input class=\"expBlock myEndTime\" type=\"date\" style=\"width: 135px;\"\n" +--}}
        {{--"                                               required name=\"endTime[]\"></td>\n" +--}}
        {{--"                                    <td>\n" +--}}
        {{--"                                        --}}{{--<input class=\"expBlock\" type=\"text\" style=\"height: 80px;\" name=\"jobSummary[]\">--}}{{--\n" +--}}
        {{--"                                        <textarea class=\"form-control\" name=\"jobSummary[]\" style=\"resize: none\" id=\"\"\n" +--}}
        {{--"                                                  rows=\"4\"></textarea>\n" +--}}
        {{--"                                    </td>\n" +--}}
        {{--"                                    <td>\n" +--}}
        {{--"                                        <button class=\"btn btn-danger removeExperience\"><i class=\"fa fa-trash\"></i>\n" +--}}
        {{--"                                        </button>\n" +--}}
        {{--"                                    </td>\n" +--}}
        {{--"                                    <td>\n" +--}}
        {{--"                                        <input class=\"checkExp\" type=\"checkbox\"> <b>Current</b>\n" +--}}
        {{--"                                        <input class=\"checkExpThis\" name=\"current[]\" value=\"false\" type=\"hidden\">\n" +--}}
        {{--"                                    </td>\n" +--}}
        {{--"                                </tr>";--}}

        {{--$('#appendExperienceHere').append(appendTrExperience);--}}
        {{--currentExp();--}}
        {{--removeExperience();--}}
        {{--enterKey();--}}

        {{--});--}}
        {{--currentExp();--}}
        {{--removeExperience();--}}

        {{--function removeExperience() {--}}
        {{--$('.removeExperience').on('click', function (e) {--}}
        {{--e.preventDefault();--}}
        {{--var test = $(this).parent().parent().remove();--}}
        {{--addRemove();--}}
        {{--});--}}
        {{--addRemove();--}}
        {{--}--}}


        {{--function addRemove() {--}}
        {{--var checkOne = $('#appendExperienceHere').find('tr').length;--}}
        {{--if (checkOne < 2) {--}}
        {{--$('.removeExperience').hide();--}}
        {{--} else {--}}
        {{--$('.removeExperience').show();--}}
        {{--}--}}
        {{--}--}}

        {{--function currentExp() {--}}
        {{--$(".checkExp").on('click', function () {--}}
        {{--var test = $(this).is(':checked');--}}
        {{--console.log(test);--}}
        {{--var test2 = $(this).parent().find('.checkExpThis');--}}
        {{--console.log(test2);--}}
        {{--var test3 = $(this).parent().parent().find('.myEndTime');--}}
        {{--console.log(test3);--}}
        {{--if (test === true) {--}}
        {{--test2.val('true');--}}
        {{--test3.removeAttr('required');--}}
        {{--} else {--}}
        {{--test2.val('false');--}}
        {{--test3.prop('required', true);--}}
        {{--}--}}
        {{--console.log(test2.val());--}}
        {{--})--}}
        {{--}--}}

        {{--function enterKey() {--}}
        {{--$('.expBlock').on('keypress', function (e) {--}}
        {{--if (e.keyCode === 13) {--}}
        {{--e.preventDefault();--}}
        {{--$('#expButton').click();--}}
        {{--}--}}
        {{--})--}}
        {{--}--}}

        {{--enterKey();--}}

        {{--});--}}
    </script>
    <script>
        $(function () {
            $("#myExp").submit(function () {
                $('#myInnerBar').css({'width': '50%'})
            })
        })
    </script>


    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--var count = 1;--}}
    {{--dynamic_field(count);--}}

    {{--function dynamic_field(number) {--}}
    {{--html = '<div class="sub">';--}}
    {{--html += '<div class="form-group">';--}}
    {{--html += '<label for="exampleInputEmail1">Job title</label>';--}}
    {{--html += '<input type="text" class="form-control" name="jobTitle[]" id="" placeholder="School/Collage">';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="form-group">';--}}
    {{--html += '<label for="exampleInputEmail1">Company Name</label>';--}}
    {{--html += '<input type="text" class="form-control" name="companyName[]" id="" placeholder="School/Collage">';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="form-group">';--}}
    {{--html += '<label for="exampleInputEmail1">Location</label>';--}}
    {{--html += '<input type="text" class="form-control" name="location[]" id="" placeholder="location">';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="row">';--}}
    {{--html += '<div class="form-group col-md-6">';--}}
    {{--html += '<label for="exampleInputEmail1">Start Date</label>';--}}
    {{--html += '<input type="date" class="form-control" name="startTime[]" id="" placeholder="start time">';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="form-group col-md-6">';--}}
    {{--html += '<label for="exampleInputEmail1">End Date</label>';--}}
    {{--html += '<input type="date" class="form-control" name="endTime[]" id="" placeholder="end time">';--}}
    {{--html += '</div>';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="form-group">';--}}
    {{--html += '<label>Summary</label>';--}}
    {{--html += '<textarea class="form-control" rows="3" name="jobSummary[]" placeholder="Enter ..."></textarea>';--}}
    {{--html += '</div>';--}}


    {{--if (number > 1) {--}}
    {{--html += '<button type="button" style="margin-left: 90%" name="remove" id="" class="btn btn-danger remove">Remove</button>';--}}
    {{--html += '<hr>';--}}
    {{--html += '</div>';--}}

    {{--$('.experience').append(html);--}}
    {{--}--}}
    {{--else {--}}
    {{--html += '<button type="button" style="margin-left: 90%" name="add" id="add" class="btn btn-success">Add</button>';--}}
    {{--html += '<hr>';--}}
    {{--html += '</div>';--}}

    {{--$('.experience').html(html);--}}
    {{--}--}}
    {{--}--}}

    {{--$(document).on('click', '#add', function () {--}}
    {{--count++;--}}
    {{--dynamic_field(count);--}}
    {{--});--}}

    {{--$(document).on('click', '.remove', function () {--}}
    {{--count--;--}}
    {{--$(this).closest('.sub').remove();--}}
    {{--});--}}
    {{--})--}}
    {{--</script>--}}
@endsection

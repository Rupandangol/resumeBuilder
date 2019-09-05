@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:20%;background-color:#3F51B5">20%
        </div>
    </div>
@endsection
@section('my-header')
    <link rel="stylesheet" href="{{url('/css/responsive.css')}}">

    <link rel="stylesheet" href="{{url('/css/tooltip.css')}}">
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew"> Generator</b></h2>

@endsection


@section('content')

    <div class="box box-primary">
        @if($errors->has('institute.*')||$errors->has('location.*')||$errors->has('subject.*')||$errors->has('grade.*')||$errors->has('startTime.*')||$errors->has('endTime.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif


        <div class="box-header with-border">
            <h3 class="box-title">Education &nbsp;&nbsp;&nbsp;</h3>
            <div class="myTooltip"><i class="fa fa-info-circle fa-lg"></i>
                <span class="mytooltiptext">Start from your highest education level </span>
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="myEducation" autocomplete="off" method="post" action="{{route('page4')}}">
            {{csrf_field()}}
            <div class="box-body">

                <div class="myBody">

                    @forelse($education as $value)
                        <div class="addedEdu">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Institute</label>
                                    <input type="text" value="{{$value->institute}}" name="institute[]"
                                           class="myEdu form-control" id=""
                                           placeholder="Enter Institute">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Location</label>
                                    <input type="text" value="{{$value->location}}" name="location[]"
                                           class="myEdu form-control" id=""
                                           placeholder="Enter Location">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Level</label>
                                    <input type="text" value="{{$value->subject}}" name="subject[]"
                                           class="myEdu form-control" id=""
                                           placeholder="Eg: SLC/+2/Bachelor in Computer Engineering  ">
                                </div>

                            </div>

                            <div class="row changeItem">
                                <div class="form-group col-md-4 forGrade">
                                    <label for="">Grade</label>
                                    <input type="text" value="{{$value->grade}}" name="grade[]"
                                           @if($value->attending==='false') required
                                           @endif  class="myEdu form-control myGrade" id=""
                                           placeholder="Eg: 98% or 3.00 gpa ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Joined Year</label>
                                    <input type="number" value="{{$value->startTime}}" name="startTime[]"
                                           class="date-own form-control" id=""
                                           placeholder="Enter Joined Year ">
                                </div>
                                <div class="form-group col-md-4 forPassed">
                                    <label for="">Passed Year</label>
                                    <input type="number" value="{{$value->endTime}}" name="endTime[]"
                                           @if($value->attending==='false') required
                                           @endif class="date-own form-control myPassedYear" id=""
                                           placeholder="Enter Passed Year ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Description <code style="color: #00BCD4">(Optional)</code></label>
                                <textarea style="resize: none;" name="description[]" id="" rows="4"
                                          placeholder="Enter Description .. (Optional)"
                                          class="form-control ckeditor">{{$value->description}}</textarea>
                            </div>
                            <div class="row">
                                <div style="padding-left: 50px;padding-top: 10px" class="form-group col-md-6">
                                    <input class="checkThis"
                                           @if($value->endTime==='attending') checked @endif type="checkbox"> <b>Tick if
                                        you are still attending this School/College</b>
                                    <input class="checkThen" type="hidden" name="attending[]"
                                           value="{{$value->attending}}">
                                </div>
                                <div style="text-align: right" class="form-group col-md-6">
                                    <button class="btn btn-danger removeEducation"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            <hr style="border-color: #00BCD4">
                        </div>

                    @empty
                        <?php
                        $oldEdu = old('institute') ?? [];
                        ?>
                        @forelse($oldEdu as  $key=>$value)
                            <div class="addedEdu">

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Institute</label>
                                        <input type="text" value="{{old('institute')[$key]??''}}" name="institute[]"
                                               class="myEdu form-control" id=""
                                               placeholder="Enter Institute">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Location</label>
                                        <input type="text" value="{{old('location')[$key]??''}}" name="location[]"
                                               class="myEdu form-control" id=""
                                               placeholder="Enter Location">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Level</label>
                                        <input type="text" value="{{old('subject')[$key]??''}}" name="subject[]"
                                               class="myEdu form-control" id=""
                                               placeholder="Eg: SLC/+2/Bachelor in Computer Engineering  ">
                                    </div>

                                </div>

                                <div class="row changeItem">
                                    <div class="form-group col-md-4 forGrade">
                                        <label for="">Grade</label>
                                        <input type="text" value="{{old('grade')[$key]??''}}" name="grade[]"
                                               @if(old('attending')[$key]==='false') required
                                               @endif class="myEdu form-control myGrade" id=""
                                               placeholder="Eg: 98% or 3.00 gpa ">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Joined Year</label>
                                        <input type="number" value="{{old('startTime')[$key]??''}}" name="startTime[]"
                                               class="date-own form-control" id=""
                                               placeholder="Enter Joined Year ">
                                    </div>
                                    <div class="form-group col-md-4 forPassed">
                                        <label for="">Passed Year</label>
                                        <input type="number" value="{{old('endTime')[$key]??''}}" name="endTime[]"
                                               @if(old('attending')[$key]==='false') required
                                               @endif class="date-own form-control myPassedYear" id=""
                                               placeholder="Enter Passed Year ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Description <code style="color: #00BCD4">(Optional)</code></label>
                                    <textarea style="resize: none;" name="description[]" id="" rows="4"
                                              placeholder="Enter Description .. (Optional)"
                                              class="ckeditor form-control">{{old('description')[$key]??''}}</textarea>
                                </div>
                                <div class="row">
                                    <div style="padding-left: 50px;padding-top: 10px" class="form-group col-md-6">
                                        <input class="checkThis"
                                               @if(old('attending')[$key]==='true') checked @endif type="checkbox">
                                        <b>Tick if you are still attending this School/College</b>
                                        <input class="checkThen" type="hidden" name="attending[]"
                                               value="{{old('attending')[$key]??''}}}">
                                    </div>
                                    <div style="text-align: right" class="form-group col-md-6">
                                        <button class="btn btn-danger removeEducation"><i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @empty
                            <div class="addedEdu">

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Institute</label>
                                        <input type="text" name="institute[]" class="myEdu form-control" id=""
                                               placeholder="Enter Institute">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Location</label>
                                        <input type="text" name="location[]" class="myEdu form-control" id=""
                                               placeholder="Enter Location">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Level</label>
                                        <input type="text" name="subject[]" class="myEdu form-control" id=""
                                               placeholder="Eg: SLC/+2/Bachelor in Computer Engineering ">
                                    </div>

                                </div>

                                <div class="row changeItem">
                                    <div class="form-group col-md-4 forGrade">
                                        <label for="">Grade</label>
                                        <input type="text" name="grade[]" required
                                               class="myEdu form-control myGrade" id=""
                                               placeholder="Eg: 98% or 3.00 gpa ">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Joined Year</label>
                                        <input type="number" name="startTime[]" class="date-own form-control" id=""
                                               placeholder="Enter Jonined Year ">
                                    </div>
                                    <div class="form-group col-md-4 forPassed">
                                        <label for="">Passed Year</label>
                                        <input type="number" name="endTime[]" required
                                               class="date-own form-control myPassedYear" id=""
                                               placeholder="Enter Passed Year">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Description <code style="color: #00BCD4">(Optional)</code></label>
                                    <textarea style="resize: none;" name="description[]" id="" rows="4"
                                              placeholder="Enter Description .. (Optional)"
                                              class="ckeditor form-control"></textarea>
                                </div>

                                <div class="row">
                                    <div style="padding-left: 50px;padding-top: 10px" class="form-group col-md-6">
                                        <input class="checkThis" type="checkbox"> <b>Tick if you are still attending
                                            this School/College</b>
                                        <input class="checkThen" type="hidden" name="attending[]" value="false">
                                    </div>
                                    <div style="text-align: right" class="form-group col-md-6">
                                        <button class="btn btn-danger removeEducation"><i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>

                        @endforelse
                    @endforelse
                </div>
                <button id="addNewEdu" class="btn btn-success btn-block">Add New Education</button>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{route('page2')}}" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Next</button>
            </div>
        </form>
    </div>










    {{--old HTML--}}
    {{--old html--}}
    {{--<div class="box box-info">--}}
    {{--personal details--}}
    {{--<form autocomplete="off" id="myEducation" action="{{route('page4')}}" method="post">--}}
    {{--{{csrf_field()}}--}}
    {{--<div class="box-body">--}}

    {{--<div class="box-header with-border">--}}
    {{--<h3 class="box-title">Education</h3> &nbsp;&nbsp;--}}
    {{--<div class="myTooltip"><i class="fa fa-info-circle"></i>--}}
    {{--<span class="mytooltiptext">Start from your highest education level </span>--}}
    {{--</div>--}}
    {{--<button type="button" class="btn btn-secondary pull-right" data-toggle="tooltip"--}}
    {{--data-placement="bottom"--}}
    {{--title="If you are attending School/Collage you can leave Grade and endTime inputs of that row block">--}}
    {{--<i class="fa fa-info-circle fa-lg"></i>--}}
    {{--</button>--}}
    {{--</div>--}}

    {{--<div class="table-responsive-sm">--}}

    {{--<table class="table table-borderless table-hover">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th>Institute</th>--}}
    {{--<th>Location</th>--}}
    {{--<th>Level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
    {{--<div class="myTooltip"><i class="fa fa-info-circle"></i>--}}
    {{--<span class="mytooltiptext">Write full education level, Eg:SLC/+2/Bachelor in civil Engineering...</span>--}}
    {{--</div>--}}
    {{--</th>--}}
    {{--<th>Grade</th>--}}
    {{--<th>Joined Year</th>--}}
    {{--<th>Passed Year</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody id="appendEducationHere">--}}
    {{--@forelse($education as $value)--}}
    {{--<tr>--}}
    {{--<td><input class="eduBlock" type="text" name="institute[]"--}}
    {{--value="{{$value->institute}}"></td>--}}
    {{--<td><input class="eduBlock" type="text" name="location[]" value="{{$value->location}}">--}}
    {{--</td>--}}
    {{--<td><input class="eduBlock" type="text" name="subject[]" value="{{$value->subject}}">--}}
    {{--</td>--}}
    {{--<td><input class="eduBlock myGrade" type="text" placeholder="eg:80% or 3.00 gpa"--}}
    {{--name="grade[]" @if($value->attending==='false') required @endif--}}
    {{--value="{{$value->grade}}"></td>--}}
    {{--<td>--}}
    {{--<input class="date-own form-control " value="{{$value->startTime}}"--}}
    {{--name="startTime[]" style="width: 100px;"--}}
    {{--type="number">--}}
    {{--<input type="date" name="startTime[]" value="{{$value->startTime}}">--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="date-own form-control myEndTime" value="{{$value->endTime}}"--}}
    {{--@if($value->attending==='false') required @endif  style="width: 100px;"--}}
    {{--name="endTime[]"--}}
    {{--type="number">--}}
    {{--<input type="d`ate" name="endTime[]" value="{{$value->endTime}}"></td>--}}
    {{--<td>--}}
    {{--<button class="btn btn-danger removeEdu"><i class="fa fa-trash"></i></button>--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="checkThis" type="checkbox"--}}
    {{--@if($value->attending==='true') checked @endif>--}}
    {{--<b>Attending</b>--}}
    {{--<input class="checkThen" type="hidden" name="attending[]"--}}
    {{--value="{{$value->attending}}">--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@empty--}}

    {{--@forelse($oldEdu as $key=>$value)--}}
    {{--<tr>--}}
    {{--<td><input class="eduBlock" type="text" name="institute[]"--}}
    {{--value="{{old('institute')[$key]??''}}"></td>--}}
    {{--<td><input class="eduBlock" type="text" name="location[]"--}}
    {{--value="{{old('location')[$key]??''}}">--}}
    {{--</td>--}}
    {{--<td><input class="eduBlock" type="text" name="subject[]"--}}
    {{--value="{{old('subject')[$key]??''}}">--}}
    {{--</td>--}}
    {{--<td><input class="eduBlock myGrade" type="text" placeholder="eg:80% or 3.00 gpa"--}}
    {{--name="grade[]"--}}
    {{--value="{{old('grade')[$key]??''}}"></td>--}}
    {{--<td>--}}
    {{--<input class="date-own form-control " value="{{old('startTime')[$key]??''}}"--}}
    {{--name="startTime[]" style="width: 100px;"--}}
    {{--type="number">--}}
    {{--<input type="date" name="startTime[]" value="{{$value->startTime}}">--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="date-own form-control myEndTime"--}}
    {{--value="{{old('endTime')[$key]??''}}"--}}
    {{--required style="width: 100px;" name="endTime[]"--}}
    {{--type="number">--}}
    {{--<input type="d`ate" name="endTime[]" value="{{$value->endTime}}"></td>--}}
    {{--<td>--}}
    {{--<button class="btn btn-danger removeEdu"><i class="fa fa-trash"></i></button>--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="checkThis" type="checkbox"--}}
    {{--@if(old('attending')[$key]==='true') checked @endif>--}}
    {{--<b>Attending</b>--}}
    {{--<input class="checkThen" type="hidden" name="attending[]"--}}
    {{--value="{{old('attending')[$key]}}">--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@empty--}}
    {{--<tr>--}}
    {{--<td><input class="eduBlock" type="text" name="institute[]"></td>--}}
    {{--<td><input class="eduBlock" type="text" name="location[]"></td>--}}
    {{--<td><input class="eduBlock" type="text" name="subject[]"></td>--}}
    {{--<td><input class="eduBlock myGrade" required type="text"--}}
    {{--placeholder="eg:80% or 3.00 gpa"--}}
    {{--name="grade[]">--}}
    {{--</td>--}}
    {{--<td><input class="date-own form-control" name="startTime[]" style="width: 100px;"--}}
    {{--type="number"></td>--}}
    {{--<td><input class="date-own form-control myEndTime" required style="width: 100px;"--}}
    {{--name="endTime[]"--}}
    {{--type="number"></td>--}}
    {{--<td>--}}
    {{--<button class="btn btn-danger removeEdu"><i class="fa fa-trash"></i></button>--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<input class="checkThis" type="checkbox"> <b>Attending</b>--}}
    {{--<input class="checkThen" type="hidden" name="attending[]" value="false">--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@endforelse--}}

    {{--@endforelse--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--<button id="addEducation" class="btn btn-success btn-block">Add New Education</button>--}}
    {{--<br>--}}
    {{--<a href="{{route('page3')}}" class="btn btn-primary">back</a>--}}
    {{--<button id="eduButton" class="btn btn-primary pull-right" type="submit">next</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--<!-- /input-group -->--}}
    {{--</div>--}}
    <!-- /.box-body -->
    {{--endof oldHTML--}}
@endsection
@section('my-footer')


    <script>
        $(function () {
            $('#addNewEdu').on('click', function (e) {
                e.preventDefault();
                var BlockCount = $('.myBody').find('.addedEdu').length|50;
                var addedEdu = "<div class=\"addedEdu\">\n" +
                    "\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Institute</label>\n" +
                    "                                        <input type=\"text\" name=\"institute[]\" class=\"myEdu form-control\" id=\"\"\n" +
                    "                                               placeholder=\"Enter Institute\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Location</label>\n" +
                    "                                        <input type=\"text\" name=\"location[]\" class=\"myEdu form-control\" id=\"\"\n" +
                    "                                               placeholder=\"Enter Location\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Level</label>\n" +
                    "                                        <input type=\"text\" name=\"subject[]\" class=\"myEdu form-control\" id=\"\"\n" +
                    "                                               placeholder=\"Eg: SLC/+2/Bachelor in Computer Engineering \">\n" +
                    "                                    </div>\n" +
                    "\n" +
                    "                                </div>\n" +
                    "\n" +
                    "                                <div class=\"row changeItem\">\n" +
                    "                                    <div class=\"form-group col-md-4 forGrade\">\n" +
                    "                                        <label for=\"\">Grade</label>\n" +
                    "                                        <input type=\"text\" name=\"grade[]\" required\n" +
                    "                                               class=\"myEdu form-control myGrade\" id=\"\"\n" +
                    "                                               placeholder=\"Eg: 98% or 3.00 gpa \">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Joined Year</label>\n" +
                    "                                        <input type=\"number\" name=\"startTime[]\" class=\"date-own form-control\" id=\"\"\n" +
                    "                                               placeholder=\"Enter Jonined Year \">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4 forPassed\">\n" +
                    "                                        <label for=\"\">Passed Year</label>\n" +
                    "                                        <input type=\"number\" name=\"endTime[]\" required\n" +
                    "                                               class=\"date-own form-control myPassedYear\" id=\"\"\n" +
                    "                                               placeholder=\"Enter Passed Year\">\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <div class=\"form-group\">\n" +
                    "                                    <label for=\"\">Description <code style=\"color: #00BCD4\">(Optional)</code></label>\n" +
                    "                                    <textarea style=\"resize: none;\" name=\"description[]\" id='ckeditor-"+BlockCount+"' rows=\"4\"\n" +
                    "                                              placeholder=\"Enter Description .. (Optional)\"\n" +
                    "                                              class=\"ckeditor form-control\"></textarea>\n" +
                    "                                </div>\n" +
                    "\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div style=\"padding-left: 50px;padding-top: 10px\" class=\"form-group col-md-6\">\n" +
                    "                                        <input class=\"checkThis\" type=\"checkbox\"> <b>Tick if you are still attending\n" +
                    "                                            this School/College</b>\n" +
                    "                                        <input class=\"checkThen\" type=\"hidden\" name=\"attending[]\" value=\"false\">\n" +
                    "                                    </div>\n" +
                    "                                    <div style=\"text-align: right\" class=\"form-group col-md-6\">\n" +
                    "                                        <button class=\"btn btn-danger removeEducation\"><i class=\"fa fa-trash\"></i>\n" +
                    "                                        </button>\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <hr style=\"border-color: #00BCD4\">\n" +
                    "                            </div>";
                $('.myBody').append(addedEdu);
                CKEDITOR.replace('ckeditor-'+BlockCount);
                attending();
                countAddedEdu();
                removeEducation();
                dateFormat();
                onEnter();
            });

            attending();

            function removeEducation() {
                $('.removeEducation').on('click', function (e) {
                    e.preventDefault();
                    $(this).parent().parent().parent().remove();
                    countAddedEdu();
                })
            }

            removeEducation();

            function countAddedEdu() {
                var countAddedblock = $('.myBody').find('.addedEdu').length;
                console.log(countAddedblock);
                if (countAddedblock < 2) {
                    $('.removeEducation').hide()
                } else {
                    $('.removeEducation').show()

                }
            }

            countAddedEdu();

            function dateFormat() {
                $('.date-own').datepicker({
                    minViewMode: 2,
                    format: 'yyyy'
                });
            }

            dateFormat();

            function attending() {
                $('.checkThis').on('click', function () {

                    var test = $(this).is(':checked');
                    var test2 = $(this).parent().find('.checkThen');
                    var test3 = $(this).parent().parent().parent().find('.changeItem').find('.forPassed').find('.myPassedYear');
                    console.log(test3);
                    var test4 = $(this).parent().parent().parent().find('.changeItem').find('.forGrade').find('.myGrade');
                    if (test === true) {
                        test2.val('true');
                        test3.removeAttr('required');
                        test4.removeAttr('required');
                    } else {
                        test2.val('false');
                        test3.prop('required', true);
                        test4.prop('required', true);
                    }
                })
            }

            function onEnter() {
                $('.myEdu').on('keypress', function (e) {
                    if (e.keyCode === 13) {
                        e.preventDefault()
                    }
                })
            }

            onEnter();


        })
    </script>


    <script>
        $(function () {
            $("#myEducation").submit(function () {
                $('#myInnerBar').css({'width': '40%'})
            });
        })
    </script>





    {{--old one--}}
    <script>
        // $(function () {
        //     $('#addEducation').on('click', function (e) {
        //         e.preventDefault();
        //         var appendTrEdu = "  <tr>\n" +
        //             "                                <td><input class=\"eduBlock\" type=\"text\" name=\"institute[]\"></td>\n" +
        //             "                                <td><input class=\"eduBlock\" type=\"text\" name=\"location[]\"></td>\n" +
        //             "                                <td><input class=\"eduBlock\" type=\"text\" name=\"subject[]\"></td>\n" +
        //             "                                <td><input class=\"eduBlock myGrade\" type=\"text\" placeholder=\"eg:80% or 3.00 gpa\" name=\"grade[]\"></td>\n" +
        //             "                                <td><input class=\"date-own form-control\" name=\"startTime[]\" style=\"width: 100px;\"\n" +
        //             "                                           type=\"number\"></td>\n" +
        //             "                                <td><input class=\"date-own form-control myEndTime\" style=\"width: 100px;\" name=\"endTime[]\"\n" +
        //             "                                           type=\"number\"></td>\n" +
        //             "                                <td>\n" +
        //             "                                    <button class=\"btn btn-danger removeEdu\"><i class=\"fa fa-trash\"></i></button>\n" +
        //             "                                </td>\n" +
        //             "                                <td>\n" +
        //             "                                    <input class=\"checkThis\" type=\"checkbox\"> <b>Attending</b>\n" +
        //             "                                    <input class=\"checkThen\" type=\"hidden\" name=\"attending[]\" value=\"false\">\n" +
        //             "                                </td>\n" +
        //             "                            </tr>";
        //         $('#appendEducationHere').append(appendTrEdu);
        //
        //         removeEdu();
        //         enterKey();
        //
        //     });
        //     removeEdu();
        //
        //
        //
        //     function removeEdu() {
        //         $('.removeEdu').on('click', function (e) {
        //             e.preventDefault();
        //             var test = $(this).parent().parent().remove();
        //             addRemove();
        //         })
        //         addRemove();
        //     }
        //
        //     function addRemove() {
        //         $checkOne = $('#appendEducationHere').find('tr').length;
        //         if ($checkOne < 2) {
        //             $('.removeEdu').hide();
        //         } else {
        //             $('.removeEdu').show();
        //         }
        //     }

        //
        // function attending() {
        //     $(".checkThis").on('click', function () {
        //         var test = $(this).is(':checked');
        //         console.log(test);
        //         var test1 = $(this).parent().find('.checkThen');
        //         console.log(test1);
        //         var test2 = $(this).parent().parent().find('.myEndTime');
        //         var test3 = $(this).parent().parent().find('.myGrade');
        //         if (test === true) {
        //             test1.val('true');
        //             test2.removeAttr('required');
        //             test3.removeAttr('required');
        //         } else {
        //             test1.val('false');
        //             test2.prop('required', true);
        //             test3.prop('required', true);
        //
        //         }
        //         console.log(test1.val());
        //     })
        // }


        // function enterKey() {
        //     $('.eduBlock').on('keypress', function (e) {
        //         if (e.keyCode === 13) {
        //             e.preventDefault();
        //             $('#eduButton').click();
        //         }
        //     })
        // }

        // enterKey();
        //
        //
        // })

    </script>
    <script>
        {{--$(document).ready(function () {--}}
        {{--var count = 1;--}}
        {{--dynamic_field(count);--}}

        {{--function dynamic_field(number) {--}}
        {{--html = '<div class="sub">';--}}
        {{--html += '<div class="form-group">';--}}
        {{--html += '<label for="exampleInputEmail1">Institute</label>';--}}
        {{--html += '<input type="text" class="form-control" name="institute[]" id="" placeholder="School/Collage">';--}}
        {{--html += '</div>';--}}
        {{--html += '<div class="form-group">';--}}
        {{--html += '<label for="exampleInputEmail1">Location</label>';--}}
        {{--html += '<input type="text" class="form-control" name="location[]" id="" placeholder="location">';--}}
        {{--html += '</div>';--}}
        {{--html += '<div class="form-group">';--}}
        {{--html += '<label for="exampleInputEmail1">Grade</label>';--}}
        {{--html += '<input type="text" class="form-control" name="grade[]" id="" placeholder="location">';--}}
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


        {{--if (number > 1) {--}}
        {{--html += '<button type="button" style="margin-left: 90%" name="remove" id="" class="btn btn-danger remove">Remove</button>';--}}
        {{--html += '</div>';--}}
        {{--html += '<hr>';--}}
        {{--$('.education').append(html);--}}
        {{--}--}}
        {{--else {--}}
        {{--html += '<button type="button" style="margin-left: 90%" name="add" id="add" class="btn btn-success">Add</button>';--}}
        {{--html += '</div>';--}}
        {{--html += '<hr>';--}}
        {{--$('.education').html(html);--}}
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
    </script>
    {{--end of old one--}}
@endsection


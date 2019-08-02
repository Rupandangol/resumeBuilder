@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:43.5%;background-color:#3F51B5">
        </div>
    </div>
@endsection
@section('my-header')
    <link rel="stylesheet" href="{{url('/css/responsive.css')}}">

    <link rel="stylesheet" href="{{url('/css/tooltip.css')}}">
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection


@section('content')
    <div class="box box-info">
        @if($errors->has('institute.*')||$errors->has('location.*')||$errors->has('subject.*')||$errors->has('grade.*')||$errors->has('startTime.*')||$errors->has('endTime.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif
        {{--personal details--}}
        <form id="myEducation" action="{{route('page4')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">

                <div class="box-header with-border">
                    <h3 class="box-title">Education</h3>
                    <button type="button" class="btn btn-secondary pull-right" data-toggle="tooltip"
                            data-placement="bottom"
                            title="If you are attending School/Collage you can leave Grade and endTime inputs of that row block">
                        <i class="fa fa-info-circle fa-lg"></i>
                    </button>
                </div>

                <div class="table-responsive-sm">

                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>Institute</th>
                            <th>Location</th>
                            <th>Level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="myTooltip"><i class="fa fa-info-circle"></i>
                                    <span class="mytooltiptext">Write full education level, Eg:SLC/+2/Bachelor in civil Engineering...</span>
                                </div>
                            </th>
                            <th>Grade</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody id="appendEducationHere">
                        @forelse($education as $value)
                            <tr>
                                <td><input type="text" name="institute[]" value="{{$value->institute}}"></td>
                                <td><input type="text" name="location[]" value="{{$value->location}}"></td>
                                <td><input type="text" name="subject[]" value="{{$value->subject}}"></td>
                                <td><input type="text" placeholder="eg:80% or 2.7gpa" name="grade[]"
                                           value="{{$value->grade}}"></td>
                                <td><input type="date" name="startTime[]" value="{{$value->startTime}}"></td>
                                <td><input type="date" name="endTime[]" value="{{$value->endTime}}"></td>
                                <td>
                                    <button class="btn btn-danger removeEdu"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <input class="checkThis" type="checkbox"
                                           @if($value->attending==='true') checked @endif>
                                    <b>Attending</b>
                                    <input class="checkThen" type="hidden" name="attending[]"
                                           value="{{$value->attending}}">
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td><input type="text" name="institute[]"></td>
                                <td><input type="text" name="location[]"></td>
                                <td><input type="text" name="subject[]"></td>
                                <td><input type="text" placeholder="eg:80% or 2.7gpa" name="grade[]"></td>
                                <td><input type="date" name="startTime[]"></td>
                                <td><input type="date" name="endTime[]"></td>
                                <td>
                                    <button class="btn btn-danger removeEdu"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <input class="checkThis" type="checkbox"> <b>Attending</b>
                                    <input class="checkThen" type="hidden" name="attending[]" value="false">
                                </td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>
                <button id="addEducation" class="btn btn-success btn-block">Add Education</button>
                <br>
                <a href="{{route('page3')}}" class="btn btn-default">back</a>
                <button class="btn btn-default pull-right" type="submit">next</button>
            </div>
        </form>
        <!-- /input-group -->
    </div>
    <!-- /.box-body -->
@endsection
@section('my-footer')

    <script>
        $(function () {
            $('#addEducation').on('click', function (e) {
                e.preventDefault();
                var appendTrEdu = "   <tr>\n" +
                    "                            <td><input type=\"text\" name=\"institute[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"location[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"subject[]\"></td>\n" +
                    "                            <td><input type=\"text\" placeholder=\"eg:80% or 2.7gpa\" name=\"grade[]\"></td>\n" +
                    "                            <td><input type=\"date\" name=\"startTime[]\"></td>\n" +
                    "                            <td><input type=\"date\" name=\"endTime[]\"></td>\n" +
                    "                            <td>\n" +
                    "                                <button class=\"btn btn-danger removeEdu\"><i class=\"fa fa-trash\"></i></button>\n" +
                    "                            </td>\n" +
                    "                            <td>\n" +
                    "                                <input class=\"checkThis\" type=\"checkbox\"> <b>Attending</b>\n" +
                    "                                <input class=\"checkThen\" type=\"hidden\" name=\"attending[]\" value=\"false\">\n" +
                    "                            </td>\n" +
                    "                        </tr>\n";
                $('#appendEducationHere').append(appendTrEdu);
                attending();
                removeEdu();
            });
            removeEdu();
            attending();


            function removeEdu() {
                $('.removeEdu').on('click', function (e) {
                    e.preventDefault();
                    var test = $(this).parent().parent().remove();
                    addRemove();
                })
                addRemove();
            }

            function addRemove() {
                $checkOne = $('#appendEducationHere').find('tr').length;
                if ($checkOne < 2) {
                    $('.removeEdu').hide();
                } else {
                    $('.removeEdu').show();
                }
            }

            function attending() {
                $(".checkThis").on('click', function () {
                    var test = $(this).is(':checked');
                    console.log(test);
                    var test1 = $(this).parent().find('.checkThen');
                    console.log(test1);
                    if (test === true) {
                        test1.val('true');
                    } else {
                        test1.val('false');
                    }
                    console.log(test1.val())
                })
            }


        })

    </script>


    <script>
        $(function () {
            $("#myEducation").submit(function () {
                $('#myInnerBar').css({'width': '58%'})
            });
        })
    </script>


    {{--<script>--}}
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
    {{--</script>--}}



@endsection

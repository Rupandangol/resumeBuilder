@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:58%;background-color:#3F51B5">60%
        </div>
    </div>
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection

@section('my-header')
    <link rel="stylesheet" href="{{url('/css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('/css/tooltip.css')}}">
@endsection

@section('content')
    <div class="box box-info">
        {{--errorMsg--}}
        @if($errors->has('jobTitle.*')||$errors->has('companyName.*')||$errors->has('location.*')||$errors->has('startTime.*')||$errors->has('endTime.*')||$errors->has('jobSummary.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif
        {{--personal details--}}
        <form id="myExp" action="{{route('page5')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">

                <div class="box-header with-border">
                    <h3 class="box-title">Experience</h3>
                    <button type="button" class="btn btn-secondary pull-right" data-toggle="tooltip"
                            data-placement="bottom"
                            title="If you are Currently involved in some Organization then leave End Time box of that row">
                        <i class="fa fa-info-circle fa-lg "></i>
                    </button>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <td>Job Title</td>
                            <td>Company Name</td>
                            <td>Location</td>
                            <td>Start Time</td>
                            <td>End Time</td>
                            <td>Job Summary
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="myTooltip"><i class="fa fa-info-circle"></i>
                                    <span class="mytooltiptext">Write brief Job Summary</span>
                                </div>

                            </td>
                        </tr>
                        </thead>
                        <tbody id="appendExperienceHere">

                        <?php
                        $oldExp = old('jobTitle') ?? [];
                        ?>
                        @forelse($experience as $value)
                            <tr>
                                <td><input class="expBlock form-control" type="text" value="{{$value->jobTitle}}"
                                           name="jobTitle[]">
                                </td>
                                <td><input class="expBlock form-control" type="text" value="{{$value->companyName}}"
                                           name="companyName[]"></td>
                                <td><input class="expBlock form-control" type="text" value="{{$value->location}}"
                                           name="location[]">
                                </td>
                                <td><input class="expBlock" type="date" style="width: 135px;"
                                           value="{{$value->startTime}}" name="startTime[]"></td>
                                <td><input class="expBlock" type="date" style="width: 135px;"
                                           value="{{$value->endTime}}" name="endTime[]"></td>
                                <td>
                                    <textarea name="jobSummary[]" style="resize: none" class="form-control" id=""
                                              rows="4">{{$value->jobSummary}}</textarea>

                                </td>

                                <td>
                                    <button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <input class="checkExp" type="checkbox"
                                           @if($value->current==='true')
                                           checked
                                            @endif> <b>Current</b>
                                    <input class="checkExpThis" name="current[]" value="{{$value->current}}"
                                           type="hidden">
                                </td>
                            </tr>

                        @empty
                            @forelse($oldExp as $key=>$value)
                                <tr>
                                    <td><input class="expBlock form-control" type="text"
                                               value="{{old('jobTitle')[$key]??''}}"
                                               name="jobTitle[]">
                                    </td>
                                    <td><input class="expBlock form-control" type="text"
                                               value="{{old('companyName')[$key]??''}}"
                                               name="companyName[]"></td>
                                    <td><input class="expBlock form-control" type="text"
                                               value="{{old('location')[$key]??''}}"
                                               name="location[]">
                                    </td>
                                    <td><input class="expBlock" type="date" style="width: 135px;"
                                               value="{{old('startTime')[$key]??''}}" name="startTime[]"></td>
                                    <td><input class="expBlock myEndTime" type="date" style="width: 135px;"
                                               value="{{old('endTime')[$key]??''}}" name="endTime[]"></td>
                                    <td>
                                    <textarea name="jobSummary[]" style="resize: none" class="form-control" id=""
                                              rows="4">{{old('jobSummary')[$key]??''}}</textarea>

                                    </td>

                                    <td>
                                        <button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <input class="checkExp" type="checkbox"
                                               @if(old('current')[$key]==='true')
                                               checked
                                                @endif> <b>Current</b>
                                        <input class="checkExpThis" name="current[]" value="{{old('current')[$key]}}"
                                               type="hidden">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td><input class="expBlock form-control" type="text" name="jobTitle[]"></td>
                                    <td><input class="expBlock form-control" type="text" name="companyName[]"></td>
                                    <td><input class="expBlock form-control" type="text" name="location[]"></td>
                                    <td><input class="expBlock" type="date" style="width: 135px;" name="startTime[]">
                                    </td>
                                    <td><input class="expBlock myEndTime" type="date" style="width: 135px;"
                                               required name="endTime[]"></td>
                                    <td>
                                        {{--<input class="expBlock" type="text" style="height: 80px;" name="jobSummary[]">--}}
                                        <textarea class="form-control" name="jobSummary[]" style="resize: none" id=""
                                                  rows="4"></textarea>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <input class="checkExp" type="checkbox"> <b>Current</b>
                                        <input class="checkExpThis" name="current[]" value="false" type="hidden">
                                    </td>
                                </tr>

                            @endforelse

                        @endforelse


                        </tbody>


                    </table>
                </div>
                <button id="addExp" type="button" class="btn btn-success btn-block">Add New Experience</button>
                <br>
                <a href="{{route('page4')}}" class="btn btn-primary ">Back</a>
                <button id="expButton" class="btn btn-primary pull-right" type="submit">Next</button>
                <a href="{{route('skipExp')}}" onclick="return confirm('Are you sure you want to skip?')" class="btn btn-primary pull-right">Skip</a>

            </div>

        </form>
        <!-- /input-group -->
    </div>
    <!-- /.box-body -->
@endsection
@section('my-footer')

    <script>
        $(function () {

            $('#addExp').on('click', function (e) {
                e.preventDefault();
                var appendTrExperience = "<tr>\n" +
                    "                                <td><input class=\"expBlock form-control\" type=\"text\" name=\"jobTitle[]\"></td>\n" +
                    "                                <td><input class=\"expBlock form-control\" type=\"text\" name=\"companyName[]\"></td>\n" +
                    "                                <td><input class=\"expBlock form-control\" type=\"text\" name=\"location[]\"></td>\n" +
                    "                                <td><input class=\"expBlock\" type=\"date\" style=\"width: 135px;\" name=\"startTime[]\"></td>\n" +
                    "                                <td><input class=\"expBlock myEndTime\" type=\"date\" style=\"width: 135px;\" name=\"endTime[]\"></td>\n" +
                    "                                <td>\n" +
                    "                                    {{--<input class=\"expBlock\" type=\"text\" style=\"height: 80px;\" name=\"jobSummary[]\">--}}\n" +
                    "                                    <textarea class=\"form-control\" name=\"jobSummary[]\" style=\"resize: none\" id=\"\" rows=\"4\"></textarea>\n" +
                    "                                </td>\n" +
                    "                                <td>\n" +
                    "                                    <button class=\"btn btn-danger removeExperience\"><i class=\"fa fa-trash\"></i></button>\n" +
                    "                                </td>\n" +
                    "                                <td>\n" +
                    "                                    <input class=\"checkExp\" type=\"checkbox\"> <b>Current</b>\n" +
                    "                                    <input class=\"checkExpThis\" name=\"current[]\" value=\"false\" type=\"hidden\">\n" +
                    "                                </td>\n" +
                    "                            </tr>";

                $('#appendExperienceHere').append(appendTrExperience);
                currentExp();
                removeExperience();
                enterKey();

            });
            currentExp();
            removeExperience();

            function removeExperience() {
                $('.removeExperience').on('click', function (e) {
                    e.preventDefault();
                    var test = $(this).parent().parent().remove();
                    addRemove();
                });
                addRemove();
            }


            function addRemove() {
                var checkOne = $('#appendExperienceHere').find('tr').length;
                if (checkOne < 2) {
                    $('.removeExperience').hide();
                } else {
                    $('.removeExperience').show();
                }
            }

            function currentExp() {
                $(".checkExp").on('click', function () {
                    var test = $(this).is(':checked');
                    console.log(test);
                    var test2 = $(this).parent().find('.checkExpThis');
                    console.log(test2);
                    if (test === true) {
                        test2.val('true');
                        $('.myEndTime').removeAttr('required');
                    } else {
                        test2.val('false');
                        $('.myEndTime').prop('required', true);

                    }
                    console.log(test2.val());
                })
            }

            function enterKey() {
                $('.expBlock').on('keypress', function (e) {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                        $('#expButton').click();
                    }
                })
            }

            enterKey();

        });
    </script>
    <script>
        $(function () {
            $("#myExp").submit(function () {
                $('#myInnerBar').css({'width': '72.5%'})
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

@extends('Frontend.master')

@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
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
        <form action="{{route('page5')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">

                <div class="box-header with-border">
                    <h3 class="box-title">Experience</h3>
                </div>
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <td>JobTitle</td>
                        <td>Company Name</td>
                        <td>Location</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Job Summary</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody id="appendExperienceHere">
                    @forelse($experience as $value)
                        <tr>
                            <td><input type="text" value="{{$value->jobTitle}}" name="jobTitle[]"></td>
                            <td><input type="text" value="{{$value->companyName}}" name="companyName[]"></td>
                            <td><input type="text" value="{{$value->location}}" name="location[]"></td>
                            <td><input type="date" value="{{$value->startTime}}" name="startTime[]"></td>
                            <td><input type="date" value="{{$value->endTime}}" name="endTime[]"></td>
                            <td><input type="text" value="{{$value->jobSummary}}" name="jobSummary[]"></td>
                            <td>
                                <button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td><input type="text" name="jobTitle[]"></td>
                            <td><input type="text" name="companyName[]"></td>
                            <td><input type="text" name="location[]"></td>
                            <td><input type="date" name="startTime[]"></td>
                            <td><input type="date" name="endTime[]"></td>
                            <td><input type="text" name="jobSummary[]"></td>
                            <td>
                                <button class="btn btn-danger removeExperience"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                    @endforelse


                    </tbody>


                </table>
                <button id="addExp" type="button" class="btn btn-success btn-block">Add Experience</button>
                <br>
                <a href="{{route('page4')}}" class="btn btn-default">back</a>
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

            $('#addExp').on('click', function (e) {
                e.preventDefault();
                var appendTrExperience = " <tr>\n" +
                    "                            <td><input type=\"text\" name=\"jobTitle[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"companyName[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"location[]\"></td>\n" +
                    "                            <td><input type=\"date\" name=\"startTime[]\"></td>\n" +
                    "                            <td><input type=\"date\" name=\"endTime[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"jobSummary[]\"></td>\n" +
                    "                            <td>\n" +
                    "                                <button class=\"btn btn-danger removeExperience\"><i class=\"fa fa-trash\"></i></button>\n" +
                    "                            </td>\n" +
                    "                        </tr>";

                $('#appendExperienceHere').append(appendTrExperience);

                removeExperience();

            });
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

        });
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

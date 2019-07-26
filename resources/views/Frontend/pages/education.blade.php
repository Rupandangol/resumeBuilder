@extends('Frontend.master')

@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
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
        <form action="{{route('page4')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">


                <div class="box-header with-border">
                    <h3 class="box-title">Education</h3>
                </div>
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th>Institute</th>
                        <th>Location</th>
                        <th>Grade</th>
                        <th>Level</th>
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
                            <td><input type="text" name="grade[]" value="{{$value->grade}}"></td>
                            <td><input type="text" name="startTime[]" value="{{$value->startTime}}"></td>
                            <td><input type="text" name="endTime[]" value="{{$value->endTime}}"></td>
                            <td>
                                <button class="btn btn-danger removeEdu"><i class="fa fa-trash"></i></button>
                            </td>
                            <td>
                                <input name="checkMe" type="checkbox"> <b>Check me out</b>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td><input type="text" name="institute[]"></td>
                            <td><input type="text" name="location[]"></td>
                            <td><input type="text" name="subject[]"></td>
                            <td><input type="text" name="Grade[]"></td>
                            <td><input type="text" name="startTime[]"></td>
                            <td><input type="text" name="endTime[]"></td>
                            <td>
                                <button class="btn btn-danger removeEdu"><i class="fa fa-trash"></i></button>
                            </td>
                            <td>
                                <input name="checkMe" type="checkbox"> <b>Check me out</b>
                            </td>
                        </tr>


                    @endforelse

                    </tbody>

                </table>
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
                var appendTrEdu = "<tr>\n" +
                    "                            <td><input type=\"text\" name=\"institute[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"location[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"subject[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"Grade[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"startTime[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"endTime[]\"></td>\n" +
                    "                            <td>\n" +
                    "                                <button class=\"btn btn-danger removeEdu\"><i class=\"fa fa-trash\"></i></button>\n" +
                    "                            </td>\n" +
                    "                            <td>\n" +
                    "                                <input name=\"checkMe\" type=\"checkbox\"> <b>Check me out</b>\n" +
                    "                            </td>\n" +
                    "                        </tr>";

                $('#appendEducationHere').append(appendTrEdu);
                removeEdu();
            });
            removeEdu();


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

@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress" style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:29%;background-color:#3F51B5"">
        </div>
    </div>
@endsection


@section('my-header')
    <link rel="stylesheet" href="{{url('/css/tooltip.css')}}">
    <style type="text/css">
        .table-responsive-sm {
                min-width: 240px;
                /*max-width: 560px;*/
                width: inherit;
                /*overflow-x: scroll;*/
                /*background: red;*/
            }
        @media only screen and (max-width: 560px) {
            .table-responsive-sm {
                overflow-x: scroll;
            }
        }
    </style>
@endsection



@section('contentHeader')
    <br><br><br><h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="box box-info">

        @if($errors->has('skill.*')||$errors->has('skillLevel.*')||$errors->has('about.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif

        {{--personal details--}}
        <form id="mySkill" action="{{route('page3')}}" method="post">
            {{csrf_field()}}

            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Skill</h3>
                </div>
<div class="table-responsive-sm">
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Skill Level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="myTooltip"><i class="fa fa-info-circle"></i>
                                <span class="mytooltiptext">Enter 1% to 100%</span>
                            </div>
                        </th>
                        <th>About</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <tbody id="appendDataHere">

                    @forelse($skill as $value)
                        <tr>
                            <td><input type="text" name="skill[]" value="{{$value->skill}}"></td>
                            <td><input style="width: 100px;" placeholder="eg:60%" type="number" min="1" max="100"
                                       name="skillLevel[]" value="{{$value->skillLevel}}"></td>
                            <td><input type="text" name="about[]" value="{{$value->about}}"></td>

                            <td>
                                <button id="remove-appended" class="btn btn-danger remove-appended"><i
                                            class="fa fa-trash"></i></button>
                            </td>

                        </tr>


                    @empty
                        <tr>
                            <td><input type="text" name="skill[]"></td>
                            <td><input style="width: 100px" type="number" min="1" max="100" name="skillLevel[]"></td>
                            <td><input type="text" name="about[]"></td>

                            <td>
                                <button id="remove-appended" class="btn btn-danger remove-appended"><i
                                            class="fa fa-trash"></i></button>
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>
</div>
                <br>
                <button type="button" id="addCV" class="btn btn-success btn-block">Add Skill</button>
                <br>
                {{--<div id="deleteThis">--}}
                {{--<div id="skill" class="skill">--}}

                {{--</div>--}}
                {{--<input type="hidden" name="id" value="">--}}

                {{--<div class="box-footer">--}}
                {{--<a href="{{route('page2')}}" class="btn btn-primary">Back</a>--}}
                {{--<button type="submit" class="btn btn-primary">Next</button>--}}
                {{--</div>--}}
                {{--</div>--}}

                <a href="{{route('page2')}}" style="border-radius: 24px" class="btn btn-default">Back</a>
                <button style="border-radius: 24px" type="submit" class="btn btn-default pull-right">Next</button>
            </div>

        </form>
    </div>
@endsection
@section('my-footer')

    <script>
        $(function () {
            $('#addCV').on('click', function (e) {
                e.preventDefault();
                var appendTr = "<tr>\n" +
                    "                            <td><input type=\"text\" name=\"skill[]\"></td>\n" +
                    "                            <td><input style=\"width: 100px\" type=\"number\" min=\"1\" max=\"100\" name=\"skillLevel[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"about[]\"></td>\n" +
                    "\n" +
                    "                            <td>\n" +
                    "                                <button id=\"remove-appended\" class=\"btn btn-danger remove-appended\"><i\n" +
                    "                                            class=\"fa fa-trash\"></i></button>\n" +
                    "                            </td>\n" +
                    "\n" +
                    "                        </tr>";

                $('#appendDataHere').append(appendTr);
                removeAppend();
            });
            removeAppend();

            function removeAppend() {
                $('.remove-appended').on('click', function (e) {
                    e.preventDefault();
                    var test = $(this).parent().parent().remove();

                    addRemove();
                });
                addRemove();
            }

            function addRemove() {
                var checkOne = $('#appendDataHere').find('tr').length;
                console.log(checkOne);
                if (checkOne < 2) {
                    $('.remove-appended').hide();
                } else {
                    $('.remove-appended').show();

                }
            }

        });
    </script>

    <script>
        $(function () {
            $("#mySkill").submit(function () {
                $('#myInnerBar').css({'width': '43.5%'})
            })
        })
    </script>




    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--var count = 1;--}}
    {{--dynamic_field(count);--}}

    {{--function dynamic_field(number) {--}}

    {{--html = '<div class="sub">';--}}
    {{--html += '<div class="row">';--}}
    {{--html += '<div class="form-group col-md-6">';--}}
    {{--html += '<label for="exampleInputEmail1">Skill</label>';--}}
    {{--html += '<input type="text" class="form-control" name="skill[]" id="" placeholder="Referee Name">';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="form-group col-md-6">';--}}
    {{--html += '<label for="exampleInputEmail1">Skill Level</label>';--}}
    {{--html += '<input type="text" class="form-control" name="skillLevel[]" id="" placeholder="Referee Name">';--}}
    {{--html += '</div>';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="form-group">';--}}
    {{--html += '<label>About</label>';--}}
    {{--html += '<textarea class="form-control" rows="3" name="about" placeholder="Enter ..."></textarea>';--}}
    {{--html += '</div>';--}}


    {{--if (number > 1) {--}}
    {{--html += '<button type="button" name="remove" style="margin-left: 90%" id="" class="btn btn-danger remove">Remove</button>';--}}
    {{--html += "</div>";--}}
    {{--$('.skill').append(html);--}}
    {{--}--}}
    {{--else {--}}
    {{--html += '<button type="button" name="add" style="margin-left: 90%" id="add" class="btn btn-success">Add</button>';--}}
    {{--html += "</div>";--}}
    {{--$('.skill').html(html);--}}
    {{--}--}}
    {{--}--}}

    {{--$(document).on('click', '#add', function () {--}}
    {{--count++;--}}
    {{--dynamic_field(count);--}}
    {{--});--}}

    {{--$(document).on('click', '.remove', function () {--}}
    {{--count--;--}}
    {{--$(this).closest(".sub").remove();--}}
    {{--});--}}
    {{--})--}}
    {{--</script>--}}
@endsection
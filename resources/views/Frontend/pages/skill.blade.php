@extends('Frontend.master')
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="box box-info">

        <?php
        $skills = [];
        ?>

        {{--personal details--}}
        <form action="{{route('page3')}}" method="post">
            {{csrf_field()}}

            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Skill</h3>
                </div>

                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Skill Level</th>
                        <th>About</th>
                        <th>Action</th>

                    </tr>
                    </thead>

                    <tbody id="appendDataHere">

                    @forelse($skills as $value)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    @empty
                        <tr>
                            <td><input type="text" name="skill[]"></td>
                            <td><input type="text" name="skillLevel[]"></td>
                            <td><input type="text" name="about[]"></td>
                            <input type="hidden" name="id" value="">

                            <td>
                                <button id="remove-appended" class="btn btn-danger remove-appended"><i
                                            class="fa fa-trash"></i></button>
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>
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
                <button style="border-radius: 24px" type="submit" class="btn btn-default pull-right" >Next</button>
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
                    "                            <td><input type=\"text\" name=\"skillLevel[]\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"about[]\"></td>\n" +
                    "                            <td>\n" +
                    "                                <button id=\"remove-appended\" class=\"btn btn-danger remove-appended\"><i class=\"fa fa-trash\"></i></button>\n" +
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
@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:60%;background-color:#3F51B5"><strong>60%</strong>
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
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew"> Generator</b></h2>
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
        <div class="box-header with-border">
            <h3 class="box-title">Skill</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="mySkill" method="post" action="{{route('page3')}}">
            {{csrf_field()}}
            <div class="box-body">
                <div class="myBody">
                    @forelse($skill as $value)


                        <div class="addedBlock">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="skill">Skill</label>
                                    <input name="skill[]" type="text" value="{{$value->skill}}"
                                           class="form-control enterSki" id=""
                                           placeholder="Enter Skill, Eg:Communication Skill/ JavaScript">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="skillLevel">Skill Level</label>
                                    <input name="skillLevel[]" type="number" value="{{$value->skillLevel}}" max="100"
                                           min="1" class="form-control enterSki" id=""
                                           placeholder="Enter From 1 To 100, Eg:80">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea style="resize: none" placeholder="Detail about Skill..."
                                          class="ckeditor form-control"
                                          name="about[]" id="" rows="3">{{$value->about}}</textarea>
                            </div>
                            <div style="text-align: right">
                            <button class="btn btn-danger myRemoveButton "><i class="fa fa-trash"></i></button>
                            </div>
                            <hr style="border-color: #00BCD4">
                        </div>
                        <!-- /.box-body -->

                    @empty
                        <?php
                        $oldSkills = old('skill') ?? [];?>
                        @forelse($oldSkills as $key=>$value)
                            <div class="addedBlock">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="skill">Skill</label>
                                        <input name="skill[]" type="text" value="{{old('skill')[$key]??''}}"
                                               class="form-control enterSki" id=""
                                               placeholder="Enter Skill, Eg:Communication Skill/ JavaScript">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="skillLevel">Skill Level</label>
                                        <input name="skillLevel[]" type="number" value="{{old('skillLevel')[$key]??''}}"
                                               max="100" min="1" class="form-control enterSki" id=""
                                               placeholder="Enter From 1 To 100, Eg:80">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea style="resize: none" placeholder="Detail about Skill..."
                                              class="form-control ckeditor"
                                              name="about[]" id="" rows="3"></textarea>
                                </div>
                                <div style="text-align: right">
                                <button class="btn btn-danger myRemoveButton"><i
                                            class="fa fa-trash"> {{old('about')[$key]??''}}</i></button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                            <!-- /.box-body -->

                        @empty
                            <div class="addedBlock">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="skill">Skill</label>
                                        <input name="skill[]" type="text" class="form-control enterSki" id=""
                                               placeholder="Enter Skill, Eg:Communication Skill/ JavaScript">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="skillLevel">Skill Level</label>
                                        <input name="skillLevel[]" type="number" max="100" min="1"
                                               class="form-control enterSki" id=""
                                               placeholder="Enter From 1 To 100, Eg:80">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea  style="resize: none" placeholder="Detail about Skill..."
                                              class="form-control ckeditor"
                                              name="about[]" id="" rows="3"></textarea>
                                </div>
                                <div style="text-align: right">
                                <button class="btn btn-danger myRemoveButton"><i class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                            <!-- /.box-body -->

                        @endforelse
                    @endforelse
                </div>
                <button id="addNewSkill" class="form-control btn btn-success btn-sm ">Add New Skill
                </button>

                <div class="box-footer">
                    <a href="{{route('page8')}}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary pull-right">Next</button>
                </div>
            </div>
        </form>


        @endsection
        @section('my-footer')

            <script>
                $(function () {

                    $('#addNewSkill').on('click', function (e) {
                        e.preventDefault();

                        var BlockCount = $('.myBody').find('.addedBlock').length |50;

                        var appendBlock = "<div class=\"addedBlock\">\n" +
                            "                                <div class=\"row\">\n" +
                            "                                    <div class=\"form-group col-md-6\">\n" +
                            "                                        <label for=\"skill\">Skill</label>\n" +
                            "                                        <input name=\"skill[]\" type=\"text\" class=\"form-control enterSki\" id=\"\"\n" +
                            "                                               placeholder=\"Enter Skill, Eg:Communication Skill/ JavaScript\">\n" +
                            "                                    </div>\n" +
                            "                                    <div class=\"form-group col-md-6\">\n" +
                            "                                        <label for=\"skillLevel\">Skill Level</label>\n" +
                            "                                        <input name=\"skillLevel[]\" type=\"number\" max=\"100\" min=\"1\"\n" +
                            "                                               class=\"form-control enterSki\" id=\"\"\n" +
                            "                                               placeholder=\"Enter From 1 To 100, Eg:80\">\n" +
                            "                                    </div>\n" +
                            "                                </div>\n" +
                            "                                <div class=\"form-group\">\n" +
                            "                                    <label for=\"about\">About</label>\n" +
                            "                                    <textarea  style=\"resize: none\" placeholder=\"Detail about Skill...\"\n" +
                            "                                              id='ckeditor-"+BlockCount+"' class=\"form-control ckeditor\"\n" +
                            "                                              name=\"about[]\" id=\"\" rows=\"3\"></textarea>\n" +
                            "                                </div>\n" +
                            "                                <div style=\"text-align: right\">\n" +
                            "                                <button class=\"btn btn-danger myRemoveButton\"><i class=\"fa fa-trash\"></i></button>\n" +
                            "                                </div>\n" +
                            "                                <hr style=\"border-color: #00BCD4\">\n" +
                            "                            </div>";
                        $('.myBody').append(appendBlock);
                        CKEDITOR.replace('ckeditor-'+BlockCount);
                        removeAddedBlock();
                        countAddedBlock();
                        enterSki();
                    });

                    function removeAddedBlock() {
                        $('.myRemoveButton').on('click', function (e) {
                            e.preventDefault();
                            var test = $(this).parent().parent().remove();

                            countAddedBlock();
                        });

                    }

                    removeAddedBlock();

                    function countAddedBlock() {
                        var checkOneBody = $('.myBody').find('.addedBlock').length;
                        console.log(checkOneBody);
                        if (checkOneBody < 2) {
                            $('.myRemoveButton').hide();
                        } else {
                            $('.myRemoveButton').show();

                        }
                    }

                    countAddedBlock();

                    function enterSki() {
                        $('.enterSki').on('keypress', function (e) {
                            if (e.keyCode === 13) {
                                e.preventDefault();
                            }
                        })
                    }

                    enterSki();


                })
            </script>










            {{--<script>--}}
                {{--$(function () {--}}
                    {{--$('#addCV').on('click', function (e) {--}}
                        {{--e.preventDefault();--}}
                        {{--var appendTr = "<tr>\n" +--}}
                            {{--"                                    <td><input class=\"skillBlock\" type=\"text\" name=\"skill[]\"></td>\n" +--}}
                            {{--"                                    <td><input class=\"skillBlock\" style=\"width: 100px\" type=\"number\" min=\"1\" max=\"100\"\n" +--}}
                            {{--"                                               name=\"skillLevel[]\">\n" +--}}
                            {{--"                                    </td>\n" +--}}
                            {{--"                                    <td>\n" +--}}
                            {{--"                                        --}}{{--<input class=\"skillBlock\" type=\"text\" style=\"width: 300px;height: 50px;\"--}}{{--\n" +--}}
                            {{--"                                        --}}{{--name=\"about[]\">--}}{{--\n" +--}}
                            {{--"                                        <textarea style=\"resize: none\" class=\"form-control\" name=\"about[]\" id=\"\"\n" +--}}
                            {{--"                                                  rows=\"4\"></textarea></td>\n" +--}}
                            {{--"                                    <td>\n" +--}}
                            {{--"                                        <button id=\"remove-appended\" class=\"btn btn-danger remove-appended\"><i\n" +--}}
                            {{--"                                                    class=\"fa fa-trash\"></i></button>\n" +--}}
                            {{--"                                    </td>\n" +--}}
                            {{--"                                </tr>";--}}

                        {{--$('#appendDataHere').append(appendTr);--}}
                        {{--removeAppend();--}}
                        {{--enterKey();--}}
                    {{--});--}}
                    {{--removeAppend();--}}

                    {{--function removeAppend() {--}}
                        {{--$('.remove-appended').on('click', function (e) {--}}
                            {{--e.preventDefault();--}}
                            {{--var test = $(this).parent().parent().remove();--}}
                            {{--addRemove();--}}
                        {{--});--}}
                        {{--addRemove();--}}
                    {{--}--}}

                    {{--function addRemove() {--}}
                        {{--var checkOne = $('#appendDataHere').find('tr').length;--}}
                        {{--if (checkOne < 2) {--}}
                            {{--$('.remove-appended').hide();--}}
                        {{--} else {--}}
                            {{--$('.remove-appended').show();--}}

                        {{--}--}}
                    {{--}--}}

                    {{--function enterKey() {--}}
                        {{--$('.skillBlock').on('keypress', function (e) {--}}
                            {{--if (e.keyCode === 13) {--}}
                                {{--e.preventDefault();--}}
                                {{--$('#skillButton').click();--}}
                            {{--}--}}
                        {{--})--}}
                    {{--}--}}

                    {{--enterKey();--}}
                {{--});--}}
            {{--</script>--}}


            <script>
                $(function () {
                    $("#mySkill").submit(function () {
                        $('#myInnerBar').css({'width': '70%'})
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
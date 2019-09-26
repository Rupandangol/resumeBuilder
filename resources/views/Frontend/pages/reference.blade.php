@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:80%;background-color:#3F51B5"><strong>80%</strong>
        </div>
    </div>
@endsection

@section('my-header')
    <link rel="stylesheet" href="{{URL::to('/css/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::to('/css/tooltip.css')}}">
@endsection

@section('contentHeader')
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew"> Generator</b></h2>
@endsection
@section('content')

    {{--<div class="box box-info">--}}
    {{--errorMessage--}}

    {{--personal details--}}
    {{--<form id="myRef" action="" method="post">--}}
    {{--{{csrf_field()}}--}}
    {{--<div class="box-body">--}}
    {{--<div class="box-header with-border">--}}
    {{--<h3 class="box-title">Reference &nbsp;&nbsp;&nbsp;&nbsp;--}}

    {{--</h3>--}}
    {{--<button type="button" class="btn btn-secondary pull-right" data-toggle="tooltip"--}}
    {{--data-placement="bottom"--}}
    {{--title="When you apply for a job, you will be asked for a ‘reference’. This would be provided by a ‘referee’ - usually someone who you know well, for example your tutor, teacher, or an employer – but not a member of your family. You should always ask permission from the person you are asking before you give their name as your referee.">--}}
    {{--<i class="fa fa-info-circle fa-lg "></i>--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--<div class="table-responsive-sm">--}}
    {{--<table class="table table-borderless table-hover">--}}

    {{--<thead>--}}
    {{--<tr>--}}
    {{--<td>Full Name</td>--}}
    {{--<td>Designation</td>--}}
    {{--<td>Company Name</td>--}}
    {{--<td>Contact Number</td>--}}
    {{--<td>Email</td>--}}

    {{--</tr>--}}
    {{--</thead>--}}

    {{--<tbody id="appendReferenceHere">--}}


    {{--@forelse($references as $value)--}}
    {{--<tr>--}}
    {{--<td><input class="refBlock" type="text" value="{{$value->name}}" name="name[]"></td>--}}
    {{--<td><input class="refBlock" type="text" value="{{$value->designation}}"--}}
    {{--name="designation[]"></td>--}}
    {{--<td><input class="refBlock" type="text" value="{{$value->companyName}}"--}}
    {{--name="companyName[]"></td>--}}
    {{--<td><input class="refBlock" type="number" value="{{$value->contactNumber}}"--}}
    {{--name="contactNumber[]"></td>--}}
    {{--<td><input class="refBlock" type="email" value="{{$value->email}}" name="email[]"></td>--}}
    {{--<td>--}}
    {{--<button id="removeReference" type="button" class="btn btn-danger removeReference"><i--}}
    {{--class="fa fa-trash"></i></button>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@empty--}}
    {{--@forelse($oldRef as $key=>$value)--}}
    {{--<tr>--}}
    {{--<td><input class="refBlock" type="text" value="{{old('name')[$key]??''}}"--}}
    {{--name="name[]"></td>--}}
    {{--<td><input class="refBlock" type="text" value="{{old('designation')[$key]??''}}"--}}
    {{--name="designation[]"></td>--}}
    {{--<td><input class="refBlock" type="text" value="{{old('companyName')[$key]??''}}"--}}
    {{--name="companyName[]"></td>--}}
    {{--<td><input class="refBlock" type="number" value="{{old('contactNumber')[$key]??''}}"--}}
    {{--name="contactNumber[]"></td>--}}
    {{--<td><input class="refBlock" type="email" value="{{old('email')[$key]??''}}"--}}
    {{--name="email[]"></td>--}}
    {{--<td>--}}
    {{--<button id="removeReference" type="button"--}}
    {{--class="btn btn-danger removeReference"><i--}}
    {{--class="fa fa-trash"></i></button>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@empty--}}
    {{--<tr>--}}
    {{--<td><input class="refBlock" type="text" name="name[]"></td>--}}
    {{--<td><input class="refBlock" type="text" name="designation[]"></td>--}}
    {{--<td><input class="refBlock" type="text" name="companyName[]"></td>--}}
    {{--<td><input class="refBlock" type="number" name="contactNumber[]"></td>--}}
    {{--<td><input class="refBlock" type="email" name="email[]"></td>--}}
    {{--<td>--}}
    {{--<button id="removeReference" type="button"--}}
    {{--class="btn btn-danger removeReference"><i--}}
    {{--class="fa fa-trash"></i></button>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@endforelse--}}


    {{--@endforelse--}}


    {{--</tbody>--}}

    {{--</table>--}}
    {{--</div>--}}
    {{--<button id="addReference" class="btn btn-success btn-block">Add New Reference</button>--}}
    {{--<br>--}}
    {{--<a href="{{route('page5')}}" style="border-radius: 24px" class="btn btn-primary">Back</a>--}}
    {{--<button style="border-radius: 24px" class="btn btn-primary pull-right" id="refButton">Next</button>--}}
    {{--<a href="{{route('skipRef')}}" onclick="return confirm('Are you sure you want to skip?')"--}}
    {{--style="border-radius: 24px" class="btn btn-primary pull-right">Skip</a>--}}

    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}

    <div class="box box-primary">
        @if($errors->has('name.*')||$errors->has('designation.*')||$errors->has('companyName.*')||$errors->has('contactNumber.*')||$errors->has('email.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif
        <div class="box-header with-border">
            <h3 class="box-title">Reference &nbsp;&nbsp;&nbsp;</h3>
            <div class="myTooltip"><i class="fa fa-info-circle fa-lg"></i>
                <span class="mytooltiptext">When you apply for a job, you will be asked for a ‘reference’. This would be provided by a ‘referee’ - usually someone who you know well, for example your tutor, teacher, or an employer – but not a member of your family. You should always ask permission from the person you are asking before you give their name as your referee.</span>
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="myRef" method="post" action="{{route('page6')}}">
            {{csrf_field()}}
            <div class="box-body">
                <div class="myBody">

                    @forelse($references as $value)
                        <div class="appendRef">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Full Name</label>
                                    <input type="text" value="{{$value->name}}" name="name[]"
                                           class="enterReference form-control" id=""
                                           placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Designation</label>
                                    <input type="text" value="{{$value->designation}}" name="designation[]"
                                           class="enterReference form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Company Name</label>
                                    <input type="text" value="{{$value->companyName}}" name="companyName[]"
                                            class="enterReference form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="">Email</label>
                                    <input type="email" value="{{$value->email}}" name="email[]"
                                           class="enterReference form-control"
                                           id="" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Contact Number</label>
                                    <input type="number" value="{{$value->contactNumber}}" name="contactNumber[]"
                                           class="enterReference form-control" id=""
                                           placeholder="">
                                </div>
                            </div>
                            <div style="text-align: right">
                                <button class="btn btn-danger removeReference"><i class="fa fa-trash"></i></button>
                            </div>
                            <hr style="border-color: #00BCD4">
                        </div>
                    @empty
                        <?php
                        $oldRef = old('name') ?? [];
                        ?>
                        @forelse($oldRef as $key=>$value)
                            <div class="appendRef">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Full Name</label>
                                        <input type="text" value="{{old('name')[$key]??''}}" name="name[]"
                                               class="enterReference form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Designation</label>
                                        <input type="text" value="{{old('designation')[$key]??''}}" name="designation[]"
                                               class="enterReference form-control" id=""
                                               placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Company Name</label>
                                        <input type="text" value="{{old('companyName')[$key]??''}}" name="companyName[]"
                                               class="enterReference form-control" id=""
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="">Email</label>
                                        <input type="email" value="{{old('email')[$key]??''}}" name="email[]"
                                               class="enterReference form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Contact Number</label>
                                        <input type="number" value="{{old('contactNumber')[$key]??''}}"
                                               name="contactNumber[]" class="enterReference form-control" id=""
                                               placeholder="">
                                    </div>
                                </div>
                                <div style="text-align: right">
                                    <button class="btn btn-danger removeReference"><i class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @empty
                            <div class="appendRef">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Full Name</label>
                                        <input type="text" name="name[]" class="enterReference form-control" id=""
                                               placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Designation</label>
                                        <input type="text" name="designation[]" class="enterReference form-control"
                                               id=""
                                               placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Company Name</label>
                                        <input type="text" name="companyName[]" class="enterReference form-control"
                                               id=""
                                               placeholder="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="">Email</label>
                                        <input type="email" name="email[]" class="enterReference form-control" id=""
                                               placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Contact Number</label>
                                        <input type="number" name="contactNumber[]" class="enterReference form-control"
                                               id=""
                                               placeholder="">
                                    </div>
                                </div>
                                <div style="text-align: right">
                                    <button class="btn btn-danger removeReference"><i class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @endforelse
                    @endforelse

                </div>
            </div>
            <span style="margin-left: 10px">
              By submitting you are agreeing to the <a href="{{route('Tac')}}">Terms and Condition.</a>
                </span>
            <button id="addNewRef" class="btn btn-success btn-sm btn-block"> Add New Reference</button>

            <!-- /.box-body -->

            <div class="box-footer">
                <a href="{{route('page9')}}" style="border-radius: 24px" class="btn btn-primary">Back</a>
                <button style="border-radius: 24px" class="btn btn-primary pull-right" id="refButton">Submit</button>
                <a href="{{route('skipRef')}}"
                   {{--onclick="return confirm('Are you sure you want to skip?')"--}}
                   style="border-radius: 24px" class="btn btn-primary pull-right">Skip</a>
            </div>
        </form>
    </div>
@endsection
@section('my-footer')

    <script>
        $(function () {
            $('#addNewRef').on('click', function (e) {
                e.preventDefault();
                var appendRef = "<div class=\"appendRef\">\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Full Name</label>\n" +
                    "                                        <input type=\"text\" name=\"name[]\" class=\"enterReference form-control\" id=\"\"\n" +
                    "                                               placeholder=\"\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Designation</label>\n" +
                    "                                        <input type=\"text\" name=\"designation[]\" class=\"enterReference form-control\"\n" +
                    "                                               id=\"\"\n" +
                    "                                               placeholder=\"\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Company Name</label>\n" +
                    "                                        <input type=\"text\" name=\"companyName[]\" class=\"enterReference form-control\"\n" +
                    "                                               id=\"\"\n" +
                    "                                               placeholder=\"\">\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div class=\"form-group col-md-8\">\n" +
                    "                                        <label for=\"\">Email</label>\n" +
                    "                                        <input type=\"email\" name=\"email[]\" class=\"enterReference form-control\" id=\"\"\n" +
                    "                                               placeholder=\"\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Contact Number</label>\n" +
                    "                                        <input type=\"number\" name=\"contactNumber[]\" class=\"enterReference form-control\"\n" +
                    "                                               id=\"\"\n" +
                    "                                               placeholder=\"\">\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <div style=\"text-align: right\">\n" +
                    "                                    <button class=\"btn btn-danger removeReference\"><i class=\"fa fa-trash\"></i></button>\n" +
                    "                                </div>\n" +
                    "                                <hr style=\"border-color: #00BCD4\">\n" +
                    "                            </div>";
                $('.myBody').append(appendRef);
                removeRef();
                countRef();
                onEnterRef();
            });

            function removeRef() {
                $('.removeReference').on('click', function (e) {
                    e.preventDefault();
                    var test = $(this).parent().parent().remove();
                    console.log(test);
                    countRef();

                })
            }

            removeRef();


            function countRef() {
                var test = $('.myBody').find('.appendRef').length;
                console.log(test);
                if (test < 2) {
                    $('.removeReference').hide();
                } else {
                    $('.removeReference').show();
                }
            }

            countRef();

            function onEnterRef() {
                $('.enterReference').on('keypress', function (e) {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                    }
                })
            }

            onEnterRef();
        });


    </script>


    <script>
        {{--$(function () {--}}
        {{--$('#addReference').on('click', function (e) {--}}
        {{--e.preventDefault();--}}
        {{--var appendTrRef = "  <tr>\n" +--}}
        {{--"                            <td><input class=\"refBlock\" type=\"text\" name=\"name[]\"></td>\n" +--}}
        {{--"                            <td><input class=\"refBlock\" type=\"text\" name=\"designation[]\"></td>\n" +--}}
        {{--"                            <td><input class=\"refBlock\" type=\"text\" name=\"companyName[]\"></td>\n" +--}}
        {{--"                            <td><input class=\"refBlock\" type=\"number\" name=\"contactNumber[]\"></td>\n" +--}}
        {{--"                            <td><input class=\"refBlock\" type=\"email\" name=\"email[]\"></td>\n" +--}}
        {{--"                            <td>\n" +--}}
        {{--"                                <button id=\"removeReference\" type=\"button\" class=\"btn btn-danger removeReference\"><i\n" +--}}
        {{--"                                            class=\"fa fa-trash\"></i></button>\n" +--}}
        {{--"                            </td>\n" +--}}
        {{--"                        </tr>";--}}
        {{--$('#appendReferenceHere').append(appendTrRef);--}}
        {{--removeAppend();--}}
        {{--});--}}
        {{--removeAppend();--}}


        {{--function removeAppend() {--}}
        {{--$('.removeReference').on('click', function (e) {--}}
        {{--e.preventDefault();--}}
        {{--var test = $(this).parent().parent().remove();--}}
        {{--addRemoveRef();--}}
        {{--});--}}
        {{--addRemoveRef();--}}
        {{--}--}}


        {{--function addRemoveRef() {--}}
        {{--var checkOne = $('#appendReferenceHere').find('tr').length;--}}
        {{--if (checkOne < 2) {--}}
        {{--$('.removeReference').hide()--}}
        {{--} else {--}}
        {{--$('.removeReference').show()--}}
        {{--}--}}
        {{--}--}}

        {{--function enterKey() {--}}
        {{--$('.refBlock').on('keypress', function (e) {--}}
        {{--if (e.keyCode === 13) {--}}
        {{--e.preventDefault();--}}
        {{--$('#refButton').click();--}}
        {{--}--}}
        {{--})--}}
        {{--}--}}

        {{--enterKey();--}}
        {{--})--}}
    </script>
    <script>
        $(function () {
            $("#myRef").submit(function () {
                $('#myInnerBar').css({'width': '90%'})
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
    {{--html += '<label for="exampleInputEmail1">Referee Name</label>';--}}
    {{--html += '<input type="text" class="form-control" name="referee[]" id="" placeholder="Referee Name">';--}}
    {{--html += '</div>';--}}
    {{--html += '<div class="form-group">';--}}
    {{--html += '<label>Referee Contact Details</label>';--}}
    {{--html += '<textarea class="form-control" rows="3" name="refereeContact[]" placeholder="Enter ..."></textarea>';--}}
    {{--html += '</div>';--}}
    {{--if (number > 1) {--}}
    {{--html += '<button type="button" name="remove" style="margin-left: 90%" id="" class="btn btn-danger remove">Remove</button>';--}}
    {{--html += "</div>";--}}
    {{--$('.reference').append(html);--}}
    {{--}--}}
    {{--else {--}}
    {{--html += '<button type="button" name="add" style="margin-left: 90%" id="add" class="btn btn-success">Add</button>';--}}
    {{--html += "</div>";--}}
    {{--$('.reference').html(html);--}}
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
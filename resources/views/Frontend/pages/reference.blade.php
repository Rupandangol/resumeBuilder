@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress" style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:72.5%;background-color:#3F51B5"">
        </div>
    </div>
@endsection

@section('contentHeader')
    <br><br><br><h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="box box-info">
        {{--errorMessage--}}
        @if($errors->has('referee.*')||$errors->has('refereeContact.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif
        {{--personal details--}}
        <form id="myRef" action="" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Reference</h3>
                </div>
                <table class="table table-borderless table-hover">

                    <thead>
                    <tr>
                        <td>Referee</td>
                        <td>Referee Contact</td>
                        <td>Action</td>

                    </tr>
                    </thead>

                    <tbody id="appendReferenceHere">
                    @forelse($references as $value)
                        <tr>
                            <td><input type="text" name="referee[]" value="{{$value->referee}}"></td>
                            <td><input type="number" name="refereeContact[]" value="{{$value->refereeContact}}"></td>
                            <td>
                                <button id="removeReference" type="button" class="btn btn-danger removeReference"><i
                                            class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td><input type="text" name="referee[]"></td>
                            <td><input type="number" name="refereeContact[]"></td>
                            <td>
                                <button id="removeReference" type="button" class="btn btn-danger removeReference"><i
                                            class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                    @endforelse


                    </tbody>

                </table>
                <button id="addReference" class="btn btn-success btn-block">Add Reference</button>
                <br>
                <a href="{{route('page5')}}" style="border-radius: 24px" class="btn btn-default"><i
                            class="fa fa-hand-o-left"></i></a>
                <button style="border-radius: 24px" class="btn btn-default pull-right"><i
                            class="fa fa-hand-o-right"></i></button>

            </div>
        </form>
    </div>
@endsection
@section('my-footer')

    <script>
        $(function () {
            $('#addReference').on('click', function (e) {
                e.preventDefault();
                var appendTrRef = "   <tr>\n" +
                    "                            <td><input type=\"text\" name=\"referee[]\"></td>\n" +
                    "                            <td><input type=\"number\" name=\"refereeContact[]\"></td>\n" +
                    "                            <td>\n" +
                    "                                <button id=\"removeReference\" type=\"button\" class=\"btn btn-danger removeReference\"><i\n" +
                    "                                            class=\"fa fa-trash\"></i></button>\n" +
                    "                            </td>\n" +
                    "                        </tr>\n";
                $('#appendReferenceHere').append(appendTrRef);

                removeAppend();

            });
            removeAppend();


            function removeAppend() {
                $('.removeReference').on('click', function (e) {
                    e.preventDefault();
                    var test = $(this).parent().parent().remove();
                    addRemoveRef();
                });
                addRemoveRef();
            }


            function addRemoveRef() {
                var checkOne = $('#appendReferenceHere').find('tr').length;
                if (checkOne < 2) {
                    $('.removeReference').hide()
                } else {
                    $('.removeReference').show()
                }

            }
        })
    </script>
    <script>
        $(function () {
            $("#myRef").submit(function () {
                $('#myInnerBar').css({'width': '87%'})
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
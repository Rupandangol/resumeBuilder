@extends('Frontend.master')
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="box box-info">
        <?php
        $reference = [];
        ?>
        {{--personal details--}}
        <form action="" method="post">
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
                    @forelse($reference as $value)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                            <td><input type="text" name="referee"></td>
                            <td><input type="text" name="refereeContact"></td>
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
                <a href="{{route('page5')}}" style="border-radius: 24px" class="btn btn-default" ><i class="fa fa-hand-o-left"></i></a>
                <button style="border-radius: 24px" class="btn btn-default pull-right"><i class="fa fa-hand-o-right"></i></button>

            </div>
        </form>
    </div>
@endsection
@section('my-footer')

    <script>
        $(function () {
            $('#addReference').on('click', function (e) {
                e.preventDefault();
                var appendTrRef = "<tr>\n" +
                    "                            <td><input type=\"text\" name=\"referee\"></td>\n" +
                    "                            <td><input type=\"text\" name=\"refereeContact\"></td>\n" +
                    "                            <td><button id=\"removeReference\" type=\"button\" class=\"btn btn-danger removeReference\"><i class=\"fa fa-trash\"></i></button></td>\n" +
                    "                        </tr>";
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
                if(checkOne<2){
                    $('.removeReference').hide()
                }else {
                    $('.removeReference').show()
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
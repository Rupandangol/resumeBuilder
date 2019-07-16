@extends('Frontend.master')
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('content')
    <div class="box box-info">
        {{--personal details--}}
        <form action="{{url('/cvForm/personalProfile/skill/'.$id.'/education/experience/reference')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Reference</h3>
                </div>
                <div id="reference" class="reference">

                </div>
                <input type="hidden" value="{{$id}}" name="id">
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-primary">Back</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
@section('my-footer')
    <script>
        $(document).ready(function () {
            var count = 1;
            dynamic_field(count);

            function dynamic_field(number) {

                html = '<div class="sub">';
                html += '<div class="form-group">';
                html += '<label for="exampleInputEmail1">Referee Name</label>';
                html += '<input type="text" class="form-control" name="referee[]" id="" placeholder="Referee Name">';
                html += '</div>';
                html += '<div class="form-group">';
                html += '<label>Referee Contact Details</label>';
                html += '<textarea class="form-control" rows="3" name="refereeContact[]" placeholder="Enter ..."></textarea>';
                html += '</div>';
                if (number > 1) {
                    html += '<button type="button" name="remove" style="margin-left: 90%" id="" class="btn btn-danger remove">Remove</button>';
                    html += "</div>";
                    $('.reference').append(html);
                }
                else {
                    html += '<button type="button" name="add" style="margin-left: 90%" id="add" class="btn btn-success">Add</button>';
                    html += "</div>";
                    $('.reference').html(html);
                }
            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest(".sub").remove();
            });
        })
    </script>
@endsection
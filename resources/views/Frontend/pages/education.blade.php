@extends('Frontend.master')

@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection


@section('content')
    <div class="box box-info">
        {{--personal details--}}
        <form action="{{url('/cvForm/personalProfile/skill/'.$id.'/education')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">

                <div class="box-header with-border">
                    <h3 class="box-title">Education</h3>
                </div>
                <br>
                <div id="education" class="education">

                </div>
                <input type="hidden" value="{{$id}}" name="id">
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-primary">Back</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
        <!-- /input-group -->
    </div>
    <!-- /.box-body -->
@endsection
@section('my-footer')
    <script>
        $(document).ready(function () {
            var count = 1;
            dynamic_field(count);

            function dynamic_field(number) {
                html = '<div class="sub">';
                html += '<div class="form-group">';
                html += '<label for="exampleInputEmail1">Institute</label>';
                html += '<input type="text" class="form-control" name="institute[]" id="" placeholder="School/Collage">';
                html += '</div>';
                html += '<div class="form-group">';
                html += '<label for="exampleInputEmail1">Location</label>';
                html += '<input type="text" class="form-control" name="location[]" id="" placeholder="location">';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="form-group col-md-6">';
                html += '<label for="exampleInputEmail1">Start Date</label>';
                html += '<input type="date" class="form-control" name="startTime[]" id="" placeholder="start time">';
                html += '</div>';
                html += '<div class="form-group col-md-6">';
                html += '<label for="exampleInputEmail1">End Date</label>';
                html += '<input type="date" class="form-control" name="endTime[]" id="" placeholder="end time">';
                html += '</div>';
                html += '</div>';


                if (number > 1) {
                    html += '<button type="button" style="margin-left: 90%" name="remove" id="" class="btn btn-danger remove">Remove</button>';
                    html += '</div>';
                    html += '<hr>';
                    $('.education').append(html);
                }
                else {
                    html += '<button type="button" style="margin-left: 90%" name="add" id="add" class="btn btn-success">Add</button>';
                    html += '</div>';
                    html += '<hr>';
                    $('.education').html(html);
                }
            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest('.sub').remove();
            });
        })
    </script>
@endsection

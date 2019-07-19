@extends('Frontend.master')

@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection


@section('content')
    <div class="box box-info">


        {{--personal details--}}
        <form action="{{url('/cvForm')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Personal Details</h3>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input required type="text" name="fullName" class="form-control" placeholder="Full Name">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" name="mobileNo" class="form-control" placeholder="Mobile No">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-image"></i></span>
                    <input type="file" name="image" class="form-control" placeholder="your Image">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                    <input type="text" name="address" class="form-control" placeholder="Contact Address">
                </div>
                <br>
                {{--end of Personal details--}}
            </div>

            <div class="box-footer">
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
            dynamic_experience(count);

            function dynamic_experience(number) {
                html = '<div class="input-group">';
                html += '<span class="input-group-addon"><i class="fa fa-tags"></i></span>';
                html += '<input type="text" class="form-control" placeholder="School/Collage Name">'
                html += '</div>';
                html += '<br>';
                html += '<div class="input-group">';
                html += '<span class="input-group-addon"><i class="fa fa-map-pin"></i></span>';
                html += '<input type="text" class="form-control" placeholder="School/Collage Location">';
                html += '</div>';
                html += '<br>';
                html += '<div class="row">';
                html += '<div class="form-group col-md-5">';
                html += '<label>Date range:</label>';
                html += '<div class="input-group">';
                html += '<div class="input-group-addon">';
                html += '<i class="fa fa-calendar"></i>';
                html += '</div>';
                html += '<input type="text" name="dateRange" class="form-control pull-right" id="reservation">';
                html += '</div>';
                html += '</div>';
                if (number > 1) {
                    html += '<div class="form-group col-md-5">';
                    html += '<button type="button" name="remove" class="btn btn-danger remove">Remove</button>';
                    html += '</div>';
                    html += '<hr>'
                    $('#education_field').append(html);
                }
                else {
                    html += '<br>';

                    html += '<div class="form-group col-md-5">';
                    html += '<button type="button" id="add" name="add" class="btn btn-success">Add</button>';
                    html += '</div>';
                    $('#education_field').html(html);
                }

            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_experience(count);
            });
            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest("tr").remove();
            });
        })
    </script>

    <script type="text/javascript">
        //Date range picker
        $('#reservation').daterangepicker()
    </script>
@endsection

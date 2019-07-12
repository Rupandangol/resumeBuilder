@extends('Frontend.master')

@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection


@section('content')
    <div class="box box-info">


        {{--personal details--}}

        <div class="box-body">
            <div class="box-header with-border">
                <h3 class="box-title">Personal Details</h3>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" placeholder="Full Name">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input type="text" class="form-control" placeholder="Mobile No">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-image"></i></span>
                <input type="file" class="form-control" placeholder="your Image">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                <input type="text" class="form-control" placeholder="Contact Address">
            </div>
            <br>
            {{--end of Personal details--}}

            {{--personal profiles--}}

            <div class="box-header with-border">
                <h3 class="box-title">Personal Profile</h3>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Looking For</label>
                <input type="text" class="form-control" id="" placeholder="Looking For">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Available For</label>
                <input type="text" class="form-control" id="" placeholder="Available For">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Available For</label>
                <input type="text" class="form-control" id="" placeholder="Expected Salary">
            </div>
            <div class="form-group">
                <label>Career Objective</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div>
            <div class="form-group">
                <label>Career Summary</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div>
            {{--end of personal profile--}}

            {{--academic qualification--}}

            <div class="box-header with-border">
                <h3 class="box-title">Education</h3>
            </div>
            <br>


            <div id="education_field">

            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                <input type="text" class="form-control" placeholder="School/Collage Name">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                <input type="text" class="form-control" placeholder="School/Collage Location">
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Date range:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="dateRange" class="form-control pull-right" id="reservation">
                    </div>
                </div>
            </div>
            <br>


            {{--end of academic qualification--}}

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <!-- /input-group -->
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('my-footer')
    <script type="text/javascript">
        //Date range picker
        $('#reservation').daterangepicker()
    </script>
    <script>
        $(document).ready(function () {
            var count = 1;
            dynamic_experience(count);

            function dynamic_experience(number) {

            }

        })
    </script>
@endsection

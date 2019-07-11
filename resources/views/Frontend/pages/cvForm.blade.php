@extends('Frontend.master')

@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection


@section('content')
    <div class="box box-info">

        <div class="box-body">
            <div class="box-header with-border">
                <h3 class="box-title">Personal Details</h3>
            </div>
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


            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <!-- /input-group -->
        </div>
        <!-- /.box-body -->
    </div>
@endsection
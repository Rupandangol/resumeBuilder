@extends('Frontend.master')
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('my-header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.css">
@endsection

@section('content')
    {{--personal profiles--}}

    <div class="box box-info">

        {{--personal details--}}
        <form action="{{url('/cvForm/personalProfile')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">

                <div class="box-header with-border">
                    <h3 class="box-title">Personal Profile</h3>
                </div>
                {{session('cv_user_id','asd')}}

                <label for="exampleInputEmail1">Looking For</label>
                <div class="input-group">
                    <input type="text" name="lookingFor" placeholder="Looking For" class="form-control">
                    <span id="lookingForInfo" class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Available For</label>
                    <input type="text" class="form-control" name="availableFor" id="" placeholder="Available For">
                </div>

                <label for="exampleInputEmail1">Preferred job Category</label>
                <div class="input-group">
                    <input type="text" name="" placeholder="Looking For" class="form-control">
                    <span id="lookingForInfo" class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Expected Salary</label>
                    <input type="text" class="form-control" name="expectedSalary" id="" placeholder="Expected Salary">
                </div>
                <div class="form-group">
                    <label>Career Objective</label>
                    <textarea class="form-control" rows="3" name="careerObjective" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                    <label>Career Summary</label>
                    <textarea class="form-control" rows="3" name="careerSummary" placeholder="Enter ..."></textarea>
                </div>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-primary">Back</button>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
    {{--end of personal profile--}}

@endsection

@section('my-footer')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.map"></script>
@endsection
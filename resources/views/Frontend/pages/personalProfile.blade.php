@extends('Frontend.master')
@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
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
                <div class="form-group">
                    <label for="exampleInputEmail1">Looking For</label>
                    <input type="text" class="form-control" name="lookingFor" id="" placeholder="Looking For">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Available For</label>
                    <input type="text" class="form-control" name="availableFor" id="" placeholder="Available For">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Available For</label>
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
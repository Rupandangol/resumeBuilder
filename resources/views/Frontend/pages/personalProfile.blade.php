@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress" style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:14.5%;background-color:#3F51B5">1st Step Done
        </div>
    </div>
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection
@section('my-header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

@endsection

@section('content')
    {{--personal profiles--}}

    <div class="box box-info">

        @if($errors->has('lookingFor')||$errors->has('availableFor')||$errors->has('expectedSalary')||$errors->has('careerObjective')||$errors->has('careerSummary'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif
        {{--personal details--}}
        <form id="myProfile" action="{{url('/personalProfile')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Personal Profile</h3>
                </div>
                @if($profile)

                    <label for="exampleInputEmail1">Looking For</label>
                    <div class="input-group">
                        <input type="text" name="lookingFor" value="{{$profile->lookingFor}}"
                               placeholder="Eg:Entry/mid...level"
                               class="form-control">
                        <span id="lookingForInfo" class="input-group-addon"><i class="fa fa-server"></i></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Available For</label>
                        <select name="availableFor" class="form-control">
                            <option>Part Time</option>
                            <option>Full Time</option>
                            <option>Freelance</option>
                        </select>
                    </div>

                    <label for="exampleInputEmail1">Job Category</label>
                    <div class="form-group">
                        <select name="jobCategory" class="form-control selectpicker">
                            <option>Laravel Developer</option>
                            <option>React Js Developer</option>
                            <option>HR</option>
                            <option>Marketing Executive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Expected Salary</label>
                        <input type="number" class="form-control" value="{{$profile->expectedSalary}}"
                               name="expectedSalary" id=""
                               placeholder="Expected Salary">
                    </div>
                    <div class="form-group">
                        <label>Career Objective
                            {{--<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Write brief Career Objective">--}}
                                {{--<i class="fa fa-info-circle"></i>--}}
                            {{--</button>--}}
                        </label>
                        <input style="height: 50px" type="text" class="form-control" name="careerObjective" id=""
                               placeholder="Enter..." value="{{$profile->careerObjective}}">
                    </div>
                    <div class="form-group">
                        <label>Career Summary</label>
                        <input style="height: 50px" type="text" class="form-control" name="careerSummary" id=""
                               placeholder="Enter..." value="{{$profile->careerSummary}}">
                    </div>
                @else
                    <label for="exampleInputEmail1">Looking For</label>
                    <div class="input-group">
                        <input type="text" name="lookingFor" placeholder="Eg:Entry level/Mid level/senior Level"
                               class="form-control">
                        <span id="lookingForInfo" class="input-group-addon"><i class="fa fa-server"></i></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Available For</label>

                        <select name="availableFor" class="form-control">
                            <option>Part Time</option>
                            <option>Full Time</option>
                            <option>Freelance</option>
                        </select>

                    </div>

                    <label for="exampleInputEmail1">Job Category</label>
                    <div class="form-group">
                        <select name="jobCategory" class="form-control selectpicker">
                            <option>Laravel Developer</option>
                            <option>React Js Developer</option>
                            <option>HR</option>
                            <option>Marketing Executive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Expected Salary</label>
                        <input type="number" class="form-control" name="expectedSalary" id=""
                               placeholder="Expected Salary">
                    </div>
                    <div class="form-group">
                        <label>Career Objective</label>
                        <input type="text" class="form-control" name="careerObjective" id=""
                               placeholder="Enter...">

                    </div>
                    <div class="form-group">
                        <label>Career Summary</label>
                        <input type="text" class="form-control" name="careerSummary" id=""
                               placeholder="Enter...">
                    </div>
                @endif
            </div>
            <div class="box-footer">
                <a href="{{url('/cvForm')}}" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
    {{--end of personal profile--}}

@endsection

@section('my-footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.map"></script>

    <script>
        $(function () {
            $("#myProfile").submit(function () {

                $('#myInnerBar').css({'width': '29%'})

            })
        })
    </script>


@endsection
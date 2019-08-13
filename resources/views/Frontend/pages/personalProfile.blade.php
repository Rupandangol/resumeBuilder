@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress" style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:14.5%;background-color:#3F51B5">15%
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

                    <div class="form-group">
                        <label for="exampleInputEmail1">Looking For</label>

                        <select name="lookingFor" class="form-control">
                            <option @if($profile->lookingFor==='Entry Level')selected="selected"@endif>Entry Level
                            </option>
                            <option @if($profile->lookingFor==='Mid Level')selected="selected"@endif>Mid Level</option>
                            <option @if($profile->lookingFor==='Senior Level')selected="selected"@endif>Senior Level
                            </option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Available For</label>
                        <select name="availableFor" class="form-control">
                            <option @if($profile->availableFor==='Part Time') selected="selected" @endif>Part Time
                            </option>
                            <option @if($profile->availableFor==='Full Time') selected="selected" @endif>Full Time
                            </option>
                            <option @if($profile->availableFor==='Freelance') selected="selected" @endif>Freelance
                            </option>
                        </select>
                    </div>

                    {{--<label for="exampleInputEmail1">Job Category</label>--}}
                    {{--<div class="form-group">--}}

                        {{--<select name="jobCategory" class="form-control selectpicker">--}}
                            {{--<option @if($profile->jobCategory==='Laravel Developer') selected="selected" @endif>Laravel--}}
                                {{--Developer--}}
                            {{--</option>--}}
                            {{--<option @if($profile->jobCategory==='React Js Developer') selected="selected" @endif>React--}}
                                {{--Js Developer--}}
                            {{--</option>--}}
                            {{--<option @if($profile->jobCategory==='HR') selected="selected" @endif>HR</option>--}}
                            {{--<option @if($profile->jobCategory==='Marketing Executive') selected="selected" @endif>--}}
                                {{--Marketing Executive--}}
                            {{--</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}


                    <div class="form-group">
                        <label for="exampleInputEmail1">Job Category</label>
                        <input type="text" class="form-control" name="jobCategory" id=""
                              value="{{$profile->jobCategory}}" placeholder="Eg: HR/Java Developer/Sales Executive">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Expected Salary</label>
                        <input type="number" class="form-control" value="{{$profile->expectedSalary}}"
                               name="expectedSalary" id=""
                               placeholder="Expected Salary">
                    </div>
                    <div class="form-group">
                        <label>Career Objective
                        </label>
                        <textarea class="form-control" name="careerObjective" id="" style="resize: none;"
                                  rows="5">{{$profile->careerObjective}}</textarea>
                    </div>
                @else
                    @if(old('lookingFor'))
                        <div class="form-group">
                            <label for="exampleInputEmail1">Looking For</label>

                            <select name="lookingFor" class="form-control">
                                <option @if(old('lookingFor')==='Entry Level')selected="selected" @endif>Entry Level
                                </option>
                                <option @if(old('lookingFor')==='Mid Level')selected="selected"@endif>Mid Level</option>
                                <option @if(old('lookingFor')==='Senior Level')selected="selected"@endif>Senior Level
                                </option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Available For</label>
                            <select name="availableFor" class="form-control">
                                <option @if(old('availableFor')==='Part Time')selected="selected" @endif>Part Time
                                </option>
                                <option @if(old('availableFor')==='Full Time')selected="selected" @endif>Full Time
                                </option>
                                <option @if(old('availableFor')==='Freelance')selected="selected" @endif>Freelance
                                </option>
                            </select>
                        </div>

                        {{--<label for="exampleInputEmail1">Job Category</label>--}}
                        {{--<div class="form-group">--}}
                            {{--<select name="jobCategory" class="form-control selectpicker">--}}
                                {{--<option @if(old('jobCategory')==='Laravel Developer') selected="selected" @endif>Laravel--}}
                                    {{--Developer--}}
                                {{--</option>--}}
                                {{--<option @if(old('jobCategory')==='React Js Developer') selected="selected" @endif>React--}}
                                    {{--Js Developer--}}
                                {{--</option>--}}
                                {{--<option @if(old('jobCategory')==='HR') selected="selected" @endif>HR</option>--}}
                                {{--<option @if(old('jobCategory')==='Marketing Executive') selected="selected" @endif>--}}
                                    {{--Marketing Executive--}}
                                {{--</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Category</label>
                            <input type="text" class="form-control" name="jobCategory" id=""
                                  value="{{old('jobCategory')??''}}" placeholder="Eg: HR/Java Developer/Sales Executive">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Expected Salary</label>
                            <input type="number" class="form-control" value="{{old('expectedSalary')??''}}"
                                   name="expectedSalary" id=""
                                   placeholder="Expected Salary">
                        </div>
                        <div class="form-group">
                            <label>Career Objective
                            </label>
                            <textarea class="form-control" name="careerObjective" id="" style="resize: none;"
                                      rows="5">{{old('careerObjective')??''}}</textarea>
                        </div>
                    @else

                        <div class="form-group">
                            <label for="exampleInputEmail1">Looking For</label>

                            <select name="lookingFor" class="form-control">
                                <option>Entry Level</option>
                                <option>Mid Level</option>
                                <option>Senior Level</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Available For</label>

                            <select name="availableFor" class="form-control">
                                <option>Part Time</option>
                                <option>Full Time</option>
                                <option>Freelance</option>
                            </select>

                        </div>

                        {{--<label for="exampleInputEmail1">Job Category</label>--}}
                        {{--<div class="form-group">--}}
                            {{--<select name="jobCategory" class="form-control selectpicker">--}}
                                {{--<option>Laravel Developer</option>--}}
                                {{--<option>React Js Developer</option>--}}
                                {{--<option>HR</option>--}}
                                {{--<option>Marketing Executive</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Category</label>
                            <input type="text" class="form-control" name="jobCategory" id=""
                                   placeholder="Eg: HR/Java Developer/Sales Executive">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Expected Salary</label>
                            <input type="number" class="form-control" name="expectedSalary" id=""
                                   placeholder="Expected Salary">
                        </div>
                        <div class="form-group">
                            <label>Career Objective</label>
                            {{--<input type="text" class="form-control" name="careerObjective" id=""--}}
                            {{--placeholder="Enter...">--}}
                            <textarea style="resize: none;" class="form-control" name="careerObjective" id=""
                                      rows="5"></textarea>


                        </div>
                    @endif
                @endif
            </div>
            <div class="box-footer">
                <a href="{{url('/cvForm')}}" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Next</button>
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
@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20;">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:50%;background-color:#3F51B5"><strong>50%</strong>
        </div>
    </div>
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew"> Generator</b></h2>
@endsection

@section('content')
    <div class="box box-primary">

        @if($errors->has('trainingCenter.*')||$errors->has('location.*')||$errors->has('startTime.*')||$errors->has('endTime.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif

        <div class="box-header with-border">
            <h3 class="box-title">Trainings</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="myTrain" method="post" action="{{route('page8')}}">
            {{csrf_field()}}
            <div class="box-body">
                <div class="myBody">

                    @forelse($training as $value)
                        <div class="appendTrain">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Training Name</label>
                                    <input type="text" name="trainingName[]" class="form-control enterTraining" id=""
                                           value="{{$value->trainingName}}" placeholder="Enter Training Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Institute</label>
                                    <input type="text" name="trainingCenter[]" class="form-control enterTraining" id=""
                                           value="{{$value->trainingCenter}}" placeholder="Enter Institute Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">location</label>
                                    <input type="text" class="form-control enterTraining" name="location[]" id=""
                                           value="{{$value->location}}" placeholder="Enter Location">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Joined Date</label>
                                    <input type="date" class="form-control enterTraining" id="" name="startTime[]"
                                           value="{{$value->startTime}}" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">End Date</label>
                                    <input type="date" class="form-control enterTraining" id="" placeholder=""
                                           value="{{$value->endTime}}" name="endTime[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Description <code style="color: #00BCD4;">(Optional)</code></label>
                                <textarea style="resize: none;" name="description[]" id="" class="form-control ckeditor"
                                          placeholder="Enter description (Optional)"
                                          rows="4">{{$value->description}}</textarea>
                            </div>
                            <div style="text-align: right">
                                <button class="btn btn-danger removeTraining"><i class="fa fa-trash"></i></button>
                            </div>
                            <hr style="border-color: #00BCD4">
                        </div>

                    @empty

                        <?php
                        $oldTrain = old('trainingCenter') ?? [];
                        ?>
                        @forelse($oldTrain as $key=>$value)
                            <div class="appendTrain">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Training Name</label>
                                        <input type="text" name="trainingName[]" class="form-control enterTraining"
                                               id=""
                                               value="{{old('trainingName')[$key]??''}}"
                                               placeholder="Enter Training Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Institute</label>
                                        <input type="text" name="trainingCenter[]" class="form-control enterTraining"
                                               id=""
                                               value="{{old('trainingCenter')[$key]??''}}"
                                               placeholder="Enter Institute Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">location</label>
                                        <input type="text" class="form-control enterTraining" name="location[]" id=""
                                               value="{{old('location')[$key]??''}}" placeholder="Enter Location">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Joined Date</label>
                                        <input type="date" class="form-control enterTraining" id="" name="startTime[]"
                                               value="{{old('startTime')[$key]??''}}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">End Date</label>
                                        <input type="date" class="form-control enterTraining" id="" placeholder=""
                                               value="{{old('endTime')[$key]??''}}" name="endTime[]">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Description <code style="color: #00BCD4;">(Optional)</code></label>
                                    <textarea style="resize: none;" name="description[]" id=""
                                              class="form-control ckeditor"
                                              placeholder="Enter description (Optional)"
                                              rows="4">{{old('description')[$key]??''}}</textarea>
                                </div>
                                <div style="text-align: right">
                                    <button class="btn btn-danger removeTraining"><i class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @empty
                            <div class="appendTrain">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Training Name</label>
                                        <input type="text" name="trainingName[]" class="form-control enterTraining"
                                               id=""
                                               placeholder="Enter Training Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Institute</label>
                                        <input type="text" name="trainingCenter[]" class="form-control enterTraining"
                                               id=""
                                               placeholder="Enter Institute Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">location</label>
                                        <input type="text" class="form-control enterTraining" name="location[]" id=""
                                               placeholder="Enter Location">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Joined Date</label>
                                        <input type="date" class="form-control enterTraining" id="" name="startTime[]"
                                               placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">End Date</label>
                                        <input type="date" class="form-control enterTraining" id="" placeholder=""
                                               name="endTime[]">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Description <code style="color: #00BCD4;">(Optional)</code></label>
                                    <textarea style="resize: none;" name="description[]" id=""
                                              class="form-control ckeditor"
                                              placeholder="Enter description (Optional)" rows="4"></textarea>
                                </div>
                                <div style="text-align: right">
                                    <button class="btn btn-danger removeTraining"><i class="fa fa-trash"></i></button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @endforelse
                    @endforelse

                </div>
                <button id="addTraining" class="btn btn-success btn-block btn-sm">Add New</button>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a class="btn btn-primary" href="{{route('page5')}}">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Next</button>
                <a class="btn btn-primary pull-right" onclick="return confirm('Are you sure you want to skip?')"
                   href="{{route('skipTrain')}}">Skip</a>
            </div>
        </form>
    </div>

@endsection
@section('my-footer')


    <script>
        $(function () {
            $('#addTraining').on('click', function (e) {
                e.preventDefault();
                var BlockCount = $('.myBody').find('.appendTrain').length;

                var appendTraining = "<div class=\"appendTrain\">\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div class=\"form-group col-md-6\">\n" +
                    "                                        <label for=\"\">Training Name</label>\n" +
                    "                                        <input type=\"text\" name=\"trainingName[]\" class=\"form-control enterTraining\"\n" +
                    "                                               id=\"\"\n" +
                    "                                               placeholder=\"Enter Training Name\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-6\">\n" +
                    "                                        <label for=\"\">Institute</label>\n" +
                    "                                        <input type=\"text\" name=\"trainingCenter[]\" class=\"form-control enterTraining\"\n" +
                    "                                               id=\"\"\n" +
                    "                                               placeholder=\"Enter Institute Name\">\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <div class=\"row\">\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">location</label>\n" +
                    "                                        <input type=\"text\" class=\"form-control enterTraining\" name=\"location[]\" id=\"\"\n" +
                    "                                               placeholder=\"Enter Location\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">Joined Date</label>\n" +
                    "                                        <input type=\"date\" class=\"form-control enterTraining\" id=\"\" name=\"startTime[]\"\n" +
                    "                                               placeholder=\"\">\n" +
                    "                                    </div>\n" +
                    "                                    <div class=\"form-group col-md-4\">\n" +
                    "                                        <label for=\"\">End Date</label>\n" +
                    "                                        <input type=\"date\" class=\"form-control enterTraining\" id=\"\" placeholder=\"\"\n" +
                    "                                               name=\"endTime[]\">\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "\n" +
                    "                                <div class=\"form-group\">\n" +
                    "                                    <label for=\"\">Description <code style=\"color: #00BCD4;\">(Optional)</code></label>\n" +
                    "                                    <textarea style=\"resize: none;\" name=\"description[]\" id=\'ckeditor-"+BlockCount+"'\n" +
                    "                                              class=\"form-control ckeditor\"\n" +
                    "                                              placeholder=\"Enter description (Optional)\" rows=\"4\"></textarea>\n" +
                    "                                </div>\n" +
                    "                                <div style=\"text-align: right\">\n" +
                    "                                    <button class=\"btn btn-danger removeTraining\"><i class=\"fa fa-trash\"></i></button>\n" +
                    "                                </div>\n" +
                    "                                <hr style=\"border-color: #00BCD4\">\n" +
                    "                            </div>";
                $('.myBody').append(appendTraining);
                CKEDITOR.replace('ckeditor-' + BlockCount);
                removeTrain();
                checkOne();
                enterTrain();
            });

            function removeTrain() {
                $('.removeTraining').on('click', function (e) {
                    e.preventDefault();
                    $(this).parent().parent().remove();
                    checkOne();
                })
            }

            removeTrain();

            function checkOne() {
                var test = $('.myBody').find('.appendTrain').length;
                console.log(test);
                if (test < 2) {
                    $('.removeTraining').hide();
                } else {
                    $('.removeTraining').show();
                }
            }

            checkOne();

            function enterTrain() {
                $('.enterTraining').on('keypress', function (e) {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                    }
                })
            }

            enterTrain();

        })


    </script>


    <script>
        $(function () {
            $("#myTrain").submit(function () {
                $('#myInnerBar').css({'width': '60%'})
            })
        })
    </script>

@endsection
@extends('Frontend.master')


@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:70%;background-color:#3F51B5"><strong>70%</strong>
        </div>
    </div>
@endsection

@section('contentHeader')
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew">Generator</b></h2>
@endsection


@section('content')
    <div class="box box-primary">

        @if($errors->has('header.*')||$errors->has('about.*'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif

        <div class="box-header with-border">
            <h3 class="box-title">Achievements</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="myAchieve" method="post" action="{{route('page9')}}">
            {{csrf_field()}}
            <div class="box-body">


                <div class="myBody">
                    @forelse($achievement as $value)
                        <div class="appendAchievement">
                            <div class="form-group">
                                <label for="">Achievement Title</label>
                                <input type="text" value="{{$value->header}}" name="header[]"
                                       class="form-control enterAchieve" id=""
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">About</label>
                                <textarea style="resize: none;" name="about[]" class="form-control ckeditor" id=""
                                          rows="4">{{$value->about}}</textarea>
                            </div>
                            <div style="text-align: right;">
                                <button class="btn btn-danger removeAchievement"><i class="fa fa-trash"></i></button>
                            </div>
                            <hr style="border-color: #00BCD4">
                        </div>
                    @empty
                        <?php
                        $oldAchieve = old('header') ?? [];
                        ?>
                        @forelse($oldAchieve as $key=>$value)
                            <div class="appendAchievement">
                                <div class="form-group">
                                    <label for="">Achievement Title</label>
                                    <input type="text" name="header[]" value="{{old('header')[$key]??''}}"
                                           class="form-control enterAchieve" id=""
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">About</label>
                                    <textarea style="resize: none;" name="about[]" class="form-control ckeditor" id=""
                                              rows="4">{{old('about')[$key]??''}}</textarea>
                                </div>
                                <div style="text-align: right;">
                                    <button class="btn btn-danger removeAchievement"><i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @empty
                            <div class="appendAchievement">
                                <div class="form-group">
                                    <label for="">Achievement Title</label>
                                    <input type="text" name="header[]" class="form-control enterAchieve" id=""
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">About</label>
                                    <textarea style="resize: none;" name="about[]" class="form-control ckeditor" id=""
                                              rows="4"></textarea>
                                </div>
                                <div style="text-align: right;">
                                    <button class="btn btn-danger removeAchievement"><i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <hr style="border-color: #00BCD4">
                            </div>
                        @endforelse
                    @endforelse


                </div>
                <button id="addAchievement" class="btn btn-success btn-block btn-sm">Add New Achievement</button>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-primary" href="{{route('page3')}}">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Next</button>
                <a class="btn btn-primary pull-right"
                   {{--onclick="return confirm('Are you sure you want to skip?')"--}}
                   href="{{route('skipAchieve')}}">Skip</a>
            </div>
        </form>
    </div>
@endsection

@section('my-footer')
    <script>
        $(function () {
            $('#addAchievement').on('click', function (e) {
                e.preventDefault();
                var BlockCount=$('.myBody').find('.appendAchievement').length;

                var appendText = "  <div class=\"appendAchievement\">\n" +
                    "                        <div class=\"form-group\">\n" +
                    "                            <label for=\"\">Achievement Title</label>\n" +
                    "                            <input type=\"text\" name=\"header[]\" class=\"form-control\" id=\"\" placeholder=\"\">\n" +
                    "                        </div>\n" +
                    "                        <div class=\"form-group\">\n" +
                    "                            <label for=\"\">About</label>\n" +
                    "                            <textarea style=\"resize: none;\" name=\"about[]\" class=\"form-control ckeditor\" id='ckeditor-"+BlockCount+"'\n" +
                    "                                      rows=\"4\"></textarea>\n" +
                    "                        </div>\n" +
                    "                        <div style=\"text-align: right;\">\n" +
                    "                            <button class=\"btn btn-danger removeAchievement\"><i class=\"fa fa-trash\"></i></button>\n" +
                    "                        </div>\n" +
                    "                        <hr style=\"border-color: #00BCD4\">\n" +
                    "                    </div>\n";
                $('.myBody').append(appendText);
                CKEDITOR.replace('ckeditor-'+BlockCount);
                removeAchieve();
                hideRemove();
                enterKey();
            });

            function removeAchieve() {
                $('.removeAchievement').on('click', function (e) {
                    e.preventDefault();
                    $(this).parent().parent().remove();
                    hideRemove();
                })
            }

            removeAchieve();

            function hideRemove() {
                var countBody = $('.myBody').find('.appendAchievement').length;
                if (countBody < 2) {
                    $('.removeAchievement').hide();
                } else {
                    $('.removeAchievement').show();
                }
            }

            hideRemove();

            function enterKey() {
                $('.enterAchieve').on('keypress', function (e) {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                    }
                })
            }

            enterKey();


        })
    </script>


    <script>
        $(function () {
            $("#myAchieve").submit(function () {
                $('#myInnerBar').css({'width': '80%'})
            })
        })
    </script>
@endsection
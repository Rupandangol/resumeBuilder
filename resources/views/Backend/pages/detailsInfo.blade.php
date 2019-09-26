@extends('Backend.master')
@section('heading')
    Details
    <a style="" class="btn btn-info" href="{{route('cvBackendDownload',$details->id)}}">Download CV</a>
    <a style="" class="btn btn-info" href="{{route('cvBackendPreview',$details->id)}}">Preview CV</a>
@endsection

@section('content')
    {{--side--}}
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                @if($details->image)
                    <img class="profile-user-img img-responsive img-circle"
                         src="{{URL::to('/Uploads/userImage/'.$details->image)}}"
                         alt="User profile picture">
                @else
                    @if($details->gender==='female')
                        <img class="profile-user-img img-responsive img-circle"
                             src="{{URL::to('/Uploads/genderImage/userfemale.jpeg')}}"
                             alt="User profile picture">
                    @else
                        <img class="profile-user-img img-responsive img-circle"
                             src="{{URL::to('/Uploads/genderImage/usermale.jpg')}}"
                             alt="User profile picture">
                    @endif
                @endif
                <h3 class="profile-username text-center">{{$details->fullName}}</h3>

                <p class="text-muted text-center">{{$details->getProfile->jobCategory}}</p>
                <p style="word-wrap: break-word" class="text-muted text-center">{{$details->email}}</p>


                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Mobile No.</b> <a class="pull-right">{{$details->mobileNo}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Gender</b> <a class="pull-right">{{$details->gender}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Address</b> <a class="pull-right">{{$details->address}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Looking For</b> <a class="pull-right">{{$details->getProfile->lookingFor}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Available For</b> <a class="pull-right">{{$details->getProfile->availableFor}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Expected Salary</b> <a class="pull-right">{{$details->getProfile->expectedSalary}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Preferred Location</b> <a class="pull-right">{{$details->getProfile->preferredLocation}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Date of Birth</b> <a
                                class="pull-right">{{\Carbon\Carbon::parse($details->dateOfBirth)->format('Y M d')}}</a>
                    </li>
                </ul>

                {{--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Personal Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                <p style="word-wrap: break-word" class="text-muted">
                    {{$details->address}}
                </p>

                <hr>
                @if($details->website)
                    <strong><i class="fa fa-globe margin-r-5"></i> Website</strong>

                    <p style="word-wrap: break-word" class="text-muted">
                        {{$details->website}}
                    </p>

                    <hr>
                @endif
                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                    @forelse($details->getSkill as $value)
                        <span class="label label-primary">{{$value->skill}}</span>
                @empty
                    <p class="text-muted">No skill</p>
                    @endforelse

                    </p>

                    <hr>
                    <strong><i class="fa fa-search margin-r-5"></i> Looking For a job</strong>

                    <p class="text-muted">
                        {{$details->getProfile->interestedInJob}}
                    </p>

                    <hr>
                    <strong><i class="fa fa-list-alt margin-r-5"></i> Job Category Title</strong>

                    <p class="text-muted">
                        {{$details->getProfile->jobCategoryTitle}}
                    </p>

                    <hr>
                    <strong><i class="fa fa-list-ol margin-r-5"></i> Job Category</strong>

                    <p class="text-muted">
                        {{$details->getProfile->jobCategory}}
                    </p>

                    <hr>
                    @if(Auth::guard('admin')->user()->privileges==='Super Admin')
                    <strong><i class="fa fa-trash"></i> Delete this Profile</strong>

                    <p class="text-muted">
                    <a class="btn btn-danger" href="{{route('profileDelete',$details->id)}}"><i
                    class="fa fa-trash"></i></a>
                    </p>

                    <hr>
                    @endif


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    {{--endof side--}}



    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#experience" data-toggle="tab">Experience</a></li>
                <li><a href="#education" data-toggle="tab">Education</a></li>
                <li><a href="#skills" data-toggle="tab">Skills</a></li>
                <li><a href="#others" data-toggle="tab">Others</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="education">
                @foreach($details->getEdu as $value)
                    <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                @if($value->endTime==='attending')
                                    <img class="img-circle img-bordered-sm"
                                         src="{{URL::to('/Uploads/tickAndCross/inprogress.png')}}"
                                         alt="User Image">
                                @else
                                    <img class="img-circle img-bordered-sm"
                                         src="{{URL::to('/Uploads/tickAndCross/tick.png')}}"
                                         alt="User Image">
                                @endif
                                <span class="username">
                          <a href="#">{{ucfirst($value->subject)}}</a>
                        </span>
                                <span class="description">{{$value->institute}}, {{$value->location}}
                                    - {{\Carbon\Carbon::parse($value->startTime)->format('Y M d')}}/

                                    @if($value->endTime==='attending')
                                        Currently Attending
                                    @else
                                        {{\Carbon\Carbon::parse($value->endTime)->format('Y M d')}}
                                    @endif
                                </span>
                            </div>
                            <!-- /.user-block -->
                            @if($value->description)
                                <p>
                                    <?php
                                    echo htmlspecialchars_decode($value->description);
                                    ?>
                                </p>
                            @endif
                        </div>
                        <!-- /.post -->
                    @endforeach
                </div>


            {{--Experience--}}
            <!-- /.tab-pane -->
                <div class="active tab-pane" id="experience">
                    <!-- The timeline -->


                    @forelse($details->getExp as $value)
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->

                            <li class="time-label">
                        <span class="bg-red">
                          {{\Carbon\Carbon::parse($value->startTime)->format('d M Y')}}
                        </span>


                                <!-- timeline item -->
                            <li>
                                <i class="fa fa-gg bg-aqua"></i>

                                <div class="timeline-item">
                                    <h3 class="timeline-header no-border"><a href="#">{{$value->jobTitle}}</a>
                                    </h3>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-building bg-blue"></i>

                                <div class="timeline-item">

                                    <h3 class="timeline-header"><a
                                                href="#">{{$value->companyName}}</a> {{$value->location}}</h3>

                                    <div class="timeline-body">
                                        <?php
                                        echo htmlspecialchars_decode($value->jobSummary)
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                        <span class="bg-green">
                          @if($value->endTime==='Current')
                                Present
                            @else
                                {{\Carbon\Carbon::parse($value->endTime)->format('d M Y')}}
                            @endif
                        </span>
                            </li>
                            <!-- /.timeline-label -->
                        </ul>
                    @empty
                        <p style="text-align: center">
                            <i>No Experience</i>
                        </p>
                    @endforelse
                </div>
                <!-- /.tab-pane -->

                {{--skills--}}
                <div class="tab-pane" id="skills">

                    {{--skill--}}
                    <div class="box-footer text-black">
                        <h4>Skills</h4>
                        <div class="row">
                            @forelse($details->getSkill as $value)
                                <div class="col-sm-6">
                                    <!-- Progress bars -->
                                    <div class="clearfix">
                                        <span class="pull-left">{{$value->skill}}</span>
                                        <small class="pull-right">{{$value->skillLevel}}%</small>
                                    </div>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-green"
                                             style="width: {{$value->skillLevel}}%;"></div>
                                    </div>
                                    <div style="margin-top: -12px">
                                        <p>
                                            <?php
                                            echo htmlspecialchars_decode($value->about);
                                            ?><br>
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <hr>
                                <p style="text-align: center"><i>No Skill</i></p>
                                <hr>
                            @endforelse
                        </div>
                        <!-- /.row -->
                    </div>
                    {{--end of Skill--}}
                </div>
                <div class="tab-pane" id="others">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-text-width"></i>

                            <h3 class="box-title">Training</h3>
                        </div>
                        <!-- /.box-header -->
                        @forelse($details->getTraining as $value)
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    <dt>Training Name</dt>
                                    <dd>{{$value->trainingName}}</dd>
                                    <dt>Institute</dt>
                                    <dd>{{$value->trainingCenter}}
                                    </dd>
                                    <dd>{{\Carbon\Carbon::parse($value->startTime)->format('d M Y')}}
                                        -{{\Carbon\Carbon::parse($value->endTime)->format('d M Y')}}
                                    </dd>
                                    <dt>Location</dt>
                                    <dd>{{$value->location}}</dd>
                                    @if($value->description)
                                        <dt>Description</dt>
                                        <dd>
                                            <?php
                                            echo htmlspecialchars_decode($value->description);
                                            ?>
                                        </dd>
                                    @endif
                                </dl>
                            </div>
                        @empty
                            <p style="text-align: center"><i>No Training</i></p>
                    @endforelse
                    <!-- /.box-body -->
                    </div>
                    {{--Achievement--}}
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-text-width"></i>

                            <h3 class="box-title">Achievements</h3>
                        </div>
                        <!-- /.box-header -->
                        @forelse($details->getAchievement as $value)
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    <dt>Achievement Title</dt>
                                    <dd>{{$value->header}}</dd>
                                    <dt>About</dt>
                                    <dd>
                                        <?php
                                        echo htmlspecialchars_decode($value->about)
                                        ?>
                                    </dd>

                                </dl>
                            </div>
                        @empty
                            <p style="text-align: center"><i>No Achievements</i></p>
                    @endforelse

                    <!-- /.box-body -->
                    </div>
                    {{--End of achievement--}}

                    {{--Reference--}}
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-text-width"></i>

                            <h3 class="box-title">References</h3>
                        </div>
                    @forelse($details->getReference as $value)
                        <!-- /.box-header -->
                            <div class="box-body">
                                <dl class="dl-horizontal">
                                    <dt>Full Name</dt>
                                    <dd>{{$value->name}}</dd>
                                    <dt>Designation</dt>
                                    <dd>{{$value->designation}}</dd>
                                    <dt>Company Name</dt>
                                    <dd>{{$value->companyName}}</dd>
                                    <dt>Contact Number</dt>
                                    <dd>{{$value->contactNumber}}
                                    </dd>
                                    <dt>Email</dt>
                                    <dd>{{$value->email}}
                                    </dd>
                                </dl>
                            </div>
                        @empty
                            <p style="text-align: center"><i>No References</i></p>
                    @endforelse
                    <!-- /.box-body -->
                    </div>

                {{--end of reference--}}


                <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
@endsection
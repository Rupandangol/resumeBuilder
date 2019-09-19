<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style type="text/css">
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url("/Uploads/resumeTemplate/5.4.png");
            font-family: sans-serif, "Times New Roman";
        }

        /*#container{*/
        /*margin-top: 5px;*/
        /*}*/

        #content {
            padding: 10px;
            margin-top: 40px;
            margin-left: auto;
            margin-right: auto;
        }

        #nav {
            font-size: 15px;
            width: 180px;
            float: left;
            margin-left: 20px;
            color: white;
        }

        #myContact {
            font-size: 11px;
        }

        #main {
            width: 550px;
            float: right;
            margin-right: 30px;
        }

        #footer {
            clear: both;
        }

        #myExp {
            list-style-type: none;
        }

        #myEdu {
            list-style-type: none;
        }

        #mySkill {
            margin: 0;
            font-size: 13px;
        }

        #myProgressbar {
            background-color: black;
            border-radius: 9px;
            width: 150px;
            padding: 3px;
        }

        #myProgressbar > div {
            background-color: #1B5E20;
            height: 12px;
            border-radius: 6px;
        }


    </style>


    <title></title>
</head>


<body>

<div id="container">
    <div id="content">
        <div id="nav">
            @if($personalDetail->image)
                <img style="margin-left:5px;width: 120px;height: 100px;border-radius: 30px"
                     src="{{URL::to('/Uploads/userImage/'.$personalDetail->image)}}" alt=""><br><br>
            @else
                @if($personalDetail->gender==='female')
                    <img style="margin-left:5px;width: 120px;height: 100px;border-radius: 30px" id="userImg"
                         src="{{URL::to('/Uploads/genderImage/userfemale.jpeg')}}" alt="">
                @else
                    <img style="margin-left:5px;width: 120px;height: 100px;border-radius: 30px" id="userImg"
                         src="{{URL::to('/Uploads/genderImage/usermale.jpg')}}" alt="">
                @endif


            @endif
            <h3>Contact</h3>
            <p id="myContact">
            <div style="word-wrap: break-word;font-size: 11px">
                Email:<br>
                {{$personalDetail->email}}<br><br>
            </div>
            <div style="word-wrap: break-word;font-size: 11px">
                Address: <br> {{$personalDetail->address}}<br><br>
            </div>
            @if($personalDetail->website)
                <div style="word-wrap: break-word;font-size: 11px;">
                    Website: <br> {{$personalDetail->website}} <br><br>
                </div>
            @endif
            <div style="word-wrap: break-word;font-size: 11px">
                Phone No: <br> {{$personalDetail->mobileNo}}
            </div>
            </p>

            <br>
            @if(!count($skill)==0)
                <h3 style="margin-bottom: 5px">Skill</h3>
                <p id="mySkill">
                    @foreach($skill as $value)
                        {{$value->skill}}<br>
                <div id="myProgressbar">
                    <div style="font-size: 10px;text-align: center; width:{{$value->skillLevel}}% ;">{{$value->skillLevel}}
                        %
                    </div>
                </div>
                @endforeach
                @endif
                </p>
        </div>
        <div id="main">
            <h1 style="color: #1B5E20;" id="myName">{{ucfirst($personalDetail->fullName)}}</h1>
            <p>{{ucfirst($personalProfile->jobCategory)}}</p>
            <hr>
            <h3>Objective</h3>
            <div style="margin-top: -15px; font-size: 14px;">
                <?php
                echo htmlspecialchars_decode($personalProfile->careerObjective);
                ?>
            </div>
            <hr>
            @if(!count($experience)==0)
                <h3>Experience</h3>
                @foreach($experience as $value)
                    <i style=" float: left;">{{$value->companyName}}</i>
                    <i style="font-size: 12px; float: right;">{{\Carbon\Carbon::parse($value->startTime)->format('M Y')}}
                        to
                        @if($value->endTime==='Current')
                            Current
                        @else
                            {{\Carbon\Carbon::parse($value->endTime)->format('M Y')}}
                        @endif
                    </i>
                    <ul style="font-size: 14px" id="myExp">
                        <li>{{$value->jobTitle}}</li>
                        <li>{{$value->location}}</li>
                        <li>
                            <div style="margin-top: -5px">
                                <?php
                                echo htmlspecialchars_decode($value->jobSummary);
                                ?>
                            </div>
                        </li>
                    </ul>
                @endforeach
                <hr>
            @endif

            <h3>Education</h3>
            @foreach($education as $value)

                <i style="float:left;">{{$value->institute}}</i>
                <i style="float:right; font-size: 12px">{{$value->startTime}}-
                    @if($value->endTime==='attending')
                        Attending
                    @else
                        {{$value->endTime}}
                    @endif
                </i>
                <ul style="font-size: 14px" id="myEdu">
                    <li>{{$value->subject}}, {{$value->grade}}</li>
                    <li>{{$value->location}}</li>
                    <li>
                        <div style="margin-top: -5px">
                            <?php
                            echo htmlspecialchars_decode($value->description);
                            ?>
                        </div>
                    </li>
                </ul>
            @endforeach
            <hr>

            {{--training--}}

            @if(!count($training)==0)
                <h3>Training</h3>
                @foreach($training as $value)
                    <i style=" float: left;">{{$value->trainingName}}</i>
                    <i style="font-size: 12px; float: right;">{{\Carbon\Carbon::parse($value->startTime)->format('M Y')}}
                        to
                        @if($value->endTime==='Current')
                            Current
                        @else
                            {{\Carbon\Carbon::parse($value->endTime)->format('M Y')}}
                        @endif
                    </i>
                    <ul style="font-size: 14px" id="myExp">
                        <li>{{$value->trainingCenter}}</li>
                        <li>{{$value->location}}</li>
                        <li>
                            <div style="margin-top: -5px">
                                <?php
                                echo htmlspecialchars_decode($value->description);
                                ?>
                            </div>
                        </li>
                    </ul>
                @endforeach
                <hr>
            @endif
            {{--end of training--}}

            {{--achievement--}}
            @if(!count($achievement)==0)
                <h3>Achievement</h3>
                @foreach($achievement as $value)
                    <i style=" float: left;">{{$value->header}}</i>
                    <ul style="font-size: 14px" id="myExp">
                        <li>
                            <div style="margin-top: -5px">
                                <?php
                                echo htmlspecialchars_decode($value->about);
                                ?>
                            </div>
                        </li>
                    </ul>
                @endforeach
                <hr>
            @endif
            {{--endof achievement--}}

            <h3>Reference</h3>
            @forelse($reference as $value)
                <p>{{ucfirst($value->name)}}
                    <br>
                    {{$value->designation}}<br>
                    {{$value->companyName}}<br>
                    {{$value->email}}, {{$value->contactNumber}}
                </p>
            @empty
                <p style="font-size: 14px">Reference Available at request</p>
            @endforelse
        </div>
        <div id="footer">


        </div>

    </div>

</div>
</body>
</html>


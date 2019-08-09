<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 30px 25px;
            background-image: url('/Uploads/background/4.2.png');

            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {

        }

        .left {
            margin-top: 10px;
            width: 340px;
            margin-left: 10px;
            float: left;
        }

        .right {
            margin-top: 60px;
            width: 460px;
            float: right;
        }

        #userImg {
            margin-left: 20px;
            width: 210px;
            height: 210px;
            border-radius: 100px;
        }

        /*#myHeader {*/
        /*margin-top: 60px;*/
        /*margin-left: 40px;*/
        /*}*/

        #myhead {
            font-size: 40px;
            text-transform: uppercase;
            color: #0D47A1;
        }

        #footer {
            clear: both;
        }
    </style>
    <title>template2</title>
</head>
<body>
<div class="container">
    <div class="left">
        {{--<div id="userImg">--}}
        @if($personalDetail->image)
            <img id="userImg" src="{{URL::to('/Uploads/userImage/'.$personalDetail->image)}}" alt="">
        @else
            @if($personalDetail->gender==='female')
                <img id="userImg" src="{{URL::to('/Uploads/genderImage/userfemale.jpeg')}}" alt="">
            @else
                <img id="userImg" src="{{URL::to('/Uploads/genderImage/usermale.jpg')}}" alt="">
            @endif
        @endif
        <h4 style="text-transform: uppercase;font-family: sans-serif;color: #42A5F5;">Profile</h4>
        <p style="margin-right: 90px;text-align: justify">{{$personalProfile->careerObjective}}</p><br>

        {{--contact--}}
        <h4 style="text-transform: uppercase;font-family: sans-serif;color: #42A5F5;">Contact</h4>
        <strong style="font-size: 15px;font-family: sans-serif">PHONE:</strong>
        <p style="margin: 0;padding: 0;font-size: 15px">{{$personalDetail->mobileNo}}</p><br>

        {{--end of contact--}}
        {{--website--}}
        <strong style="font-size: 15px;font-family: sans-serif">WEBSITE:</strong>
        <p style="margin: 0;padding: 0;font-size: 15px">LinkedIn: <br>{{$personalDetail->website}}</p><br>
        {{--end of website--}}
        {{--email--}}
        <strong style="font-size: 15px;font-family: sans-serif">EMAIL:</strong>
        <p style="margin: 0;padding: 0;font-size: 15px">{{$personalDetail->email}}</p><br>
        {{--end of email--}}


        {{--</div>--}}
    </div>
    <div class="right">
        {{--<div id="myHeader">--}}
        <h1 id='myhead'>{{$personalDetail->fullName}}</h1>
        <p>{{$personalDetail->address}}</p>

        {{--education--}}
        <h4 style="text-transform: uppercase;font-family: sans-serif">Education</h4>
        <hr style="margin-top: -0.7em;color: lightblue;background-color: lightblue;border-color:lightblue;">

        @foreach($education as $value)
            <strong style="font-size: 15px">{{$value->subject}}, {{$value->institute}}, {{$value->location}}</strong>
            <p style="margin: 0;padding: 0;font-size: 15px">{{$value->startTime}}
                <br>
                @if($value->grade==='attending')
                    Currently Attending
                @else
                    Grade: {{$value->grade}}
                @endif
            </p><br>
        @endforeach
        {{--end of education--}}

        {{--experience--}}
        <h4 style="text-transform: uppercase;font-family: sans-serif">Work Experience</h4>
        <hr style="margin-top: -0.7em;color: lightblue;background-color: lightblue;border-color:lightblue;">

        @foreach($experience as $value)
            <strong style="font-size: 15px">{{ucfirst($value->jobTitle)}} at {{ucfirst($value->companyName)}}
                , {{ucfirst($value->location)}}</strong>
            <p style="margin: 0;padding: 0;font-size: 15px">{{\Carbon\Carbon::parse($value->startTime)->format('M Y')}}-
                @if($value->endTime==='Current')
                    Present
                @else
                    {{\Carbon\Carbon::parse($value->endTime)->format('M Y')}}
                @endif
                <br>{{$value->jobSummary}}
            </p><br>
        @endforeach
        {{--end of experience--}}

        {{--skill--}}
        <h4 style="text-transform: uppercase;font-family: sans-serif">Skills</h4>
        <hr style="margin-top: -0.7em;color: lightblue;background-color: lightblue;border-color:lightblue;">

        @foreach($skill as $value)
            <strong style="font-size: 15px">{{ucfirst($value->skill)}}</strong>
            <p style="margin: 0;padding: 0;font-size: 15px">{{$value->about}}
            </p><br>
        @endforeach
        {{--end of skill--}}

        {{--Reference--}}
        <h4 style="text-transform: uppercase;font-family: sans-serif">Reference</h4>
        <hr style="margin-top: -0.7em;color: lightblue;background-color: lightblue;border-color:lightblue;">
        @forelse($reference as $value)
            <strong style="font-size: 15px">{{ucfirst($value->name)}}</strong>
            <p style="margin: 0;padding: 0;font-size: 15px">{{$value->designation}}<br>
                {{$value->companyName}}<br>
                {{$value->email}}, {{$value->contactNumber}}


            </p><br>
        @empty
            <p style="margin: 0;padding: 0;font-size: 15px">Available at request
            </p>
        @endforelse

        {{--end of reference--}}
        {{--</div>--}}


    </div>
    <div id="footer">

    </div>
</div>

</body>
</html>
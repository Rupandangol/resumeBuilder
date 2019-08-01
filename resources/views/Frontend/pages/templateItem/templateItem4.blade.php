<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <style type="text/css">
        .myImage {
            border-radius: 30px;
            height: 160px;
            margin-right: 40px;
        }
    </style>
    <title>CvBuilder</title>
</head>
<body style="padding: 0;margin: 0; font-family: sans-serif  ">
<div style="margin-left: 40px" class="box-field">
    <div>
        <img class="myImage pull-right" src="{{URL::to('/Uploads/userImage/'.$personalDetail->image)}}" alt="">

        <h1 style="font-family: 'Times New Roman'">{{ucfirst($personalDetail->fullName)}}</h1>
        <p>Email:{{$personalDetail->email}}</p>
        <p>Mobile No:{{$personalDetail->mobileNo}}</p>

        {{--<p>web</p>--}}
        <p>location:{{$personalDetail->address}}</p>
        {{--Objective--}}
        <hr>
        <h1>Objective</h1>
        <p>{{$personalProfile->careerObjective}}</p>
        <hr>
        {{--Skill--}}
        <h1 style="font-family: 'Comic Sans  MS'">Skill</h1>
        <table>
            <tbody>
            @foreach($skill as $value)
                <tr>
                    <td>
                        {{$value->skill}}
                        <ul>
                            <li>{{ucfirst($value->about)}}</li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <hr>
        {{--workHistory--}}
        <h1>Work history</h1>
        <table>
            @foreach($experience as $value)
                <tbody>
                <tr>
                    <td>{{ucfirst($value->companyName)}}</td>
                    <td>
                        <ul>
                            <li>
                                {{ucfirst($value->jobTitle)}}
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>{{$value->location}}</li>
                            <li>{{\Carbon\Carbon::parse($value->startTime)->format('M Y')}}-
                                @if($value->endTime==='Current')
                                    Current
                                @else
                                    {{\Carbon\Carbon::parse($value->endTime)->format('M Y')}}
                                @endif
                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>

        {{--Qualification--}}
        <hr>
        <h1>Qualification</h1>
        <table>
            @foreach($education as $value)
                <tbody>
                <tr>
                    <td>{{ucfirst($value->institute)}}</td>
                    <td>
                        <ul>
                            <li>
                                {{ucfirst($value->subject)}}
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>{{$value->location}}</li>
                            <li>{{\Carbon\Carbon::parse($value->startTime)->format('Y')}}-
                            @if($value->endTime==='attending')
                                Attending
                                @else
                                {{\Carbon\Carbon::parse($value->endTime)->format('Y')}}
                                @endif

                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            @endforeach

        </table>
        <hr>
        {{--reference--}}
        <h1>Reference</h1>
        <table>
            @foreach($reference as $value)
                <tr>
                    <td>
                        Referee:{{$value->referee}}
                        <ul>
                            <li>Referee Contact:{{$value->refereeContact}}</li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

</body>
</html>
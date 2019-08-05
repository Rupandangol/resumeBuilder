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

        * {
            margin-top: 5px;
            padding: 0;
        }

        body {
            font-family: "Times New Roman";
            font-weight: normal;
        }

        #container {
            margin-left: 40px;
            margin-top: 20px;
            width: 730px;

        }

        #myHeader {
            /*margin-top: 20px;*/
            float: left;
            font-size: 40px;
            font-family: sans-serif;
        }

        #myHeaderImage {
            float: right;
            width: 90px;
            height: 90px;
        }

        #myBody {
            clear: both;
        }

        #subpoint li {
            display: inline-block;
            margin-top: 5px;
            margin-left: 14px;
            padding-right: 100px;
            /*list-style-type: circle;*/

        }

        #tableProfile {
            border: 2px solid grey;
        }
    </style>

    <title>Template</title>
</head>
<body>
<div id="container">
    <div id="myhead">

        <img id="myHeaderImage" src="{{URL::to('/Uploads/userImage/'.$personalDetail->image)}}" alt="">
        <br><br>
        <h1 id="myHeader">{{$personalDetail->fullName}}</h1>
    </div>
    <div id="myBody">
        <hr>
        <hr style="margin-top: 2px;background-color: red">
        <ul style="margin-left: 15px;margin-top: 10px">
            <li>Address:{{$personalDetail->address}}</li>
        </ul>
        <ul id="subpoint">
            <li>Tel:{{$personalDetail->mobileNo}}</li>
            <li>Email:{{$personalDetail->email}}</li>
            <li>Website:linkedIn</li>
        </ul>
        {{--profile--}}
        <table id="tableProfile" style="width: 100%;">
            <tr>
                <th style="background-color: #BDBDBD"><i>Profile</i>
                </th>
            </tr>
            <tr>
                <td>
                    <p style="margin-top: 10px">Objective: <br>{{$personalProfile->careerObjective}} </p><br>
                    <p>Summary: <br>{{$personalProfile->careerSummary}}</p>
                </td>
            </tr>
        </table>
        <br>
        {{--key Skill--}}
        <table style="border: 2px solid grey;width: 100%;">
            <tr>
                <th style="background-color: #BDBDBD"><i>Key Skill</i></th>

            </tr>
            @foreach($skill as $value)
                <tr>
                    <td>
                        <p style="margin-top: 10px">{{$value->skill}}: <br>{{$value->about}}</p>
                    </td>
                </tr>
            @endforeach
        </table>
        {{--education--}}
        <br>
        <table style="border: 2px solid grey;width: 100%;">
            <tr>
                <th colspan="2" style="background-color: #BDBDBD"><i>Education</i></th>
            </tr>
            @foreach($education as $value)
                <tr>
                    <td>
                        <p style="margin-top: 10px">{{$value->subject}}
                            <br>{{$value->institute}}
                            <br>{{$value->location}}<br></p>

                    </td>
                    <td style="text-align: right">
                        <i style="font-size: 13px">{{$value->startTime}}-

                            @if($value->endTime==='attending')
                                Attending
                            @else
                                {{$value->endTime}}
                            @endif

                        </i>

                    </td>
                </tr>
            @endforeach
        </table>
        {{--Experience--}}
        <br>
        <table style="border: 2px solid grey; width: 100%">
            <tr>
                <th colspan="2" style="background-color: #BDBDBD"><i>Experience</i>
                </th>
            </tr>
            @foreach($experience as $value)
                <tr>
                    <td>
                        <p style="margin-top: 10px">{{$value->companyName}}<br>
                            {{$value->location}}<br>
                            {{$value->jobTitle}}<br>
                            {{$value->jobSummary}}
                        </p></td>
                    <td style="text-align: right">
                        <i style="font-size: 13px">
                            {{--available for <br>--}}{{--Full Time <br>--}}
                            {{\Carbon\Carbon::parse($value->startTime)->format('M Y')}} to
                            @if($value->endTime==='Current')
                                Current
                            @else
                                {{\Carbon\Carbon::parse($value->endTime)->format('M Y')}}
                            @endif
                        </i>
                    </td>
                </tr>
            @endforeach
        </table>


        {{--reference--}}
        <br>
        <table style="border: 2px solid grey; width: 100%;">
            <tr>
                <th style="background-color: #BDBDBD"><i>Reference</i></th>
            </tr>
            @forelse($reference as $value)
                <tr>
                    <td>
                        <p style="margin-top: 10px">Referee:{{$value->referee}}
                            <br>
                            Referee Contact:{{$value->refereeContact}}
                        </p>
                    </td>
                </tr>
                @empty
                <p>Reference Available on request</p>
            @endforelse
        </table>
    </div>


</div>

</body>
</html>
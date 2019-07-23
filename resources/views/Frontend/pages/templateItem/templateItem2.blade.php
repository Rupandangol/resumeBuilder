<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>CvBuilder</title>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 16px Helvetica, Sans-Serif;
            line-height: 24px;
            background: url(images/noise.jpg);
        }

        .clear {
            clear: both;
        }

        #page-wrap {
            width: 800px;
            margin: 40px auto 60px;
        }

        #pic {
            float: right;
            margin: -30px 0 0 0;
        }

        h1 {
            margin: 0 0 16px 0;
            padding: 0 0 16px 0;
            font-size: 42px;
            font-weight: bold;
            letter-spacing: -2px;
            border-bottom: 1px solid #999;
        }

        h2 {
            font-size: 20px;
            margin: 0 0 6px 0;
            position: relative;
        }

        h2 span {
            position: absolute;
            bottom: 0;
            right: 0;
            font-style: italic;
            font-family: Georgia, Serif;
            font-size: 16px;
            color: #999;
            font-weight: normal;
        }

        p {
            margin: 0 0 16px 0;
        }

        a {
            color: #999;
            text-decoration: none;
            border-bottom: 1px dotted #999;
        }

        a:hover {
            border-bottom-style: solid;
            color: black;
        }

        ul {
            margin: 0 0 32px 17px;
        }

        #objective {
            width: 500px;
            float: left;
        }

        #objective p {
            font-family: Georgia, Serif;
            font-style: italic;
            color: #666;
        }

        dt {
            font-style: italic;
            font-weight: bold;
            font-size: 18px;
            text-align: right;
            padding: 0 26px 0 0;
            width: 150px;
            float: left;
            height: 100px;
            border-right: 1px solid #999;
        }

        dd {
            width: 600px;
            float: right;
        }

        dd.clear {
            float: none;
            margin: 0;
            height: 15px;
        }
    </style>
</head>

<body>

<div id="page-wrap">

    <img src="{{URL::to('/Uploads/userImage/'.$personalDetail->image)}}" alt="Photo of Cthulu" id="pic"/>

    <div id="contact-info" class="vcard">

        <!-- Microformats! -->

        <h1 class="fn">{{ucfirst($personalDetail->fullName)}}</h1>

        <p>
            Cell: <span class="tel">{{$personalDetail->mobileNo}}</span><br/>
            Email: <a class="email" href="">{{$personalDetail->email}}</a>
        </p>
    </div>

    <div id="objective">
        @foreach($personalProfile as $value)
            <p>
                {{$value->careerObjective}}
            </p>
        @endforeach
    </div>

    <div class="clear"></div>

    <dl>
        <dd class="clear"></dd>

        <dt>Education</dt>
        @foreach($education as $value)
            <dd>
                <h2>{{ucfirst($value->institute)}}</h2>
                <p><strong>Major:</strong> Public Relations<br/>
                    <strong>Minor:</strong> Scale Tending</p>
            </dd>

        @endforeach
        <dd class="clear"></dd>

        <dt>Skills</dt>
        {{--@foreach($skill as $value)--}}
            {{--<dd>--}}
                {{--<h2>{{$value->skill}}</h2>--}}
                {{--<p>{{$value->about}}</p>--}}

            {{--</dd>--}}
        {{--@endforeach--}}
{{--        {{htmlspecialchars_decode($skill)}}--}}

        <dd class="clear"></dd>

        <dt>Experience</dt>
        @foreach($experience as $value)
            <dd>
                <h2>{{$value->companyName}} <span>{{$value->jobTitle}} - {{$value->location}} - {{$value->startTime}}
                        -{{$value->endTime}}</span></h2>
                <ul>
                    <li>Inspired and won highest peasant death competition among servants</li>
                    <li>Helped coordinate managers to grow cult following</li>
                    <li>Provided untimely deaths to all who opposed</li>
                </ul>
            </dd>
        @endforeach

        <dd class="clear"></dd>

        <dt>Hobbies</dt>
        <dd>World Domination, Deep Sea Diving, Murder Most Foul</dd>

        <dd class="clear"></dd>

        <dt>References</dt>
        @foreach($reference as $value)
            <dd>
                <h4>{{$value->referee}}</h4>
                <p><strong>contact:</strong>{{$value->refereeContact}}</p>
            </dd>

        @endforeach
        <dd class="clear"></dd>
    </dl>

    <div class="clear"></div>

</div>

</body>

</html>
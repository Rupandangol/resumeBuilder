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
            background-image: url("/Uploads/resumeTemplate/5.png");
            font-family: sans-serif, "Times New Roman";
        }

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

    </style>


    <title>Document</title>
</head>


<body>

<div id="container">
    <div id="content">
        <div id="nav">
            <img style="margin-left:5px;width: 120px;height: 100px;border-radius: 30px"
                 src="{{URL::to('/Uploads/userImage/'.$personalDetail->image)}}" alt=""><br><br>

            <h3>Contact</h3>
            <p id="myContact">{{$personalDetail->email}}<br>Website<br>{{$personalDetail->location}}
                <br>{{$personalDetail->mobileNo}}</p>
            <br>


            <h3 style="margin-bottom: 5px">Skill</h3>
            <p id="mySkill">
                @foreach($skill as $value)
                    {{$value->skill}}<br>
                @endforeach
            </p>
        </div>
        <div id="main">
            <h1 id="myName">{{ucfirst($personalDetail->fullName)}}</h1>
            <p>{{ucfirst($personalProfile->jobCategory)}}</p>
            <hr>
            <h3>Objective</h3>
            <p>{{$personalProfile->careerObjective}}</p>

            <hr>
            <h3>Experience</h3>
            @foreach($experience as $value)
                <p>{{$value->companyName}}</p>
                <ul id="myExp">
                    <li>{{$value->jobTitle}}</li>
                    <li>Duration</li>
                    <li>{{$value->location}}</li>
                    <li>{{$value->jobSummary}}
                    </li>
                </ul>
            @endforeach
            <hr>

            <h3>Education</h3>
            @foreach($education as $value)
                <p>{{$value->institute}}</p>
                <ul id="myEdu">
                    <li>{{$value->subject}},{{$value->grade}}</li>
                    <li>Duration</li>
                    <li>{{$value->location}}</li>
                </ul>
            @endforeach
        </div>
        <div id="footer">


        </div>

    </div>

</div>
</body>
</html>


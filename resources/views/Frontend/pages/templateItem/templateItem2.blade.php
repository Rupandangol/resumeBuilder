<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        body{
            font-family:"Times New Roman";
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

        <img id="myHeaderImage" src="{{URL::to('/Uploads/userImage')}}" alt="">
        <br><br>
        <h1 id="myHeader">full<span style="color: red;">Name</span></h1>
    </div>
    <div id="myBody">
        <hr>
        <hr style="margin-top: 2px;background-color: red">
        <ul style="margin-left: 15px;margin-top: 10px">
            <li>Address:ajsdkfljasdklfj</li>
        </ul>
        <ul id="subpoint">
            <li>Tel:9841414989</li>
            <li>Email:asdfkalsdjf@gamil.com</li>
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
                    <p style="margin-top: 10px">Objective: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Amet architecto,
                        assumenda
                        beatae doloremque eligendi enim eum eveniet expedita, fugiat, hic id ipsam nihil omnis
                        praesentium
                        quas quia repellendus tenetur voluptatum! </p><br>
                    <p>Summary: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur deserunt,
                        esse
                        magnam maxime minus natus neque non odit quod recusandae reiciendis repudiandae unde vel vero
                        voluptas voluptates voluptatibus. Ad, commodi.</p>
                </td>
            </tr>
        </table>
        <br>
        {{--key Skill--}}
        <table style="border: 2px solid grey;width: 100%;">
            <tr>
                <th style="background-color: #BDBDBD"><i>Key Skill</i></th>

            </tr>
            <tr>
                <td>
                    <p style="margin-top: 10px">Skills: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Commodi eos est eum
                        explicabo libero nemo nisi porro quaerat quos veritatis. Culpa cupiditate eligendi expedita
                        impedit perferendis recusandae repudiandae, veniam voluptatibus.</p>
                </td>
            </tr>
        </table>
        {{--education--}}
        <br>
        <table style="border: 2px solid grey;width: 100%;">
            <tr>
                <th colspan="2" style="background-color: #BDBDBD"><i>Education</i></th>
            </tr>
            <tr>
                <td>
                    <p style="margin-top: 10px">Level Bachelor in electronics and communication
                        <br>institute
                        <br>location:asdf <br></p>

                </td>
                <td style="text-align: right">
                    <i style="font-size: 13px">2002-2006</i>

                </td>
            </tr>
        </table>
        {{--Experience--}}
        <br>
        <table style="border: 2px solid grey; width: 100%">
            <tr>
                <th colspan="2" style="background-color: #BDBDBD"><i>Experience</i>
                </th>
            </tr>
            <tr>
                <td>
                    <p style="margin-top: 10px">Company Name <br>
                        location <br>
                        jobTitle <br>
                        jobSummary
                    </p></td>
                <td style="text-align: right">
                    <i style="font-size: 13px">
                        {{--available for <br>--}}Full Time <br>
                        Oct 2002 to dec 2006
                    </i>
                </td>
            </tr>

        </table>


        {{--reference--}}
        <br>
        <table style="border: 2px solid grey; width: 100%;">
            <tr>
                <th style="background-color: #BDBDBD"><i>Reference</i></th>
            </tr>
            <tr>
                <td>
                    <p style="margin-top: 10px">Referee:
                        <br>
                        Referee Contact:
                    </p>
                </td>
            </tr>
        </table>
    </div>


</div>

</body>
</html>
@extends('Frontend.master')

@section('progressBar')
    <div id="myProgressBar" class="progress"
         style="background-color: #2c3b41;position: fixed;top:50px; width: 100%;z-index: 20">
        <div id="myInnerBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100" style="width:10%;background-color:#3F51B5">10%
        </div>
    </div>
@endsection


@section('contentHeader')
    <br><br><br><h2 style="text-align: center;color: whitesmoke;">Cv<b style="color: honeydew"> Generator</b></h2>
@endsection
@section('my-header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{URL::to('/lib/select2/dist/css/select2.min.css')}}">

@endsection

@section('content')
    {{--personal profiles--}}

    <div class="box box-info">

        @if($errors->has('lookingFor')||$errors->has('availableFor')||$errors->has('expectedSalary')||$errors->has('careerObjective')||$errors->has('careerSummary'))
            <div class="alert alert-danger">
                <p>
                    Do not leave empty box
                </p>
            </div>
        @endif
        {{--personal details--}}
        <form id="myProfile" action="{{url('/personalProfile')}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title">Personal Profile</h3>
                </div>
                {{--For DB Data--}}
                @if($profile)

                    <div class="form-group">
                        <label for="exampleInputEmail1">Looking For</label>

                        <select name="lookingFor" class="form-control">
                            <option @if($profile->lookingFor==='Entry Level')selected="selected"@endif>Entry Level
                            </option>
                            <option @if($profile->lookingFor==='Mid Level')selected="selected"@endif>Mid Level</option>
                            <option @if($profile->lookingFor==='Senior Level')selected="selected"@endif>Senior Level
                            </option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Available For</label>
                        <select name="availableFor" class="form-control">
                            <option @if($profile->availableFor==='Part Time') selected="selected" @endif>Part Time
                            </option>
                            <option @if($profile->availableFor==='Full Time') selected="selected" @endif>Full Time
                            </option>
                            <option @if($profile->availableFor==='Freelance') selected="selected" @endif>Freelance
                            </option>
                        </select>
                    </div>

                    {{--<label for="exampleInputEmail1">Job Category</label>--}}
                    {{--<div class="form-group">--}}

                    {{--<select name="jobCategory" class="form-control selectpicker">--}}
                    {{--<option @if($profile->jobCategory==='Laravel Developer') selected="selected" @endif>Laravel--}}
                    {{--Developer--}}
                    {{--</option>--}}
                    {{--<option @if($profile->jobCategory==='React Js Developer') selected="selected" @endif>React--}}
                    {{--Js Developer--}}
                    {{--</option>--}}
                    {{--<option @if($profile->jobCategory==='HR') selected="selected" @endif>HR</option>--}}
                    {{--<option @if($profile->jobCategory==='Marketing Executive') selected="selected" @endif>--}}
                    {{--Marketing Executive--}}
                    {{--</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Job Category</label>
                        <select name="jobCategoryTitle" class="form-control">
                            <option @if($profile->jobCategoryTitle==='Sales/ Public Relations') selected @endif>Sales/
                                Public Relations
                            </option>
                            <option @if($profile->jobCategoryTitle==='NGO/ INGO/ Social work') selected @endif>NGO/
                                INGO/ Social work
                            </option>
                            <option @if($profile->jobCategoryTitle==='Marketing/ Advertising/ Customer Service') selected @endif>
                                Marketing/ Advertising/ Customer Service
                            </option>
                            <option @if($profile->jobCategoryTitle==='IT & Telecommunication') selected @endif>IT &
                                Telecommunication
                            </option>
                            <option @if($profile->jobCategoryTitle==='Banking/ Insurance/ Financial Services') selected @endif>
                                Banking/ Insurance/ Financial Services
                            </option>
                            <option @if($profile->jobCategoryTitle==='Secretarial/ Front Office/ Data Entry') selected @endif>
                                Secretarial/ Front Office/ Data Entry
                            </option>
                            <option @if($profile->jobCategoryTitle==='Accounting/ Finance') selected @endif>Accounting/
                                Finance
                            </option>
                            <option @if($profile->jobCategoryTitle==='Construction/ Engineering/ Architects') selected @endif>
                                Construction/ Engineering/ Architects
                            </option>
                            <option @if($profile->jobCategoryTitle==='Creative/ Graphics/ Designing') selected @endif>
                                Creative/ Graphics/ Designing
                            </option>
                            <option @if($profile->jobCategoryTitle==='Teaching/ Education') selected @endif>Teaching/
                                Education
                            </option>
                            <option @if($profile->jobCategoryTitle==='Commercial/ Logistics/ Supply Chain') selected @endif>
                                Commercial/ Logistics/ Supply Chain
                            </option>
                            <option @if($profile->jobCategoryTitle==='Hospitality') selected @endif>Hospitality
                            </option>
                            <option @if($profile->jobCategoryTitle==='General Mgmt./ Administration/ Operation') selected @endif>
                                General Mgmt./ Administration/ Operation
                            </option>
                            <option @if($profile->jobCategoryTitle==='Healthcare/ Pharma/ Biotech/ Medical/ R&D') selected @endif>
                                Healthcare/ Pharma/ Biotech/ Medical/ R&D
                            </option>
                            <option @if($profile->jobCategoryTitle==='Production/ Maintenance/ Quality') selected @endif>
                                Production/ Maintenance/ Quality
                            </option>
                            <option @if($profile->jobCategoryTitle==='Human Resource/Org. Development') selected @endif>
                                Human Resource/Org. Development
                            </option>
                            <option @if($profile->jobCategoryTitle==='journalism/ Editor/ Media') selected @endif>
                                journalism/ Editor/ Media
                            </option>
                            <option @if($profile->jobCategoryTitle==='Research and Development') selected @endif>
                                Research and Development
                            </option>
                            <option @if($profile->jobCategoryTitle==='Legal Services') selected @endif>Legal Services
                            </option>
                            <option @if($profile->jobCategoryTitle==='Fashion/ Textile Designing') selected @endif>
                                Fashion/ Textile Designing
                            </option>
                            <option @if($profile->jobCategoryTitle==='Others') selected @endif>Others
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Job Title</label>
                        <input type="text" class="form-control" name="jobCategory" id=""
                               value="{{$profile->jobCategory}}" placeholder="Eg: HR/Java Developer/Sales Executive">
                    </div>
                    {{--preferred job--}}

                    <div class="form-group" data-select2-id="24">
                        <label>Preferred Job Location</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                data-select2-id="1" name="preferredLocation" tabindex="-1" aria-hidden="true">
                            <option @if($profile->preferredLocation==='Kathmandu') selected="selected" @endif data-select2-id="3">Kathmandu</option>
                            <option @if($profile->preferredLocation==='Lalitpur') selected="selected" @endif data-select2-id="26">Lalitpur</option>
                            <option @if($profile->preferredLocation==='Sindhuli') selected="selected" @endif data-select2-id="27">Sindhuli</option>
                            <option @if($profile->preferredLocation==='Ramechhap') selected="selected" @endif data-select2-id="28">Ramechhap</option>
                            <option @if($profile->preferredLocation==='Dolakha') selected="selected" @endif data-select2-id="29">Dolakha</option>
                            <option @if($profile->preferredLocation==='Bhaktapur') selected="selected" @endif data-select2-id="29">Bhaktapur</option>
                            <option @if($profile->preferredLocation==='Dhading') selected="selected" @endif data-select2-id="29">Dhading</option>
                            <option @if($profile->preferredLocation==='Kavrepalnchok') selected="selected" @endif data-select2-id="29">Kavreplanchok</option>
                            <option @if($profile->preferredLocation==='Nuwakot') selected="selected" @endif data-select2-id="29">Nuwakot</option>
                            <option @if($profile->preferredLocation==='Rasuwa') selected="selected" @endif data-select2-id="29">Rasuwa</option>
                            <option @if($profile->preferredLocation==='Sindhuplachok') selected="selected" @endif data-select2-id="29">Sindhupalchok</option>
                            <option @if($profile->preferredLocation==='Chitwan') selected="selected" @endif data-select2-id="29">Chitwan</option>
                            <option @if($profile->preferredLocation==='Makwanpur') selected="selected" @endif data-select2-id="29">Makwanpur</option>
                            <option @if($profile->preferredLocation==='Bhajpur') selected="selected" @endif data-select2-id="29">Bhojpur</option>
                            <option @if($profile->preferredLocation==='Dhankuta') selected="selected" @endif data-select2-id="29">Dhankuta</option>
                            <option @if($profile->preferredLocation==='Ilam') selected="selected" @endif data-select2-id="29">Ilam</option>
                            <option @if($profile->preferredLocation==='Jhapa') selected="selected" @endif data-select2-id="29">Jhapa</option>
                            <option @if($profile->preferredLocation==='Khotang') selected="selected" @endif data-select2-id="29">Khotang</option>
                            <option @if($profile->preferredLocation==='Morang') selected="selected" @endif data-select2-id="29">Morang</option>
                            <option @if($profile->preferredLocation==='Okhaldhunga') selected="selected" @endif data-select2-id="29">Okhaldhunga</option>
                            <option @if($profile->preferredLocation==='Panchthar') selected="selected" @endif data-select2-id="29">Panchthar</option>
                            <option @if($profile->preferredLocation==='Sankhuwasabha') selected="selected" @endif data-select2-id="29">Sankhuwasabha</option>
                            <option @if($profile->preferredLocation==='Solukhumbu') selected="selected" @endif data-select2-id="29">Solukhumbu</option>
                            <option @if($profile->preferredLocation==='Sunsari') selected="selected" @endif data-select2-id="29">Sunsari</option>
                            <option @if($profile->preferredLocation==='Taplejung') selected="selected" @endif data-select2-id="29">Taplejung</option>
                            <option @if($profile->preferredLocation==='Terhathun') selected="selected" @endif data-select2-id="29">Terhathun</option>
                            <option @if($profile->preferredLocation==='Udayapur') selected="selected" @endif data-select2-id="29">Udayapur</option>
                            <option @if($profile->preferredLocation==='Saptari') selected="selected" @endif data-select2-id="29">Saptari</option>
                            <option @if($profile->preferredLocation==='Siraha') selected="selected" @endif data-select2-id="29">Siraha</option>
                            <option @if($profile->preferredLocation==='Dhanusa') selected="selected" @endif data-select2-id="29">Dhanusa</option>
                            <option @if($profile->preferredLocation==='Mohottari') selected="selected" @endif data-select2-id="29">Mahottari</option>
                            <option @if($profile->preferredLocation==='Sarlahi') selected="selected" @endif data-select2-id="29">Sarlahi</option>
                            <option @if($profile->preferredLocation==='Bara') selected="selected" @endif data-select2-id="29">Bara</option>
                            <option @if($profile->preferredLocation==='Parsa') selected="selected" @endif data-select2-id="29">Parsa</option>
                            <option @if($profile->preferredLocation==='Rautahat') selected="selected" @endif data-select2-id="29">Rautahat</option>
                            <option @if($profile->preferredLocation==='Baglung') selected="selected" @endif data-select2-id="29">Baglung</option>
                            <option @if($profile->preferredLocation==='Gorkha') selected="selected" @endif data-select2-id="29">Gorkha</option>
                            <option @if($profile->preferredLocation==='Kaski') selected="selected" @endif data-select2-id="29">Kaski</option>
                            <option @if($profile->preferredLocation==='Lamjung') selected="selected" @endif data-select2-id="29">Lamjung</option>
                            <option @if($profile->preferredLocation==='Manang') selected="selected" @endif data-select2-id="29">Manang</option>
                            <option @if($profile->preferredLocation==='Mustang') selected="selected" @endif data-select2-id="29">Mustang</option>
                            <option @if($profile->preferredLocation==='Myagdi') selected="selected" @endif data-select2-id="29">Myagdi</option>
                            <option @if($profile->preferredLocation==='Nawalpur') selected="selected" @endif data-select2-id="29">Nawalpur</option>
                            <option @if($profile->preferredLocation==='Parbat') selected="selected" @endif data-select2-id="29">Parbat</option>
                            <option @if($profile->preferredLocation==='Syangja') selected="selected" @endif data-select2-id="29">Syangja</option>
                            <option @if($profile->preferredLocation==='Tanahun') selected="selected" @endif data-select2-id="29">Tanahun</option>
                            <option @if($profile->preferredLocation==='Kapilvastu') selected="selected" @endif data-select2-id="29">Kapilvastu</option>
                            <option @if($profile->preferredLocation==='Parasi') selected="selected" @endif data-select2-id="29">Parasi</option>
                            <option @if($profile->preferredLocation==='Rupandehi') selected="selected" @endif data-select2-id="29">Rupandehi</option>
                            <option @if($profile->preferredLocation==='Arghkhanchi') selected="selected" @endif data-select2-id="29">Arghakhanchi</option>
                            <option @if($profile->preferredLocation==='Gulmi') selected="selected" @endif data-select2-id="29">Gulmi</option>
                            <option @if($profile->preferredLocation==='Palpa') selected="selected" @endif data-select2-id="29">Palpa</option>
                            <option @if($profile->preferredLocation==='Dang') selected="selected" @endif data-select2-id="29">Dang</option>
                            <option @if($profile->preferredLocation==='Pyuthan') selected="selected" @endif data-select2-id="29">Pyuthan</option>
                            <option @if($profile->preferredLocation==='Rolpa') selected="selected" @endif data-select2-id="29">Rolpa</option>
                            <option @if($profile->preferredLocation==='Rukum(Eastern)') selected="selected" @endif data-select2-id="29">Rukum(Eastern)</option>
                            <option @if($profile->preferredLocation==='Banke') selected="selected" @endif data-select2-id="29">Banke</option>
                            <option @if($profile->preferredLocation==='Bardiya') selected="selected" @endif data-select2-id="29">Bardiya</option>
                            <option @if($profile->preferredLocation==='Rukum(Western)') selected="selected" @endif data-select2-id="29">Rukum(Western)</option>
                            <option @if($profile->preferredLocation==='Salyan') selected="selected" @endif data-select2-id="29">Salyan</option>
                            <option @if($profile->preferredLocation==='Dolpa') selected="selected" @endif data-select2-id="29">Dolpa</option>
                            <option @if($profile->preferredLocation==='Humla') selected="selected" @endif data-select2-id="29">Humla</option>
                            <option @if($profile->preferredLocation==='Jumla') selected="selected" @endif data-select2-id="29">Jumla</option>
                            <option @if($profile->preferredLocation==='Kalikot') selected="selected" @endif data-select2-id="29">Kalikot</option>
                            <option @if($profile->preferredLocation==='Mugu') selected="selected" @endif data-select2-id="29">Mugu</option>
                            <option @if($profile->preferredLocation==='Surkhet') selected="selected" @endif data-select2-id="29">Surkhet</option>
                            <option @if($profile->preferredLocation==='Dailekh') selected="selected" @endif data-select2-id="29">Dailekh</option>
                            <option @if($profile->preferredLocation==='Jajarkot') selected="selected" @endif data-select2-id="29">Jajarkot</option>
                            <option @if($profile->preferredLocation==='Kailali') selected="selected" @endif data-select2-id="29">Kailali</option>
                            <option @if($profile->preferredLocation==='Achham') selected="selected" @endif data-select2-id="29">Achham</option>
                            <option @if($profile->preferredLocation==='Doti') selected="selected" @endif data-select2-id="29">Doti</option>
                            <option @if($profile->preferredLocation==='Bajhang') selected="selected" @endif data-select2-id="29">Bajhang</option>
                            <option @if($profile->preferredLocation==='Bajura') selected="selected" @endif data-select2-id="29">Bajura</option>
                            <option @if($profile->preferredLocation==='Kanchanpur') selected="selected" @endif data-select2-id="29">Kanchanpur</option>
                            <option @if($profile->preferredLocation==='Dadeldhura') selected="selected" @endif data-select2-id="29">Dadeldhura</option>
                            <option @if($profile->preferredLocation==='Baitadi') selected="selected" @endif data-select2-id="29">Baitadi</option>
                            <option @if($profile->preferredLocation==='Darchula') selected="selected" @endif data-select2-id="29">Darchula</option>
                        </select>
                    </div>
                    {{--end of preferred job--}}

                    {{--radio--}}
                    <div class="form-group">
                        <label for="">
                            Are you currently looking for a job?
                        </label><br>
                        <div class="radio btn btn-default">
                            <label>
                                <input type="radio" name="interestedInJob" value="yes" @if($profile->interestedInJob==='yes') checked @endif>
                                Yes
                            </label>
                        </div>
                        <div style="margin-top: 10px" class="radio btn btn-default">
                            <label>
                                <input type="radio" name="interestedInJob" value="no" @if($profile->interestedInJob==='no') checked @endif>
                                No
                            </label>
                        </div>
                    </div>
                    {{--end of radio--}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Expected Salary</label>
                        <input type="number" class="form-control" value="{{$profile->expectedSalary}}"
                               name="expectedSalary" id=""
                               placeholder="Expected Salary">
                    </div>
                    <div class="form-group">
                        <label>Career Objective
                        </label>
                        <textarea class="ckeditor form-control" name="careerObjective" id="" style="resize: none;"
                                  rows="5">{{htmlspecialchars_decode($profile->careerObjective)}}</textarea>
                    </div>

                    {{--For OLD Data--}}
                @else
                    @if(old('lookingFor'))
                        <div class="form-group">
                            <label for="exampleInputEmail1">Looking For</label>
                            <select name="lookingFor" class="form-control">
                                <option @if(old('lookingFor')==='Entry Level')selected="selected" @endif>Entry Level
                                </option>
                                <option @if(old('lookingFor')==='Mid Level')selected="selected"@endif>Mid Level</option>
                                <option @if(old('lookingFor')==='Senior Level')selected="selected"@endif>Senior Level
                                </option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Available For</label>
                            <select name="availableFor" class="form-control">
                                <option @if(old('availableFor')==='Part Time')selected="selected" @endif>Part Time
                                </option>
                                <option @if(old('availableFor')==='Full Time')selected="selected" @endif>Full Time
                                </option>
                                <option @if(old('availableFor')==='Freelance')selected="selected" @endif>Freelance
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Category</label>
                            <select name="jobCategoryTitle" class="form-control">
                                <option @if(old('jobCategoryTitle')==='Sales/ Public Relations') selected @endif>Sales/
                                    Public Relations
                                </option>
                                <option @if(old('jobCategoryTitle')==='NGO/ INGO/ Social work') selected @endif>NGO/
                                    INGO/ Social work
                                </option>
                                <option @if(old('jobCategoryTitle')==='Marketing/ Advertising/ Customer Service') selected @endif>
                                    Marketing/ Advertising/ Customer Service
                                </option>
                                <option @if(old('jobCategoryTitle')==='IT & Telecommunication') selected @endif>IT &
                                    Telecommunication
                                </option>
                                <option @if(old('jobCategoryTitle')==='Banking/ Insurance/ Financial Services') selected @endif>
                                    Banking/ Insurance/ Financial Services
                                </option>
                                <option @if(old('jobCategoryTitle')==='Secretarial/ Front Office/ Data Entry') selected @endif>
                                    Secretarial/ Front Office/ Data Entry
                                </option>
                                <option @if(old('jobCategoryTitle')==='Accounting/ Finance') selected @endif>Accounting/
                                    Finance
                                </option>
                                <option @if(old('jobCategoryTitle')==='Construction/ Engineering/ Architects') selected @endif>
                                    Construction/ Engineering/ Architects
                                </option>
                                <option @if(old('jobCategoryTitle')==='Creative/ Graphics/ Designing') selected @endif>
                                    Creative/ Graphics/ Designing
                                </option>
                                <option @if(old('jobCategoryTitle')==='Teaching/ Education') selected @endif>Teaching/
                                    Education
                                </option>
                                <option @if(old('jobCategoryTitle')==='Commercial/ Logistics/ Supply Chain') selected @endif>
                                    Commercial/ Logistics/ Supply Chain
                                </option>
                                <option @if(old('jobCategoryTitle')==='Hospitality') selected @endif>Hospitality
                                </option>
                                <option @if(old('jobCategoryTitle')==='General Mgmt./ Administration/ Operation') selected @endif>
                                    General Mgmt./ Administration/ Operation
                                </option>
                                <option @if(old('jobCategoryTitle')==='Healthcare/ Pharma/ Biotech/ Medical/ R&D') selected @endif>
                                    Healthcare/ Pharma/ Biotech/ Medical/ R&D
                                </option>
                                <option @if(old('jobCategoryTitle')==='Production/ Maintenance/ Quality') selected @endif>
                                    Production/ Maintenance/ Quality
                                </option>
                                <option @if(old('jobCategoryTitle')==='Human Resource/Org. Development') selected @endif>
                                    Human Resource/Org. Development
                                </option>
                                <option @if(old('jobCategoryTitle')==='journalism/ Editor/ Media') selected @endif>
                                    journalism/ Editor/ Media
                                </option>
                                <option @if(old('jobCategoryTitle')==='Research and Development') selected @endif>
                                    Research and Development
                                </option>
                                <option @if(old('jobCategoryTitle')==='Legal Services') selected @endif>Legal Services
                                </option>
                                <option @if(old('jobCategoryTitle')==='Fashion/ Textile Designing') selected @endif>
                                    Fashion/ Textile Designing
                                </option>
                                <option @if(old('jobCategoryTitle')==='Others') selected @endif>Others
                                </option>
                            </select>
                        </div>


                        {{--<label for="exampleInputEmail1">Job Category</label>--}}
                        {{--<div class="form-group">--}}
                        {{--<select name="jobCategory" class="form-control selectpicker">--}}
                        {{--<option @if(old('jobCategory')==='Laravel Developer') selected="selected" @endif>Laravel--}}
                        {{--Developer--}}
                        {{--</option>--}}
                        {{--<option @if(old('jobCategory')==='React Js Developer') selected="selected" @endif>React--}}
                        {{--Js Developer--}}
                        {{--</option>--}}
                        {{--<option @if(old('jobCategory')==='HR') selected="selected" @endif>HR</option>--}}
                        {{--<option @if(old('jobCategory')==='Marketing Executive') selected="selected" @endif>--}}
                        {{--Marketing Executive--}}
                        {{--</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Title</label>
                            <input type="text" class="form-control" name="jobCategory" id=""
                                   value="{{old('jobCategory')??''}}"
                                   placeholder="Eg: HR/Java Developer/Sales Executive">
                        </div>
                        {{--preferred job--}}

                        <div class="form-group" data-select2-id="24">
                            <label>Preferred Job Location</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" name="preferredLocation" tabindex="-1" aria-hidden="true">
                                <option @if(old('preferredLocation')==='Kathmandu') selected="selected"
                                        @endif data-select2-id="3">Kathmandu
                                </option>
                                <option @if(old('preferredLocation')==='Lalitpur') selected="selected"
                                        @endif data-select2-id="26">Lalitpur
                                </option>
                                <option @if(old('preferredLocation')==='Sindhuli') selected="selected"
                                        @endif data-select2-id="27">Sindhuli
                                </option>
                                <option @if(old('preferredLocation')==='Ramechhap') selected="selected"
                                        @endif data-select2-id="28">Ramechhap
                                </option>
                                <option @if(old('preferredLocation')==='Dolakha') selected="selected"
                                        @endif data-select2-id="29">Dolakha
                                </option>
                                <option @if(old('preferredLocation')==='Bhaktapur') selected="selected"
                                        @endif data-select2-id="29">Bhaktapur
                                </option>
                                <option @if(old('preferredLocation')==='Dhading') selected="selected"
                                        @endif data-select2-id="29">Dhading
                                </option>
                                <option @if(old('preferredLocation')==='Kavreplanchok') selected="selected"
                                        @endif data-select2-id="29">Kavreplanchok
                                </option>
                                <option @if(old('preferredLocation')==='Nuwakot') selected="selected"
                                        @endif data-select2-id="29">Nuwakot
                                </option>
                                <option @if(old('preferredLocation')==='Rasuwa') selected="selected"
                                        @endif data-select2-id="29">Rasuwa
                                </option>
                                <option @if(old('preferredLocation')==='Sindhupalchok') selected="selected"
                                        @endif data-select2-id="29">Sindhupalchok
                                </option>
                                <option @if(old('preferredLocation')==='Chitwan') selected="selected"
                                        @endif data-select2-id="29">Chitwan
                                </option>
                                <option @if(old('preferredLocation')==='Makwanpur') selected="selected"
                                        @endif data-select2-id="29">Makwanpur
                                </option>
                                <option @if(old('preferredLocation')==='Bhojpur') selected="selected"
                                        @endif data-select2-id="29">Bhojpur
                                </option>
                                <option @if(old('preferredLocation')==='Dhankuta') selected="selected"
                                        @endif data-select2-id="29">Dhankuta
                                </option>
                                <option @if(old('preferredLocation')==='Ilam') selected="selected"
                                        @endif data-select2-id="29">Ilam
                                </option>
                                <option @if(old('preferredLocation')==='Jhapa') selected="selected"
                                        @endif data-select2-id="29">Jhapa
                                </option>
                                <option @if(old('preferredLocation')==='Khotang') selected="selected"
                                        @endif data-select2-id="29">Khotang
                                </option>
                                <option @if(old('preferredLocation')==='Morang') selected="selected"
                                        @endif data-select2-id="29">Morang
                                </option>
                                <option @if(old('preferredLocation')==='Okhaldhunga') selected="selected"
                                        @endif data-select2-id="29">Okhaldhunga
                                </option>
                                <option @if(old('preferredLocation')==='Panchthar') selected="selected"
                                        @endif data-select2-id="29">Panchthar
                                </option>
                                <option @if(old('preferredLocation')==='Sankhuwasabha') selected="selected"
                                        @endif data-select2-id="29">Sankhuwasabha
                                </option>
                                <option @if(old('preferredLocation')==='Solukhumbu') selected="selected"
                                        @endif data-select2-id="29">Solukhumbu
                                </option>
                                <option @if(old('preferredLocation')==='Sunsari') selected="selected" @endif data-select2-id="29">Sunsari</option>
                                <option @if(old('preferredLocation')==='Taplejung') selected="selected" @endif data-select2-id="29">Taplejung</option>
                                <option @if(old('preferredLocation')==='Terhathun') selected="selected" @endif data-select2-id="29">Terhathun</option>
                                <option @if(old('preferredLocation')==='Udayapur') selected="selected" @endif data-select2-id="29">Udayapur</option>
                                <option @if(old('preferredLocation')==='Saptari') selected="selected" @endif data-select2-id="29">Saptari</option>
                                <option @if(old('preferredLocation')==='Siraha') selected="selected" @endif data-select2-id="29">Siraha</option>
                                <option @if(old('preferredLocation')==='Dhanusa') selected="selected" @endif data-select2-id="29">Dhanusa</option>
                                <option  @if(old('preferredLocation')==='Mahottari') selected="selected" @endif data-select2-id="29">Mahottari</option>
                                <option @if(old('preferredLocation')==='Sarlahi') selected="selected" @endif data-select2-id="29">Sarlahi</option>
                                <option @if(old('preferredLocation')==='Bara') selected="selected" @endif data-select2-id="29">Bara</option>
                                <option @if(old('preferredLocation')==='Parsa') selected="selected" @endif data-select2-id="29">Parsa</option>
                                <option @if(old('preferredLocation')==='Rautahat') selected="selected" @endif data-select2-id="29">Rautahat</option>
                                <option @if(old('preferredLocation')==='Baglung') selected="selected" @endif data-select2-id="29">Baglung</option>
                                <option @if(old('preferredLocation')==='Gorkha') selected="selected" @endif data-select2-id="29">Gorkha</option>
                                <option @if(old('preferredLocation')==='Kaski') selected="selected" @endif data-select2-id="29">Kaski</option>
                                <option @if(old('preferredLocation')==='Lamjung') selected="selected" @endif data-select2-id="29">Lamjung</option>
                                <option @if(old('preferredLocation')==='Manang') selected="selected" @endif data-select2-id="29">Manang</option>
                                <option @if(old('preferredLocation')==='Mustang') selected="selected" @endif data-select2-id="29">Mustang</option>
                                <option @if(old('preferredLocation')==='Myagdi') selected="selected" @endif data-select2-id="29">Myagdi</option>
                                <option @if(old('preferredLocation')==='Nawalpur') selected="selected" @endif data-select2-id="29">Nawalpur</option>
                                <option @if(old('preferredLocation')==='Parbat') selected="selected" @endif data-select2-id="29">Parbat</option>
                                <option @if(old('preferredLocation')==='Syangja') selected="selected" @endif data-select2-id="29">Syangja</option>
                                <option  @if(old('preferredLocation')==='Tanahun') selected="selected" @endif data-select2-id="29">Tanahun</option>
                                <option  @if(old('preferredLocation')==='Kapilvastu') selected="selected" @endif data-select2-id="29">Kapilvastu</option>
                                <option @if(old('preferredLocation')==='Parasi') selected="selected" @endif data-select2-id="29">Parasi</option>
                                <option @if(old('preferredLocation')==='Rupandehi') selected="selected" @endif data-select2-id="29">Rupandehi</option>
                                <option @if(old('preferredLocation')==='Arghakhanchi') selected="selected" @endif data-select2-id="29">Arghakhanchi</option>
                                <option @if(old('preferredLocation')==='Gulmi') selected="selected" @endif data-select2-id="29">Gulmi</option>
                                <option @if(old('preferredLocation')==='Plapa') selected="selected" @endif data-select2-id="29">Palpa</option>
                                <option @if(old('preferredLocation')==='Dang') selected="selected" @endif data-select2-id="29">Dang</option>
                                <option @if(old('preferredLocation')==='Pyuthan') selected="selected" @endif data-select2-id="29">Pyuthan</option>
                                <option @if(old('preferredLocation')==='Rolpa') selected="selected" @endif data-select2-id="29">Rolpa</option>
                                <option @if(old('preferredLocation')==='Rukum(Eastern)') selected="selected" @endif data-select2-id="29">Rukum(Eastern)</option>
                                <option @if(old('preferredLocation')==='Banke') selected="selected" @endif data-select2-id="29">Banke</option>
                                <option @if(old('preferredLocation')==='Bardiya') selected="selected" @endif data-select2-id="29">Bardiya</option>
                                <option @if(old('preferredLocation')==='Rukum(Western)') selected="selected" @endif data-select2-id="29">Rukum(Western)</option>
                                <option @if(old('preferredLocation')==='Salyan') selected="selected" @endif data-select2-id="29">Salyan</option>
                                <option @if(old('preferredLocation')==='Dolpa') selected="selected" @endif data-select2-id="29">Dolpa</option>
                                <option @if(old('preferredLocation')==='Humla') selected="selected" @endif data-select2-id="29">Humla</option>
                                <option @if(old('preferredLocation')==='Jumla') selected="selected" @endif data-select2-id="29">Jumla</option>
                                <option @if(old('preferredLocation')==='Kalikot') selected="selected" @endif data-select2-id="29">Kalikot</option>
                                <option @if(old('preferredLocation')==='Mugu') selected="selected" @endif data-select2-id="29">Mugu</option>
                                <option @if(old('preferredLocation')==='Surkhet') selected="selected" @endif data-select2-id="29">Surkhet</option>
                                <option @if(old('preferredLocation')==='Dailekh') selected="selected" @endif data-select2-id="29">Dailekh</option>
                                <option @if(old('preferredLocation')==='Jajarkot') selected="selected" @endif data-select2-id="29">Jajarkot</option>
                                <option @if(old('preferredLocation')==='Kailali') selected="selected" @endif data-select2-id="29">Kailali</option>
                                <option @if(old('preferredLocation')==='Achham') selected="selected" @endif data-select2-id="29">Achham</option>
                                <option @if(old('preferredLocation')==='Doti') selected="selected" @endif data-select2-id="29">Doti</option>
                                <option @if(old('preferredLocation')==='Bajhang') selected="selected" @endif data-select2-id="29">Bajhang</option>
                                <option @if(old('preferredLocation')==='Bajura') selected="selected" @endif data-select2-id="29">Bajura</option>
                                <option @if(old('preferredLocation')==='Kanchanpur') selected="selected" @endif data-select2-id="29">Kanchanpur</option>
                                <option @if(old('preferredLocation')==='Dadeldhura') selected="selected" @endif data-select2-id="29">Dadeldhura</option>
                                <option @if(old('preferredLocation')==='Baitadi') selected="selected" @endif data-select2-id="29">Baitadi</option>
                                <option @if(old('preferredLocation')==='Darchula') selected="selected" @endif data-select2-id="29">Darchula</option>
                            </select>
                        </div>
                        {{--end of preferred job--}}
                        {{--radio--}}
                        <div class="form-group">
                            <label for="">
                                Are you currently looking for a job?
                            </label><br>
                            <div class="radio btn btn-default">
                                <label>
                                    <input type="radio" name="interestedInJob" value="yes" @if(old('interestedInJob')==='yes') checked @endif>
                                    Yes
                                </label>
                            </div>
                            <div style="margin-top: 10px" class="radio btn btn-default">
                                <label>
                                    <input type="radio" name="interestedInJob" value="no" @if(old('interestedInJob')==='yes') checked @endif>
                                    No
                                </label>
                            </div>
                        </div>
                        {{--end of radio--}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expected Salary</label>
                            <input type="number" class="form-control" value="{{old('expectedSalary')??''}}"
                                   name="expectedSalary" id=""
                                   placeholder="Expected Salary, eg:20000">
                        </div>
                        <div class="form-group">
                            <label>Career Objective
                            </label>
                            <textarea class="form-control ckeditor" name="careerObjective" id="" style="resize: none;"
                                      rows="5">{{old('careerObjective')??''}}</textarea>
                        </div>
                        {{--For New Data--}}
                    @else

                        <div class="form-group">
                            <label for="exampleInputEmail1">Looking For</label>

                            <select name="lookingFor" class="form-control">
                                <option>Entry Level</option>
                                <option>Mid Level</option>
                                <option>Senior Level</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Available For</label>

                            <select name="availableFor" class="form-control">
                                <option>Part Time</option>
                                <option>Full Time</option>
                                <option>Freelance</option>
                            </select>

                        </div>

                        {{--<label for="exampleInputEmail1">Job Category</label>--}}
                        {{--<div class="form-group">--}}
                        {{--<select name="jobCategory" class="form-control selectpicker">--}}
                        {{--<option>Laravel Developer</option>--}}
                        {{--<option>React Js Developer</option>--}}
                        {{--<option>HR</option>--}}
                        {{--<option>Marketing Executive</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Category</label>
                            <select name="jobCategoryTitle" class="form-control">
                                <option>Sales/ Public Relations
                                </option>
                                <option>NGO/ INGO/ Social work
                                </option>
                                <option>Marketing/ Advertising/ Customer Service
                                </option>
                                <option>IT & Telecommunication
                                </option>
                                <option>Banking/ Insurance/ Financial Services
                                </option>
                                <option>Secretarial/ Front Office/ Data Entry
                                </option>
                                <option>Accounting/ Finance
                                </option>
                                <option>Construction/ Engineering/ Architects
                                </option>
                                <option>Creative/ Graphics/ Designing
                                </option>
                                <option>Teaching/ Education
                                </option>
                                <option>Commercial/ Logistics/ Supply Chain
                                </option>
                                <option>Hospitality
                                </option>
                                <option>General Mgmt./ Administration/ Operation
                                </option>
                                <option>Healthcare/ Pharma/ Biotech/ Medical/ R&D
                                </option>
                                <option>Production/ Maintenance/ Quality
                                </option>
                                <option>Human Resource/Org. Development
                                </option>
                                <option>journalism/ Editor/ Media
                                </option>
                                <option>Research and Development
                                </option>
                                <option>Legal Services
                                </option>
                                <option>Fashion/ Textile Designing
                                </option>
                                <option>Others
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Title</label>
                            <input type="text" class="form-control" name="jobCategory" id=""
                                   placeholder="Eg: HR/Java Developer/Sales Executive">
                        </div>
                        {{--preferred job--}}

                        <div class="form-group" data-select2-id="24">
                            <label>Preferred Job Location</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" name="preferredLocation" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="3">Kathmandu</option>
                                <option data-select2-id="26">Lalitpur</option>
                                <option data-select2-id="27">Sindhuli</option>
                                <option data-select2-id="28">Ramechhap</option>
                                <option data-select2-id="29">Dolakha</option>
                                <option data-select2-id="29">Bhaktapur</option>
                                <option data-select2-id="29">Dhading</option>
                                <option data-select2-id="29">Kavreplanchok</option>
                                <option data-select2-id="29">Nuwakot</option>
                                <option data-select2-id="29">Rasuwa</option>
                                <option data-select2-id="29">Sindhupalchok</option>
                                <option data-select2-id="29">Chitwan</option>
                                <option data-select2-id="29">Makwanpur</option>
                                <option data-select2-id="29">Bhojpur</option>
                                <option data-select2-id="29">Dhankuta</option>
                                <option data-select2-id="29">Ilam</option>
                                <option data-select2-id="29">Jhapa</option>
                                <option data-select2-id="29">Khotang</option>
                                <option data-select2-id="29">Morang</option>
                                <option data-select2-id="29">Okhaldhunga</option>
                                <option data-select2-id="29">Panchthar</option>
                                <option data-select2-id="29">Sankhuwasabha</option>
                                <option data-select2-id="29">Solukhumbu</option>
                                <option data-select2-id="29">Sunsari</option>
                                <option data-select2-id="29">Taplejung</option>
                                <option data-select2-id="29">Terhathun</option>
                                <option data-select2-id="29">Udayapur</option>
                                <option data-select2-id="29">Saptari</option>
                                <option data-select2-id="29">Siraha</option>
                                <option data-select2-id="29">Dhanusa</option>
                                <option data-select2-id="29">Mahottari</option>
                                <option data-select2-id="29">Sarlahi</option>
                                <option data-select2-id="29">Bara</option>
                                <option data-select2-id="29">Parsa</option>
                                <option data-select2-id="29">Rautahat</option>
                                <option data-select2-id="29">Baglung</option>
                                <option data-select2-id="29">Gorkha</option>
                                <option data-select2-id="29">Kaski</option>
                                <option data-select2-id="29">Lamjung</option>
                                <option data-select2-id="29">Manang</option>
                                <option data-select2-id="29">Mustang</option>
                                <option data-select2-id="29">Myagdi</option>
                                <option data-select2-id="29">Nawalpur</option>
                                <option data-select2-id="29">Parbat</option>
                                <option data-select2-id="29">Syangja</option>
                                <option data-select2-id="29">Tanahun</option>
                                <option data-select2-id="29">Kapilvastu</option>
                                <option data-select2-id="29">Parasi</option>
                                <option data-select2-id="29">Rupandehi</option>
                                <option data-select2-id="29">Arghakhanchi</option>
                                <option data-select2-id="29">Gulmi</option>
                                <option data-select2-id="29">Palpa</option>
                                <option data-select2-id="29">Dang</option>
                                <option data-select2-id="29">Pyuthan</option>
                                <option data-select2-id="29">Rolpa</option>
                                <option data-select2-id="29">Rukum(Eastern)</option>
                                <option data-select2-id="29">Banke</option>
                                <option data-select2-id="29">Bardiya</option>
                                <option data-select2-id="29">Rukum(Western)</option>
                                <option data-select2-id="29">Salyan</option>
                                <option data-select2-id="29">Dolpa</option>
                                <option data-select2-id="29">Humla</option>
                                <option data-select2-id="29">Jumla</option>
                                <option data-select2-id="29">Kalikot</option>
                                <option data-select2-id="29">Mugu</option>
                                <option data-select2-id="29">Surkhet</option>
                                <option data-select2-id="29">Dailekh</option>
                                <option data-select2-id="29">Jajarkot</option>
                                <option data-select2-id="29">Kailali</option>
                                <option data-select2-id="29">Achham</option>
                                <option data-select2-id="29">Doti</option>
                                <option data-select2-id="29">Bajhang</option>
                                <option data-select2-id="29">Bajura</option>
                                <option data-select2-id="29">Kanchanpur</option>
                                <option data-select2-id="29">Dadeldhura</option>
                                <option data-select2-id="29">Baitadi</option>
                                <option data-select2-id="29">Darchula</option>
                            </select>
                        </div>
                        {{--end of preferred job--}}

                        {{--radio--}}
                        <div class="form-group">
                            <label for="">
                                Are you currently looking for a job?
                            </label><br>
                            <div class="radio btn btn-default">
                                <label>
                                    <input type="radio" name="interestedInJob" value="yes" checked="">
                                    Yes
                                </label>
                            </div>
                            <div style="margin-top: 10px" class="radio btn btn-default">
                                <label>
                                    <input type="radio" name="interestedInJob" value="no">
                                    No
                                </label>
                            </div>
                        </div>
                        {{--end of radio--}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Expected Salary</label>
                            <input type="number" class="form-control" name="expectedSalary" id=""
                                   placeholder="Expected Salary, eg:20000">
                        </div>

                        {{--<div class="form-group">--}}
                        {{--<label for="exampleInputEmail1">Preferred job Location</label>--}}
                        {{--<input type="text" class="form-control" name="" id=""--}}
                        {{--placeholder="Enter District">--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label>Career Objective</label>
                            {{--<input type="text" class="form-control" name="careerObjective" id=""--}}
                            {{--placeholder="Enter...">--}}
                            <textarea style="resize: none;" class="form-control ckeditor" name="careerObjective" id=""
                                      placeholder="jalkdsfj" rows="5"></textarea>
                        </div>
                    @endif
                @endif
            </div>
            <div class="box-footer">
                <a href="{{url('/cvForm')}}" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Next</button>
            </div>
        </form>
    </div>
    {{--end of personal profile--}}

@endsection

@section('my-footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.map"></script>

    <script src="{{URL::to('/lib/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $("#myProfile").submit(function () {

                $('#myInnerBar').css({'width': '20%'})

            });
            $('.select2').select2()

        })
    </script>



@endsection
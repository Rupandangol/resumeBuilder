@extends('Frontend.master')

@section('contentHeader')
    <h2 style="text-align: center">Cv<b>Builder</b></h2>
@endsection


@section('content')
    <div class="box box-info">

        @if($errors->has('fullName')||$errors->has('email')||$errors->has('mobileNo')||$errors->has('address'))
            <div class="alert alert-danger">
                <p>Do not leave empty box</p>
            </div>
        @endif
        {{--personal details--}}
        <form action="{{url('/cvForm')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="box-body">
                {{--@if($detail)--}}
                <div class="box-header with-border">
                    <h3 class="box-title">Personal Details</h3>
                </div>
                <br>
                @if($detail)
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="fullName" value="{{ucfirst($detail->fullName)}}" class="form-control"
                               placeholder="Full Name">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" value="{{$detail->email}}" class="form-control"
                               placeholder="Email">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="mobileNo" value="{{$detail->mobileNo}}" class="form-control"
                               placeholder="Mobile No">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-image"></i></span>
                        <input type="file" name="image" class="form-control" placeholder="your Image">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <input type="text" name="address" value="{{$detail->address}}" class="form-control"
                               placeholder="Contact Address">
                    </div>
                    <br>
                @else
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="fullName" class="form-control" placeholder="Full Name">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="mobileNo" class="form-control" placeholder="Mobile No">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-image"></i></span>
                        <input type="file" name="image" class="form-control" placeholder="your Image">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <input type="text" name="address" class="form-control" placeholder="Contact Address">
                    </div>
                    <br>
                @endif
                {{--end of Personal details--}}
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
        <!-- /input-group -->
    </div>
    <!-- /.box-body -->
@endsection

@section('my-footer')

@endsection

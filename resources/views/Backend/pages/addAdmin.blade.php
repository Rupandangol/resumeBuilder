@extends('Backend.master')
@section('heading')
    Add Admin
@endsection



@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php
        $oldAdmin = old('username') ?? [];
        ?>
        <form class="form-horizontal" method="post" action="{{route('addAdmin')}}">
            {{csrf_field()}}
            @if($oldAdmin)
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Username</label>

                        <div class="col-sm-10">
                            <input type="text" name="username" value="{{old('username')??''}}" class="form-control" placeholder="Username">
                            @if($errors->has('username'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('username')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" value="{{old('email')??''}}" name="email" placeholder="Email">
                            @if($errors->has('email'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('email')}}</code>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Privileges</label>
                        <div class="col-sm-10">
                            <select name="privileges" class="form-control">
                                <option @if(old('privileges')==='Super Admin') selected @endif value="Super Admin">Super Admin</option>
                                <option @if(old('privileges')==='Admin') selected @endif value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @if($errors->has('password'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a class="btn btn-info" href="{{url('/@admin@')}}">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                </div>
            @else

                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Username</label>

                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            @if($errors->has('username'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('username')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            @if($errors->has('email'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('email')}}</code>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Privileges</label>
                        <div class="col-sm-10">
                            <select name="privileges" class="form-control">
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @if($errors->has('password'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a class="btn btn-info" href="{{url('/@admin@')}}">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                </div>
                <!-- /.box-footer -->
            @endif
        </form>
    </div>
@endsection
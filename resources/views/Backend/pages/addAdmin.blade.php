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
                            <input type="text" name="username" value="{{old('username')??''}}" class="form-control"
                                   placeholder="Username">
                            @if($errors->has('username'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('username')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" value="{{old('email')??''}}" name="email"
                                   placeholder="Email">
                            @if($errors->has('email'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('email')}}</code>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Privileges</label>
                        <div class="col-sm-10">
                            <select name="privileges" class="form-control">
                                <option @if(old('privileges')==='Super Admin') selected @endif value="Super Admin">Super
                                    Admin
                                </option>
                                <option @if(old('privileges')==='Admin') selected @endif value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control password-check" name="password" placeholder="Password">
                            <span class="help-block"><i class=""></i> Password needs minimum of 5 characters and at least one: Number, Lowercase, UpperCase and Special Characters</span>
                            @if($errors->has('password'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control confirm-check" name="password_confirmation"
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
                            <input type="password" class="form-control password-check" name="password"
                                   placeholder="Password">
                            <span class="help-block"><i class=""></i> Password needs minimum of 5 characters and at least one: Number, Lowercase, UpperCase and Special Characters</span>
                            @if($errors->has('password'))
                                <code><i class="fa fa-info-circle"></i> {{$errors->first('password')}}</code>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Confirm Password</label>

                        <div class="col-sm-10">
                            <input type="password" id="" class="form-control confirm-check" name="password_confirmation"
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
@section('my-footer')
    <script>
        $(function () {
            $('.password-check').on('keyup', function () {
                var value = $(this).val();
                var parent1 = $(this).parent().parent();
                var child1 = $(this).parent().find('span').children();

                if(value.length===0){
                    parent1.prop('class','form-group');
                    child1.prop('class', '');

                }else{
                    if (value.length < 5) {
                        parent1.prop('class', 'form-group has-error');
                        child1.prop('class', 'fa fa-times');
                    }
                    else {
                        if (/\d/.test(value)) {
                            if (/[a-z]/.test(value)) {
                                if (/[A-Z]/.test(value)) {
                                    if (/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(value)) {
                                        parent1.prop('class', 'form-group has-success');
                                        child1.prop('class', 'fa fa-check');

                                    }
                                }

                            }
                        }
                    }
                }

            });
            $('.confirm-check').on('keyup',function () {
                var password1=$('.password-check').val();
                var confirm1=$(this).val();
                var parent2 = $(this).parent().parent();

                if(confirm1.length===0){
                    parent2.prop('class', 'form-group');

                }else{
                    if(password1===confirm1){
                        parent2.prop('class', 'form-group has-success');
                    }
                    else{
                        parent2.prop('class', 'form-group has-error');

                    }
                }

            })
            
        })
    </script>
@endsection
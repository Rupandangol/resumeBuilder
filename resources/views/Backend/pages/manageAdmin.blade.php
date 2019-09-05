@extends('Backend.master')
@section('heading')
    Manage Admin
@endsection
@section('content')

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <td>SN</td>
            <td>Username</td>
            <td>Email</td>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($admin as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->email}}</td>
                <td><a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a></td>
                <td><a class="btn btn-primary" href=""><i class="fa fa-circle"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
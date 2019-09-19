@extends('Backend.master')
@section('heading')
    Manage Admin
@endsection
@section('content')

    @if(session('danger'))
        <div class="alert alert-danger">
            {{session('danger')}}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    <div id="idea" class="alert alert-success" hidden>
        <p>Status Changed</p>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <td>SN</td>
            <td>Username</td>
            <td>Email</td>
            <td>Status</td>
            <td>Privileges</td>
            <td>Created At</td>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($admin as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->email}}</td>
                <td>
                    @if($value->status==='0')
                    <button type="button" value="{{$value->id}}" id="my_statusBtn" class="my_statusBtn btn btn"><i
                                class="fa fa-thumbs-o-up"></i></button>
                        @else
                        <button type="button" value="{{$value->id}}" id="my_statusBtn" class="my_statusBtn btn btn-success"><i
                                    class="fa fa-thumbs-up"></i></button>
                        @endif
                </td>
                @if($value->privileges==='Admin')
                    <td><i class="fa fa-user fa-2x"></i></td>
                @else
                    <td><i class="fa fa-user-secret fa-2x"></i></td>
                @endif
                <td>{{\Carbon\Carbon::parse($value->created_at)->diffForHumans()}}</td>
                <td><a class="btn btn-danger" href="{{url('/@admin@/manageAdmin/delete/'.$value->id)}}"><i
                                class="fa fa-trash"></i></a></td>
                <td><a class="btn btn-primary" href="{{route('updateAdmin',$value->id)}}"><i
                                class="fa fa-circle"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('my-footer')
    <script>
        $(function () {
            $('.my_statusBtn').on('click', function (e) {
                e.preventDefault();

                var myValue = $(this).val();
                var base_url = window.location.origin;
                var myData=$(this);
                $.ajax({
                    url: base_url + "/@admin@/manageAdmin/status",
                    data: {'admin_id': myValue},
                    cache: false,
                    success: function (data) {
                        var btn=myData;
                        var btnChild=btn.children();
                        if(data==='0'){
                            btn.prop('class','my_statusBtn btn btn');
                            btnChild.prop('class','fa fa-thumbs-o-up');
                        }else{
                            btn.prop('class','my_statusBtn btn btn-success');
                            btnChild.prop('class','fa fa-thumbs-up');
                        }
                    }
                });
                $('#idea').slideDown(function() {
                    setTimeout(function() {
                        $('#idea').slideUp();
                    }, 1000);
                });

            })
        })
    </script>
@endsection
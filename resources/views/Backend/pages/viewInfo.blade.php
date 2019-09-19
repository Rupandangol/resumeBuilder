@extends('Backend.master')

@section('my-header')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('my-footer')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#myTable').DataTable();

            $('.yesNo').on('click', function () {
                var chosen = confirm('Update Looking for job');
                var base_url = window.location.origin;
                var btn=$(this);
                if (chosen === true) {
                    var id = $(this).val();
                    $.ajax({
                        url: base_url + "/@admin@/viewInfo/looking",
                        data: {'admin_id': id},
                        cache: false,
                        success: function (data) {
                            if(data==='yes'){
                                btn.prop('class','btn btn-info')

                            }else{
                                btn.prop('class','btn btn-default')

                            }
                            // console.log(data);
                        }
                    });

                }
            })
        })
    </script>
@endsection

@section('heading')
    view Info
@endsection
@section('content')
    <table id="myTable" class="table table-bordered">
        <thead>
        <tr>
            <td>SN</td>
            <td>Full Name</td>
            <td>Job Category</td>
            <td>Email</td>
            <td>Mobile No.</td>
            <td>Looking for job</td>
            <td>Preferred Location</td>
            <td>Level</td>
            <td>Available for</td>
            <td>Details</td>
        </tr>
        </thead>
        <tbody>
        @foreach($details as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->fullName}}</td>
                <td>{{$value->getProfile->jobCategoryTitle}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->mobileNo}}</td>
                <td>
                    @if($value->getProfile->interestedInJob==='yes')
                        <button type="button" value="{{$value->id}}"
                                class="yesNo btn btn-info"><i class="fa fa-check-square"></i></button>
                    @else
                        <button type="button" value="{{$value->id}}"
                                class="yesNo btn btn-default"><i class="fa fa-check-square"></i></button>
                    @endif
                </td>
                <td>{{$value->getProfile->preferredLocation}}</td>
                <td>{{$value->getProfile->lookingFor}}</td>
                <td>{{$value->getProfile->availableFor}}</td>
                <td><a class="btn btn-info" href="{{url('/@admin@/viewInfo/details/'.$value->id)}}"><i
                                class="fa fa-file-archive-o"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table><br>
    {{--<a style="float: right" class="btn btn-info" href="{{route('excelDownload')}}">Download Full data in Excel</a>--}}
@endsection


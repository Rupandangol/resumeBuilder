@extends('Backend.master')

@section('my-header')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('my-footer')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#myTable').DataTable();
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
            <td>Age</td>
            <td>Expected Salary</td>
            <td>Preferred Location</td>
            <td>Level</td>
            <td>Available for</td>
            <td>Experience Year</td>
            <td>Details</td>
        </tr>
        </thead>
        <tbody>
        @foreach($details as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->fullName}}</td>
                <td>{{$value->getProfile->jobCategoryTitle}}</td>
                <td>{{\Carbon\Carbon::parse($value->dateOfBirth)->age}}</td>
                <td>{{$value->getProfile->expectedSalary}}</td>
                <td>{{$value->getProfile->preferredLocation}}</td>
                <td>{{$value->getProfile->lookingFor}}</td>
                <td>{{$value->getProfile->availableFor}}</td>
                <td>
                    @forelse($value->getExp as $item)
                        <?php
                        $startYear=\Carbon\Carbon::parse($item->startTime);
                        ?>
                        @if($item->endTime==='Current')
                            <?php
                                $now=\Carbon\Carbon::now();
                                ?>
                            {{$startYear->diff($now)->format('%yY %mM')}},
                        @else
                            <?php
                                $endYear=\Carbon\Carbon::parse($item->endTime);
                                ?>

                            {{$endYear->diff($startYear)->format('%yY %mM')}},
                        @endif
                    @empty
                        No Experience
                    @endforelse


                </td>
                <td><a class="btn btn-info" href="{{url('/@admin@/viewInfo/details/'.$value->id)}}"><i class="fa fa-file-archive-o"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
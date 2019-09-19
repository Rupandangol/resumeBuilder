@extends('Backend.master')

@section('my-header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('my-footer')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ]
            } );
        } );
    </script>
@endsection

@section('heading')
    Full Data
@endsection
@section('content')
    <table id="myTable" class="table table-bordered">
        <thead>
        <tr>
            <td>SN</td>
            <td>Full Name</td>
            <td>Address</td>
            <td>Email</td>
            <td>Mobile No.</td>
            <td>Gender</td>
            <td>Job Category Title</td>
            <td>Job Category</td>
            <td>Expected Salary</td>
            <td>Looking for job</td>
            <td>Preferred Location</td>
            <td>Level</td>
            <td>Available for</td>
            <td>Experience Year</td>
        </tr>
        </thead>
        <tbody>
        @foreach($details as $key=>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->fullName}}</td>
                <td>{{$value->address}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->mobileNo}}</td>
                <td>{{$value->gender}}</td>
                <td>{{$value->getProfile->jobCategoryTitle}}</td>
                <td>{{$value->getProfile->jobCategory}}</td>
                <td>{{$value->getProfile->expectedSalary}}</td>
                <td>{{$value->getProfile->interestedInJob}}</td>
                <td>{{$value->getProfile->preferredLocation}}</td>
                <td>{{$value->getProfile->lookingFor}}</td>
                <td>{{$value->getProfile->availableFor}}</td>
                <td>
                    @forelse($value->getExp as $item)
                        <?php
                        $startYear = \Carbon\Carbon::parse($item->startTime);
                        ?>
                        @if($item->endTime==='Current')
                            <?php
                            $now = \Carbon\Carbon::now();
                            ?>
                            {{$startYear->diff($now)->format('%yY %mM')}},
                        @else
                            <?php
                            $endYear = \Carbon\Carbon::parse($item->endTime);
                            ?>

                            {{$endYear->diff($startYear)->format('%yY %mM')}},
                        @endif
                    @empty
                        No Experience
                    @endforelse

                </td>
            </tr>
        @endforeach
        </tbody>
    </table><br>
    {{--<a style="float: right" class="btn btn-info" href="{{route('excelDownload')}}">Download Full data in Excel</a>--}}
@endsection


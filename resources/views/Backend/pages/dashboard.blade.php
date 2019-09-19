@extends('Backend.master')
@section('heading')

    DASHBOARD

@endsection

@section('my-header')

    <!-- Custom fonts for this template-->

    <link href="{{URL::to('backend//vendors/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->

{{--    <link href="{{URL::to('backend/vendors/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">--}}

    <!-- Custom styles for this template-->
{{--    <script src="{{URL::to('backend/js/sb-admin.min.js')}}"></script>--}}
{{--    <link href="{{URL::to('backend/css/sb-admin.css')}}" rel="stylesheet" >--}}

    {{--for the piechart--}}
    <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
    <script src="http://www.chartjs.org/samples/latest/utils.js"></script>
    <link rel="stylesheet" href="{{URL::to('backend/css/custom.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet">
@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Overview</a>
        </li>
{{--        <li class="breadcrumb-item active">Overview</li>--}}
    </ol>

    <!-- Icon Cards-->

    <div class="row" >
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-family: 'Black Ops One', cursive;">{{$Downloads}}</h3>

                    <p>C.V</p>
                </div>
                <div class="icon">
                    <i class="fas fa-download"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle"></i> Downloads
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
{{--                    <h3> {{$JobSearchCount}}<sup style="font-size: 20px">%</sup></h3>--}}
                    <h3 style="font-family: 'Black Ops One', cursive;"> {{$JobSearchCount}}</h3>

                    <p> Candidates </p>
                </div>
                <div class="icon">
                    <i class="fas fa-search"></i>
                </div>
                <a href="#" class="small-box-footer">Looking For Job
                  <i class="fa fa-arrow-circle"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6" id="preferredLocation">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner" >
                    <h3 style="font-family: 'Black Ops One', cursive;">{{$LocationCount}}</h3>
{{--                    <p> {{$Location}}</p>--}}
                    <p>Preferred Location</p>

                </div>
                <div class="icon">
{{--                    <i class="ion ion-person-add"></i>--}}
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <a href="#" class="small-box-footer">{{$Location}}
                    <i class="fa fa-arrow-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner" >
                    <h3 style="font-family: 'Black Ops One', cursive;">{{$FullTimeCount}}</h3>

                    <p>Full Time </p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-clock"></i>
                </div>
                <a href="#" class="small-box-footer"> Job Seekers
                    <i class="fa fa-arrow-circle"></i>
                </a>
            </div>
        </div>

    </div>


    {{--    <div class="row">--}}
    {{--        <div class="col-lg-8">--}}
    <div class="card mb-3">
        <div class="card-header">
            <h3 style="font-family: 'Black Ops One', cursive;"><i class="fas fa-chart-bar" ></i>Age Distribution</h3>

        </div>
        <div class="card-body">
            <canvas id="myBarChart" width="100%" height="50"></canvas>


        </div>

        <script>

            var chartdata = {
                type: 'bar',
                data: {
                    labels:<?php echo json_encode($AgeArray); ?>,
                    responsive: true,

                    datasets: [
                        {
                            // label: 'Range',
                            label:<?php echo json_encode($AgeArray); ?> ,
                            backgroundColor: ['#1C9CDB', '#42f5f2','#384747','#6d6b7d','#3c31b0','#871433','#2f8ca3'],
                            borderWidth: 0.5,
                            data: <?php echo json_encode($AgeData); ?>
                        }
                    ],
                },

                options: {
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                    return previousValue + currentValue;
                                });
                                var currentValue = dataset.data[tooltipItem.index];
                                var precentage = Math.floor(((currentValue/total) * 100)+0.5);
                                return precentage + "%";
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'Age'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 100
                            }
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                min: 0,
                                max: <?php echo json_encode($MaxCount)?>,
                                maxTicksLimit: 10
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            };
            var ctx = document.getElementById('myBarChart');
            new Chart(ctx, chartdata);

        </script>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
    </div>
    <br>



    {{--        </div>--}}
    {{--    </div>--}}





{{--        <div class="row">--}}
    {{--        <div class="col-lg-8">--}}
    <div class="card mb-4">
        <div class="card-header">
{{--            <i class="fas fa-chart-bar"></i>--}}
{{--            Industry Distribution--}}
            <h3 style="font-family: 'Black Ops One', cursive;"><i class="fas fa-chart-bar" ></i>Industry Distribution</h3>
        </div>
        <div class="card-body">
            <canvas id="myBarChart1" width="100%" height="50"></canvas>
        </div>
        <script>

            var chartdata = {
                type: 'horizontalBar',
                // type: 'bar',
                data: {

                    labels:<?php echo json_encode($jobCat);?>,
                    // labels: ['A','B','C','D'],


                    responsive: true,

                    datasets: [
                        {

                            label: 'Total Candidate',
                            // label: "My First dataset",
                            backgroundColor: [

                                "rgba(255,255,0,0.1)",
                                "rgba(255,0,0,0.3)",
                                "rgba(255,0,255,0.2)",
                                "rgba(255,0,0,0.1)",
                                "rgba(255,255,0,0.1)",
                                "rgba(255, 0, 0, 0.2)",
                                "rgba(0,0,255,0.1)",
                                "rgba(255,0,255,0.1)",
                                "rgba(0,0,255,0.3)",
                                "rgba(0,255,255,0.5)",
                                "rgba(255,255,0,0.1)",
                                "rgba(255,0,0,0.3)",
                                "rgba(255,0,255,0.2)",
                                "rgba(255,0,0,0.1)",
                                "rgba(255,255,0,0.1)",
                                "rgba(255, 0, 0, 0.2)",
                                "rgba(0,0,255,0.1)",





                            ],
                            borderColor: [
                                "rgba(255,255,0,0.5)",
                                "rgba(255,0,0,0.5)",
                                "rgba(255,0,255,0.5)",
                                "rgba(255,0,0,0.5)",
                                "rgba(255,255,0,0.5)",
                                "rgba(255, 0, 0, 0.5)",
                                "rgba(0,0,255,0.5)",
                                "rgba(255,0,255,0.5)",
                                "rgba(0,0,255,0.5)",
                                "rgba(0,255,255,0.9)",
                                "rgba(255,255,0,0.5)",
                                "rgba(255,0,0,0.5)",
                                "rgba(255,0,255,0.5)",
                                "rgba(255,0,0,0.5)",
                                "rgba(255,255,0,0.5)",
                                "rgba(255, 0, 0, 0.5)",
                                "rgba(0,0,255,0.5)",




                                "rgba(190, 0, 0, 190)",
                                "rgba(255, 255, 153, 1)",
                                "rgba(255, 255, 153, 1)",
                                "rgba(255, 255, 153, 1)",
                                "rgba(255, 255, 153, 1)",
                                "rgba(255, 255, 153, 1)",
                                "rgba(255, 255, 153, 1)",
                                "rgba(255, 255, 153, 1)"
                            ],
                            // backgroundColor: ['rgb(54, 162, 235)'],

                            borderWidth: 1 ,
                            data:<?php echo json_encode($jobCatCount); ?>



                        }
                    ],
                },
                options: {
                    maintainAspectRatio: true,

                    // tooltips: {
                    //     callbacks: {
                    //         label: function(tooltipItem, data) {
                    //             var dataset = data.datasets[tooltipItem.datasetIndex];
                    //             var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                    //                 return previousValue + currentValue;
                    //             });
                    //             var currentValue = dataset.data[tooltipItem.index];
                    //             var precentage = Math.floor(((currentValue/total) * 100)+0.5);
                    //             return precentage + "%";
                    //         }
                    //     }
                    // },
                    scales: {
                        xAxes: [{
                            stacked:true,
                            time: {
                                unit: 'Industry',
                                min: 0,
                                max: 10 ,
                                maxTicksLimit: 50
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 5,
                                beginAtZero: true
                            }
                        }],
                        yAxes: [{
                            // stacked: true,
                            ticks: {
                                min: 0,
                                max: 10 ,
                                maxTicksLimit: 50,
                                maxRotation: 90,

                                display: "top",
                                mirror:true,

                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        fontColor: 'black',
                        fontSize: 20,
                        display:false
                    }

                }

            };
            var ctx = document.getElementById('myBarChart1');
            new Chart(ctx, chartdata);

        </script>

    </div>

<br>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header" style="font-family: 'Black Ops One', cursive;"style="font-family: 'Black Ops One', cursive;">
                    <i class="fas fa-chart-pie"></i>
                    Gender
                </div>
                <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="112.5"></canvas>
                </div>


                <script>

                    var chartdata = {
                        type: 'pie',
                        data: {
                            labels:<?php echo json_encode($Gender); ?>,
                            responsive: true,

                            datasets: [
                                {
                                    label: 'Total',
                                    backgroundColor: ['#1C9CDB', '#dc3545','#C2DB1E'],
                                    borderWidth: 1,
                                    data: <?php echo json_encode($GenderCount); ?>
                                }],
                        },
                        options: {
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                                            return previousValue + currentValue;
                                        });
                                        var currentValue = dataset.data[tooltipItem.index];
                                        var precentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                        return precentage + "%";
                                    }
                                }
                            }
                        }

                    };
                    var ctx = document.getElementById('myPieChart');
                    new Chart(ctx, chartdata);

                </script>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header" style="font-family: 'Black Ops One', cursive;">
                    <i class="fas fa-chart-pie"></i>
                    Level of Job
                </div>
                <div class="card-body">
                    <canvas id="myPieChart1" width="100%" height="112.5"></canvas>
                </div>
                <script>
                    var chartdata={
                        type: 'doughnut',
                        data: {
                            // labels: ["Blue", "Red", "Yellow", "Green","white","black"],
                            labels: <?php echo json_encode($JobLevel)?>,


                            responsive: true,
                            datasets:[{
                                // data: [12.21, 15.58, 11.25, 8.32,4.5,7.8],
                                data: <?php echo json_encode($JobLevelCount)?>,
                                backgroundColor: ['#2BDC8C', '#DC2CD2'],
                            }],
                        },
                        options: {
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                                            return previousValue + currentValue;
                                        });
                                        var currentValue = dataset.data[tooltipItem.index];
                                        var precentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                        return precentage + "%";
                                    }
                                }
                            }
                        }
                    }
                    var ctx = document.getElementById("myPieChart1");
                    new Chart(ctx, chartdata);
                </script>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header" style="font-family: 'Black Ops One', cursive;">
                    <i class="fas fa-chart-pie"></i>
                    Interested in Job
                </div>
                <div class="card-body" style="font-family: 'Black Ops One', cursive;">
                    <canvas id="myPieChart2" width="100%" height="112.5"></canvas>
                </div>


                <script>

                    var chartdata = {
                        type: 'doughnut',
                        data: {
                            labels: <?php echo json_encode($LookingFor); ?>,
                            responsive: true,

                            datasets: [
                                {
                                    label: 'Total',
                                    backgroundColor: ['#007bff', '#dc3545'],
                                    borderWidth: 1,
                                    data: <?php echo json_encode($InterestedCandidateCount); ?>
                                }],
                        },
                        options: {
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
                                            return previousValue + currentValue;
                                        });
                                        var currentValue = dataset.data[tooltipItem.index];
                                        var precentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                        return precentage + "%";
                                    }
                                }
                            }
                        }

                    };
                    var ctx = document.getElementById('myPieChart2');
                    new Chart(ctx, chartdata);

                </script>
            </div>
        </div>


    </div>




@endsection

@section('my-footer')
    {{--<script src="../../vendors/jquery/jquery.min.js"></script>--}}
    <script src="{{URL::to('backend/vendors/jquery/jquery.min.js')}}"></script>
{{--    <script src="{{URL::to('backend/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}

    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('backend/vendors/jqeury-easing/jquery.easing.js/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{URL::to('backend/vendors/chart.js/Chart.min.js')}}"></script>

    <script src="{{URL::to('backend/vendors/datatables/jquery.dataTables.js')}}"></script>
{{--    <script src="{{URL::to('backend/vendors/datatables/datatables.bootstrap4.js')}}"></script>--}}

    <!-- Custom scripts for backend/all pages-->

    <script src="{{URL::to('backend/js/sb-admin.min.js')}}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{URL::to('backend/js/demo/datatables-demo.js')}}"></script>
    <script src="{{URL::to('backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::to('backend/js/demo/chart-bar-demo.js')}}"></script>
    <script src="{{URL::to('backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::to('backend/js/demo/chart-bar-demo.js')}}"></script>
    <script src="{{URL::to('backend/js/demo/chart-pie-demo.js')}}"></script>

@endsection

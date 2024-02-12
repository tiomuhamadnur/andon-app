<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>Dashboard</title>
    @endsection
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <a href="{{ route('transaction.standby') }}">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">announcement</i>
                                </div>
                                <div class="text-end pt-4">
                                    <h5 class="text-sm mb-0 text-capitalize">Line 1</h5>
                                    <h4 class="mb-0">3 Times Trouble</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3" style="background-color: black">
                                <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">announcement</i>
                            </div>
                            <div class="text-end pt-4">
                                <h5 class="text-sm mb-0 text-capitalize">Line 2</h5>
                                <h4 class="mb-0">3 Times Trouble</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3" style="background-color: black">
                            <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">announcement</i>
                            </div>
                            <div class="text-end pt-4">
                                <h5 class="text-sm mb-0 text-capitalize">Line 3</h5>
                                <h4 class="mb-0">3 Times Trouble</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3" style="background-color: black">
                            <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">announcement</i>
                            </div>
                            <div class="text-end pt-4">
                                <h5 class="text-sm mb-0 text-capitalize">Line 4</h5>
                                <h4 class="mb-0">3 Times Trouble</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3" style="background-color: black">
                            <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-xl-4 col-sm-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white mx-3">Department Availability
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div>
                                    <button class="btn btn-black dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Month
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">January</a>
                                        <a class="dropdown-item" href="#">February</a>
                                        <a class="dropdown-item" href="#">March</a>
                                        <a class="dropdown-item" href="#">April</a>
                                        <a class="dropdown-item" href="#">May</a>
                                        <a class="dropdown-item" href="#">June</a>
                                        <a class="dropdown-item" href="#">July</a>
                                        <a class="dropdown-item" href="#">August</a>
                                        <a class="dropdown-item" href="#">September</a>
                                        <a class="dropdown-item" href="#">October</a>
                                        <a class="dropdown-item" href="#">November</a>
                                        <a class="dropdown-item" href="#">December</a>
                                    </div>
                                </div>
                                <div class="container p-3">
                                    <div id="availabilityDept">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-sm-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white mx-3">Trend Departement Issues
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body px-2 pb-2">
                                <button class="btn btn-black dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Year
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">2024</a>
                                    <a class="dropdown-item" href="#">2025</a>
                                    <a class="dropdown-item" href="#">2026</a>
                                </div>
                                <div class="container p-3">
                                    <div id="trenDepartment">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white mx-3">Trend Line Issues
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body px-2 pb-2">
                                <button class="btn btn-black dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Month
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">January</a>
                                    <a class="dropdown-item" href="#">February</a>
                                    <a class="dropdown-item" href="#">March</a>
                                    <a class="dropdown-item" href="#">April</a>
                                    <a class="dropdown-item" href="#">May</a>
                                    <a class="dropdown-item" href="#">June</a>
                                    <a class="dropdown-item" href="#">July</a>
                                    <a class="dropdown-item" href="#">August</a>
                                    <a class="dropdown-item" href="#">September</a>
                                    <a class="dropdown-item" href="#">October</a>
                                    <a class="dropdown-item" href="#">November</a>
                                    <a class="dropdown-item" href="#">December</a>
                                </div>
                                <div class="container p-3">
                                    <div id="lineTrend">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="card my-4">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white mx-3">Personel Leaderboard Top List
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <button class="btn btn-black dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Department
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Machine</a>
                                        <a class="dropdown-item" href="#">Material</a>
                                        <a class="dropdown-item" href="#">Quality</a>
                                        <a class="dropdown-item" href="#">Supervisor</a>
                                    </div>
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                        NO
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                        NAME
                                                    </th>
                                                    <th class="text-uppercase text-secondary text-center opacity-7">
                                                        ACTION
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-center">1</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-center">Joko</h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-center">4 Solved Problem</h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-center">2</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-center">Ahmad</h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-center">10 Solved Problem</h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white mx-3">Monthly Average Respon Time
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body px-2 pb-2">
                                <button class="btn btn-black dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Year
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">2024</a>
                                    <a class="dropdown-item" href="#">2025</a>
                                </div>
                                <div class="container p-3">
                                    <div id="averageRespontime">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>

    @section('javascript')
        <script>
            // Department Availability
            Highcharts.chart('availabilityDept', {

                chart: {
                    type: 'variwide'
                },

                title: {
                    text: ''
                },

                subtitle: {
                    text: '' +
                        ''
                },

                xAxis: {
                    type: 'category'
                },

                caption: {
                    text: ''
                },

                legend: {
                    enabled: false
                },
                yAxis: {
                    max: 100,
                    title: {
                        text: 'Availability & Efficiency (%)'
                    }
                },
                series: [{
                    name: 'Labor Costs',
                    data: [{
                            name: 'Machine',
                            y: 100,
                            z: 100,
                            color: 'red'
                        },
                        {
                            name: 'Material',
                            y: 99,
                            z: 100,
                            color: 'blue'
                        },
                        {
                            name: 'Quality',
                            y: 100,
                            z: 100,
                            color: 'green'
                        },
                        {
                            name: 'Supervisor',
                            y: 100,
                            z: 100,
                            color: 'orange'
                        },
                    ],
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f} %'
                    },
                    tooltip: {
                        pointFormat: 'Availability: <b>{point.y} %</b><br>' +
                            ''
                    },
                    borderRadius: 3,
                    colorByPoint: true
                }]

            });

            // trenDept
            Highcharts.chart('trenDepartment', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: '',
                    align: 'left'
                },
                subtitle: {
                    text: ' ' +
                        '',
                    align: 'left'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov',
                        'Dec'
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Times'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Values'
                    }
                },
                tooltip: {
                    valueSuffix: ' Times'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Machine',
                        data: [10, 30, 11, 12, 12, 34, 1, 2, 3, 5, 5, 1],
                        color: 'red',
                    },
                    {
                        name: 'Material',
                        data: [13, 9, 21, 23, 31, 12, 2, 4, 1, 5, 1, 2],
                        color: 'rgb(46, 127, 189)'
                    },
                    {
                        name: 'Quality',
                        data: [13, 11, 21, 23, 29, 12, 23, 11, 23, 11, 10, 10],
                        color: 'goldenrod'
                    },
                    {
                        name: 'Supervisor',
                        data: [13, 10, 21, 23, 12, 12, 11, 23, 2, 34, 12, 32],
                        color: 'green'
                    }
                ]
            });

            // Line Tren
            Highcharts.setOptions({
                colors: ['red', 'rgb(46, 127, 189)', 'goldenrod', 'green']
            });
            Highcharts.chart('lineTrend', {
                title: {
                    text: '',
                    align: 'left'
                },
                xAxis: {
                    categories: ['Line 1', 'Line 2', 'Line 3', 'Line 4']
                },
                yAxis: {
                    title: {
                        text: 'Intencity'
                    }
                },
                tooltip: {
                    valueSuffix: ' Times'
                },
                plotOptions: {
                    series: {
                        borderRadius: '25%'
                    }
                },
                series: [{
                    type: 'column',
                    name: 'Material',
                    data: [59, 83, 65, 228],
                    color: 'red',
                }, {
                    type: 'column',
                    name: 'Machine',
                    data: [24, 79, 72, 240],
                    color: 'rgb(46, 127, 189)'
                }, {
                    type: 'column',
                    name: 'Quality',
                    data: [58, 88, 75, 250],
                    color: 'goldenrod'
                }, {
                    type: 'column',
                    name: 'Supervisor',
                    data: [58, 88, 75, 250],
                    color: 'green',
                }, {
                    type: 'line',
                    step: 'center',
                    name: 'Average',
                    data: [47, 83.33, 70.66, 239.33],
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }, {
                    type: 'pie',
                    name: 'Total',
                    data: [{
                            name: 'Machine',
                            y: 619,
                            color: Highcharts.getOptions().colors[0],
                            dataLabels: {
                                enabled: true,
                                distance: -50,
                                format: '{point.total} M',
                                style: {
                                    fontSize: '15px'
                                }
                            }
                        }, {
                            name: 'Material',
                            y: 586,
                            color: Highcharts.getOptions().colors[1]
                        }, {
                            name: 'Quality',
                            y: 647,
                            color: Highcharts.getOptions().colors[2]
                        },
                        {
                            name: 'Supervisor',
                            y: 647,
                            color: Highcharts.getOptions().colors[3]
                        }
                    ],
                    center: [75, 65],
                    size: 100,
                    innerSize: '70%',
                    showInLegend: false,
                    dataLabels: {
                        enabled: false
                    }
                }]
            });

            // Average Respon Time (Minute)
            Highcharts.chart('averageRespontime', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Monthly Average Response Time'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Minutes'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size: 10px">{point.key}</span><br/>',
                    pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y} minutes</b><br/>',
                    footerFormat: '',
                    shared: true,
                    useHTML: true
                },
                series: [{
                    name: 'Machine',
                    data: [12, 10, 12, 12, 34, 11, 23, 12, 11, 20, 11, 12],
                    color: 'red',
                }, {
                    name: 'Material',
                    data: [10, 11, 12, 11, 10, 9, 12, 12, 37, 10, 11, 17],
                    color: 'rgb(46, 127, 189)',
                }, {
                    name: 'Quality',
                    data: [10, 9, 20, 11, 12, 12, 11, 10, 19, 29, 11, 12],
                    color: 'goldenrod',
                }, {
                    name: 'Supervisor',
                    data: [23, 11, 23, 12, 15, 11, 19, 12, 11, 19, 11, 13],
                    color: 'green'
                }]
            });
        </script>
    @endsection

</x-layout>

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
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-4">
                                <h5 class="text-sm mb-0 text-capitalize">Zone 1</h5>
                                <h4 class="mb-0">3 Times Trouble</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-4">
                                <h5 class="text-sm mb-0 text-capitalize">Zone 2</h5>
                                <h4 class="mb-0">29 Times Trouble</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-4">
                                <h5 class="text-sm mb-0 text-capitalize">Zone 3</h5>
                                <h4 class="mb-0">4 Times Trouble</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-4">
                                <h5 class="text-sm mb-0 text-capitalize">Zone 4</h5>
                                <h4 class="mb-0">13 Times Trouble</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0">This Month ({{ \Carbon\Carbon::now()->format('F Y') }})</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0 ">Overall Equipment Effectiveness</h6>
                            <p>Current OEE Percentage</p>
                            <hr class="dark horizontal">
                            <div class="row">
                                <div id="OEE">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0">Respon Time All Zone</h6>
                            <p>Average Respon Time Cumulative ({{ \Carbon\Carbon::now()->format('Y') }})</p>
                            <hr class="dark horizontal">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div id='respon_time'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0 ">Devices Efficiency Trend (Zone 1)</h6>
                            <p>Data Gathered by Report of Broken/Problem (Update
                                {{ \Carbon\Carbon::now()->format('F Y') }}) </p>
                            <hr class="dark horizontal">
                            <div class="row">
                                <div id="device_tren_1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0 ">Devices Efficiency Trend (Zone 2)</h6>
                            <p>Data Gathered by Report of Broken/Problem (Update
                                {{ \Carbon\Carbon::now()->format('F Y') }}) </p>
                            <hr class="dark horizontal">
                            <div class="row">
                                <div id="device_tren_2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0 ">Devices Efficiency Trend (Zone 3)</h6>
                            <p>Data Gathered by Report of Broken/Problem (Update
                                {{ \Carbon\Carbon::now()->format('F Y') }}) </p>
                            <hr class="dark horizontal">
                            <div class="row">
                                <div id="device_tren_3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0 ">Devices Efficiency Trend (Zone 4)</h6>
                            <p>Data Gathered by Report of Broken/Problem (Update
                                {{ \Carbon\Carbon::now()->format('F Y') }}) </p>
                            <hr class="dark horizontal">
                            <div class="row">
                                <div id="device_tren_4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    </div>

    @section('javascript')
        <script>
            // Effectiveness
            Highcharts.chart('OEE', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Percentage',
                    colorByPoint: true,
                    data: [{
                        name: 'OEE',
                        y: 89.90,
                    }, {
                        name: 'Waste',
                        y: 10.10,
                        color: 'grey'
                    }]
                }]
            });

            // Respon Time
            Highcharts.chart('respon_time', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: '' +
                        '' +
                        ''
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    accessibility: {
                        description: 'Months'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Hours'
                    },
                    labels: {
                        format: '{value} Hours'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Respon Time',
                    marker: {
                        symbol: 'square'
                    },
                    data: [5.2, 5.7, 8.7, 13.9, 18.2, 21.4, 25.0, {
                        y: 26.4,
                    }, 22.8, 17.5, 12.1, 7.6]

                }]
            });

            // Tools Trends

            Highcharts.chart('device_tren_1', {
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
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Months'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ' Times'
                    }
                },
                tooltip: {
                    valueSuffix: ' Times Broken'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Conveyor Belt',
                        data: [2, 1, 2, 3, 1, 5, 3, 4, 5, 1, 1, 4]
                    },
                    {
                        name: 'Grinding Machine',
                        data: [3, 2, 1, 2, 4, 1, 6, 1, 2, 3, 3, 1]
                    },
                    {
                        name: 'Lathe Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    },
                    {
                        name: 'Cutting Machine',
                        data: [3, 3, 4, 2, 2, 6, 3, 1, 0, 1, 6, 1]
                    },
                    {
                        name: 'Spraying Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    }
                ]
            });

            Highcharts.chart('device_tren_2', {
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
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Months'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ' Times'
                    }
                },
                tooltip: {
                    valueSuffix: ' Times Broken'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Conveyor Belt',
                        data: [2, 1, 2, 3, 1, 5, 3, 4, 5, 1, 1, 4]
                    },
                    {
                        name: 'Grinding Machine',
                        data: [3, 2, 1, 2, 4, 1, 6, 1, 2, 3, 3, 1]
                    },
                    {
                        name: 'Lathe Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    },
                    {
                        name: 'Cutting Machine',
                        data: [3, 3, 4, 2, 2, 6, 3, 1, 0, 1, 6, 1]
                    },
                    {
                        name: 'Spraying Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    }
                ]
            });

            Highcharts.chart('device_tren_3', {
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
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Months'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ' Times'
                    }
                },
                tooltip: {
                    valueSuffix: ' Times Broken'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Conveyor Belt',
                        data: [2, 1, 2, 3, 1, 5, 3, 4, 5, 1, 1, 4]
                    },
                    {
                        name: 'Grinding Machine',
                        data: [3, 2, 1, 2, 4, 1, 6, 1, 2, 3, 3, 1]
                    },
                    {
                        name: 'Lathe Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    },
                    {
                        name: 'Cutting Machine',
                        data: [3, 3, 4, 2, 2, 6, 3, 1, 0, 1, 6, 1]
                    },
                    {
                        name: 'Spraying Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    }
                ]
            });

            Highcharts.chart('device_tren_4', {
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
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Months'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ' Times'
                    }
                },
                tooltip: {
                    valueSuffix: ' Times Broken'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Conveyor Belt',
                        data: [2, 1, 2, 3, 1, 5, 3, 4, 5, 1, 1, 4]
                    },
                    {
                        name: 'Grinding Machine',
                        data: [3, 2, 1, 2, 4, 1, 6, 1, 2, 3, 3, 1]
                    },
                    {
                        name: 'Lathe Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    },
                    {
                        name: 'Cutting Machine',
                        data: [3, 3, 4, 2, 2, 6, 3, 1, 0, 1, 6, 1]
                    },
                    {
                        name: 'Spraying Machine',
                        data: [1, 2, 2, 4, 1, 1, 6, 2, 1, 2, 1, 3]
                    }
                ]
            });
        </script>
    @endsection
</x-layout>

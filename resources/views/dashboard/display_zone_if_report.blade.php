<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>Dashboard Zone 1</title>
    @endsection
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 mt-4">
                    <div class="card" data-index="1" data-container="1">
                        <div class="card-body box-container-zone">
                            <div class="box-note-zone if-report">
                                <h1 style="color: white">Zone 1</h1>
                                <p>Error!<p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-0 ">Devices Efficiency Trend (Zone 1)</h4>
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
                <marquee behavior="alternate" direction="" width="10%">
                    <h2 style="color: red"> WARNING: GRINDING MACHINE FAILURE!!</h2>
                </marquee>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    </div>
    @section('javascript')
        <script>
            // Grafik
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
        </script>
    @endsection
</x-layout>

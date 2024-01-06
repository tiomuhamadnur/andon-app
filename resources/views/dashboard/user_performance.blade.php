<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>My Performance</title>
    @endsection
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4 mt-4 d-flex justify-content-center">
                    <div class="">
                        <a href="{{ route('user_page') }}">
                            <button class="btn btn-primary" style="background-color: green">
                                User Dashboard
                            </button>
                        </a>
                        <a href="{{ route('user_performance') }}">
                            <button class="btn btn-primary" style="background-color: green">
                                My Performance
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card " data-index="0" data-container="1">
                        <div class="card-body box-container">
                            <div class="container">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="text-center box-user-notif" style="background-color: green">
                                            <div class="mt-2">
                                                <h5 style="color: white">Finished Complains</h5>
                                                <div class="col-12">
                                                    <div class="card mb-5 mt-5"style="background-color: green">
                                                        <div class="text-center">
                                                            <h1 style=" color:white">
                                                                10</h1>
                                                        </div>
                                                        <h5 style="color: white">Complains</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card " data-index="0" data-container="1">
                        <div class="card-body box-container">
                            <div class="container">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="text-center box-user-notif" style="background-color: green">
                                            <div class="mt-2">
                                                <h5 style="color: white">Unfinished Complains</h5>
                                                <div class="col-12">
                                                    <div class="card mb-5 mt-5"style="background-color: green">
                                                        <div class="text-center">
                                                            <h1 style=" color:white">
                                                                0</h1>
                                                        </div>
                                                        <h5 style="color: white">Complains</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card " data-index="0" data-container="1">
                        <div class="card-body box-container">
                            <div class="container">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="text-center box-user-notif" style="background-color: green">
                                            <div class="mt-2">
                                                <h5 style="color: white">Average Downtime</h5>
                                                <div class="col-12">
                                                    <div class="card mb-5 mt-5"style="background-color: green">
                                                        <div class="text-center">
                                                            <h1 style=" color:white">
                                                                2.1</h1>
                                                        </div>
                                                        <h5 style="color: white">Minutes</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card " data-index="0" data-container="1">
                        <div class="card-body box-container">
                            <div class="container">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="text-center box-user-notif" style="background-color: green">
                                            <div class="mt-2">
                                                <h5 style="color: white">Average Pending Calls</h5>
                                                <div class="col-12">
                                                    <div class="card mb-5 mt-5"style="background-color: green">
                                                        <div class="text-center">
                                                            <h1 style=" color:white">
                                                                10</h1>
                                                        </div>
                                                        <h5 style="color: white">Minutes</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    </div>
</x-layout>

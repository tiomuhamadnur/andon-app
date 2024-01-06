<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>User Page</title>
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
                <div class="row d-flex justify-content-center" id="cardsContainer">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card " data-index="0" data-container="1">
                            <div class="card-body box-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="text-center box-user-notif flashing-card">
                                                    <div class="mt-2">
                                                        <h5 style="color: white">Machine Call</h5>
                                                        <div class="col-12">
                                                            <div class="card mb-2 mt-2  flashing-card">
                                                                <div class="text-center">
                                                                    <h5 style="text-decoration: underline; color:white">
                                                                        Departement:</h5>
                                                                    <p>Departement Assembly</p>
                                                                    <h5
                                                                        style="text-decoration: underline ; color:white">
                                                                        Line:</h5>
                                                                    <p>3</p>
                                                                    <h5
                                                                        style="text-decoration: underline ; color:white">
                                                                        Proccess:</h5>
                                                                    <p>Prelasting</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary"
                                                            style="background-color: green">Respon</button>
                                                        <button class="btn btn-primary"
                                                            style="background-color: yellow; color:black">Pending</button>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="text-center box-user-notif" style="background-color: green">
                                                    <div class="mt-2">
                                                        <h5 style="color: white">Machine Call</h5>
                                                        <div class="col-12">
                                                            <div class="card mb-2 mt-2" style="background-color: green">
                                                                <div class="text-center">
                                                                    <h5 style="text-decoration: underline; color:white">
                                                                        Departement:</h5>
                                                                    <p>Departement Assembly</p>
                                                                    <h5
                                                                        style="text-decoration: underline ; color:white">
                                                                        Line:</h5>
                                                                    <p>3</p>
                                                                    <h5
                                                                        style="text-decoration: underline ; color:white">
                                                                        Proccess:</h5>
                                                                    <p>Prelasting</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary"
                                                            style="background-color: green">Responded</button>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="text-center box-user-notif"
                                                    style="background-color: yellow">
                                                    <div class="mt-2">
                                                        <h5 style="color: black">Machine Call</h5>
                                                        <div class="col-12">
                                                            <div class="card mb-2 mt-2"
                                                                style="background-color: yellow">
                                                                <div class="text-center">
                                                                    <h5 style="text-decoration: underline; color:black">
                                                                        Departement:</h5>
                                                                    <p style="color: black">Departement Assembly</p>
                                                                    <h5
                                                                        style="text-decoration: underline ; color:black">
                                                                        Line:</h5>
                                                                    <p style="color: black">3</p>
                                                                    <h5
                                                                        style="text-decoration: underline ; color:black">
                                                                        Proccess:</h5>
                                                                    <p style="color: black">Prelasting</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary"
                                                            style="background-color: yellow; color:black">Pending</button>
                                                        <button class="btn btn-primary"
                                                            style="background-color: green;">Respon</button>
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

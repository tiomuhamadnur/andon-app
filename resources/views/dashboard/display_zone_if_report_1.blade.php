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
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4 mt-4 d-flex justify-content-center">
                    <div class="">
                        <a href="{{ route('display_zone_if_report_1') }}">
                            <button class="btn btn-primary" style="background-color: #922820">
                                Error Mode
                            </button>
                        </a>
                        <a href="{{ route('display_zone_if_normal_1') }}">
                            <button class="btn btn-primary" style="background-color: green">
                                Normal Mode
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4 mt-4">
                    <div class="card" data-index="1" data-container="1">
                        <div class="card-body box-container-zone-1">
                            <div class="box-note-zone-1 if-report">
                                <h1 style="color: white">Zone 1</h1>
                                <p>Error!
                                <p>
                                    <span class="live">
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4 mt-4">
                    <div class="col-lg-12 mt-4 mb-3">
                        <div class="card">
                            <div class="card-body d-flex stretch">
                                <div class="container">
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-header text-center if-report-header-1 flashing-card">
                                            Machine Call
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row mt-4">
                                      <div class="col-4 ">
                                        <div class="card if-report-card">
                                          <div class="card-header text-center">
                                            <h3 style="text-decoration: underline">Departement:</h3>
                                            <h4>Departement Assembly</h4>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="card">
                                          <div class="card-header text-center">
                                            <h3 style="text-decoration: underline">Line:</h3>
                                            <h4>3</h4>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h3 style="text-decoration: underline">Proccess:</h3>
                                                <h4>Prelasting</h4>
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

<x-layout bodyClass="g-sidenav-show bg-dark">
    @section('title')
        <title>Dashboard Machine Call</title>
    @endsection
    <main class="main-content position-relative max-height-vh-100 h-100 mt-4" style="overflow: hidden">
        <div class="container-fluid fluid-head machine flashing-card-machine">
            <div class="row">
                <div class="col-xl-12 header-container">
                    <div class="header-box">
                        <h1>MACHINE CALL</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="">
                <div class="col-xl-6 header-container">
                    <div class="header-box">
                        <h2 style="color: white">LINE</h2>
                    </div>
                </div>
                <div class="col-xl-6 header-container">
                    <div class="header-box">
                        <h2 style="color: white">ZONE</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="">
                <div class="col-xl-6 header-container call-caption">
                    <div class="header-box">
                        <h1 style="color: black">LS 1</h1>
                    </div>
                </div>
                <div class="col-xl-6 header-container call-caption">
                    <div class="header-box">
                        <h1 style="color: black">ZONE 1</h1>
                    </div>
                </div>
            </div>
        </div>

    </main>
    </div>
</x-layout>

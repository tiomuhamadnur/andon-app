<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Standby Mode</title>
        @livewireStyles
    @endsection
    <x-navbars.sidebar activePage="transaction.standby"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Request"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">{{ auth()->user()->department->name ?? 'Your' }}
                                    Department
                                </h6>
                                <p class="mx-3 text-white">Today {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                            </div>
                        </div>
                        <div class="card-body my-3">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 my-4">
                                    @livewire('call-transaction')
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 my-4">
                                    @livewire('response-transaction')
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 my-4">
                                    @livewire('pending-transaction')
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 my-4">
                                    @livewire('closed-transaction')
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 my-4">
                                    @livewire('total-transaction')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @section('javascript')
                    @livewireScripts
                @endsection
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

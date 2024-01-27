<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Display</title>
        @livewireStyles
    @endsection
    <x-navbars.sidebar activePage="display.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Display"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Data Display
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container p-3">
                                <form action="{{ route('display.show') }}" method="GET" target="_blank">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Display by Line</label>
                                        <div class="input-group mb-3">
                                            <select name="id" class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select line -
                                                </option>
                                                @foreach ($line as $item)
                                                    <option value="{{ Crypt::encryptString($item->id) }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Show</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

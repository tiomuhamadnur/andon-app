<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Edit Device</title>
        @livewireStyles
    @endsection
    <x-navbars.sidebar activePage="device.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Master Data"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Edit Data Device
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container p-3">
                                <form action="{{ route('device.update') }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="id" value="{{ $device->id }}" hidden>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control border border-2 p-2"
                                                name="name" value="{{ $device->name }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Code</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control border border-2 p-2"
                                                name="code" value="{{ $device->code }}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Building</label>
                                        <div class="input-group mb-3">
                                            <select name="building_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select building -
                                                </option>
                                                @foreach ($building as $item)
                                                    <option @if ($item->id == $device->building->id) selected @endif
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Line</label>
                                        <div class="input-group mb-3">
                                            <select name="line_id" class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select line -
                                                </option>
                                                @foreach ($line as $item)
                                                    <option @if ($item->id == $device->line->id) selected @endif
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Section</label>
                                        <div class="input-group mb-3">
                                            <select name="section_id" class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select section -
                                                </option>
                                                @foreach ($section as $item)
                                                    <option @if ($item->id == $device->section->id ?? '') selected @endif
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Zone</label>
                                        <div class="input-group mb-3">
                                            <select name="zona_id" class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select zone -
                                                </option>
                                                @foreach ($zona as $item)
                                                    <option @if ($item->id == $device->zona->id) selected @endif
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Process</label>
                                        <div class="input-group mb-3">
                                            <select name="process_id" class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select process -
                                                </option>
                                                @foreach ($process as $item)
                                                    <option @if ($item->id == $device->process->id) selected @endif
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group-append mt-4">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a href="{{ route('device.index') }}" class="btn btn-outline-danger">Cancel</a>
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

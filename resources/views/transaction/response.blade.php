<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Response Request</title>
        @livewireStyles
    @endsection
    <x-navbars.sidebar activePage="transaction.status.response"></x-navbars.sidebar>
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
                                <h6 class="text-white mx-3">Data Response Request
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                NO
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STATUS
                                            </th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                BUILDING
                                            </th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                LINE
                                            </th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                ZONA
                                            </th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                PROCESS
                                            </th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                ISSUE
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                CALL AT
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                RESPONSE AT
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                PIC
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm text-center">{{ $loop->iteration }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ route('transaction.detail.response', Crypt::encryptString($item->id)) }}"
                                                        type="button" class="btn btn-warning btn-link my-0 p-1"
                                                        title="Response" target="_blank">
                                                        <i class="material-icons">flag</i>
                                                        <div class="ripple-container">
                                                            {{ $item->status }}
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->device->building->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->device->line->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->device->zona->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs text-secondary mb-0 font-weight-bold">
                                                        {{ $item->device->process->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->department->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                                        {{ $item->call_at ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                                        {{ $item->response_at ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                                        {{ $item->pic->name ?? '-' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($transactions->count() == 0)
                                            <tr>
                                                <td colspan="9" class="fw-bolder text-center">
                                                    <p class="text-secondary">No response request data found!</p>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
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

<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Transaction</title>
    @endsection
    <x-navbars.sidebar activePage="transaction.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Transaction"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Data Transaction
                                </h6>
                            </div>
                        </div>
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" data-toggle="modal" data-target="#addModal"
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Request</a>
                            <a class="btn bg-gradient-warning mb-0" data-toggle="modal" data-target="#filterModal"
                                href="javascript:;"><i class="material-icons text-sm">filter</i>&nbsp;&nbsp;Filter</a>
                            <a class="btn bg-gradient-success mb-0" data-toggle="modal"
                                data-target="#confirmationExportExcel" href="javascript:;"><i
                                    class="material-icons text-sm">send</i>&nbsp;&nbsp;Export</a>
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
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                BUILDING
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
                                                PIC DEPARTMENT
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
                                                CLOSED AT
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                RESPONSE DURATION
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                PERFORMANCE DURATION
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                TOTAL DURATION
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STATUS
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $loop->iteration }}</p>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->device->building->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->device->zona->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0 font-weight-bold">
                                                        {{ $item->device->process ?? '-' }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->department->name ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-wrap">
                                                    <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                                        {{ $item->call_at ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-wrap">
                                                    <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                                        {{ $item->response_at ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-wrap">
                                                    <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                                        {{ $item->closed_at ?? '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-wrap">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{-- @php
                                                            $call_at = \Carbon\Carbon::parse($item->call_at);
                                                            $response_at = \Carbon\Carbon::parse($item->response_at);
                                                        @endphp
                                                        {{ $call_at->diffInMinutes($response_at) ?? '-' }} min --}}
                                                        {{ $item->response_duration }} min
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-wrap">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{-- @php
                                                            $response_at = \Carbon\Carbon::parse($item->response_at);
                                                            $closed_at = \Carbon\Carbon::parse($item->closed_at);
                                                        @endphp
                                                        {{ $response_at->diffInMinutes($closed_at) ?? '-' }} min --}}
                                                        {{ $item->performance_duration }} min
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-wrap">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{-- @php
                                                            $call_at = \Carbon\Carbon::parse($item->call_at);
                                                            $closed_at = \Carbon\Carbon::parse($item->closed_at);
                                                        @endphp
                                                        {{ $call_at->diffInMinutes($closed_at) ?? '-' }} min --}}
                                                        {{ $item->total_duration }} min
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <h6 class="mb-0 text-center">
                                                        <span
                                                            class="badge badge-lg @if ($item->status == 'Call') bg-danger @elseif ($item->status == 'Response') bg-warning
                                                                @else
                                                                bg-dark @endif  p-1">{{ $item->status }}</span>
                                                    </h6>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button" class="btn btn-warning btn-link my-0 p-1"
                                                        @if ($item->status != 'Call') hidden @endif
                                                        data-bs-toggle="modal" data-bs-target="#confirmationResponse"
                                                        data-id="{{ $item->id }}" title="Response">
                                                        <i class="material-icons">phone</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                    <a class="btn btn-success btn-link my-0 p-1"
                                                        @if ($item->status != 'Response') hidden @endif href=""
                                                        data-original-title="" title="Closed" data-bs-toggle="modal"
                                                        data-bs-target="#confirmationClosed"
                                                        data-id="{{ $item->id }}">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    {{-- <button type="button" class="btn btn-danger btn-link my-0 p-1"
                                                            data-original-title="" title="delete">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Data Request</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="{{ route('transaction.store') }}" id="add-form" method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Device</label>
                                            <select name="device_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select device -</option>
                                                @foreach ($device as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label">Department</label>
                                            <select name="department_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select department -</option>
                                                @foreach ($department as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="add-form" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Add Modal -->

                <!-- Start Confirmation Response Modal -->
                <div class="modal fade" id="confirmationResponse" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="{{ route('transaction.response') }}"
                                        id="confirmation-response-form" method="POST">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="id" id="id_modal" hidden>
                                        <div class="mb-3">
                                            <h5 class="text-center text-wrap">
                                                Apakah anda yakin untuk merespon laporan panggilan ini?
                                            </h5>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" form="confirmation-response-form"
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Confirmation Response Modal -->

                <!-- Start Confirmation Closed Modal -->
                <div class="modal fade" id="confirmationClosed" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="{{ route('transaction.closed') }}" id="confirmation-closed-form"
                                        method="POST">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="id" id="id_modal_closed" hidden>
                                        <div class="mb-3">
                                            <h5 class="text-center text-wrap">
                                                Data laporan ini akan di-closed dan dianggap selesai.
                                            </h5>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" form="confirmation-closed-form"
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Confirmation Closed Modal -->

                <!-- Start Confirmation Export Excel Modal -->
                <div class="modal fade" id="confirmationExportExcel" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="{{ route('transaction.excel') }}" id="confirmation-export-form"
                                        method="GET">
                                        @csrf
                                        @method('get')
                                        <div class="mb-3">
                                            <p class="text-center text-wrap">
                                                This report data will be generated in Excel format.
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="confirmation-export-form" formtarget="_blank"
                                    onclick="closeModal()" class="btn btn-success">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Confirmation Export Excel Modal -->

                @section('javascript')
                    <script>
                        $(document).ready(function() {
                            $('#confirmationResponse').on('show.bs.modal', function(e) {
                                var id = $(e.relatedTarget).data('id');
                                $('#id_modal').val(id);
                            });

                            $('#confirmationClosed').on('show.bs.modal', function(e) {
                                var id = $(e.relatedTarget).data('id');
                                $('#id_modal_closed').val(id);
                            });

                            function closeModal() {
                                const modal_export_excell = document.getElementById("confirmationExportExcel");
                                modal_export_excell.modal("hide");
                            }
                        });
                    </script>
                @endsection
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

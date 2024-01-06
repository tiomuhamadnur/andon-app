<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Transaction</title>
        @livewireStyles
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
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add</a>
                            <a class="btn bg-gradient-warning mb-0" data-toggle="modal" data-target="#filterModal"
                                href="javascript:;"><i class="material-icons text-sm">filter</i>&nbsp;&nbsp;Filter</a>
                            <a class="btn bg-gradient-success mb-0" data-toggle="modal"
                                data-target="#confirmationExportExcel" href="javascript:;"><i
                                    class="material-icons text-sm">send</i>&nbsp;&nbsp;Export</a>
                        </div>
                        @livewire('transaction')
                    </div>
                </div>
                <!-- Start Filter Modal -->
                <div class="modal fade" id="filterModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="{{ route('transaction.filter') }}" id="filter-form" method="GET">
                                        @csrf
                                        @method('get')
                                        <div class="mb-3">
                                            <label class="form-label">PIC
                                                Department</label>
                                            <select name="department_id" class="form-control border border-2 p-2">
                                                <option value="" selected disabled>- select pic department -
                                                </option>
                                                @foreach ($department as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Building</label>
                                            <select name="building_id" class="form-control border border-2 p-2">
                                                <option value="" selected disabled>- select building -</option>
                                                @foreach ($building as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Zona</label>
                                            <select name="zona_id" class="form-control border border-2 p-2">
                                                <option value="" selected disabled>- select zona -</option>
                                                @foreach ($zona as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Line</label>
                                            <select name="line_id" class="form-control border border-2 p-2">
                                                <option value="" selected disabled>- select line -</option>
                                                @foreach ($line as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Process</label>
                                            <select name="process_id" class="form-control border border-2 p-2">
                                                <option value="" selected disabled>- select process -</option>
                                                @foreach ($process as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Staus</label>
                                            <select name="status" class="form-control border border-2 p-2">
                                                <option value="" selected disabled>- select status -</option>
                                                <option value="Call">Call</option>
                                                <option value="Response">Response</option>
                                                <option value="Closed">Closed</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Date Range</label>
                                            <div class="input-group">
                                                <input type="date" name="start_date"
                                                    class="form-control border border-2 p-2" placeholder="start date">
                                                <input type="date" name="end_date"
                                                    class="form-control border border-2 p-2" placeholder="end date">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="filter-form" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Modal -->

                <!-- Start Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <label class="form-label">Device</label>
                                            <select name="device_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select device -</option>
                                                @foreach ($device as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
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
                                            <h6 class="text-center text-wrap">
                                                This report data will be generated in Excel format.
                                            </h6>
                                            <input type="text" name="department_id"
                                                value="{{ $department_id ?? '' }}" hidden>
                                            <input type="text" name="building_id"
                                                value="{{ $building_id ?? '' }}" hidden>
                                            <input type="text" name="zona_id" value="{{ $zona_id ?? '' }}"
                                                hidden>
                                            <input type="text" name="line_id" value="{{ $line_id ?? '' }}"
                                                hidden>
                                            <input type="text" name="process_id" value="{{ $process_id ?? '' }}"
                                                hidden>
                                            <input type="text" name="status" value="{{ $status ?? '' }}" hidden>
                                            <input type="text" name="start_date" value="{{ $start_date ?? '' }}"
                                                hidden>
                                            <input type="text" name="end_date" value="{{ $end_date ?? '' }}"
                                                hidden>
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
                    @livewireScripts
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

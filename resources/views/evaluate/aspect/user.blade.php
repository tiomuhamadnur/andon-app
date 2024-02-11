<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Evaluate User</title>
        @livewireStyles
    @endsection
    <x-navbars.sidebar activePage="evaluate.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Evaluate"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Data User Evaluation
                                </h6>
                            </div>
                        </div>
                        <div class=" me-3 mt-3 mb-1 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('evaluate.index') }}"><i
                                    class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Back</a>
                            <a class="btn bg-gradient-success mb-0 disabled" data-toggle="modal"
                                data-target="#confirmationExportExcel" href="javascript:;"><i
                                    class="material-icons text-sm">send</i>&nbsp;&nbsp;Export</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                NO
                                            </th>
                                            <th rowspan="2"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                NAME
                                            </th>
                                            <th rowspan="2"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                POSITION
                                            </th>
                                            <th rowspan="2"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                                                DEPARTMENT
                                            </th>
                                            <th rowspan="2"
                                                class="text-wrap text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                WORKING DAY (day)
                                            </th>
                                            <th rowspan="2"
                                                class="text-wrap text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                WORKING TIME ({{ $unit ?? '-' }})
                                            </th>
                                            <th rowspan="2"
                                                class="text-center text-wrap text-secondary text-xxs font-weight-bolder opacity-7">
                                                TOTAL FAILURE
                                            </th>
                                            <th colspan="3"
                                                class="text-center text-wrap text-secondary text-xxs font-weight-bolder opacity-7">
                                                EVALUATION
                                            </th>

                                        </tr>
                                        <tr>
                                            <th
                                                class="text-center text-wrap text-secondary text-xxs font-weight-bolder opacity-7">
                                                RESPONSE TIME ({{ $unit ?? '-' }})
                                            </th>
                                            <th
                                                class="text-center text-wrap text-secondary text-xxs font-weight-bolder opacity-7">
                                                PERFORMANCE TIME ({{ $unit ?? '-' }})
                                            </th>
                                            <th
                                                class="text-center text-wrap text-secondary text-xxs font-weight-bolder opacity-7">
                                                TOTAL DURATION ({{ $unit ?? '-' }})
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm text-secondary text-center">
                                                        1
                                                    </h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $user->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $user->jabatan->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $user->department->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $total_working_day ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $total_operating_time ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $total_transactions ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $sum_response_duration ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $sum_performance_duration ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-xs text-secondary mb-0 font-weight-bold">
                                                    {{ $sum_total_down_duration ?? '-' }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start Confirmation Export Excel Modal -->
                <div class="modal fade" id="confirmationExportExcel" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="#" id="confirmation-export-form" method="GET">
                                        @csrf
                                        @method('get')
                                        <div class="mb-3">
                                            <h6 class="text-center text-wrap">
                                                This report data will be generated in Excel format.
                                            </h6>
                                            <input type="text" name="mode" value="{{ $mode ?? '' }}" hidden>
                                            <input type="text" name="equipment_id"
                                                value="{{ $equipment->id ?? '' }}" hidden>
                                            <input type="text" name="start_date" value="{{ $start_date ?? '' }}"
                                                hidden>
                                            <input type="text" name="end_date" value="{{ $end_date ?? '' }}" hidden>
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

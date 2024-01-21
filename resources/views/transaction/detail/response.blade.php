<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Form Response</title>
    @endsection
    <x-navbars.sidebar activePage="transaction.status.call"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Form Response"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Detail Form Response
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <div class="row align-items-center">
                                    <table class="table table-borderless w-1 mx-auto">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Building</th>
                                                <td>:</td>
                                                <td>{{ $transaction->device->building->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Line</th>
                                                <td>:</td>
                                                <td>{{ $transaction->device->line->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Zona</th>
                                                <td>:</td>
                                                <td>{{ $transaction->device->zona->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Process</th>
                                                <td>:</td>
                                                <td>{{ $transaction->device->process->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>:</td>
                                                <td>
                                                    <span
                                                        class="badge @if ($transaction->status == 'Call') bg-gradient-danger @elseif ($transaction->status == 'Pending') bg-gradient-dark @else bg-gradient-success @endif">
                                                        {{ $transaction->status ?? '-' }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Call At</th>
                                                <td>:</td>
                                                <td>{{ $transaction->call_at ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Response At</th>
                                                <td>:</td>
                                                <td>{{ $transaction->response_at ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Closed At</th>
                                                <td>:</td>
                                                <td>{{ $transaction->closed_at ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">PIC</th>
                                                <td>:</td>
                                                <td>{{ $transaction->pic->name ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="border-2 card border-secondary p-2">
                                    <div class="card-header bg-gradient-faded-primary py-2">
                                        <h5 class="text-center text-white">FOLLOW UP</h4>
                                    </div>
                                    <form action="{{ route('transaction.response') }}" id="response-form"
                                        method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3 mt-2">
                                            <input type="text" name="id" value="{{ $transaction->id }}"
                                                required hidden>
                                            <label class="form-label">Action</label>
                                            <select name="status" id="status"
                                                class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select follow up -</option>
                                                <option value="Response">Response</option>
                                                <option value="Pending" @if ($transaction->status == 'Pending') hidden @endif>
                                                    Pending</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="pending_reason_container" style="display: none;">
                                            <label class="form-label">Pending Reason</label>
                                            <input type="text" name="pending_reason" id="pending_reason"
                                                class="form-control border border-2 p-2"
                                                placeholder="explain why pending" autocomplete="off">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('transaction.status.call') }}" type="button" class="btn btn-secondary"
                                data-dismiss="modal">Cancel</a>
                            <button type="submit" form="response-form" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                @section('javascript')
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Menangani perubahan pada elemen status
                            document.getElementById('status').addEventListener('change', function() {
                                var status = this.value;

                                // Menentukan apakah harus menampilkan atau menyembunyikan pending_reason_container
                                var pendingReasonContainer = document.getElementById('pending_reason_container');
                                pendingReasonContainer.style.display = (status === 'Pending') ? 'block' : 'none';

                                // Menangani atribut required pada pending_reason
                                var pendingReasonInput = document.getElementById('pending_reason');
                                pendingReasonInput.required = (status === 'Pending');
                            });
                        });
                    </script>
                @endsection
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

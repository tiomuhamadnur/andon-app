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
                                <div class="row g-2 mb-3">
                                    <div class="col mb-3">
                                        <label class="form-label">Building</label>
                                        <input class="form-control border border-2 p-2"
                                            value="{{ $transaction->device->building->name ?? '' }}" disabled>
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">Line</label>
                                        <input class="form-control border border-2 p-2"
                                            value="{{ $transaction->device->line->name ?? '' }}" disabled>
                                    </div>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col mb-3">
                                        <label class="form-label">Zona</label>
                                        <input class="form-control border border-2 p-2"
                                            value="{{ $transaction->device->zona->name ?? '' }}" disabled>
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">Process</label>
                                        <input class="form-control border border-2 p-2"
                                            value="{{ $transaction->device->process->name ?? '' }}" disabled>
                                    </div>
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Status</label>
                                    <input class="form-control border border-2 p-2" value="{{ $transaction->status }}"
                                        disabled>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col mb-3">
                                        <label class="form-label">Call At</label>
                                        <input type="datetime-local" class="form-control border border-2 p-2"
                                            value="{{ $transaction->call_at ?? '' }}" disabled>
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">Response At</label>
                                        <input type="datetime-local" class="form-control border border-2 p-2"
                                            value="{{ $transaction->response_at ?? '' }}" disabled>
                                    </div>
                                    <div class="col mb-3">
                                        <label class="form-label">Closed At</label>
                                        <input type="datetime-local" class="form-control border border-2 p-2"
                                            value="{{ $transaction->closed_at ?? '' }}" disabled>
                                    </div>
                                </div>

                                <form action="{{ route('transaction.response') }}" id="response-form" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                        <label class="form-label">PIC</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            value="{{ $transaction->pic->name ?? auth()->user()->name }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="id" value="{{ $transaction->id }}" required
                                            hidden>
                                        <label class="form-label">Follow Up</label>
                                        <select name="status" id="status" class="form-control border border-2 p-2"
                                            required>
                                            <option value="" selected disabled>- select follow up -</option>
                                            <option value="Response">Response</option>
                                            <option value="Pending" @if ($transaction->status == 'Pending') hidden @endif>
                                                Pending</option>
                                        </select>
                                    </div>
                                    <div class="mb-3" id="pending_reason_container" style="display: none;">
                                        <label class="form-label">Pending Reason</label>
                                        <input type="text" name="pending_reason" id="pending_reason"
                                            class="form-control border border-2 p-2" placeholder="explain why pending"
                                            autocomplete="off">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('transaction.index') }}" type="button" class="btn btn-secondary"
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

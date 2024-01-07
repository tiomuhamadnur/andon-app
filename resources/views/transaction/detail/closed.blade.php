<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Form Closed</title>
        @livewireStyles
    @endsection
    <x-navbars.sidebar activePage="transaction.status.response"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Form Closed"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Detail Form Closed
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <div class="row align-items-center">
                                    <table class="table table-borderless w-1 ms-5">
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
                                                        class="badge @if ($transaction->status == 'Call') bg-gradient-danger @elseif ($transaction->status == 'Pending') bg-gradient-dark @elseif ($transaction->status == 'Response') bg-gradient-warning @else bg-gradient-success @endif">
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
                                    <form action="{{ route('transaction.closed') }}" id="response-form" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <input type="text" name="id" value="{{ $transaction->id }}"
                                                required hidden>
                                            <label class="form-label">Affected Equipment</label>
                                            <select name="equipment_id" id="equipment_id"
                                                class="form-control border border-2 p-2">
                                                <option value="" selected disabled>- select equipment -</option>
                                                @foreach ($equipment as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="data_container" style="display: none;">
                                            <div class="mb-3">
                                                <label class="form-label">Remark</label>
                                                <input type="text"
                                                    class="form-control data-tambahan border border-2 p-2"
                                                    name="remark" placeholder="add notes or remark" autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Photo Before Repair</label>
                                                <div class="my-2">
                                                    <img class="img-thumbnail" id="previewImage" src="#"
                                                        alt="Preview"
                                                        style="max-width: 250px; max-height: 250px; display: none;">
                                                </div>
                                                <input type="file"
                                                    class="form-control data-tambahan border border-2 p-2"
                                                    name="photo" accept="image/*" id="imageInput">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Photo After Repair</label>
                                                <div class="my-2">
                                                    <img class="img-thumbnail" id="previewImageClosed" src="#"
                                                        alt="Preview"
                                                        style="max-width: 250px; max-height: 250px; display: none;">
                                                </div>
                                                <input type="file"
                                                    class="form-control data-tambahan border border-2 p-2"
                                                    name="photo_closed" accept="image/*" id="imageInputClosed">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('transaction.status.response') }}" type="button"
                                class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <button type="submit" form="response-form" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                @section('javascript')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var equipmentSelect = document.getElementById('equipment_id');
                            var container = document.getElementById('data_container');
                            var dataContainer = document.querySelectorAll('.data-tambahan');

                            equipmentSelect.addEventListener('change', function() {
                                if (equipmentSelect.value !== "") {
                                    container.style.display = 'block';
                                    var inputs = dataContainer;
                                    console.log(inputs.length);
                                    inputs.forEach(function(input) {
                                        input.setAttribute('required', 'required');
                                    });
                                } else {
                                    dataContainer.style.display = 'none';
                                    var inputs = dataContainer.querySelectorAll('.data-tambahan');
                                    inputs.forEach(function(input) {
                                        input.removeAttribute('required');
                                    });
                                }
                            });

                            const imageInput = document.getElementById('imageInput');
                            const previewImage = document.getElementById('previewImage');

                            imageInput.addEventListener('change', function(event) {
                                const selectedFile = event.target.files[0];

                                if (selectedFile) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        previewImage.src = e.target.result;
                                        previewImage.style.display = 'block';
                                    }

                                    reader.readAsDataURL(selectedFile);
                                }
                            });

                            const imageInputClosed = document.getElementById('imageInputClosed');
                            const previewImageClosed = document.getElementById('previewImageClosed');

                            imageInputClosed.addEventListener('change', function(event) {
                                const selectedFile = event.target.files[0];

                                if (selectedFile) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        previewImageClosed.src = e.target.result;
                                        previewImageClosed.style.display = 'block';
                                    }

                                    reader.readAsDataURL(selectedFile);
                                }
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

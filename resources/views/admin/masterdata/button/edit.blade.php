<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>Button</title>
    @endsection
    <x-navbars.sidebar activePage="button.index"></x-navbars.sidebar>
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
                                <h6 class="text-white mx-3">Edit Data Button Configuration
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container p-3">
                                <form action="{{ route('button.update') }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="id" value="{{ $button->id }}" hidden>
                                    <div class="mb-3">
                                        <label class="form-label">Device</label>
                                        <div class="input-group mb-3">
                                            <select name="device_id" class="form-control border borsder-2 p-2" required>
                                                <option value="" selected disabled>- select device -
                                                </option>
                                                @foreach ($device as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $button->device->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <div class="input-group mb-3">
                                            <select name="department_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select department -
                                                </option>
                                                @foreach ($department as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $button->department->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Code (auto-generate from register device) - (last
                                            data: {{ $button->code }})</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="code" name="code"
                                                class="form-control border border-2 p-2" value="{{ $button->code }}"
                                                readonly required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="input-group-append btn-group">
                                        <a href="{{ route('button.index') }}" class="btn btn-outline-danger">Cancel</a>
                                        <button id="submit" class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            @section('javascript')
                <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Pusher.logToConsole = true;

                        var pusher = new Pusher('76bef5d058242d5c2648', {
                            cluster: 'ap1'
                        });
                        var channel = pusher.subscribe('register-button-channel');
                        channel.bind('RegisterButtonEvent', function(dataRaw) {
                            var dataString = JSON.stringify(dataRaw)
                            var data = JSON.parse(dataString);
                            // alert(data);

                            var code = data[0];
                            $('#code').val(code);

                            if ($('#code').val() != '') {
                                $('#submit').css('display', 'block');
                            } else {
                                $('#submit').css('display', 'none');
                            }
                        });
                    });
                </script>
            @endsection

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

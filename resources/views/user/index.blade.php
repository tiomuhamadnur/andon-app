<x-layout bodyClass="g-sidenav-show bg-gray-200">

    @section('title')
        <title>User Profile</title>
    @endsection

    <x-navbars.sidebar activePage="user-profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='User Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <a href="javascript:;" data-toggle="modal" data-target="#updatePhotoModal">
                            <div class="avatar avatar-xl position-relative">
                                @if (auth()->user()->photo != '')
                                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm">
                                @else
                                    <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm">
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm text-secondary">
                                {{ auth()->user()->role->name }} / {{ auth()->user()->jabatan->name }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">home</i>
                                        <span class="ms-1">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">email</i>
                                        <span class="ms-1">Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">settings</i>
                                        <span class="ms-1">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Profile Information</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <form method='POST' action='{{ route('user-profile') }}'>
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control border border-2 p-2"
                                        value='{{ old('email', auth()->user()->email) }}' disabled>
                                    @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value='{{ old('name', auth()->user()->name) }}' disabled>
                                    @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control border border-2 p-2"
                                        value='{{ old('phone', auth()->user()->phone) }}' disabled>
                                    @error('phone')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value='{{ auth()->user()->company->name }}' disabled>
                                    @error('company')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Section</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value='{{ auth()->user()->section->name }}' disabled>
                                    @error('section')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Department</label>
                                    <input type="text" class="form-control border border-2 p-2"
                                        value='{{ auth()->user()->department->name }}' disabled>
                                    @error('gender')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            {{-- <button type="submit" class="btn bg-gradient-dark">Submit</button> --}}
                        </form>

                    </div>
                </div>
                <!-- Start Update Photo Modal -->
                <div class="modal fade" id="updatePhotoModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="{{ route('update.photo-profile') }}" id="update-photo-form"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <div class="mx-auto">
                                                <img class="img-thumbnail mx-auto" id="previewImage" src="#"
                                                    alt="Preview"
                                                    style="max-width: 250px; max-height: 250px; display: none;">
                                            </div>
                                            <label class="form-label">Photo</label>
                                            <input type="file" name="photo"
                                                class="form-control border border-2 p-2" required id="imageInput"
                                                accept="image/*" required>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="update-photo-form"
                                    class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Update Photo Modal -->

                @section('javascript')
                    <script>
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
                    </script>
                @endsection
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>

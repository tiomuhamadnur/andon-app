<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>User Management</title>
    @endsection
    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">User Management
                                </h6>
                            </div>
                        </div>
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" data-toggle="modal" data-target="#addModal"
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                User</a>
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
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                PHOTO</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAME</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                EMAIL</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ROLE <br>
                                                (JABATAN)
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                DEPARTMENT <br>
                                                (SECTION)
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <p class="mb-0 text-sm text-secondary">
                                                        {{ $loop->iteration }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="user1">
                                                        </div>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->name }}</h6>

                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs text-secondary mb-0">{{ $item->email }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->role->name ?? '-' }} <br>
                                                        ({{ $item->jabatan->name ?? '-' }})
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-secondary text-xs font-weight-bold">
                                                        {{ $item->department->name ?? '-' }} <br>
                                                        ({{ $item->section->name ?? '-' }})
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('user-management.edit', Crypt::encryptString($item->id)) }}"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form action="{{ route('user-management.store') }}" id="add-form" method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control border border-2 p-2"
                                                placeholder="input name" name="name" required autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control border border-2 p-2"
                                                placeholder="input email" name="email" required autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control border border-2 p-2"
                                                placeholder="input phone number" name="phone" required
                                                autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select gender -</option>
                                                <option value="Bapak">Bapak</option>
                                                <option value="Ibu">Ibu</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Role</label>
                                            <select name="role_id" class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>- select role -</option>
                                                @foreach ($role as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jabatan</label>
                                            <select name="jabatan_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select jabatan -</option>
                                                @foreach ($jabatan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Section</label>
                                            <select name="section_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select section -</option>
                                                @foreach ($section as $item)
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
                                        <div class="mb-3">
                                            <label class="form-label">Company</label>
                                            <select name="company_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select company -</option>
                                                @foreach ($company as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Building on Duty</label>
                                            <select name="building_id" class="form-control border border-2 p-2"
                                                required>
                                                <option value="" selected disabled>- select building -</option>
                                                @foreach ($building as $item)
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
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

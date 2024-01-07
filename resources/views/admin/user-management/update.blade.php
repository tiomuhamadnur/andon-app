<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Form Update User</title>
    @endsection
    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Form Update"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Form Update User
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
                                <div class="container">
                                    <div class="form">
                                        <form action="{{ route('user-management.update') }}" id="edit-form"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <input type="text" name="id" value="{{ $user->id }}" required
                                                hidden>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control border border-2 p-2"
                                                    value="{{ $user->name ?? '' }}" placeholder="input name"
                                                    name="name" required autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control border border-2 p-2"
                                                    value="{{ $user->email ?? '' }}" placeholder="input email"
                                                    name="email" required autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control border border-2 p-2"
                                                    value="{{ $user->phone ?? '' }}" placeholder="input phone number"
                                                    name="phone" required autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <select name="gender" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>- select gender -</option>
                                                    <option value="Bapak"
                                                        @if ($user->gender == 'Bapak') selected @endif>Bapak</option>
                                                    <option value="Ibu"
                                                        @if ($user->gender == 'Ibu') selected @endif>Ibu</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Role</label>
                                                <select name="role_id" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>- select role -</option>
                                                    @foreach ($role as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($user->role->id == $item->id) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jabatan</label>
                                                <select name="jabatan_id" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>- select jabatan -</option>
                                                    @foreach ($jabatan as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($user->jabatan->id == $item->id) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Section</label>
                                                <select name="section_id" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>- select section -</option>
                                                    @foreach ($section as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($user->section->id == $item->id) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Department</label>
                                                <select name="department_id" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>- select department -
                                                    </option>
                                                    @foreach ($department as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($user->department->id == $item->id) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Company</label>
                                                <select name="company_id" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>- select company -</option>
                                                    @foreach ($company as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($user->company->id == $item->id) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Building on Duty</label>
                                                <select name="building_id" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>- select building -
                                                    </option>
                                                    @foreach ($building as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($user->building->id == $item->id) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                        <div class="modal-footer">
                                            <a href="{{ route('user-management') }}" type="button"
                                                class="btn btn-secondary">Cancel</a>
                                            <button type="submit" form="edit-form"
                                                class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
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

<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>Settings</title>
    @endsection
    <x-navbars.sidebar activePage="settings.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Settings"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Settings App
                                </h6>
                            </div>
                        </div>
                        {{-- <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" data-toggle="modal" data-target="#addModal"
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Data
                            </a>
                        </div> --}}
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                NAME
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                CODE
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                VALUE
                                            </th>
                                            <th class="text-uppercase text-secondary text-center opacity-7">
                                                ACTION
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($settings as $item)
                                            <form action="{{ route('settings.update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->name }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm text-center"
                                                                title="{{ $item->description ?? '' }}">
                                                                <span class="badge badge-pill bg-warning p-2">
                                                                    {{ $item->code }}
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            @if ($item->value == 1 or $item->value == 0)
                                                                <select name="value"
                                                                    class="form-control border border-2 p-2">
                                                                    <option
                                                                        @if ($item->value == 1) selected @endif
                                                                        value="1">ON</option>
                                                                    <option
                                                                        @if ($item->value == 0) selected @endif
                                                                        value="0">OFF</option>
                                                                </select>
                                                            @elseif ($item->code == 'APP_LOGO')
                                                                <div class="btn-group">
                                                                    <img class="img-thumbnail"
                                                                        src="{{ asset('storage/' . $item->value) }}"
                                                                        alt="LOGO APP"
                                                                        style="height: 70px; width:70px;">
                                                                    <input class="ms-2" type="file" name="logo"
                                                                        required accept="image/*">
                                                                </div>
                                                            @else
                                                                <input name="value" type="text"
                                                                    value="{{ $item->value }}"
                                                                    class="form-control border border-2 p-2">
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <input type="text" name="code" value="{{ $item->code }}"
                                                            hidden>
                                                        <button rel="tooltip" class="btn btn-success btn-link"
                                                            type="submit" data-original-title="Update" title="Update">
                                                            <i class="material-icons">save</i> Update
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                <form action="{{ route('roles.store') }}" id="add-form" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="input name" name="name" required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Code</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="input code" name="code" required autocomplete="off">
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

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

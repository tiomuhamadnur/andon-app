<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>Department</title>
    @endsection
    <x-navbars.sidebar activePage="department.index"></x-navbars.sidebar>
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
                                <h6 class="text-white mx-3">Data Department
                                </h6>
                            </div>
                        </div>
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" data-toggle="modal" data-target="#addModal"
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Data
                            </a>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                NO
                                            </th>
                                            <th rowspan="2"
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                NAME
                                            </th>
                                            <th rowspan="2"
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                CODE
                                            </th>
                                            <th colspan="3"
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                SOUND
                                            </th>
                                            <th rowspan="2"
                                                class="text-uppercase text-secondary text-center opacity-7">
                                                ACTION
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-center opacity-7">
                                                CALL
                                            </th>
                                            <th class="text-uppercase text-secondary text-center opacity-7">
                                                RESPONSE
                                            </th>
                                            <th class="text-uppercase text-secondary text-center opacity-7">
                                                CLOSED
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($department as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm text-center">{{ $loop->iteration }}</h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm text-center">{{ $item->name }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm text-center">{{ $item->code }}</h6>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($item->call_tone != '')
                                                        <audio controls>
                                                            <source src="{{ asset('storage/' . $item->call_tone) }}"
                                                                type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($item->response_tone != '')
                                                        <audio controls>
                                                            <source src="{{ asset('storage/' . $item->response_tone) }}"
                                                                type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($item->closed_tone != '')
                                                        <audio controls>
                                                            <source src="{{ asset('storage/' . $item->closed_tone) }}"
                                                                type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="#"
                                                        data-original-title="edit data" title="edit data"
                                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                        data-code="{{ $item->code }}">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                                    <button type="button" class="btn btn-danger btn-link"
                                                        data-original-title="delete data" title="delete data"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{ $item->id }}">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </td>
                                            </tr>
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
                                <form action="{{ route('department.store') }}" id="add-form" method="POST">
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

            <!-- Start Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form">
                                <form action="{{ route('department.update') }}" id="edit-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="id" id="id_modal" hidden>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="input name" id="name_modal" name="name" required
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Code</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="input code" id="code_modal" name="code" required
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Call Tone</label>
                                        <input type="file" class="form-control border border-2 p-2"
                                            name="call_tone" accept="audio/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Response Tone</label>
                                        <input type="file" class="form-control border border-2 p-2"
                                            name="response_tone" accept="audio/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Closed Tone</label>
                                        <input type="file" class="form-control border border-2 p-2"
                                            name="closed_tone" accept="audio/*">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="edit-form" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Edit Modal -->

            <!-- Start Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form">
                                <form action="{{ route('department.delete') }}" id="delete-form" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="id" id="id_delete_modal" hidden>
                                    <div class="mb-3 text-center">
                                        <p class="text-secondary">
                                            Are you sure to delete this data permanently?
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="delete-form" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Delete Modal -->


            @section('javascript')
                <script>
                    $(document).ready(function() {
                        $('#editModal').on('show.bs.modal', function(e) {
                            var id = $(e.relatedTarget).data('id');
                            var name = $(e.relatedTarget).data('name');
                            var code = $(e.relatedTarget).data('code');

                            $('#id_modal').val(id);
                            $('#name_modal').val(name);
                            $('#code_modal').val(code);
                        });

                        $('#deleteModal').on('show.bs.modal', function(e) {
                            var id = $(e.relatedTarget).data('id');

                            $('#id_delete_modal').val(id);
                        });
                    });
                </script>
            @endsection

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

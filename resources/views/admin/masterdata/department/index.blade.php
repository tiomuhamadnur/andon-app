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
                                            <th
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                NO
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                NAME
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-center font-weight-bolder opacity-7">
                                                CODE
                                            </th>
                                            <th class="text-uppercase text-secondary text-center opacity-7">
                                                ACTION
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
                                                <td class="align-middle text-center">
                                                    <a rel="tooltip" class="btn btn-success btn-link" href=""
                                                        data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                                    <button type="button" class="btn btn-danger btn-link"
                                                        data-original-title="" title="">
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

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

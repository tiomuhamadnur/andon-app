<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>Section</title>
    @endsection
    <x-navbars.sidebar activePage="section.index"></x-navbars.sidebar>
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
                                <h6 class="text-white mx-3">Edit Data Section
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container p-3">
                                <form action="{{ route('section.update') }}" id="edit-form" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="id" value="{{ $section->id }}" hidden>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="input name" name="name" value="{{ $section->name }}"
                                            required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Code</label>
                                        <input type="text" class="form-control border border-2 p-2"
                                            placeholder="input code" name="code" value="{{ $section->code }}"
                                            required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Department</label>
                                        <select name="department_id" class="form-select border border-2 p-2">
                                            <option value="" selected disabled>- select department -</option>
                                            @foreach ($department as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($item->id == $section->department->id ?? '') selected @endif>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group-append">
                                        <a href="{{ route('section.index') }}" type="button"
                                            class="btn btn-secondary">Cancel</a>
                                        <button type="submit" form="edit-form" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
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

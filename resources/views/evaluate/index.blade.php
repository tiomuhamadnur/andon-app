<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @section('title')
        <title>Evaluate</title>
        @livewireStyles
    @endsection
    <x-navbars.sidebar activePage="evaluate.index"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Evaluate"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Data Evaluate
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container p-3">
                                <form action="{{ route('evaluate.filter') }}" method="GET">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Evaluate by</label>
                                        <div class="input-group mb-3">
                                            <select id="select" name="mode"
                                                class="form-control border border-2 p-2" required>
                                                <option value="" selected disabled>
                                                    - select mode -
                                                </option>
                                                <option value="user">
                                                    User
                                                </option>
                                                <option value="equipment">
                                                    Equipment
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="container_mode" style="display: none;">
                                        <div class="mb-3" id="container_user">
                                            <label class="form-label">Users</label>
                                            <div class="input-group mb-3">
                                                <select name="user_id" id="user_id"
                                                    class="form-control border border-2 p-2">
                                                    <option value="" selected disabled>- select user -
                                                    </option>
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }} - ({{ $item->jabatan->name ?? '-' }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="container_equipment">
                                            <label class="form-label">Equipments</label>
                                            <div class="input-group mb-3">
                                                <select name="equipment_id" id="equipment_id"
                                                    class="form-control border border-2 p-2">
                                                    <option value="" selected disabled>- select equipment -
                                                    </option>
                                                    @foreach ($equipments as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }} - ({{ $item->code ?? '-' }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Date Range</label>
                                            <div class="input-group">
                                                <input type="date" name="start_date" value="{{ $start_date ?? '' }}"
                                                    class="form-control border border-2 p-2" placeholder="start date"
                                                    required>
                                                <input type="date" name="end_date" value="{{ $end_date ?? '' }}"
                                                    class="form-control border border-2 p-2" placeholder="end date"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Working duration per day (hour)</label>
                                            <div class="input-group mb-3">
                                                <input type="number" min="1" name="work_duration_perday"
                                                    class="form-control border border-2 p-2" required autocomplete="off"
                                                    placeholder="entry in hour (ex: 8 hours)">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Working day per week (day)</label>
                                            <div class="input-group mb-3">
                                                <select name="work_day_perweek" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>
                                                        - select number work day per week -
                                                    </option>
                                                    <option value="5">
                                                        5 days per week
                                                    </option>
                                                    <option value="7">
                                                        7 days per week
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Time Unit</label>
                                            <div class="input-group mb-3">
                                                <select name="unit" class="form-control border border-2 p-2"
                                                    required>
                                                    <option value="" selected disabled>
                                                        - select unit -
                                                    </option>
                                                    <option value="minute">
                                                        Minute
                                                    </option>
                                                    <option value="hour">
                                                        Hour
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Show</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @section('javascript')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var select = document.getElementById('select');
                            var container_mode = document.getElementById('container_mode');
                            var container_user = document.getElementById('container_user');
                            var container_equipment = document.getElementById('container_equipment');
                            var user_id = document.getElementById('user_id');
                            var equipment_id = document.getElementById('equipment_id');

                            select.addEventListener('change', function() {
                                if (select.value === "user") {
                                    container_mode.style.display = 'block';
                                    container_user.style.display = 'block';
                                    container_equipment.style.display = 'none';
                                    user_id.setAttribute('required', 'required');
                                    equipment_id.removeAttribute('required');
                                    equipment_id.value = '';
                                } else if (select.value === "equipment") {
                                    container_mode.style.display = 'block';
                                    container_user.style.display = 'none';
                                    container_equipment.style.display = 'block';
                                    equipment_id.setAttribute('required', 'required');
                                    user_id.removeAttribute('required');
                                    user_id.value = '';
                                } else {
                                    container_mode.style.display = 'none';
                                    equipment_id.removeAttribute('required');
                                    user_id.removeAttribute('required');
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

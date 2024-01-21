<x-layout bodyClass="g-sidenav-show bg-dark">
    @section('title')
        <title>Display {{ $zona->name ?? '' }}</title>
        @livewireStyles
    @endsection
    <main class="main-content position-relative max-height-vh-100 h-100 mt-4">
        <div class="container-fluid fluid-head">
            <div class="col-xl-12 header-zone-display">
                <div class="header-caption">
                    <h1 class="text-uppercase">
                        {{ $zona->name ?? '-' }}
                    </h1>
                </div>
                <div class="header-caption">
                    <h1>ANDON STATUS DASHBOARD</h1>
                </div>
                <div class="header-caption">
                    <h1>
                        <div class="clock">
                            <span class="clock-time"></span>
                            <span class="clock-ampm"></span>
                        </div>
                    </h1>
                </div>
            </div>
        </div>

        @livewire('list-display-zona')

        {{-- <div class="card-body px-0 pb-2" style="background-color: white">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                NO
                            </th>
                            <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                LINE
                            </th>
                            <th class="text-center text-uppercase text-dark text-large font-weight-bolder opacity-7">
                                PROCESS
                            </th>
                            <th
                                class="text-center text-uppercase text-dark text-large font-weight-bolder opacity-7 text-wrap">
                                CALL
                            </th>
                            <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                STATE
                            </th>
                            <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                TIME
                            </th>
                        </tr>
                    </thead>

                    <tbody style="background-color: black">
                        @foreach ($transactions as $item)
                            <tr
                                class="@if ($item->status == 'Call') flashing-card-machine
                                @if ($item->department->id == 1) flashing-card-machine
                                @elseif ($item->department->id == 2) flashing-card-quality
                                @elseif ($item->department->id == 3) flashing-card-material
                                @elseif ($item->department->id == 4) flashing-card-spv @endif
@else
@endif">
                                <td class="align-middle text-center">
                                    <span class="text-large white font-weight-bold">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-uppercase text-large white font-weight-bold">
                                        {{ $item->device->line->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-uppercase align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        {{ $item->device->process->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-uppercase align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        {{ $item->department->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="text-uppercase align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="text-uppercase align-middle text-center">
                                    <span class="text-large white mb-0 font-weight-bold">
                                        {{ \Carbon\Carbon::parse($item->call_at)->format('H:i:s') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        @if ($transactions->count() == 0)
                            <tr class="">
                                <td colspan="6">
                                    <p class="text-white text-large text-center">
                                        No data found!
                                    </p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div> --}}

        {{-- MODAL CALL --}}
        <div class="modal fade" id="modalCall" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xlarge" role="document">
                <div class="modal-content black-modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-12 title-modal-machine flashing-card-machine">
                                        <div class="modal-header-custom">
                                            <h1 class="department-name text-uppercase">MATERIAL</h1> <span>
                                                <h1> CALL!</h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-6 content-modal">
                                        <div class="modal-content-custom">
                                            <h1 class="line-name text-uppercase">LS 1</h1>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 content-modal">
                                        <div class="modal-content-custom">
                                            <h1 class="zona-name text-uppercase">ZONE 1</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL ARRIVED --}}
        <div class="modal fade" id="modalArrived" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xlarge" role="document">
                <div class="modal-content black-modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-12 title-modal-machine">
                                        <div class="modal-header-custom">
                                            <h2 class="department-name text-uppercase">MACHINE</h2> <span>
                                                <h2> ARRIVED!</h2>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-6 content-modal-img">
                                        <div class="modal-content-custom">
                                            <img class="img-modals pic-photo" src="{{ asset('assets/img/user.jpeg') }}"
                                                alt="PIC">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 content-modal-grid">
                                        <div class="row">
                                            <h2 class="line-name text-uppercase">LS 1</h2>
                                        </div>
                                        <div class="row">
                                            <h2 class="zona-name text-uppercase">ZONE 2</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL FINISHED --}}
        <div class="modal fade" id="modalFinished" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xlarge" role="document">
                <div class="modal-content black-modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-12 title-modal-machine">
                                        <div class="modal-header-custom">
                                            <h2 class="department-name text-uppercase">MACHINE</h2><span>
                                                <h2> FINISHED!</h2>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-6 content-modal-img">
                                        <div class="modal-content-custom">
                                            <img class="img-modals pic-photo" src="{{ asset('assets/img/user.jpeg') }}"
                                                alt="PIC">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 content-modal-grid">
                                        <div class="row">
                                            <h2 class="line-name text-uppercase">LS 1</h2>
                                        </div>
                                        <div class="row">
                                            <h2 class="zona-name text-uppercase">ZONE 2</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>


    @section('javascript')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        @livewireScripts
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                class DigitalClock {
                    constructor(element) {
                        this.element = element;
                    }

                    start() {
                        this.update();

                        setInterval(() => {
                            this.update();
                        }, 500);
                    }

                    update() {
                        const parts = this.getTimeParts();
                        const hourFormatted = parts.hour.toString().padStart(2, "0");
                        const minuteFormatted = parts.minute.toString().padStart(2, "0");
                        const secondFormatted = parts.second.toString().padStart(2, "0");
                        const timeFormatted = `${hourFormatted}:${minuteFormatted}:${secondFormatted}`;

                        this.element.querySelector(".clock-time").textContent = timeFormatted;
                    }

                    getTimeParts() {
                        const now = new Date();

                        return {
                            hour: now.getHours(),
                            minute: now.getMinutes(),
                            second: now.getSeconds(),
                        };
                    }
                }

                const clockElement = document.querySelector(".clock");
                const clockObject = new DigitalClock(clockElement);

                clockObject.start();


                var modalCall = new bootstrap.Modal(document.getElementById('modalCall'));
                var modalResponse = new bootstrap.Modal(document.getElementById('modalArrived'));
                var modalClosed = new bootstrap.Modal(document.getElementById('modalFinished'));

                var audio = new Audio("{{ asset('assets/tone/ring-tone.mp3') }}");

                function playAudio() {
                    audio.play();
                }

                function pauseAudio() {
                    audio.pause();
                    audio.currentTime = 0;
                }

                // Pusher.logToConsole = true;

                var pusher = new Pusher('76bef5d058242d5c2648', {
                    cluster: 'ap1'
                });

                var channel = pusher.subscribe('realtime-channel');
                channel.bind('RealtimeEvent', function(dataRaw) {
                    var dataString = JSON.stringify(dataRaw)
                    var data = JSON.parse(dataString);
                    // alert(data);

                    var status = data[0];
                    var zona_id = parseInt(data[1]);
                    var call = parseInt(data[2][0]);
                    var response = parseInt(data[2][1]);
                    var pending = parseInt(data[2][2]);
                    var closed = parseInt(data[2][3]);
                    var department_name = data[3];
                    var zona_name = data[4];
                    var line_name = data[5];
                    var transaction_status = data[6];
                    var pic = data[7];
                    var pic_photo = data[8];

                    // Menampilkan hasil parsing
                    console.log("Status:", status);
                    console.log("Zona ID:", zona_id);
                    console.log("Department Name:", department_name);
                    console.log("Line Name:", line_name);
                    console.log("Zona Name:", zona_name);
                    console.log("Transaction status:", transaction_status);
                    console.log("pic:", pic);
                    console.log("pic photo:", pic_photo);

                    var departmentName = document.querySelectorAll('.department-name');
                    var lineName = document.querySelectorAll('.line-name');
                    var zonaName = document.querySelectorAll('.zona-name');
                    var picPhoto = document.querySelectorAll('.pic-photo');

                    var currentZonaId = parseInt({{ $zona->id }});
                    if (zona_id == currentZonaId) {
                        if (transaction_status == 'Call') {
                            departmentName.forEach(function(element) {
                                element.textContent = department_name;
                            });
                            lineName.forEach(function(element) {
                                element.textContent = line_name;
                            });
                            zonaName.forEach(function(element) {
                                element.textContent = zona_name;
                            });

                            modalCall.show();
                            playAudio;
                            setTimeout(function() {
                                modalCall.hide();
                                pauseAudio;
                            }, 20000);
                        } else if (transaction_status == 'Response') {
                            departmentName.forEach(function(element) {
                                element.textContent = department_name;
                            });
                            lineName.forEach(function(element) {
                                element.textContent = line_name;
                            });
                            zonaName.forEach(function(element) {
                                element.textContent = zona_name;
                            });
                            picPhoto.forEach(function(element) {
                                element.src = pic_photo;
                            });

                            modalCall.hide();
                            pauseAudio;
                            modalResponse.show();
                            setTimeout(function() {
                                modalResponse.hide();
                            }, 15000);
                        } else if (transaction_status == 'Closed') {
                            departmentName.forEach(function(element) {
                                element.textContent = department_name;
                            });
                            lineName.forEach(function(element) {
                                element.textContent = line_name;
                            });
                            zonaName.forEach(function(element) {
                                element.textContent = zona_name;
                            });
                            picPhoto.forEach(function(element) {
                                element.src = pic_photo;
                            });

                            modalResponse.hide();
                            pauseAudio;
                            modalClosed.show();
                            setTimeout(function() {
                                modalClosed.hide();
                            }, 15000);
                        }
                    }
                });
            });
        </script>
    @endsection
</x-layout>

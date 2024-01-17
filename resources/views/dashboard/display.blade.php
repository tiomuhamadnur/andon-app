<x-layout bodyClass="g-sidenav-show bg-dark">
    @section('title')
        <title>Display All Zone</title>
    @endsection
    <main class="main-content position-relative max-height-vh-100 h-100 mt-4">
        <div class="container-fluid fluid-head">
            <div class="col-xl-12 header-zone-display">
                <div class="header-caption">
                    <h1>ZONE 1</h1>
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

        {{-- TRIGGER DIHAPUS AJA NANTI --}}
        <div class="container-fluid">
            <div class="col-xl-12 d-flex justify-content-center align-item-center">
                <button type="button" id="buttonModalCall" class="btn btn-success m-2" data-toggle="modal"
                    data-target="#modalCall">Button
                    CALL</button>
                <button type="button" id="buttonModalResponse" class="btn btn-success m-2" data-toggle="modal"
                    data-target="#modalArrived">Button
                    ARRIVED</button>
                <button type="button" id="buttonModalClosed" class="btn btn-success m-2" data-toggle="modal"
                    data-target="#modalFinished">Button
                    FINISHED</button>
            </div>
        </div>


        <div class="container-fluid py-4 d-flex justify-content-center align-item-stretch mt-5">
            <div class="row" id="cardsContainer">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" data-index="0" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Line 1</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" data-index="1" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Line 2</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" data-index="2" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Line 3</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>

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
                                        <h1>MATERIAL CALL</h1>
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
                                        <h1>LS 1</h1>
                                    </div>
                                </div>
                                <div class="col-xl-6 content-modal">
                                    <div class="modal-content-custom">
                                        <h1>ZONE 1</h1>
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
                                        <h2>MACHINE ARRIVED!</h2>
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
                                        <img class="img-modals" src="{{ asset('assets/img/user.jpeg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6 content-modal-grid">
                                    <div class="row">
                                        <h1>LINE</h1>
                                    </div>
                                    <div class="row">
                                        <h2>LS 1</h2>
                                    </div>
                                    <div class="row">
                                        <h1>ZONE</h1>
                                    </div>
                                    <div class="row">
                                        <h2>ZONE 2</h2>
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
                                        <h2>MACHINE FINISHED!</h2>
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
                                        <img class="img-modals" src="{{ asset('assets/img/user.jpeg') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6 content-modal-grid">
                                    <div class="row">
                                        <h1>LINE</h1>
                                    </div>
                                    <div class="row">
                                        <h2>LS 1</h2>
                                    </div>
                                    <div class="row">
                                        <h1>ZONE</h1>
                                    </div>
                                    <div class="row">
                                        <h2>ZONE 2</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @section('javascript')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>``
        <script>
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
                    const minuteFormatted = parts.minute.toString().padStart(2, "0");
                    const timeFormatted = `${parts.hour}:${minuteFormatted}`;
                    const amPm = parts.isAm ? "AM" : "PM";

                    this.element.querySelector(".clock-time").textContent = timeFormatted;
                    this.element.querySelector(".clock-ampm").textContent = amPm;
                }

                getTimeParts() {
                    const now = new Date();

                    return {
                        hour: now.getHours() % 12 || 12,
                        minute: now.getMinutes(),
                        isAm: now.getHours() < 12
                    };
                }
            }

            const clockElement = document.querySelector(".clock");
            const clockObject = new DigitalClock(clockElement);

            clockObject.start();

            var buttonModalCall = document.getElementById('buttonModalCall');
            var buttonModalResponse = document.getElementById('buttonModalResponse');
            var buttonModalClosed = document.getElementById('buttonModalClosed');

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

                // Menampilkan hasil parsing
                console.log("Status:", status);
                console.log("Zona ID:", zona_id);
                console.log("Call:", call);
                console.log("Response:", response);
                console.log("Pending:", pending);
                console.log("Closed:", closed);

                if (call > 0) {
                    if (buttonModalCall) {
                        buttonModalCall.click();
                    }
                } else if (response > 0 && call == 0) {
                    if (buttonModalResponse) {
                        buttonModalResponse.click();
                    }
                } else if (closed > 0 && call == 0 && response == 0) {
                    if (buttonModalClosed) {
                        buttonModalClosed.click();
                    }
                }

            });
        </script>
    @endsection
</x-layout>

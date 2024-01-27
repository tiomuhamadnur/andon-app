<x-layout bodyClass="g-sidenav-show bg-dark">
    @section('title')
        <title>Display {{ $line->name ?? '' }}</title>
        @livewireStyles
    @endsection
    <main class="main-content position-relative max-height-vh-100 h-100 mt-4">
        <div class="container-fluid fluid-head">
            <div class="col-xl-12 header-zone-display">
                <div class="header-caption">
                    <h1>
                        <div class="clock text-wrap">
                            <span id="date" class="date-time text-wrap"></span>
                        </div>
                    </h1>
                </div>
                <div class="header-caption">
                    <h1>ANDON STATUS - <span class="text-uppercase text-warning">{{ $line->name ?? '-' }}</span></h1>
                </div>
                <div class="header-caption">
                    <h1>
                        <div class="clock text-wrap">
                            <span id="clock" class="clock-time text-wrap"></span>
                        </div>
                    </h1>
                </div>
            </div>
        </div>

        @livewire('list-display-zona')

        @include('display.modals')

        <audio src="{{ asset('assets/tone/ring-tone.mp3') }}" id="audio" hidden>
    </main>
    </div>


    @section('javascript')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script type="text/javascript">
            var audio = document.getElementById('audio');

            function playAudio() {
                audio.play();
            }

            function pauseAudio() {
                audio.pause();
                audio.currentTime = 0;
            }

            function updateClock() {
                const now = new Date();

                const year = now.getFullYear();
                const month = (now.getMonth() + 1).toString().padStart(2, "0"); // Months are zero-based
                const day = now.getDate().toString().padStart(2, "0");
                const hour = now.getHours().toString().padStart(2, "0");
                const minute = now.getMinutes().toString().padStart(2, "0");
                const second = now.getSeconds().toString().padStart(2, "0");

                const dateFormatted = `${day}/${month}/${year}`;
                const timeFormatted = `${hour}:${minute}:${second}`;

                document.getElementById('date').textContent = dateFormatted;
                document.getElementById('clock').textContent = timeFormatted;
            }

            // Update the clock every second
            setInterval(updateClock, 1000);

            // Initial update
            updateClock();

            var modalCall = '';
            var modalResponse = '';
            var modalClosed = '';

            function selectModal(departmentName) {
                var issue = departmentName;
                modalCall = new bootstrap.Modal(document.getElementById('modalCall' + issue.toString()));
                modalResponse = new bootstrap.Modal(document.getElementById('modalArrived' + issue.toString()));
                modalClosed = new bootstrap.Modal(document.getElementById('modalFinished' + issue.toString()));
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
                var pic_name = data[7];
                var pic_photo = data[8];

                // Menampilkan hasil parsing
                console.log("Status:", status);
                console.log("Zona ID:", zona_id);
                console.log("Department Name:", department_name);
                console.log("Line Name:", line_name);
                console.log("Zona Name:", zona_name);
                console.log("Transaction status:", transaction_status);
                console.log("pic:", pic_name);
                console.log("pic photo:", pic_photo);

                var departmentName = document.querySelectorAll('.department-name');
                var lineName = document.querySelectorAll('.line-name');
                var zonaName = document.querySelectorAll('.zona-name');
                var picName = document.querySelectorAll('.pic-name');
                var picPhoto = document.querySelectorAll('.pic-photo');
                var currentLineName = '{{ $line->name }}';

                selectModal(department_name.toString());

                if (line_name == currentLineName) {
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
                        playAudio();
                        setTimeout(function() {
                            modalCall.hide();
                            pauseAudio();
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
                        picName.forEach(function(element) {
                            element.textContent = pic_name;
                        });

                        modalCall.hide();
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
                        picName.forEach(function(element) {
                            element.textContent = pic_name;
                        });

                        modalResponse.hide();
                        modalClosed.show();
                        setTimeout(function() {
                            modalClosed.hide();
                        }, 15000);
                    }
                }
            });
        </script>
        @livewireScripts
    @endsection
</x-layout>

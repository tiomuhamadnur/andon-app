<x-layout bodyClass="g-sidenav-show bg-dark">
    @section('title')
        <title>Display Progress</title>
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
        <div class="card-body px-0 pb-2" style="background-color: white">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th
                                class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                NO
                            </th>
                            <th
                                class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                LINE
                            </th>
                            <th
                                class="text-center text-uppercase text-dark text-large font-weight-bolder opacity-7">
                                ZONE
                            </th>
                            <th
                                class="text-center text-uppercase text-dark text-large font-weight-bolder opacity-7 text-wrap">
                                CALL
                            </th>
                            <th
                                class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                STATE
                            </th>
                            <th
                                class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                                TIME
                            </th>
                        </tr>
                    </thead>
                    <tbody style="background-color: black">
                            <tr class="flashing-card-machine">
                                <td class="align-middle text-center">
                                    <span class="text-large white font-weight-bold">
                                        1
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        LS 1
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        ZONE 2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        MACHINE
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        CALLING
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-large white mb-0 font-weight-bold">
                                        08:00:00
                                    </span>
                                </td>
                            </tr>
                            <tr class="flashing-card-quality">
                                <td class="align-middle text-center">
                                    <span class="text-large white font-weight-bold">
                                        2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        LS 1
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        ZONE 2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        QUALITY
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        CALLING
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-large white mb-0 font-weight-bold">
                                        08:00:00
                                    </span>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="align-middle text-center">
                                    <span class="text-large white font-weight-bold">
                                        2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        LS 1
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        ZONE 2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        QUALITY
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        DONE
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-large white mb-0 font-weight-bold">
                                        08:00:00
                                    </span>
                                </td>
                            </tr>
                            <tr class="flashing-card-material">
                                <td class="align-middle text-center">
                                    <span class="text-large white font-weight-bold">
                                        2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        LS 1
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        ZONE 2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        MATERIAL
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        CALLING
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-large white mb-0 font-weight-bold">
                                        08:00:00
                                    </span>
                                </td>
                            </tr>
                            <tr class="">
                                <td class="align-middle text-center">
                                    <span class="text-large white font-weight-bold">
                                        2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        LS 1
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        ZONE 2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        SPV
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        DONE
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-large white mb-0 font-weight-bold">
                                        08:00:00
                                    </span>
                                </td>
                            </tr>
                                </td>
                            </tr>
                            <tr class="flashing-card-spv">
                                <td class="align-middle text-center">
                                    <span class="text-large white font-weight-bold">
                                        2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        LS 1
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        ZONE 2
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        SPV
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class=" text-large white font-weight-bold">
                                        CALLING
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-large white mb-0 font-weight-bold">
                                        08:00:00
                                    </span>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    </div>


    @section('javascript')
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
        </script>
    @endsection
</x-layout>

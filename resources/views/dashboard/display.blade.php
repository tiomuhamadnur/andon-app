<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    @section('title')
        <title>Display</title>
    @endsection
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Display"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4 d-flex justify-content-center align-item-stretch">
            <div class="row" id="cardsContainer">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card " data-index="0" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 1</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" data-index="1" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 2</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" data-index="2" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 3</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card" data-index="3" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 4</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
                    <div class="card" data-index="4" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 5</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
                    <div class="card" data-index="5" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 6</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
                    <div class="card" data-index="6" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 7</h2>
                                <p>Stand By</p>
                                <span class="live">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 mt-5">
                    <div class="card" data-index="7" data-container="1">
                        <div class="card-body box-container">
                            <div class="box-note">
                                <h2>Zone 8</h2>
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

    <script>
        document.getElementById('cardsContainer').addEventListener('click', function(event) {
            handleCardClick(event, 'box-note', 'if-report', 1);
        });

        function handleCardClick(event, containerClass, toggleClass, containerIndex) {
            var card = event.target.closest('.card');
            if (card) {
                var index = card.getAttribute('data-index');
                var container = card.getAttribute('data-container');
                if (container == containerIndex) {
                    toggleClassAtIndex(containerClass, toggleClass, index);
                }
            }
        }

        function toggleClassAtIndex(containerClass, toggleClass, index) {
            var elements = document.querySelectorAll('.' + containerClass);
            elements[index].classList.toggle(toggleClass);
        }
    </script>
</x-layout>

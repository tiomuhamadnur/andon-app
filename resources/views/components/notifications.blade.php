        @if (session('notify'))
            <script>
                $(document).ready(function() {
                    var buttonSuccess = document.getElementById('buttonSuccess');
                    buttonSuccess.click();
                })
            </script>
        @elseif (session('notifyerror'))
            <script>
                $(document).ready(function() {
                    var buttonError = document.getElementById('buttonError');
                    buttonError.click();
                })
            </script>
        @endif


        <div class="position-fixed top-1 end-1 z-index-2">
            <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast"
                aria-atomic="true">
                <div class="toast-header border-0">
                    <i class="material-icons text-success me-2">
                        check
                    </i>
                    <span class="me-auto font-weight-bold">Yeheey! </span>
                    <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                </div>
                <hr class="horizontal dark m-0">
                <div class="toast-body">
                    {{ session('notify') ?? '-' }}
                </div>
            </div>

            <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast"
                aria-atomic="true">
                <div class="toast-header border-0">
                    <i class="material-icons text-danger me-2">
                        campaign
                    </i>
                    <span class="me-auto text-gradient text-danger font-weight-bold">Wooops! </span>
                    <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
                </div>
                <hr class="horizontal dark m-0">
                <div class="toast-body">
                    {{ session('notifyerror') ?? '-' }}
                </div>
            </div>
        </div>

        <div class="row" hidden>
            <div class="col-lg-3 col-sm-6 col-12">
                <button id="buttonSuccess" class="btn bg-gradient-success w-100 mb-0 toast-btn" type="button"
                    data-target="successToast">Success</button>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                <button id="buttonError" class="btn bg-gradient-danger w-100 mb-0 toast-btn" type="button"
                    data-target="dangerToast">Danger</button>
            </div>
        </div>

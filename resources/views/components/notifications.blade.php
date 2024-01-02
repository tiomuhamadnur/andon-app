        @if (session('notify'))
            <script>
                $(document).ready(function() {
                    var modal = document.getElementById('successToast');
                    modal.classList.remove('hide');
                    modal.classList.add('show');
                })
            </script>
        @elseif (session('notifyerror'))
            <script>
                $(document).ready(function() {
                    var modal = document.getElementById('successToast');
                    modal.classList.remove('hide');
                    modal.classList.add('show');
                })
            </script>
        @endif


        <div class="position-fixed bottom-1 end-1 z-index-2">
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

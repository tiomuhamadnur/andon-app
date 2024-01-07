<div>
    <a href="{{ route('transaction.status.response') }}">
        <div class="card shadow-warning">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">flag</i>
                </div>
                <div class="text-end pt-4">
                    <h4 class="mb-0">{{ $response }} Request</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 bg-gradient-warning">
                <h6 class="mb-0 text-white">Response</h6>
            </div>
        </div>
    </a>
</div>

<div>
    <a href="{{ route('transaction.status.pending') }}">
        <div class="card shadow-dark">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">pause</i>
                </div>
                <div class="text-end pt-4">
                    <h4 class="mb-0">{{ $pending }} Request</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 bg-gradient-dark">
                <h6 class="mb-0 text-white">Pending</h6>
            </div>
        </div>
    </a>
</div>

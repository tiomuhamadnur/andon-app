<div>
    <a
        href="{{ route('transaction.filter', 'start_date=' . \Carbon\Carbon::now()->format('Y-m-d') . '&end_date=') . \Carbon\Carbon::now()->format('Y-m-d') }}">
        <div class="card shadow-success">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">book</i>
                </div>
                <div class="text-end pt-4">
                    <h4 class="mb-0">{{ $total }} Request</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 bg-gradient-info">
                <h6 class="mb-0 text-white">Total</h6>
            </div>
        </div>
    </a>
</div>

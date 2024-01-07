<div>
    <a href="{{ route('transaction.filter', 'status=Closed&department_id=' . auth()->user()->department->id) }}">
        <div class="card shadow-success">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">sports_score</i>
                </div>
                <div class="text-end pt-4">
                    <h4 class="mb-0">{{ $closed }} Request</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 bg-gradient-success">
                <h6 class="mb-0 text-white">Closed</h6>
            </div>
        </div>
    </a>
</div>

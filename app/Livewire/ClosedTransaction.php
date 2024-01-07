<?php

namespace App\Livewire;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class ClosedTransaction extends Component
{
    public function render()
    {
        $today = Carbon::now()->format('Y-m-d');
        $department = auth()->user()->department->id;
        $status = 'Closed';

        $closed = Transaction::whereDate('call_at', '>=', $today)
                            ->whereDate('call_at', '<=', $today)
                            ->where('department_id', $department)
                            ->where('status', $status)
                            ->count();
        return view('livewire.closed-transaction', compact(['closed']));
    }
}
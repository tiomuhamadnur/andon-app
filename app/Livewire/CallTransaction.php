<?php

namespace App\Livewire;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class CallTransaction extends Component
{
    public function render()
    {
        $today = Carbon::now()->format('Y-m-d');
        $department = auth()->user()->department->id;
        $status = 'Call';

        $call = Transaction::whereDate('call_at', '>=', $today)
                            ->whereDate('call_at', '<=', $today)
                            ->where('department_id', $department)
                            ->where('status', $status)
                            ->count();
        return view('livewire.call-transaction', compact(['call']));
    }
}
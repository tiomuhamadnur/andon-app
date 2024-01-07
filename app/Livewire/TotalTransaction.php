<?php

namespace App\Livewire;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class TotalTransaction extends Component
{
    public function render()
    {
        $today = Carbon::now()->format('Y-m-d');
        $department = auth()->user()->department->id;

        $total = Transaction::where('department_id', $department)
                            ->count();
        return view('livewire.total-transaction', compact(['total']));
    }
}

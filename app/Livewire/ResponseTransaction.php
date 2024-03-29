<?php

namespace App\Livewire;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class ResponseTransaction extends Component
{
    public function render()
    {
        $today = Carbon::now()->format('Y-m-d');
        $department = auth()->user()->department->id;
        $status = 'Response';

        $response = Transaction::where('department_id', $department)
                            ->where('status', $status)
                            ->count();
        return view('livewire.response-transaction', compact(['response']));
    }
}
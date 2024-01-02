<?php

namespace App\Exports;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExportExcel implements FromView
{
    public function view(): View
    {
        $transactions = Transaction::get();
        foreach ($transactions as $transaction) {
            $call_at = $transaction->call_at;
            $response_at = $transaction->response_at ?? $call_at;
            $closed_at = $transaction->closed_at;

            $call_at_carbon = Carbon::parse($call_at);
            $response_at_carbon = $response_at ? Carbon::parse($response_at) : 0;
            $closed_at_carbon = $closed_at ? Carbon::parse($closed_at) : 0;

            if ($response_at_carbon) {
                $response_duration = $call_at_carbon->diffInMinutes($response_at_carbon);

                $performace_duration = $closed_at_carbon ? $closed_at_carbon->diffInMinutes($response_at_carbon) : 0;

                $total_duration = $closed_at_carbon ? $call_at_carbon->diffInMinutes($closed_at_carbon) : 0;

                $transaction->response_duration = $response_duration;
                $transaction->performance_duration = $performace_duration;
                $transaction->total_duration = $total_duration;
            } else {
                $transaction->response_duration = 0;
                $transaction->performance_duration = 0;
                $transaction->total_duration = 0;
            }
        }

        return view('transaction.export.excel', [
            'transactions' => $transactions,
        ]);
    }
}
<?php

namespace App\Exports;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionFilterExport implements FromView
{
    public function __construct(?int $department_id = null, ?int $building_id = null, ?int $zona_id = null, ?int $line_id = null, ?int $process_id = null, ?string $status = null, ?string $start_date = null, ?string $end_date = null)
    {
        $this->department_id = $department_id;
        $this->building_id = $building_id;
        $this->zona_id = $zona_id;
        $this->line_id = $line_id;
        $this->process_id = $process_id;
        $this->status = $status;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    public function view(): View
    {
        $transactions = Transaction::query()
                ->select('transaction.*')
                ->join('device', 'device.id', '=', 'transaction.device_id');;

        // Filter by department_id
        $transactions->when($this->department_id, function ($query) {
            return $query->where('transaction.department_id', $this->department_id);
        });

        // Filter by building_id
        $transactions->when($this->building_id, function ($query) {
            return $query->where('device.building_id', $this->building_id);
        });

        // Filter by zona_id
        $transactions->when($this->zona_id, function ($query) {
            return $query->where('device.zona_id', $this->zona_id);
        });

        // Filter by line_id
        $transactions->when($this->line_id, function ($query) {
            return $query->where('device.line_id', $this->line_id);
        });

        // Filter by process_id
        $transactions->when($this->process_id, function ($query) {
            return $query->where('device.process_id', $this->process_id);
        });

        // Filter by status
        $transactions->when($this->status, function ($query) {
            return $query->where('status', $this->status);
        });

        // Filter by tanggal
        if ($this->start_date != null and $this->end_date != null) {
            $transactions->when($this->start_date, function ($query) {
                return $query->whereDate('call_at', '>=', $this->start_date);
            });
            $transactions->when($this->end_date, function ($query) {
                return $query->whereDate('call_at', '<=', $this->end_date);
            });
        }

        $transactions = $transactions->get();

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
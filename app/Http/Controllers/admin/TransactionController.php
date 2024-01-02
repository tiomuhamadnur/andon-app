<?php

namespace App\Http\Controllers\admin;

use App\Exports\TransactionExportExcel;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Device;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;

class TransactionController extends Controller
{
    public function index()
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


        $device = Device::all();
        $department = Department::all();
        return view('transaction.index', compact([
            'transactions',
            'device',
            'department',
        ]));
    }

    public function create()
    {
        //
    }

    public function excel()
    {
        $waktu = Carbon::now()->format('Ymd');
        return Excel::download(new TransactionExportExcel, $waktu . '_data report.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaction::create([
            'device_id' => $request->device_id,
            'department_id' => $request->department_id,
            'call_at' => Carbon::now(),
            'status' => 'Call',
        ]);
        return redirect()->route('transaction.index')->withNotify('Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function closed(Request $request)
    {
        $id = $request->id;
        $transaction = Transaction::findOrFail($id);
        if (!$transaction){
            return back()->withNotifyerror('Someting went wrong!');
        }

        $transaction->update([
            'closed_at' => Carbon::now(),
            'status' => 'Closed',
        ]);
        return redirect()->route('transaction.index')->withNotify('Data laporan panggilan berhasil di-closed');
    }

    public function response(Request $request)
    {
        $id = $request->id;
        $transaction = Transaction::findOrFail($id);
        if (!$transaction){
            return back()->withNotifyerror('Someting went wrong!');
        }

        $transaction->update([
            'response_at' => Carbon::now(),
            'status' => 'Response',
        ]);
        return redirect()->route('transaction.index')->withNotify('Data respon telah berhasil disimpan dalam laporan panggilan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

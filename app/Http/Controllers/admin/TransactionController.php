<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Device;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::all();
        $device = Device::all();
        $department = Department::all();
        return view('transaction.index', compact([
            'transaction',
            'device',
            'department',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
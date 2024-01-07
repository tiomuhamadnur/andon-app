<?php

namespace App\Http\Controllers\Api;

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
        //
    }

    public function call(Request $request)
    {
        $token = $request->token;
        $dept_id = $request->dept;
        $department = Department::where('id', $dept_id)->first();
        $device = Device::where('token', $token)->first();

        if((!$device) or (!$department)){
            $data = [
                'status' => 'NOT OK',
                'message' => 'something went wrong'
            ];
            return response()->json($data, 400);
        }

        $timestamp = now()->timestamp;
        $randomNumber = rand(1000, 9999);
        $ticketNumber = $timestamp . $randomNumber;

        Transaction::create([
            'ticket_number' => $ticketNumber,
            'device_id' => $device->id,
            'department_id' => $department->id,
            'call_at' => Carbon::now(),
            'status' => 'Call',
        ]);

        $data = [
                'status' => 'OK',
                'message' => 'data laporan berhasil ditambahkan'
            ];

        return response()->json($data, 201);
    }

    public function response(Request $request)
    {
        dd($request);
    }

    public function closed(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
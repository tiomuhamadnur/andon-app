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
                'status' => 'error',
                'message' => 'something went wrong'
            ];
            return response()->json($data, 400);
        }
        $cek = Transaction::where('device_id', $device->id)
                            ->whereIn('status', ['Call', 'Pending'])
                            ->count();

        if($cek > 0){
            $data = [
                'status' => 'error',
                'message' => 'request device_id ini masih berstatus "Call" atau "Pending", tidak bisa menambah request baru'
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
                'status' => 'ok',
                'message' => 'data laporan berhasil ditambahkan'
            ];

        return response()->json($data, 201);
    }

    public function check(Request $request)
    {
        $zona_id = $request->zona_id;

        $status = ['Call', 'Response', 'Closed'];
        $statusZona = [];

        foreach ($status as $item) {
            $count = Transaction::query()
                ->select('device.zona_id as zona_id', 'transaction.status as status')
                ->join('device', 'device.id', '=', 'transaction.device_id')
                ->where('zona_id', $zona_id)
                ->where('status', $item)
                ->count();

            $statusZona[$item] = $count;
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'statusZona' => $statusZona,
        ], 200)->header('Content-Type', 'application/json');
    }

    public function response(Request $request)
    {
        dd($request);
    }

    public function closed(Request $request)
    {
        dd($request);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class IotDeviceController extends Controller
{
    public function towerLight(Request $request)
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
        ], 200);
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

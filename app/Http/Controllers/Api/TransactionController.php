<?php

namespace App\Http\Controllers\Api;

use App\Events\RealtimeEvent;
use App\Events\StatusLiked;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Department;
use App\Models\Device;
use App\Models\Line;
use App\Models\Process;
use App\Models\Transaction;
use App\Models\Zona;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions()
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

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'data' => $transactions,
        ];

        return response()->json($data, 200);
    }

    public function filter(Request $request)
    {
        $department_id = $request->department_id;
        $building_id = $request->building_id;
        $zona_id = $request->zona_id;
        $line_id = $request->line_id;
        $process_id = $request->process_id;
        $status = $request->status;
        $start_date = $request->start_date;
        $end_date = $request->end_date ?? $start_date;

        $transactions = Transaction::query();

        // Filter by department_id
        $transactions->when($department_id, function ($query) use ($request) {
            return $query->where('department_id', $request->department_id);
        });

        // Filter by building_id
        $transactions->when($building_id, function ($query) use ($request) {
            return $query->where('building_id', $request->building_id);
        });

        // Filter by zona_id
        $transactions->when($zona_id, function ($query) use ($request) {
            return $query->where('zona_id', $request->zona_id);
        });

        // Filter by line_id
        $transactions->when($line_id, function ($query) use ($request) {
            return $query->where('line_id', $request->line_id);
        });

        // Filter by process_id
        $transactions->when($process_id, function ($query) use ($request) {
            return $query->where('process_id', $request->process_id);
        });

        // Filter by status
        $transactions->when($status, function ($query) use ($request) {
            return $query->where('status', $request->status);
        });

        // Filter by date
        if ($start_date != null and $end_date != null) {
            $transactions->when($start_date, function ($query) use ($request) {
                return $query->whereDate('call_at', '>=', $request->start_date);
            });
            $transactions->when($end_date, function ($query) use ($request) {
                return $query->whereDate('call_at', '<=', $request->end_date);
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

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'data' => $transactions,
        ];

        return response()->json($data, 200);
    }

    public function parameters()
    {
        $department = Department::all();
        $building = Building::all();
        $zona = Zona::all();
        $line = Line::all();
        $process = Process::all();
        $status = [
            'Call',
            'Response',
            'Pending',
            'Closed',
        ];

        $parameters = [
            'department' => $department,
            'building' => $building,
            'zona' => $zona,
            'line' => $line,
            'process' => $process,
            'status' => $status,
        ];

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'data' => $parameters,
        ];

        return response()->json($data, 200);
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

        $status = ['Call', 'Response', 'Pending', 'Closed'];
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

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'statusZona' => $statusZona,
        ];

        return response()->json($data)->header('Content-Type', 'application/json');
    }

    public function response(Request $request)
    {
        dd($request);
    }

    public function closed(Request $request)
    {
        dd($request);
    }

    public function testEvent()
    {
        $data = [
            'data1' => 123,
            'data2' => 456,
        ];

        event(new RealtimeEvent($data));

        return response()->json([
            'message' => 'Realtime event sent successfully'
        ]);
    }
}
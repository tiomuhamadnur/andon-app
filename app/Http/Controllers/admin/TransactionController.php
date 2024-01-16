<?php

namespace App\Http\Controllers\admin;

use App\Events\RealtimeEvent;
use App\Exports\TransactionExportExcel;
use App\Exports\TransactionFilterExport;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Department;
use App\Models\Device;
use App\Models\Equipment;
use App\Models\Line;
use App\Models\Process;
use App\Models\Transaction;
use App\Models\Zona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Event;

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
        $building = Building::all();
        $zona = Zona::all();
        $line = Line::all();
        $process = Process::all();

        return view('transaction.transaction', compact([
            'transactions',
            'device',
            'department',
            'building',
            'zona',
            'line',
            'process',
        ]));
    }

    public function status_call()
    {
        $transactions = Transaction::where('status', 'Call')
                            ->where('department_id', auth()->user()->department->id)
                            ->get();

        return view('transaction.call', compact([
            'transactions',
        ]));
    }

    public function status_response()
    {
        $transactions = Transaction::where('status', 'Response')
                            ->where('department_id', auth()->user()->department->id)
                            ->get();

        return view('transaction.response', compact([
            'transactions',
        ]));
    }

    public function status_pending()
    {
        $transactions = Transaction::where('status', 'Pending')
                            ->where('department_id', auth()->user()->department->id)
                            ->get();

        return view('transaction.pending', compact([
            'transactions',
        ]));
    }

    public function excel(Request $request)
    {
        $department_id = $request->department_id;
        $building_id = $request->building_id;
        $zona_id = $request->zona_id;
        $line_id = $request->line_id;
        $process_id = $request->process_id;
        $status = $request->status;
        $start_date = $request->start_date;
        $end_date = $request->end_date ?? $start_date;

        $waktu = Carbon::now()->format('Ymd');

        if ($department_id == null and $building_id == null and $zona_id == null and $line_id == null and $process_id == null and $status == null and $start_date == null and $end_date == null) {
            return Excel::download(new TransactionExportExcel, $waktu . '_data report.xlsx');
        } else {
            return Excel::download(new TransactionFilterExport($department_id, $building_id, $zona_id, $line_id, $process_id, $status, $start_date, $end_date), $waktu . '_data report (filtered).xlsx');
        }
    }
    public function store(Request $request)
    {
        $department_id = $request->department_id;
        $device_id = $request->device_id;
        $department = Department::findOrFail($department_id);
        $device = Device::findOrFail($device_id);

        $cek = Transaction::where('device_id', $device->id)
                            ->whereIn('status', ['Call', 'Pending'])
                            ->count();

        if($cek > 0){
            return redirect()->route('transaction.index')->withNotifyerror('Request dari Device ini masih berstatus "Call" atau "Pending", tidak bisa menambah request baru');
        }

        $timestamp = now()->timestamp;
        $randomNumber = rand(1000, 9999);
        $ticketNumber = $timestamp . $randomNumber;

        Transaction::create([
            'ticket_number' => $ticketNumber,
            'device_id' => $request->device_id,
            'department_id' => $request->department_id,
            'call_at' => Carbon::now(),
            'status' => 'Call',
        ]);
        return redirect()->route('transaction.index')->withNotify('Data saved successfully');
    }

    public function closed(Request $request)
    {
        $id = $request->id;
        $transaction = Transaction::findOrFail($id);
        if (!$transaction){
            return back()->withNotifyerror('Someting went wrong!');
        }

        if ($request->hasFile('photo') && $request->photo != '' && $request->hasFile('photo_closed') && $request->photo_closed != '') {
            $photo = $request->file('photo')->store('photo');
            $photo_closed = $request->file('photo_closed')->store('photo-closed');
            $transaction->update([
                'closed_at' => Carbon::now(),
                'status' => 'Closed',
                'equipment_id' => $request->equipment_id,
                'remark' => $request->remark,
                'photo' => $photo,
                'photo_closed' => $photo_closed,
            ]);
        } else {
            $transaction->update([
                'closed_at' => Carbon::now(),
                'status' => 'Closed',
                'equipment_id' => $request->equipment_id,
                'remark' => $request->remark,
            ]);
        }

        $zona_id = $transaction->device->zona->id;

        $this->sendEvent($zona_id);

        return redirect()->route('transaction.index')->withNotify('Data laporan panggilan berhasil di-closed');
    }

    public function response(Request $request)
    {
        $this->validate($request, [
            'id' => ['required'],
            'status' => ['required'],
        ]);

        $id = $request->id;
        $transaction = Transaction::findOrFail($id);

        if (!$transaction){
            return back()->withNotifyerror('Someting went wrong!');
        }
        $zona_id = $transaction->device->zona->id;
        $status = $request->status;
        $response_at = Carbon::now();

        if($status == 'Pending'){
            $response_at = null;
        }

        $transaction->update([
            'response_at' => $response_at,
            'status' => $status,
            'pending_reason' => $request->pending_reason,
            'pic_id' => auth()->user()->id,
        ]);

        $this->sendEvent($zona_id);

        if($status == 'Pending'){
            return redirect()->route('transaction.status.pending')->withNotify('Data request masuk ke dalam list pending, jangan lupa untuk ditindak lanjuti');
        }

        return redirect()->route('transaction.status.response')->withNotify('Data respon telah berhasil disimpan dalam laporan panggilan');
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

        $device = Device::all();
        $department = Department::all();
        $building = Building::all();
        $zona = Zona::all();
        $line = Line::all();
        $process = Process::all();

        return view('transaction.transaction', [
            'transactions' => $transactions,
            'device' => $device,
            'department' => $department,
            'building' => $building,
            'zona' => $zona,
            'line' => $line,
            'process' => $process,
            'department_id' => $department_id,
            'building_id' => $building_id,
            'zona_id' => $zona_id,
            'line_id' => $line_id,
            'process_id' => $process_id,
            'status' => $status,
        ]);
    }

    public function detail_response(string $id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $transaction = Transaction::findOrFail($secret);
            $status = $transaction->status;

            if($status == 'Call' or $status == 'Pending'){
                return view('transaction.detail.response', compact(['transaction']));
            }
            elseif($status == 'Response'){
                $equipment = Equipment::all();
                return view('transaction.detail.closed', compact(['transaction', 'equipment']));
            }
            else{
                return redirect()->route('dashboard')->withNotifyerror('Data request already solved & completed');
            }
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function standby()
    {
        return view('transaction.standby');
    }

    public function sendEvent($zona_id)
    {
        $status = ['Call', 'Response', 'Pending', 'Closed'];
        $statusZona = [];

        foreach ($status as $item) {
            $count = Transaction::query()
                ->select('device.zona_id as zona_id', 'transaction.status as status')
                ->join('device', 'device.id', '=', 'transaction.device_id')
                ->where('zona_id', $zona_id)
                ->where('status', $item)
                ->count();

            $statusZona[] = $count;
        }

        $data = [
            'ok',
            $zona_id,
            $statusZona,
        ];

        Event::dispatch(new RealtimeEvent($data));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Events\RealtimeEvent;
use App\Events\StatusLiked;
use App\Helpers\WhatsAppHelper;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Department;
use App\Models\Device;
use App\Models\Line;
use App\Models\Pegawai;
use App\Models\Process;
use App\Models\Settings;
use App\Models\Transaction;
use App\Models\Zona;
use App\Models\Equipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNotificationMail;

class TransactionController extends Controller
{
    public function transactions()
    {
        $transactions = Transaction::paginate(50);

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

    public function transaction(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $request->id;
        $transactions = Transaction::find($id);

        if(!$transactions)
        {
            $data = [
                'status' => 'error',
                'message' => 'data tidak ditemukan',
                'data' => [],
            ];

            return response()->json($data, 400);
        }

        $call_at = $transactions->call_at;
        $response_at = $transactions->response_at ?? $call_at;
        $closed_at = $transactions->closed_at;

        $call_at_carbon = Carbon::parse($call_at);
        $response_at_carbon = $response_at ? Carbon::parse($response_at) : 0;
        $closed_at_carbon = $closed_at ? Carbon::parse($closed_at) : 0;

        if ($response_at_carbon) {
            $response_duration = $call_at_carbon->diffInMinutes($response_at_carbon);

            $performace_duration = $closed_at_carbon ? $closed_at_carbon->diffInMinutes($response_at_carbon) : 0;

            $total_duration = $closed_at_carbon ? $call_at_carbon->diffInMinutes($closed_at_carbon) : 0;

            $transactions->response_duration = $response_duration;
            $transactions->performance_duration = $performace_duration;
            $transactions->total_duration = $total_duration;
        } else {
            $transactions->response_duration = 0;
            $transactions->performance_duration = 0;
            $transactions->total_duration = 0;
        }

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'data' => $transactions,
        ];

        return response()->json($data, 200);
    }

    public function ticketNumber(Request $request)
    {
        $request->validate([
            'ticket_number' => 'required',
        ]);

        $ticket_number = $request->ticket_number;
        $transactions = Transaction::where('ticket_number', $ticket_number)->first();

        if(!$transactions)
        {
            $data = [
                'status' => 'error',
                'message' => 'data tidak ditemukan',
                'data' => null,
            ];

            return response()->json($data, 400);
        }

        $call_at = $transactions->call_at;
        $response_at = $transactions->response_at ?? $call_at;
        $closed_at = $transactions->closed_at;

        $call_at_carbon = Carbon::parse($call_at);
        $response_at_carbon = $response_at ? Carbon::parse($response_at) : 0;
        $closed_at_carbon = $closed_at ? Carbon::parse($closed_at) : 0;

        if ($response_at_carbon) {
            $response_duration = $call_at_carbon->diffInMinutes($response_at_carbon);

            $performace_duration = $closed_at_carbon ? $closed_at_carbon->diffInMinutes($response_at_carbon) : 0;

            $total_duration = $closed_at_carbon ? $call_at_carbon->diffInMinutes($closed_at_carbon) : 0;

            $transactions->response_duration = $response_duration;
            $transactions->performance_duration = $performace_duration;
            $transactions->total_duration = $total_duration;
        } else {
            $transactions->response_duration = 0;
            $transactions->performance_duration = 0;
            $transactions->total_duration = 0;
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

        $transactions = $transactions->paginate(50);

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

    public function call(Request $request)
    {
        $device_id = $request->device_id;
        $department_id = $request->department_id;

        $department = Department::find($department_id);
        $device = Device::find($device_id);

        if((!$device) or (!$department)){
            $data = [
                'status' => 'error',
                'message' => 'bad request'
            ];
            return response()->json($data, 400);
        }

        $validate = Settings::where('code', 'APP_MODE')->first()->value;

        if($validate == 1)
        {
            $this->check_transaction($device_id, $department_id);
            $data = [
                'status' => 'ok',
                'mode' => 'all responses from remote only',
                'message' => 'data laporan berhasil ditambahkan'
            ];
            return response()->json($data, 201);
        }
        else
        {
            $cek = Transaction::where('device_id', $device->id)
                                ->where('department_id', $department->id)
                                ->whereIn('status', ['Call', 'Pending', 'Response'])
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

            $transaction = Transaction::create([
                'ticket_number' => $ticketNumber,
                'device_id' => $device->id,
                'department_id' => $department->id,
                'call_at' => Carbon::now(),
                'status' => 'Call',
            ]);

            $zona_id = $transaction->device->zona->id;
            $transaction_id = $transaction->id;

            $data = [$zona_id, $transaction_id];

            $this->sendEvent($data);

            $notifWA = Settings::where('code', 'NOTIF_WA')->first()->value;
            $notifEmail = Settings::where('code', 'NOTIF_EMAIL')->first()->value;

            $department_id = $transaction->department->id;
            $building_id = $transaction->device->building->id;

            if($notifWA == 1)
            {
                $users = Pegawai::where('department_id', $department_id)
                                ->where('building_id', $building_id)
                                ->get();

                foreach($users as $user)
                {
                    $data = [
                        $user->gender,
                        $user->name,
                        $user->department->name,
                        Carbon::parse($transaction->call_at)->format("d-m-Y"),
                        Carbon::parse($transaction->call_at)->format("H:m:s"),
                        $transaction->device->building->name,
                        $transaction->device->line->name,
                        $transaction->device->zona->name,
                        $transaction->device->process->name,
                        'https://andon-app.tideupindustries.com/transaction/' . Crypt::encryptString($transaction_id) . '/detail-response',
                    ];

                    $message = $this->formatMessage($data);
                    WhatsAppHelper::sendNotification($user->phone, $message);
                }
            }

            if($notifEmail == 1)
            {
                $users = Pegawai::where('department_id', $department_id)
                                        ->where('building_id', $building_id)
                                        ->get();
                $this->sendNotificationMail($users, $transaction_id);
            }

            $data = [
                    'status' => 'ok',
                    'message' => 'data laporan berhasil ditambahkan'
                ];

            return response()->json($data, 201);
        }
    }

    public function response(Request $request)
    {
        $request->validate([
            'id'  => 'required',
            'status' => 'required',
        ]);

        $id = $request->id;
        $status = $request->status;
        $pending_reason = $request->pending_reason ?? '';

        $transaction = Transaction::where('id', $id)->whereIn('status', ['Call', 'Pending'])->first();
        $response_at = Carbon::now();

        if(!$transaction)
        {
            $data = [
                'status' => 'error',
                'message' => 'data tidak ditemukan atau karena sudah berstatus Response atau Closed',
                'data' => null,
            ];

            return response()->json($data, 400);
        }

        if($status == 'Pending')
        {
            $response_at = null;
        }

        $transaction->update([
            'pic_id' => auth()->user()->id,
            'status' => $status,
            'response_at' => $response_at,
            'pending_reason' => $pending_reason,
        ]);

        $data = [
            $transaction->device->zona->id,
            $transaction->id,
        ];

        $this->sendEventAuth($data);

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil diupdate',
        ];

        return response()->json($data, 200);
    }

    public function closed(Request $request)
    {
        $request->validate([
            'id'  => 'required|numeric',
            'photo'=> 'image',
            'photo_closed' => 'image',
        ]);

        $id = $request->id;
        $equipment_id = $request->equipment_id ?? '';
        $remark = $request->remark ?? '';

        $transaction = Transaction::where('id', $id)->where('status', 'Response')->first();
        $closed_at = Carbon::now();

        if(!$transaction)
        {
            $data = [
                'status' => 'error',
                'message' => 'data tidak ditemukan atau karena tidak berstatus Response',
                'data' => null,
            ];

            return response()->json($data, 400);
        }

        if ($equipment_id != '' && $request->hasFile('photo') && $request->photo != '' && $request->hasFile('photo_closed') && $request->photo_closed != '')
        {
            $equipment = Equipment::find($equipment_id);
            if(!$equipment)
            {
                $data = [
                    'status' => 'error',
                    'message' => 'data equipment tidak ditemukan',
                    'data' => null,
                ];
                return response()->json($data, 400);
            }

            $photo = $request->file('photo')->store('photo');
            $photo_closed = $request->file('photo_closed')->store('photo-closed');
            $transaction->update([
            'pic_id' => auth()->user()->id,
            'status' => 'Closed',
            'closed_at' => $closed_at,
            'equipment_id' => $equipment_id,
            'photo' => $photo,
            'photo_closed' => $photo_closed,
            'remark' => $remark,
        ]);
        }
        else
        {
            $transaction->update([
                'pic_id' => auth()->user()->id,
                'status' => 'Closed',
                'closed_at' => $closed_at,
            ]);
        }

        $data = [
            $transaction->device->zona->id,
            $transaction->id,
        ];

        $this->sendEventAuth($data);

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil diupdate',
        ];

        return response()->json($data, 200);
    }

    public function check_initial(Request $request)
    {
        $zona_id = $request->zona_id;


        $data = [
            $zona_id,
            '',
        ];

        $this->sendEvent($data);

        return response()->json([
            'status' => 'ok',
            'message' => 'data initial request berhasil didapatkan',
        ])->header('Content-Type', 'application/json');
    }

    public function sendEventAuth($data)
    {
        $zona_id = (int)$data[0];
        $transaction_id = (int)$data[1];
        $status = ['Call', 'Response', 'Pending', 'Closed'];
        $statusZona = [];
        $transaction = Transaction::findOrFail($transaction_id);

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
            $transaction->department->name,
            $transaction->device->zona->name,
            $transaction->device->line->name,
            $transaction->status,
            auth()->user()->name,
            asset('storage/' . auth()->user()->photo),
        ];

        Event::dispatch(new RealtimeEvent($data));
    }

    public function sendEvent($data)
    {
        $zona_id = (int)$data[0];
        $transaction_id = (int)$data[1];
        $status = ['Call', 'Response', 'Pending', 'Closed'];
        $statusZona = [];
        $transaction = Transaction::find($transaction_id);

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
            $transaction->department->name ?? '',
            $transaction->device->zona->name ?? '',
            $transaction->device->line->name ?? '',
            $transaction->status ?? '',
            $transaction->department->name ?? 'Your' . ' Team',
            asset('assets/img/technician.png'),
        ];

        Event::dispatch(new RealtimeEvent($data));
    }

    public function formatMessage(array $data)
    {
        $enter = "\n";
        $div = '=============================';

        $mode = "*CALLING*";
        $gender = $data[0];
        $name = $data[1];
        $department = strtoupper($data[2]);
        $date = $data[3];
        $time = $data[4];
        $building = $data[5];
        $line = $data[6];
        $zone = $data[7];
        $process = $data[8];
        $url = $data[9];

        $message = '🔴 *ANDON NOTIFICATION:* ' . $mode . $enter . $enter . $enter .
        'Dear ' . $gender .' *' . $name . '*,' . $enter . $enter.
        'Sebagai informasi, terdapat ' . $mode . ' untuk tim *' . $department . '* yang perlu ditindak lanjuti dengan detail informasi sebagai berikut:' . $enter . $enter .

        $div . $enter . $enter .

        '*Tanggal :*' . $enter.
        $date . $enter . $enter .

        '*Waktu :*' . $enter .
        $time . $enter . $enter .

        '*Building :*' . $enter .
        $building . $enter . $enter .

        '*Line :*' . $enter .
        $line . $enter . $enter .

        '*Zone :*' . $enter .
        $zone . $enter . $enter .

        '*Process :*' . $enter .
        $process . $enter . $enter .

        '*URL :*' . $enter .
        $url . $enter . $enter .
        $div . $enter . $enter .

        '_Regards,_' . $enter . $enter .
        '*ExoBOT*' .
        $enter . $enter . $enter . $enter;

        return $message;
    }

    public function check_transaction($device_id, $department_id)
    {
        $transaction = Transaction::where('device_id', $device_id)
                    ->where('department_id', $department_id)
                    ->orderBy('created_at', 'DESC')
                    ->first();

        $status = $transaction->status;
        $now = Carbon::now();

        if($status == 'Call')
        {
            $transaction->update([
                'status' => 'Response',
                'response_at' => $now,
            ]);

            $data = [$transaction->device->zona->id, $transaction->id];

            $this->sendEvent($data);

            $data = [
                'status' => 'ok',
                'message' => 'data berhasil diupdate, status Response',
            ];

            return response()->json($data, 200);
        }
        elseif($status == 'Response')
        {
            $transaction->update([
                'status' => 'Closed',
                'closed_at' => $now,
            ]);

            $data = [$transaction->device->zona->id, $transaction->id];

            $this->sendEvent($data);

            $data = [
                'status' => 'ok',
                'message' => 'data berhasil diupdate, status Closed',
            ];

            return response()->json($data, 200);
        }
        elseif($status == 'Closed')
        {
            $timestamp = now()->timestamp;
            $randomNumber = rand(1000, 9999);
            $ticketNumber = $timestamp . $randomNumber;

            $transaction = Transaction::create([
                'ticket_number' => $ticketNumber,
                'device_id' => $device_id,
                'department_id' => $department_id,
                'call_at' => Carbon::now(),
                'status' => 'Call',
            ]);

            $zona_id = $transaction->device->zona->id;
            $transaction_id = $transaction->id;

            $data = [$zona_id, $transaction_id];

            $this->sendEvent($data);

            $notifWA = Settings::where('code', 'NOTIF_WA')->first()->value;
            $notifEmail = Settings::where('code', 'NOTIF_EMAIL')->first()->value;

            $department_id = $transaction->department_id;
            $building_id = $transaction->device->building->id;

            if($notifWA == 1)
            {
                $users = Pegawai::where('department_id', $department_id)
                                ->where('building_id', $building_id)
                                ->get();

                foreach($users as $user)
                {
                    $data = [
                        $user->gender,
                        $user->name,
                        $user->department->name,
                        Carbon::parse($transaction->call_at)->format("d-m-Y"),
                        Carbon::parse($transaction->call_at)->format("H:m:s"),
                        $transaction->device->building->name,
                        $transaction->device->line->name,
                        $transaction->device->zona->name,
                        $transaction->device->process->name,
                        '-',
                    ];

                    $message = $this->formatMessage($data);
                    WhatsAppHelper::sendNotification($user->phone, $message);
                }
            }

            if($notifEmail == 1)
            {
                $users = Pegawai::where('department_id', $department_id)
                                ->where('building_id', $building_id)
                                ->get();
                $this->sendNotificationMail($users, $transaction_id);
            }

            $data = [
                    'status' => 'ok',
                    'message' => 'data laporan berhasil ditambahkan'
                ];

            return response()->json($data, 201);
        }
        else
        {
            $data = [
                'status' => 'error',
                'message' => 'something went wrong',
            ];
            return response()->json($data, 400);

        }
    }

    public function sendNotificationMail($users, int $transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        if($transaction)
        {
            foreach($users as $user)
            {
                $data = [
                    'gender' => $user->gender ?? 'Bapak/Ibu',
                    'name' => $user->name,
                    'department' => $transaction->department->name,
                    'date' => Carbon::parse($transaction->call_at)->format("d-m-Y"),
                    'time' => Carbon::parse($transaction->call_at)->format("H:m:s"),
                    'building' => $transaction->device->building->name,
                    'line' => $transaction->device->line->name,
                    'zona' => $transaction->device->zona->name,
                    'process' => $transaction->device->process->name,
                    'url' => 'https://andon-app.tideupindustries.com/transaction/' . Crypt::encryptString($transaction_id) . '/detail-response',
                ];
                Mail::to($user->email)->send(new SendNotificationMail($data));
            }
        }
    }
}

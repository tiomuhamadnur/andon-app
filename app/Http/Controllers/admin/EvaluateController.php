<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Pegawai;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    public function index()
    {
        $users = Pegawai::orderBy('name', 'ASC')->get();
        $equipments = Equipment::orderBy('name', 'ASC')->get();

        if(auth()->user()->role->id != 1)
        {
            $users = Pegawai::where('department_id', auth()->user()->department->id)
                            ->orderBy('name', 'ASC')
                            ->get();
            $equipments = Equipment::where('department_id', auth()->user()->department->id)
                            ->orderBy('name', 'ASC')
                            ->get();
        }

        return view('evaluate.index', compact(['users', 'equipments']));
    }

    public function create()
    {
        //
    }

    public function filter(Request $request)
    {
        $mode = $request->mode;
        $user_id = $request->user_id;
        $equipment_id = $request->equipment_id;
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date) ?? $start_date;
        $work_duration_perday = $request->work_duration_perday;
        $work_day_perweek = $request->work_day_perweek;
        $work_duration_perday = $work_duration_perday * 60;
        $unit = $request->unit;

        if($user_id)
        {
            $user = Pegawai::findOrFail($user_id);
        }
        if($equipment_id)
        {
            $equipment = Equipment::findOrFail($equipment_id);
        }

        $count_workDays = 0;

        if($work_day_perweek == 5)
        {
            while ($start_date <= $end_date) {
                if ($start_date->dayOfWeek !== Carbon::SATURDAY && $start_date->dayOfWeek !== Carbon::SUNDAY) {
                    $count_workDays++;
                }
                $start_date->addDay();
            }
        }
        else
        {
            while ($start_date <= $end_date) {
                $count_workDays++;
                $start_date->addDay();
            }
        }

        $totalOperatingTime = $count_workDays * $work_duration_perday;

        $transactions = Transaction::query();

        // Filter by user_id
        $transactions->when($user_id, function ($query) use ($request) {
            return $query->where('pic_id', $request->user_id);
        });

        // Filter by equipment_id
        $transactions->when($equipment_id, function ($query) use ($request) {
            return $query->where('equipment_id', $request->equipment_id);
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

        // dd($transactions);

        $totalTransactions = $transactions->count();
        if($totalTransactions == 0)
        {
            return redirect()->route('evaluate.index')->withNotifyerror('No data found');
        }
        $sumResponseDuration = $transactions->sum('response_duration');
        $sumPerformanceDuration = $transactions->sum('performance_duration');
        $sumTotalDownDuration = $transactions->sum('total_duration');

        if ($unit === 'hour') {
            $sumResponseDuration /= 60;
            $sumPerformanceDuration /= 60;
            $sumTotalDownDuration /= 60;
            $totalOperatingTime /= 60;
        }

        $mttr = $sumTotalDownDuration/$totalTransactions;
        $mtbf = ($totalOperatingTime - $sumTotalDownDuration)/$totalTransactions;
        $failureRate = 1/$mtbf;
        $repairRate = 1/$mttr;
        $reliability = $totalOperatingTime/($totalOperatingTime + $sumTotalDownDuration);
        $availability = $mtbf/($mtbf + $mttr);

        if($mode == 'equipment')
        {
            return view('evaluate.aspect.equipment', [
                'mode' => $mode,
                'user' => $user ?? null,
                'equipment' => $equipment ?? null,
                'total_transactions' => $totalTransactions,
                'total_working_day' => $count_workDays,
                'total_operating_time' => number_format($totalOperatingTime, 2),
                'sum_response_duration' => number_format($sumResponseDuration, 2),
                'sum_performance_duration' => number_format($sumPerformanceDuration, 2),
                'sum_total_down_duration' => number_format($sumTotalDownDuration, 2),
                'sum_total_up_duration' => number_format($totalOperatingTime - $sumTotalDownDuration, 2),
                'mttr' => number_format($mttr, 2),
                'mtbf' => number_format($mtbf, 2),
                'failure_rate' => number_format(($failureRate), 2),
                'repair_rate' => number_format(($repairRate), 2),
                'reliability' => number_format($reliability * 100, 2),
                'availability' => number_format($availability * 100, 2),
                'unit' => $unit,
            ]);
        }
        else
        {
            return view('evaluate.aspect.user', [
                'mode' => $mode,
                'user' => $user ?? null,
                'equipment' => $equipment ?? null,
                'total_transactions' => $totalTransactions,
                'total_working_day' => $count_workDays,
                'total_operating_time' => number_format($totalOperatingTime, 2),
                'sum_response_duration' => number_format($sumResponseDuration, 2),
                'sum_performance_duration' => number_format($sumPerformanceDuration, 2),
                'sum_total_down_duration' => number_format($sumTotalDownDuration, 2),
                'sum_total_up_duration' => number_format($totalOperatingTime - $sumTotalDownDuration, 2),
                'mttr' => number_format($mttr, 2),
                'mtbf' => number_format($mtbf, 2),
                'failure_rate' => number_format(($failureRate), 2),
                'repair_rate' => number_format(($repairRate), 2),
                'reliability' => number_format($reliability * 100, 2),
                'availability' => number_format($availability * 100, 2),
                'unit' => $unit,
            ]);
        }
    }

    public function evaluate(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
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

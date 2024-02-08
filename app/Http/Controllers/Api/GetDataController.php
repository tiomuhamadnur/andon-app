<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Button;
use App\Models\Department;
use App\Models\Equipment;
use App\Models\Line;
use App\Models\Process;
use App\Models\Settings;
use App\Models\Zona;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function app()
    {
        $appName = Settings::where('code', 'APP_NAME')->first()->value;
        $appLogo = Settings::where('code', 'APP_LOGO')->first()->value;

        if(!$appName and !$appLogo)
        {
            $data = [
                'status' => 'error',
                'message' => 'data tidak ditemukan',
                'data' => null,
            ];

            return response()->json($data, 400);
        }

        $data = [
            'app_name' => $appName,
            'app_logo' => asset('storage/' . $appLogo),
        ];

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'data' => $data,
        ];

        return response()->json($data, 200);
    }

    public function equipments(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
        ]);

        $department_id = $request->department_id;
        $equipments = Equipment::where('department_id', $department_id)->get();

        if($equipments->count() == 0)
        {
            $data = [
                'status' => 'error',
                'message' => 'data tidak ditemukan',
                'data' => null,
            ];

            return response()->json($data, 400);
        }

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'data' => $equipments,
        ];

        return response()->json($data, 200);
    }

    public function equipment(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'code' => 'required',
        ]);

        $department_id = $request->department_id;
        $code = $request->code;

        $equipment = Equipment::where('department_id', $department_id)->where('code', $code)->first();

        if(!$equipment)
        {
            $data = [
                'status' => 'error',
                'message' => 'data tidak ditemukan',
                'data' => null,
            ];

            return response()->json($data, 400);
        }

        $data = [
            'status' => 'ok',
            'message' => 'data berhasil didapatkan',
            'data' => $equipment,
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
}
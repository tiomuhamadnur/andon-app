<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Device;
use App\Models\Line;
use App\Models\Process;
use App\Models\Section;
use App\Models\Zona;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function index()
    {
        $device = Device::all();
        $building = Building::all();
        $line = Line::all();
        $section = Section::all();
        $zona = Zona::all();
        $process = Process::all();
        return view('admin.masterdata.device.index', compact([
            'device',
            'building',
            'line',
            'section',
            'zona',
            'process',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $token = Str::random(15);
        Device::create([
            'name' => $request->name,
            'code' => $request->code,
            'token' => $token,
            'process_id' => $request->process_id,
            'building_id' => $request->building_id,
            'zona_id' => $request->zona_id,
            'department_id' => $request->department_id,
            'section_id' => $request->section_id,
            'line_id' => $request->line_id,
        ]);

        return redirect()->route('device.index')->withNotify('Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $device = Device::findOrFail($secret);
            $building = Building::all();
            $line = Line::all();
            $section = Section::all();
            $zona = Zona::all();
            $process = Process::all();
            return view('admin.masterdata.device.edit', compact([
                'device',
                'building',
                'line',
                'section',
                'zona',
                'process',
            ]));
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $device = Device::findOrFail($id);
        $device->update([
            'name' => $request->name,
            'code' => $request->code,
            'process_id' => $request->process_id,
            'building_id' => $request->building_id,
            'zona_id' => $request->zona_id,
            'department_id' => $request->department_id,
            'section_id' => $request->section_id,
            'line_id' => $request->line_id,
        ]);
        return redirect()->route('device.index')->withNotify('Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
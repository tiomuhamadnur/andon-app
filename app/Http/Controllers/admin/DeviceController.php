<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Device;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function index()
    {
        $device = Device::all();
        $building = Building::all();
        $zona = Zona::all();
        return view('admin.masterdata.device.index', compact([
            'device',
            'building',
            'zona',
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
            'process' => $request->process,
            'building_id' => $request->building_id,
            'zona_id' => $request->zona_id,
            'department_id' => $request->department_id,
            'section_id' => $request->section_id,
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
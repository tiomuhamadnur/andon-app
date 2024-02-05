<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::all();
        $department = Department::all();
        return view('admin.masterdata.equipment.index', compact(['equipment', 'department']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Equipment::create([
            'name' => $request->name,
            'code' => $request->code,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('equipment.index')->withNotify('Data saved successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $equipment = Equipment::findOrFail($id);
        $department = Department::all();

        return view('admin.masterdata.equipment.update', compact(['equipment', 'department']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $equipment = Equipment::findOrFail($id);
        $equipment->update([
            'name' => $request->name,
            'code' => $request->code,
            'department_id' => $request->department_id,
        ]);
        return redirect()->route('equipment.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();
        return redirect()->route('equipment.index')->withNotify('Data deleted successfully');
    }
}
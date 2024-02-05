<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $building = Building::all();
        return view('admin.masterdata.building.index', compact(['building']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Building::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('building.index')->withNotify('Data saved successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $building = Building::findOrFail($id);
        $building->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('building.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $building = Building::findOrFail($id);
        $building->delete();
        return redirect()->route('building.index')->withNotify('Data deleted successfully');
    }
}

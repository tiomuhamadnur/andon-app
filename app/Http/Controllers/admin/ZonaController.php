<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function index()
    {
        $zona = Zona::all();
        return view('admin.masterdata.zona.index', compact(['zona']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Zona::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('zona.index')->withNotify('Data saved successfully');
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
        $zona = Zona::findOrFail($id);
        $zona->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('zona.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $zona = Zona::findOrFail($id);
        $zona->delete();
        return redirect()->route('zona.index')->withNotify('Data deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('admin.masterdata.jabatan.index', compact(['jabatan']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Jabatan::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('jabatan.index')->withNotify('Data saved successfully');
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
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('jabatan.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return redirect()->route('jabatan.index')->withNotify('Data deleted successfully');
    }
}
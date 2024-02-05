<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $process = Process::all();
        return view('admin.masterdata.process.index', compact(['process']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Process::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('process.index')->withNotify('Data saved successfully');
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
        $process = Process::findOrFail($id);
        $process->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('process.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $process = Process::findOrFail($id);
        $process->delete();
        return redirect()->route('process.index')->withNotify('Data deleted successfully');
    }
}

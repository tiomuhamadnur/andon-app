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
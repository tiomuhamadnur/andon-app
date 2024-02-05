<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Line;
use Illuminate\Http\Request;

class LineController extends Controller
{
    public function index()
    {
        $line = Line::all();
        return view('admin.masterdata.line.index', compact(['line']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Line::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('line.index')->withNotify('Data saved successfully');
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
        $line = Line::findOrFail($id);
        $line->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('line.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $line = Line::findOrFail($id);
        $line->delete();
        return redirect()->route('line.index')->withNotify('Data deleted successfully');
    }
}
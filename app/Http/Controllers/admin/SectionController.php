<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::all();
        $department = Department::all();
        return view('admin.masterdata.section.index', compact(['section', 'department']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Section::create([
            'name' => $request->name,
            'code' => $request->code,
            'department_id' => $request->department_id,
        ]);
        return redirect()->route('section.index')->withNotify('Data saved successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $section = Section::findOrFail($id);
        $department = Department::all();

        return view('admin.masterdata.section.update', compact(['section', 'department']));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $section = Section::findOrFail($id);
        $section->update([
            'name' => $request->name,
            'code' => $request->code,
            'department_id' => $request->department_id,
        ]);
        return redirect()->route('section.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $section = Section::findOrFail($id);
        $section->delete();
        return redirect()->route('section.index')->withNotify('Data deleted successfully');
    }
}
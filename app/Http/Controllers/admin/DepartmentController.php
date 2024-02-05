<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();
        return view('admin.masterdata.department.index', compact(['department']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Department::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('department.index')->withNotify('Data saved successfully');
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
        $department = Department::findOrFail($id);
        $department->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        if($request->hasFile('call_tone') && $request->hasFile('response_tone') && $request->hasFile('closed_tone'))
        {
            if($department->call_tone != '' && $department->response_tone != '' && $department->closed_tone != '')
            {
                Storage::delete([$department->call_tone, $department->response_tone, $department->closed_tone]);
            }
            $call_tone = $request->file('call_tone')->store('tone');
            $response_tone = $request->file('response_tone')->store('tone');
            $closed_tone = $request->file('closed_tone')->store('tone');

            $department->update([
                'call_tone' => $call_tone,
                'response_tone' => $response_tone,
                'closed_tone' => $closed_tone,
            ]);
        }
        return redirect()->route('department.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('department.index')->withNotify('Data deleted successfully');
    }
}
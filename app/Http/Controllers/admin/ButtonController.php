<?php

namespace App\Http\Controllers\admin;

use App\Events\RegisterButtonEvent;
use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Department;
use App\Models\Device;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Event;

class ButtonController extends Controller
{
    public function index()
    {
        $button = Button::all();
        return view('admin.masterdata.button.index', compact(['button']));
    }

    public function create()
    {
        $device = Device::all();
        $department = Department::all();
        return view('admin.masterdata.button.create', compact(['device', 'department']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required',
            'department_id' => 'required',
            'code' => 'required|unique:button',
        ]);

        $device_id = $request->device_id;
        $department_id = $request->department_id;
        $code = $request->code;

        Button::create([
            'device_id' => $device_id,
            'department_id' => $department_id,
            'code' => $code,
        ]);

        return redirect()->route('button.index')->withNotify('Data created successfully!');
    }

    public function edit(string $id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $button = Button::findOrFail($secret);
            $device = Device::all();
            $department = Department::all();
            return view('admin.masterdata.button.edit', compact([
                'button',
                'device',
                'department',
            ]));
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $button = Button::findOrFail($id);
        $button->update([
            'device_id' => $request->device_id,
            'department_id' => $request->department_id,
            'code' => $request->code,
        ]);
        return redirect()->route('button.index')->withNotify('Data updated successfully!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $button = Button::findOrFail($id);
        $button->delete();
        return redirect()->route('button.index')->withNotify('Data deleted successfully!');
    }
}

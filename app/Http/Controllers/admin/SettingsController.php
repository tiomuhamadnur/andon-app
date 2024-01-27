<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        return view('admin.masterdata.settings.index', compact(['settings']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        $code = $request->code;
        $value = $request->value;

        $setting = Settings::where('code', $code)->first();
        if(!$setting)
        {
            return back()->withNotifyerror('Something went wrong!');
        }
        $setting->update([
            'value' => $value,
        ]);

        return back()->withNotify('Configuration about ' . $setting->name . ' updated successfuly!');
    }

    public function destroy(string $id)
    {
        //
    }
}
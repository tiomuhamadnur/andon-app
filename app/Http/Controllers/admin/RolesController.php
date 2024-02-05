<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return view('admin.masterdata.roles.index', compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Roles::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('roles.index')->withNotify('Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
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

    public function update(Request $request)
    {
        $id = $request->id;
        $role = Roles::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('roles.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $role = Roles::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->withNotify('Data deleted successfully');
    }
}
<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('admin.masterdata.company.index', compact(['company']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        Company::create([
            'name' => $request->name,
            'address' => $request->address,
            'no_hp' => $request->no_hp,
            'pic' => $request->pic,
        ]);
        return redirect()->route('company.index')->withNotify('Data saved successfully');
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
        $company = Company::findOrFail($id);
        $company->update([
            'name' => $request->name,
            'address' => $request->address,
            'no_hp' => $request->no_hp,
            'pic' => $request->pic,
        ]);
        return redirect()->route('company.index')->withNotify('Data updated successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('company.index')->withNotify('Data deleted successfully');
    }
}

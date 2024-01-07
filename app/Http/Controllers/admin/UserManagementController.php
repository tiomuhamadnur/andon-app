<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Company;
use App\Models\Department;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Roles;
use App\Models\Section;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $department = Department::all();
        $section = Section::all();
        $role = Roles::all();
        $jabatan = Jabatan::all();
        $company = Company::all();
        $building = Building::all();
        $users = Pegawai::orderBy('name', 'ASC')->get();
        return view('admin.user-management.index', compact([
            'users',
            'department',
            'section',
            'role',
            'jabatan',
            'company',
            'building',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = Hash::make('user123');
        Pegawai::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'role_id' => $request->role_id,
            'jabatan_id' => $request->jabatan_id,
            'section_id' => $request->section_id,
            'department_id' => $request->department_id,
            'company_id' => $request->company_id,
            'building_id' => $request->building_id,
        ]);
        return redirect()->route('user-management')->withNotify('Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $user = Pegawai::findOrFail($secret);
            if(!$user){
                return back()->withNotifyerror('something went wrong');
            }

            $department = Department::all();
            $section = Section::all();
            $role = Roles::all();
            $jabatan = Jabatan::all();
            $company = Company::all();
            $building = Building::all();

            return view('admin.user-management.update', compact([
                'user',
                'department',
                'section',
                'role',
                'jabatan',
                'company',
                'building',
            ]));
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $user = Pegawai::findOrFail($id);
        if(!$user){
            return back()->withNotifyerror('something went wrong!');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'role_id' => $request->role_id,
            'jabatan_id' => $request->jabatan_id,
            'section_id' => $request->section_id,
            'department_id' => $request->department_id,
            'company_id' => $request->company_id,
            'building_id' => $request->building_id,
        ]);
        return redirect()->route('user-management')->withNotify('Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function getAudio(Request $request)
    {
        $department_name = $request->department_name;
        $status = $request->status;
        $audio = '';

        if($status == 'Call'){
            $audio = Department::where('name', $department_name)->first()->call_tone;
        }
        elseif ($status == 'Response') {
            $audio = Department::where('name', $department_name)->first()->response_tone;
        }
        elseif ($status == 'Closed')
        {
            $audio = Department::where('name', $department_name)->first()->closed_tone;
        }

        if(!$audio)
        {
            return response()->json('error');
        }

        $audio = asset('storage/' . $audio);

        return response()->json($audio);
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
        //
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

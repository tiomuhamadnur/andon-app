<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function updatePhoto(Request $request)
    {
        $this->validate($request, [
            'photo' => ['image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $user = Pegawai::findOrFail(auth()->user()->id);
            $photo = $user->photo;
            if ($photo){
                Storage::delete($photo);
            }
            $photo_profile = $request->file('photo')->store('users/photo-profile');
            $user->update([
                'photo' => $photo_profile,
            ]);

            return redirect()->route('user-profile')->withNotify('Profile photo updated successfully!');
        }

        return back();
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